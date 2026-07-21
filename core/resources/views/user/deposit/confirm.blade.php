@extends('user.layouts.app')
@section('panel')
<div class="table-card">
    <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
        <div class="table-card__heading">
            <h2 class="table-card__title"><span class="icon"><i class="fas fa-file-invoice-dollar"></i></span> Complete Your Deposit </h2>
        </div>
    </div>
    <div class="table-card__table">
        <table class="table table--responsive--xl mb-0">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Field">Gateway</td>
                    <td data-label="Details">{{ $gatewayCurrency->name }}</td>
                </tr>
                <tr>
                    <td data-label="Field">Amount</td>
                    <td data-label="Details">{{ showAmount($amount) }} {{ $gatewayCurrency->currency }}</td>
                </tr>
                <tr>
                    <td data-label="Field">Charge</td>
                    <td data-label="Details">{{ showAmount($charge) }} {{ $gatewayCurrency->currency }}</td>
                </tr>
                <tr>
                    <td data-label="Field">You Pay</td>
                    <td data-label="Details"><span class="text--danger fw-bold">{{ showAmount($amount) }} {{ $gatewayCurrency->currency }}</span></td>
                </tr>
                <tr>
                    <td data-label="Field">You Receive</td>
                    <td data-label="Details"><span class="text--success fw-bold">{{ showAmount($finalAmount) }} {{ $gatewayCurrency->currency }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="table-card mt-4">
    <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
        <div class="table-card__heading">
            <h2 class="table-card__title"><span class="icon"><i class="fas fa-info-circle"></i></span> Payment Instructions &amp; Proof </h2>
        </div>
    </div>
    <div class="table-card__table">
        <div class="p-4">
            <div class="mt-2 fs-14 mb-4">
                <div class="text--base d-block">{!! $gatewayCurrency->method->description ?? '<em>No instructions provided. Please contact support.</em>' !!}</div>
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
@endsection