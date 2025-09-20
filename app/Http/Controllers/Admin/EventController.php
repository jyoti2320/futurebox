<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class EventController extends Controller
{
    
    public function addEvent($id = null)
    {
        try {
            if ($id) {
                $event = Event::findOrFail($id);
            } else {
                $event = null;
            }
            return view('admin.event-add', compact('event'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load Event: ' . $e->getMessage());

            return redirect()->route('admin.event.list')->with('error', 'Event not found or something went wrong.');
        }
    }

    public function storeEvent(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'year' => $request->year,
            'status' => $request->status,
        ];


        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $event = Event::find($id);
                    if ($event && !empty($event->image) && file_exists(public_path($event->image))) {
                        unlink(public_path($event->image));
                    }
                }
                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('events'), $filename);
                $data['image'] = 'events/' . $filename; // path for public access
            }

            if ($id) {
                $event = Event::find($id);

                $existingImages = $request->has('old_images') ? $request->old_images : [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('events'), $filename);
                        $existingImages[] = 'events/' . $filename;
                    }
                }
                $originalImages = $event->images ? explode(',', $event->images) : [];
                $imagesToDelete = array_diff($originalImages, $existingImages);
                foreach ($imagesToDelete as $img) {
                    if (file_exists(public_path($img))) {
                        unlink(public_path($img));
                    }
                }
                $data['images']  = implode(',', $existingImages);

                if (!$event) {
                    Log::warning("Update failed: event with ID {$id} not found.");
                    return redirect()->back()->with('error', 'event not found.');
                }

                $event->update($data);
                Log::info("event updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.event.list')->with('success', 'event updated successfully');
            } else {
                
                if ($request->hasFile('images')) {
                    $imagePaths = [];
                    foreach ($request->file('images') as $image) {
                        $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('events'), $filename);
                        $imagePaths[] = 'events/' . $filename;
                    }
                }
                $data['images']  = implode(',', $imagePaths);
                $created = Event::create($data);
                Log::info("event created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.event.list')->with('success', 'event created successfully');
            }
        } catch (\Exception $e) {
            Log::error("event store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function eventList(Request $request)
    {
        try {
            $query = Event::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }
            $eventList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.event-list', compact('eventList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load event list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading events.');
        }
    }


    public function deleteEvent($id)
    {
        $event = Event::find($id);

        if (!$event) {
            Log::warning("Delete failed: event with ID {$id} not found.");
            return redirect()->back()->with('error', 'event not found.');
        }
        $originalData = $event->status;
        $event->delete();

        Log::info("event marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'event marked as deleted successfully.');
    }
}
