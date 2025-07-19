@extends('layouts.layout')

@section('content')
    <div class="page-wrapper pb-4">
        <div class="container-sm mb-5">
            <div class="card radius-10">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">User List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive pb-4">
                        <table id="userTable" class="table table-sm align-middle mb-0" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Profession</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.user.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'profile_image',
                        name: 'profile_image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'profession',
                        name: 'profession'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
