@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($headerbanner->id) ? 'Edit' : 'Add' }} Header Banner</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.headerbanner.store', $headerbanner->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $headerbanner->id ?? '' }}">

                        <div class="card-body">
                        <div class="row">
                            {{-- Page Name --}}
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Page Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="page_name" id="page_name"
                                    value="{{ old('page_name', $headerbanner->page_name ?? '') }}" 
                                    placeholder="Enter Page Name"/>

                            </div>

                            {{-- Image --}}
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($headerbanner->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($headerbanner->image) }}" width="60" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Status --}}
                            <div class="col-md-12 mb-3 form-check form-switch">
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="1" {{ old('status', $headerbanner->status ?? 1) == 1 ? 'checked' : '' }}>
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
