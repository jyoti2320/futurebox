@extends('admin.layouts.main')
@section('main-section')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 d-inline-block"><span class="text-muted fw-light">Master /</span> Blog List</h4>
        <a class="btn btn-primary float-end" href="{{ route('admin.blog.add') }}"><i class="bx bx-box-alt me-1"></i> Add New
            Blog</a>


        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.blog.list') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by Blog Title"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.blog.list') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Blog List</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <!-- <th>Description</th> -->
                            <th>Image</th>
                            <th>Blog Title</th>
                            <th>Sequence</th>
                            <!-- <th>Slug</th> -->
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($blogList as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <!-- <td>
                                    @php
                                        $cleanContent = strip_tags(html_entity_decode($blog->content));
                                    @endphp

                                    {{ \Illuminate\Support\Str::limit($cleanContent, 50, '...') }}

                                    @if (strlen($cleanContent) > 50)
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#blogModal{{ $blog->id }}">Read more</a>

                                        <div class="modal fade" id="blogModal{{ $blog->id }}" tabindex="-1"
                                            aria-labelledby="blogModalLabel{{ $blog->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="blogModalLabel{{ $blog->id }}">
                                                            {{ $blog->title }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body"
                                                        style="white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                                                        {!! $blog->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td> -->
                                <td> <img src="{{ asset($blog->image) }}" alt="Blog Image" width="60" height="60">
                                </td>
                                <td><p style="width: 230px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $blog->title }}</p></td>
                                <td>{{ $blog->sequence }}</td>
                                <!-- <td>{{ $blog->slug }}</td> -->
                                <td>{{ date('d-m-Y', strtotime($blog->publish_date)) }}</td>
                                <td>
                                    @if ($blog->status == 1)
                                        <span class="alert alert-success p-2">Active</span>
                                    @else
                                        <span class="alert alert-danger p-2">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Edit --}}
                                    <a class="btn btn-sm btn-icon btn-warning"
                                        href="{{ route('admin.blog.add', $blog->id) }}" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $blog->id }}" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $blog->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete Blog Title -
                                                    <strong>{{ $blog->title }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST"
                                                        action="{{ route('admin.blog.delete', $blog->id) }}">
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
                        @if ($blogList && $blogList->count() == 0)
                            <td>No records found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @if ($blogList->hasPages())
            <div class="card mt-4 shadow-sm">
                <div class="card-body d-flex justify-content-center">
                    {{ $blogList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
    <!-- / Content -->
@endsection
