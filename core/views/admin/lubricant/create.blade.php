@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Add New Lubricant</div>
        <div class="page-header__subtitle">Fill in the details to create a new lubricant listing</div>
    </div>
    <a href="{{ route('admin.lubricant.index') }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Lubricants
    </a>
</div>

<div style="display:grid;grid-template-columns:1fr 320px;gap:20px;align-items:start">
    <!-- Main Form -->
    <div>
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-info-circle" style="color:var(--primary);margin-right:8px"></i>Basic Information</div>
            </div>
            <form action="{{ route('admin.lubricant.store') }}" method="POST" enctype="multipart/form-data" id="lubricantForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Lubricant Name <span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Engine Oil 5W-30" value="{{ old('name') }}" required>
                        <div class="form-hint">Use a clear, descriptive name for the lubricant</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description <span class="required">*</span></label>
                        <textarea name="description" class="form-control" placeholder="Write a detailed description of this lubricant..." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Regular Price ($) <span class="required">*</span></label>
                            <input type="number" step="0.01" min="0" name="regular_price" class="form-control" placeholder="0.00" value="{{ old('regular_price') }}" required>
                        </div>
                    </div>
                </div>

                <div class="card-header" style="border-top:1px solid var(--border-color);border-bottom:none;margin-top:0">
                    <div class="card-title"><i class="fas fa-image" style="color:var(--warning);margin-right:8px"></i>Lubricant Image</div>
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
                    <div class="form-hint" style="margin-top:6px">Featured lubricants appear prominently</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:13px" form="lubricantForm">
            <i class="fas fa-save"></i> Save Lubricant
        </button>
        <a href="{{ route('admin.lubricant.index') }}" class="btn btn-ghost" style="width:100%;justify-content:center;margin-top:10px">
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
</script>
@endpush
