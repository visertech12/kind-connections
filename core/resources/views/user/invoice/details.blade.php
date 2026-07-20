@extends('user.layouts.app')
@section('panel')
    @php
        $statusType = getType($invoice->status);
        if ($statusType == 'integer') {
            $invoiceID = $invoice->invid;
            $invoiceType = 'system_invoice';
            $totalAmount = $invoice->amount;
            $remainAmount = $invoice->amount - $invoice->paid;
        } else {
            $invoiceID = $invoice->invoiceid;
            $invoiceType = 'whmcs_invoice';
            $totalAmount = $invoice->balance;
            $remainAmount = $invoice->balance;
        }
        $totalPaid = 0;
    @endphp

    <div class="row gy-4">
        <div class="col-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <div class="card-header__left d-flex flex-wrap align-items-center gap-2">
                        <h2 class="card-header__title"> <span class="icon"><i class="icon-Invoice-outline"></i></span> Invoice#{{ $invoiceID }} </h2>
                        {!! printInvoiceStatus($invoice->status) !!}
                    </div>
                    <div class="card-header__buttons d-flex flex-wrap align-items-center gap-2">
                        <a href="{{ route('user.invoice.download', $invoiceID) }}" class="btn btn--secondary outline"><span class="fa-icon me-2"><i class="fa-regular fa-download"></i></span> Download</a>
                        @if ($invoice->status == 0 || $invoice->status == 2 || $invoice->status == 'Unpaid')
                            <button type="button" class="btn btn--success outline" data-bs-toggle="modal" data-bs-target="#paymentModal"> <span class="fa-icon me-2"><i class="fa-regular fa-credit-card"></i></span> Make Payment</button>
                        @endif
                    </div>
                </div>
                <div class="card-body overflow-x-auto">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th class="text-start">Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td data-label="Sl#">{{ $loop->iteration }}</td>
                                    <td data-label="Description" class="text-start">{!! nl2br(@$item->description) !!}</td>
                                    <td data-label="Amount" class="text-right">${{ $item->amount }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total : ${{ $totalAmount }} USD</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if ($trxs && count($trxs))
            <div class="col-12">
                <div class="custom--card h-auto card">
                    <div class="card-header">
                        <h2 class="card-header__title">Transactions</h2>
                    </div>
                    <div class="card-body overflow-x-auto">
                        <table class="table invoice-table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Trx#</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trxs as $k => $trx)
                                    @php
                                        $totalPaid += $trx->amountin;
                                        if (@$trx->amountout > 0) {
                                            $totalPaid -= $trx->amountout;
                                        }
                                    @endphp
                                    <tr>
                                        <td data-label="Sl#">{{ $k + 1 }}</td>
                                        <td data-label="Date">{{ showDateTime($trx->date, 'Y-m-d') }}</td>
                                        <td data-label="Description">{{ $trx->description }}</td>
                                        <td data-label="Trx#">{{ $trx->transid }}</td>
                                        <td data-label="Amount" class="fw-bold">
                                            @if (@$trx->amountout > 0)
                                                - ${{ $trx->amountout }}
                                            @else
                                                ${{ $trx->amountin }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">Total Paid: {{ $totalPaid }} USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Pay Now</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" class="invoicePayment">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form--label">Select Gateway:</label>
                            <select name="gateway" class="form-control form-select form-control-lg selectGateway" required>
                                <option value="">--Select One--</option>
                                <option value="balance" data-route="{{ route('user.invoice.pay') }}"> Account Balance (Available: {{ getamount($user->balance) }} USD)</option>
                                @foreach ($gatewayCurrency as $gateway)
                                    <option value="{{ $gateway->method_code }}" data-min_amount="{{ $gateway->min_amount }}" data-max_amount="{{ $gateway->max_amount }}" data-route="{{ route('user.deposit.insert') }}">{{ $gateway->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group amountdiv d-none">
                            <label for="amount" class="form--label">Enter Amount:</label>
                            <div class="input-group">
                                <input type="number" step="any" id="amount" name="amount" class="form-control form--control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" value="{{ getAmount($remainAmount) }}" required>
                                <div class="input-group-text">USD</div>
                            </div>
                        </div>
                        @if ($invoiceType == 'system_invoice' && @$invoice->invoice_for == '')
                            <input type="hidden" name="payload" value="{{ encrypt($invoiceType . '|' . $invoiceID . '|' . $totalAmount . '|0|' . getAmount($invoice->amount - $invoice->paid)) }}">
                        @else
                            <input type="hidden" name="payload" value="{{ encrypt($invoiceType . '|' . $invoiceID . '|' . $totalAmount . '|1') }}">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary btn--md" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn--primary btn--md">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('script')
    @if ($invoiceType == 'system_invoice' && @$invoice->invoice_for == '')
        <script>
            $('.amountdiv').removeClass('d-none');
        </script>
    @endif
    <script>
        $('.selectGateway').on('change', function() {
            var route = $(this).find(':selected').attr('data-route');
            $('.invoicePayment').attr('action', route);
        });
        var route = $('.selectGateway').find(':selected').attr('data-route');
        $('.invoicePayment').attr('action', route);


        $('#gateway').change(function() {
            var minAmo = $(this).find("option:selected").data("min_amount");
            var maxAmo = $(this).find("option:selected").data("max_amount");

            $('#amount').attr('min', minAmo);
            $('#amount').attr('max', maxAmo);
        });
    </script>
@endpush
