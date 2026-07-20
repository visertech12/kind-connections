@php
    $ctaTitle = $ctaTitle ?? 'Need a custom configuration?';
    $ctaDesc = $ctaDesc ?? 'Tell us your exact CPU, RAM, and storage requirements. Our team will tailor a plan built just for you.';
    $ctaBtnText = $ctaBtnText ?? 'Contact us';
    $ctaBtnLink = $ctaBtnLink ?? route('contact');
@endphp

<div class="custom-cta">
    <div class="custom-cta__icon">
        <i class="fa-solid fa-sliders" aria-hidden="true"></i>
    </div>
    <div class="custom-cta__content">
        <h4 class="custom-cta__title">{{ $ctaTitle }}</h4>
        <p class="custom-cta__desc">{{ $ctaDesc }}</p>
    </div>
    <a href="{{ $ctaBtnLink }}" class="custom-cta__btn btn btn--base">{{ $ctaBtnText }}</a>
</div>
