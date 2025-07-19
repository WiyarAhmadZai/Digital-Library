@extends('layouts.layout')

@section('content')
    <div class="page-wrapper py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-10">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">
                            {{-- Debug --}}

                            <div x-data="postForm(@json($post ?? null))" x-init="init()">

                                <form method="POST"
                                    action="{{ isset($post) && $post->id ? route('admin.post.update', $post->id) : route('admin.post.store') }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    @if (isset($post))
                                        @method('PUT')
                                    @endif

                                    <!-- Progress Bar -->
                                    <div class="progress
                                    mb-4" style="height: 18px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            :style="`width: ${progress}%`" x-text="Math.round(progress) + '%'"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>

                                    <!-- Step 1: Post Body -->
                                    <div x-show="step === 1" class="mb-4" x-cloak>
                                        <label class="form-label fw-semibold">Post Content</label>
                                        <input id="body" type="hidden" name="body" x-model="form.body">
                                        <trix-editor input="body" @trix-change="updateBody()"></trix-editor>
                                        <div class="text-danger" x-show="errors.body" x-text="errors.body"></div>

                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" class="btn btn-primary" @click="nextStep()">Next</button>
                                        </div>
                                    </div>

                                    <!-- Step 2: Upload Images -->
                                    <div x-show="step === 2" class="mb-4" x-cloak>
                                        <label class="form-label fw-semibold">Upload Images</label>
                                        <input type="file" name="images[]" multiple accept="image/*" class="form-control"
                                            @change="handleImages($event)">

                                        <div class="text-danger mt-2" x-show="errors.images" x-text="errors.images"></div>

                                        <div class="row mt-3">
                                            <!-- Preview New Uploads -->
                                            <template x-for="(img, index) in form.imagePreviews" :key="index">
                                                <div class="col-4 col-md-3 mb-3">
                                                    <img :src="img" class="img-fluid rounded shadow-sm border"
                                                        style="height: 120px; object-fit: cover;">
                                                </div>
                                            </template>

                                            <!-- Show Existing Images if Editing -->
                                            <template x-if="form.existingImages.length > 0">
                                                <template x-for="(img, index) in form.existingImages"
                                                    :key="'existing-' + index">
                                                    <div class="col-4 col-md-3 mb-3">
                                                        <img :src="img"
                                                            class="img-fluid rounded shadow-sm border"
                                                            style="height: 120px; object-fit: cover; opacity: 0.7; filter: grayscale(30%);"
                                                            title="Existing image (not re-uploaded)">
                                                    </div>
                                                </template>
                                            </template>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="button" class="btn btn-secondary"
                                                @click="prevStep()">Previous</button>
                                            <button type="button" class="btn btn-primary" @click="nextStep()">Next</button>
                                        </div>
                                    </div>

                                    <!-- Step 3: Upload PDFs -->
                                    <div x-show="step === 3" class="mb-4" x-cloak>
                                        <label class="form-label fw-semibold">Attach PDF Files</label>
                                        <input type="file" name="pdfs[]" multiple accept="application/pdf"
                                            class="form-control" @change="handlePDFs($event)">

                                        <div class="text-danger mt-2" x-show="errors.pdfs" x-text="errors.pdfs"></div>

                                        <ul class="list-group mt-3">
                                            <!-- New PDFs -->
                                            <template x-for="(pdf, index) in form.pdfNames" :key="'new-pdf-' + index">
                                                <li class="list-group-item d-flex align-items-center">
                                                    <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                                                    <span x-text="pdf"></span>
                                                </li>
                                            </template>

                                            <!-- Existing PDFs if Editing -->
                                            <template x-if="form.existingPDFs.length > 0">
                                                <template x-for="(pdf, index) in form.existingPDFs"
                                                    :key="'existing-pdf-' + index">
                                                    <li class="list-group-item d-flex align-items-center"
                                                        style="opacity: 0.7; filter: grayscale(30%);">
                                                        <i class="bi bi-file-earmark-pdf-fill text-secondary me-2"></i>
                                                        <a :href="pdf" target="_blank"
                                                            class="text-decoration-none"
                                                            x-text="'Existing PDF #' + (index + 1)"></a>
                                                    </li>
                                                </template>
                                            </template>
                                        </ul>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="button" class="btn btn-secondary"
                                                @click="prevStep()">Previous</button>
                                            <button type="button" class="btn btn-primary" @click="nextStep()">Next</button>
                                        </div>
                                    </div>

                                    <!-- Step 4: Visibility -->
                                    <div x-show="step === 4" class="mb-4" x-cloak>
                                        <label class="form-label fw-semibold">Post Visibility</label>
                                        <select name="visibility" class="form-select" x-model="form.visibility"
                                            @change="updateProgress()">
                                            <option value="public" :selected="form.visibility === 'public'">Public
                                            </option>
                                            <option value="private" :selected="form.visibility === 'private'">Private
                                            </option>
                                        </select>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="button" class="btn btn-secondary"
                                                @click="prevStep()">Previous</button>
                                            <button type="submit"
                                                class="btn btn-success">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function postForm(post) {
        return {
            step: 1,
            progress: 0,
            form: {
                body: post?.body || '',
                imagePreviews: [],
                pdfNames: [],
                visibility: post?.visibility || 'public',

                existingImages: post?.images ? JSON.parse(post.images) : [],
                existingPDFs: post?.pdfs ? JSON.parse(post.pdfs) : [],
            },
            errors: {},

            init() {
                this.updateProgress();
                this.step = 1; // start from step 1; change if needed
            },
            updateBody() {
                this.form.body = document.getElementById('body').value;
                this.updateProgress();
            },
            updateProgress() {
                let filled = 0;
                if (this.form.body.trim()) filled++;
                if (this.form.imagePreviews.length > 0 || this.form.existingImages.length > 0) filled++;
                if (this.form.pdfNames.length > 0 || this.form.existingPDFs.length > 0) filled++;
                if (this.form.visibility) filled++;
                this.progress = (filled / 4) * 100;
            },
            nextStep() {
                this.errors = {};
                if (this.step === 1 && !this.form.body.trim()) this.errors.body = 'Post content is required.';
                if (this.step === 2 && this.form.imagePreviews.length === 0 && this.form.existingImages.length === 0)
                    this.errors.images = 'Please upload or keep at least one image.';
                if (Object.keys(this.errors).length === 0) this.step++;
            },
            prevStep() {
                if (this.step > 1) this.step--;
            },
            handleImages(event) {
                const files = Array.from(event.target.files);
                this.form.imagePreviews = [];
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => this.form.imagePreviews.push(e.target.result);
                    reader.readAsDataURL(file);
                });
                this.updateProgress();
            },
            // handlePDFs(event) {
            //     const files = Array.from(event.target.files);
            //     this.form.pdfNames = files.map(f => f.name);
            //     this.updateProgress();
            // },
        }
    }
</script>
