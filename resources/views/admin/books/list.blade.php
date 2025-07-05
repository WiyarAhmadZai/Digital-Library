@extends('layouts.layout')

@section('content')
    <div class="page-wrapper py-5">
        <section class="book-details-section">
            <div class="container">
                @php
                    // Decode image paths or fallback
                    $images = json_decode($book->image_path, true);
                    if (!is_array($images) || count($images) === 0) {
                        $images = ['assets/img/default-book.png'];
                    }
                    // Helper to generate full url for image
                    function imgUrl($img)
                    {
                        return filter_var($img, FILTER_VALIDATE_URL) ? $img : asset($img);
                    }
                @endphp

                <div class="row g-4">
                    {{-- Left: Main image and thumbnails --}}
                    <div class="col-lg-5">
                        {{-- Main Image --}}
                        <img id="mainBookImage" src="{{ imgUrl($images[0]) }}" alt="{{ $book->title }}"
                            class="img-fluid rounded shadow-sm mb-3"
                            style="max-height: 400px; width: 100%; object-fit: contain;">

                        {{-- Thumbnails --}}
                        <div class="d-flex overflow-auto" style="gap: 0.5rem;">
                            @foreach ($images as $index => $img)
                                <img src="{{ imgUrl($img) }}" alt="Thumbnail {{ $index + 1 }}" class="img-thumbnail"
                                    style="width: 70px; height: 70px; object-fit: cover; cursor: pointer;"
                                    onclick="document.getElementById('mainBookImage').src='{{ imgUrl($img) }}';">
                            @endforeach
                        </div>
                    </div>

                    {{-- Right: Book Details --}}
                    <div class="col-lg-7">
                        <h2 class="mb-3">{{ $book->title }}</h2>
                        <h5 class="text-secondary mb-4">Stock availability: <span
                                class="fw-bold">{{ $book->availability ?? 'In stock' }}</span></h5>

                        @php
                            $averageRating = $book->reviews->avg('rating') ?? 0;
                            $fullStars = floor($averageRating);
                            $halfStar = $averageRating - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        @endphp
                        <div class="mb-3">
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor
                            @if ($halfStar)
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="far fa-star text-warning"></i>
                            @endfor
                            <span class="ms-2">{{ $book->reviews->count() }}
                                Review{{ $book->reviews->count() !== 1 ? 's' : '' }}</span>
                        </div>

                        <p class="mb-4">{{ $book->description }}</p>

                        <h3 class="text-primary">${{ number_format($book->price, 2) }}</h3>

                        <div class="d-flex align-items-center gap-3 mt-4 mb-5">
                            <div class="input-group w-auto" style="max-width: 140px;">
                                <button class="btn btn-outline-secondary" type="button" id="qtyMinus">−</button>
                                <input type="number" name="qty" id="qty2" min="1" max="10"
                                    step="1" value="1" class="form-control text-center">
                                <button class="btn btn-outline-secondary" type="button" id="qtyPlus">+</button>
                            </div>

                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#readMoreModal">
                                Read A Little
                            </button>

                            <a href="#" class="btn btn-primary d-flex align-items-center gap-2">
                                <i class="fa-solid fa-basket-shopping"></i> Add To Cart
                            </a>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <a href="#" class="btn btn-outline-secondary" aria-label="Add to wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary" aria-label="Shuffle">
                                <img src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="Shuffle Icon" width="20"
                                    height="20">
                            </a>
                        </div>

                        {{-- Book metadata --}}
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div><strong>SKU:</strong> {{ $book->sku ?? 'N/A' }}</div>
                            <div><strong>Category:</strong> {{ $book->category->name ?? 'N/A' }}</div>
                            <div><strong>Tags:</strong> {{ $book->tags ?? 'N/A' }}</div>
                            <div><strong>Format:</strong> {{ $book->format ?? 'N/A' }}</div>
                            <div><strong>Total Pages:</strong> {{ $book->total_pages ?? 'N/A' }}</div>
                            <div><strong>Language:</strong> {{ $book->language ?? 'N/A' }}</div>
                            <div><strong>Publish Year:</strong> {{ $book->publish_year ?? 'N/A' }}</div>
                            <div><strong>Country:</strong> {{ $book->country ?? 'N/A' }}</div>
                        </div>

                        {{-- Features / Guarantees --}}
                        <ul class="list-unstyled mt-4 mb-4">
                            <li><i class="fa-solid fa-check text-success me-2"></i> Free shipping orders from $150</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> 30 days exchange & return</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> Flash Discount: Starting at 30% Off</li>
                            <li><i class="fa-solid fa-check text-success me-2"></i> Safe & Secure online shopping</li>
                        </ul>

                        {{-- Social links --}}
                        <div class="d-flex align-items-center gap-3">
                            <h6 class="mb-0 me-3">Also Available On:</h6>
                            <a href="https://www.customer.io/"><img src="{{ asset('assets/img/cutomerio.png') }}"
                                    alt="customer.io" height="30"></a>
                            <a href="https://www.amazon.com/"><img src="{{ asset('assets/img/amazon.png') }}"
                                    alt="Amazon" height="30"></a>
                            <a href="https://www.dropbox.com/"><img src="{{ asset('assets/img/dropbox.png') }}"
                                    alt="Dropbox" height="30"></a>
                        </div>
                    </div>
                </div>

                {{-- Tabs Section --}}
                <ul class="nav nav-tabs mt-5" id="bookTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#description"
                            type="button" role="tab" aria-controls="description"
                            aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional"
                            type="button" role="tab" aria-controls="additional" aria-selected="false">Additional
                            Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button" role="tab" aria-controls="review" aria-selected="false">Reviews
                            ({{ $book->reviews->count() }})</button>
                    </li>
                </ul>
                <div class="tab-content border border-top-0 p-4">
                    {{-- Description --}}
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="desc-tab">
                        <p>{!! nl2br(e($book->description)) !!}</p>
                    </div>

                    {{-- Additional Info --}}
                    <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Availability</th>
                                    <td>{{ $book->availability ?? 'Available' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td>{{ $book->category->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Publish Date</th>
                                    <td>{{ $book->publish_date ? $book->publish_date->format('Y-m-d') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Pages</th>
                                    <td>{{ $book->total_pages ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Format</th>
                                    <td>{{ $book->format ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>{{ $book->country ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>{{ $book->language ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Dimensions</th>
                                    <td>{{ $book->dimensions ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Weight</th>
                                    <td>{{ $book->weight ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Reviews --}}
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="reviews-tab">
                        @forelse ($book->reviews as $review)
                            <div class="d-flex mb-4 border-bottom pb-3">
                                <div class="me-3">
                                    <img src="{{ asset('assets/img/shop-details/review.png') }}" alt="Reviewer"
                                        class="rounded-circle" width="64" height="64">
                                </div>
                                <div>
                                    <h5 class="mb-1">{{ $review->user_name }}</h5>
                                    <small
                                        class="text-muted">{{ $review->created_at->format('F d, Y \a\t h:i a') }}</small>
                                    <div class="mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No reviews yet.</p>
                        @endforelse

                        {{-- Review Form --}}
                        <h4 class="mt-5">Add Your Review</h4>
                        <form action="{{ route('reviews.store') }}" method="POST" class="row g-3">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <div class="col-md-6">
                                <label for="user_name" class="form-label">Your Name *</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_email" class="form-label">Your Email *</label>
                                <input type="email" class="form-control" name="user_email" id="user_email" required>
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
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                        required>
                                    <label class="form-check-label" for="terms">I accept terms & conditions</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        {{-- Modal for Read More --}}
        <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $book->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! nl2br(e($book->read_more_text)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
