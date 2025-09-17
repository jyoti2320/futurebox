<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class AboutController extends Controller
{
    public function addAbout($id = null)
    {
        try {
            if ($id) {
                $about = About::findOrFail($id);
            } else {
                $about = null;
            }
            return view('admin.about-add', compact('about'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load About: ' . $e->getMessage());

            return redirect()->route('admin.about.list')->with('error', 'About not found or something went wrong.');
        }
    }

    public function storeAbout(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'our_story' => 'required|string',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp' : 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'our_story' => $request->our_story,

        ];

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($id) {
                    $about = About::find($id);
                    if ($about && !empty($about->image) && file_exists(public_path($about->image))) {
                        unlink(public_path($about->image));
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('abouts'), $filename);

                $data['image'] = 'abouts/' . $filename; // path for public access
            }

            if ($id) {
                $about = About::find($id);
                if (!$about) {
                    Log::warning("Update failed: About with ID {$id} not found.");
                    return redirect()->back()->with('error', 'About not found.');
                }

                $about->update($data);
                Log::info("About updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.about.list')->with('success', 'About updated successfully');
            } else {
                $created = About::create($data);
                Log::info("About created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.about.list')->with('success', 'About created successfully');
            }
        } catch (\Exception $e) {
            Log::error("About store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function aboutList(Request $request)
    {
        try {
            $query = About::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('title', 'like', '%' . $search . '%');
            }
            $aboutList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.about-list', compact('aboutList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load about list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading abouts.');
        }
    }


    public function deleteAbout($id)
    {
        $about = About::find($id);

        if (!$about) {
            Log::warning("Delete failed: About with ID {$id} not found.");
            return redirect()->back()->with('error', 'About not found.');
        }
        $originalData = $about->status;
        $about->delete();

        Log::info("About marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
        ]);

        return redirect()->back()->with('success', 'About marked as deleted successfully.');
    }
}
