@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle }}</div>
        <div class="page-header__subtitle">Manage manual deposit methods</div>
    </div>
    <a href="{{ route('admin.gateway.manual.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Gateway
    </a>
</div>

<div class="card">
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Gateway</th>
                    <th>Status</th>
                    <th style="text-align:right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gateways as $gateway)
                <tr>
                    <td>
                        <div class="product-info-cell">
                            @if($gateway->image)
                            <img src="{{ asset('assets/images/gateway/'.$gateway->image) }}" class="product-thumb" alt="">
                            @else
                            <div style="width:44px;height:44px;border-radius:var(--radius-sm);background:var(--primary-light);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            @endif
                            <div>
                                <div class="product-info-cell__name">{{ $gateway->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($gateway->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Disabled</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px">
                            <a href="{{ route('admin.gateway.manual.edit', $gateway->alias) }}" class="btn btn-icon" style="background:var(--primary-light);color:var(--primary)" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">
                        <div style="text-align:center;padding:40px 0">
                            <div style="font-size:2.5rem;margin-bottom:12px;opacity:.3"><i class="fas fa-credit-card"></i></div>
                            <div style="color:var(--text-muted);font-size:.9rem">No manual gateways found</div>
                            <a href="{{ route('admin.gateway.manual.create') }}" class="btn btn-primary btn-sm" style="margin-top:12px">Add First Gateway</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
