@extends('admin.layouts.main')
@section('main-section')
<style>
    .cke_notification_warning {
        display: none !important;
    }
    .thumbImgContainer {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .thumbImgContainer > div {
        border: 1px solid #ddd;
        padding: 4px;
    }
    .img-responsive.thumb.thumbnail {
        max-width: 100%;
        height: 140px;
        object-fit: contain;
    }
</style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">{{ !empty($event->id) ? 'Edit' : 'Add' }} Events</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.event.store', $event->id ?? '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id ?? '' }}">

                        <div class="card-body">
                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $event->name ?? '') }}" placeholder="Enter Category Name"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if (!empty($event->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($event->image) }}" width="60" alt="Image">
                                    </div>
                                @endif
                            </div>

                            {{-- Location --}}
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ old('location', $event->location ?? '') }}" placeholder="Enter Location"
                                     />
                            </div>

                            {{-- Year --}}
                            <div class="col-md-6 mb-3">
                                <label for="year" class="form-label">Year <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="year" id="year"
                                    value="{{ old('year', $event->year ?? '') }}" placeholder="Enter Year"
                                     />
                            </div>

                            {{-- Image --}}
                            <div class="col-md-12 mb-3">
                                <label class="mt-4">Multiple Images</label>
                                <input type="file" id="images" name="images[]" class="form-control" accept="image/png, image/jpeg, image/jpg" multiple>
                                @if(!empty($event) && !empty($event->images))
                                    <div class="thumbImgContainer mt-3">
                                        @foreach(explode(',', $event->images) as $key => $image)
                                            <div id="image_{{ $key }}">
                                                <img src="{{ asset($image) }}" class="img-responsive thumb thumbnail" width="100px" height="100px">
                                                <a href="javascript:void(0);" onclick="removeImage('{{ $key }}', '{{ $image }}')">X</a>
                                                <input type="hidden" name="old_images[]" value="{{ $image }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                         
                            {{-- Status --}}
                            <div class="col-md-12 mb-3 form-check form-switch">
                                <input type="hidden" name="status" value="0"> {{-- hidden input --}}
                                <label class="form-check-label" for="status">Status</label>
                                <input type="checkbox" class="form-check-input" 
                                    name="status" id="status" value="1"
                                    {{ old('status', $event->status ?? 1) == 1 ? 'checked' : '' }}>
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
<script>
    
function removeImage(key, image) {

    document.getElementById('image_' + key).remove();

    var oldImagesInput = document.getElementById('oldImages');

    var oldImages = oldImagesInput.value.split(',');

    oldImages = oldImages.filter(function(item) {

        return item.trim() !== image.trim();

    });

    oldImagesInput.value = oldImages.join(',');

}


</script>