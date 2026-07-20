@extends('user.layouts.app')
@section('panel')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="custom--card card h-auto">
            <div class="card-header">
                <h3 class="card-header__title">{{ __($pageTitle) }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.deposit.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="method_code" value="{{ $gatewayCurrency->method_code }}">
                    <input type="hidden" name="method_currency" value="{{ $gatewayCurrency->currency }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <input type="hidden" name="payload" value="{{ $payload }}">

                    <div class="alert alert-info" role="alert">
                        You have requested to pay <strong>{{ getAmount($amount) }} USD</strong> via <strong>{{ $gatewayCurrency->name }}</strong>.
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Amount
                                    <span class="fw-bold">{{ getAmount($amount) }} USD</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Charge
                                    <span class="fw-bold text-danger">+ {{ getAmount($charge) }} {{ $gatewayCurrency->currency }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Payable
                                    <span class="fw-bold">{{ getAmount($amount + $charge) }} {{ $gatewayCurrency->currency }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <h5>Payment Instructions</h5>
                            <p class="text-muted">
                                {!! nl2br(e($gatewayCurrency->method->description ?? 'No specific instructions provided.')) !!}
                            </p>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form--label">Transaction Note / Reference (Optional)</label>
                        <textarea name="note" class="form-control form--control" rows="2" placeholder="e.g., Bank transaction ID"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form--label">Payment Proof</label>
                        <input type="file" name="proof" class="form-control form--control" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted mt-1 d-block">Required. Allowed files: .jpg, .png, .pdf. Max size: 4MB.</small>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('user.invoice.list') }}" class="btn btn--secondary btn--md me-2">Cancel</a>
                        <button type="submit" class="btn btn--primary btn--md">Submit Payment Proof</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
