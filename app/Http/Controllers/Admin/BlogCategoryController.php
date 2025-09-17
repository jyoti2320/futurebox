<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogCategoryController extends Controller
{
    //
    public function addBlogCategory($id = null)
    {
        if ($id) {
            $blogCategory = BlogCategories::find($id);
            if (!$blogCategory) {
                return redirect()->route('admin.blogCategory.list')->with('error', 'BlogCategory not found.');
            }
            return view('admin.blogCategory-add', compact('blogCategory'));
        }
        return view('admin.blogCategory-add');
    }

    public function storeBlogCategory(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = [
            'name' => $request->name,
            'status' => $request->has('status') ? 1 : 0,
        ];
        try {
            if ($id) {
                $blogCategory = BlogCategories::find($id);
                if (!$blogCategory) {
                    Log::warning("Update failed: BlogCategory with ID {$id} not found.");
                    return redirect()->back()->with('error', 'BlogCategory not found.');
                }
                $blogCategory->update($data);
                Log::info("BlogCategory updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.blogCategory.list')->with('success', 'BlogCategory updated successfully');
            } else {
                $created = BlogCategories::create($data);
                Log::info("blog created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.blogCategory.list')->with('success', 'BlogCategory created successfully');
            }
        } catch (\Exception $e) {
            Log::error("BlogCategory store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function blogCategoryList(Request $request)
    {
        $query = BlogCategories::where('status', '!=', '3')->orderBy('id' , 'desc');
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
        $blogCategoryList = $query->paginate(10)->appends(['search' => $request->search]);
        return view('admin.blogCategory-list', compact('blogCategoryList'));
    }
    public function deleteBlogCategory($id)
    {
        $blogCategory = BlogCategories::find($id);

        if (!$blogCategory) {
            Log::warning("Delete failed: BlogCategory with ID {$id} not found.");
            return redirect()->back()->with('error', 'BlogCategory not found.');
        }

        $originalData = $blogCategory->status; // Optional: store data before modification

        $blogCategory->status = 3;
        $blogCategory->save();

        Log::info("BlogCategory marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
            'updated_status' => $blogCategory->status
        ]);

        return redirect()->back()->with('success', 'BlogCategory marked as deleted successfully.');
    }
}
