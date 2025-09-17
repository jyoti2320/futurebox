@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Banner</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.banner.store', $banner->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $banner->id ?? '' }}">

                        <div class="card-body">

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($banner->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($banner->image) }}" width="150" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Heading --}}
                            <div class="mb-3">
                                <label for="heading" class="form-label">Heading <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="heading" id="heading"
                                    value="{{ old('heading', $banner->heading ?? '') }}" placeholder="Enter Heading"
                                     />
                            </div>

                            {{-- Short Description --}}
                            <div class="mb-3">
                                <label for="short_desc" class="form-label">Short description <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="short_desc" id="short_desc"
                                    value="{{ old('short_desc', $banner->short_desc ?? '') }}" placeholder="Enter description"
                                     />
                            </div>

                            {{-- Status --}}
                            <div class="mb-3 form-check form-switch">
                                <input type="hidden" name="status" value="0"> {{-- hidden input --}}
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" 
                                    name="status" id="status" value="1"
                                    {{ old('status', $banner->status ?? 0) == 1 ? 'checked' : '' }}>
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
