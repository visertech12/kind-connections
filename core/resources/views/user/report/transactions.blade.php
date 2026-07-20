
@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-transaction"></i></span> My Transaction History </h2>
            </div>
        </div>
        <div class="table-card__table">
            @if ($transactions->count())
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Transaction #</th>
                            <th>Transacted on</th>
                            <th>Amount</th>
                            <th>Remaining Balance</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $trx)
                            <tr>
                                <td data-label="Transaction #">{{ $trx->trx }}</td>
                                <td data-label="Transacted on">{{ showDateTime($trx->created_at) }}</td>
                                <td data-label="Amount">
                                    <span @if ($trx->trx_type == '+') class="text--success fw-bold" @else class="text--danger fw-bold" @endif>
                                        {{ $trx->trx_type == '+' ? '+' : '-' }} ${{ getAmount($trx->amount) }} {{ $general->cur_text }}
                                    </span>
                                </td>
                                <td data-label="Remaining Balance">${{ getAmount($trx->post_balance) }} USD</td>
                                <td data-label="Description">{{ $trx->details }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-transaction"></i></span>
                    <span class="not-data-found__text">No Transaction Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $transactions->links('admin.partials.paginate') }}

@endsection
