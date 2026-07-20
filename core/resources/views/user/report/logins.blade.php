@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="fa-light fa-sign-in-alt"></i></span> My Login History </h2>
            </div>
        </div>
        <div class="table-card__table">
            @if ($logins->count())
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Login Time</th>
                            <th>Browser</th>
                            <th>OS</th>
                            <th>Login From</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($logins as $log)
                            <tr>
                                <td data-label="Login Time">
                                    <div><em class="text-muted">{{ showDatetime($log->created_at) }}</em> <br> {{ diffForHumans($log->created_at) }}</div>
                                </td>
                                <td data-label="Browser">
                                    <div><i class="{{ getBrowserIcon($log->browser) }}"></i> {{ $log->browser }}</div>
                                </td>
                                <td data-label="OS">
                                    <div><i class="{{ getOSIcon($log->os) }}"></i> {{ $log->os }}</div>
                                </td>
                                <td data-label="Login From">
                                    <div>{{ $log->city }} <br> {{ $log->country }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-Logout"></i></span>
                    <span class="not-data-found__text">No Login Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $logins->links('admin.partials.paginate') }}

@endsection
