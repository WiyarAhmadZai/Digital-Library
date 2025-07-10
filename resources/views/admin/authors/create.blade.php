@extends('layouts.layout')

@section('content')
    <div class="page-wrapper py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST"
                        action="{{ isset($author) ? route('admin.author.update', $author) : route('admin.author.store') }}"
                        enctype="multipart/form-data" x-data="authorForm()" x-init="init()">
                        @csrf

                        @if (isset($author))
                            @method('PUT')
                        @endif

                        <!-- Progress bar -->
                        <div class="progress mb-4" style="height: 20px;">
                            <div class="progress-bar bg-success" role="progressbar" :style="`width: ${progress}%`"
                                :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"
                                x-text="Math.round(progress) + '%'">
                            </div>
                        </div>

                        <!-- STEP 1 -->
                        <div x-show="step === 1" class="mb-4">
                            <label class="form-label">First Name</label>
                            <input type="text" name="name" x-model="form.name"
                                @input="errors.name = null; updateProgress()"
                                :class="errors.name ? 'is-invalid' : (form.name.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger" x-show="errors.name" x-text="errors.name"></div>

                            <label class="form-label mt-3">Last Name</label>
                            <input type="text" name="last_name" x-model="form.last_name"
                                @input="errors.last_name = null; updateProgress()"
                                :class="errors.last_name ? 'is-invalid' : (form.last_name.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger" x-show="errors.last_name" x-text="errors.last_name"></div>

                            <button type="button" @click="nextStep()" class="btn btn-success mt-4">Next</button>
                        </div>

                        <!-- STEP 2 -->
                        <div x-show="step === 2" class="mb-4">
                            <label class="form-label">Biography</label>
                            <textarea name="biography" x-model="form.biography" @input="errors.biography = null; updateProgress()" rows="5"
                                class="form-control"
                                :class="errors.biography ? 'is-invalid' : (form.biography.trim().length > 0 ? 'is-valid' : '')"></textarea>
                            <div class="text-danger" x-show="errors.biography" x-text="errors.biography"></div>

                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                        </div>

                        <!-- STEP 3 -->
                        <div x-show="step === 3" class="mb-4">
                            <label class="form-label">Author Images</label>
                            <input type="file" multiple name="image_path[]" accept="image/*"
                                @change="handleImages($event)"
                                :class="errors.image_path ? 'is-invalid' : (form.image_path_urls.length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger mt-2" x-show="errors.image_path" x-text="errors.image_path"></div>

                            <div class="mt-2 d-flex flex-wrap gap-2">
                                <template x-for="(img, index) in form.image_path_urls" :key="index">
                                    <img :src="img" class="img-thumbnail" style="max-height: 150px;" />
                                </template>
                            </div>

                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                        </div>

                        <!-- STEP 4 -->
                        <div x-show="step === 4" class="mb-4">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" x-model="form.country"
                                @input="errors.country = null; updateProgress()"
                                :class="errors.country ? 'is-invalid' : (form.country.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger" x-show="errors.country" x-text="errors.country"></div>

                            <label class="form-label mt-3">Email</label>
                            <input type="email" name="email" x-model="form.email"
                                @input="errors.email = null; updateProgress()"
                                :class="errors.email ? 'is-invalid' : (form.email.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger" x-show="errors.email" x-text="errors.email"></div>

                            <label class="form-label mt-3">Website</label>
                            <input type="url" name="website" x-model="form.website"
                                @input="errors.website = null; updateProgress()"
                                :class="errors.website ? 'is-invalid' : (form.website.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" />
                            <div class="text-danger" x-show="errors.website" x-text="errors.website"></div>

                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="submit" class="btn btn-primary mt-3 ms-2">
                                {{ isset($author) ? 'Update Author' : 'Create Author' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function authorForm() {
        return {
            step: 1,
            progress: 0,
            form: {
                name: '{{ old('name', isset($author) ? $author->name : '') }}',
                last_name: '{{ old('last_name', isset($author) ? $author->last_name : '') }}',
                biography: '{{ old('biography', isset($author) ? $author->biography : '') }}',
                image_path: [],
                image_path_urls: [], // array of preview URLs
                country: '{{ old('country', isset($author) ? $author->country : '') }}',
                email: '{{ old('email', isset($author) ? $author->email : '') }}',
                website: '{{ old('website', isset($author) ? $author->website : '') }}',
            },
            errors: {},
            init() {
                this.updateProgress();
            },
            updateProgress() {
                let filledFields = 0;
                if (this.form.name.trim()) filledFields++;
                if (this.form.last_name.trim()) filledFields++;
                if (this.form.biography.trim()) filledFields++;
                if (this.form.image_path_urls.length > 0) filledFields++;
                if (this.form.country.trim()) filledFields++;
                if (this.form.email.trim()) filledFields++;
                if (this.form.website.trim()) filledFields++;
                this.progress = (filledFields / 7) * 100;
            },
            nextStep() {
                this.errors = {};

                if (this.step === 1) {
                    if (!this.form.name.trim()) this.errors.name = 'First name is required.';
                    if (!this.form.last_name.trim()) this.errors.last_name = 'Last name is required.';
                }

                if (this.step === 2) {
                    if (!this.form.biography.trim()) this.errors.biography = 'Biography is required.';
                }

                if (this.step === 3) {
                    if (this.form.image_path_urls.length === 0)
                        this.errors.image_path = 'Please select at least one image.';
                }

                if (Object.keys(this.errors).length === 0 && this.step < 4) {
                    this.step++;
                }
            },
            prevStep() {
                if (this.step > 1) this.step--;
            },
            handleImages(event) {
                const files = Array.from(event.target.files);
                if (files.length === 0) {
                    this.form.image_path_urls = [];
                    return;
                }

                for (const file of files) {
                    if (!file.type.startsWith('image/')) {
                        this.errors.image_path = 'Only image files are allowed.';
                        this.form.image_path_urls = [];
                        event.target.value = null;
                        return;
                    }
                }

                this.errors.image_path = null;
                this.form.image_path_urls = [];

                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        this.form.image_path_urls.push(e.target.result);
                    };
                    reader.readAsDataURL(file);
                });

                this.updateProgress();
            }
        }
    }
</script>
