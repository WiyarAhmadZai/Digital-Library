<div class="p-3">
    <h4>{{ $book->title }}</h4>
    <p><strong>Author:</strong> {{ $book->author->name ?? '—' }}</p>
    <p><strong>Category:</strong> {{ $book->category->name ?? '—' }}</p>
    <p><strong>Description:</strong> {{ $book->description ?? '—' }}</p>
    <p><strong>Published At:</strong> {{ $book->published_at ?? '—' }}</p>
</div>
