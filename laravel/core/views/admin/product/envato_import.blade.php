@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div>
        <div class="page-header__title">Import from Envato</div>
        <div class="page-header__subtitle">Fetch a product directly from the Envato Marketplace API</div>
    </div>
    <a href="{{ route('admin.product.index') }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Products
    </a>
</div>

<div class="row" style="max-width:860px">
    <div class="col-12">

        {{-- How it works card --}}
        <div class="card" style="margin-bottom:20px;border-left:4px solid var(--primary)">
            <div class="card-body" style="padding:18px 24px">
                <h6 style="margin:0 0 8px;color:var(--primary);font-weight:700"><i class="fas fa-info-circle me-2"></i>How it works</h6>
                <ol style="margin:0;padding-left:20px;font-size:.87rem;color:var(--text-muted);line-height:1.9">
                    <li>Generate a <strong>Personal Token</strong> at <a href="https://build.envato.com/my-apps/" target="_blank">build.envato.com/my-apps</a></li>
                    <li>Find the <strong>Item ID</strong> from the Envato product URL (e.g. <code>/item/name/<strong>12345678</strong></code>)</li>
                    <li>Choose the local category and click <strong>Import</strong></li>
                    <li>The product name, description, price, attributes &amp; thumbnail are imported automatically</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-cloud-download-alt me-2"></i>Envato Import Form</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.envato.import.store') }}" method="POST">
                    @csrf

                    {{-- Envato Personal Token --}}
                    <div class="form-group" style="margin-bottom:20px">
                        <label class="form-label" for="envato_token">
                            Envato Personal Token <span style="color:var(--danger)">*</span>
                        </label>
                        <div style="position:relative">
                            <input type="password" id="envato_token" name="envato_token"
                                class="form-control @error('envato_token') is-invalid @enderror"
                                value="{{ old('envato_token', $token) }}"
                                placeholder="Paste your Envato Personal Token here"
                                autocomplete="off">
                            <button type="button" onclick="toggleToken()" 
                                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text-muted);cursor:pointer;font-size:.85rem">
                                <i class="fas fa-eye" id="tokenEyeIcon"></i>
                            </button>
                        </div>
                        @error('envato_token')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small style="color:var(--text-muted)">Your token is used only for this request and is never stored.</small>
                    </div>

                    {{-- Item ID --}}
                    <div class="form-group" style="margin-bottom:20px">
                        <label class="form-label" for="item_id">
                            Envato Item ID <span style="color:var(--danger)">*</span>
                        </label>
                        <input type="number" id="item_id" name="item_id"
                            class="form-control @error('item_id') is-invalid @enderror"
                            value="{{ old('item_id') }}"
                            placeholder="e.g. 12345678">
                        @error('item_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small style="color:var(--text-muted)">Found in the product URL: themeforest.net/item/product-name/<strong>12345678</strong></small>
                    </div>

                    {{-- Category --}}
                    <div class="form-group" style="margin-bottom:20px">
                        <label class="form-label" for="category_id">
                            Local Category <span style="color:var(--danger)">*</span>
                        </label>
                        <select id="category_id" name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">— Select a category —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Version Code --}}
                    <div class="form-group" style="margin-bottom:20px">
                        <label class="form-label" for="version_code">
                            Version Code <span style="color:var(--text-muted);font-weight:400;font-size:.8rem">(optional &mdash; e.g. v1.0, 2.3.1)</span>
                        </label>
                        <input type="text" id="version_code" name="version_code"
                            class="form-control @error('version_code') is-invalid @enderror"
                            value="{{ old('version_code') }}"
                            placeholder="e.g. v1.0.0"
                            autocomplete="off">
                        @error('version_code')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small style="color:var(--text-muted)">The current version of this script/product.</small>
                    </div>

                    {{-- Free / Paid --}}
                    <div class="form-group" style="margin-bottom:24px">
                        <label class="form-label">Pricing Type <span style="color:var(--danger)">*</span></label>
                        <div style="display:flex;gap:20px;margin-top:6px">
                            <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:.9rem;padding:10px 18px;border:1px solid var(--border-color);border-radius:6px;transition:border-color .2s" id="label-paid">
                                <input type="radio" name="is_free" value="0" id="pricing-paid"
                                    {{ old('is_free', '0') == '0' ? 'checked' : '' }}
                                    onchange="updatePricingLabel()">
                                <span>&#128181; Paid</span>
                            </label>
                            <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:.9rem;padding:10px 18px;border:1px solid var(--border-color);border-radius:6px;transition:border-color .2s" id="label-free">
                                <input type="radio" name="is_free" value="1" id="pricing-free"
                                    {{ old('is_free') == '1' ? 'checked' : '' }}
                                    onchange="updatePricingLabel()">
                                <span>&#127381; Free</span>
                            </label>
                        </div>
                        <small style="color:var(--text-muted);margin-top:6px;display:block">Choosing <strong>Free</strong> will override the Envato price and set it to 0.</small>
                    </div>

                    {{-- Status + Featured --}}
                    <div style="display:flex;gap:30px;margin-bottom:24px;flex-wrap:wrap">
                        <div>
                            <label class="form-label">Status</label>
                            <div style="display:flex;gap:16px">
                                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;font-size:.9rem">
                                    <input type="radio" name="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}> Active
                                </label>
                                <label style="display:flex;align-items:center;gap:6px;cursor:pointer;font-size:.9rem">
                                    <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}> Inactive
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Featured</label>
                            <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:.9rem;margin-top:4px">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                Mark as Featured
                            </label>
                        </div>
                    </div>

                    <hr style="margin-bottom:20px">

                    <div style="display:flex;gap:12px">
                        <button type="submit" class="btn btn-primary" id="importBtn">
                            <i class="fas fa-cloud-download-alt me-2"></i> Import Product
                        </button>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-ghost">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@push('script')
<script>
function toggleToken() {
    const input = document.getElementById('envato_token');
    const icon  = document.getElementById('tokenEyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Show loading state on submit
document.querySelector('form').addEventListener('submit', function() {
    const btn = document.getElementById('importBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Importing...';
});

// Highlight active pricing type card
function updatePricingLabel() {
    const paid = document.getElementById('pricing-paid');
    const free = document.getElementById('pricing-free');
    const primary = getComputedStyle(document.documentElement).getPropertyValue('--primary').trim() || '#5a56e0';

    document.getElementById('label-paid').style.borderColor = paid.checked ? primary : '';
    document.getElementById('label-paid').style.background  = paid.checked ? primary + '18' : '';
    document.getElementById('label-free').style.borderColor = free.checked ? primary : '';
    document.getElementById('label-free').style.background  = free.checked ? primary + '18' : '';
}
// Run on page load to reflect old() state
document.addEventListener('DOMContentLoaded', updatePricingLabel);
</script>
@endpush

@endsection
