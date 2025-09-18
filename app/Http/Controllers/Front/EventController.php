<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EventController extends Controller
{
    public function event(){
        try {
            // $events = Service::where('status' ,1)->groupBy('name')->get();
            $events = Service::where('status', 1)
                ->select('name')
                ->groupBy('name')
                ->get();
            return view('front.events', compact('events'));
        } catch (Exception $e) {
            Log::error('Failed to load events: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the events.');
        }
    }

    public function loadImages(Request $request)
    {
        try {
            $category = $request->input('category', 'all');
            $page = $request->input('page', 1);
            $perPage = 5;

            $galleries = Service::all();
            $allImages = collect();
            // $shortDesc = null;

            // foreach ($galleries as $gallery) {
            //     // dd($gallery);
            //     $images = $gallery->image;
            //     foreach ($images as $image) {
            //         $allImages->push([
            //             'image' => $gallery->image,
            //             'category' => $gallery->name,
            //         ]);
            //     }
            // }

            foreach ($galleries as $gallery) {
                $images = explode(',', $gallery->images);
                foreach ($images as $image) {
                    $allImages->push([
                        'image' => $image,
                        'category' => $gallery->name,
                    ]);
                }
            }

            if ($category !== 'all') {
                $allImages = $allImages->where('category', $category)->values();
                if ($page == 1) {
                $matchingGallery = $galleries->firstWhere('category', $category);
                if ($matchingGallery) {
                    // $shortDesc = $matchingGallery->sort_desc ?? null;
                }
            }
                
            }

            $pagedImages = $allImages->forPage($page, $perPage)->values();

            // if ($category !== 'all') {
            //     $allImages = $allImages->where('category', $category)->values();
            // }

            // // Paginate
            // $pagedImages = $allImages->forPage($page, $perPage)->values();


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
