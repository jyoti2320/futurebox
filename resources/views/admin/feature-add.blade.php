@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($feature->id) ? 'Edit' : 'Add' }} Feature</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.feature.store', $feature->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $feature->id ?? '' }}">

                        <div class="card-body">
                        <div class="row">
                            {{-- Heading --}}
                            <div class="col-md-6 mb-3">
                                <label for="heading" class="form-label">Heading <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="heading" id="heading"
                                    value="{{ old('heading', $feature->heading ?? '') }}" placeholder="Enter Heading"
                                     />
                            </div>

                            {{-- Icon class --}}
                            <div class="col-md-6 mb-3">
                                <label for="icon_class" class="form-label">Icon class <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="icon_class" id="icon_class"
                                    value="{{ old('icon_class', $feature->icon_class ?? '') }}" placeholder="Enter Icon class"
                                     />
                            </div>

                            {{-- Name --}}
                            <div class="col-md-12 mb-3">
                                <label for="editor1" class="form-label">Short description <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="short_desc" id="editor1"
                                    value="{{ old('short_desc', $feature->short_desc ?? '') }}" placeholder="Enter Short description"
                                     />
                            </div>

                         
                            {{-- Status --}}
                            <div class="col-md-12 mb-3 form-check form-switch">
                                <input type="hidden" name="status" value="0"> {{-- hidden input --}}
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" 
                                    name="status" id="status" value="1"
                                    {{ old('status', $feature->status ?? 1) == 1 ? 'checked' : '' }}>
                            </div>


                            {{-- Submit --}}
                            <div>
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
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
