@extends('frontend.layout.master')

@section('content')
    <div class="container m-5 text-center">
        <h3 class="mb-4">کتاب‌های دانلود شده</h3>
        <div class="row">
            @forelse ($books as $book)
                @php
                    $images = json_decode($book->image_paths, true);
                    $imagePath = isset($images[0]) ? 'storage/' . $images[0] : 'default.jpg';
                @endphp

                <div class="col-md-4 mb-3">
                    <div class="card position-relative h-100">
                        <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $book->title }}"
                            style="height: 300px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('book.view-pdf', $book->id) }}" target="_blank"
                                    class="btn btn-outline-primary w-75">
                                    مشاهده
                                </a>

                                <button class="btn btn-outline-danger btn-sm delete-book ms-2"
                                    data-book-id="{{ $book->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>شما هنوز کتابی را دانلود نکرده‌اید.</p>
            @endforelse
        </div>
    </div>
@endsection

@php
    $deleteUrlTemplate = route('book.remove-download', ['id' => 'BOOK_ID_PLACEHOLDER']);
@endphp

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const deleteButtons = document.querySelectorAll(".delete-book");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const bookId = this.dataset.bookId;
                    const url = "{{ $deleteUrlTemplate }}".replace('BOOK_ID_PLACEHOLDER', bookId);

                    if (confirm("آیا مطمئن هستید که می‌خواهید این کتاب را حذف کنید؟")) {
                        fetch(url, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": csrfToken,
                                    "Accept": "application/json",
                                    "Content-Type": "application/json"
                                }
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('شبکه پاسخ مناسبی نداد');
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    alert('کتاب حذف شد.');
                                    location.reload();
                                } else {
                                    alert(data.message || "خطایی رخ داده است.");
                                }
                            })
                            .catch(error => {
                                console.error("خطا در ارسال درخواست:", error);
                                alert("خطا در ارسال درخواست: " + error.message);
                            });
                    }
                });
            });
        });
    </script>
@endpush
