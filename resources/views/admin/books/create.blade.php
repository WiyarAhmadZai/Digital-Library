@extends('layouts.layout')

@section('content')
    <div class="page-wrapper">
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
                            <input type="text" x-model="form.name" @input="errors.name = null; updateProgress()"
                                :class="errors.name ? 'is-invalid' : (form.name.trim().length > 0 ? 'is-valid' : '')"
                                class="form-control" name="name" />
                            <div class="text-danger" x-show="errors.name" x-text="errors.name"></div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Description</label>
                            <textarea name="description" x-model="form.description" @input="errors.description = null; updateProgress()"
                                rows="3" class="form-control"
                                :class="errors.description ? 'is-invalid' : (form.description.trim().length > 0 ? 'is-valid' :
                                    '')"></textarea>
                            <div class="text-danger" x-show="errors.description" x-text="errors.description"></div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Author</label>
                            <select name="author_id" x-model="form.author_id"
                                @change="errors.author_id = null; updateProgress()" class="form-select"
                                :class="errors.author_id ? 'is-invalid' : (form.author_id ? 'is-valid' : '')">
                                <option value="">Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger" x-show="errors.author_id" x-text="errors.author_id"></div>
                            @error('author_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror


                            <button type="button" @click="nextStep()" class="btn btn-success mt-4">Next</button>
                        </div>

                        <!-- STEP 2 -->
                        <div x-show="step === 2" class="mb-4">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" x-model="form.category"
                                @input="errors.category = null; updateProgress()" class="form-control"
                                :class="errors.category ? 'is-invalid' : (form.category.trim().length > 0 ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.category" x-text="errors.category"></div>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Price</label>
                            <input type="number" name="price" x-model="form.price"
                                @input="errors.price = null; updateProgress()" class="form-control"
                                :class="errors.price ? 'is-invalid' : (form.price.toString().trim().length > 0 ? 'is-valid' :
                                    '')" />
                            <div class="text-danger" x-show="errors.price" x-text="errors.price"></div>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Currency</label>
                            <input type="text" name="currency_type" x-model="form.currency_type"
                                @input="errors.currency_type = null; updateProgress()" class="form-control"
                                :class="errors.currency_type ? 'is-invalid' : (form.currency_type.trim().length > 0 ?
                                    'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.currency_type" x-text="errors.currency_type"></div>
                            @error('currency_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Language</label>
                            <input type="text" name="language" x-model="form.language"
                                @input="errors.language = null; updateProgress()" class="form-control"
                                :class="errors.language ? 'is-invalid' : (form.language.trim().length > 0 ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.language" x-text="errors.language"></div>
                            @error('language')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror


                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                        </div>

                        <!-- STEP 3 -->
                        <div x-show="step === 3" class="mb-4">
                            <label class="form-label">Publish Year</label>
                            <input type="date" name="publish_year" x-model="form.publish_year"
                                @input="errors.publish_year = null; updateProgress()" class="form-control"
                                :class="errors.publish_year ? 'is-invalid' : (form.publish_year ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.publish_year" x-text="errors.publish_year"></div>
                            @error('publish_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="status" x-model="form.status" value="active" />

                            <label class="form-label mt-3">Total Pages</label>
                            <input type="number" name="total_pages" x-model="form.total_pages"
                                @input="errors.total_pages = null; updateProgress()" class="form-control"
                                :class="errors.total_pages ? 'is-invalid' : (form.total_pages.toString().trim().length > 0 ?
                                    'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.total_pages" x-text="errors.total_pages"></div>
                            @error('total_pages')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror


                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                        </div>

                        <!-- STEP 4 -->
                        <div x-show="step === 4" class="mb-4">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" x-model="form.sku"
                                @input="errors.sku = null; updateProgress()" class="form-control"
                                :class="errors.sku ? 'is-invalid' : (form.sku.trim().length > 0 ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.sku" x-text="errors.sku"></div>
                            @error('sku')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Format</label>
                            <input type="text" name="format" x-model="form.format"
                                @input="errors.format = null; updateProgress()" class="form-control"
                                :class="errors.format ? 'is-invalid' : (form.format.trim().length > 0 ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.format" x-text="errors.format"></div>
                            @error('format')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Country</label>
                            <input type="text" name="country" x-model="form.country"
                                @input="errors.country = null; updateProgress()" class="form-control"
                                :class="errors.country ? 'is-invalid' : (form.country.trim().length > 0 ? 'is-valid' : '')" />
                            <div class="text-danger" x-show="errors.country" x-text="errors.country"></div>
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label class="form-label mt-3">Discount (%)</label>
                            <input type="number" name="discount" min="0" max="100" x-model="form.discount"
                                @input="errors.discount = null; updateDiscountedPrice()" class="form-control"
                                :class="errors.discount ? 'is-invalid' : (form.discount.toString().trim().length > 0 ?
                                    'is-valid' : '')"
                                placeholder="e.g. 10 for 10%" />
                            <div class="text-danger" x-show="errors.discount" x-text="errors.discount"></div>
                            @error('discount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <small class="text-muted" x-show="form.price">
                                Final Price: <strong x-text="discountedPrice.toFixed(2)"></strong>
                            </small>

                            <br>

                            <label class="form-label mt-3">Tags</label>
                            <textarea name="tags" x-model="form.tags" @input="errors.tags = null; updateProgress()" rows="2"
                                class="form-control" :class="errors.tags ? 'is-invalid' : (form.tags.trim().length > 0 ? 'is-valid' : '')"></textarea>
                            <div class="text-danger" x-show="errors.tags" x-text="errors.tags"></div>
                            @error('tags')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror


                            <button type="button" @click="prevStep()" class="btn btn-secondary mt-3">Previous</button>
                            <button type="button" @click="nextStep()" class="btn btn-success mt-3 ms-2">Next</button>
                        </div>

                        <!-- STEP 5 -->
                        <div x-show="step === 5" class="mb-4">
                            <label class="form-label">Book Images (2-11 images)</label>
                            <input type="file" multiple accept="image/*" name="image_path[]" class="form-control"
                                :class="errors.images ? 'is-invalid' : (form.image_path.length >= 2 ? 'is-valid' : '')"
                                @change="errors.images = null; handleFiles($event)" />

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
                    status: @json(old('status', isset($book) && $book->deleted_at ? 'deactive' : 'active')),
                    total_pages: @json(old('total_pages', $book->total_pages ?? '')),
                    sku: @json(old('sku', $book->sku ?? '')),
                    format: @json(old('format', $book->format ?? '')),
                    country: @json(old('country', $book->country ?? '')),
                    discount: @json(old('discount', $book->discount ?? '')),
                    tags: @json(old('tags', $book->tags ?? '')),
                    image_path: @json(old('image_path', $book->image_path ?? [])),
                },
                errors: {
                    name: null,
                    description: null,
                    author_id: null,
                    category: null,
                    price: null,
                    currency_type: null,
                    language: null,
                    publish_year: null,
                    status: null,
                    total_pages: null,
                    sku: null,
                    format: null,
                    country: null,
                    discount: null,
                    tags: null,
                    // etc.
                },

                requiredFieldsPerStep: {
                    1: ['name', 'description', 'author_id'],
                    2: ['category', 'price', 'currency_type', 'language'],
                    3: ['publish_year', 'status', 'total_pages'],
                    4: ['sku', 'format', 'country', 'discount', 'tags'],
                    5: []
                },

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
                    this.errors = {};

                    const fieldsToValidate = this.requiredFieldsPerStep[this.step] || [];
                    let hasError = false;

                    fieldsToValidate.forEach(field => {
                        if (!this.form[field] || this.form[field].toString().trim() === '') {
                            this.errors[field] = 'This field is required.';
                            hasError = true;
                        }
                    });

                    if (!hasError) {
                        if (this.step < this.totalSteps) this.step++;
                        window.scrollTo(0, 0);
                    } else {
                        window.scrollTo(0, 0);
                    }
                },
                prevStep() {
                    if (this.step > 1) this.step--;
                    window.scrollTo(0, 0);
                },
                clearError(field) {
                    if (this.errors[field]) {
                        delete this.errors[field];
                    }
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
