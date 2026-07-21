
@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-save-money"></i></span> My Deposit History </h2>
            </div>
        </div>
        <div class="table-card__table">
            @if ($deposits->count())
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Transaction #</th>
                            <th>Gateway</th>
                            <th>Deposited on</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deposits as $log)
                            <tr>
                                <td data-label="Transaction #">{{ $log->trx }}</td>
                                <td data-label="Gateway"><span class="fw-bold">{{ $log->gateway->name }}</span></td>
                                <td data-label="Deposited on">
                                    <div><em class="text-muted">{{ showDateTime($log->created_at) }}</em><br>
                                        {{ diffForHumans($log->created_at) }}
                                    </div>
                                </td>
                                <td data-label="Amount"><span class="fw-bold">${{ getAmount($log->final_amo) }} USD</span></td>
                                <td data-label="Status">{!! $log->statusBadge !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-save-money"></i></span>
                    <span class="not-data-found__text">No Deposit Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $deposits->links('admin.partials.paginate') }}

@endsection
