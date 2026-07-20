@extends('user.layouts.master')
@section('content')

<div class="dashboard position-relative">
    <div class="dashboard__inner">

        @include('user.partials.leftnav')

        <div class="dashboard__right">

            @include('user.partials.topbar')

            <div class="dashboard-body">

{{--
            @include('user.partials.promo')
--}}  

                @yield('panel')

            </div>
        </div>
    </div>
</div>

@endsection
