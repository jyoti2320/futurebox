<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\EventGallary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EventController extends Controller
{
    public function event(){
        try {
            $galleries = EventGallary::where('status' ,1)->get();
            return view('front.events', compact('galleries'));
        } catch (Exception $e) {
            Log::error('Failed to load gallery: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the gallery.');
        }
    }

    public function loadImages(Request $request)
    {
        try {
            $category = $request->input('category', 'all');
            $page = $request->input('page', 1);
            $perPage = 5;

            $galleries = EventGallary::all();
            $allImages = collect();
            // $shortDesc = null;

            foreach ($galleries as $gallery) {
                $images = explode(',', $gallery->images);
                foreach ($images as $image) {
                    $allImages->push([
                        'image' => $image,
                        'category' => $gallery->category,
                    ]);
                }
            }

            if ($category !== 'all') {
                // Filter images by category
                $allImages = $allImages->where('title', $category)->values();
                if ($page == 1) {
                // Get short_desc from the first matching gallery
                $matchingGallery = $galleries->firstWhere('title', $category);
                if ($matchingGallery) {
                    // $shortDesc = $matchingGallery->sort_desc ?? null;
                }
            }
                
            }

            $pagedImages = $allImages->forPage($page, $perPage)->values();

            return response()->json([
                'html' => view('front.partial.event-items', [
                    'images' => $pagedImages,
                    // 'shortDesc' => $shortDesc,
                ])->render(),
                // 'shortDesc' => $shortDesc, // <-- Add this for debug
                'hasMore' => $allImages->count() > $page * $perPage,
            ]);
        } catch (Exception $e) {
            Log::error('Error loading event images: ' . $e->getMessage());

            return response()->json([
                'error' => 'Something went wrong while loading images.'
            ], 500);
        }
    }

}
