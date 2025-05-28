<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            color: #333;
        }
        .navbar {
            background-color: #283593;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .container ul li a{
            font-size: 13px
        }
        .search{
            color: white;
            display: flex;
            justify-content: center;
            margin: 3rem 0;
        }
        .search input{
            background-color: rgba(0, 0, 0, 0.1);
            color: white;
            font-weight: bold;
            width: 100%;
        }
        .search input:focus{
            background-color: rgba(0, 0, 0, 0.1);
            color: white;
            font-weight: bold;
        }
        .marquee-box{
            width: 80%;
            text-align: center;
            margin:  0 17rem;
        }
        .book{
            color: white;
            font-weight: bold;
        }
        @media (max-width: 400px) {
            body p{
                font-size: 12px
            }
            #authors-list span{
                font-size: 10px;
            }
            footer{
                font-size: 12px
            }
            h3{
                font-size: 15px
            }
        }
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.1rem;
            }
            .search-bar {
                display: none;
            }
            #searchIcon {
                display: inline-block;
            }
        }
        @media (min-width: 769px) {
            .navbar-brand {
                font-size: 1.7rem;
            }
            #searchIcon {
                display: none;
            }
        }
        .search-bar {
            width: 300px;
        }
        .search-bar.active {
            display: block !important;
        }
        .super-hero{
            background-image: url('{{ asset('images/darkenbook.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-blend-mode: darken;
            background-color: rgba(0, 0, 0, 0.5);
            height: 550px;
        }
        .hero {
            height: 470px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 2px black;
            position: relative;
        }
        .card {
            transition: transform 0.3s ease-in-out;
            border: none;
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-5px);
            transition: ease-in 300ms;
        }
        .footer {
            background-color: #283593;
            color: white;
            padding: 1.5rem 0;
        }

    </style>
</head>
<body dir="rtl">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">📚 {{__('language.title')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{__('language.home_link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('language.about_link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('language.books_link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('language.authors_link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('language.contact_link')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Setlang/pe">{{__('language.lang')}}</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Setlang/en">{{__('language.lang2')}}</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">{{__('language.login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="register">{{__('language.register')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<div class="super-hero">
    <div class="hero text-center">
        <div>
            <h1>{{__('language.welcome_message')}}</h1>
            <div class="ms-3 d-flex search">
                <input type="text" class="form-control search-bar" placeholder="{{__('language.search')}}">
                <i class="fa fa-search text-white ms-2" id="searchIcon" onclick="toggleSearch()"></i>
            </div>
            <h6> {{__('language.free_m')}} || {{__('language.sell_m')}} || {{__('language.rent_m')}} </h6>

        </div>
    </div>
    <marquee behavior="" direction="left" width="1000" height="500" onmouseover="stop()" onmouseout="start()" class="marquee-box">
        <div class="logo-container" style="display: flex; justify-content: center; align-items: center; gap: 2rem;">

            <div class="book">
                kjkjlkj
            </div>

            <div class="book">
                jklkjlkj
            </div>

            <div class="book">
                kljljlk
            </div>

            <div class="book">
                kjkjhjkhkj
            </div>

            <div class="book">
                kjhkjhkj
            </div>

            <div class="book">
                kjhkjhkj
            </div>

            <div class="book">
               kjhkjhkh
            </div>

            <div class="book">
               hkjhkjhkj
            </div>

        </div>
     </marquee>
</div>

<!-- Main Content -->
<div class="container my-5">
    <h3 class="text-primary mb-4">📚{{__('language.books_link')}}</h3>
    <div class="row" id="book-list">
        @foreach ($books as $book)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/Cute Photo.jpg') }}" class="card-img-top" alt="Book">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($book->description, 100, '...') }}</p>
                        <a href="#" class="btn btn-outline-primary">مشاهده کتاب</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination for Books -->
    <div class="d-flex justify-content-center mt-4" id="pagination-books">
        {{ $books->links('pagination::bootstrap-5') }}
    </div>
</div>


    <h3 class="text-primary mt-5 mb-4">📰{{__('language.last_posts')}}</h3>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="#" class="btn btn-outline-secondary">نظرات</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3 class="text-primary mt-5 mb-4">✍️{{__('language.authors_link')}}</h3>
    <ul class="list-group mb-5" id="authors-list">
        @foreach ($authors as $author)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><strong>اسم نویسنده:</strong> {{ $author->name }}</span>
                <span><strong>اسم کتاب:</strong> {{ $book->title }}</span>
            </li>
        @endforeach
    </ul>
    <!-- Pagination for Authors -->
    <div class="d-flex justify-content-center mt-4" id="pagination-authors">
        {{ $authors->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center">
    <div>&copy;{{__('language.rights_m')}}</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    // Handle click on pagination links for books
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        fetchContent(url);
    });

    // Function to fetch content (books and authors)
    function fetchContent(url) {
        $.ajax({
            url: "route('gethomedata')", // Adjust this URL to your route
            type: 'GET',
            success: function(data) {
                $('#book-list').html(data.books); // Update books list
                $('#pagination-books').html(data.pagination_books); // Update books pagination links
                $('#authors-list').html(data.authors); // Update authors list
                $('#pagination-authors').html(data.pagination_authors); // Update authors pagination links
            }
        });
    }
});

</script>
</body>
</html>
