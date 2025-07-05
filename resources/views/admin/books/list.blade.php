@extends('layouts.layout')

<style>
    /* Enforce swiper container size and overflow */
    .swiper-container {
        width: 60px !important;
        height: 50px !important;
        overflow: hidden !important;
        /* Hide extra slides */
        position: relative !important;
    }

    /* Critical swiper-wrapper styles for sliding effect */
    .swiper-wrapper {
        display: flex !important;
        transition-property: transform !important;
        will-change: transform;
        box-sizing: content-box !important;
    }

    /* Each slide should have same fixed size */
    .swiper-slide {
        flex-shrink: 0 !important;
        width: 60px !important;
        /* must match container width */
        height: 50px !important;
        /* must match container height */
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    /* Slide images fill their container */
    .swiper-slide img {
        width: 100% !important;
        height: 50px !important;
        object-fit: cover !important;
    }
</style>

@section('content')
    <div class="page-wrapper pb-4">
        <div class="container-sm mb-5">
            <div class="card radius-10">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Recent Books</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive pb-4">
                        <table id="booksTable" class="table table-sm align-middle mb-0" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Final Price</th>
                                    <th>Photo</th>
                                    <th>Book ID</th>
                                    <th>Author</th>
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
    </div>

    <!-- jQuery first -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Swiper JS (if used) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/sweetAlert.js') }}"></script>

    <script>
        $(document).ready(function() {
            if (window.swipers) {
                window.swipers.forEach(swiper => swiper.destroy(true, true));
            }
            window.swipers = [];

            var table = $('#booksTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('books.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'final_price',
                        name: 'final_price'
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'book_id',
                        name: 'id'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'amount',
                        name: 'final_price'
                    },
                    {
                        data: 'date',
                        name: 'publish_year'
                    },
                    {
                        data: 'shipping',
                        name: 'shipping',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function(settings) {
                    if (window.swipers) {
                        window.swipers.forEach(swiper => swiper.destroy(true, true));
                    }
                    window.swipers = [];

                    $('.swiper-container').each(function() {
                        var swiperInstance = new Swiper(this, {
                            slidesPerView: 1,
                            spaceBetween: 5,
                            loop: true,
                            autoplay: {
                                delay: 2500,
                                disableOnInteraction: false,
                            },
                            // no navigation arrows
                        });
                        window.swipers.push(swiperInstance);
                    });

                    // Bootstrap small pagination styling
                    $('.dataTables_paginate ul.pagination').addClass('pagination-sm').css({
                        'font-size': '0.85rem',
                        'margin-top': '0.25rem'
                    });
                },
                initComplete: function() {
                    // Smaller length dropdown
                    $('select[name="booksTable_length"]').addClass('form-select-sm');
                }
            });

            // Your delete button handler here
            handleDeleteButtonClick({
                selector: '.delete-btn',
                getDeleteUrl: id => `/admin/book/delete/${id}`,
                reloadTableId: 'booksTable'
            });
        });
    </script>
@endsection
