@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">SEO Index Inspection Setup</div>
        <div class="page-header__subtitle">For product: {{ $product->name }}</div>
    </div>
    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Edit Product
    </a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header">
        <div class="card-title">
            <i class="fab fa-google" style="color:var(--primary);margin-right:8px"></i>Google Search Console API Configuration Required
        </div>
    </div>
    <div class="card-body" style="padding: 24px;">
        <p class="text-secondary mb-4">To inspect your product URLs dynamically via the Google Search Console Inspection API, you need to configure a Google Cloud Service Account credential key.</p>

        <div style="background: var(--content-bg); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 20px; margin-bottom: 24px;">
            <h5 style="margin-top:0; margin-bottom:12px; font-weight:600;"><i class="fas fa-list-ol" style="margin-right:8px; color:var(--primary)"></i>Setup Instructions:</h5>
            <ol style="margin: 0; padding-left: 20px; line-height: 1.6; font-size: 0.88rem;">
                <li class="mb-2">Go to the <a href="https://console.cloud.google.com/" target="_blank" style="color:var(--primary);text-decoration:underline;">Google Cloud Console</a> and create or select a project.</li>
                <li class="mb-2">Search the API library for **Google Search Console API** and enable it.</li>
                <li class="mb-2">Navigate to **APIs & Services > Credentials** and click **Create Credentials > Service Account**.</li>
                <li class="mb-2">Once created, click the Service Account mail, go to the **Keys** tab, click **Add Key > Create new key**, choose **JSON**, and download it.</li>
                <li class="mb-2">Rename this downloaded file to `google_auth_config.json`.</li>
                <li class="mb-2">Upload this file to your hosting directory at: <br><code style="background:var(--border-color); padding: 2px 6px; border-radius: 4px; display:inline-block; margin-top:4px;">{{ $authConfigPath }}</code></li>
                <li class="mb-2">Copy the Service Account's email address (e.g. `your-service-account@your-project.iam.gserviceaccount.com`).</li>
                <li>Go to your <a href="https://search.google.com/search-console" target="_blank" style="color:var(--primary);text-decoration:underline;">Google Search Console Dashboard</a>, select your site property, go to **Settings > Users and permissions**, click **Add User**, paste the email address, and select **Owner** or **Full** permission.</li>
            </ol>
        </div>

        <div style="display:flex; justify-content:space-between; align-items:center; background: rgba(var(--primary-rgb), 0.05); padding: 15px 20px; border-radius: var(--radius-md); border-left: 4px solid var(--primary);">
            <div style="font-size:0.87rem;">
                <strong>Ready?</strong> After uploading `google_auth_config.json` to the storage folder and granting permission in GSC, refresh this page.
            </div>
            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-redo"></i> Retry</a>
        </div>
    </div>
</div>
@endsection
