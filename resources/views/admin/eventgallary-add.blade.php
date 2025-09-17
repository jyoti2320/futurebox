@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($eventgallary->id) ? 'Edit' : 'Add' }} Event Gallary</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ !empty($eventgallary->id) ? route('admin.eventgallary.update',$eventgallary->id) : route('admin.eventgallary.store') }}"
                         method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $eventgallary->id ?? '' }}">

                        <div class="card-body">

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="category" class="form-label">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="category" id="category"
                                    value="{{ old('category', $eventgallary->category ?? '') }}" placeholder="Enter category Name"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label class="mt-4">Multiple Images</label>
                                <input type="file" id="images" name="images[]" class="form-control" accept="image/png, image/jpeg, image/jpg" multiple>
                                @if(!empty($eventgallary) && !empty($eventgallary->images))
                                    <div class="row mt-3">
                                        @foreach(explode(',', $eventgallary->images) as $key => $image)
                                            <div class="col-md-2" id="image_{{ $key }}">
                                                <img src="{{ asset($image) }}" class="img-responsive thumb thumbnail" width="100px" height="100px">
                                                <!-- <a href="javascript:void(0);" onclick="removeImage('{{ $key }}', '{{ $image }}')">X</a> -->
                                                <input type="hidden" name="old_images[]" value="{{ $image }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>

                            {{-- Status --}}
                            <div class="mb-3 form-check form-switch">
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="1" {{ old('status', $eventgallary->status ?? 1) == 1 ? 'checked' : '' }}>
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
