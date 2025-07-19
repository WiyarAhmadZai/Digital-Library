@extends('layouts.layout')

@section('content')
    <div class="page-wrapper">
        <div class="container py-5">
            <a href="{{ route('home') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                <i class="bi bi-house-door-fill me-2"></i> بازگشت به صفحه اصلی
            </a>

            <h2 class="mb-4" style="text-align: right; padding-right: 1rem;;">داشبورد کاربر</h2>
            <div class="row g-4">

                <div class="col-md-3">
                    <div class="card text-white bg-primary p-3 text-center d-flex flex-column justify-content-center align-items-center"
                        style="height: 150px;">
                        <h4>کاربران فعال</h4>
                        <p class="fs-2 mb-0">{{ $activeUsersCount }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-success p-3 text-center d-flex flex-column justify-content-center align-items-center"
                        style="height: 150px;">
                        <h4>نویسندگان</h4>
                        <p class="fs-2 mb-0">{{ $authorsCount }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-warning p-3 text-center d-flex flex-column justify-content-center align-items-center"
                        style="height: 150px;">
                        <h4>کتاب‌ها</h4>
                        <p class="fs-2 mb-0">{{ $booksCount }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-info p-3 text-center d-flex flex-column justify-content-center align-items-center"
                        style="height: 150px;">
                        <h4>کتاب‌های دانلود شده</h4>
                        <p class="fs-2 mb-0">{{ $downloadedBooksCount }}</p>
                    </div>
                </div>

                <!-- Country Count Card -->
                <div class="col-md-3">
                    <div class="card text-white bg-secondary p-3 text-center d-flex flex-column justify-content-center align-items-center"
                        style="height: 150px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#countriesModal">
                        <h4>تعداد کشورها</h4>
                        <p class="fs-2 mb-0">{{ count($booksByCountry) }}</p>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="countriesModal" tabindex="-1" aria-labelledby="countriesModalLabel"
                    aria-hidden="true" dir="rtl">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="countriesModalLabel">کتاب‌ها بر اساس کشور</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row" id="countryList">
                                        @foreach ($booksByCountry as $country => $count)
                                            <div class="col-md-4 mb-3">
                                                <button type="button"
                                                    class="list-group-item list-group-item-action d-flex align-items-center justify-content-center"
                                                    data-country="{{ $country }}"
                                                    style="width: 100%; height: 70px; font-weight: bold; font-size: 1.1rem;">
                                                    <img src="{{ asset('flags/' . strtolower($country) . '.svg') }}"
                                                        alt="{{ $country }} flag" onerror="this.style.display='none'"
                                                        style="width: 32px; height: 22px; margin-left: 12px;">
                                                    {{ $country ?: 'نامشخص' }} ({{ $count }})
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr>

                                <div id="booksByCountryList" style="display:none;">
                                    <h5>کتاب‌ها در <span id="selectedCountry"></span>:</h5>
                                    <ul class="list-group" id="booksList"></ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-3 text-center">پست‌های منتشر شده توسط ادمین</h3>
                    @if ($adminPosts->isEmpty())
                        <p class="text-center">هیچ پستی توسط ادمین منتشر نشده است.</p>
                    @else
                        <div class="row">
                            @foreach ($adminPosts as $post)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100 shadow-sm border-0 rounded-4">
                                        <div class="card-body d-flex flex-column">
                                            {{-- Admin name --}}
                                            <h5 class="card-title fw-bold">{{ $post->user->name ?? 'ادمین' }}</h5>

                                            {{-- Time ago --}}
                                            <small class="text-muted mb-2">منتشر شده
                                                {{ $post->created_at->diffForHumans() }}</small>

                                            {{-- Post body excerpt --}}
                                            <p class="card-text text-muted small">
                                                {{ Str::limit(strip_tags($post->body), 120) }}
                                            </p>

                                            {{-- Images --}}
                                            @if ($post->images)
                                                @php $images = json_decode($post->images, true); @endphp
                                                <div class="mb-2">
                                                    @foreach ($images as $img)
                                                        <img src="{{ asset('storage/' . $img) }}" alt="Post Image"
                                                            class="img-fluid mb-2 rounded shadow-sm post-image"
                                                            style="max-height: 120px; object-fit: cover; cursor: pointer;"
                                                            data-full="{{ asset('storage/' . $img) }}">
                                                    @endforeach
                                                </div>
                                            @endif

                                            {{-- PDFs --}}
                                            @if ($post->pdfs)
                                                @php $pdfs = json_decode($post->pdfs, true); @endphp
                                                <div class="mb-2">
                                                    @foreach ($pdfs as $pdf)
                                                        <a href="{{ asset('storage/' . $pdf) }}" target="_blank"
                                                            class="btn btn-sm btn-outline-primary d-block mb-1">
                                                            📄 View PDF
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countryButtons = document.querySelectorAll('#countryList button');
            const booksByCountryList = document.getElementById('booksByCountryList');
            const booksList = document.getElementById('booksList');
            const selectedCountrySpan = document.getElementById('selectedCountry');

            countryButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const country = this.dataset.country;
                    selectedCountrySpan.textContent = country || 'نامشخص';

                    // Clear previous list
                    booksList.innerHTML = '';

                    // Fetch books for this country via AJAX (you'll need a route & controller to serve this)
                    fetch(`/books/by-country/${encodeURIComponent(country)}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.books && data.books.length) {
                                data.books.forEach(book => {
                                    const li = document.createElement('li');
                                    li.classList.add('list-group-item');
                                    li.textContent = book.title;
                                    booksList.appendChild(li);
                                });
                            } else {
                                const li = document.createElement('li');
                                li.classList.add('list-group-item');
                                li.textContent = 'کتابی یافت نشد';
                                booksList.appendChild(li);
                            }
                            booksByCountryList.style.display = 'block';
                        })
                        .catch(() => {
                            booksList.innerHTML =
                                '<li class="list-group-item text-danger">خطا در دریافت داده‌ها</li>';
                            booksByCountryList.style.display = 'block';
                        });
                });
            });
        });
    </script>
@endpush
