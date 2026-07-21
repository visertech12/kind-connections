@extends('user.layouts.app')
@section('panel')
<div class="row gy-4">
    <div class="col-12">
        <div class="custom--card card h-auto">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="card-header__left d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title"> <span class="icon"><i class="fas fa-file-invoice-dollar"></i></span> Complete Your Deposit </h2>
                </div>
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

                <div class="mt-2 text--danger fs-14 mb-4">
                    <strong><i class="fas fa-info-circle"></i> Payment Instructions:</strong>
                    <div class="text--base mt-2 d-block">{!! $gatewayCurrency->method->description ?? '<em>No instructions provided. Please contact support.</em>' !!}</div>
                </div>

                <form action="{{ route('user.deposit.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="gateway" value="{{ $gatewayCurrency->method_code }}">
                    <input type="hidden" name="method_currency" value="{{ $gatewayCurrency->currency }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">

                    <div class="row gy-3">
                        <div class="col-md-12 form-group">
                            <label class="form--label">Transaction Reference / Note</label>
                            <textarea name="note" class="form--control form-control" rows="2" placeholder="e.g. Bank transfer ref: TXN123456"></textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <label class="form--label">Payment Proof <span class="text--danger">*</span></label>
                            <input type="file" name="proof" class="form--control form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                            <div class="mt-2 text--danger fs-14">Upload screenshot or receipt (jpg, png, pdf; max 4MB).</div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn--primary btn--md w-100">Submit Deposit Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection