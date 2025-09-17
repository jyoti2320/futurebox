@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add About</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.about.store', $about->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $about->id ?? '' }}">

                        <div class="card-body">

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">About Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', $about->title ?? '') }}" placeholder="Enter about title"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">About Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($about->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($about->image) }}" width="150" alt="about Image">
                                    </div>
                                @endif
                            </div>


                            {{-- Content --}}
                            <div class="mb-3">
                                <label for="editor" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor" class="form-control" rows="4">{{ old('content', $about->content ?? '') }}</textarea>
                            </div>

                            {{-- Our story --}}
                            <div class="mb-3">
                                <label for="editor1" class="form-label">Our Story <span class="text-danger">*</span></label>
                                <textarea name="our_story" id="editor1" class="form-control" rows="4">{{ old('our_story', $about->our_story ?? '') }}</textarea>
                            </div>

                            {{-- Status --}}
                            <!-- <div class="mb-3 form-check form-switch">
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="1" {{ old('status', $blog->status ?? 1) == 1 ? 'checked' : '' }}>
                            </div> -->

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
