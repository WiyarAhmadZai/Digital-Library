@extends('layouts.layout')

@section('content')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <div class="page-wrapper">
        <div class="card radius-10">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Recent Books</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="booksTable" class="table align-middle mb-0" style="width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Photo</th>
                                <th>Product ID</th>
                                <th>author</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Shipping</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('books.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'product',
                        name: 'product',
                        className: 'text-center'
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'product_id',
                        name: 'product_id',
                        className: 'text-center'
                    },
                    {
                        data: 'author',
                        name: 'author.name',
                        className: 'text-center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },

                    {
                        data: 'amount',
                        name: 'amount',
                        className: 'text-center'
                    },
                    {
                        data: 'date',
                        name: 'date',
                        className: 'text-center'
                    },
                    {
                        data: 'shipping',
                        name: 'shipping',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [
                    [6, 'desc']
                ]
            });

            // Delete button with confirmation (example)
            $('#booksTable').on('click', '.delete-btn', function() {
                let url = $(this).data('url');
                if (confirm('Are you sure you want to delete this book?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#booksTable').DataTable().ajax.reload();
                            alert('Book deleted successfully.');
                        },
                        error: function() {
                            alert('Error deleting book.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
