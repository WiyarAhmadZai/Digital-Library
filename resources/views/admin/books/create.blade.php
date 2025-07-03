@extends('layouts.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container my-5" x-data="bookForm()" x-init="init()" x-cloak>
        <h1 class="mb-4">Create New Book</h1>
        <div class="row">
            <!-- Left side: Form -->
            <div class="col-md-6">
                <form method="POST"
                    action="{{ isset($book) ? route('admin.book.update', $book) : route('admin.book.store') }}"
                    enctype="multipart/form-data" @submit.prevent="$el.submit()">
                    @csrf
                    @if (isset($book))
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
                        <label class="form-label">Book Name</label>
                        <input type="text" name="name" x-model="form.name" @input="updateProgress()"
                            class="form-control">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Description</label>
                        <textarea name="description" x-model="form.description" @input="updateProgress()" rows="3" class="form-control"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Author</label>
                        <select name="author_id" x-model="form.author_id" @change="updateProgress()" class="form-select">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="button" @click="nextStep()" class="btn btn-success mt-4">Next</button>
                    </div>

                    <!-- STEP 2 -->
                    <div x-show="step === 2" class="mb-4">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" x-model="form.category" @input="updateProgress()"
                            class="form-control">
                        @error('category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Price</label>
                        <input type="number" name="price" x-model="form.price" @input="updateProgress()"
                            class="form-control">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Currency</label>
                        <input type="text" name="currency_type" x-model="form.currency_type" @input="updateProgress()"
                            class="form-control">
                        @error('currency_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Language</label>
                        <input type="text" name="language" x-model="form.language" @input="updateProgress()"
                            class="form-control">
                        @error('language')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                        <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                    </div>

                    <!-- STEP 3 -->
                    <div x-show="step === 3" class="mb-4">
                        <label class="form-label">Publish Year</label>
                        <input type="date" name="publish_year" x-model="form.publish_year" @input="updateProgress()"
                            class="form-control">
                        @error('publish_year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Status</label>
                        <input type="text" name="status" x-model="form.status" @input="updateProgress()"
                            class="form-control">
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Total Pages</label>
                        <input type="number" name="total_pages" x-model="form.total_pages" @input="updateProgress()"
                            class="form-control">
                        @error('total_pages')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                        <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                    </div>

                    <!-- STEP 4 -->
                    <div x-show="step === 4" class="mb-4">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" x-model="form.sku" @input="updateProgress()"
                            class="form-control">
                        @error('sku')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Format</label>
                        <input type="text" name="format" x-model="form.format" @input="updateProgress()"
                            class="form-control">
                        @error('format')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Country</label>
                        <input type="text" name="country" x-model="form.country" @input="updateProgress()"
                            class="form-control">
                        @error('country')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="form-label mt-3">Discount (%)</label>
                        <input type="number" name="discount" min="0" max="100" x-model="form.discount"
                            @input="updateDiscountedPrice" class="form-control" placeholder="e.g. 10 for 10%">

                        <small class="text-muted" x-show="form.price">
                            Final Price: <strong x-text="discountedPrice.toFixed(2)"></strong>
                        </small>

                        @error('discount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror <br>


                        <label class="form-label mt-3">Tags</label>
                        <textarea name="tags" x-model="form.tags" @input="updateProgress()" rows="2" class="form-control"></textarea>
                        @error('tags')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                        <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                    </div>

                    <!-- STEP 5 -->
                    <div x-show="step === 5" class="mb-4">
                        <label class="form-label">Book Images (2-11 images)</label>
                        <input type="file" multiple accept="image/*" @change="handleFiles($event)"
                            class="form-control">

                        <template x-if="errors.images">
                            <div class="text-danger mt-2" x-text="errors.images"></div>
                        </template>

                        <div class="row mt-3 g-2" @dragover.prevent @drop.prevent="handleDrop($event)">
                            <template x-for="(image, index) in form.image_path" :key="index">
                                <div class="col-4">
                                    <div class="border position-relative" draggable="true"
                                        @dragstart="dragStart($event, index)" @drop.prevent="dragDrop($event, index)"
                                        @click="replaceImage(index)">
                                        <img :src="image.url" class="img-fluid"
                                            style="height: 120px; object-fit: cover;">
                                        <button type="button" @click.stop="removeImage(index)"
                                            class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1">&times;</button>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                        <button type="submit" class="btn btn-primary mt-3 ms-2">
                            {{ isset($book) ? 'Update Book' : 'Create Book' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right side: Image (changes per step) -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <!-- 📸 Change these image files in /public/assets/img/book/01.png ... 05.png -->
                <img :src="'{{ asset('assets/img/book') }}/' + String(step).padStart(2, '0') + '.png'"
                    class="img-fluid rounded shadow" alt="Book Image" style="max-height: 450px;">
            </div>

        </div>
    </div>

    <script>
        function bookForm() {
            return {
                step: 1,
                totalSteps: 5,
                progress: 0,
                discountedPrice: 0,
                form: {
                    name: @json(old('name', $book->name ?? '')),
                    description: @json(old('description', $book->description ?? '')),
                    author_id: @json(old('author_id', $book->author_id ?? '')),
                    category: @json(old('category', $book->category ?? '')),
                    price: @json(old('price', $book->price ?? '')),
                    currency_type: @json(old('currency_type', $book->currency_type ?? '')),
                    language: @json(old('language', $book->language ?? '')),
                    publish_year: @json(old('publish_year', $book->publish_year ?? '')),
                    status: @json(old('status', $book->status ?? '')),
                    total_pages: @json(old('total_pages', $book->total_pages ?? '')),
                    sku: @json(old('sku', $book->sku ?? '')),
                    format: @json(old('format', $book->format ?? '')),
                    country: @json(old('country', $book->country ?? '')),
                    discount: @json(old('discount', $book->discount ?? '')),
                    tags: @json(old('tags', $book->tags ?? '')),
                    image_path: @json(old('image_path', $book->image_path ?? [])),
                },
                errors: {},
                init() {
                    if (this.form.image_path && this.form.image_path.length && typeof this.form.image_path[0] ===
                        'string') {
                        this.form.image_path = this.form.image_path.map(url => ({
                            url
                        }));
                    }
                    this.updateProgress();
                },
                nextStep() {
                    if (this.step < this.totalSteps) this.step++;
                    window.scrollTo(0, 0);
                },
                prevStep() {
                    if (this.step > 1) this.step--;
                    window.scrollTo(0, 0);
                },
                updateProgress() {
                    let filled = 0;
                    const fields = ['name', 'description', 'author_id', 'category', 'price', 'currency_type', 'language',
                        'publish_year', 'status', 'total_pages', 'sku', 'format', 'country', 'discount', 'tags'
                    ];
                    fields.forEach(field => {
                        if (this.form[field] && this.form[field].toString().trim() !== '') filled++;
                    });
                    this.progress = (filled / fields.length) * 100;
                    this.updateDiscountedPrice();
                },

                handleFiles(event) {
                    const files = event.target.files;
                    for (let i = 0; i < files.length; i++) {
                        if (this.form.image_path.length >= 11) {
                            this.errors.images = 'Maximum 11 images allowed.';
                            return;
                        }
                        const reader = new FileReader();
                        reader.onload = e => {
                            this.form.image_path.push({
                                file: files[i],
                                url: e.target.result
                            });
                            this.validateImages();
                        };
                        reader.readAsDataURL(files[i]);
                    }
                },
                removeImage(index) {
                    this.form.image_path.splice(index, 1);
                    this.validateImages();
                },
                validateImages() {
                    this.errors.images = this.form.image_path.length < 2 ? 'Minimum 2 images required.' : null;
                },
                dragStart(e, index) {
                    e.dataTransfer.setData('text/plain', index);
                },
                dragDrop(e, index) {
                    const draggedIndex = e.dataTransfer.getData('text/plain');
                    const draggedImage = this.form.image_path[draggedIndex];
                    this.form.image_path.splice(draggedIndex, 1);
                    this.form.image_path.splice(index, 0, draggedImage);
                },
                replaceImage(index) {
                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = 'image/*';
                    input.onchange = e => {
                        const file = e.target.files[0];
                        const reader = new FileReader();
                        reader.onload = ev => this.form.image_path[index] = {
                            file,
                            url: ev.target.result
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                },
                updateDiscountedPrice() {
                    const price = parseFloat(this.form.price || 0);
                    const discount = parseFloat(this.form.discount || 0);
                    const discountAmount = (price * discount) / 100;
                    this.discountedPrice = price - discountAmount;
                    this.updateProgress();
                }

            }
        }
    </script>
@endsection
