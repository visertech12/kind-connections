@extends('user.layouts.app')
@section('panel')
<div class="alert-item">
    <div class="alert alert--warning d-flex align-items-start gap-3" role="alert">
        <span class="alert__icon"><i class="fas fa-exclamation-triangle"></i></span>
        <div class="alert__content">
            <span class="alert__title fs-16 text--warning d-block">@lang('Select Support Department Carefully')</span>
            <p class="alert__desc mb-0">@lang('Selecting the appropriate department is crucial as it enables us to handle your ticket in an organized manner, ensuring a faster and more effective resolution for your issue.')</p>
        </div>
    </div>
</div>
<div class="row gy-md-4 gy-3 support-card-wrapper mt-3">
    @foreach($departments as $slug => $dept)
    <div class="col-xxl-4 col-md-6 col-sm-6">
        <div class="dashboard-card custom--card card position-relative {{ $dept['highlight'] }}">
            <a href="{{ route('user.ticket.new', $slug) }}" class="dashboard-card__link stretched-link" style="position:absolute;inset:0;z-index:1;"></a>
            <div class="card-body d-flex justify-content-between align-items-center gap-3">
                <div>
                    <h4 class="mb-2">{{ __($dept['title']) }}</h4>
                    <span class="fs-14 text-muted">{!! __($dept['desc']) !!}</span>
                </div>
                <span class="btn btn--base btn-sm"><i class="far fa-chevron-right"></i></span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
