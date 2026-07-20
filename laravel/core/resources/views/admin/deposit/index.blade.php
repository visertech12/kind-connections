@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle }}</div>
        <div class="page-header__subtitle">Manage all manual deposit requests — approve or reject them</div>
    </div>
    <a href="{{ route('admin.deposit.index') }}" class="btn btn-ghost btn-sm">
        <i class="fas fa-list"></i> All
    </a>
</div>

@push('styles')
<style>
.filter-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}
.filter-tab {
    padding: 8px 20px;
    border-radius: 8px;
    font-size: .83rem;
    font-weight: 600;
    text-decoration: none;
    border: 1.5px solid transparent;
    transition: all .2s;
    display: flex;
    align-items: center;
    gap: 6px;
}
.filter-tab.all      { background: #f1f5f9; color: #475569; border-color: #e2e8f0; }
.filter-tab.pending  { background: #fef3c7; color: #d97706; border-color: #fde68a; }
.filter-tab.approved { background: #dcfce7; color: #16a34a; border-color: #bbf7d0; }
.filter-tab.rejected { background: #fee2e2; color: #dc2626; border-color: #fecaca; }
.filter-tab.active   { box-shadow: 0 0 0 3px rgba(99,102,241,.15); border-color: #6366f1; color: #6366f1; background: #eef2ff; }
.count-badge {
    background: rgba(0,0,0,.08);
    border-radius: 10px;
    padding: 1px 7px;
    font-size: .72rem;
    font-weight: 700;
}
.user-cell { display: flex; align-items: center; gap: 10px; }
.user-avatar-sm {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: .72rem; font-weight: 700;
    flex-shrink: 0;
}
.trx-code { font-family: monospace; font-size: .8rem; color: #6366f1; font-weight: 600; }

.status-pill {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 11px;
    border-radius: 20px;
    font-size: .72rem;
    font-weight: 700;
}
.pill-pending  { background: #fef3c7; color: #d97706; }
.pill-success  { background: #dcfce7; color: #16a34a; }
.pill-rejected { background: #fee2e2; color: #dc2626; }
.pill-initiate { background: #f1f5f9; color: #64748b; }
</style>
@endpush

{{-- Filter Tabs --}}
<div class="filter-tabs">
    <a href="{{ route('admin.deposit.index') }}"
       class="filter-tab all {{ $filter === 'all' ? 'active' : '' }}">
        <i class="fas fa-list"></i> All
        <span class="count-badge">{{ $pendingCount + $approvedCount + $rejectedCount }}</span>
    </a>
    <a href="{{ route('admin.deposit.index', ['status' => 'pending']) }}"
       class="filter-tab pending {{ $filter === 'pending' ? 'active' : '' }}">
        <i class="fas fa-clock"></i> Pending
        <span class="count-badge">{{ $pendingCount }}</span>
    </a>
    <a href="{{ route('admin.deposit.index', ['status' => 'approved']) }}"
       class="filter-tab approved {{ $filter === 'approved' ? 'active' : '' }}">
        <i class="fas fa-check-circle"></i> Approved
        <span class="count-badge">{{ $approvedCount }}</span>
    </a>
    <a href="{{ route('admin.deposit.index', ['status' => 'rejected']) }}"
       class="filter-tab rejected {{ $filter === 'rejected' ? 'active' : '' }}">
        <i class="fas fa-times-circle"></i> Rejected
        <span class="count-badge">{{ $rejectedCount }}</span>
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-money-bill-wave" style="color:var(--primary);margin-right:8px"></i>
            Manual Deposits
        </div>
        <span style="font-size:.8rem;color:var(--text-muted)">{{ $deposits->total() }} total results</span>
    </div>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Transaction</th>
                    <th>Gateway</th>
                    <th>Requested</th>
                    <th>Charge</th>
                    <th>Will Credit</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($deposits as $deposit)
                <tr>
                    <td style="color:var(--text-muted);font-size:.78rem">{{ $loop->iteration }}</td>
                    <td>
                        <div class="user-cell">
                            <div class="user-avatar-sm">
                                {{ strtoupper(substr($deposit->user->name ?? $deposit->user->username ?? 'U', 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-weight:600;font-size:.85rem">{{ $deposit->user->name ?? $deposit->user->username ?? '—' }}</div>
                                <div style="font-size:.73rem;color:var(--text-muted)">{{ $deposit->user->email ?? '' }}</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="trx-code">{{ $deposit->trx }}</span></td>
                    <td>
                        <div style="font-weight:600;font-size:.85rem">{{ $deposit->gateway->name ?? '—' }}</div>
                        <div style="font-size:.73rem;color:var(--text-muted)">{{ $deposit->method_currency }}</div>
                    </td>
                    <td style="font-weight:700;color:var(--text-primary)">
                        {{ number_format($deposit->amount + $deposit->charge, 2) }} {{ $deposit->method_currency }}
                    </td>
                    <td style="color:var(--danger);font-size:.83rem">{{ number_format($deposit->charge, 2) }}</td>
                    <td style="font-weight:600;color:var(--success)">{{ number_format($deposit->amount, 2) }}</td>
                    <td style="font-size:.78rem;color:var(--text-muted)">
                        {{ $deposit->created_at->format('d M Y') }}<br>
                        <span style="font-size:.72rem">{{ $deposit->created_at->format('h:i A') }}</span>
                    </td>
                    <td>
                        @if($deposit->status == 2)
                            <span class="status-pill pill-pending"><i class="fas fa-clock"></i> Pending</span>
                        @elseif($deposit->status == 1)
                            <span class="status-pill pill-success"><i class="fas fa-check-circle"></i> Approved</span>
                        @elseif($deposit->status == 3)
                            <span class="status-pill pill-rejected"><i class="fas fa-times-circle"></i> Rejected</span>
                        @else
                            <span class="status-pill pill-initiate">Initiated</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.deposit.details', $deposit->id) }}"
                           class="btn btn-sm btn-primary" style="gap:4px">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align:center;padding:48px;color:var(--text-muted)">
                        <i class="fas fa-inbox" style="font-size:2.5rem;margin-bottom:12px;display:block;opacity:.3"></i>
                        No deposit records found for this filter.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($deposits->hasPages())
    <div class="pagination-wrapper">
        {{ $deposits->links() }}
    </div>
    @endif
</div>

@endsection
