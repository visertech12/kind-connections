@extends('user.layouts.app')
@section('panel')

<div class="row gy-4">

{{-- REPLY FORM --}}

<div class="col-12">
  <div class="custom--card card">
    <div class="card-header">
      <div class="flex-between mb-2 gap-2">  
        <p class="ticket-department text-uppercase"> @lang('Support') @lang('Department')</p>
        {!! $ticket->statusBadge !!}
      </div>
      <h6 class="ticket-title">[@lang('Ticket')#{{$ticket->ticket}}] {{$ticket->subject}}</h6>
    </div>
    <div class="card-body">

      <div class="row multi_warning d-none">
        <div class="col-sm-12">
          <div class="alert-item mb-3">
            <div class="alert flex-align alert--warning text-center" role="alert">
              <div class="alert__content">
                <span class="alert__title fs-18 text--warning">@lang('Our staff addresses tickets based on the order of their last response. Replying multiple times can potentially cause delays in our response time.')</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if($ticket->status != 3)
      <form method="post" action="{{route('user.ticket.reply', $ticket->ticket)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <textarea id="message" name="message" class="form--control" spellcheck="false" placeholder="@lang('Your Reply ...')" required></textarea>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-between">
          <div class="col-md-9 col-12">
            <a href="javascript:void(0)" class="btn btn--secondary outline d-inline-block mb-3" onclick="extraTicketAttachment()"> <i class="fas fa-plus me-2"></i> @lang('Add Attachment') </a>
            <div class="row append"></div>
          </div>
          <div class="col-md-3 col-12">
            <div class="form-group">
              <button type="submit" class="btn btn--base w-100"> <span class="fa-icon me-2"><i class="far fa-reply"></i></span> @lang('Reply')</button>
            </div>
          </div>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>

{{-- REPLIES --}}

<div class="col-12">
  <div class="reply-cards">

    @foreach($messages as $message)
    @php
        $isUser = $message->admin_id == 0;
        $name = $isUser ? $ticket->name : ($message->admin->name ?? 'Admin');
        $role = $isUser ? $ticket->email : 'Staff';
        $class = $isUser ? 'guest-reply' : 'operator-reply';
    @endphp

    <div class="card custom--card {{$class}} mt-3">
      <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
        <h5 class="mb-0">{{$name}} <small class="text--light fw-normal fs-14 add-brackets">{{$role}}</small> </h5>
        <small class="date-time text--light fs-14"> {{$message->created_at->format('l, F d, Y (h:i:s A)')}}</small>
      </div>
      <div class="card-body tkt-reply">
        <p>{{$message->message}}</p>
      </div>
      @if ($message->attachments->count() > 0)
      <div class="card-footer">
        <div class="attachments">
          <strong>@lang('Attachments') ({{$message->attachments->count()}})</strong>
          <ul>
            @foreach ($message->attachments as $k => $attachment)
            <li>
              <i class="far fa-file me-2"></i><a href="{{route('user.ticket.download', $attachment->id)}}">@lang('Attachment') {{++$k}}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
    </div>

    @endforeach

  </div>
</div>
</div>

@endsection

@push('script')
<script>
  var i = 1;
  function extraTicketAttachment() {
    if(i >= 5) {
        notify('error','You\'ve added maximum number of file');
        return false;
    }
    $(".append").append(`
      <div class="col-md-4 mb-3">
        <div class="input-group">
          <input type="file" name="attachments[]" class="form--control form-control" id="attach${i}" accept=".jpg,.jpeg,.png,.pdf,.txt,.doc,.docx" required>
          <button type="button" class="input-group-text remove btn--danger"><i class="fas fa-times"></i></button>
        </div>
      </div>
    `)
    i++;
  }

  $(document).on('click','.remove',function(){
    $(this).closest('.col-md-4').remove();
    i--;
  })

  @if($ticket->status == 2)
  $("#message").on("focus", function(){
    $('.multi_warning').removeClass('d-none');
  });
  @endif
</script>
@endpush
