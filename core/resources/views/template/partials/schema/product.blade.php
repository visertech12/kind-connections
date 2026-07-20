@php
    $schemaCurrency = $schemaCurrency ?? 'USD';
    $schemaProvider = $schemaProvider ?? ($general->sitename ?? 'Unlock Themes');
@endphp
@if (!empty($schemaLowPrice))
    @push('extrameta')
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "Product",
          "name": {!! json_encode($schemaName, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
          "description": {!! json_encode($schemaDescription ?? '', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
          "brand": {
            "@@type": "Brand",
            "name": {!! json_encode($schemaProvider, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
          },
          "offers": {
            "@@type": "AggregateOffer",
            "priceCurrency": {!! json_encode($schemaCurrency) !!},
            "lowPrice": "{{ $schemaLowPrice }}",
            "offerCount": "{{ $schemaOfferCount ?? 1 }}",
            "availability": "https://schema.org/InStock",
            "url": {!! json_encode(url()->current(), JSON_UNESCAPED_SLASHES) !!}
          }
        }
        </script>
    @endpush
@endif
