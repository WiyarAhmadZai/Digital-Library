@extends('frontend.layout.master')

@section('content')
    <div class="container my-5 d-flex justify-content-center">
        <div class="card shadow rounded-4 overflow-hidden border-0 w-100" style="max-width: 700px;" x-data="imageSwapper()"
            x-init="init()">
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
                        <h4 class="mb-1 d-flex align-items-center gap-2">
                            <span>{{ $user->name }}</span>
                            <span>{{ optional($user->userProfile)->last_name ?? '' }}</span>
                        </h4>
                        <p class="text-muted mb-0">
                            {{ optional($user->userProfile)->profession ?? 'N/A' }}
                        </p>
                    </div>

                    <!-- Edit Button triggers modal -->
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>

                    <!-- Edit Profile Modal -->
                    <!-- Edit Profile Modal -->
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered"
                            style="max-height: 80vh; overflow-y: auto;">
                            <form action="{{ route('frontend.profile.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data" class="modal-content">
                                @csrf
                                @method('PUT')

                                <div class="modal-header py-2">
                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body row g-3 py-2">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" id="last_name"
                                            value="{{ optional($user->userProfile)->last_name }}" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number"
                                            value="{{ optional($user->userProfile)->phone_number }}" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="profession" class="form-label">Profession</label>
                                        <input type="text" name="profession" id="profession"
                                            value="{{ optional($user->userProfile)->profession }}" class="form-control">
                                    </div>

                                    {{-- Profile Image --}}
                                    <div class="col-md-6">
                                        <label for="profile_image" class="form-label">Profile Image</label>
                                        <input type="file" name="profile_image" accept="image/*" class="form-control">
                                        @if (optional($user->userProfile)->profile_image)
                                            <img src="{{ asset('storage/' . $user->userProfile->profile_image) }}"
                                                class="img-thumbnail mt-2"
                                                style="width: 80px; height: 80px; object-fit: cover;">
                                        @endif
                                    </div>

                                    {{-- Cover Image --}}
                                    <div class="col-md-6">
                                        <label for="cover_image" class="form-label">Cover Image</label>
                                        <input type="file" name="cover_image" accept="image/*" class="form-control">
                                        @if (optional($user->userProfile)->cover_image)
                                            <img src="{{ asset('storage/' . $user->userProfile->cover_image) }}"
                                                class="img-thumbnail mt-2"
                                                style="width: 100%; max-height: 120px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <label for="biography" class="form-label">Biography</label>
                                        <textarea name="biography" id="biography" rows="3" class="form-control">{{ optional($user->userProfile)->biography }}</textarea>
                                    </div>
                                </div>

                                <div class="modal-footer py-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <hr>

                <!-- Contact Info -->
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <strong>Email:</strong>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Phone Number:</strong>
                        <p>{{ optional($user->userProfile)->phone_number ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Profession:</strong>
                        <p class="text-justify">
                            {{ optional($user->userProfile)->profession ?: 'No profession available.' }}
                        </p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <strong>Biography:</strong>
                        <p class="text-justify">
                            {{ optional($user->userProfile)->biography ?: 'No biography available.' }}
                        </p>
                    </div>
                </div>

                <div class="text-muted small mt-4">
                    <i class="bi bi-clock-history me-1"></i>
                    Joined: {{ $user->created_at->format('d M Y') }}
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

    <script>
        function imageSwapper() {
            return {
                profileImage: "{{ $user->userProfile && $user->userProfile->profile_image ? asset('storage/' . $user->userProfile->profile_image) : asset('default/profile.png') }}",
                coverImage: "{{ $user->userProfile && $user->userProfile->cover_image ? asset('storage/' . $user->userProfile->cover_image) : asset('default/cover.jpg') }}",
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
