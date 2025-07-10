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
                <div class="swiper-wrapper">
                    @foreach ($books as $book)
                        <div class="swiper-slide">
                            <div class="shop-box-items style-2">
                                <div class="book-thumb center">
                                    <a href="{{ route('frontend.shopdetails', ['id' => $book->id]) }}">
                                        <img src="{{ asset($book->image_path ?? 'assets/img/default-book.png') }}"
                                            alt="{{ $book->title }}">
                                    </a>
                                    <ul class="post-box">
                                        <li>Hot</li>
                                        <li>-{{ round((($book->price - $book->discount_price) / $book->price) * 100) }}%
                                        </li>
                                    </ul>
                                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#"><img class="icon"
                                                    src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="shuffle"></a>
                                        </li>
                                        <li><a href="{{ route('frontend.shopDetailsData', ['id' => $book->id]) }}"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                    <div class="shop-button">
                                        <a href="#" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i> Add
                                            To Cart</a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <h5>{{ $book->category->name ?? 'Category' }}</h5>
                                    <h3><a
                                            href="{{ route('frontend.shopdetails', ['id' => $book->id]) }}">{{ $book->title }}</a>
                                    </h3>
                                    <ul class="price-list">
                                        <li>${{ number_format($book->discount_price, 2) }}</li>
                                        <li><del>${{ number_format($book->price, 2) }}</del></li>
                                    </ul>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="thumb">
                                                <img src="{{ asset($book->author->photo ?? 'assets/img/testimonial/default.png') }}"
                                                    alt="author">
                                            </span>
                                            <span class="content">{{ $book->author->name ?? 'Author' }}</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i> {{ number_format($book->rating ?? 0, 1) }}
                                            ({{ $book->reviews_count ?? 0 }})
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>
    </section>

    <!-- Featured Books Section Start -->
    <section class="featured-books-section pt-100 pb-145 fix section-bg">
        <div class="container">
            <div class="section-title-area justify-content-center">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>Featured Books</h2>
                </div>
            </div>

            <div class="swiper featured-books-slider">
                <div class="swiper-wrapper">

                    @foreach ($books as $book)
                        @php
                            // Decode author images array and get first image or fallback
                            $authorImages = json_decode($book->author->image_paths ?? '[]', true);
                            $authorImage = $authorImages[0] ?? 'default-author.png';

                            // Book image path (single string)
                            $bookImage = $book->image_path ?? 'default-book.png';

                            // Calculate average rating stars (optional, if you have reviews relationship)
                            $avgRating = round($book->reviews_avg_rating ?? 0);

                            // Stock info example (you can add it to DB and model)
                            $stockCount = $book->stock ?? 25; // fallback 25 if not present
                        @endphp

                        <div class="swiper-slide">
                            <div class="shop-box-items style-4 wow fadeInUp" data-wow-delay=".2s">
                                <div class="book-thumb center">
                                    <a href="{{ route('frontend.shopDetailsData', $book->id) }}">
                                        <img src="{{ asset('storage/' . $bookImage) }}" alt="img">
                                    </a>
                                </div>

                                <div class="shop-content">
                                    <ul class="book-category">
                                        <li class="book-category-badge">{{ $book->category }}</li>
                                        <li>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $avgRating)
                                                    <i class="fa-solid fa-star"></i>
                                                @else
                                                    <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                            ({{ $book->reviews_count ?? 0 }})
                                        </li>
                                    </ul>

                                    <h3><a
                                            href="{{ route('frontend.shopDetailsData', $book->id) }}">{{ $book->name }}</a>
                                    </h3>

                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="thumb">
                                                <img src="{{ asset('storage/' . $authorImage) }}" alt="img">
                                            </span>
                                            <span class="content">{{ $book->author->name }}
                                                {{ $book->author->last_name }}</span>
                                        </li>
                                    </ul>

                                    <div class="book-availablity">
                                        <div class="details">
                                            <ul class="price-list">
                                                <li>${{ number_format($book->final_price, 2) }}</li>
                                                @if ($book->discount > 0)
                                                    <li><del>${{ number_format($book->price, 2) }}</del></li>
                                                @endif
                                            </ul>

                                            {{-- You can customize the progress bar here --}}
                                            <div class="progress-line"></div>
                                            <p>{{ $stockCount }} Books in stock</p>
                                        </div>

                                        <div class="shop-btn">
                                            <a href="">
                                                <i class="fa-regular fa-basket-shopping"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
                <a href="{" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">
                    Explore More <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="book-shop-wrapper style-2">
                @foreach ($bestSellers as $index => $book)
                    @php
                        // Decode author images and get first image or fallback
                        $authorImages = json_decode($book->author->image_paths ?? '[]', true);
                        $authorImage = $authorImages[0] ?? 'default-author.png';

                        // Rating rounded
                        $avgRating = number_format($book->reviews_avg_rating ?? 0, 1);

                        // Number of reviews
                        $reviewsCount = $book->reviews_count ?? 0;

                        // Delay for animation increment (0.2s, 0.4s, 0.6s, ...)
                        $delay = 0.2 + $index * 0.2;

                        // Calculate final price considering discount (assuming discount is percentage)
                        $finalPrice =
                            $book->discount > 0 ? $book->price - $book->price * ($book->discount / 100) : $book->price;
                    @endphp

                    <div class="shop-box-items style-3 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                        <div class="book-thumb center">
                            <a href="{{ route('frontend.shopDetailsData', $book->id) }}">
                                <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->name }}">
                            </a>
                        </div>

                        <div class="shop-content">
                            <ul class="book-category">
                                <li class="book-category-badge">{{ $book->category }}</li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                    {{ $avgRating }} ({{ $reviewsCount }})
                                </li>
                            </ul>

                            <h3><a href="{{ route('frontend.shopDetailsData', $book->id) }}">{{ $book->name }}</a></h3>

                            <ul class="author-post">
                                <li class="authot-list">
                                    <span class="content">{{ $book->author->name ?? 'Unknown Author' }}</span>
                                </li>
                            </ul>

                            <ul class="price-list">
                                <li>${{ number_format($finalPrice, 2) }}</li>
                                @if ($book->discount > 0)
                                    <li><del>${{ number_format($book->price, 2) }}</del></li>
                                @endif
                            </ul>

                            <div class="shop-button">
                                <a href="" class="theme-btn">
                                    <i class="fa-solid fa-basket-shopping"></i> Add To Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <a href="{{ route('frontend.shop-list') }}" class="theme-btn transparent-btn wow fadeInUp"
                    data-wow-delay=".5s">
                    Explore More <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="book-shop-wrapper">
                @foreach ($books->take(4) as $index => $book)
                    <div class="shop-box-items style-2 wow fadeInUp" data-wow-delay=".{{ $index + 2 }}s">
                        <div class="book-thumb center">
                            <a href="{{ route('frontend.shopDetailsData', $book->id) }}">
                                <img src="{{ asset($book->cover_image ?? 'assets/img/book/default.png') }}"
                                    alt="book-img">
                            </a>
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li>
                                    <a href="#"><img class="icon"
                                            src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="icon"></a>
                                </li>
                                <li><a href="#"><i class="far fa-eye"></i></a></li>
                            </ul>
                            <div class="shop-button">
                                <a href="#" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i> Add To
                                    Cart</a>
                            </div>
                        </div>
                        <div class="shop-content">
                            <h5>{{ $book->category->name ?? 'Book' }}</h5>
                            <h3>
                                <a href="{{ route('frontend.shopDetailsData', $book->id) }}">
                                    {{ Str::limit($book->title, 40) }}
                                </a>
                            </h3>
                            <ul class="price-list">
                                <li>${{ number_format($book->price - $book->discount, 2) }}</li>
                                <li><del>${{ number_format($book->price, 2) }}</del></li>
                            </ul>
                            <ul class="author-post">
                                <li class="authot-list">
                                    <span class="thumb">
                                        <img src="{{ asset($book->author->profile_image ?? 'assets/img/testimonial/default.png') }}"
                                            alt="author">
                                    </span>
                                    <span class="content">{{ $book->author->name ?? 'Unknown Author' }}</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                    {{ number_format($book->reviews_avg_rating ?? 0, 1) }}
                                    ({{ $book->reviews_count ?? 0 }})
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach

                {{-- Keep this static image at the end --}}
                <div class="cta-shop-box" style=" overflow: hidden;">
                    <div class="girl-shape text-center">
                        <img src="{{ asset('assets/img/wiyar.jpg') }}" alt="shape-img"
                            style="overflow: hidden; width: 300px; height: auto; align-items: center;">
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
    <section class="team-section fix section-padding ">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Authors</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. <br> Donec at nulla nulla. Duis posuere ex
                    lacus
                </p>
            </div>

            <div class="array-button">
                <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                <button class="array-next"><i class="fal fa-arrow-right"></i></button>
            </div>

            <div class="swiper team-slider">
                <div class="swiper-wrapper">
                    @foreach ($authors as $author)
                        @php
                            $images = json_decode($author->image_paths, true);
                            $firstImage = !empty($images) && is_array($images) ? $images[0] : null;
                            $imageUrl =
                                $firstImage && Storage::disk('public')->exists($firstImage)
                                    ? Storage::url($firstImage)
                                    : asset($firstImage ?? 'assets/img/avatars/avatar-1.png');
                        @endphp
                        <div class="swiper-slide">
                            <div class="team-box-items">
                                <div class="team-image d-flex justify-content-center">
                                    <div class="rounded overflow-hidden " style="width: 120px; height: 120px;">
                                        <img src="{{ $imageUrl }}" alt="author image"
                                            class="w-100 h-100 object-fit-cover" style="border-radius: 10rem">
                                    </div>
                                    <div class="shape-img">
                                        <img src="{{ asset('assets/img/team/shape-img.png') }}" alt="shape">
                                    </div>
                                </div>
                                <div class="team-content text-center mt-3">
                                    <h6>
                                        <a href="{{ route('admin.author.view', $author->id) }}">
                                            {{ $author->name }} {{ $author->last_name }}
                                        </a>
                                    </h6>
                                    <p>{{ $author->books_count }} Published
                                        Book{{ $author->books_count !== 1 ? 's' : '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    <script></script>
@endsection
