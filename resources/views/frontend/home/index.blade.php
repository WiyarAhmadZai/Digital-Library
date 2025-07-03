@extends('frontend.layout.master');
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

@section('content')
    <!-- Hero Section start  -->
    <div class="hero-section hero-2 fix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6 col-lg-6">
                    <div class="hero-items">
                        <div class="frame-shape1 float-bob-x">
                            <img src="{{ asset('assets/img/hero/hero2-shape1.png') }}" alt="shape-img">
                        </div>
                        <div class="frame-shape2 float-bob-y">
                            <img src="{{ asset('assets/img/hero/hero2-shape2.png') }}" alt="shape-img">
                        </div>
                        <div class="book-image">
                            <img src="{{ asset('assets/img/hero/hero-book.png') }}" alt="img">
                        </div>
                        <div class="hero-content">
                            <h6 class="wow fadeInUp" data-wow-delay=".3s">Explore the books</h6>
                            <h1 class="wow fadeInUp" data-wow-delay=".5s">Expand Your Mind <br> Reading a Book </h1>
                            <p class="text-capitalize">Sed ac arcu sed felis vulputate molestie. Nullam at urna in velit
                                finibus vestibulum euismod a <br> urna. Sed quis aliquam leo. Duis iaculis lorem mauris,
                                et convallis dui efficitur</p>
                            <div class="form-clt wow fadeInUp mt-5" data-wow-delay=".9s">
                                <button type="submit" class="theme-btn">
                                    Shop Now <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Banner Section start  -->
    <section class="book-banner-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="banner-book-card-items bg-cover"
                        style="background-image: url('{{ asset('assets/img/banner/book-banner-1.jpg') }}');">
                        <div class="book-shape">
                            <img src="{{ asset('assets/img/banner/book-1.png') }}" alt="img">
                        </div>
                        <div class="banner-book-content">
                            <h2>Crime Fiction <br> Books</h2>
                            <h6>15% Off on Kids' Toys and Gifts!</h6>
                            <a href="shop-details.html" class="theme-btn white-bg">Shop Now <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="banner-book-card-items bg-cover"
                        style="background-image: url('{{ asset('assets/img/banner/book-banner-2.jpg') }}');">
                        <div class="book-shape">
                            <img src="{{ asset('assets/img/banner/book-2.png') }}" alt="img">
                        </div>
                        <div class="banner-book-content">
                            <h2>One Year on <br> a Bike </h2>
                            <h6>15% Off on Kids' Toys and Gifts!</h6>
                            <a href="shop-details.html" class="theme-btn white-bg">Shop Now <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="banner-book-card-items bg-cover"
                        style="background-image: url('{{ asset('assets/img/banner/book-banner-3.jpg') }}');">
                        <div class="book-shape">
                            <img src="{{ asset('assets/img/banner/book-3.png') }}" alt="img">
                        </div>
                        <div class="banner-book-content">
                            <h2>
                                Grow With <br>
                                Flower
                            </h2>
                            <h6>15% Off on Kids' Toys and Gifts!</h6>
                            <a href="shop.html" class="theme-btn white-bg">Shop Now <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section Start -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Category Books</h2>
                </div>
                <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="swiper book-slider">
                <div class="swiper-wrapper" id="book-swiper-wrapper">
                    <!-- Slides injected here -->
                </div>
                <!-- Add navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


        </div>
    </section>

    <!-- Featured Books Section Start -->
    <section class="featured-books-section pt-100  fix section-bg">
        <div class="container">
            <div class="section-title-area justify-content-center">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>Featured Books</h2>
                </div>
            </div>
            <div class="swiper featured-books-slider">
                <div class="swiper-wrapper" id="featured-book-swiper-wrapper">
                    <!-- JS will inject slides here -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>




    <!-- Best Seller Section Start -->
    <section class="best-seller-section section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>Best Sellers</h2>
                </div>
                <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="book-shop-wrapper style-2">
                <div class="shop-box-items style-3 wow fadeInUp" data-wow-delay=".2s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/07.png') }}"
                                alt="img"></a>
                    </div>
                    <div class="shop-content">
                        <ul class="book-category">
                            <li class="book-category-badge">Adventure</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                        <h3><a href="shop-details.html">The Hidden Mystery <br> Behind</a></h3>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="content">Wilson</span>
                            </li>
                        </ul>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="shop-box-items style-3 wow fadeInUp" data-wow-delay=".4s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/08.png') }}"
                                alt="img"></a>
                    </div>
                    <div class="shop-content">
                        <ul class="book-category">
                            <li class="book-category-badge">Adventure</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                        <h3><a href="shop-details.html">Qple GPad With <br> Retina Sisplay </a></h3>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="content">Wilson</span>
                            </li>
                        </ul>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                </div>
                <div class="shop-box-items style-3 wow fadeInUp" data-wow-delay=".6s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/09.png') }}"
                                alt="img"></a>
                    </div>
                    <div class="shop-content">
                        <ul class="book-category">
                            <li class="book-category-badge">Adventure</li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                        <h3><a href="shop-details.html">Simple Things You <br> To Save BOOK </a></h3>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="content">Wilson</span>
                            </li>
                        </ul>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section Start -->
    <section class="feature-section fix section-padding pt-0">
        <div class="container">
            <div class="feature-wrapper">
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="icon-icon-1"></i>
                    </div>
                    <div class="content">
                        <h3>Return & refund</h3>
                        <p>Money back guarantee</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="icon-icon-2"></i>
                    </div>
                    <div class="content">
                        <h3>Secure Payment</h3>
                        <p>30% off by subscribing</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="icon-icon-3"></i>
                    </div>
                    <div class="content">
                        <h3>Quality Support</h3>
                        <p>Always online 24/7</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="icon-icon-4"></i>
                    </div>
                    <div class="content">
                        <h3>Daily Offers</h3>
                        <p>20% off by subscribing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section Start -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>Discover Your Favorite Author Books</h2>
                </div>
                <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="book-shop-wrapper">
                <div class="shop-box-items style-2 wow fadeInUp" data-wow-delay=".2s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/03.png') }}"
                                alt="img"></a>
                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="shop-cart.html">
                                    <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="svg-icon">
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                    <div class="shop-content">
                        <h5> Design Low Book </h5>
                        <h3><a href="shop-details.html">The Hidden Mystery <br> Behind</a></h3>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="thumb">
                                    <img src="{{ asset('assets/img/testimonial/client-1.png') }}" alt="img">
                                </span>
                                <span class="content">Wilson</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-box-items style-2 wow fadeInUp" data-wow-delay=".3s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/02.png') }}"
                                alt="img"></a>
                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="shop-cart.html">
                                    <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="svg-icon">
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                    <div class="shop-content">
                        <h5> Design Low Book </h5>
                        <h3><a href="shop-details.html">Qple GPad With Retina <br> Sisplay</a></h3>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="thumb">
                                    <img src="{{ asset('assets/img/testimonial/client-2.png') }}" alt="img">
                                </span>
                                <span class="content">Hawkins</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-box-items style-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/04.png') }}"
                                alt="img"></a>
                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="shop-cart.html">
                                    <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="svg-icon">
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                    <div class="shop-content">
                        <h5> Design Low Book </h5>
                        <h3><a href="shop-details.html">Flovely and Unicom <br> Erna</a></h3>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="thumb">
                                    <img src="{{ asset('assets/img/testimonial/client-3.png') }}" alt="img">
                                </span>
                                <span class="content">Esther</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-box-items style-2 wow fadeInUp" data-wow-delay=".5s">
                    <div class="book-thumb center">
                        <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/05.png') }}"
                                alt="img"></a>
                        <ul class="post-box">
                            <li>
                                -30%
                            </li>
                        </ul>
                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="shop-cart.html">
                                    <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="svg-icon">
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                        <div class="shop-button">
                            <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                Add To Cart</a>
                        </div>
                    </div>
                    <div class="shop-content">
                        <h5> Design Low Book </h5>
                        <h3><a href="shop-details.html">How Deal With Very <br> Bad BOOK</a></h3>
                        <ul class="price-list">
                            <li>$30.00</li>
                            <li>
                                <del>$39.99</del>
                            </li>
                        </ul>
                        <ul class="author-post">
                            <li class="authot-list">
                                <span class="thumb">
                                    <img src="{{ asset('assets/img/testimonial/client-4.png') }}" alt="img">
                                </span>
                                <span class="content">(Author) Albert</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-star"></i>
                                3.4 (25)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cta-shop-box">
                    <div class="girl-shape">
                        <img src="{{ asset('assets/img/boy-shape.png') }}" alt="shape-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Banner Section Start -->
    <section class="cta-banner-section fix section-padding pt-0">
        <div class="container">
            <div class="cta-banner-wrapper style-2 section-padding bg-cover"
                style="background-image: url('{{ asset('assets/img/cta-banner2.jpg') }}');">
                <div class="overlay"></div>
                <div class="cta-content text-left">
                    <h2 class="text-white mb-40 wow fadeInUp" data-wow-delay=".3s">Get 25% discount in all <br> kind of
                        super Selling</h2>
                    <a href="shop.html" class="theme-btn white-bg wow fadeInUp" data-wow-delay=".5s">Shop Now <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Section Start -->
    <section class="shop-section section-padding fix pt-0">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Pick Your Favorite Books</h2>
                </div>
                <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="swiper book-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/01.png') }}"
                                        alt="img"></a>
                                <ul class="post-box">
                                    <li>
                                        Hot
                                    </li>
                                    <li>
                                        -30%
                                    </li>
                                </ul>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">
                                            <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}"
                                                alt="svg-icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                                <div class="shop-button">
                                    <a href="shop-details.html" class="theme-btn"><i
                                            class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5> Design Low Book </h5>
                                <h3><a href="shop-details.html">Simple Things You To <br> Save BOOK</a></h3>
                                <ul class="price-list">
                                    <li>$30.00</li>
                                    <li>
                                        <del>$39.99</del>
                                    </li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="{{ asset('assets/img/testimonial/client-1.png') }}" alt="img">
                                        </span>
                                        <span class="content">Wilson</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        3.4 (25)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/02.png') }}"
                                        alt="img"></a>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">
                                            <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}"
                                                alt="svg-icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                                <div class="shop-button">
                                    <a href="shop-details.html" class="theme-btn"><i
                                            class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5> Design Low Book </h5>
                                <h3><a href="shop-details.html">How Deal With Very <br> Bad BOOK</a></h3>
                                <ul class="price-list">
                                    <li>$39.00</li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="{{ asset('assets/img/testimonial/client-2.png') }}" alt="img">
                                        </span>
                                        <span class="content">Esther</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        3.4 (25)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="assets/img/book/03.png" alt="img"></a>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">
                                            <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}"
                                                alt="svg-icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                                <div class="shop-button">
                                    <a href="shop-details.html" class="theme-btn"><i
                                            class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5> Design Low Book </h5>
                                <h3><a href="shop-details.html">The Hidden Mystery <br> Behind</a></h3>
                                <ul class="price-list">
                                    <li>
                                        $29.00
                                    </li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="{{ asset('assets/img/testimonial/client-3.png') }}" alt="img">
                                        </span>
                                        <span class="content">Hawkins</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        3.4 (25)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/04.png') }}"
                                        alt="img"></a>
                                <ul class="post-box">
                                    <li>
                                        -12%
                                    </li>
                                </ul>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">
                                            <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}"
                                                alt="svg-icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                                <div class="shop-button">
                                    <a href="shop-details.html" class="theme-btn"><i
                                            class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5> Design Low Book </h5>
                                <h3><a href="shop-details.html">Qple GPad With Retina <br> Sisplay</a></h3>
                                <ul class="price-list">
                                    <li>$19.00</li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="{{ asset('assets/img/testimonial/client-4.png') }}" alt="img">
                                        </span>
                                        <span class="content">(Author) Albert </span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        3.4 (25)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="assets/img/book/05.png" alt="img"></a>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">
                                            <img class="icon" src="{{ asset('assets/img/icon/shuffle.svg') }}"
                                                alt="svg-icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                                <div class="shop-button">
                                    <a href="shop-details.html" class="theme-btn"><i
                                            class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5> Design Low Book </h5>
                                <h3><a href="shop-details.html">Flovely and Unicom <br> Erna</a></h3>
                                <ul class="price-list">
                                    <li>$30.00</li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="{{ asset('assets/img/testimonial/client-5.png') }}" alt="img">
                                        </span>
                                        <span class="content">Alexander</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        3.4 (25)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section Start -->
    <section class="team-section fix section-padding pt-0 margin-bottom-30">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Author</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. <br> Donec at nulla nulla. Duis posuere ex lacus</p>
            </div>
            <div class="array-button">
                <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                <button class="array-next"><i class="fal fa-arrow-right"></i></button>
            </div>
            <div class="swiper team-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/01.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Esther Howard</a></h6>
                                <p>10 Published Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/02.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Shikhon Islam</a></h6>
                                <p>07 Published Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/03.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Kawser Ahmed</a></h6>
                                <p>04 Published Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/04.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Brooklyn Simmons</a></h6>
                                <p>15 Published Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/05.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Leslie Alexander</a></h6>
                                <p>05 Published Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box-items">
                            <div class="team-image">
                                <div class="thumb">
                                    <img src="{{ asset('assets/img/team/06.jpg') }}" alt="img">
                                </div>
                                <div class="shape-img">
                                    <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h6><a href="team-details.html">Guy Hawkins</a></h6>
                                <p>12 Published Books</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section Start -->
    <section class="news-section fix section-padding section-bg">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Our Latest News</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. <br> Donec at nulla nulla. Duis posuere ex lacus</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/09.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/news/09.jpg') }}" alt="img">
                            <div class="post-box">
                                Activities
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-light fa-calendar-days"></i>
                                    Feb 10, 2024
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Montes suspendisse massa curae malesuada</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/10.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/news/10.jpg') }}" alt="img">
                            <div class="post-box">
                                Activities
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-light fa-calendar-days"></i>
                                    Mar 20, 2024
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Playful Picks Paradise: Kids’ Essentials with Dash.</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/11.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/news/11.jpg') }}" alt="img">
                            <div class="post-box">
                                Activities
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-light fa-calendar-days"></i>
                                    Jun 14, 2024
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Tiny Emporium: Playful Picks for Kids’ Delightful Days.</a>
                            </h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <img src="{{ asset('assets/img/news/12.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/news/12.jpg') }}" alt="img">
                            <div class="post-box">
                                Activities
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-light fa-calendar-days"></i>
                                    Mar 12, 2024
                                </li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Eu parturient dictumst fames quam tempor</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/book/getBooks")
                .then(response => response.json())
                .then(books => {
                    const wrapper = document.getElementById("book-swiper-wrapper");
                    wrapper.innerHTML = "";

                    // Ensure minimum 5 slides
                    while (books.length < 5) {
                        books.push({
                            id: 0,
                            name: "Placeholder Book",
                            category: "Category",
                            price: 0,
                            currency_type: "$",
                            discount: 0,
                            image_path: "default-book.png",
                            author: {
                                name: "Unknown Author",
                                image_path: "default-author.png"
                            }
                        });
                    }

                    books.forEach(book => {
                        wrapper.innerHTML += `
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="/book/${book.id}">
                                    <img src="/storage/${book.image_path}" alt="Book Image">
                                </a>
                                <ul class="post-box">
                                    <li>Hot</li>
                                    <li>-${book.discount || 0}%</li>
                                </ul>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><img class="icon" src="/assets/img/icon/shuffle.svg" alt="icon"></a></li>
                                    <li><a href="#"><i class="far fa-eye"></i></a></li>
                                </ul>
                                <div class="shop-button">
                                    <a href="#" class="theme-btn">
                                        <i class="fa-solid fa-basket-shopping"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="shop-content">
                                <h5>${book.category}</h5>
                                <h3><a href="/book/${book.id}">${book.name}</a></h3>
                                <ul class="price-list">
                                    <li>${book.currency_type} ${book.price}</li>
                                </ul>
                                <ul class="author-post">
                                    <li class="authot-list">
                                        <span class="thumb">
                                            <img src="/storage/${book.author?.image_path || 'default-author.png'}" alt="Author">
                                        </span>
                                        <span class="content">${book.author?.name || 'Unknown Author'}</span>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i> 4.0 (100)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `;
                    });

                    // Initialize Swiper
                    new Swiper('.book-slider', {
                        loop: true,
                        slidesPerView: 3,
                        spaceBetween: 30,
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                })
                .catch(error => console.error("Error loading books:", error));
        });

        // ajax request for feature books data \
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/book/getFeaturedBooks')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(books => {
                    const wrapper = document.getElementById("featured-book-swiper-wrapper");
                    if (!wrapper) {
                        console.error("Featured books wrapper not found.");
                        return;
                    }

                    wrapper.innerHTML = "";

                    books.forEach(book => {
                        const author = book.author ? book.author.name : 'Unknown Author';
                        const imagePath = `/storage/${book.image_path}`;
                        const clientImage =
                            `/assets/img/testimonial/client-${Math.floor(Math.random() * 3) + 1}.png`;

                        const slide = `
<div class="swiper-slide">
    <div class="shop-box-items style-4 wow fadeInUp" data-wow-delay=".2s" style="
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        padding: 10px;
        height: 300px;
    ">
        <!-- Book Image (Left) -->
        <div class="book-thumb" style="

            height: 250px;
            overflow: hidden;
            border-radius: 8px;

        ">
            <a href="/book/${book.id}">
                <img src="${imagePath}" alt="${book.name}" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                ">
            </a>
        </div>

        <!-- Book Info (Right) -->
        <div class="shop-content" style="flex: 1;">
            <ul class="book-category" style="margin: 0 0 4px 0;">
                <li class="book-category-badge" style="
                    display: inline-block;
                    background: #3b82f6;
                    color: white;
                    font-size: 12px;
                    padding: 2px 8px;
                    border-radius: 4px;
                ">${book.category}</li>
            </ul>
            <h3 style="margin: 4px 0 6px; font-size: 16px;">
                <a href="/book/${book.id}" style="text-decoration: none; color: #111;">
                    ${book.name}
                </a>
            </h3>
            <ul class="author-post" style="display: flex; align-items: center; gap: 6px; margin-bottom: 6px;">
                <li class="authot-list" style="display: flex; align-items: center;">
                    <span class="thumb" style="width: 24px; height: 24px; border-radius: 50%; overflow: hidden; display: inline-block; margin-right: 5px;">
                        <img src="${clientImage}" alt="author" style="width: 100%; height: 100%; object-fit: cover;">
                    </span>
                    <span class="content" style="font-size: 13px; color: #333;">${author}</span>
                </li>
            </ul>
            <ul class="price-list" style="display: flex; gap: 10px; margin-bottom: 4px;">
                <li style="color: green; font-size: 15px; font-weight: bold;">${book.currency_type} ${book.price}</li>
                <li style="text-decoration: line-through; color: red; font-size: 12px;">${book.currency_type} ${(book.price * 1.3).toFixed(2)}</li>
            </ul>
            <p style="font-size: 12px; color: #666; margin: 0;">
                ${Math.floor(Math.random() * 40 + 10)} Books In Stock
            </p>
        </div>
    </div>
</div>
`;


                        wrapper.insertAdjacentHTML('beforeend', slide);
                    });

                    // Initialize Swiper AFTER DOM updates
                    setTimeout(() => {
                        new Swiper('.featured-books-slider', {
                            loop: true,
                            slidesPerView: 1,
                            spaceBetween: 20,
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            breakpoints: {
                                640: {
                                    slidesPerView: 1
                                },
                                768: {
                                    slidesPerView: 2
                                },
                                1024: {
                                    slidesPerView: 3
                                },
                            }
                        });
                    }, 100);
                })
                .catch(error => {
                    console.error("Error fetching featured books:", error);
                });
        });
    </script>
@endsection
