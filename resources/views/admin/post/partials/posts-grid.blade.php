<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->user->name }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($post->body), 120) }}</p>

                    {{-- Images --}}
                    @if ($post->images)
                        @php
                            $images = json_decode($post->images, true);
                        @endphp
                        <div class="mb-2">
                            @foreach ($images as $img)
                                <img src="{{ asset('storage/' . $img) }}" alt="Post Image" class="img-fluid mb-1 rounded"
                                    style="max-height:100px; object-fit:cover; width:100%;">
                            @endforeach
                        </div>
                    @endif

                    {{-- PDFs --}}
                    @if ($post->pdfs)
                        @php
                            $pdfs = json_decode($post->pdfs, true);
                        @endphp
                        <div class="mb-2">
                            @foreach ($pdfs as $pdf)
                                <a href="{{ asset('storage/' . $pdf) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary mb-1 d-block">View PDF</a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Edit & Delete Buttons --}}
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endcan

                        @can('delete', $post)
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $post->id }}">
                                Delete
                            </button>
                        @endcan


                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
