@extends('admin.layouts.main')
@section('main-section')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 d-inline-block"><span class="text-muted fw-light">Master /</span> Contact List</h4>

        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.contact.list') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by Name"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.contact.list') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Contact List</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Furnishing</th>
                            <th>Reason</th>
                            <th>News</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($contactList as $contacts)
                            <tr>
                                <td>{{ $contacts->id }}</td>
                                <td>{{ $contacts->fullname }}</td>
                                <td>{{ $contacts->email }}</td>
                                <td>{{ $contacts->furnishing }}</td>
                                <td>{{ $contacts->reason }}</td>
                                <td>{{ $contacts->message }}</td>

                                
                            </tr>
                        @endforeach
                        @if ($contactList && $contactList->count() == 0)
                            <td>No records found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @if ($contactList->hasPages())
            <div class="card mt-4 shadow-sm">
                <div class="card-body d-flex justify-content-center">
                    {{ $contactList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
    <!-- / Content -->
@endsection
