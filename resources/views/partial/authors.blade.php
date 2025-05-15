<ul class="list-group mb-5">
    @foreach ($authors as $author)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span><strong>اسم نویسنده:</strong> {{ $author->name }}</span>
        </li>
    @endforeach
</ul>
