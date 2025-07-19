@if ($books->count())
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12">
                <h5 class="text-muted text-center">
                    {{ $books->total() }} {{ Str::plural('Record', $books->total()) }} found
                </h5>
            </div>
        </div>

        <div class="row">
            @foreach ($books as $book)
                @php
                    // --- Book first image ---
                    $bookImages = json_decode($book->image_paths ?? '[]', true);
                    $bookFirstImage = count($bookImages) ? $bookImages[0] : null;

                    if ($bookFirstImage) {
                        if (filter_var($bookFirstImage, FILTER_VALIDATE_URL)) {
                            $bookImageUrl = $bookFirstImage;
                        } else {
                            $bookImageUrl = asset('storage/' . ltrim($bookFirstImage, '/'));
                        }
                    } else {
                        $bookImageUrl = asset('assets/img/default-book.png');
                    }

                    // --- Author first image ---
                    $authorImages = json_decode($book->author->image_paths ?? '[]', true);
                    $authorFirstImage = count($authorImages) ? $authorImages[0] : null;

                    if ($authorFirstImage) {
                        if (filter_var($authorFirstImage, FILTER_VALIDATE_URL)) {
                            $authorImageUrl = $authorFirstImage;
                        } else {
                            $authorImageUrl = asset('storage/' . ltrim($authorFirstImage, '/'));
                        }
                    } else {
                        $authorImageUrl = asset('assets/img/testimonial/default.png');
                    }
                @endphp

                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="shop-box-items style-2">
                        <div class="book-thumb center">
                            <a href="{{ route('frontend.shopdetails', ['id' => $book->id]) }}">
                                <img src="{{ $bookImageUrl }}" alt="{{ $book->name }}" class="img-fluid">
                            </a>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>
                                    -{{ $book->price ? round((($book->price - $book->final_price) / $book->price) * 100) : 0 }}%
                                </li>
                            </ul>
                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><img class="icon"
                                            src="{{ asset('assets/img/icon/shuffle.svg') }}" alt="shuffle"></a></li>
                                <li><a href="{{ route('frontend.shopDetailsData', ['id' => $book->id]) }}"><i
                                            class="far fa-eye"></i></a></li>
                            </ul>
                            <div class="shop-button">
                                <a href="#" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i> Add To
                                    Cart</a>
                            </div>
                        </div>

                        <div class="shop-content">
                            <h5>{{ $book->category ?? 'Category' }}</h5>
                            <h3>
                                <a
                                    href="{{ route('frontend.shopdetails', ['id' => $book->id]) }}">{{ $book->name }}</a>
                            </h3>
                            <ul class="price-list">
                                <li>${{ number_format($book->final_price, 2) }}</li>
                                <li><del>${{ number_format($book->price, 2) }}</del></li>
                            </ul>
                            <ul class="author-post">
                                <li class="authot-list">
                                    <span class="thumb">
                                        <img src="{{ $authorImageUrl }}" alt="author"
                                            class="img-fluid rounded-circle" style="max-width: 40px;">
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

        <div class="d-flex justify-content-center my-3">
            {!! $books->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@else
    <p class="text-center">No books found.</p>
@endif
