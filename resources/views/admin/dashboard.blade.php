@extends('admin.layouts.main')
@section('main-section')
    <style>
        .cke_notification_warning {
            display: none !important;
        }
    </style>
         <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome to FutureBox, Admin! 🎉</h5>
                          <p class="mb-4">
                            Glad to have you back. Here you can manage programs, activities, admissions, and more with ease.
                          </p>
                          {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <!-- <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          /> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <a href="{{route('admin.blog.list')}}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-6">
                                <span class="fw-semibold d-block mb-1">Blogs</span>
                                <h3 class="card-title mb-2">{{$blogCount}}</h3>
                            </div>
                            <div class="col-6">
                              <div class="card-title d-flex align-items-start justify-content-end">
                              <div class="avatar flex-shrink-0">
                                <!-- <img
                                  src="../assets/img/icons/unicons/chart-success.png"
                                  alt="chart success"
                                  class="rounded"
                                /> -->
                              </div>
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <a href="{{route('admin.event.list')}}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-6">
                              <span class="fw-semibold d-block mb-1">Events</span>
                              <h3 class="card-title text-nowrap mb-1">{{$eventCount}}</h3>
                            </div>
                            <div class="col-6">
                              <div class="card-title d-flex align-items-start justify-content-end">
                                <div class="avatar flex-shrink-0">
                                  <!-- <img
                                    src="../assets/img/icons/unicons/wallet-info.png"
                                    alt="Credit Card"
                                    class="rounded"
                                  /> -->
                                </div>
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <a href="{{route('admin.team.list')}}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-6">
                              <span class="fw-semibold d-block mb-1">Team</span>
                              <h3 class="card-title text-nowrap mb-2">{{$teamCount}}</h3>
                            </div>
                            <div class="col-6">
                              <div class="card-title d-flex align-items-start justify-content-end">
                                <div class="avatar flex-shrink-0">
                                  <!-- <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> -->
                                </div>
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <div class="col-6 mb-4">
                      <a href="{{ route('admin.setting',1) }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-6">
                              <span class="fw-semibold d-block mb-1">Setting</span>
                              <!-- <h3 class="card-title mb-2"></h3> -->
                            </div>
                            <div class="col-6">
                              <div class="card-title d-flex align-items-start justify-content-end">
                                <div class="avatar flex-shrink-0">
                                  <!-- <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" /> -->
                                </div>
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>
    
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

@endsection

