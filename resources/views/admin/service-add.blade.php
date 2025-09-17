@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Events</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.service.store', $service->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->id ?? '' }}">

                        <div class="card-body">

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Category <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $service->name ?? '') }}" placeholder="Enter Category Name"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($service->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($service->image) }}" width="150" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Location --}}
                            <div class="mb-3">
                                <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ old('location', $service->location ?? '') }}" placeholder="Enter Service Name"
                                     />
                            </div>

                         
                            {{-- Status --}}
                            <div class="mb-3 form-check form-switch">
                                <input type="hidden" name="status" value="0"> {{-- hidden input --}}
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" 
                                    name="status" id="status" value="1"
                                    {{ old('status', $service->status ?? 1) == 1 ? 'checked' : '' }}>
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
