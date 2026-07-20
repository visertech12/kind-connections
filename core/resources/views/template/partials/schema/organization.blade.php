@php
    $orgName = $orgName ?? ($general->sitename ?? 'Unlock Themes');
    $orgLegalName = $orgLegalName ?? 'Unlock Themes LLC';
    $orgDescription = $orgDescription ?? '';
@endphp
@push('extrameta')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": {!! json_encode($orgName, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
      "legalName": {!! json_encode($orgLegalName, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
      "url": {!! json_encode(url('/'), JSON_UNESCAPED_SLASHES) !!},
      "logo": {!! json_encode(asset('assets/images/logoIcon/logo.png'), JSON_UNESCAPED_SLASHES) !!},
      "description": {!! json_encode($orgDescription, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    }
    </script>
@endpush
