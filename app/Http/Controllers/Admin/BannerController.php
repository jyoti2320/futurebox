<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function addBanner($id = null)
    {
        try {
            if ($id) {
                $banner = Banner::findOrFail($id);
            } else {
                $banner = null;
            }
            return view('admin.banner-add', compact('banner'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load Banner: ' . $e->getMessage());

            return redirect()->route('admin.banner.list')->with('error', 'Banner not found or something went wrong.');
        }
    }

    public function storeBanner(Request $request, $id = null)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'btn_url' => 'required|string',
        ]);

        $data = [
            'heading' => $request->heading,
            'short_desc' => $request->short_desc,
            'btn_url' => $request->btn_url,
            'status' => $request->status,
        ];

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $banner = Banner::find($id);
                    if ($banner && !empty($banner->image) && file_exists(public_path($banner->image))) {
                        unlink(public_path($banner->image));
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('banner'), $filename);

                $data['image'] = 'banner/' . $filename; // path for public access
            }

            if ($id) {
                $banner = Banner::find($id);
                if (!$banner) {
                    Log::warning("Update failed: banner with ID {$id} not found.");
                    return redirect()->back()->with('error', 'banner not found.');
                }

                $banner->update($data);
                Log::info("banner updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.banner.list')->with('success', 'banner updated successfully');
            } else {
                $created = Banner::create($data);
                Log::info("banner created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.banner.list')->with('success', 'banner created successfully');
            }
        } catch (\Exception $e) {
            Log::error("banner store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function bannerList(Request $request)
    {
        try {
            $query = Banner::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('heading', 'like', '%' . $search . '%');
            }
            $bannerList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.banner-list', compact('bannerList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load banner list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading banners.');
        }
    }


    public function deleteBanner($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            Log::warning("Delete failed: banner with ID {$id} not found.");
            return redirect()->back()->with('error', 'banner not found.');
        }
        $originalData = $banner->status;
        $banner->delete();

        Log::info("banner marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'banner marked as deleted successfully.');
    }
}
