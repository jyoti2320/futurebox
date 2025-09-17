<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    public function blog(){
        try {
                $blogs = Blog::with('category')
                ->limit(3)
                ->where('status', 1)
                ->get();
            return view('front.blogs', compact('blogs'));

        } catch (Exception $e) {
            Log::error('Failed to load blog page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the blog page.');
        }
    }

    public function blogDetails(){
            return view('front.blogs-details');
    }
}
