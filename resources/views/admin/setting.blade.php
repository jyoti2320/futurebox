@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Setting</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('admin.setting.store', $setting->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id }}">

                        <div class="card-body">

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="website_name" class="form-label">Website Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="website_name" id="website_name"
                                    value="{{ old('website_name', $setting->website_name ?? '') }}" placeholder="Enter Name"
                                     />
                            </div>

                            {{-- Logo --}}
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                                @if (!empty($setting->logo))
                                    <div class="mt-2">
                                        <img src="{{ asset($setting->logo) }}" width="150" alt="logo">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <input type="file" class="form-control" name="favicon" id="favicon">
                                @if (!empty($setting->favicon))
                                    <div class="mt-2">
                                        <img src="{{ asset($setting->favicon) }}" width="150" alt="favicon">
                                    </div>
                                @endif
                            </div>

                            {{-- EMail --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Website Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="{{ old('email', $setting->email ?? '') }}" placeholder="Enter Website Email"
                                     />
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3">
                                <label for="phone1" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone1" id="phone1"
                                    value="{{ old('phone1', $setting->phone1 ?? '') }}" placeholder="Enter Phone number"
                                     />
                            </div>

                            {{-- phone 2 --}}
                            <div class="mb-3">
                                <label for="phone2" class="form-label">Other Phone Number</label>
                                <input type="text" class="form-control" name="phone2" id="phone2"
                                    value="{{ old('phone2', $setting->phone2 ?? '') }}" placeholder="Enter Phone Number"
                                     />
                            </div>

                            {{-- Address --}}
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{ old('address', $setting->address ?? '') }}" placeholder="Enter Address"
                                     />
                            </div>


                            {{-- Facebook --}}
                            <div class="mb-3">
                                <label for="fb_link" class="form-label">Facebook link</label>
                                <input type="url" class="form-control" name="fb_link" id="fb_link"
                                    value="{{ old('fb_link', $setting->fb_link ?? '') }}" placeholder="Enter Facebook link"
                                     />
                            </div>

                            {{-- Twitter --}}
                            <div class="mb-3">
                                <label for="twitter_link" class="form-label">Twitter link </label>
                                <input type="url" class="form-control" name="twitter_link" id="twitter_link"
                                    value="{{ old('twitter_link', $setting->twitter_link ?? '') }}" placeholder="Enter Twitter link"
                                     />
                            </div>

                            {{-- Youtube --}}
                            <div class="mb-3">
                                <label for="yb_link" class="form-label">Youtube link </label>
                                <input type="url" class="form-control" name="yb_link" id="yb_link"
                                    value="{{ old('yb_link', $setting->yb_link ?? '') }}" placeholder="Enter Youtube link"
                                     />
                            </div>

                            {{-- Instagram --}}
                            <div class="mb-3">
                                <label for="insta_link" class="form-label">Instagram link</label>
                                <input type="url" class="form-control" name="insta_link" id="insta_link"
                                    value="{{ old('insta_link', $setting->insta_link ?? '') }}" placeholder="Enter Instagram link"
                                     />
                            </div>

                            {{-- LinkedIn --}}
                            <div class="mb-3">
                                <label for="linkedin_link" class="form-label">LinkedIn link </label>
                                <input type="url" class="form-control" name="linkedin_link" id="linkedin_link"
                                    value="{{ old('linkedin_link', $setting->linkedin_link ?? '') }}" placeholder="Enter LinkedIn link"
                                     />
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
