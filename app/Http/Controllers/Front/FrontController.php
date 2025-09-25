<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\About;
use App\Models\Showcase;
use App\Models\Service;
use App\Models\Event;
use App\Models\Team;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Headerbanner;


use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        try {
            $banner = Banner::first();
            $about = About::first();
            $showcase = Showcase::where('status' , 1)->get();
            $event = Event::where('status' , 1)->get();
            $service = Service::where('status' , 1)->get();
            $team = Team::limit(3)->where('status' , 1)->get();
            $blogs = Blog::with('category')
                ->limit(3)
                ->where('status', 1)
                ->get();
            // dd($blogs);
            return view('front.index', compact(
                'banner',
                'about',
                'showcase',
                'service',
                'event',
                'team',
                'blogs',
            ));
        } catch (Exception $e) {
            Log::error('Homepage data loading failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the homepage.');
        }
    }
    public function about(){
        try {
            $team = Team::limit(3)->where('status' , 1)->get();
            $features = Feature::where('status' , 1)->get();
            $headerbanner = Headerbanner::where('page_name', 'about')->first();
            $about = About::first();
            return view('front.about', compact('team','features','headerbanner','about'));

        } catch (Exception $e) {
            Log::error('Failed to load About Us page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the About Us page.');
        }
    }

    public function privacy(){
        try {
            return view('front.privacy');

        } catch (Exception $e) {
            Log::error('Failed to load privacy page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the privacy page.');
        }
    }

}
