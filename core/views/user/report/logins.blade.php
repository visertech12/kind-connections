@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="fas fa-sign-in-alt"></i></span> Login History </h2>
    </div> 
  </div>
  <div class="table-card__table">
    @if($logins->count())
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>Time</th>
          <th>IP Address</th>
          <th>Location</th>
          <th>Browser</th>
          <th>OS</th>
        </tr>
      </thead>
      <tbody>
        @foreach($logins as $login)
        <tr>
          <td data-label="Time">{{showDateTime($login->created_at)}}<br>{{diffForHumans($login->created_at)}}</td>
          <td data-label="IP Address">{{$login->user_ip}}</td>
          <td data-label="Location">{{$login->city}}, {{$login->country}}</td>
          <td data-label="Browser">{{$login->browser}}</td>
          <td data-label="OS">{{$login->os}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="not-data-found">
      <span class="not-data-found__icon"><i class="fas fa-sign-in-alt"></i></span>
      <span class="not-data-found__text">No Login History Yet!</span>
    </div>
    @endif
  </div>
</div>

{{$logins->links('admin.partials.paginate')}}

@endsection
