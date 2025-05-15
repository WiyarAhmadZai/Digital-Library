<div class="row">
    @foreach ($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/Cute Photo.jpg') }}" class="card-img-top" alt="Book">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($book->description, 100, '...') }}</p>
                    <a href="#" class="btn btn-outline-primary">مشاهده کتاب</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
