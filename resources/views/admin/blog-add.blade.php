@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Blog</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.blog.store', $blog->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $blog->id ?? '' }}">

                        <div class="card-body">

                            {{-- Blog Category --}}
                            <div class="mb-3">
                                <label for="blog_category_id" class="form-label">Blog Category <span
                                        class="text-danger">*</span></label>
                                    <select class="form-control" name="blog_category_id" id="blog_category_id" >
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('blog_category_id', $blog->blog_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Blog Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="blog_title"
                                    value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter blog title"
                                     />
                            </div>

                            {{-- Slug --}}
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ old('slug', $blog->slug ?? '') }}" placeholder="Enter blog slug"
                                    readonly />
                            </div>

                            {{-- Content --}}
                            <div class="mb-3">
                                <label for="editor" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor" class="form-control" rows="4">{{ old('content', $blog->content ?? '') }}</textarea>
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Blog Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($blog->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($blog->image) }}" width="150" alt="Blog Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Publish Date --}}
                            <div class="mb-3">
                                <label for="publish_date" class="form-label">Publish Date</label>
                                <input type="date" class="form-control" name="publish_date" id="publish_date"
                                    value="{{ old('publish_date', $blog->publish_date ?? '') }}">
                            </div>

                            <hr>

                            {{-- Meta Keywords --}}
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                    value="{{ old('meta_keywords', $blog->meta_keywords ?? '') }}"
                                    placeholder="e.g., travel blog, food tips, health guide" maxlength="255">
                            </div>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                    value="{{ old('meta_title', $blog->meta_title ?? '') }}"
                                    placeholder="e.g., 10 Proven Tips for Healthy Living" maxlength="255">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description"
                                    placeholder="e.g., Discover lifestyle changes for a healthier life." maxlength="255" rows="3">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                            </div>
                            {{-- Status --}}
                            <div class="mb-3 form-check form-switch">
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="1" {{ old('status', $blog->status ?? 1) == 1 ? 'checked' : '' }}>
                            </div>

                            {{-- Submit --}}
                            <div>
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
    <!-- / Content -->
@endsection
