@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">
            @if($ticket->status == 0)
                <span class="badge badge-success" style="vertical-align:middle;margin-right:8px">@lang('Open')</span>
            @elseif($ticket->status == 1)
                <span class="badge badge-primary" style="vertical-align:middle;margin-right:8px">@lang('Answered')</span>
            @elseif($ticket->status == 2)
                <span class="badge badge-warning" style="vertical-align:middle;margin-right:8px">@lang('Customer Reply')</span>
            @elseif($ticket->status == 3)
                <span class="badge badge-danger" style="vertical-align:middle;margin-right:8px">@lang('Closed')</span>
            @endif
            [@lang('Ticket')#{{ $ticket->ticket }}] {{ $ticket->subject }}
        </div>
    </div>
    @if($ticket->status != 3)
    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DelModal">
        <i class="fas fa-times-circle"></i> @lang('Close Ticket')
    </button>
    @endif
</div>

<div class="card" style="margin-bottom:20px">
    <div class="card-header">
        <div class="card-title"><i class="fas fa-reply" style="color:var(--primary);margin-right:8px"></i>@lang('Reply to Ticket')</div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.ticket.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Write your reply here..." required id="inputMessage"></textarea>
            </div>
            
            <div class="form-group" style="background:#f8fafc;padding:20px;border-radius:var(--radius-md);border:1px dashed var(--border-color)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <div>
                        <label class="form-label" style="margin:0">@lang('Attachments')</label>
                        <div class="form-hint" style="margin:0">@lang('Max 5 files can be uploaded'). @lang('Maximum upload size is') {{ ini_get('upload_max_filesize') }}</div>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary addFile">
                        <i class="fas fa-plus"></i> @lang('Add File')
                    </button>
                </div>
                
                <input type="file" name="attachments[]" id="inputAttachments" class="form-control" style="margin-bottom:10px" />
                <div id="fileUploadsContainer"></div>
                
                <div class="form-hint" style="margin-top:10px">
                    @lang('Allowed File Extensions'): .jpg, .jpeg, .png, .pdf, .doc, .docx
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:12px" name="replayTicket" value="2">
                <i class="fas fa-paper-plane"></i> @lang('Send Reply')
            </button>
        </form>
    </div>
</div>

<div class="ticket-messages">
    @foreach($messages as $message)
        @if($message->admin_id == 0)
            <div class="card" style="margin-bottom:16px;border-left:4px solid var(--primary)">
                <div class="card-body" style="padding:20px">
                    <div style="display:flex;justify-content:space-between;margin-bottom:12px">
                        <div style="font-weight:600;color:var(--text-primary);font-size:1.05rem">
                            <i class="fas fa-user-circle" style="color:var(--text-muted);margin-right:6px"></i> {{ $ticket->name }}
                        </div>
                        <div style="color:var(--text-muted);font-size:.82rem">
                            <i class="far fa-clock"></i> {{ $message->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                    <div style="color:var(--text-primary);line-height:1.6;font-size:.9rem">
                        {{$message->message}}
                    </div>
                    @if($message->attachments->count() > 0)
                        <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--border-color);display:flex;gap:10px;flex-wrap:wrap">
                            @foreach($message->attachments as $k=> $image)
                                <a href="{{route('admin.ticket.download', $image->id)}}" class="btn btn-sm btn-secondary" style="font-size:.75rem">
                                    <i class="fas fa-paperclip"></i> @lang('Attachment') {{++$k}} 
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="card" style="margin-bottom:16px;border-left:4px solid var(--warning);background:#fffbeb">
                <div class="card-body" style="padding:20px">
                    <div style="display:flex;justify-content:space-between;margin-bottom:12px">
                        <div style="font-weight:600;color:var(--warning);font-size:1.05rem">
                            <i class="fas fa-headset" style="margin-right:6px"></i> {{ $message->admin->name ?? 'Admin Staff' }}
                        </div>
                        <div style="color:var(--text-muted);font-size:.82rem">
                            <i class="far fa-clock"></i> {{ $message->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                    <div style="color:var(--text-primary);line-height:1.6;font-size:.9rem">
                        {{$message->message}}
                    </div>
                    @if($message->attachments->count() > 0)
                        <div style="margin-top:16px;padding-top:16px;border-top:1px solid rgba(245, 158, 11, 0.2);display:flex;gap:10px;flex-wrap:wrap">
                            @foreach($message->attachments as $k=> $image)
                                <a href="{{route('admin.ticket.download', $image->id)}}" class="btn btn-sm btn-ghost" style="font-size:.75rem;background:#fef3c7;border-color:#fde68a;color:#92400e">
                                    <i class="fas fa-paperclip"></i> @lang('Attachment') {{++$k}} 
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endforeach
</div>

<!-- Close Modal -->
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:var(--radius-lg);border:none;box-shadow:var(--shadow-lg)">
            <div class="modal-header" style="border-bottom:1px solid var(--border-color);padding:20px 24px">
                <h5 class="modal-title" style="font-weight:600;font-size:1.1rem">@lang('Close Support Ticket')</h5>
                <button type="button" class="btn-icon" data-bs-dismiss="modal" style="background:transparent;color:var(--text-muted);border:none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" style="padding:24px">
                <p style="margin:0;color:var(--text-primary);font-size:.95rem">@lang('Are you sure you want to close this support ticket? The user will not be able to reply until it is reopened.')</p>
            </div>
            <div class="modal-footer" style="border-top:1px solid var(--border-color);padding:16px 24px">
                <form method="post" action="{{ route('admin.ticket.reply', $ticket->id) }}">
                    @csrf
                    <input type="hidden" name="replayTicket" value="1">
                    <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-danger">@lang('Yes, Close Ticket')</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS needed for modals if not included in layout -->
@push('scripts')
<!-- Add Bootstrap JS for modal functionality if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function ($) {
        "use strict";
        var fileAdded = 0;
        $('.addFile').on('click',function(){
            if (fileAdded >= 4) {
                alert('You\'ve added maximum number of files');
                return false;
            }
            fileAdded++;
            $("#fileUploadsContainer").append(`
                <div style="display:flex;gap:10px;margin-bottom:10px">
                    <input type="file" name="attachments[]" class="form-control" required />
                    <button type="button" class="btn btn-icon btn-danger remove-btn"><i class="fas fa-times"></i></button>
                </div>
            `);
        });
        $(document).on('click','.remove-btn',function(){
            fileAdded--;
            $(this).parent().remove();
        });
    })(jQuery);
</script>
@endpush
@endsection
