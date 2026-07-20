@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">
            {!! $message->status_badge !!}
            <span style="margin-left:8px">Contact #{{ $message->id }}</span>
        </div>
    </div>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card" style="margin-bottom:20px">
            <div class="card-header"><div class="card-title"><i class="fas fa-envelope-open-text" style="color:var(--primary);margin-right:8px"></i>Original Message</div></div>
            <div class="card-body">
                <div style="display:flex;justify-content:space-between;margin-bottom:12px;flex-wrap:wrap;gap:8px">
                    <div>
                        <div style="font-weight:600;font-size:1.05rem">{{ $message->name }}</div>
                        <div class="text-muted small"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
                    </div>
                    <div class="text-muted small"><i class="far fa-clock"></i> {{ $message->created_at->format('d M Y, H:i') }}</div>
                </div>
                <div style="font-weight:600;margin-bottom:8px">Subject: {{ $message->subject }}</div>
                <div style="white-space:pre-wrap;line-height:1.6;background:#f8fafc;padding:16px;border-radius:8px;border:1px solid var(--border-color)">{{ $message->message }}</div>
            </div>
        </div>

        @if($message->admin_reply)
        <div class="card" style="margin-bottom:20px;border-left:4px solid var(--success)">
            <div class="card-header"><div class="card-title"><i class="fas fa-reply" style="color:var(--success);margin-right:8px"></i>Your Reply <span class="text-muted small">({{ optional($message->replied_at)->format('d M Y, H:i') }})</span></div></div>
            <div class="card-body">
                <div style="white-space:pre-wrap;line-height:1.6">{{ $message->admin_reply }}</div>
            </div>
        </div>
        @endif

        <div class="card">
            <div class="card-header"><div class="card-title"><i class="fas fa-paper-plane" style="color:var(--primary);margin-right:8px"></i>{{ $message->admin_reply ? 'Send Another Reply' : 'Reply to Customer' }}</div></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('admin.contact.reply', $message->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Reply Message</label>
                        <textarea name="reply" rows="7" class="form-control" placeholder="Write your reply to {{ $message->name }}…" required>{{ old('reply') }}</textarea>
                        <div class="form-hint">This will be emailed to <strong>{{ $message->email }}</strong>.</div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Reply</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><div class="card-title"><i class="fas fa-info-circle" style="color:var(--primary);margin-right:8px"></i>Details</div></div>
            <div class="card-body">
                <ul style="list-style:none;padding:0;margin:0">
                    <li style="padding:8px 0;border-bottom:1px solid var(--border-color)"><strong>Status:</strong> {!! $message->status_badge !!}</li>
                    <li style="padding:8px 0;border-bottom:1px solid var(--border-color)"><strong>IP:</strong> {{ $message->ip ?? '—' }}</li>
                    <li style="padding:8px 0;border-bottom:1px solid var(--border-color)"><strong>User Agent:</strong><br><span class="text-muted small">{{ $message->user_agent ?? '—' }}</span></li>
                    <li style="padding:8px 0"><strong>Received:</strong> {{ $message->created_at->format('d M Y, H:i:s') }}</li>
                </ul>
            </div>
        </div>

        <form action="{{ route('admin.contact.delete', $message->id) }}" method="post" onsubmit="return confirm('Delete this message permanently?')" style="margin-top:16px">
            @csrf
            <button type="submit" class="btn btn-danger" style="width:100%"><i class="fas fa-trash"></i> Delete Message</button>
        </form>
    </div>
</div>
@endsection