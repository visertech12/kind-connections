
@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-Invoice-outline"></i></span> My Invoices</h2>
      <p>Debug: Total Invoices in DB: {{ \App\Models\Invoice::count() }} | For You: {{ \App\Models\Invoice::where('user_id', auth()->id())->count() }}</p>
    </div> 
  </div>
  <div class="table-card__table">
    @if($invoiceList->count())
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>Invoice ID</th>
          <th>Created Date</th>              
          <th>Amount</th>
          <th>Status</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($invoiceList as $invoice)
        @php
        $invoiceID = @$invoice['invid'] ?  $invoice['invid'] : $invoice['id'];
        $amount = @$invoice['amount'] ?  $invoice['amount'] : $invoice['total'];
        @endphp
        <tr>
          <td data-label="Invoice ID" class="fw-bold">#{{$invoiceID}}</td> 
          <td data-label="Created Date">{{showDateTime($invoice['created_at'],'Y-m-d')}}</td>            
          <td data-label="Total" class="font-weight-bold">{{getAmount($amount)}} USD</td>
          <td data-label="Status">{!! printInvoiceStatus($invoice['status']) !!}</td>
          <td data-label="Details">
            <a href="{{route('user.invoice.details',$invoiceID)}}" class="btn btn--base d-inline-block">Details</a>
          </td>
        </tr>
        @endforeach 
      </tbody>
    </table>
    @else
    <div class="not-data-found">
      <span class="not-data-found__icon">
        <i class="icon-invoice"></i>
      </span>
      <span class="not-data-found__text">No Invoice Yet!</span>
    </div>
    @endif
  </div>
</div>

{{$invoiceList->links('admin.partials.paginate')}}

@endsection