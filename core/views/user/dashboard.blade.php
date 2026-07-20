
@extends('user.layouts.app')
@section('panel')

<div class="alert-item-wrapper">

	@if($invoicePending)

	<div class="alert-item">
		<div class="alert flex-align alert--danger" role="alert">
			<span class="alert__icon"><i class="icon-Warning"></i></span>
			<div class="alert__content">
				<span class="alert__title fs-16">You Have Outstanding Invoice</span>
				<p class="alert__desc">Pay them as soon as possible for peace of mind and to avoid any interruption of service. <a href="{{route('user.invoice.list')}}" class="alert__link text--base fw-semibold">View Invoices</a> </p>
			</div>
		</div>
	</div>

	@endif

	@if($renewEnvatoSupport)

	<div class="alert-item">
		<div class="alert flex-align alert--warning" role="alert">
			<span class="alert__icon"><i class="icon-Warning"></i></span>
			<div class="alert__content">
				<span class="alert__title fs-16">Support Expired for Envato Purchase</span>
				<p class="alert__desc">Renew support as soon as possible for peace of mind and to get support from us! <a href="{{route('user.envato.purchases')}}" class="alert__link text--base fw-semibold">View Envato Purchases</a> </p>
			</div>
		</div>
	</div>

	@endif

	@if($renewDirectSupport)

	<div class="alert-item">
		<div class="alert flex-align alert--warning" role="alert">
			<span class="alert__icon"><i class="icon-Warning"></i></span>
			<div class="alert__content">
				<span class="alert__title fs-16">Support Expired for Direct Purchase</span>
				<p class="alert__desc">Renew support as soon as possible for peace of mind and to get support from us! <a href="{{route('user.direct.purchases')}}" class="alert__link text--base fw-semibold">View Direct Purchases</a> </p>
			</div>
		</div>
	</div>

	@endif


</div>


@if($activeTicket)

<div class="table-card">
	<div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
		<div class="table-card__heading">
			<h2 class="table-card__title"> <span class="icon"><i class="icon-Profile"></i></span> Active Support Tickets </h2>
		</div> 
		<a href="{{route('user.ticket.index')}}" class="btn btn--base outline"> <span class="icon"><i class="fas fa-list"></i></span> View All</a>
	</div>
	<div class="table-card__table">
		<table class="table table--responsive--xl">
			<thead>
				<tr>
					<th>Ticket</th>
					<th>Subject</th>
					<th>Status</th>
					<th>Last Response</th>
					<th>Details</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($tickets as $ticket)
				@if($ticket->status != 3)

				<tr>
					<td data-label="Ticket">#{{$ticket->ticket}}</td>
					<td data-label="Subject">{{\Illuminate\Support\Str::limit($ticket->subject,50)}}</td>
					<td data-label="Status">{!! $ticket->statusBadge !!}</td>
					<td data-label="Last Response">{{diffForHumans($ticket->last_reply)}}</td>
					<td data-label="Details">
						<a href="{{route('user.ticket.details',$ticket->ticket)}}" class="btn btn--base d-inline-block">Details</a>
					</td>
				</tr>

				@endif
				@endforeach

			</tbody>
		</table>
	</div>
</div>

@endif

<div class="dashboard-card-wrapper">
	<div class="row gy-md-4 gy-3">
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card highlited-card flex-between">
				<a href="javascript:void(0)" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-money-1"></i>                   
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-money-1"></i>                   
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Balance</span>
						<h2 class="dashboard-card__number">${{ number_format($user->balance, 2) }} USD</h2>
					</div>
				</div>
				<button type="button" class="dashboard-card__button deposite-btn flex-center" data-bs-toggle="modal" data-bs-target="#depositModal"><i class="icon-add"></i></button>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.envato.purchases')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-envato-new"></i>                    
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-envato-new"></i>                    
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Envato Purchases</span>
						<h2 class="dashboard-card__number">{{$stat['envato']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.direct.purchases')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-Direct-purchase-fill"></i>                    
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-Direct-purchase-fill"></i>                    
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Direct Purchases</span>
						<h2 class="dashboard-card__number">{{$stat['direct']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.marketing.orders')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-megaphone-1"></i>                    
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-megaphone-1"></i>                    
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Marketing Orders</span>
						<h2 class="dashboard-card__number">{{$stat['mktorder']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.domain.list')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-domain"></i>                   
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-domain"></i>                   
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Domains</span>
						<h2 class="dashboard-card__number">{{$stat['domain']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.hosting.list')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-servers"></i>                   
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-servers"></i>                   
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Hosting</span>
						<h2 class="dashboard-card__number">{{$stat['hosting']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		{{-- <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.report.deposits')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-save-money"></i>                    
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-save-money"></i>                    
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Deposits</span>
						<h2 class="dashboard-card__number">{{$stat['deposit']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div> --}}

		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.invoice.list')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-invoice"></i>                 
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-invoice"></i>                 
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Invoices</span>
						<h2 class="dashboard-card__number">{{$stat['invoice']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card flex-between">
				<a href="{{route('user.report.transactions')}}" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-transaction"></i>                    
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-transaction"></i>                    
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Transactions</span>
						<h2 class="dashboard-card__number">{{$stat['transaction']}}</h2>
					</div>
				</div>
				<a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>

<div class="card-wrapper">
	<div class="row gy-md-4 gy-3">
		<div class="col-xxl-4">
			<div class="custom--card card">
				<div class="card-header">
					<h2 class="card-header__title">Latest Transactions</h2>
				</div>
				<div class="card-body">
					@if($transactions->count())
					<ul class="transaction-list">
						@foreach($transactions as $trx)
						<li class="transaction-list__item flex-between @if($trx->trx_type == '+') success @else danger @endif">
							<div class="transaction-list__left flex-align">
								<div class="transaction-list__date">
									<span class="transaction-list__date-number">{{showDatetime($trx->created_at,'d')}}</span>
									<span class="transaction-list__date-text fs-14">{{strtoupper(showDatetime($trx->created_at,'M'))}}</span>
								</div>
								<div class="transaction-list__content">
									<h6 class="transaction-list__title">#{{$trx->trx}}</h6>
									<p class="transaction-list__desc fs-14">{{$trx->details}}</p>
								</div>
							</div>
							<div class="transaction-list__right">
								<span class="transaction-list__amount fs-16">{{$trx->trx_type}} ${{getAmount($trx->amount)}}</span>
							</div>
						</li>
						@endforeach
					</ul>
					@else
					<div class="not-data-found">
						<span class="not-data-found__icon"><i class="icon-transaction"></i></span>
						<span class="not-data-found__text">No Transaction Yet!</span>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-xxl-4 col-md-6">
			<div class="custom--card card">
				<div class="card-header">
					<h2 class="card-header__title">Latest Logins</h2>
				</div>
				<div class="card-body">
					@if($logins->count())
					<ul class="card-history">
						@foreach($logins as $login)
						<li class="card-history__item flex-between">
							<div class="card-history__inner flex-center">
								<span class="card-history__icon flex-center"><i class="{{getOSIcon($login->os)}}"></i></span>
								<div class="card-history__content">
									<h6 class="card-history__title fs-16">{{$login->browser}} on {{$login->os}}</h6>
									<p class="card-history__desc fs-14">{{$login->city}} {{$login->country}}</p>
								</div>
							</div>
							<span class="card-history__right-text fs-16">{{diffForHumans($login->created_at)}}</span>
						</li>
						@endforeach
					</ul>
					@else
					<div class="not-data-found">
						<span class="not-data-found__icon"><i class="icon-Logout"></i></span>
						<span class="not-data-found__text">No Login Yet!</span>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-xxl-4 col-md-6">
			<div class="custom--card card">
				<div class="card-header">
					<h2 class="card-header__title">Latest Purchases</h2>
				</div>
				<div class="card-body">    
					@if($latestPurchase->count())
					<ul class="card-history">
						@foreach($latestPurchase as $envato)
						@php
						$itemexp = explode('-',$envato->product_name);
						$product = App\Models\Product::where('name',$envato->product_name)->latest()->first()
						@endphp
						<li class="card-history__item flex-between">
							<div class="card-history__inner flex-center">
								<span class="card-history__icon bg--base-two">
									<img src="{{asset('assets/images/products/'.@$product->icon)}}" alt="">
								</span>
								<div class="card-history__content">
									<h6 class="card-history__title fs-16">{{@$itemexp[0]}}</h6>
									<p class="card-history__desc fs-14">{{@$itemexp[1]}}</p>
								</div>
							</div>
							<div class="card-history__right">
							    @if($envato->supported_until)
								@if ($envato->supported_until < \Carbon\Carbon::now())
								<span class="badge badge--danger">Support Expired</span>
								@else
								<span class="card-history__right-text fs-14">Support until</span>
								<span class="card-history__right-time fs-14">{{showDateTime($envato->supported_until,'Y-m-d')}}</span>
								@endif
                                @else
                                <span class="badge badge--dark">Not Included</span>
                                @endif
							</div>
						</li>
						@endforeach
					</ul>
					@else
					<div class="not-data-found">
						<span class="not-data-found__icon"><i class="icon-envato"></i></span>
						<span class="not-data-found__text">No Purchase Yet!</span>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="depositModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title">Deposit Now</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{route('user.deposit.insert')}}" method="post">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="gateway" class="form--label">Select Gateway:</label>
						<select id="gateway" name="gateway" class="form-select form--control" required>
							<option value="">--Select One--</option>
							@foreach($gatewayCurrency as $gateway)
							<option value="{{$gateway->method_code}}" data-min_amount="{{$gateway->min_amount}}" data-max_amount="{{$gateway->max_amount}}">{{$gateway->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="amount" class="form--label">Enter Amount:</label>
						<div class="input-group">
							<input type="number" step="any" id="amount" name="amount" class="form--control form-control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
							<div class="input-group-text">USD</div>
						</div>
					</div>
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
<script>
	$('#gateway').change(function(){
		var minAmo = $(this).find("option:selected").data("min_amount");
		var maxAmo = $(this).find("option:selected").data("max_amount");

		$('#amount').attr('min',minAmo);
		$('#amount').attr('max',maxAmo);
	});
</script>
@endpush