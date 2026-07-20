@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle }}</div>
        <div class="page-header__subtitle">Manage all your product and lubricant categories</div>
    </div>
    <button type="button" class="btn btn-primary" onclick="toggleForm()">
        <i class="fas fa-plus"></i> Add New Category
    </button>
</div>

<div class="card" id="categoryFormCard" style="display:none; margin-bottom: 20px;">
    <div class="card-header">
        <div class="card-title" id="formTitle">Add Category</div>
    </div>
    <form action="{{ route('admin.category.store') }}" method="POST" id="categoryForm">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="form-label">Category Name <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label">Icon Class (e.g. fas fa-tag)</label>
                    <input type="text" name="icon" class="form-control" placeholder="fas fa-tag">
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label">Status <span class="required">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12"><h6 class="text-muted">SEO Settings (Optional)</h6><hr></div>
                <div class="col-md-4 form-group">
                    <label class="form-label">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" placeholder="Meta Title">
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label">SEO Keywords</label>
                    <input type="text" name="seo_keywords" class="form-control" placeholder="keyword1, keyword2">
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label">SEO Description</label>
                    <textarea name="seo_description" class="form-control" rows="2" placeholder="Meta Description"></textarea>
                </div>
            </div>
            <div style="display:flex; gap:10px; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Save Category</button>
                <button type="button" class="btn btn-ghost" onclick="toggleForm()">Cancel</button>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">All Categories <span style="font-size:.78rem;font-weight:500;color:var(--text-muted);margin-left:8px">({{ $categories->total() }} total)</span></div>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th style="text-align:right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td style="color:var(--text-muted);font-size:.8rem">{{ $loop->iteration }}</td>
                    <td style="font-weight:600">{{ $category->name }}</td>
                    <td>
                        <i class="{{ $category->icon ?? 'fas fa-tag' }} fa-lg text-primary"></i>
                    </td>
                    <td>
                        @if($category->status)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px">
                            <button class="btn btn-icon" style="background:var(--primary-light);color:var(--primary)" onclick='editCategory(@json($category))'>
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category? Cannot be undone.')">
                                @csrf
                                <button type="submit" class="btn btn-icon" style="background:#fee2e2;color:var(--danger)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding:40px 0;color:var(--text-muted)">
                        <div style="font-size:2.5rem;margin-bottom:12px;opacity:.3"><i class="fas fa-tags"></i></div>
                        <div>No categories found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($categories->hasPages())
        <div class="pagination-wrapper">{{ $categories->links() }}</div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    const formCard = document.getElementById('categoryFormCard');
    const form = document.getElementById('categoryForm');
    
    function toggleForm() {
        if (formCard.style.display === 'none') {
            document.getElementById('formTitle').innerText = 'Add Category';
            form.action = "{{ route('admin.category.store') }}";
            form.reset();
            formCard.style.display = 'block';
        } else {
            formCard.style.display = 'none';
        }
    }
    
    function editCategory(category) {
        document.getElementById('formTitle').innerText = 'Edit Category';
        form.action = `{{ url('admin/category/update') }}/${category.id}`;
        form.elements['name'].value = category.name;
        form.elements['icon'].value = category.icon_class || '';
        form.elements['status'].value = category.status;
        form.elements['seo_title'].value = category.seo_title || '';
        form.elements['seo_keywords'].value = category.seo_keywords || '';
        form.elements['seo_description'].value = category.seo_description || '';
        formCard.style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
@endpush
