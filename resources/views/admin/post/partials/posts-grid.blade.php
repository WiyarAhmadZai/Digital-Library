<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $post->user->name }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit(strip_tags($post->body), 120) }}</p>

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

                    {{-- Action Buttons --}}
                    <div class="mt-auto d-flex justify-content-between">
                        @can('update', $post)
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                ✏️ Edit
                            </a>
                        @endcan

                        @can('delete', $post)
                            <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $post->id }}">
                                🗑️ Delete
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
