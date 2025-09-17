@extends('admin.layouts.main')
@section('main-section')
<style>
    .cke_notification_warning {
        display: none !important;
    }
</style>
    <!-- Content -->
    @php

    @endphp
   <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Add Blog Category</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('admin.blogCategory.store', $blogCategory->id ?? '') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blogCategory->id ?? '' }}">

                    <div class="card-body">
                        {{-- Category Title --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{ old('name', $blogCategory->name ?? '') }}" placeholder="Enter category name" />
                        </div>

                        {{-- Status --}}
                        <div class="mb-3 form-check form-switch">
                            <label class="form-check-label" for="status">Status</label>
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1"
                                   {{ old('status', $blogCategory->status ?? 1) == 1 ? 'checked' : '' }}>
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
