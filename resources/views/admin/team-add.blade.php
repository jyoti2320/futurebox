@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($team->id) ? 'Edit' : 'Add' }} Team Member</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.team.store', $team->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $team->id ?? '' }}">

                        <div class="card-body">
                        <div class="row">
                            {{-- Image --}}
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($team->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($team->image) }}" width="60" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Name --}}
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $team->name ?? '') }}" placeholder="Enter Name"
                                     />
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="{{ old('email', $team->email ?? '') }}" placeholder="Enter Email"
                                     />
                            </div>


                            {{-- Position --}}
                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Position <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="position" id="position"
                                    value="{{ old('position', $team->position ?? '') }}" placeholder="Enter Position"
                                     />
                            </div>

                            {{-- Qualifications --}}
                            <div class="col-md-6 mb-3">
                                <label for="qualifications" class="form-label">Qualifications <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="qualifications" id="qualifications"
                                    value="{{ old('qualifications', $team->qualifications ?? '') }}" placeholder="Enter Qualifications"
                                     />
                            </div>

                            
                            {{-- Location --}}
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ old('location', $team->location ?? '') }}" placeholder="Enter Name"
                                     />
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12 mb-3">
                                <label for="editor1" class="form-label">Short Description <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor1" class="form-control" rows="4">{{ old('content', $team->content ?? '') }}</textarea>
                            </div>

                         
                            {{-- Status --}}
                            <div class="col-md-12 mb-3 form-check form-switch">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
    <!-- / Content -->
@endsection
