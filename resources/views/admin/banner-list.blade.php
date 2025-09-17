@extends('admin.layouts.main')
@section('main-section')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 d-inline-block"><span class="text-muted fw-light">Master /</span> Banner List</h4>
        <a class="btn btn-primary float-end" href="{{ route('admin.banner.add') }}"><i class="bx bx-box-alt me-1"></i> Add New
            data</a>


        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.banner.list') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by Name"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.banner.list') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Banner List</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($bannerList as $banners)
                            <tr>
                                <td>{{ $banners->id }}</td>
                                <td> <img src="{{ asset($banners->image) }}" alt="banner Image" width="60" height="60">
                                </td>
                                <td>{{ $banners->heading }}</td>
                                <td>
                                    @if($banners->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Edit --}}
                                    <a class="btn btn-sm btn-icon btn-warning"
                                        href="{{ route('admin.banner.add', $banners->id) }}" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $banners->id }}" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="deleteModal{{ $banners->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $banners->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete banner Title -
                                                    <strong>{{ $banners->title }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST"
                                                        action="{{ route('admin.banner.delete', $banners->id) }}">
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        @if ($bannerList && $bannerList->count() == 0)
                            <td>No records found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @if ($bannerList->hasPages())
            <div class="card mt-4 shadow-sm">
                <div class="card-body d-flex justify-content-center">
                    {{ $bannerList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
    <!-- / Content -->
@endsection
