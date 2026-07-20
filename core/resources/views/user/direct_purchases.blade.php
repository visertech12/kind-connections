@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-direct-purchase-outline"></i></span> My Direct Purchases</h2>
    </div> 
    <a href="{{ route('product.all') }}" class="btn btn--success outline"> <span class="icon"><i class="icon-add"></i></span> Purchase Now</a>
  </div>
  <div class="table-card__table">
    @if(isset($purchases) && $purchases->count())
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Username - Purchase Code</th>
          <th>License Type</th>
          <th>Purchased at</th>
          <th>Supported Until</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($purchases as $purchase)
        <tr>
          <td data-label="Item Name">
             @foreach($purchase->items as $item)
                 @if(strpos($item->description, 'Extended Support') === false)
                     <div>
                         <span class="fw-bold">{{ $item->description }}</span>
                     </div>
                 @endif
             @endforeach
          </td>
          <td data-label="Username - Purchase Code">
            <div>
                <span class="fw-bold">{{ auth()->user()->username }}</span> <br>
                <small>{{ $purchase->invid }}</small>
            </div>
          </td>
          <td data-label="License Type">
             @foreach($purchase->items as $item)
                 @php $details = json_decode(@$item->details, true); @endphp
                 @if(isset($details['license_type']))
                     <span class="badge badge--secondary">{{ $details['license_type'] }}</span>
                 @endif
             @endforeach
          </td>
          <td data-label="Purchased at">
            <div>
                <em class="text-muted">{{showDateTime($purchase->created_at,'Y-m-d')}}</em><br>
                <small>{{ \Carbon\Carbon::parse($purchase->created_at)->diffForHumans() }}</small>
            </div>
          </td>
          <td data-label="Supported Until">
             @php
                $hasExtendedSupport = $purchase->items->contains('description', 'Extended Support (6 months)');
                $supportMonths = $hasExtendedSupport ? 12 : 6;
                $supportedUntil = \Carbon\Carbon::parse($purchase->created_at)->addMonths($supportMonths);
                $isExpired = $supportedUntil->isPast();
             @endphp
             <div>
                <em class="text-muted">{{showDateTime($supportedUntil, 'Y-m-d')}}</em><br>
                @if($isExpired)
                    <span class="badge badge--danger">Support Expired</span>
                @else
                    <span class="badge badge--success">Supported</span>
                @endif
             </div>
          </td>
          <td data-label="Action">
            <a href="{{route('user.direct.purchase.details',$purchase->invid)}}" class="btn btn--base d-inline-block">Details</a>
          </td>
        </tr>
        @endforeach 
      </tbody>
    </table>
    @else
    <div class="not-data-found">
      <span class="not-data-found__icon">
        <i class="icon-direct-purchase-outline"></i>
      </span>
      <span class="not-data-found__text">No Direct Purchases Yet!</span>
    </div>
    @endif
  </div>
</div>
@if(isset($purchases) && $purchases->hasPages())
    {{$purchases->links('admin.partials.paginate')}}
@endif
@endsection
