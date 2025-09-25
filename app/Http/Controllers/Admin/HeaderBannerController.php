<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Headerbanner;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class HeaderBannerController extends Controller
{
    public function addHeaderBanner($id = null)
    {
        try {
            if ($id) {
                $headerbanner = Headerbanner::findOrFail($id);
            } else {
                $headerbanner = null;
            }
            return view('admin.headerbanner-add', compact('headerbanner'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load headerbanner: ' . $e->getMessage());

            return redirect()->route('admin.headerbanner.list')->with('error', 'headerbanner not found or something went wrong.');
        }
    }

    
    public function storeHeaderBanner(Request $request, $id = null)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'page_name' => $request->page_name,
            'status' => $request->has('status') ? 1 : 0,
        ];
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $headerbanner = Headerbanner::find($id);
                    if ($headerbanner && !empty($headerbanner->image) && file_exists(public_path($headerbanner->image))) {
                        unlink(public_path($headerbanner->image));
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('headerbanner'), $filename);

                $data['image'] = 'headerbanner/' . $filename; // path for public access
            }
        // dd($data);

            if ($id) {
                $headerbanner = Headerbanner::find($id);
                if (!$headerbanner) {
                    Log::warning("Update failed: Headerbanner with ID {$id} not found.");
                    return redirect()->back()->with('error', 'Headerbanner not found.');
                }

                $headerbanner->update($data);
                Log::info("headerbanner updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.headerbanner.list')->with('success', 'headerbanner updated successfully');
            } else {
                $created = Headerbanner::create($data);
                Log::info("Header banner created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.headerbanner.list')->with('success', 'Header banner created successfully');
            }
        } catch (\Exception $e) {
            Log::error("headerbanner store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function headerbannerList(Request $request)
    {
        try {
            $query = Headerbanner::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('page_name', 'like', '%' . $search . '%');
            }
            $headerbannerList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.headerbanner-list', compact('headerbannerList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load headerbanner list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading headerbanners.');
        }
    }


    public function deleteHeaderBanner($id)
    {
        $headerbanner = Headerbanner::find($id);

        if (!$headerbanner) {
            Log::warning("Delete failed: Headerbanner with ID {$id} not found.");
            return redirect()->back()->with('error', 'Headerbanner not found.');
        }
        $originalData = $headerbanner->status;
        $headerbanner->delete();

        Log::info("Headerbanner marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'Headerbanner marked as deleted successfully.');
    }
    
}
