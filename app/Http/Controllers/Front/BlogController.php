<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\Headerbanner;

class BlogController extends Controller
{
    public function blog(){
        try {
                $blogs = Blog::with('category')
                ->limit(3)
                ->where('status', 1)
                ->get();
                $headerbanner = Headerbanner::where('page_name', 'Blogs')->first();
            return view('front.blogs', compact('blogs','headerbanner'));

        } catch (Exception $e) {
            Log::error('Failed to load blog page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the blog page.');
        }
    }

    public function blogDetails(Request $request, $slug){
        try {
            $blogsDetails = Blog::with('category')->where('slug', $slug)->firstOrFail();
            $blogCategory = BlogCategories::where('status', '=', '1')->get();
            $headerbanner = Headerbanner::where('page_name', 'Blog Category')->first();
            // dd($blogsDetails);
            return view('front.blogs-details', compact('blogsDetails','blogCategory','headerbanner'));
        }  catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning("Blog with **slug** {$slug} not found.");
            $blogsDetails = [];
            return view('front.blogs-details', compact('blogsDetails'));
        } catch (Exception $e) {
            Log::error(message: "Error fetching Program details: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the Program.');
        }
            // return view('front.blogs-details');
    }
}
