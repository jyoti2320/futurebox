<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function addBlog($id = null)
    {
        $categories = BlogCategories::where('status', 1)->get();
        if ($id) {
            $categories = BlogCategories::where('status', 1)->get();
            $blog = Blog::find($id);
            if (!$blog) {
                return redirect()->route('admin.blog.list')->with('error', 'Blog not found.');
            }
            return view('admin.blog-add', compact('blog' , 'categories'));
        }
        return view('admin.blog-add' , compact('categories'));
    }

    public function storeBlog(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'image' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'publish_date' => 'nullable|date',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->title);

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'blog_category_id' => $request->blog_category_id,
            'publish_date' => $request->publish_date,
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status' => $request->has('status') ? 1 : 0,
        ];

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                if ($id) {
                    $blog = Blog::find($id);
                    if ($blog && !empty($blog->image) && file_exists(public_path($blog->image))) {
                        unlink(public_path($blog->image));
                    }
                }

                // Store the image using Laravel's filesystem
                $path = $file->store('blogs', 'public'); // stored in storage/app/public/uploads/blogs
                $data['image'] = 'storage/' . $path; // path for public access
            }

            if ($id) {
                $blog = Blog::find($id);
                if (!$blog) {
                    Log::warning("Update failed: Blog with ID {$id} not found.");
                    return redirect()->back()->with('error', 'Blog not found.');
                }

                $blog->update($data);
                Log::info("Blog updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.blog.list')->with('success', 'Blog updated successfully');
            } else {
                $created = Blog::create($data);
                Log::info("Blog created successfully. ID: {$created->id}", $data);
                return redirect()->route('admin.blog.list')->with('success', 'Blog created successfully');
            }
        } catch (\Exception $e) {
            Log::error("Blog store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function blogList(Request $request)
    {
        $query = Blog::where('status', '!=', '3')->orderBy('id' , 'desc');
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }
        $blogList = $query->paginate(10)->appends(['search' => $request->search]);
        return view('admin.blog-list', compact('blogList'));
    }
    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            Log::warning("Delete failed: Blog with ID {$id} not found.");
            return redirect()->back()->with('error', 'Blog not found.');
        }

        $originalData = $blog->status; // Optional: store data before modification

        $blog->status = 3;
        $blog->save();

        Log::info("Blog marked as deleted. ID: {$id}", [
            'original_status' => $originalData,
            'updated_status' => $blog->status
        ]);

        return redirect()->back()->with('success', 'Blog marked as deleted successfully.');
    }
}
