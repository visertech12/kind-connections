@extends('template.layouts.master')
@section('element')

{{--
    @include('template.partials.topad')
--}}

    @include('template.partials.header')
    <main id="main-content">
        @yield('content')
    </main>

    @if (!request()->routeIs('book.meeting'))
        {{-- @include('template.partials.meeting') --}}
        @include('template.partials.footer')
    @endif
@endsection
