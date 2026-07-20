@extends('user.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-8">
            <div class="card custom--card h-auto b-radius--10 mb-3">
                <div class="card-header flex-between">
                    <h3 class="mb-0">Order Details</h3>
                    {!! printMktOrderStatus($order->order_status) !!}
                </div>
                <div class="card-body">
                    @foreach ($order->details as $k => $v)
                        <p class="mb-3"> <strong class="text--primary">{{ ucfirst($k) }}:</strong> <br> {!! nl2br($v) !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            @php
                if ($order->service_of == 'api') {
                    $plan = \App\Models\ServiceApi::find($order->service_id);
                } else {
                    $plan = \App\Models\ServiceManual::find($order->service_id);
                }
            @endphp
            @if ($plan)
                <div class="card custom--card h-auto b-radius--10 mb-3">
                    <div class="card-header">
                        <h3 class="mb-0">Ordered Plan Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-3"> <strong class="text--primary">Name : </strong>{{ $plan->name }} - {{ @$order->details->type }}</p>
                                <p class="mb-3"> <strong class="text--primary">Details : </strong> <br>{!! nl2br($plan->details) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card custom--card h-auto b-radius--10 mb-3">
                <div class="card-header">
                    <h3 class="mb-0">Related Invoice</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('user.invoice.details', $order->invoice->invid) }}" class="text--base">INVOICE#{{ $order->invoice->invid }}</a>
                                {!! printInvoiceStatus($order->invoice->status) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($order->user_ticket)
                <div class="card custom--card h-auto b-radius--10 mb-3">
                    <div class="card-header">
                        <h3 class="mb-0">Related Ticket</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user.ticket.details', $order->user_ticket) }}" class="text--base">Ticket#{{ $order->user_ticket }}</a>
                                    <a href="{{ route('user.ticket.details', $order->user_ticket) }}" class="btn btn--base d-inline-block">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
