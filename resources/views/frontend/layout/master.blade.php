<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->


<!-- Mirrored from gramentheme.com/html/bookle/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 May 2025 13:55:20 GMT -->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="gramentheme">
    <meta name="description" content="Bookle - Book Store WooCommerce Html Template ">
    <!-- ======== Page title ============ -->
    <title>Bookle - Book Store WooCommerce Html Template</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Cropper CSS -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.min.css" rel="stylesheet" />

    {{-- Include Swiper CSS (put in your layout head ideally) --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> --}}

</head>

<body>


    <!-- Cursor follower -->
    <div class="cursor-follower"></div>

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="B" class="letters-loading">
                    B
                </span>
                <span data-text-preloader="O" class="letters-loading">
                    O
                </span>
                <span data-text-preloader="O" class="letters-loading">
                    O
                </span>
                <span data-text-preloader="K" class="letters-loading">
                    K
                </span>
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
        <i class="fa-solid fa-chevron-up "></i>
    </button>

    <!-- Offcanvas Area Start -->
    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="/">
                                <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button class="mt-3">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                        feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                    </p>
                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="index-2.html">Main Street, Melbourne, Australia</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:info@example.com"><span
                                            class="mailto:info@example.com">info@example.com</span></a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="index-2.html">Mod-friday, 09am -05pm</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+11002345909">+11002345909</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <a href="contact.html" class="theme-btn text-center">
                                Get A Quote <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Sticky Header Section start  -->
    <header class="header-2 sticky-header">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-xl-9">
                            <div class="header-left">
                                <div class="logo">
                                    <a href="index.html" class="header-logo">
                                        <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                                    </a>
                                </div>
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li>
                                                    <a href="/">
                                                        Home
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Shop
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('frontend.shoplist') }}">Shop List</a>
                                                        </li>
                                                        <li><a href="{{ route('frontend.shopdetails') }}">Shop
                                                                Details</a></li>
                                                        <li><a href="{{ route('frontend.shop.shopCart') }}">Shop
                                                                Cart</a></li>
                                                    </ul>
                                                </li>
                                                <li class="has-dropdown">
                                                    <a href="#">
                                                        Pages
                                                        <i class="fas fa-angle-down"></i>
                                                    </a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('frontend.about.index') }}">About Us</a>
                                                        </li>
                                                        <li class="has-dropdown">
                                                            <a href="{{ route('frontend.author.author') }}">
                                                                Author

                                                            </a>

                                                        </li>
                                                        <li><a href="{{ route('frontend.error.index') }}">404 Page</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{ route('frontend.blog.index') }}">
                                                        Blog
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="{{ route('frontend.contact.index') }}">Contact</a>
                                                </li>
                                                @auth
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <button type="submit"
                                                                style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
                                                                <a type="submit">Logout</a>
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endauth
                                                @guest
                                                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                                @endguest



                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @auth
                            <div class="col-6 col-xl-3 d-flex align-items-center justify-content-end gap-3">
                                <!-- Search form -->
                                <form id="search-form" action="{{ route('frontend.book.search') }}" method="GET"
                                    class="me-3 position-relative" style="width: 320px; min-width: 250px;">
                                    <div class="input-group rounded-3 shadow-sm position-relative">
                                        <input type="text" class="form-control border-end-0" name="query"
                                            id="search-query" placeholder="Search by author, title, or description"
                                            aria-label="Search" aria-describedby="search-button" autocomplete="off">
                                        <button
                                            class="btn btn-outline-primary border-start-0 d-flex align-items-center justify-content-center"
                                            type="submit" id="search-button" style="width: 45px;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <!-- Clear button -->
                                        <button type="button" id="clear-search"
                                            class="btn btn-outline-secondary position-absolute"
                                            style="top: 50%; right: 55px; transform: translateY(-50%); display: none; padding: 0 8px; border-radius: 0 0.375rem 0.375rem 0; z-index: 10;">
                                            &times;
                                        </button>
                                    </div>
                                </form>

                                <!-- User dropdown -->
                                @php
                                    $user = auth()->user();
                                    $defaultImage = asset('assets/img/avatars/avatar-2.png');

                                    // Get profile image from userProfile if exists, else default
                                    $profileImage =
                                        $user && $user->userProfile && $user->userProfile->profile_image
                                            ? asset('storage/' . $user->userProfile->profile_image)
                                            : $defaultImage;

                                    $userName = $user ? $user->name : 'Guest User';

                                    // Get profession from userProfile or default string
                                    $userProfession =
                                        $user && $user->userProfile && $user->userProfile->profession
                                            ? $user->userProfile->profession
                                            : 'Professional';
                                @endphp

                                <div class="user-box dropdown">
                                    <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        <img src="{{ $profileImage }}" class="user-img rounded-circle" alt="user avatar"
                                            style="width:40px; height:40px; object-fit:cover;">

                                        <div class="user-info d-none d-xl-block">
                                            <p class="user-name mb-0 fw-semibold">{{ $userName }}</p>
                                            <p class="designattion mb-0 text-muted small">{{ $userProfession }}</p>
                                        </div>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('frontend.profile.show', $user->id) }}"><i
                                                    class="bx bx-user fs-5 me-2"></i>Profile</a></li>
                                        <li><a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('user-dashboard') }}"><i
                                                    class="bx bx-home-circle fs-5 me-2"></i>Dashboard</a></li>
                                        <li><a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('books.downloads') }}"><i
                                                    class="bx bx-download fs-5 me-2"></i>Downloads</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                                    <i class="bx bx-log-out-circle fs-5 me-2"></i>Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>


            </div>
        </div>
    </header>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="identityBox">
                        <div class="form-wrapper">
                            <h1 id="loginModalLabel">welcome back!</h1>
                            <input class="inputField" type="email" name="email" placeholder="Email Address">
                            <input class="inputField" type="password" name="password" placeholder="Enter Password">
                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next"
                                        id="saveForNext">
                                    <label for="saveForNext">Remember me</label>
                                </div>
                                <div class="text"> <a href="index-2.html">Forgot Your password?</a> </div>
                            </div>
                            <div class="loginBtn">
                                <a href="index-2.html" class="theme-btn rounded-0"> Log in </a>
                            </div>
                            <div class="orting-badge">
                                Or
                            </div>
                            <div>
                                <a class="another-option" href="https://www.google.com/">
                                    <img src="{{ asset('assets/img/google.png') }}" alt="google">
                                    Continue With Google
                                </a>
                            </div>
                            <div>
                                <a class="another-option another-option-two" href="https://www.facebook.com/">
                                    <img src="{{ asset('assets/img/facebook.png') }}" alt="google">
                                    Continue With Facebook
                                </a>
                            </div>

                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault">
                                <label class="form-check-label">
                                    I Accept Your Terms & Conditions
                                </label>
                            </div>
                        </div>

                        <div class="banner">
                            <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Log in</button>
                            <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                data-bs-target="#registrationModal">Create
                                Account</button>
                            <div class="loginBg">
                                <img src="{{ asset('assets/img/signUpbg.jpg') }}" alt="signUpBg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="identityBox">
                        <div class="form-wrapper">
                            <h1 id="registrationModalLabel">Create account!</h1>
                            <input class="inputField" type="text" name="name" id="name"
                                placeholder="User Name">
                            <input class="inputField" type="email" name="email" placeholder="Email Address">
                            <input class="inputField" type="password" name="password" placeholder="Enter Password">
                            <input class="inputField" type="password" name="password"
                                placeholder="Enter Confirm Password">
                            <div class="input-check remember-me">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" class="form-check-input" name="save-for-next"
                                        id="rememberMe">
                                    <label for="rememberMe">Remember me</label>
                                </div>
                                <div class="text"> <a href="index-2.html">Forgot Your password?</a> </div>
                            </div>
                            <div class="loginBtn">
                                <a href="index-2.html" class="theme-btn rounded-0"> Log in </a>
                            </div>
                            <div class="orting-badge">
                                Or
                            </div>
                            <div>
                                <a class="another-option" href="https://www.google.com/">
                                    <img src="{{ asset('assets/img/google.png') }}" alt="google">
                                    Continue With Google
                                </a>
                            </div>
                            <div>
                                <a class="another-option another-option-two" href="https://www.facebook.com/">
                                    <img src="{{ asset('assets/img/facebook.png') }}" alt="google">
                                    Continue With Facebook
                                </a>
                            </div>
                            <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault">
                                <label class="form-check-label">
                                    I Accept Your Terms & Conditions
                                </label>
                            </div>
                        </div>

                        <div class="banner">
                            <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Log in</button>
                            <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                data-bs-target="#registrationModal">Create
                                Account</button>
                            <div class="signUpBg">
                                <img src="{{ asset('assets/img/registrationbg.jpg') }}" alt="signUpBg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Footer Section Start -->
    <footer class="footer-section footer-bg">
        <div class="container">
            <div class="contact-info-area">
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="icon-icon-5 mt-3"></i>
                    </div>
                    <div class="content">
                        <p>Call Us 7/24</p>
                        <h3>
                            <a href="tel:+2085550112">+208-555-0112</a>
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="icon-icon-6 mt-3"></i>
                    </div>
                    <div class="content">
                        <p>Make a Quote</p>
                        <h3>
                            <a href="mailto:example@gmail.com">example@gmail.com</a>
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="icon-icon-7 mt-3"></i>
                    </div>
                    <div class="content">
                        <p>Opening Hour</p>
                        <h3>
                            Sunday - Fri: 9 aM - 6 pM
                        </h3>
                    </div>
                </div>
                <div class="contact-info-items wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="icon-icon-8 mt-3"></i>
                    </div>
                    <div class="content">
                        <p>Location</p>
                        <h3>
                            4517 Washington ave.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-widgets-wrapper">
            <div class="plane-shape float-bob-y">
                <img src="assets/img/plane-shape.png" alt="img">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <a href="index.html">
                                    <img src="assets/img/logo/white-logo.svg" alt="logo-img">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>
                                    Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur
                                    lacinia mollis
                                </p>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Costumers Support</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Store List
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Opening Hours
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Return Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Categories</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Novel Books
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Poetry Books
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        Political Books
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="fa-solid fa-chevrons-right"></i>
                                        History Books
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="footer-content">
                                <p>Sign up to searing weekly newsletter to get the latest updates.</p>
                                <div class="footer-input">
                                    <input type="email" id="email2" placeholder="Enter Email Address">
                                    <button class="newsletter-btn" type="submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft" data-wow-delay=".3s">
                        © All Copyright 2024 by <a href="index.html">Bookle</a>
                    </p>
                    <ul class="brand-logo wow fadeInRight" data-wow-delay=".5s">
                        <li>
                            <a href="contact.html">
                                <img src="{{ asset('assets/img/visa-logo.png') }}" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="{{ asset('assets/img/mastercard.png') }}" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="{{ asset('assets/img/payoneer.png') }}" alt="img">
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <img src="{{ asset('assets/img/affirm.png') }}" alt="img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Gsap -->
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Cropper.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Cropper JS -->
    <script src="https://unpkg.com/cropperjs"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("search-query");
            const resultsDiv = document.getElementById("search-results");
            const defaultSection = document.getElementById("default-book-section");
            let debounceTimer;
            let currentQuery = "";

            // Live search as you type
            input.addEventListener("input", function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const query = input.value.trim();
                    currentQuery = query; // store current query

                    if (query.length === 0) {
                        resultsDiv.innerHTML = "";
                        defaultSection.style.display = "block";
                        return;
                    }

                    fetchResults(
                        `{{ route('frontend.book.search') }}?query=${encodeURIComponent(query)}`
                    );
                }, 300); // 300ms debounce
            });

            // AJAX pagination handling - delegate click on links inside #search-results
            resultsDiv.addEventListener("click", function(e) {
                // Check if clicked element is a pagination link
                if (e.target.tagName === "A" && e.target.closest(".pagination")) {
                    e.preventDefault();
                    let url = e.target.getAttribute("href");

                    // Ensure current query is included in pagination URL
                    const urlObj = new URL(url, window.location.origin);
                    if (currentQuery) {
                        urlObj.searchParams.set('query', currentQuery);
                    }
                    url = urlObj.toString();

                    fetchResults(url);
                }
            });

            function fetchResults(url) {
                fetch(url)
                    .then(res => {
                        if (!res.ok) throw new Error('Network response was not ok');
                        return res.text();
                    })
                    .then(html => {
                        resultsDiv.innerHTML = html;
                        defaultSection.style.display = "none";
                        // Scroll to results smoothly
                        resultsDiv.scrollIntoView({
                            behavior: "smooth"
                        });
                    })
                    .catch(err => {
                        console.error("Search failed:", err);
                        resultsDiv.innerHTML = "<p class='text-danger'>Something went wrong.</p>";
                    });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('welcome_message'))
        <script>
            Swal.fire({
                title: '🎉 Welcome, {{ session('welcome_message') }}!',
                text: 'You’ve taken the first step toward something amazing!',
                icon: 'success',
                confirmButtonText: 'Let’s Go!'
            });
        </script>
        @php
            session()->forget('welcome_message');
        @endphp
    @endif

    @if (session('login_message'))
        <script>
            Swal.fire({
                title: '👋 Welcome back, {{ session('login_message') }}!',
                text: 'We’re happy to see you again!',
                icon: 'info',
                confirmButtonText: 'Continue'
            });
        </script>
        @php
            session()->forget('login_message');
        @endphp
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('search-form');
            const searchInput = document.getElementById('search-query');
            const clearBtn = document.getElementById('clear-search');

            // Optional: Prevent form submission if you want to handle search with JS
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // You can add search logic here if needed
                // alert('Form submit prevented! You can implement search logic here.');
            });

            // Show or hide clear button based on input value
            searchInput.addEventListener('input', () => {
                clearBtn.style.display = searchInput.value.length > 0 ? 'block' : 'none';
            });

            // Clear input on clear button click
            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                clearBtn.style.display = 'none';
                searchInput.focus();
            });
        });
    </script>




</body>


<!-- Mirrored from gramentheme.com/html/bookle/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 May 2025 13:55:36 GMT -->

</html>
