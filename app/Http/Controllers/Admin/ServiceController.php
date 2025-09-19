<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    
    public function addService($id = null)
    {
        try {
            if ($id) {
                $service = Service::findOrFail($id);
            } else {
                $service = null;
            }
            return view('admin.service-add', compact('service'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load Service: ' . $e->getMessage());

            return redirect()->route('admin.service.list')->with('error', 'Service not found or something went wrong.');
        }
    }

    public function storeService(Request $request, $id = null)
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
                    $service = Service::find($id);
                    if ($service && !empty($service->image) && file_exists(public_path($service->image))) {
                        unlink(public_path($service->image));
                    }
                }
                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('services'), $filename);
                $data['image'] = 'services/' . $filename; // path for public access
            }

            if ($id) {
                $service = Service::find($id);

                $existingImages = $request->has('old_images') ? $request->old_images : [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('services'), $filename);
                        $existingImages[] = 'services/' . $filename;
                    }
                }
                $originalImages = $service->images ? explode(',', $service->images) : [];
                $imagesToDelete = array_diff($originalImages, $existingImages);
                foreach ($imagesToDelete as $img) {
                    if (file_exists(public_path($img))) {
                        unlink(public_path($img));
                    }
                }
                $data['images']  = implode(',', $existingImages);

                if (!$service) {
                    Log::warning("Update failed: service with ID {$id} not found.");
                    return redirect()->back()->with('error', 'service not found.');
                }

                $service->update($data);
                Log::info("service updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.service.list')->with('success', 'service updated successfully');
            } else {
                
                if ($request->hasFile('images')) {
                    $imagePaths = [];
                    foreach ($request->file('images') as $image) {
                        $filename = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('services'), $filename);
                        $imagePaths[] = 'services/' . $filename;
                    }
                }
                $data['images']  = implode(',', $imagePaths);
                $created = Service::create($data);
                Log::info("service created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.service.list')->with('success', 'service created successfully');
            }
        } catch (\Exception $e) {
            Log::error("service store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function serviceList(Request $request)
    {
        try {
            $query = Service::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('name', 'like', '%' . $search . '%');
            }
            $serviceList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.service-list', compact('serviceList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load service list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading services.');
        }
    }


    public function deleteService($id)
    {
        $service = Service::find($id);

        if (!$service) {
            Log::warning("Delete failed: service with ID {$id} not found.");
            return redirect()->back()->with('error', 'service not found.');
        }
        $originalData = $service->status;
        $service->delete();

        Log::info("service marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'service marked as deleted successfully.');
    }
}
