@extends('layouts.layout')

@section('content')
    <div class="page-wrapper py-4">
        <div class="container">
            <h1>Posts</h1>

            <input type="text" id="search" placeholder="Search posts or authors..." class="form-control mb-3"
                autocomplete="off">

            <div id="posts-container">
                @include('admin.post.partials.posts-grid', ['posts' => $posts])
            </div>

            <div id="pagination-container">
                {{ $posts->links('admin.post.partials.pagination') }}
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        function fetchPosts(page = 1, query = '') {
            $.ajax({
                url: "{{ route('posts.search') }}",
                data: {
                    page: page,
                    query: query
                },
                success: function(data) {
                    $('#posts-container').html(data.posts);
                    $('#pagination-container').html(data.pagination);
                }
            });
        }

        // Search on typing (debounce)
        let debounceTimer;
        $('#search').on('keyup', function() {
            clearTimeout(debounceTimer);
            const query = $(this).val();
            debounceTimer = setTimeout(() => fetchPosts(1, query), 300);
        });

        // Pagination links
        $(document).on('click', '#pagination-container a', function(e) {
            e.preventDefault();
            const url = new URL($(this).attr('href'));
            const page = url.searchParams.get('page') || 1;
            const query = $('#search').val();
            fetchPosts(page, query);
        });
    });
</script>
<script>
    $(document).on('click', '.post-image', function() {
        const fullImage = $(this).data('full');
        $('#modalImage').attr('src', fullImage);
        $('#imageModal').modal('show');
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/sweetAlert.js') }}"></script>

<script>
    handleDeleteButtonClick({
        selector: '.delete-btn',
        getDeleteUrl: id => `/posts/${id}`,
    });
</script>
