@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle }}</div>
        <div class="page-header__subtitle">Manage global website settings including logo, name, and timezone.</div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-cogs" style="color:var(--primary);margin-right:8px"></i> General Configurations</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Site Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="site_name" value="{{ gs('site_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Timezone <span class="required">*</span></label>
                                <select class="form-select" name="timezone" required>
                                    @foreach($timezones as $timezone)
                                        <option value="{{ $timezone }}" @if($timezone == $currentTimezone) selected @endif>{{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Site Logo (Recommended Size: 250x60)</label>
                                <div style="padding:16px;background:var(--bg-color);border-radius:var(--radius-md);border:1px dashed var(--border-color);text-align:center;margin-bottom:12px">
                                    <img src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="Site Logo" style="max-width:200px;max-height:80px">
                                </div>
                                <input type="file" class="form-control" name="logo" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Site Favicon (Recommended Size: 64x64)</label>
                                <div style="padding:16px;background:var(--bg-color);border-radius:var(--radius-md);border:1px dashed var(--border-color);text-align:center;margin-bottom:12px">
                                    <img src="{{ getImage('assets/images/logoIcon/favicon.png') }}" alt="Site Favicon" style="max-width:64px;max-height:64px">
                                </div>
                                <input type="file" class="form-control" name="favicon" accept=".png, .jpg, .jpeg, .ico, .webp">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:12px">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Envato API Integration --}}
<div class="row" style="margin-top:24px">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-plug" style="color:var(--primary);margin-right:8px"></i> API Integrations
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.update') }}" method="POST">
                    @csrf

                    {{-- Hidden fields to carry over required fields --}}
                    <input type="hidden" name="site_name" value="{{ gs('site_name') }}">
                    <input type="hidden" name="timezone" value="{{ config('app.timezone') }}">

                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-label" for="envato_token">
                                    <i class="fab fa-envato" style="color:#82b541;margin-right:6px"></i>
                                    Envato Personal Token
                                </label>
                                <div style="position:relative">
                                    <input type="password"
                                        id="envato_token"
                                        name="envato_token"
                                        class="form-control"
                                        value="{{ gs('envato_token') }}"
                                        placeholder="Paste your Envato Personal Token here"
                                        autocomplete="off">
                                    <button type="button" onclick="toggleEnvatoToken()"
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text-muted);cursor:pointer;font-size:.85rem">
                                        <i class="fas fa-eye" id="envatoEyeIcon"></i>
                                    </button>
                                </div>
                                <small style="color:var(--text-muted)">
                                    Used for importing products from Envato. Generate your token at
                                    <a href="https://build.envato.com/my-apps/" target="_blank">build.envato.com/my-apps</a>.
                                    Leave blank to keep the existing token.
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <div style="padding:16px;background:var(--bg-color);border-radius:var(--radius-md);border:1px dashed var(--border-color);font-size:.83rem;color:var(--text-muted);line-height:1.7">
                                <strong style="color:var(--text-color)">Required Permissions:</strong><br>
                                ✅ View and search Envato sites<br>
                                ✅ View your Envato Market profile<br>
                                ✅ Download your purchased items
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="google_client_id">
                                    <i class="fab fa-google" style="color:#db4437;margin-right:6px"></i>
                                    Google Client ID
                                </label>
                                <input type="text"
                                    id="google_client_id"
                                    name="google_client_id"
                                    class="form-control"
                                    value="{{ gs('google_client_id') }}"
                                    placeholder="Google Client ID">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="google_client_secret">
                                    <i class="fab fa-google" style="color:#db4437;margin-right:6px"></i>
                                    Google Client Secret
                                </label>
                                <input type="password"
                                    id="google_client_secret"
                                    name="google_client_secret"
                                    class="form-control"
                                    value="{{ gs('google_client_secret') }}"
                                    placeholder="Google Client Secret">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-link" style="color:var(--text-muted);margin-right:6px"></i>
                                    Google Authorized Redirect URI (Callback URL)
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ route('user.social.login.callback', 'google') }}" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="navigator.clipboard.writeText('{{ route('user.social.login.callback', 'google') }}'); alert('Copied to clipboard!')">Copy</button>
                                </div>
                                <small class="text-muted">Copy and paste this URL into your Google Cloud Console OAuth 2.0 settings.</small>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save API Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
function toggleEnvatoToken() {
    const input = document.getElementById('envato_token');
    const icon  = document.getElementById('envatoEyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
@endpush

@endsection
