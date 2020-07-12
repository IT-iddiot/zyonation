<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;

class LandingPageController extends Controller
{
    public function newLandingPage() {
        $newLP = new LandingPage();
        $newLP->name = "Homepage";
        $newLP->path = "home";
        $newLP->save();

        $newLP = new LandingPage();
        $newLP->name = "Upsell";
        $newLP->path = "upsell";
        $newLP->save();

        $newLP = new LandingPage();
        $newLP->name = "Sales";
        $newLP->path = "sales";
        $newLP->save();

        $newLP = new LandingPage();
        $newLP->name = "Thank you";
        $newLP->path = "thankyou";
        $newLP->save();
    }

    public function index($path) {
        $landingpage = LandingPage::where('path', $path)->first();
        $landingpage_id = $landingpage->id;
        $landingpage_name = $landingpage->name;
        return view('landingpage', compact('landingpage_id','landingpage_name'));
    }

    public function allPageViews() {
        $landingpages = LandingPage::get()->toArray();
        $allPageViews = array_map(function($landingpage){
            $obj = (object)[];
            $obj->id = $landingpage['id'];
            $obj->name = $landingpage['name'];
            $obj->path = $landingpage['path'];
            $obj->pageviews = $landingpage['pageviews'];
            $obj->unique_pageviews = $landingpage['unique_pageviews'];
            return $obj;
        },$landingpages);
        return view('landingpageAllPageViews', compact('allPageViews'));
    }

    public function addPageview(Request $request) {
        // dd($request->all(), $request->is_unique ? 'yes' : 'no');
        $landingpage = LandingPage::find($request->landing_id);
        $landingpage->pageviews++;
        if($request->is_unique) {
            $landingpage->unique_pageviews++;
        }
        $landingpage->save();
        return response()->json([
            'current_pageviews' => $landingpage->pageviews,
            'unique_pageviews' => $landingpage->unique_pageviews
        ]);
    }

    public function addUniquePageView(Request $request) {
        $landingpage = LandingPage::find($request->landing_id);
        $landingpage->unique_pageviews++;
        $landingpage->save();
        return response()->json(['current_unique_pageviews' => $landingpage->unique_pageviews]);   
    }

    public function getPageView($landing_id) {
        $landingpage = LandingPage::find($landing_id);
        return response()->json([
            'current_pageviews' => $landingpage->pageviews,
            'unique_pageviews' => $landingpage->unique_pageviews
        ]); 
    }
}
