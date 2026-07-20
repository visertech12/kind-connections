@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-megaphone-2"></i></span> My Marketing Orders</h2>
    </div> 
  </div>
  <div class="table-card__table">
    <div class="not-data-found">
      <span class="not-data-found__icon">
        <i class="icon-megaphone-2"></i>
      </span>
      <span class="not-data-found__text">No Marketing Orders Yet!</span>
    </div>
  </div>
</div>
@endsection
