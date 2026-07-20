@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle }}</div>
        <div class="page-header__subtitle">Edit {{ $method->name }} manual deposit method</div>
    </div>
    <a href="{{ route('admin.gateway.manual.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gateway.manual.update', $method->code) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row" style="margin-bottom: 20px;">
                <div>
                    <label class="form-label">Gateway Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $method->name }}" required>
                </div>
                <div>
                    <label class="form-label">Currency <span class="required">*</span></label>
                    <input type="text" class="form-control" name="currency" value="{{ @$method->singleCurrency->currency }}" required>
                </div>
            </div>

            <div class="form-row-3" style="margin-bottom: 20px;">
                <div>
                    <label class="form-label">Rate (1 USD = ?) <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="rate" value="{{ @$method->singleCurrency->rate }}" required>
                </div>
                <div>
                    <label class="form-label">Minimum Limit <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="min_limit" value="{{ @$method->singleCurrency->min_amount }}" required>
                </div>
                <div>
                    <label class="form-label">Maximum Limit <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="max_limit" value="{{ @$method->singleCurrency->max_amount }}" required>
                </div>
            </div>

            <div class="form-row-3" style="margin-bottom: 20px;">
                <div>
                    <label class="form-label">Fixed Charge <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="fixed_charge" value="{{ @$method->singleCurrency->fixed_charge }}" required>
                </div>
                <div>
                    <label class="form-label">Percent Charge (%) <span class="required">*</span></label>
                    <input type="number" step="any" class="form-control" name="percent_charge" value="{{ @$method->singleCurrency->percent_charge }}" required>
                </div>
                <div>
                    <label class="form-label">Gateway Image</label>
                    <input type="file" class="form-control" name="image" accept=".jpg,.jpeg,.png">
                    <div class="form-hint">Leave blank if you don't want to change the image.</div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Deposit Instructions <span class="required">*</span></label>
                <textarea class="form-control" name="instruction" required>{{ $method->description }}</textarea>
                <div class="form-hint">Tell users how they should send the money to you (e.g. Bank details, Wallet address).</div>
            </div>

            <div class="card border mb-4">
                <div class="card-header bg--primary d-flex justify-content-between" style="background: var(--primary); padding: 12px 16px;">
                    <h5 style="color: #fff; margin:0; font-size: 1rem;">@lang('User Data')</h5>
                    <button type="button" class="btn btn-sm btn-ghost form-generate-btn" style="color:#fff; border-color: rgba(255,255,255,0.5);">
                        <i class="fas fa-plus"></i> @lang('Add New')
                    </button>
                </div>
                <div class="card-body">
                    <x-generated-form :form="$form" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Gateway</button>
        </form>
    </div>
</div>
@endsection
