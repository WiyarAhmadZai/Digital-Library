@extends('frontend.layout.master')


<style>
    .review-wrap-area {
        display: flex;
        /* default visible style */
    }

    .review-thumb img {
        object-fit: cover;
    }

    .review-content .head-area h5,
    .review-content .head-area h6 {
        margin: 0;
    }

    .review-content p {
        margin-bottom: 0;
    }

    .review-content .star i {
        margin-right: 2px;
    }

    .review-form {
        margin-top: 2rem;
    }
</style>

@section('content')
    <!-- Breadcumb Section Start -->
    <div class="breadcrumb-wrapper">
        <div class="book1">
            <img src="{{ asset('assets/img/hero/book1.png') }}" alt="book">
        </div>
        <div class="book2">
            <img src="{{ asset('assets/img/hero/book2.png') }}" alt="book">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1>Shop Details</h1>
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
                            Shop Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Details Section Start -->
    <section class="shop-details-section fix section-padding">
        <div class="container">
            <div class="shop-details-wrapper">
                <div class="row g-4">
                    {{-- === LEFT SIDE IMAGE PREVIEW === --}}
                    <div class="col-lg-5">
                        <div class="shop-details-image">
                            {{-- Main Images --}}
                            <div class="tab-content">
                                @php $images = json_decode($book->image_path, true); @endphp
                                @foreach ($images as $index => $image)
                                    @php $imageUrl = filter_var($image, FILTER_VALIDATE_URL) ? $image : asset($image); @endphp
                                    <div id="thumb{{ $index + 1 }}"
                                        class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}">
                                        <div class="shop-details-thumb">
                                            <img src="{{ $imageUrl }}" alt="img"
                                                style="height: 380px; width: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Thumbnail Tabs --}}
                            <ul class="nav flex-nowrap overflow-auto mt-3" style="gap: 5px;">
                                @foreach ($images as $index => $image)
                                    @php $thumbUrl = filter_var($image, FILTER_VALIDATE_URL) ? $image : asset($image); @endphp
                                    <li class="nav-item" style="flex: 0 0 auto;">
                                        <a href="#thumb{{ $index + 1 }}" data-bs-toggle="tab"
                                            class="nav-link {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ $thumbUrl }}" alt="img"
                                                style="height: 60px; width: 60px; object-fit: cover;">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- === RIGHT SIDE BOOK DETAILS === --}}
                    <div class="col-lg-7">
                        <div class="shop-details-content">
                            <div class="title-wrapper mb-2">
                                <h2>{{ $book->name }}</h2>
                                <h5 class="text-muted">{{ $book->in_stock ? 'In Stock' : 'Out of Stock' }}</h5>
                            </div>

                            {{-- Rating Display --}}
                            <div class="star mb-3">
                                @php
                                    $rating = round($book->reviews_avg_rating ?? 0);
                                    $reviewCount = $book->reviews_count ?? 0;
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="fa-regular fa-star text-warning"></i>
                                    @endif
                                @endfor
                                <span>({{ $reviewCount }} Review{{ $reviewCount != 1 ? 's' : '' }})</span>
                            </div>

                            {{-- Book Description --}}
                            <p class="text-justify mb-3">
                                {{ $book->description ?? 'No description available.' }}
                            </p>

                            {{-- Price & Quantity --}}
                            <div class="d-flex align-items-center flex-wrap gap-3 mb-3">
                                <div class="price-list">
                                    <h4 class="mb-0">Total: $<span id="totalPrice">{{ $book->final_price }}</span></h4>
                                    <input type="hidden" id="unitPrice" value="{{ $book->final_price }}">
                                </div>

                                {{-- Quantity Input --}}
                                <div class="quantity-basket d-flex align-items-center">
                                    <button class="qtyminus btn btn-outline-secondary btn-sm" type="button">−</button>
                                    <input type="number" name="qty" id="qty2"
                                        class="form-control form-control-sm mx-2" min="1" max="10"
                                        value="1" style="width: 60px;">
                                    <button class="qtyplus btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>

                                {{-- Buttons --}}
                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#readMoreModal">
                                    Read A Little
                                </button>
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-basket-shopping me-1"></i> Add To Cart
                                </a>
                            </div>

                            {{-- Read More Modal --}}
                            <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content"
                                        style="background-image: url('{{ asset('assets/img/affirm.png') }}'); background-size: cover;">
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="readMoreBox px-3">
                                                <div class="content">
                                                    <h4 id="readMoreModalLabel" class="mb-3">{{ $book->name }}</h4>
                                                    @if (!empty($book->short_description))
                                                        <p class="text-justify">{{ $book->short_description }}</p>
                                                    @else
                                                        <p class="text-muted fst-italic">No preview available for this book.
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Book Meta --}}
                            <div class="category-box mt-4">
                                <div class="category-list">
                                    <ul>
                                        <li><span>SKU:</span> {{ $book->sku ?? 'N/A' }}</li>
                                        <li><span>Category:</span> {{ $book->category->name ?? 'Uncategorized' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Tags:</span>
                                            @php
                                                $tags = is_array($book->tags) ? $book->tags : explode(',', $book->tags);
                                            @endphp
                                            @foreach ($tags as $tag)
                                                <span class="badge bg-secondary me-1">{{ trim($tag) }}</span>
                                            @endforeach
                                        </li>
                                        <li><span>Format:</span> {{ $book->format ?? 'Hardcover' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Total page:</span> {{ $book->pages ?? 'N/A' }}</li>
                                        <li><span>Language:</span> {{ $book->language ?? 'English' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Publish Year:</span>
                                            {{ \Carbon\Carbon::parse($book->publish_year)->format('Y') }}</li>
                                        <li><span>Country:</span> {{ $book->country ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                            </div>

                            {{-- Feature List --}}
                            <div class="box-check mt-4">
                                <div class="check-list">
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i> Free shipping orders from $150</li>
                                        <li><i class="fa-solid fa-check"></i> 30 days exchange & return</li>
                                    </ul>
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i> Flash Discount: Starting at 30% Off</li>
                                        <li><i class="fa-solid fa-check"></i> Safe & Secure online shopping</li>
                                    </ul>
                                </div>
                            </div>

                            {{-- Social Icons --}}
                            <div class="social-icon mt-4">
                                <h6>Also Available On:</h6>
                                <a href="https://www.customer.io/"><img src="{{ asset('assets/img/cutomerio.png') }}"
                                        alt="cutomer.io"></a>
                                <a href="https://www.amazon.com/"><img src="{{ asset('assets/img/amazon.png') }}"
                                        alt="amazon"></a>
                                <a href="https://www.dropbox.com/"><img src="{{ asset('assets/img/dropbox.png') }}"
                                        alt="dropbox"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-tab section-padding pb-0">
                    <ul class="nav mb-5" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active"
                                aria-selected="true" role="tab">
                                <h6>Description</h6>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#additional" data-bs-toggle="tab" class="nav-link" aria-selected="false"
                                role="tab">
                                <h6>Additional Information</h6>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#review" data-bs-toggle="tab" class="nav-link" aria-selected="false"
                                role="tab">
                                <h6>Reviews ({{ $book->reviews->whereNull('parent_id')->whereNotNull('rating')->count() }})
                                </h6>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        {{-- Description --}}
                        <div id="description" class="tab-pane fade show active" role="tabpanel">
                            <div class="description-items">
                                <p>{!! isset($book->description) ? nl2br(e($book->description)) : 'No description available.' !!}</p>
                            </div>
                        </div>

                        {{-- Additional Information --}}
                        <div id="additional" class="tab-pane fade" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-1">Availability</td>
                                            <td class="text-2">{{ $book->availability ?? 'Available' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Categories</td>
                                            <td class="text-2">{{ $book->category->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Publish Date</td>
                                            <td class="text-2">
                                                {{ $book->publish_date ? \Carbon\Carbon::parse($book->publish_date)->format('Y') : 'N/A' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Total Page</td>
                                            <td class="text-2">{{ $book->total_pages ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Format</td>
                                            <td class="text-2">{{ $book->format ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Country</td>
                                            <td class="text-2">{{ $book->country ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Language</td>
                                            <td class="text-2">{{ $book->language ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Dimensions</td>
                                            <td class="text-2">{{ $book->dimensions ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-1">Weight</td>
                                            <td class="text-2">{{ $book->weight ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Reviews --}}
                        <div id="review" class="tab-pane fade" role="tabpanel">
                            <div class="review-items">

                                {{-- Add Review Form --}}
                                <div class="review-title mt-3 py-3 mb-3">
                                    <h4>Add Your Review</h4>
                                </div>
                                <div class="review-form mb-5">
                                    <form action="{{ route('reviews.store') }}" method="POST" class="row g-3">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id ?? '' }}">
                                        <div class="col-lg-6">
                                            <label for="user_name" class="form-label">Your Name *</label>
                                            <input type="text" class="form-control" name="user_name" id="user_name"
                                                required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="user_email" class="form-label">Your Email *</label>
                                            <input type="email" class="form-control" name="user_email" id="user_email"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="comment" class="form-label">Comment *</label>
                                            <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rating" class="form-label">Rating *</label>
                                            <select class="form-select" name="rating" id="rating" required>
                                                <option value="" disabled selected>Select Rating</option>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms"
                                                    name="terms" required>
                                                <label class="form-check-label" for="terms">I accept terms &
                                                    conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit Review</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="reviews-list">
                                    @php
                                        function renderReplies($review, $level = 1)
                                        {
                                            foreach ($review->replies as $reply) {
                                                echo '<div class="review-wrap-area d-flex gap-3 mb-3 ms-' .
                                                    min($level * 2, 5) .
                                                    '">';
                                                echo '  <div class="review-thumb">';
                                                echo '    <img src="' .
                                                    asset('assets/img/shop-details/review.png') .
                                                    '" alt="Reply User" class="rounded-circle" width="48" height="48">';
                                                echo '  </div>';
                                                echo '  <div class="review-content flex-grow-1">';
                                                echo '    <div class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">';
                                                echo '      <div class="cont">';
                                                echo '        <h6>' . ($reply->user_name ?? 'Anonymous') . '</h6>';
                                                echo '        <span>' .
                                                    $reply->created_at?->format('F d, Y \a\t h:i a') .
                                                    '</span>';
                                                echo '      </div>';
                                                echo '    </div>';
                                                echo '    <p class="mb-0">' . $reply->comment . '</p>';
                                                echo '    <button class="btn btn-sm btn-link mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#replyFormReply' .
                                                    $reply->id .
                                                    '">Reply</button>';
                                                echo '    <div class="collapse mt-2" id="replyFormReply' .
                                                    $reply->id .
                                                    '">';
                                                echo '      <form action="' .
                                                    route('reviews.store') .
                                                    '" method="POST" class="row g-3">';
                                                echo csrf_field();
                                                echo '        <input type="hidden" name="book_id" value="' .
                                                    $reply->book_id .
                                                    '">';
                                                echo '        <input type="hidden" name="parent_id" value="' .
                                                    $reply->id .
                                                    '">';
                                                echo '        <div class="col-md-6"><input type="text" name="user_name" class="form-control" placeholder="Your Name" required></div>';
                                                echo '        <div class="col-md-6"><input type="email" name="user_email" class="form-control" placeholder="Your Email" required></div>';
                                                echo '        <div class="col-12"><textarea name="comment" rows="2" class="form-control" placeholder="Your Reply" required></textarea></div>';
                                                echo '        <div class="col-12"><button type="submit" class="btn btn-sm btn-primary">Submit Reply</button></div>';
                                                echo '      </form>';
                                                echo '    </div>';

                                                if ($reply->replies->count()) {
                                                    echo '<button class="btn btn-sm btn-outline-secondary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#replies' .
                                                        $reply->id .
                                                        '">Show Replies (' .
                                                        $reply->replies->count() .
                                                        ')</button>';
                                                    echo '<div class="collapse mt-2" id="replies' . $reply->id . '">';
                                                    renderReplies($reply, $level + 1);
                                                    echo '</div>';
                                                }

                                                echo '  </div>';
                                                echo '</div>';
                                            }
                                        }
                                    @endphp

                                    @foreach ($book->reviews->whereNull('parent_id')->whereNotNull('rating') as $review)
                                        <div class="review-wrap-area d-flex gap-4 mb-4 border-bottom pb-3 review-item">
                                            <div class="review-thumb">
                                                <img src="{{ asset('assets/img/shop-details/review.png') }}"
                                                    alt="Reviewer" class="rounded-circle" width="64" height="64">
                                            </div>
                                            <div class="review-content flex-grow-1">
                                                <div
                                                    class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                    <div class="cont">
                                                        <h5>{{ $review->user_name ?? 'Anonymous' }}</h5>
                                                        <span>{{ $review->created_at?->format('F d, Y \a\t h:i a') }}</span>
                                                    </div>
                                                    <div class="star">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= ($review->rating ?? 0))
                                                                <i class="fa-solid fa-star text-warning"></i>
                                                            @else
                                                                <i class="fa-regular fa-star text-warning"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p class="mt-3 mb-2">{{ $review->comment ?? '' }}</p>
                                                <button class="btn btn-sm btn-link mt-2" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#replyForm{{ $review->id }}">Reply</button>
                                                <div class="collapse mt-2" id="replyForm{{ $review->id }}">
                                                    <form action="{{ route('reviews.store') }}" method="POST"
                                                        class="row g-3">
                                                        @csrf
                                                        <input type="hidden" name="book_id"
                                                            value="{{ $book->id }}">
                                                        <input type="hidden" name="parent_id"
                                                            value="{{ $review->id }}">
                                                        <div class="col-md-6"><input type="text" name="user_name"
                                                                class="form-control" placeholder="Your Name" required>
                                                        </div>
                                                        <div class="col-md-6"><input type="email" name="user_email"
                                                                class="form-control" placeholder="Your Email" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea name="comment" rows="2" class="form-control" placeholder="Your Reply" required></textarea>
                                                        </div>
                                                        <div class="col-12"><button type="submit"
                                                                class="btn btn-sm btn-primary">Submit Reply</button></div>
                                                    </form>
                                                </div>
                                                @if ($review->replies->count())
                                                    <button class="btn btn-sm btn-outline-secondary mt-3" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#replies{{ $review->id }}">Show Replies
                                                        ({{ $review->replies->count() }})</button>
                                                    <div class="collapse mt-2" id="replies{{ $review->id }}">
                                                        @php renderReplies($review); @endphp
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>





                    </div>
                </div>



            </div>
        </div>
    </section>

    <!-- Top Ratting Book Section Start -->
    <section class="top-ratting-book-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Related Products</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. <br> Donec at nulla nulla. Duis
                    posuere ex lacus
                </p>
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

                                    <li class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
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
                                            <img src="{{ asset('assets/img/testimonial/client-2.png') }}" alt="img">
                                        </span>
                                        <span class="content">Alexander</span>
                                    </li>

                                    <li class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/03.png') }}"
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
                                            <img src="{{ asset('assets/img/testimonial/client-3.png') }}" alt="img">
                                        </span>
                                        <span class="content">Esther</span>
                                    </li>

                                    <li class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
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
                                        Hot
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
                                            <img src="{{ asset('assets/img/testimonial/client-4.png') }}" alt="img">
                                        </span>
                                        <span class="content">Hawkins</span>
                                    </li>

                                    <li class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="shop-box-items style-2">
                            <div class="book-thumb center">
                                <a href="shop-details-2.html"><img src="{{ asset('assets/img/book/05.png') }}"
                                        alt="img"></a>
                                <ul class="shop-icon d-grid justify-content-center align-items-center">
                                    <li>
                                        <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html">

                                            <img class="icon"
                                                src="{{ asset('assets/img/icon/shuffle.svg" alt="svg-icon') }}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
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
                                            <img src="{{ asset('assets/img/testimonial/client-5.png') }}" alt="img">
                                        </span>
                                        <span class="content">(Author) Albert</span>
                                    </li>

                                    <li class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="shop-button">
                                <a href="shop-details.html" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const minusBtn = document.querySelector(".qtyminus");
        const plusBtn = document.querySelector(".qtyplus");
        const qtyInput = document.getElementById("qty2");
        const totalPriceEl = document.getElementById("totalPrice");
        const unitPrice = parseFloat(document.getElementById("unitPrice").value);

        function updatePrice() {
            const qty = Math.max(1, parseInt(qtyInput.value) || 1);
            totalPriceEl.textContent = (qty * unitPrice).toFixed(2);
        }

        minusBtn.addEventListener("click", () => {
            let current = parseInt(qtyInput.value);
            if (current > 1) {
                qtyInput.value = current - 1;
                updatePrice();
            }
        });

        plusBtn.addEventListener("click", () => {
            let current = parseInt(qtyInput.value);
            qtyInput.value = current + 1;
            updatePrice();
        });

        qtyInput.addEventListener("input", updatePrice);
    });
</script>

<script>
    $(document).ready(function() {
        const showMoreBtn = $('#showMoreReviewsBtn');
        const reviewItems = $('.review-item');

        // Ensure only the first 3 reviews are shown initially
        reviewItems.each(function(index) {
            if (index < 3) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        showMoreBtn.on('click', function() {
            if ($(this).text().trim() === "Show more reviews") {
                reviewItems.show();
                $(this).text("Hide reviews");
            } else {
                reviewItems.each(function(index) {
                    if (index < 3) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                $(this).text("Show more reviews");
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.show-more-replies').forEach(button => {
            button.addEventListener('click', function() {
                const reviewId = this.getAttribute('data-review-id');
                // Optional: Add AJAX fetch if lazy loading is preferred
                this.style.display = 'none';
            });
        });
    });
</script>
