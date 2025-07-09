@extends('layouts.layout')

@section('content')
    <div class="page-wrapper pb-4">
        <div class="container">
            <div class="card shadow rounded-4 overflow-hidden border-0" x-data="imageSwapper()" x-init="init()">
                <!-- Cover Image -->
                <div class="position-relative" style="height: 220px; background-color: #dee2e6;">
                    <img :src="coverImage" alt="Cover Photo" class="w-100 h-100 object-fit-cover"
                        style="object-fit: cover; cursor: pointer;" @click="openModal('cover')" />

                    <!-- Profile Image -->
                    <img :src="profileImage" class="rounded-circle shadow border border-white position-absolute"
                        style="width: 130px; height: 130px; object-fit: cover; top: 140px; left: 30px; cursor: pointer;"
                        @click="openModal('profile')" />

                    <!-- Swap Button -->
                    <button @click="swapImages" class="btn btn-sm btn-warning position-absolute"
                        style="top: 10px; right: 10px;">
                        <i class="bi bi-arrow-left-right me-1"></i> Swap Images
                    </button>
                </div>

                <!-- Details Section -->
                <div class="pt-5 ps-4 pe-4 pb-4 mt-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="mb-1">{{ $author->name }} {{ $author->last_name }}</h4>
                            <p class="text-muted mb-0">{{ $author->country }}</p>
                        </div>
                        <a href="{{ route('admin.author.edit', $author->id) }}" class="btn btn-outline-primary">
                            <i class="bi bi-pencil-square me-1"></i>Edit
                        </a>
                    </div>

                    <hr>

                    <!-- Contact Info -->
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p>{{ $author->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Website:</strong>
                            <p>
                                @if ($author->website)
                                    <a href="{{ $author->website }}" target="_blank">{{ $author->website }}</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-12">
                            <strong>Biography:</strong>
                            <p class="text-justify">{{ $author->biography ?: 'No biography available.' }}</p>
                        </div>
                    </div>

                    <div class="text-muted small mt-4">
                        <i class="bi bi-clock-history me-1"></i>
                        Created at: {{ $author->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Centered Modal with Larger Image -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center p-2" style="min-height: 70vh;">
                    <img id="modalImage" style="width: 80%; height: 80%; object-fit: contain; border-radius: 10px;" />
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button id="cropBtn" class="btn btn-success">
                        <i class="bi bi-crop"></i> Crop & Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cropper.js Script -->
    <script>
        function imageSwapper() {
            return {
                profileImage: "{{ $profileImage ? asset('storage/' . $profileImage) : asset('default/profile.png') }}",
                coverImage: "{{ $coverImage ? asset('storage/' . $coverImage) : asset('default/cover.jpg') }}",
                selectedType: '',
                cropper: null,
                modalInstance: null,

                init() {
                    const cropBtn = document.getElementById('cropBtn');
                    cropBtn.addEventListener('click', () => this.cropAndSave());
                },

                swapImages() {
                    [this.profileImage, this.coverImage] = [this.coverImage, this.profileImage];
                },

                openModal(type) {
                    this.selectedType = type;
                    const modalImage = document.getElementById('modalImage');
                    modalImage.src = type === 'profile' ? this.profileImage : this.coverImage;

                    if (this.cropper) this.cropper.destroy();

                    this.modalInstance = new bootstrap.Modal(document.getElementById('imageModal'));
                    this.modalInstance.show();

                    modalImage.onload = () => {
                        this.cropper = new Cropper(modalImage, {
                            viewMode: 1,
                            aspectRatio: type === 'profile' ? 1 : 16 / 9,
                            background: false,
                            responsive: true
                        });
                    };
                },

                cropAndSave() {
                    if (!this.cropper) return;

                    const canvas = this.cropper.getCroppedCanvas({
                        width: this.selectedType === 'profile' ? 300 : 1200,
                        height: this.selectedType === 'profile' ? 300 : 675
                    });

                    const dataUrl = canvas.toDataURL('image/jpeg');

                    if (this.selectedType === 'profile') {
                        this.profileImage = dataUrl;
                    } else {
                        this.coverImage = dataUrl;
                    }

                    this.cropper.destroy();
                    this.modalInstance.hide();
                }
            };
        }
    </script>
@endsection
