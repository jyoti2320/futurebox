@extends('admin.layouts.main')
@section('main-section')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 d-inline-block"><span class="text-muted fw-light">Master /</span> Features List</h4>
        <a class="btn btn-primary float-end" href="{{ route('admin.feature.add') }}"><i class="bx bx-box-alt me-1"></i> Add New
            data</a>


        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.feature.list') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.feature.list') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Features List</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>heading</th>
                            <th>Icon class</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($featureList as $features)
                            <tr>
                                <td>{{ $features->id }}</td>
                                <td>{{ $features->heading }}</td>
                                <td>{{ $features->icon_class }}</td>
                                <td>{{ $features->short_desc }}</td>
                                <td>
                                    {{-- Edit --}}
                                    <a class="btn btn-sm btn-icon btn-warning"
                                        href="{{ route('admin.feature.add', $features->id) }}" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $features->id }}" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="deleteModal{{ $features->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $features->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete feature Title -
                                                    <strong>{{ $features->title }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST"
                                                        action="{{ route('admin.feature.delete', $features->id) }}">
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
                        @if ($featureList && $featureList->count() == 0)
                            <td>No records found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @if ($featureList->hasPages())
            <div class="card mt-4 shadow-sm">
                <div class="card-body d-flex justify-content-center">
                    {{ $featureList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
    <!-- / Content -->
@endsection
