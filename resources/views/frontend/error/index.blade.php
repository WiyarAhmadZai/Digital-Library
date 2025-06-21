@extends('frontend.layout.master');

@section('content')

    <!-- Breadcumb Section Start -->
    <div class="breadcrumb-wrapper">
        <div class="book1">
            <img src="{{asset('assets/img/hero/book1.png')}}" alt="book">
        </div>
        <div class="book2">
            <img src="{{asset('assets/img/hero/book2.png')}}" alt="book">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1>Error Page</h1>
                <div class="page-header">
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                        <li>
                            <a href="/">
                                Home
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            404 Error Pages
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Eror Section Start -->
    <section class="Error-section section-padding fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="error-items">
                        <div class="error-image wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{asset('assets/img/404.png')}}" alt="img">
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".5s">
                            <span>Oops!</span> Page not found
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".7s">The page you are looking for does not exist</p>
                        <a href="index.html" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
                            Back to Home Pages
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection