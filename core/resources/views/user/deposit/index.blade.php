@extends('user.layouts.app')
@section('panel')

<div class="table-card">
    <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
        <div class="table-card__heading">
            <h2 class="table-card__title"><span class="icon"><i class="fas fa-wallet"></i></span> Make a Deposit </h2>
        </div>
    </div>
    <div class="table-card__table">
        <div class="p-4">
                @if($gatewayCurrency->isEmpty())
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="fas fa-credit-card"></i></span>
                    <span class="not-data-found__text">No Payment Methods Available</span>
                </div>
                @else
                <form action="{{route('user.deposit.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-md-12 form-group">
                            <label for="gateway" class="form--label">Select Gateway:</label>
                            <select id="gateway" name="gateway" class="form-select form--control" required>
                                <option value="">--Select One--</option>
                                @foreach($gatewayCurrency as $gateway)
                                <option value="{{$gateway->method_code}}" data-min_amount="{{$gateway->min_amount}}" data-max_amount="{{$gateway->max_amount}}" data-currency="{{$gateway->currency}}" data-fixed="{{$gateway->fixed_charge}}" data-percent="{{$gateway->percent_charge}}" data-rate="{{$gateway->rate}}" data-instruction="{{addslashes($gateway->method->description ?? '')}}">{{$gateway->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="amount" class="form--label">Enter Amount:</label>
                            <div class="input-group">
                                <input type="number" step="any" id="amount" name="amount" class="form--control form-control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-text">USD</div>
                            </div>
                            <div class="mt-2 text--danger fs-14" id="gateway-info"></div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn--primary btn--md w-100">Continue to Payment Instructions</button>
                        </div>
                    </div>
                </form>
                @endif
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
	$('#gateway').change(function(){
		var minAmo = $(this).find("option:selected").data("min_amount");
		var maxAmo = $(this).find("option:selected").data("max_amount");
        var currency = $(this).find("option:selected").data("currency");
        var instruction = $(this).find("option:selected").data("instruction");

        if (minAmo !== undefined && maxAmo !== undefined) {
            $('#amount').attr('min',minAmo);
            $('#amount').attr('max',maxAmo);
            var infoHtml = `Limit: ${minAmo} - ${maxAmo} ${currency}`;
            if(instruction) {
                infoHtml += `<br> <span class="text--base mt-2 d-block">${instruction}</span>`;
            }
            $('#gateway-info').html(infoHtml);
        } else {
            $('#amount').removeAttr('min');
            $('#amount').removeAttr('max');
            $('#gateway-info').html('');
        }
	});
</script>
@endpush
