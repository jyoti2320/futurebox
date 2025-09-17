<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ShowcaseController extends Controller
{
        public function addShowcase($id = null)
    {
        try {
            if ($id) {
                $showcase = Showcase::findOrFail($id);
            } else {
                $showcase = null;
            }
            return view('admin.showcase-add', compact('showcase'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load Showcase: ' . $e->getMessage());

            return redirect()->route('admin.showcase.list')->with('error', 'Showcase not found or something went wrong.');
        }
    }

    public function storeShowcase(Request $request, $id = null)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'heading' => $request->heading,
            'short_desc' => $request->short_desc,
            'status' => $request->status,
        ];

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $showcase = Showcase::find($id);
                    if ($showcase && !empty($showcase->image) && file_exists(public_path($showcase->image))) {
                        unlink(public_path($showcase->image));
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('showcase'), $filename);

                $data['image'] = 'showcase/' . $filename; // path for public access
            }

            if ($id) {
                $showcase = Showcase::find($id);
                if (!$showcase) {
                    Log::warning("Update failed: showcase with ID {$id} not found.");
                    return redirect()->back()->with('error', 'showcase not found.');
                }

                $showcase->update($data);
                Log::info("showcase updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.showcase.list')->with('success', 'showcase updated successfully');
            } else {
                $created = Showcase::create($data);
                Log::info("showcase created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.showcase.list')->with('success', 'showcase created successfully');
            }
        } catch (\Exception $e) {
            Log::error("showcase store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function showcaseList(Request $request)
    {
        try {
            $query = Showcase::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('heading', 'like', '%' . $search . '%');
            }
            $showcaseList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.showcase-list', compact('showcaseList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load showcase list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading showcases.');
        }
    }


    public function deleteShowcase($id)
    {
        $showcase = Showcase::find($id);

        if (!$showcase) {
            Log::warning("Delete failed: showcase with ID {$id} not found.");
            return redirect()->back()->with('error', 'showcase not found.');
        }
        $originalData = $showcase->status;
        $showcase->delete();

        Log::info("showcase marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'showcase marked as deleted successfully.');
    }
}
