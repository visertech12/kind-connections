@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">User Detail</div>
        <div class="page-header__subtitle">Viewing profile for {{ ($user->firstname ?? '') . ' ' . ($user->lastname ?? '') ?: ($user->username ?? 'Unknown') }}</div>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
</div>

<div style="display:grid;grid-template-columns:320px 1fr;gap:20px;align-items:start">

    <!-- Left: Profile Card -->
    <div>
        <!-- Profile Info -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-body" style="text-align:center;padding:32px 24px">
                <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--secondary));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.8rem;font-weight:700;margin:0 auto 16px">
                    {{ strtoupper(substr($user->firstname ?? $user->username ?? 'U', 0, 2)) }}
                </div>
                <div style="font-size:1.05rem;font-weight:700;margin-bottom:4px">
                    {{ ($user->firstname ?? '') . ' ' . ($user->lastname ?? '') ?: ($user->username ?? '—') }}
                </div>
                <div style="font-size:.82rem;color:var(--text-muted);margin-bottom:14px">{{ $user->email }}</div>

                <div style="display:flex;justify-content:center;gap:8px;flex-wrap:wrap;margin-bottom:16px">
                    @if($user->status)
                        <span class="badge badge-success"><i class="fas fa-circle" style="font-size:.5rem"></i> Active</span>
                    @else
                        <span class="badge badge-danger"><i class="fas fa-circle" style="font-size:.5rem"></i> Banned</span>
                    @endif
                    @if($user->ev)
                        <span class="badge badge-info"><i class="fas fa-envelope" style="font-size:.65rem"></i> Email Verified</span>
                    @endif
                    @if($user->kv == 1)
                        <span class="badge badge-success"><i class="fas fa-id-card" style="font-size:.65rem"></i> KYC Verified</span>
                    @elseif($user->kv == 2)
                        <span class="badge badge-warning"><i class="fas fa-clock" style="font-size:.65rem"></i> KYC Pending</span>
                    @endif
                </div>

                <div style="background:var(--content-bg);border-radius:var(--radius-md);padding:14px;margin-bottom:16px">
                    <div style="font-size:.75rem;color:var(--text-muted);margin-bottom:4px">Account Balance</div>
                    <div style="font-size:1.6rem;font-weight:800;color:var(--success)">${{ number_format($user->balance ?? 0, 2) }}</div>
                </div>

                <div style="font-size:.78rem;color:var(--text-muted)">
                    <i class="fas fa-calendar-alt" style="margin-right:5px"></i>
                    Joined {{ $user->created_at?->format('d M Y') }}
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title" style="font-size:.9rem"><i class="fas fa-chart-bar" style="color:var(--primary);margin-right:8px"></i>Quick Stats</div>
            </div>
            <div class="card-body" style="padding:16px">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                    <div style="text-align:center;padding:14px 10px;background:var(--primary-light);border-radius:var(--radius-md)">
                        <div style="font-size:1.2rem;font-weight:700;color:var(--primary)">{{ $user->deposits_success?->count() ?? 0 }}</div>
                        <div style="font-size:.72rem;color:var(--primary);margin-top:2px">Deposits</div>
                    </div>
                    <div style="text-align:center;padding:14px 10px;background:#dcfce7;border-radius:var(--radius-md)">
                        <div style="font-size:1.2rem;font-weight:700;color:var(--success)">{{ $user->withdrawals_success?->count() ?? 0 }}</div>
                        <div style="font-size:.72rem;color:var(--success);margin-top:2px">Withdrawals</div>
                    </div>
                    <div style="text-align:center;padding:14px 10px;background:#fef3c7;border-radius:var(--radius-md)">
                        <div style="font-size:1.2rem;font-weight:700;color:var(--warning)">{{ $user->referrals?->count() ?? 0 }}</div>
                        <div style="font-size:.72rem;color:var(--warning);margin-top:2px">Referrals</div>
                    </div>
                    <div style="text-align:center;padding:14px 10px;background:#cffafe;border-radius:var(--radius-md)">
                        <div style="font-size:1.2rem;font-weight:700;color:var(--info)">{{ $user->transactions?->count() ?? 0 }}</div>
                        <div style="font-size:.72rem;color:var(--info);margin-top:2px">Transactions</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Edit Form & Transactions -->
    <div>
        <!-- Edit Form -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-user-edit" style="color:var(--primary);margin-right:8px"></i>Edit User Details</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $user->firstname) }}" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $user->lastname) }}" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Status <span class="required">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Banned</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Verified</label>
                            <select name="ev" class="form-select">
                                <option value="1" {{ old('ev', $user->ev) == 1 ? 'selected' : '' }}>Verified</option>
                                <option value="0" {{ old('ev', $user->ev) == 0 ? 'selected' : '' }}>Unverified</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                        @if($user->status)
                            <a href="#" onclick="document.getElementById('banForm').submit()" class="btn btn-danger" style="margin-left:10px"><i class="fas fa-ban"></i> Ban User</a>
                        @else
                            <a href="#" onclick="document.getElementById('unbanForm').submit()" class="btn btn-success" style="margin-left:10px"><i class="fas fa-check"></i> Unban User</a>
                        @endif
                    </div>
                </form>

                <!-- Hidden ban/unban forms -->
                <form id="banForm" action="{{ route('admin.users.update', $user->id) }}" method="POST" style="display:none">
                    @csrf
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                </form>
                <form id="unbanForm" action="{{ route('admin.users.update', $user->id) }}" method="POST" style="display:none">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                </form>
            </div>
        </div>

        <!-- User Info -->
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-info-circle" style="color:var(--info);margin-right:8px"></i>User Information</div>
            </div>
            <div class="card-body" style="padding:0">
                @php
                $infos = [
                    ['label'=>'Username',        'value'=>$user->username ?? '—'],
                    ['label'=>'Country Code',     'value'=>$user->country_code ?? '—'],
                    ['label'=>'City',             'value'=>$user->city ?? '—'],
                    ['label'=>'State',            'value'=>$user->state ?? '—'],
                    ['label'=>'ZIP Code',         'value'=>$user->zip ?? '—'],
                    ['label'=>'2FA Enabled',      'value'=>($user->ts ? 'Yes' : 'No')],
                    ['label'=>'Referred By',      'value'=>($user->ref_by ? 'User #'.$user->ref_by : 'Direct')],
                    ['label'=>'Profile Complete', 'value'=>($user->profile_complete ? 'Yes' : 'No')],
                    ['label'=>'Last Login',       'value'=>optional($user->loginLogs?->first())->created_at?->format('d M Y H:i') ?? '—'],
                ];
                @endphp
                @foreach($infos as $i => $info)
                <div style="display:flex;justify-content:space-between;padding:12px 20px;{{ !$loop->last ? 'border-bottom:1px solid var(--border-color)' : '' }};font-size:.84rem">
                    <span style="color:var(--text-muted)">{{ $info['label'] }}</span>
                    <span style="font-weight:600">{{ $info['value'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-exchange-alt" style="color:var(--warning);margin-right:8px"></i>Recent Transactions</div>
            </div>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>TRX</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Post Balance</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->transactions?->take(10) ?? [] as $trx)
                        <tr>
                            <td style="font-family:monospace;font-size:.78rem;color:var(--text-muted)">{{ $trx->trx }}</td>
                            <td style="font-size:.82rem;max-width:180px">{{ $trx->details }}</td>
                            <td>
                                <span style="font-weight:700;color:{{ $trx->trx_type == '+' ? 'var(--success)' : 'var(--danger)' }}">
                                    {{ $trx->trx_type }}${{ number_format($trx->amount, 2) }}
                                </span>
                            </td>
                            <td><span class="badge {{ $trx->trx_type == '+' ? 'badge-success' : 'badge-danger' }}">{{ $trx->trx_type == '+' ? 'Credit' : 'Debit' }}</span></td>
                            <td style="font-size:.82rem">${{ number_format($trx->post_balance, 2) }}</td>
                            <td style="font-size:.75rem;color:var(--text-muted)">{{ $trx->created_at?->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:24px;color:var(--text-muted)">No transactions found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@push('styles')
<style>
@media(max-width:900px) {
    div[style*="grid-template-columns:320px 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endpush
@endsection
