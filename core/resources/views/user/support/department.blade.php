@extends('user.layouts.app')
@section('panel')
<div class="alert-item">
    <div class="alert flex-align alert--warning" role="alert">
        <span class="alert__icon"><i class="icon-Warning"></i></span>
        <div class="alert__content">
            <span class="alert__title fs-16 text--warning">@lang('Select Support Department Carefully')</span>
            <p class="alert__desc">@lang('Selecting the appropriate department is crucial as it enables us to handle your ticket in an organized manner, ensuring a faster and more effective resolution for your issue.')</p>
        </div>
    </div>
</div>
<div class="row gy-md-4 gy-3 support-card-wrapper">
    @foreach($departments as $slug => $dept)
    <div class="col-xxl-4 col-md-6 col-sm-6">
        <div class="dashboard-card flex-between {{ $dept['highlight'] == 'bg--highlighted' ? ' bg--highlighted ' : '' }} {{ $dept['highlight'] == 'bg--superhighlighted' ? '  bg--superhighlighted ' : '' }}">
            <a href="{{ route('user.ticket.new', $slug) }}" class="dashboard-card__link"></a>
            <div class="dashboard-card__content">
                <h4 class="dashboard-card__number mb-2">{{ __($dept['title']) }}</h4>
                <span class="dashboard-card__text mb-0 fs-14">{!! __($dept['desc']) !!}</span>
            </div>
            <a href="{{ route('user.ticket.new', $slug) }}" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
        </div>
    </div>
    @endforeach
</div>
@endsection
