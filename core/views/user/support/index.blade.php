@extends('user.layouts.app')
@section('panel')

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-Domain-outline"></i></span> My Support Tickets </h2>
    </div> 
    <a href="{{route('user.ticket.new')}}" class="btn btn--success outline"> <span class="icon"><i class="icon-add"></i></span> New Ticket</a>
  </div>
  <div class="table-card__table">
    @if($ticketCount && $tickets)
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
        @foreach($tickets as $ticket)
        <tr>
          <td data-label="Ticket">#{{$ticket->ticket}}</td>
          <td data-label="Subject">{{strLimit($ticket->subject,50)}}</td>
          <td data-label="Status">{!! $ticket->statusBadge !!}</td>
          <td data-label="Last Response">{{diffForHumans($ticket->last_reply)}}</td>
          <td data-label="Details">
            <a href="{{route('user.ticket.details',$ticket->ticket)}}" class="btn btn--base d-inline-block">Details</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="not-data-found">
      <span class="not-data-found__icon"><i class="icon-Profile"></i></span>
      <span class="not-data-found__text">No Support Ticket Yet!</span>
    </div>
    @endif
  </div>
</div>

{{$fakePage->links('admin.partials.paginate')}}

@endsection
