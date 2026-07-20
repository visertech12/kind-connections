@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">Users</div>
        <div class="page-header__subtitle">Manage all registered users</div>
    </div>
</div>

<!-- Search Bar -->
<div class="card" style="margin-bottom:20px">
    <div class="card-body" style="padding:16px 24px">
        <form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
            <div style="flex:1;min-width:220px;position:relative">
                <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:.85rem">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name, email or username..." style="padding-left:36px">
            </div>
            <select name="status" class="form-select" style="width:140px" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="1" {{ request('status')=='1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status')=='0' ? 'selected' : '' }}>Banned</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-filter"></i> Filter</button>
            @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost btn-sm"><i class="fas fa-times"></i> Clear</a>
            @endif
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            All Users
            <span style="font-size:.78rem;font-weight:500;color:var(--text-muted);margin-left:8px">({{ $users->total() }} total)</span>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Username</th>
                    <th>Mobile</th>
                    <th>Balance</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td style="color:var(--text-muted);font-size:.8rem">{{ $users->firstItem() + $index }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="user-avatar">
                                {{ strtoupper(substr($user->firstname ?? $user->username ?? 'U', 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-weight:600;font-size:.85rem">{{ ($user->firstname ?? '') . ' ' . ($user->lastname ?? '') ?: ($user->username ?? '—') }}</div>
                                <div style="font-size:.73rem;color:var(--text-muted)">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="font-size:.83rem">{{ $user->username ?? '—' }}</td>
                    <td style="font-size:.83rem;color:var(--text-muted)">{{ $user->mobile ?? '—' }}</td>
                    <td>
                        <span style="font-weight:700;color:var(--success)">${{ number_format($user->balance ?? 0, 2) }}</span>
                    </td>
                    <td>
                        <div style="display:flex;gap:5px;flex-wrap:wrap">
                            @if($user->ev)
                                <span class="badge badge-success" title="Email Verified"><i class="fas fa-envelope" style="font-size:.6rem"></i></span>
                            @else
                                <span class="badge badge-danger" title="Email Not Verified"><i class="fas fa-envelope" style="font-size:.6rem"></i></span>
                            @endif
                            @if($user->sv)
                                <span class="badge badge-success" title="SMS Verified"><i class="fas fa-mobile" style="font-size:.6rem"></i></span>
                            @else
                                <span class="badge badge-warning" title="SMS Not Verified"><i class="fas fa-mobile" style="font-size:.6rem"></i></span>
                            @endif
                        </div>
                    </td>
                    <td>
                        @if($user->status)
                            <span class="badge badge-success"><i class="fas fa-circle" style="font-size:.5rem"></i> Active</span>
                        @else
                            <span class="badge badge-danger"><i class="fas fa-circle" style="font-size:.5rem"></i> Banned</span>
                        @endif
                    </td>
                    <td style="font-size:.78rem;color:var(--text-muted)">{{ $user->created_at?->format('d M Y') }}</td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px">
                            <a href="{{ route('admin.users.detail', $user->id) }}" class="btn btn-icon" style="background:var(--primary-light);color:var(--primary)" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">
                        <div style="text-align:center;padding:40px 0">
                            <div style="font-size:2.5rem;margin-bottom:12px;opacity:.3"><i class="fas fa-users"></i></div>
                            <div style="color:var(--text-muted);font-size:.9rem">No users found</div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="pagination-wrapper">{{ $users->links() }}</div>
    @endif
</div>
@endsection
