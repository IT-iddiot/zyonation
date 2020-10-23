<?php

namespace App\Http\Controllers;

use Image;
use App\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    public function index()
    {
        return view('imageUploader')->with('images', ImageGallery::all());
    }

    /**
     * Image validation here
     * 
     * @param mixed $request
     * @author Darren
     */
    public function upload(Request $request) 
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);
        $this->store($request);
    }

    public function store($request)
    {
        $file = $request->file('image');
        $imageSize = filesize($file) / 1024;
        [$width, $height] = getimagesize($file);
        $filenameWithExt = $file->getClientOriginalName();
        [$webpFilename, $normalFilename] = $this->compress($file, $filenameWithExt);

        Storage::disk('s3')->put('media/' . $normalFilename, file_get_contents($file), 'public');
        Storage::disk('s3')->put('media/' . $webpFilename, Storage::get('images/' . $webpFilename), 'public');
        Storage::delete('images/' . $webpFilename);
        ImageGallery::create([
            'original_name' => $filenameWithExt,
            's3_name' => $webpFilename,
            's3_url' => Storage::disk('s3')->url('media/' . $normalFilename),
            's3_webp_url' => Storage::disk('s3')->url('media/' . $webpFilename),
            'size' => $imageSize,
            'width' => $width,
            'height' => $height
        ]);
        return view('imageUploader');
    }

    /**
     * Compress image using php imagewebp
     * 
     * @param mixed $request
     * @author Darren
     */
    public function compress($file, $filenameWithExt)
    {
        $extension = $file->extension();
        // TODO cater for gif
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($file);
                break;
            case 'png': 
                $image = imagecreatefrompng($file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;
            case 'gif': 
                $image = imagecreatefromgif($file);
                break;
            case 'webp':
                $image = imagecreatefromwebp($file);
                break;
            default:
                return false;
        }
        $filenameOnly = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $webpFilename = time() . "-" . $filenameOnly . '.webp';
        $normalFilename = time() . "--" . $filenameWithExt;
        imagewebp($image, 'images/' . $webpFilename, 80);
        imagedestroy($image);
        return [$webpFilename, $normalFilename];
    }

    public function download(Request $request)
    {
        $image = ImageGallery::find($request->id);
        return Storage::disk('s3')->download('media/' . $image->s3_name, $image->original_name);
    }

    public function delete(Request $request)
    {
        // TODO delete jpg version also
        $image = ImageGallery::find($request->id);
        Storage::disk('s3')->delete("media/" . $image->s3_name);
        $image->delete();
        return redirect()->back()->with([
            'success' => "Image deleted successfully"
        ]);
    }

    /**
     * Use pure php function here
     */
    public function purePhpConvert(Request $request)
    {
        $file = $request->file('image');
        $extension = $file->extension();
        $filenameWithExt = $file->getClientOriginalName();
        $filenameOnly = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($file);
                break;
            case 'png': 
                $image = imagecreatefrompng($file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;
            case 'gif': 
                $image = imagecreatefromgif($file);
                break;
            default:
                return false;
        }

        $webpFilename = time() . "-" . $filenameOnly . '.webp';
        $normalFilename = time() . "-" . $filenameWithExt;
        imagewebp($image, 'images/' . $webpFilename, 80);
        imagedestroy($image);
        
        Storage::disk('s3')->put('media/' . $normalFilename, file_get_contents($file), 'public');
        Storage::disk('s3')->put('media/' . $webpFilename, Storage::get('images/' . $webpFilename), 'public');
        Storage::delete('images/' . $webpFilename);
        $url1 = Storage::disk('s3')->url('media/' . $webpFilename);
        $url2 = Storage::disk('s3')->url('media/' . $webpFilename);
        $imageSize = filesize($file) / 1024;
        [$width, $height] = getimagesize($file);
        dd($url1, $url2, $webpFilename, $width, $height, $imageSize);
    }
}
