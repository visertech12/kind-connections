@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Edit Product</div>
        <div class="page-header__subtitle">Editing: {{ Str::limit($product->name, 50) }}</div>
    </div>
    <a href="{{ route('admin.product.index') }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Products
    </a>
</div>

<div style="display:grid;grid-template-columns:1fr 320px;gap:20px;align-items:start">
    <!-- Main Form -->
    <div>
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-info-circle" style="color:var(--primary);margin-right:8px"></i>Basic Information</div>
            </div>
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Product Name <span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description <span class="required">*</span></label>
                        <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Category <span class="required">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pricing Type <span class="required">*</span></label>
                            @php $isFreeProduct = (float)old('regular_price', $product->regular_price) <= 0; @endphp
                            <div class="d-flex gap-3 mt-1">
                                <label class="d-flex align-items-center gap-2" style="cursor:pointer;font-weight:500">
                                    <input type="radio" name="pricing_type" id="pricing_paid" value="paid" {{ !$isFreeProduct ? 'checked' : '' }} onchange="togglePricingType(this.value)">
                                    <span>💰 Paid</span>
                                </label>
                                <label class="d-flex align-items-center gap-2" style="cursor:pointer;font-weight:500">
                                    <input type="radio" name="pricing_type" id="pricing_free" value="free" {{ $isFreeProduct ? 'checked' : '' }} onchange="togglePricingType(this.value)">
                                    <span>🆓 Free</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="price-fields" style="{{ $isFreeProduct ? 'display:none' : '' }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Regular Price ($) <span class="required">*</span></label>
                                <input type="number" step="0.01" min="0" name="regular_price" id="regular_price" class="form-control" value="{{ old('regular_price', $product->regular_price) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Extended License Price ($)</label>
                                <input type="number" step="0.01" min="0" name="extended_price" class="form-control" value="{{ old('extended_price', @$product->attributes['Extended Price']) }}">
                                <div class="form-hint">Leave blank or 0 if no extended license</div>
                            </div>
                        </div>
                    </div>
                    {{-- Hidden input sends 0 when Free is selected --}}
                    <input type="hidden" name="free_price_override" id="free_price_override" value="{{ $isFreeProduct ? '1' : '0' }}">

                    <div class="form-group">
                        <label class="form-label">Demo URL</label>
                        <input type="url" name="demo_url" class="form-control" value="{{ old('demo_url', @$product->attributes['Demo URL']) }}" placeholder="https://demo.example.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Download File Link</label>
                        <input type="url" name="file_link" class="form-control" value="{{ old('file_link', $product->file_link) }}" placeholder="https://example.com/download/file.zip">
                        <div class="form-hint">The secure link provided to buyers after purchase</div>
                    </div>
                </div>

                <div class="card-header" style="border-top:1px solid var(--border-color);border-bottom:none;margin-top:0">
                    <div class="card-title" style="display:flex;justify-content:space-between;width:100%">
                        <div><i class="fas fa-list" style="color:var(--info);margin-right:8px"></i>Product Details</div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addDetailField()">
                            <i class="fas fa-plus"></i> Add Detail
                        </button>
                    </div>
                </div>
                <div class="card-body" id="detailsContainer">
                    @php
                        $attributes = $product->attributes ? (array) $product->attributes : [];
                        unset($attributes['Demo URL']);
                        unset($attributes['Extended Price']);
                    @endphp
                    @forelse($attributes as $key => $value)
                        <div class="form-row" style="margin-bottom:12px">
                            <div class="form-group" style="margin-bottom:0">
                                <input type="text" name="detail_keys[]" class="form-control" value="{{ $key }}" placeholder="e.g. Compatible Browsers">
                            </div>
                            <div class="form-group" style="margin-bottom:0;display:flex;gap:10px">
                                <input type="text" name="detail_values[]" class="form-control" value="{{ $value }}" placeholder="e.g. Chrome, Firefox, Safari">
                                <button type="button" class="btn btn-icon btn-danger" onclick="this.parentElement.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="form-row" style="margin-bottom:12px">
                            <div class="form-group" style="margin-bottom:0">
                                <input type="text" name="detail_keys[]" class="form-control" placeholder="e.g. Compatible Browsers">
                            </div>
                            <div class="form-group" style="margin-bottom:0;display:flex;gap:10px">
                                <input type="text" name="detail_values[]" class="form-control" placeholder="e.g. Chrome, Firefox, Safari">
                                <button type="button" class="btn btn-icon btn-danger" onclick="this.parentElement.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="card-header" style="border-top:1px solid var(--border-color);border-bottom:none;margin-top:0">
                    <div class="card-title"><i class="fas fa-image" style="color:var(--warning);margin-right:8px"></i>Product Image</div>
                </div>
                <div class="card-body">
                    @if($product->image)
                    @php
                        $imgSrc = str_starts_with($product->image, 'http')
                            ? $product->image
                            : asset('assets/images/products/' . $product->image);
                    @endphp
                    <div style="margin-bottom:14px;padding:12px;background:var(--content-bg);border-radius:var(--radius-md);display:flex;align-items:center;gap:12px">
                        <img src="{{ $imgSrc }}" style="width:60px;height:60px;object-fit:cover;border-radius:var(--radius-sm);border:1px solid var(--border-color)" alt="">
                        <div>
                            <div style="font-size:.82rem;font-weight:600">Current Image</div>
                            <div style="font-size:.75rem;color:var(--text-muted)">Upload a new one to replace it</div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">{{ $product->image ? 'Replace Image' : 'Upload Image' }}</label>
                        <div style="border:2px dashed var(--border-color);border-radius:var(--radius-md);padding:28px;text-align:center;cursor:pointer;transition:var(--transition)"
                             onclick="document.getElementById('imageInput').click()">
                            <div id="dropPlaceholder">
                                <i class="fas fa-cloud-upload-alt" style="font-size:2rem;color:var(--text-muted);margin-bottom:10px"></i>
                                <div style="font-size:.87rem;font-weight:600;color:var(--text-secondary)">Click to upload new image</div>
                            </div>
                            <img id="imagePreview" style="display:none;max-width:100%;max-height:200px;border-radius:var(--radius-sm)" alt="Preview">
                        </div>
                        <input type="file" name="image" id="imageInput" accept="image/*" style="display:none" onchange="previewImage(this)">
                    </div>

                    <div class="form-group" style="margin-top: 15px; margin-bottom: 0;">
                        <label class="form-label">Database Image File Name / Link URL</label>
                        <input type="text" name="image_path_manual" class="form-control" value="{{ old('image_path_manual', $product->image) }}" placeholder="e.g. unlockthemes_filename.jpg or https://image-link.com/pic.jpg">
                        <div class="form-hint">You can manually write or edit the image name or link stored directly in the database. If you upload a file above, it takes priority.</div>
                    </div>
                </div>
        </div>

        {{-- SEO Card --}}
        <div class="card" style="margin-bottom:20px">
            <div class="card-header" style="cursor:pointer" onclick="this.nextElementSibling.style.display = this.nextElementSibling.style.display === 'none' ? '' : 'none'">
                <div class="card-title">
                    <i class="fas fa-search" style="color:var(--success);margin-right:8px"></i>SEO Settings
                    <small style="font-weight:400;color:var(--text-muted);margin-left:8px">(click to expand)</small>
                </div>
            </div>
            <div class="card-body" style="display:none">
                <div class="form-group">
                    <label class="form-label">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" maxlength="160"
                        placeholder="Leave blank to use product name" value="{{ old('seo_title', $product->seo_title) }}">
                    <div class="form-hint">Recommended: 50–60 characters. Shown in browser tab &amp; Google results.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea name="seo_description" class="form-control" rows="3" maxlength="320"
                        placeholder="A compelling summary for search engines (120–160 chars)">{{ old('seo_description', $product->seo_description) }}</textarea>
                    <div class="form-hint">Displayed under the title in Google search results.</div>
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label">Keywords / Tags</label>
                    <input type="text" name="seo_keywords" class="form-control"
                        placeholder="e.g. php script, laravel, ecommerce, saas" value="{{ old('seo_keywords', $product->seo_keywords) }}">
                    <div class="form-hint">Comma-separated keywords for this product.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div>
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-cog" style="color:var(--secondary);margin-right:8px"></i>Publishing</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active (Published)</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive (Draft)</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-check">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                        <span class="form-check-label">Mark as Featured</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Google Index Inspection -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fab fa-google" style="color:var(--primary);margin-right:8px"></i>Unlock Themes</div>
            </div>
            <div class="card-body" style="padding:16px 20px; text-align: center;">
                <a href="{{ route('admin.product.inspect-seo', $product->id) }}" target="_blank" class="btn btn-outline-info btn-sm w-100" style="justify-content: center;">
                    <i class="fas fa-search" style="margin-right: 5px;"></i> Inspect URL Index
                </a>
                <div class="form-hint" style="margin-top: 8px; font-size: 0.75rem;">Checks live indexing status using the Google Search Console API.</div>
            </div>
        </div>

        <!-- Product Meta -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-body" style="padding:16px 20px">
                <div style="display:flex;justify-content:space-between;margin-bottom:10px;font-size:.82rem">
                    <span style="color:var(--text-muted)">Product ID</span>
                    <span style="font-weight:600">#{{ $product->id }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;margin-bottom:10px;font-size:.82rem">
                    <span style="color:var(--text-muted)">Created</span>
                    <span style="font-weight:600">{{ $product->created_at?->format('d M Y') }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:.82rem">
                    <span style="color:var(--text-muted)">Last Updated</span>
                    <span style="font-weight:600">{{ $product->updated_at?->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:13px" form="productForm">
            <i class="fas fa-save"></i> Update Product
        </button>
        <a href="{{ route('admin.product.index') }}" class="btn btn-ghost" style="width:100%;justify-content:center;margin-top:10px">Cancel</a>
    </div>
</div>
            </form>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('dropPlaceholder').style.display = 'none';
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function addDetailField() {
    const container = document.getElementById('detailsContainer');
    const html = `
        <div class="form-row" style="margin-bottom:12px">
            <div class="form-group" style="margin-bottom:0">
                <input type="text" name="detail_keys[]" class="form-control" placeholder="e.g. Compatible Browsers">
            </div>
            <div class="form-group" style="margin-bottom:0;display:flex;gap:10px">
                <input type="text" name="detail_values[]" class="form-control" placeholder="e.g. Chrome, Firefox, Safari">
                <button type="button" class="btn btn-icon btn-danger" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}
function togglePricingType(type) {
    const priceFields = document.getElementById('price-fields');
    const regularPrice = document.getElementById('regular_price');
    const extendedPrice = document.querySelector('[name="extended_price"]');
    const override = document.getElementById('free_price_override');
    if (type === 'free') {
        priceFields.style.display = 'none';
        regularPrice.value = '0';
        if (extendedPrice) extendedPrice.value = '';
        override.value = '1';
    } else {
        priceFields.style.display = '';
        if (parseFloat(regularPrice.value) === 0) regularPrice.value = '';
        override.value = '0';
    }
}
</script>
@endpush
