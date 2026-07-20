@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Dashboard</div>
        <div class="page-header__subtitle">Welcome back! Here's what's happening today.</div>
    </div>
    <div>
        <span style="font-size:.82rem;color:var(--text-muted)"><i class="fas fa-calendar-alt" style="margin-right:5px"></i>{{ now()->format('D, d M Y') }}</span>
    </div>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card__info">
            <div class="stat-card__label">Total Users</div>
            <div class="stat-card__value">{{ number_format($widget['total_users']) }}</div>
            <div class="stat-card__change up"><i class="fas fa-arrow-up"></i> Active accounts</div>
        </div>
        <div class="stat-card__icon icon-primary"><i class="fas fa-users"></i></div>
    </div>
    <div class="stat-card">
        <div class="stat-card__info">
            <div class="stat-card__label">Total Products</div>
            <div class="stat-card__value">{{ number_format($widget['total_products']) }}</div>
            <div class="stat-card__change up"><i class="fas fa-arrow-up"></i> Published items</div>
        </div>
        <div class="stat-card__icon icon-success"><i class="fas fa-box"></i></div>
    </div>
    <div class="stat-card">
        <div class="stat-card__info">
            <div class="stat-card__label">Active Users</div>
            <div class="stat-card__value">{{ number_format($widget['active_users']) }}</div>
            <div class="stat-card__change up"><i class="fas fa-arrow-up"></i> Status: active</div>
        </div>
        <div class="stat-card__icon icon-info"><i class="fas fa-user-check"></i></div>
    </div>
    <div class="stat-card">
        <div class="stat-card__info">
            <div class="stat-card__label">Categories</div>
            <div class="stat-card__value">{{ number_format($widget['total_categories']) }}</div>
            <div class="stat-card__change"><i class="fas fa-tags"></i> Product groups</div>
        </div>
        <div class="stat-card__icon icon-secondary"><i class="fas fa-tags"></i></div>
    </div>
</div>

<!-- Recent Products & Recent Users -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
    <!-- Recent Products -->
    <div class="card">
        <div class="card-header">
            <div class="card-title"><i class="fas fa-box" style="color:var(--primary);margin-right:8px"></i>Recent Products</div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-ghost btn-sm">View All</a>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_products as $p)
                    <tr>
                        <td>
                            <div style="font-weight:600;font-size:.83rem;max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $p->name }}</div>
                            <div style="font-size:.73rem;color:var(--text-muted)">{{ $p->category->name ?? '—' }}</div>
                        </td>
                        <td style="font-weight:700;color:var(--primary)">${{ number_format($p->regular_price, 2) }}</td>
                        <td>
                            @if($p->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" style="text-align:center;color:var(--text-muted)">No products yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="card">
        <div class="card-header">
            <div class="card-title"><i class="fas fa-users" style="color:var(--success);margin-right:8px"></i>Recent Users</div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost btn-sm">View All</a>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Joined</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_users as $u)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:.7rem">
                                    {{ strtoupper(substr($u->name ?? $u->username ?? 'U', 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight:600;font-size:.83rem">{{ $u->name ?? $u->username ?? '—' }}</div>
                                    <div style="font-size:.73rem;color:var(--text-muted)">{{ $u->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="font-size:.78rem;color:var(--text-muted)">{{ $u->created_at?->diffForHumans() }}</td>
                        <td>
                            @if($u->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Banned</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" style="text-align:center;color:var(--text-muted)">No users yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('styles')
<style>
@media(max-width:768px) {
    .stats-grid { grid-template-columns: 1fr 1fr !important; }
    div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns: 1fr !important; }
}
@media(max-width:480px) {
    .stats-grid { grid-template-columns: 1fr !important; }
}
</style>
@endpush
@endsection
