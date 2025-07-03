@extends('layouts.layout')

@section('content')
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

    <script>
        $(document).ready(function() {
            let table = $('#booksTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('books.data') }}", // This must be /admin/book/books-data
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'product',
                        name: 'name',
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
                        name: 'id',
                        className: 'text-center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center'
                    },
                    {
                        data: 'amount',
                        name: 'price',
                        className: 'text-center'
                    },
                    {
                        data: 'date',
                        name: 'created_at',
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

            // Delete button with SweetAlert confirmation
            $('#booksTable').on('click', '.delete-btn', function() {
                let url = $(this).data('url');
                swal({
                    title: "Are you sure?",
                    text: "This will soft delete the book!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                swal("Deleted!", "Book has been deleted.", "success");
                                table.ajax.reload();
                            },
                            error: function() {
                                swal("Error!", "Something went wrong.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
