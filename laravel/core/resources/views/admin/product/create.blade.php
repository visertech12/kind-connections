@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Add New Product</div>
        <div class="page-header__subtitle">Fill in the details to create a new product listing</div>
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
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Product Name <span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. ComAI - Social Media Platform" value="{{ old('name') }}" required>
                        <div class="form-hint">Use a clear, descriptive name for your product</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description <span class="required">*</span></label>
                        <textarea name="description" class="form-control" placeholder="Write a detailed description of your product..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Category <span class="required">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Regular Price ($) <span class="required">*</span></label>
                            <input type="number" step="0.01" min="0" name="regular_price" class="form-control" placeholder="0.00" value="{{ old('regular_price') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Extended License Price ($)</label>
                            <input type="number" step="0.01" min="0" name="extended_price" class="form-control" placeholder="0.00" value="{{ old('extended_price') }}">
                            <div class="form-hint">Leave blank or 0 if no extended license</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Server Install Service Fee ($)</label>
                            <input type="number" step="0.01" min="0" name="install_fee" class="form-control" placeholder="19.00" value="{{ old('install_fee') }}">
                            <div class="form-hint">Charged when buyer chooses "Install &amp; configure on my server". Leave blank to use default ($19).</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Demo URL</label>
                        <input type="url" name="demo_url" class="form-control" placeholder="https://demo.example.com" value="{{ old('demo_url') }}">
                        <div class="form-hint">Live preview link for this product</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Download File Link</label>
                        <input type="url" name="file_link" class="form-control" placeholder="https://example.com/download/file.zip" value="{{ old('file_link') }}">
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
                </div>

                <div class="card-header" style="border-top:1px solid var(--border-color);border-bottom:none;margin-top:0">
                    <div class="card-title"><i class="fas fa-image" style="color:var(--warning);margin-right:8px"></i>Product Image</div>
                </div>
                <div class="card-body">
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Cover Image</label>
                        <div style="border:2px dashed var(--border-color);border-radius:var(--radius-md);padding:28px;text-align:center;cursor:pointer;transition:var(--transition);position:relative"
                             id="dropZone"
                             onclick="document.getElementById('imageInput').click()"
                             ondragover="event.preventDefault();this.style.borderColor='var(--primary)'"
                             ondragleave="this.style.borderColor='var(--border-color)'"
                             ondrop="handleDrop(event)">
                            <div id="dropPlaceholder">
                                <i class="fas fa-cloud-upload-alt" style="font-size:2rem;color:var(--text-muted);margin-bottom:10px"></i>
                                <div style="font-size:.87rem;font-weight:600;color:var(--text-secondary)">Click or drag image here</div>
                                <div style="font-size:.75rem;color:var(--text-muted);margin-top:4px">PNG, JPG, WEBP up to 5MB</div>
                            </div>
                            <img id="imagePreview" style="display:none;max-width:100%;max-height:200px;border-radius:var(--radius-sm)" alt="Preview">
                        </div>
                        <input type="file" name="image" id="imageInput" accept="image/*" style="display:none" onchange="previewImage(this)">
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
                        placeholder="Leave blank to use product name" value="{{ old('seo_title') }}">
                    <div class="form-hint">Recommended: 50–60 characters. Shown in browser tab &amp; Google results.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea name="seo_description" class="form-control" rows="3" maxlength="320"
                        placeholder="A compelling summary for search engines (120–160 chars)">{{ old('seo_description') }}</textarea>
                    <div class="form-hint">Displayed under the title in Google search results.</div>
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label">Keywords / Tags</label>
                    <input type="text" name="seo_keywords" class="form-control"
                        placeholder="e.g. php script, laravel, ecommerce, saas" value="{{ old('seo_keywords') }}">
                    <div class="form-hint">Comma-separated keywords for this product.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Options -->
    <div>
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-cog" style="color:var(--secondary);margin-right:8px"></i>Publishing</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active (Published)</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive (Draft)</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-check">
                        <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                        <span class="form-check-label">Mark as Featured</span>
                    </label>
                    <div class="form-hint" style="margin-top:6px">Featured products appear prominently on the homepage</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:13px" form="productForm">
            <i class="fas fa-save"></i> Publish Product
        </button>
        <a href="{{ route('admin.product.index') }}" class="btn btn-ghost" style="width:100%;justify-content:center;margin-top:10px">
            Cancel
        </a>
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
function handleDrop(e) {
    e.preventDefault();
    const file = e.dataTransfer.files[0];
    if (file) {
        const input = document.getElementById('imageInput');
        const dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;
        previewImage(input);
    }
    e.currentTarget.style.borderColor = 'var(--border-color)';
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
</script>
@endpush
