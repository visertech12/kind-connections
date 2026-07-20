@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="fas fa-history"></i></span> Deposit History </h2>
    </div> 
    <a href="{{ route('user.deposit.index') }}" class="btn btn--success outline"> <span class="icon"><i class="fas fa-plus"></i></span> New Deposit</a>
  </div>
  <div class="table-card__table">
    @if($deposits->count())
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>#</th>
          <th>Transaction</th>
          <th>Gateway</th>
          <th>Amount</th>
          <th>Charge</th>
          <th>Credited</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($deposits as $deposit)
        <tr>
          <td data-label="#">{{ $loop->iteration }}</td>
          <td data-label="Transaction"><span class="fw-bold">{{ $deposit->trx }}</span></td>
          <td data-label="Gateway">
              <div class="fw-bold">{{ $deposit->gateway->name ?? '—' }}</div>
              <div class="fs-14 text-muted">{{ $deposit->method_currency }}</div>
          </td>
          <td data-label="Amount" class="fw-bold">
              {{ getAmount($deposit->amount + $deposit->charge) }} {{ $deposit->method_currency }}
          </td>
          <td data-label="Charge" class="text-danger">
              {{ getAmount($deposit->charge) }} {{ $deposit->method_currency }}
          </td>
          <td data-label="Credited" class="text-success fw-bold">
              {{ getAmount($deposit->amount) }} {{ $deposit->method_currency }}
          </td>
          <td data-label="Date">
              {{ showDateTime($deposit->created_at, 'Y-m-d') }}
          </td>
          <td data-label="Status">
              @if($deposit->status == 2)
                  <span class="badge badge--warning"><i class="fas fa-clock"></i> Pending</span>
              @elseif($deposit->status == 1)
                  <span class="badge badge--success"><i class="fas fa-check-circle"></i> Approved</span>
              @elseif($deposit->status == 3)
                  <span class="badge badge--danger"><i class="fas fa-times-circle"></i> Rejected</span>
              @else
                  <span class="badge badge--dark">Initiated</span>
              @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="not-data-found">
      <span class="not-data-found__icon"><i class="fas fa-inbox"></i></span>
      <span class="not-data-found__text">No deposits yet!</span>
    </div>
    @endif
  </div>
</div>

{{$deposits->links('admin.partials.paginate')}}

@endsection
