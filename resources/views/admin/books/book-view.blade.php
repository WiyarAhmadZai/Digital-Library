{{-- resources/views/admin/books/book-view.blade.php --}}
@extends('layouts.layout')

@section('content')
    <div class="page-wrapper pb-4">
        <section class="book-details-section">
            <div class="container">
                <div class="row">

                    {{-- Left side can be an image or gallery, add if you want --}}
                    <div class="col-lg-5">
                        <img src="{{ asset($book->image ?? 'assets/img/default-book.png') }}" alt="{{ $book->title }}"
                            class="img-fluid">
                    </div>

                    {{-- Main content --}}
                    <div class="col-lg-7">
                        <div class="shop-details-content">
                            <div class="title-wrapper">
                                <h2>{{ $book->title }}</h2>
                                <h5>Stock availability.</h5>
                            </div>

                            <div class="star">
                                @php
                                    $averageRating = $book->reviews->avg('rating') ?? 0;
                                    $fullStars = floor($averageRating);
                                    $halfStar = $averageRating - $fullStars >= 0.5;
                                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                @endphp

                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor

                                @if ($halfStar)
                                    <i class="fas fa-star-half-alt"></i>
                                @endif

                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="far fa-star"></i>
                                @endfor

                                <span>({{ $book->reviews->count() }} Customer
                                    Review{{ $book->reviews->count() != 1 ? 's' : '' }})</span>
                            </div>

                            <p>{{ $book->description }}</p>

                            <div class="price-list">
                                <h3>${{ number_format($book->price, 2) }}</h3>
                            </div>

                            <div class="cart-wrapper">
                                <div class="quantity-basket">
                                    <p class="qty">
                                        <button class="qtyminus" aria-hidden="true">−</button>
                                        <input type="number" name="qty" id="qty2" min="1" max="10"
                                            step="1" value="1">
                                        <button class="qtyplus" aria-hidden="true">+</button>
                                    </p>
                                </div>
                                <button type="button" class="theme-btn style-2" data-bs-toggle="modal"
                                    data-bs-target="#readMoreModal">
                                    Read A little
                                </button>

                                <!-- Read More Modal -->
                                <div class="modal fade" id="readMoreModal" tabindex="-1"
                                    aria-labelledby="readMoreModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body"
                                                style="background-image: url({{ asset('assets/img/popupBg.png') }});">
                                                <div class="close-btn">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="readMoreBox">
                                                    <div class="content">
                                                        <h3 id="readMoreModalLabel">{{ $book->title }}</h3>
                                                        <p>{!! nl2br(e($book->read_more_text)) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i> Add To
                                    Cart</a>

                                <div class="icon-box">
                                    <a href="#" class="icon"><i class="far fa-heart"></i></a>
                                    <a href="#" class="icon-2">
                                        <img src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="shuffle icon">
                                    </a>
                                </div>
                            </div>

                            <div class="category-box">
                                <div class="category-list">
                                    <ul>
                                        <li><span>SKU:</span> {{ $book->sku ?? 'N/A' }}</li>
                                        <li><span>Category:</span> {{ $book->category->name ?? 'N/A' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Tags:</span> {{ $book->tags ?? 'N/A' }}
                                        </li>
                                        <li><span>Format:</span> {{ $book->format ?? 'N/A' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Total page:</span> {{ $book->total_pages ?? 'N/A' }}</li>
                                        <li><span>Language:</span> {{ $book->language ?? 'N/A' }}</li>
                                    </ul>
                                    <ul>
                                        <li><span>Publish Years:</span> {{ $book->publish_year ?? 'N/A' }}</li>
                                        <li><span>Century:</span> {{ $book->country ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="box-check">
                                <div class="check-list">
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i> Free shipping orders from $150</li>
                                        <li><i class="fa-solid fa-check"></i> 30 days exchange & return</li>
                                    </ul>
                                    <ul>
                                        <li><i class="fa-solid fa-check"></i> Mamaya Flash Discount: Starting at 30% Off
                                        </li>
                                        <li><i class="fa-solid fa-check"></i> Safe & Secure online shopping</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="social-icon">
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

                {{-- Tabs Section --}}
                <div class="single-tab section-padding pb-0">
                    <ul class="nav mb-5" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active" aria-selected="true"
                                role="tab">
                                <h6>Description</h6>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#additional" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1"
                                role="tab">
                                <h6>Additional Information</h6>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#review" data-bs-toggle="tab" class="nav-link" aria-selected="false"
                                tabindex="-1" role="tab">
                                <h6>Reviews ({{ $book->reviews->count() }})</h6>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        {{-- Description Tab --}}
                        <div id="description" class="tab-pane fade show active" role="tabpanel">
                            <div class="description-items">
                                <p>{!! nl2br(e($book->description)) !!}</p>
                            </div>
                        </div>

                        {{-- Additional Information Tab --}}
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
                                                {{ $book->publish_date ? $book->publish_date->format('Y-m-d') : 'N/A' }}
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

                        {{-- Reviews Tab --}}
                        <div id="review" class="tab-pane fade" role="tabpanel">
                            <div class="review-items">
                                @forelse ($book->reviews as $review)
                                    <div class="review-wrap-area d-flex gap-4 mb-4">
                                        <div class="review-thumb">
                                            <img src="{{ asset('assets/img/shop-details/review.png') }}"
                                                alt="Reviewer Image">
                                        </div>
                                        <div class="review-content">
                                            <div
                                                class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                <div class="cont">
                                                    <h5>{{ $review->user_name }}</h5>
                                                    <span>{{ $review->created_at->format('F d, Y \a\t h:i a') }}</span>
                                                </div>
                                                <div class="star">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-4">{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p>No reviews yet.</p>
                                @endforelse

                                <div class="review-title mt-5 py-3 mb-3">
                                    <h4>Your Rating*</h4>
                                    <div class="rate-now d-flex align-items-center">
                                        <p>Your Rating*</p>
                                        <div class="star">
                                            <i class="fa-light fa-star"></i>
                                            <i class="fa-light fa-star"></i>
                                            <i class="fa-light fa-star"></i>
                                            <i class="fa-light fa-star"></i>
                                            <i class="fa-light fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-form">
                                    <form action="{{ route('reviews.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <span>Your Name*</span>
                                                    <input type="text" name="user_name" id="user_name"
                                                        placeholder="Your Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <span>Your Email*</span>
                                                    <input type="email" name="user_email" id="user_email"
                                                        placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".8">
                                                <div class="form-clt">
                                                    <span>Message*</span>
                                                    <textarea name="comment" id="comment" placeholder="Write Message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".9">
                                                <div class="form-clt">
                                                    <span>Rating*</span>
                                                    <select name="rating" id="rating" required class="form-select">
                                                        <option value="" disabled selected>Select Rating</option>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 wow fadeInUp animated" data-wow-delay="1">
                                                <div class="form-check d-flex gap-2 from-customradio">
                                                    <input type="checkbox" class="form-check-input" name="terms"
                                                        id="terms" required>
                                                    <label class="form-check-label" for="terms">I accept your terms &
                                                        conditions</label>
                                                </div>
                                                <button type="submit" class="theme-btn">Submit now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
@endsection
