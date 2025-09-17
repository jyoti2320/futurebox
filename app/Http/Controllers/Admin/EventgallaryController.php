<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventgallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class EventgallaryController extends Controller
{
    public function addEventgallary($id = null)
    {
        try {
            if ($id) {
                $eventgallary = [];
                $eventgallary = Eventgallary::where('id', $id)->first();
            } else {
                $eventgallary = null;
            }
            return view('admin.eventgallary-add', compact('eventgallary'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::error("Failed to load eventgallary: " . $e->getMessage());
            return redirect()->route('admin.eventgallary.list')->with('error', 'eventgallary not found or something went wrong.');
        }
    }

    public function storeEventgallary(Request $request, $id = null)
    {
        try {
            $validated = $request->validate([
                'category' => 'required|string',
                'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'nullable|in:0,1',
            ]);
            
            if ($request->hasFile('images')) {
                $imagePaths = [];

                foreach ($request->file('images') as $image) {
                    $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('event_gallery_images'), $filename);

                    $imagePaths[] = 'event_gallery_images/' . $filename;
                }
            }
            $gallery = Eventgallary::create([
                'category' => $validated['category'],
                'status'   => $validated['status'],
                'images'   => implode(',', $imagePaths), // comma separated paths
            ]);
    
            if ($gallery) {
                return redirect()->route('admin.eventgallary.list')->with('success', 'data add successfully');
            } else {
                return redirect()->back()->withErrors('error', 'Something went wrong');
            }
    
        } catch (Exception $e) {
            Log::error("saveGallery store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
        }    

    }

    public function updateEventgallary(Request $request, $id = null)
    {    
        try {
            $gallery = Eventgallary::findOrFail($id);

            $validated = $request->validate([
                'category' => 'required|string',
                'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'boolean',
            ]);

            // Start with old images
            $existingImages = $request->has('old_images') ? $request->old_images : [];
           
            // Append new image paths
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // unique filename
                    $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();

                    // move to public/event_gallery_images
                    $image->move(public_path('event_gallery_images'), $filename);

                    // save relative path
                    $existingImages[] = 'event_gallery_images/' . $filename;
                }
            }

            // Remove deleted images from storage
            $originalImages = $gallery->images ? explode(',', $gallery->images) : [];
            $imagesToDelete = array_diff($originalImages, $existingImages);

            foreach ($imagesToDelete as $img) {
                if (file_exists(public_path($img))) {
                    unlink(public_path($img));
                }
            }


            // Update gallery data
            $gallery->update([
                'category' => $validated['category'],
                'status' => $validated['status'],
                'images' => implode(',', $existingImages),
            ]);

            return redirect()->route('admin.eventgallary.list')->with('success', 'Data Updated Successfully');
        } catch (\Exception $e) {
            Log::error("Gallery update error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
        
    }

    public function eventgallaryList(Request $request)
    {
        try {
            $query = Eventgallary::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }
            $eventgallaryList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.eventgallary-list', compact('eventgallaryList'));
        } catch (\Exception $e) {
            Log::error("Failed to load eventgallary list: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading eventgallary..');
        }
    }



    public function deleteEventgallary($id)
    {
        $eventgallary = Eventgallary::find($id);

        if (!$eventgallary) {
            Log::warning("Delete failed: eventgallary with ID {$id} not found.");
            return redirect()->back()->with('error', 'eventgallary not found.');
        }
        $originalData = $eventgallary->status;
        $eventgallary->delete();

        Log::info("eventgallary marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'eventgallary marked as deleted successfully.');
    }
}
