@extends('user.layouts.app')
@section('panel')
<div class="row gy-4 justify-content-center">
    <div class="col-lg-8">
        <div class="custom--card card">
            <div class="card-header">
                <h4 class="card-header__title"><i class="fas fa-file-invoice-dollar"></i> Complete Your Deposit</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table class="table table--bordered">
                        <tbody>
                            <tr><th>Gateway</th><td>{{ $gatewayCurrency->name }}</td></tr>
                            <tr><th>Amount</th><td>{{ showAmount($amount) }} {{ $gatewayCurrency->currency }}</td></tr>
                            <tr><th>Charge</th><td>{{ showAmount($charge) }} {{ $gatewayCurrency->currency }}</td></tr>
                            <tr><th>You Pay</th><td><strong>{{ showAmount($amount) }} {{ $gatewayCurrency->currency }}</strong></td></tr>
                            <tr><th>You Receive</th><td>{{ showAmount($finalAmount) }} {{ $gatewayCurrency->currency }}</td></tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info">
                    <h5 class="mb-2"><i class="fas fa-info-circle"></i> Payment Instructions</h5>
                    <div>{!! $gatewayCurrency->method->description ?? '<em>No instructions provided. Please contact support.</em>' !!}</div>
                </div>

                <form action="{{ route('user.deposit.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="gateway" value="{{ $gatewayCurrency->method_code }}">
                    <input type="hidden" name="method_currency" value="{{ $gatewayCurrency->currency }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">

                    <div class="form-group mb-3">
                        <label class="form--label">Transaction Reference / Note</label>
                        <textarea name="note" class="form--control form-control" rows="2" placeholder="e.g. Bank transfer ref: TXN123456"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form--label">Payment Proof <span class="text--danger">*</span></label>
                        <input type="file" name="proof" class="form--control form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Upload screenshot or receipt (jpg, png, pdf; max 4MB).</small>
                    </div>

                    <button type="submit" class="btn btn--primary w-100">Submit Deposit Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection