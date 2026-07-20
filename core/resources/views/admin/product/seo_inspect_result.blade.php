@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">SEO Index Inspection Details</div>
        <div class="page-header__subtitle">For product: {{ $product->name }}</div>
    </div>
    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Edit Product
    </a>
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 20px; max-width: 900px; margin: 0 auto;">
    
    <!-- Status Overview Card -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <i class="fab fa-google" style="color:var(--primary);margin-right:8px"></i>Live Google Index Status
            </div>
        </div>
        <div class="card-body" style="padding: 24px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
                @php
                    $coverageState = $indexStatusResult->getCoverageState() ?? '';
                    $isIndexed = str_contains(strtolower($coverageState), 'indexed') || str_contains(strtolower($indexStatusResult->getVerdict() ?? ''), 'pass');
                @endphp
                <div style="font-size: 2.5rem; color: {{ $isIndexed ? 'var(--success)' : 'var(--warning)' }}">
                    <i class="fas {{ $isIndexed ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
                </div>
                <div>
                    <h3 style="margin:0; font-size: 1.25rem; font-weight: 700;">
                        {{ $isIndexed ? 'URL is on Google' : 'URL is not on Google' }}
                    </h3>
                    <div style="font-size: 0.88rem; color: var(--text-secondary); margin-top: 4px;">
                        Verdict: <strong style="color: {{ $isIndexed ? 'var(--success)' : 'var(--warning)' }}">{{ $indexStatusResult->getVerdict() }}</strong>
                    </div>
                </div>
            </div>

            <table class="table" style="width: 100%; border-collapse: collapse; font-size: 0.88rem;">
                <tbody>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted); width: 220px;">Inspect Target URL</td>
                        <td style="padding: 12px 8px;"><a href="{{ $url }}" target="_blank" style="color: var(--primary); text-decoration: underline;">{{ $url }}</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Indexing State</td>
                        <td style="padding: 12px 8px;"><strong>{{ $coverageState ?: 'Unknown' }}</strong></td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Robots.txt Blocked?</td>
                        <td style="padding: 12px 8px;">
                            <span class="badge {{ $indexStatusResult->getRobotsTxtState() == 'ALLOWED' ? 'bg-success' : 'bg-danger' }}">
                                {{ $indexStatusResult->getRobotsTxtState() ?? 'UNKNOWN' }}
                            </span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Indexing Allowed? (noindex)</td>
                        <td style="padding: 12px 8px;">
                            <span class="badge {{ $indexStatusResult->getIndexingState() == 'INDEXING_ALLOWED' ? 'bg-success' : 'bg-danger' }}">
                                {{ str_replace('_', ' ', $indexStatusResult->getIndexingState() ?? 'UNKNOWN') }}
                            </span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Page Fetch Status</td>
                        <td style="padding: 12px 8px;">
                            <span class="badge {{ $indexStatusResult->getPageFetchState() == 'SUCCESSFUL' ? 'bg-success' : 'bg-warning' }}">
                                {{ str_replace('_', ' ', $indexStatusResult->getPageFetchState() ?? 'UNKNOWN') }}
                            </span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Last Crawl Time</td>
                        <td style="padding: 12px 8px;">
                            {{ $indexStatusResult->getLastCrawlTime() ? date('d M Y, h:i A', strtotime($indexStatusResult->getLastCrawlTime())) : 'Never' }}
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Crawl Agent User-Agent</td>
                        <td style="padding: 12px 8px;">{{ str_replace('_', ' ', $indexStatusResult->getCrawledAs() ?? 'None') }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">User-Declared Canonical</td>
                        <td style="padding: 12px 8px; font-style: italic;">{{ $indexStatusResult->getUserCanonical() ?: 'None' }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 8px; font-weight: 600; color: var(--text-muted);">Google-Selected Canonical</td>
                        <td style="padding: 12px 8px; font-style: italic;">{{ $indexStatusResult->getGoogleCanonical() ?: 'None' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
