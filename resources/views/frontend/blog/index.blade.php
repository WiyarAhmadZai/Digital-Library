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
                <h1>Blog Grid</h1>
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
                            Blog Grid
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- News Section Start -->
    <section class="news-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/05.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/05.jpg')}}" alt="img">
                            <div class="post-box">
                                Books Store
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
                            <h3><a href="news-details.html">Top 5 Tarot Decks for the Tarot World Summit</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/06.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/06.jpg')}}" alt="img">
                            <div class="post-box">
                                Educations
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
                            <h3><a href="news-details.html">Behind the Scenes with Author Victoria Aveyard</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/07.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/07.jpg')}}" alt="img">
                            <div class="post-box">
                                Romance
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
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/08.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/08.jpg')}}" alt="img">
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
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/09.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/09.jpg')}}" alt="img">
                            <div class="post-box">
                                Books Store
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
                            <h3><a href="news-details.html">How to Keep Children Safe Online In Simple Steps</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/10.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/10.jpg')}}" alt="img">
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
                            <h3><a href="news-details.html">That jerk Form Finance
                                    really threw me</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/11.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/11.jpg')}}" alt="img">
                            <div class="post-box">
                                Adventure
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
                            <h3><a href="news-details.html">Students Intelligence in Education Building Resilient</a>
                            </h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/12.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/12.jpg')}}" alt="img">
                            <div class="post-box">
                                Books Store
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
                            <h3><a href="news-details.html">From without content
                                    style without </a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/13.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/13.jpg')}}" alt="img">
                            <div class="post-box">
                                Romance
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
                            <h3><a href="news-details.html">All Inclusive Ultimate Circle Island Day with Lunch</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/14.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/14.jpg')}}" alt="img">
                            <div class="post-box">
                                Adnenture
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
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/15.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/15.jpg')}}" alt="img">
                            <div class="post-box">
                                Educations
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
                    <div class="news-card-items style-2 mt-0">
                        <div class="news-image">
                            <img src="{{asset('assets/img/news/16.jpg')}}" alt="img">
                            <img src="{{asset('assets/img/news/16.jpg')}}" alt="img">
                            <div class="post-box">
                                Books Store
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
                            <h3><a href="news-details.html">Top 10 Tarot Decks for the Tarot World Summit</a></h3>
                            <a href="news-details.html" class="theme-btn-2">Read More <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-nav-wrap text-center wow fadeInUp" data-wow-delay=".3s">
                <ul>
                    <li><a class="previous" href="news-grid.html">Previous</a></li>
                    <li><a class="page-numbers" href="news-grid.html">1</a></li>
                    <li><a class="page-numbers" href="news-grid.html">2</a></li>
                    <li><a class="page-numbers" href="news-grid.html">3</a></li>
                    <li><a class="page-numbers" href="news-grid.html">...</a></li>
                    <li><a class="next" href="news-grid.html">Next</a></li>
                </ul>
            </div>
        </div>
    </section>


@endsection