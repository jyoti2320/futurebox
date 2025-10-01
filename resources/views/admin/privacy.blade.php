@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Privacy</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.privacy.store', $privacy->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $privacy->id }}">

                        <div class="card-body">
                        <div class="row">
                            {{-- Privacy --}}
                            <div class="col-md-12 mb-3">
                                <label for="privacy" class="form-label">Privacy</label>
                                <textarea name="privacy" id="editor1" class="form-control" rows="4">{{ old('privacy', $privacy->privacy ?? '') }}</textarea>
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
