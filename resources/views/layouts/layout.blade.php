<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jun 2025 13:40:34 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/img/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome Free 6.5.1 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">


    {{-- frontend links --}}
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">

    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Cropper CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />




    {{-- end fron end links  --}}







    <title>Digital Library</title>


</head>

<body data-success-message="{{ session('success') }}" data-error-message="{{ session('error') }}">



    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('layouts.partial.sidebar')
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>

                <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                    <a href="avascript:;" class="btn d-flex align-items-center"><i class='bx bx-search'></i>Search</a>
                </div>


                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                                data-bs-toggle="dropdown"><img src="{{ asset('assets/img/county/02.png') }}"
                                    width="22" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/01.png') }}" width="20"
                                            alt=""><span class="ms-2">English</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/02.png') }}" width="20"
                                            alt=""><span class="ms-2">Catalan</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/03.png') }}" width="20"
                                            alt=""><span class="ms-2">French</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/04.png') }}" width="20"
                                            alt=""><span class="ms-2">Belize</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/05.png') }}" width="20"
                                            alt=""><span class="ms-2">Colombia</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/06.png') }}" width="20"
                                            alt=""><span class="ms-2">Spanish</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/07.png') }}" width="20"
                                            alt=""><span class="ms-2">Georgian</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                            src="{{ asset('assets/img/county/08.png') }}" width="20"
                                            alt=""><span class="ms-2">Hindi</span></a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item dark-mode d-none d-sm-flex">
                            <a class="nav-link dark-mode-icon" href="javascript:;" id="darkModeToggle">
                                <i class='bx bx-moon'></i>
                            </a>
                        </li>


                        <li class="nav-item dropdown dropdown-app">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                                href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="app-container p-2 my-2">
                                    <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/slack.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Slack</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/behance.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Behance</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/google-drive.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Dribble</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/outlook.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Outlook</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/github.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">GitHub</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/stack-overflow.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Stack</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/figma.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Stack</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/twitter.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Twitter</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/google-calendar.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Calendar</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/spotify.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Spotify</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/google-photos.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Photos</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/pinterest.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Photos</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/linkedin.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">LinkedIn</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/dribble.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Dribble</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/youtube.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">YouTube</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/google.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">News</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/envato.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Envato</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="{{ asset('assets/img/app/safari.png') }}"
                                                            width="30" alt="">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">Safari</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                    </div><!--end row-->

                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-badge">8 New</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/img/avatars/avatar-1.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5
                                                        sec ago</span></h6>
                                                <p class="msg-info">The standard chunk of lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-danger text-danger">dc
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                        ago</span></h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/img/avatars/avatar-2.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Althea Cabardo <span
                                                        class="msg-time float-end">14 sec ago</span></h6>
                                                <p class="msg-info">Many desktop publishing packages</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success">
                                                <img src="{{ asset('assets/img/app/outlook.png') }}" width="25"
                                                    alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Account Created<span
                                                        class="msg-time float-end">28 min ago</span></h6>
                                                <p class="msg-info">Successfully created new email</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-info text-info">Ss
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Product Approved <span
                                                        class="msg-time float-end">2 hrs ago</span></h6>
                                                <p class="msg-info">Your new product has approved</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/img/avatars/avatar-4.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Katherine Pechon <span
                                                        class="msg-time float-end">15 min ago</span></h6>
                                                <p class="msg-info">Making this the first true generator</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i
                                                    class='bx bx-check-square'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Your item is shipped <span
                                                        class="msg-time float-end">5 hrs ago</span></h6>
                                                <p class="msg-info">Successfully shipped your item</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary">
                                                <img src="{{ asset('assets/img/app/github.png') }}" width="25"
                                                    alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1
                                                        day ago</span></h6>
                                                <p class="msg-info">24 new authors joined last week</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/img/avatars/avatar-8.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6
                                                        hrs ago</span></h6>
                                                <p class="msg-info">It was popularised in the 1960s</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        <button class="btn btn-primary w-100">View All Notifications</button>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="alert-count">8</span>
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">My Cart</p>
                                        <p class="msg-header-badge">10 Items</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/11.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/02.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/03.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/04.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/05.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/06.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/07.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/08.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="{{ asset('assets/img/products/09.png') }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                                <p class="cart-product-price mb-0">1 X $29.00</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">$250</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i></div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="mb-0">Total</h5>
                                            <h5 class="mb-0 ms-auto">$489.00</h5>
                                        </div>
                                        <button class="btn btn-primary w-100">Checkout</button>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                @auth


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
                @endauth

            </nav>
        </div>
    </header>
    <!--end header -->

    <!--start page wrapper -->

    @yield('content')

    <!--end page wrapper -->


    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2025. All right reserved.</p>
    </footer>
    </div>
    <!--end wrapper-->

    <!-- search modal -->
    <!-- Search Modal -->
    <!-- Search Modal -->
    <div class="modal" id="SearchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input id="globalSearchInput"
                            class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search" autocomplete="off" />
                        <span class="position-absolute top-50 ms-3 translate-middle-y start-0 fs-4">
                            <i class='bx bx-search'></i>
                        </span>
                        <button id="clearSearchBtn"
                            class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2"
                            style="display:none;">&times;</button>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="searchResults" class="d-flex flex-wrap gap-3"></div>
                </div>
            </div>
        </div>
    </div>




    <!-- end search modal -->



    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--end switcher-->
    <!-- ✅ jQuery must be first -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- ✅ Then Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ✅ Then plugins -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/js/morris.js') }}"></script>

    <!-- ✅ App-specific JS -->
    <script src="{{ asset('assets/js/index2.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- ✅ Alpine (must be last and with defer) -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    {{-- frontend scripts  --}}
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Cropper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <!-- Add before </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            const $input = $('#globalSearchInput');
            const $results = $('#searchResults');
            const $clearBtn = $('#clearSearchBtn');

            function renderResults(data) {
                $results.empty();

                if (!data || (
                        data.authors.length === 0 &&
                        data.books.length === 0 &&
                        data.users.length === 0 &&
                        data.posts.length === 0
                    )) {
                    $results.html('<p class="text-muted">No results found.</p>');
                    return;
                }

                // Helper to create a card
                function createCard(title, subtitle, route) {
                    return `
                <div class="card" style="width: 18rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">${title}</h5>
                            <p class="card-text">${subtitle}</p>
                        </div>
                        <a href="${route}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            `;
                }

                // Authors
                if (data.authors.length) {
                    $results.append('<h5 class="w-100 mt-2">Authors</h5>');
                    data.authors.forEach(author => {
                        const card = createCard(
                            author.name,
                            `Books count: ${author.books_count ?? 'N/A'}`,
                            `/authors/${author.id}` // Adjust your route here
                        );
                        $results.append(card);
                    });
                }

                // Books
                if (data.books.length) {
                    $results.append('<h5 class="w-100 mt-3">Books</h5>');
                    data.books.forEach(book => {
                        const card = createCard(
                            book.title,
                            `Author: ${book.author ? book.author.name : 'N/A'}`,
                            `/books/${book.id}` // Adjust your route here
                        );
                        $results.append(card);
                    });
                }

                // Users
                if (data.users.length) {
                    $results.append('<h5 class="w-100 mt-3">Users</h5>');
                    data.users.forEach(user => {
                        const card = createCard(
                            user.name,
                            user.email,
                            `/users/${user.id}` // Adjust your route here
                        );
                        $results.append(card);
                    });
                }

                // Posts
                if (data.posts.length) {
                    $results.append('<h5 class="w-100 mt-3">Posts</h5>');
                    data.posts.forEach(post => {
                        const card = createCard(
                            post.title,
                            '', // No subtitle
                            `/posts/${post.id}` // Adjust your route here
                        );
                        $results.append(card);
                    });
                }
            }

            function clearResults() {
                $results.empty();
                $clearBtn.hide();
            }

            $input.on('input', function() {
                const query = $(this).val().trim();

                if (query.length === 0) {
                    clearResults();
                    return;
                }

                $clearBtn.show();

                $.ajax({
                    url: "{{ route('search.global') }}",
                    data: {
                        q: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        renderResults(data);
                    },
                    error: function() {
                        $results.html('<p class="text-danger">Error loading results.</p>');
                    }
                });
            });

            $clearBtn.on('click', function() {
                $input.val('');
                clearResults();
                $input.focus();
            });

            // Optional: clear results and input when modal closes
            $('#SearchModal').on('hidden.bs.modal', function() {
                $input.val('');
                clearResults();
            });
        });
    </script>


</body>

<script>
    'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
        'tccl.baseHost': 'secureserver.net'
    }, {
        'ap': 'cpsh-oh'
    }, {
        'server': 'p3plzcpnl509132'
    }, {
        'dcenter': 'p3'
    }, {
        'cp_id': '10399385'
    }, {
        'cp_cl': '8'
    }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
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




<script src='../../../../img1.wsimg.com/signals/js/clients/scc-c2/scc-c2.min.js'></script>
<!-- Mirrored from codervent.com/rocker/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jun 2025 13:41:34 GMT -->

</html>
