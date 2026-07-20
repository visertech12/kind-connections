@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">SEO Index Inspection Error</div>
        <div class="page-header__subtitle">For product: {{ $product->name }}</div>
    </div>
    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Edit Product
    </a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-header" style="background: rgba(var(--danger-rgb), 0.05); border-bottom: 1px solid var(--border-color);">
        <div class="card-title" style="color: var(--danger);">
            <i class="fas fa-exclamation-triangle" style="margin-right:8px"></i>Inspection Request Failed
        </div>
    </div>
    <div class="card-body" style="padding: 24px;">
        <div style="background: var(--content-bg); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 15px; margin-bottom: 20px; font-family: monospace; font-size: 0.88rem; color: var(--danger);">
            {{ $error }}
        </div>

        <h5 style="margin-top:0; font-weight:600; margin-bottom:10px;">Common Troubleshooting Steps:</h5>
        <ul style="padding-left: 20px; line-height: 1.6; font-size: 0.88rem; color: var(--text-secondary);">
            <li class="mb-2">
                <strong>Property Not Found error:</strong> Ensure your Google Search Console property matches exactly the URL you are checking. 
                Google expects the property siteUrl to be verified. Checked site URL: <code style="background:var(--border-color); padding: 2px 5px; border-radius:3px;">{{ $siteUrl }}</code>.
            </li>
            <li class="mb-2">
                <strong>Permissions error:</strong> Double-check that you added the Service Account's email as an <strong>Owner</strong> or <strong>Full</strong> permission user in the Search Console dashboard of this property.
            </li>
            <li>
                <strong>Crawl target:</strong> Live inspection requests are only allowed for pages publicly visible to Google. Checked page link: <a href="{{ $url }}" target="_blank" style="color:var(--primary);text-decoration:underline;">{{ $url }}</a>.
            </li>
        </ul>

        @if(isset($debugInfo))
        <div style="margin-top: 20px; background: var(--content-bg); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 15px;">
            <h6 style="margin-top:0; font-weight:600; margin-bottom:10px; font-size:0.85rem;">🔍 Debug Information (sent to Google API):</h6>
            <table style="width:100%; font-size:0.82rem; border-collapse:collapse;">
                @foreach($debugInfo as $key => $val)
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding:7px 10px; font-weight:600; color:var(--text-muted); width:200px;">{{ $key }}</td>
                    <td style="padding:7px 10px; font-family:monospace;">{{ $val }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif

        <div style="margin-top: 24px; text-align: center;">
            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary"><i class="fas fa-reply"></i> Return to Product Edit</a>
        </div>
    </div>
</div>
@endsection
