@extends('admin.layouts.master')

@section('content')

@push('styles')
<style>
.detail-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 16px;
}
.detail-header__left {}
.detail-header__title { font-size: 1.3rem; font-weight: 800; color: var(--text-primary); margin: 0 0 4px; }
.detail-header__sub { font-size: .83rem; color: var(--text-muted); }
.detail-header__actions { display: flex; gap: 10px; flex-wrap: wrap; }

.detail-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.info-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,.06);
    border: 1px solid #e2e8f0;
    overflow: hidden;
}
.info-card-header {
    padding: 16px 22px;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 700;
    font-size: .95rem;
}
.info-card-header i { color: #6366f1; }
.info-card-body { padding: 22px; }

.detail-row {
    display: flex;
    align-items: flex-start;
    padding: 10px 0;
    border-bottom: 1px solid #f8fafc;
}
.detail-row:last-child { border-bottom: none; }
.detail-label {
    width: 140px;
    flex-shrink: 0;
    font-size: .78rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: .4px;
    padding-top: 2px;
}
.detail-value {
    flex: 1;
    font-size: .9rem;
    color: #1e293b;
    font-weight: 500;
}

.status-badge-lg {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    border-radius: 30px;
    font-size: .88rem;
    font-weight: 700;
}
.sb-pending  { background: #fef3c7; color: #d97706; }
.sb-success  { background: #dcfce7; color: #16a34a; }
.sb-rejected { background: #fee2e2; color: #dc2626; }
.sb-initiate { background: #f1f5f9; color: #64748b; }

.amount-display {
    font-size: 2rem;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
}
.amount-currency { font-size: .9rem; color: #94a3b8; font-weight: 500; margin-left: 4px; }

.proof-preview {
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    margin-top: 10px;
}
.proof-preview img {
    width: 100%;
    max-height: 280px;
    object-fit: contain;
    background: #f8fafc;
    display: block;
}
.proof-download {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 16px;
    background: #f8fafc;
    font-size: .83rem;
    color: #6366f1;
    font-weight: 600;
    text-decoration: none;
    border-top: 1px solid #e2e8f0;
    transition: all .2s;
}
.proof-download:hover { background: #eef2ff; }

.action-btns { display: flex; flex-direction: column; gap: 10px; }
.btn-approve {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff; border: none;
    border-radius: 10px;
    padding: 14px 20px;
    font-size: .9rem;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    transition: all .2s;
}
.btn-approve:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(34,197,94,.35); }
.btn-reject {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff; border: none;
    border-radius: 10px;
    padding: 14px 20px;
    font-size: .9rem;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    transition: all .2s;
}
.btn-reject:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(239,68,68,.35); }

.user-profile-card {
    text-align: center;
    padding: 28px 22px;
}
.upc-avatar {
    width: 70px; height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    margin: 0 auto 14px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 1.4rem; font-weight: 800;
}
.upc-name { font-size: 1rem; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
.upc-email { font-size: .8rem; color: #94a3b8; margin-bottom: 16px; }
.upc-balance {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 12px;
}
.upc-balance-label { font-size: .73rem; color: #94a3b8; font-weight: 600; text-transform: uppercase; margin-bottom: 4px; }
.upc-balance-value { font-size: 1.3rem; font-weight: 800; color: #6366f1; }

.timeline { position: relative; padding-left: 22px; }
.timeline::before {
    content: '';
    position: absolute;
    left: 7px; top: 8px; bottom: 8px;
    width: 2px; background: #e2e8f0;
}
.timeline-item { position: relative; margin-bottom: 16px; }
.timeline-dot {
    position: absolute;
    left: -22px; top: 4px;
    width: 14px; height: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #e2e8f0;
}
.timeline-dot.done { background: #22c55e; box-shadow: 0 0 0 2px #bbf7d0; }
.timeline-dot.pending { background: #f59e0b; box-shadow: 0 0 0 2px #fde68a; }
.timeline-dot.rejected { background: #ef4444; box-shadow: 0 0 0 2px #fecaca; }
.timeline-dot.grey { background: #e2e8f0; }
.timeline-label { font-size: .83rem; font-weight: 600; color: #1e293b; }
.timeline-sub { font-size: .75rem; color: #94a3b8; margin-top: 2px; }

/* Modal */
.modal-overlay {
    display: none;
    position: fixed; inset: 0;
    background: rgba(0,0,0,.5);
    backdrop-filter: blur(3px);
    z-index: 9999;
    align-items: center; justify-content: center;
}
.modal-overlay.open { display: flex; }
.modal-box {
    background: #fff;
    border-radius: 16px;
    padding: 32px;
    max-width: 420px;
    width: 90%;
    box-shadow: 0 20px 60px rgba(0,0,0,.2);
    text-align: center;
}
.modal-icon {
    width: 64px; height: 64px;
    border-radius: 50%;
    margin: 0 auto 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem;
}
.modal-icon.approve-icon { background: #dcfce7; color: #16a34a; }
.modal-icon.reject-icon  { background: #fee2e2; color: #dc2626; }
.modal-title { font-size: 1.1rem; font-weight: 800; margin: 0 0 8px; }
.modal-message { font-size: .87rem; color: #64748b; margin: 0 0 24px; line-height: 1.6; }
.modal-actions { display: flex; gap: 10px; }
.modal-actions .btn { flex: 1; padding: 12px; border-radius: 10px; font-size: .88rem; font-weight: 700; border: none; cursor: pointer; transition: all .2s; }
.modal-cancel { background: #f1f5f9; color: #475569; }
.modal-cancel:hover { background: #e2e8f0; }
.modal-confirm-approve { background: linear-gradient(135deg,#22c55e,#16a34a); color: #fff; }
.modal-confirm-approve:hover { opacity:.9; }
.modal-confirm-reject  { background: linear-gradient(135deg,#ef4444,#dc2626); color: #fff; }
.modal-confirm-reject:hover { opacity:.9; }

@media (max-width:768px) {
    .detail-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@php
$user = $deposit->user;
$gateway = $deposit->gateway;
$isPending = $deposit->status == 2;
@endphp

{{-- Page Header --}}
<div class="detail-header">
    <div class="detail-header__left">
        <div class="detail-header__title">
            <i class="fas fa-money-bill-wave" style="color:#6366f1;margin-right:8px"></i>
            Deposit Details
        </div>
        <div class="detail-header__sub">
            Transaction: <strong style="color:#6366f1;font-family:monospace">{{ $deposit->trx }}</strong>
            &nbsp;·&nbsp; Submitted {{ $deposit->created_at->diffForHumans() }}
        </div>
    </div>
    <div class="detail-header__actions">
        <a href="{{ route('admin.deposit.index') }}" class="btn btn-ghost btn-sm">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
        @if($isPending)
        <button class="btn btn-success btn-sm" onclick="openApproveModal()">
            <i class="fas fa-check"></i> Approve
        </button>
        <button class="btn btn-danger btn-sm" onclick="openRejectModal()">
            <i class="fas fa-times"></i> Reject
        </button>
        @endif
    </div>
</div>

<div class="detail-grid">
    {{-- LEFT COLUMN --}}
    <div style="display:flex;flex-direction:column;gap:20px">

        {{-- Deposit Summary --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-receipt"></i> Deposit Summary
            </div>
            <div class="info-card-body">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;flex-wrap:wrap;gap:12px">
                    <div>
                        <div style="font-size:.75rem;color:#94a3b8;font-weight:700;text-transform:uppercase;margin-bottom:4px">Total Submitted</div>
                        <div class="amount-display">
                            {{ number_format($deposit->amount + $deposit->charge, 2) }}
                            <span class="amount-currency">{{ $deposit->method_currency }}</span>
                        </div>
                    </div>
                    @if($deposit->status == 2)
                        <span class="status-badge-lg sb-pending"><i class="fas fa-clock"></i> Pending Review</span>
                    @elseif($deposit->status == 1)
                        <span class="status-badge-lg sb-success"><i class="fas fa-check-circle"></i> Approved</span>
                    @elseif($deposit->status == 3)
                        <span class="status-badge-lg sb-rejected"><i class="fas fa-times-circle"></i> Rejected</span>
                    @else
                        <span class="status-badge-lg sb-initiate">Initiated</span>
                    @endif
                </div>

                <div class="detail-row">
                    <div class="detail-label">Gateway</div>
                    <div class="detail-value">{{ $gateway->name ?? '—' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Currency</div>
                    <div class="detail-value">{{ $deposit->method_currency }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Amount</div>
                    <div class="detail-value" style="font-weight:700">{{ number_format($deposit->amount + $deposit->charge, 2) }} {{ $deposit->method_currency }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Charge</div>
                    <div class="detail-value" style="color:var(--danger);font-weight:600">− {{ number_format($deposit->charge, 2) }} {{ $deposit->method_currency }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Will Credit</div>
                    <div class="detail-value" style="color:var(--success);font-weight:700;font-size:1.05rem">{{ number_format($deposit->amount, 2) }} {{ $deposit->method_currency }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Rate</div>
                    <div class="detail-value">1 USD = {{ $deposit->rate }} {{ $deposit->method_currency }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Submitted At</div>
                    <div class="detail-value">{{ $deposit->created_at->format('d M Y, h:i A') }}</div>
                </div>
                @if($deposit->updated_at != $deposit->created_at)
                <div class="detail-row">
                    <div class="detail-label">Updated At</div>
                    <div class="detail-value">{{ $deposit->updated_at->format('d M Y, h:i A') }}</div>
                </div>
                @endif
            </div>
        </div>

        {{-- User Note --}}
        @if(!empty($deposit->detail?->note))
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-sticky-note"></i> User Note / Reference
            </div>
            <div class="info-card-body">
                <p style="font-size:.88rem;color:#475569;margin:0;line-height:1.7;white-space:pre-wrap">{{ $deposit->detail->note }}</p>
            </div>
        </div>
        @endif

        {{-- Payment Proof --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-image"></i> Payment Proof
            </div>
            <div class="info-card-body">
                @if(!empty($deposit->detail?->proof))
                    @php
                        $proofFile = $deposit->detail->proof;
                        $ext = strtolower(pathinfo($proofFile, PATHINFO_EXTENSION));
                        $proofUrl = asset('assets/deposit_proofs/' . $proofFile);
                    @endphp
                    @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                    <div class="proof-preview">
                        <img src="{{ $proofUrl }}" alt="Payment Proof" onclick="window.open(this.src,'_blank')">
                        <a href="{{ $proofUrl }}" target="_blank" class="proof-download">
                            <i class="fas fa-external-link-alt"></i> View Full Size / Download
                        </a>
                    </div>
                    @else
                    <a href="{{ $proofUrl }}" target="_blank" class="proof-download" style="border-radius:10px;border:1px solid #e2e8f0">
                        <i class="fas fa-file-pdf" style="color:#ef4444"></i> {{ $proofFile }} — Click to Download
                    </a>
                    @endif
                @else
                    <div style="text-align:center;padding:28px;color:#94a3b8">
                        <i class="fas fa-image" style="font-size:2rem;margin-bottom:10px;display:block;opacity:.3"></i>
                        <p style="font-size:.83rem;margin:0">No proof uploaded by user</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Gateway Instructions --}}
        @if(!empty($gateway?->description))
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-info-circle"></i> Gateway Instructions
            </div>
            <div class="info-card-body">
                <p style="font-size:.87rem;color:#475569;margin:0;line-height:1.7;white-space:pre-wrap">{{ $gateway->description }}</p>
            </div>
        </div>
        @endif
    </div>

    {{-- RIGHT COLUMN --}}
    <div style="display:flex;flex-direction:column;gap:20px">

        {{-- User Card --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-user"></i> User Details
            </div>
            <div class="user-profile-card">
                <div class="upc-avatar">
                    {{ strtoupper(substr($user->name ?? $user->username ?? 'U', 0, 2)) }}
                </div>
                <div class="upc-name">{{ $user->name ?? $user->username ?? '—' }}</div>
                <div class="upc-email">{{ $user->email }}</div>
                <div class="upc-balance">
                    <div class="upc-balance-label">Current Balance</div>
                    <div class="upc-balance-value">${{ number_format($user->balance ?? 0, 2) }}</div>
                </div>
                @if($deposit->status == 1)
                <div class="upc-balance" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0);border-color:#bbf7d0">
                    <div class="upc-balance-label" style="color:#16a34a">Balance After Deposit</div>
                    <div class="upc-balance-value" style="color:#16a34a">${{ number_format(($user->balance ?? 0), 2) }}</div>
                </div>
                @endif
                <a href="{{ route('admin.users.detail', $user->id) }}" class="btn btn-ghost btn-sm" style="width:100%;justify-content:center;margin-top:6px">
                    <i class="fas fa-external-link-alt"></i> View Full Profile
                </a>
            </div>
        </div>

        {{-- Action Buttons --}}
        @if($isPending)
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-cog"></i> Actions
            </div>
            <div class="info-card-body">
                <div class="action-btns">
                    <button class="btn-approve" onclick="openApproveModal()">
                        <i class="fas fa-check-circle"></i>
                        Approve Deposit (+{{ number_format($deposit->amount, 2) }} USD)
                    </button>
                    <button class="btn-reject" onclick="openRejectModal()">
                        <i class="fas fa-times-circle"></i>
                        Reject Deposit
                    </button>
                </div>
                <p style="font-size:.75rem;color:#94a3b8;text-align:center;margin:14px 0 0">
                    <i class="fas fa-exclamation-triangle" style="color:#f59e0b"></i>
                    This action cannot be undone. Review proof before proceeding.
                </p>
            </div>
        </div>
        @endif

        {{-- Timeline --}}
        <div class="info-card">
            <div class="info-card-header">
                <i class="fas fa-history"></i> Timeline
            </div>
            <div class="info-card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot done"></div>
                        <div class="timeline-label">Deposit Submitted</div>
                        <div class="timeline-sub">{{ $deposit->created_at->format('d M Y, h:i A') }}</div>
                    </div>
                    @if($deposit->status == 2)
                    <div class="timeline-item">
                        <div class="timeline-dot pending"></div>
                        <div class="timeline-label">Pending Admin Review</div>
                        <div class="timeline-sub">Waiting for approval</div>
                    </div>
                    @elseif($deposit->status == 1)
                    <div class="timeline-item">
                        <div class="timeline-dot done"></div>
                        <div class="timeline-label">✓ Approved</div>
                        <div class="timeline-sub">{{ $deposit->updated_at->format('d M Y, h:i A') }}</div>
                    </div>
                    @elseif($deposit->status == 3)
                    <div class="timeline-item">
                        <div class="timeline-dot rejected"></div>
                        <div class="timeline-label">✗ Rejected</div>
                        <div class="timeline-sub">{{ $deposit->updated_at->format('d M Y, h:i A') }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── APPROVE MODAL ── --}}
<div class="modal-overlay" id="approveModal">
    <div class="modal-box">
        <div class="modal-icon approve-icon"><i class="fas fa-check-circle"></i></div>
        <div class="modal-title">Approve this Deposit?</div>
        <div class="modal-message">
            You are about to approve a deposit of
            <strong>${{ number_format($deposit->amount, 2) }}</strong>
            for <strong>{{ $user->name ?? $user->username }}</strong>.<br><br>
            Their account balance will be credited immediately.
        </div>
        <div class="modal-actions">
            <button class="btn modal-cancel" onclick="closeApproveModal()">Cancel</button>
            <form action="{{ route('admin.deposit.approve', $deposit->id) }}" method="POST" style="flex:1">
                @csrf
                <button type="submit" class="btn modal-confirm-approve" style="width:100%">
                    <i class="fas fa-check"></i> Confirm Approve
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ── REJECT MODAL ── --}}
<div class="modal-overlay" id="rejectModal">
    <div class="modal-box">
        <div class="modal-icon reject-icon"><i class="fas fa-times-circle"></i></div>
        <div class="modal-title">Reject this Deposit?</div>
        <div class="modal-message">
            You are about to <strong>reject</strong> the deposit request
            of <strong>${{ number_format($deposit->amount + $deposit->charge, 2) }}</strong>
            from <strong>{{ $user->name ?? $user->username }}</strong>.<br><br>
            No balance will be credited. The user will need to resubmit.
        </div>
        <div class="modal-actions">
            <button class="btn modal-cancel" onclick="closeRejectModal()">Cancel</button>
            <form action="{{ route('admin.deposit.reject', $deposit->id) }}" method="POST" style="flex:1">
                @csrf
                <button type="submit" class="btn modal-confirm-reject" style="width:100%">
                    <i class="fas fa-times"></i> Confirm Reject
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openApproveModal()  { document.getElementById('approveModal').classList.add('open'); }
function closeApproveModal() { document.getElementById('approveModal').classList.remove('open'); }
function openRejectModal()   { document.getElementById('rejectModal').classList.add('open'); }
function closeRejectModal()  { document.getElementById('rejectModal').classList.remove('open'); }

// Close on overlay click
['approveModal','rejectModal'].forEach(id => {
    document.getElementById(id).addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('open');
    });
});
</script>
@endpush

@endsection
