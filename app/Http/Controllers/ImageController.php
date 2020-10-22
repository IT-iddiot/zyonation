<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return view('imageUploader')->with('images',Image::all());
    }

    public function store(Request $request)
    {
        if(!$request->has('image')) {
            return redirect()->back()->with([
                'error' => 'Image cannot be empty'
            ]);
        }
        $filename = $request->file('image')->getClientOriginalName();
        $filesize = filesize($request->file('image'));
        $fileInformation = getimagesize($request->file('image'));
        $path = $request->file('image')->store('images', 's3');
        Image::create([
            'filename' => $filename,
            'url' => Storage::disk('s3')->url($path),
            'size' => $filesize,
            'width' => $fileInformation[0],
            'height' => $fileInformation[1]
        ]);
        return redirect()->back()->with([
            'success' => "Image uplaoded successfully"
        ]);
    }

    public function download($id)
    {
        $image = Image::find($id);
        $s3Path = explode("darrenter.com/", $image->url)[1];
        return Storage::disk('s3')->download($s3Path, $image->filename);
    }

    public function delete()
    {

    }
}
