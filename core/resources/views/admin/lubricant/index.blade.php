@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Lubricants</div>
        <div class="page-header__subtitle">Manage all your lubricants</div>
    </div>
    <a href="{{ route('admin.lubricant.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Lubricant
    </a>
</div>

<!-- Search & Filter Bar -->
<div class="card" style="margin-bottom:20px">
    <div class="card-body" style="padding:16px 24px">
        <form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
            <div style="flex:1;min-width:220px;position:relative">
                <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:.85rem">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search lubricants..." style="padding-left:36px">
            </div>
            <select name="status" class="form-select" style="width:140px" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="1" {{ request('status')=='1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status')=='0' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-filter"></i> Filter</button>
            @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.lubricant.index') }}" class="btn btn-ghost btn-sm"><i class="fas fa-times"></i> Clear</a>
            @endif
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            All Lubricants
            <span style="font-size:.78rem;font-weight:500;color:var(--text-muted);margin-left:8px">({{ $lubricants->total() }} total)</span>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Lubricant</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lubricants as $index => $lubricant)
                <tr>
                    <td style="color:var(--text-muted);font-size:.8rem">{{ $lubricants->firstItem() + $index }}</td>
                    <td>
                        <div class="product-info-cell">
                            @if($lubricant->image)
                                @php
                                    $thumb = str_starts_with($lubricant->image, 'http')
                                        ? $lubricant->image
                                        : asset('assets/images/lubricants/'.$lubricant->image);
                                @endphp
                                <img src="{{ $thumb }}" class="product-thumb" alt="">
                            @else
                                <div style="width:44px;height:44px;border-radius:var(--radius-sm);background:var(--primary-light);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0">
                                    <i class="fas fa-oil-can"></i>
                                </div>
                            @endif
                            <div>
                                <div class="product-info-cell__name">{{ Str::limit($lubricant->name, 40) }}</div>
                                <div class="product-info-cell__sub">{{ $lubricant->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span style="font-weight:700;color:var(--primary)">${{ number_format($lubricant->regular_price, 2) }}</span>
                    </td>
                    <td>
                        @if($lubricant->featured)
                            <span class="badge badge-warning"><i class="fas fa-star" style="font-size:.65rem"></i> Featured</span>
                        @else
                            <span style="color:var(--text-muted);font-size:.8rem">—</span>
                        @endif
                    </td>
                    <td>
                        @if($lubricant->status)
                            <span class="badge badge-success"><i class="fas fa-circle" style="font-size:.5rem"></i> Active</span>
                        @else
                            <span class="badge badge-danger"><i class="fas fa-circle" style="font-size:.5rem"></i> Inactive</span>
                        @endif
                    </td>
                    <td style="font-size:.78rem;color:var(--text-muted)">{{ $lubricant->created_at?->format('d M Y') }}</td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px">
                            <a href="{{ route('admin.lubricant.edit', $lubricant->id) }}" class="btn btn-icon" style="background:var(--primary-light);color:var(--primary)" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.lubricant.delete', $lubricant->id) }}" method="POST" onsubmit="return confirm('Delete this lubricant? This cannot be undone.')">
                                @csrf
                                <button type="submit" class="btn btn-icon" style="background:#fee2e2;color:var(--danger)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div style="text-align:center;padding:40px 0">
                            <div style="font-size:2.5rem;margin-bottom:12px;opacity:.3"><i class="fas fa-oil-can"></i></div>
                            <div style="color:var(--text-muted);font-size:.9rem">No lubricants found</div>
                            <a href="{{ route('admin.lubricant.create') }}" class="btn btn-primary btn-sm" style="margin-top:12px">Add First Lubricant</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($lubricants->hasPages())
    <div class="pagination-wrapper">{{ $lubricants->links() }}</div>
    @endif
</div>
@endsection
