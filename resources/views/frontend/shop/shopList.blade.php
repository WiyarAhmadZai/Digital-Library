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
            <h1>Shop List</h1>
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
                        Shop List
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Shop Section Start -->
<section class="shop-section fix section-padding">
    <div class="container">
        <div class="shop-default-wrapper">
            <div class="row g-4">
                <div class="col-xl-12">
                    <div class="woocommerce-notices-wrapper wow fadeInUp" data-wow-delay=".3s">
                        <p>Showing 1-3 Of 34 Results </p>
                        <div class="form-clt">
                            <div class="nice-select" tabindex="0">
                                <span class="current">
                                    Default Sorting
                                </span>
                                <ul class="list">
                                    <li data-value="1" class="option selected focus">
                                        Default sorting
                                    </li>
                                    <li data-value="1" class="option">
                                        Sort by popularity
                                    </li>
                                    <li data-value="1" class="option">
                                        Sort by average rating
                                    </li>
                                    <li data-value="1" class="option">
                                        Sort by latest
                                    </li>
                                </ul>
                            </div>
                            <div class="icon active">
                                <a href="shop-list.html"><i class="fas fa-list"></i></a>
                            </div>
                            <div class="icon-2">
                                <a href="shop.html"><i class="fa-sharp fa-regular fa-grid-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                            <div class="shop-list-items">
                                <div class="shop-list-thumb">
                                    <img src="{{asset('assets/img/shop-list/01.png')}}" alt="img">
                                </div>
                                <div class="shop-list-content">
                                    <h3><a href="shop-details.html">Castle In The Sky</a></h3>
                                    <h5>$16.00</h5>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <p>
                                        Vestibulum consectetur fringilla tellus, et pulvinar massa tempus nec. Fusce
                                        nibh nibh, consectetur vitae felis quis, sagittis ullamcorper enim. Nullam
                                        maximus vehicula justo, vel vestibulum turpis dictum at. Nam sed laoreet
                                        sem. Aliquam urna massa,
                                    </p>
                                    <div class="shop-btn">
                                        <a href="shop-details.html" class="theme-btn"><i
                                                class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                        <ul class="shop-icon d-flex justify-content-center align-items-center">
                                            <li>
                                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="shop-cart.html">
                                                    <img class="icon" src="{{asset('assets/img/icon/shuffle.svg')}}"
                                                        alt="svg-icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-list-items">
                                <div class="shop-list-thumb">
                                    <img src="{{asset('assets/img/shop-list/02.png')}}" alt="img">
                                    <ul class="post-box">
                                        <li>
                                            Hot
                                        </li>
                                        <li>
                                            -30%
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-list-content">
                                    <h3><a href="shop-details.html">Simple things you to Save to Book</a></h3>
                                    <h5>$30.00</h5>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <p>
                                        Vestibulum consectetur fringilla tellus, et pulvinar massa tempus nec. Fusce
                                        nibh nibh, consectetur vitae felis quis, sagittis ullamcorper enim. Nullam
                                        maximus vehicula justo, vel vestibulum turpis dictum at. Nam sed laoreet
                                        sem. Aliquam urna massa,
                                    </p>
                                    <div class="shop-btn">
                                        <a href="shop-details.html" class="theme-btn"><i
                                                class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                        <ul class="shop-icon d-flex justify-content-center align-items-center">
                                            <li>
                                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="shop-cart.html">
                                                    <img class="icon" src="{{asset('assets/img/icon/shuffle.svg')}}"
                                                        alt="svg-icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-list-items">
                                <div class="shop-list-thumb">
                                    <img src="assets/img/shop-list/03.png" alt="img">
                                </div>
                                <div class="shop-list-content">
                                    <h3><a href="shop-details.html">Flovely And Unicom Erna</a></h3>
                                    <h5>$19.00</h5>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <p>
                                        Vestibulum consectetur fringilla tellus, et pulvinar massa tempus nec. Fusce
                                        nibh nibh, consectetur vitae felis quis, sagittis ullamcorper enim. Nullam
                                        maximus vehicula justo, vel vestibulum turpis dictum at. Nam sed laoreet
                                        sem. Aliquam urna massa,
                                    </p>
                                    <div class="shop-btn">
                                        <a href="shop-details.html" class="theme-btn"><i
                                                class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                        <ul class="shop-icon d-flex justify-content-center align-items-center">
                                            <li>
                                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="shop-cart.html">
                                                    <img class="icon" src="{{asset('assets/img/icon/shuffle.svg')}}"
                                                        alt="svg-icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-list-items">
                                <div class="shop-list-thumb">
                                    <img src="{{asset('assets/img/shop-list/04.png')}}" alt="img">
                                </div>
                                <div class="shop-list-content">
                                    <h3><a href="shop-details.html">Qple Gpod with Retina Sisplay</a></h3>
                                    <h5>$39.00</h5>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <p>
                                        Vestibulum consectetur fringilla tellus, et pulvinar massa tempus nec. Fusce
                                        nibh nibh, consectetur vitae felis quis, sagittis ullamcorper enim. Nullam
                                        maximus vehicula justo, vel vestibulum turpis dictum at. Nam sed laoreet
                                        sem. Aliquam urna massa,
                                    </p>
                                    <div class="shop-btn">
                                        <a href="shop-details.html" class="theme-btn"><i
                                                class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                        <ul class="shop-icon d-flex justify-content-center align-items-center">
                                            <li>
                                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="shop-cart.html">
                                                    <img class="icon" src="assets/img/icon/shuffle.svg"
                                                        alt="svg-icon">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-nav-wrap text-center">
                        <ul>
                            <li><a class="previous" href="shop-list.html">Previous</a></li>
                            <li><a class="page-numbers" href="shop-list.html">1</a></li>
                            <li><a class="page-numbers" href="shop-list.html">2</a></li>
                            <li><a class="page-numbers" href="shop-list.html">3</a></li>
                            <li><a class="page-numbers" href="shop-list.html">...</a></li>
                            <li><a class="next" href="shop-list.html">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection