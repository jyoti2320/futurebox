@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($service->id) ? 'Edit' : 'Add' }} Service</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.service.store', $service->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->id ?? '' }}">

                        <div class="card-body">
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $service->name ?? '') }}" placeholder="Enter Name"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($service->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($service->image) }}" width="60" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Short Description --}}
                            <div class="col-md-12 mb-3">
                                <label for="editor1" class="form-label">Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_desc" id="editor1" class="form-control" rows="4">{{ old('short_desc', $service->short_desc ?? '') }}</textarea>
                            </div>

                            {{-- Long Description --}}
                            <div class="col-md-12 mb-3">
                                <label for="editor2" class="form-label">Long Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="editor2" class="form-control" rows="4">{{ old('description', $service->description ?? '') }}</textarea>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-12 mb-3 form-check form-switch">
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="1" {{ old('status', $blog->status ?? 1) == 1 ? 'checked' : '' }}>
                            </div>

                            {{-- Submit --}}
                            <div>
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
                        <div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
    <!-- / Content -->
@endsection
