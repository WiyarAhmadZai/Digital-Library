@extends('layouts.layout')

@section('content')
    <div class="page-wrapper pb-4">
        <div class="container-sm mb-5">
            <div class="card radius-10">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Authors List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive pb-4">
                        <table id="authorsTable" class="table table-sm align-middle mb-0" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert -->
    <script src="{{ asset('assets/js/sweetAlert.js') }}"></script>

    <script>
        $(document).ready(function() {
            let table = $('#authorsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.author.list-data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'image',
                        name: 'image',
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
                        data: 'country',
                        name: 'country'
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
                    },
                ],
                drawCallback: function() {
                    $('.dataTables_paginate ul.pagination').addClass('pagination-sm').css({
                        'font-size': '0.85rem',
                        'margin-top': '0.25rem'
                    });
                }
            });

            // Delete button handler
            handleDeleteButtonClick({
                selector: ".delete-btn",
                getDeleteUrl: (id) => `/admin/author/delete/${id}`,
                reloadTableId: "authorsTable",
            });

        });
    </script>
@endsection
