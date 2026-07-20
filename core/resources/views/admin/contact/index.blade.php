@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title"><i class="fas fa-envelope" style="color:var(--primary);margin-right:8px"></i>Contact Messages</div>
    </div>
</div>

<div class="row" style="margin-bottom:20px">
    <div class="col-md-3 col-sm-6"><div class="card" style="padding:16px"><div class="text-muted small">Total</div><div style="font-size:1.5rem;font-weight:700">{{ $counts['total'] }}</div></div></div>
    <div class="col-md-3 col-sm-6"><div class="card" style="padding:16px;border-left:4px solid var(--warning)"><div class="text-muted small">New</div><div style="font-size:1.5rem;font-weight:700;color:var(--warning)">{{ $counts['new'] }}</div></div></div>
    <div class="col-md-3 col-sm-6"><div class="card" style="padding:16px;border-left:4px solid var(--primary)"><div class="text-muted small">Read</div><div style="font-size:1.5rem;font-weight:700">{{ $counts['read'] }}</div></div></div>
    <div class="col-md-3 col-sm-6"><div class="card" style="padding:16px;border-left:4px solid var(--success)"><div class="text-muted small">Replied</div><div style="font-size:1.5rem;font-weight:700;color:var(--success)">{{ $counts['replied'] }}</div></div></div>
</div>

<div class="card">
    <div class="card-header">
        <form method="get" action="" class="d-flex flex-wrap" style="gap:10px;width:100%">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search name, email, subject…" style="max-width:280px">
            <select name="status" class="form-control" style="max-width:160px">
                <option value="all"      @selected(request('status','all')==='all')>All</option>
                <option value="0"        @selected(request('status')==='0')>New</option>
                <option value="1"        @selected(request('status')==='1')>Read</option>
                <option value="2"        @selected(request('status')==='2')>Replied</option>
            </select>
            <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
            <a href="{{ route('admin.contact.index') }}" class="btn btn-ghost">Reset</a>
        </form>
    </div>
    <div class="card-body" style="padding:0">
        <div class="table-responsive">
            <table class="table" style="margin:0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name / Email</th>
                        <th>Subject</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th style="text-align:right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $m)
                    <tr style="{{ $m->status == 0 ? 'background:#fffbeb' : '' }}">
                        <td>#{{ $m->id }}</td>
                        <td>
                            <div style="font-weight:600">{{ $m->name }}</div>
                            <div class="text-muted small"><a href="mailto:{{ $m->email }}">{{ $m->email }}</a></div>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($m->subject, 60) }}</td>
                        <td>{{ $m->created_at->format('d M Y, H:i') }}</td>
                        <td>{!! $m->status_badge !!}</td>
                        <td style="text-align:right">
                            <a href="{{ route('admin.contact.show', $m->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</a>
                            <form action="{{ route('admin.contact.delete', $m->id) }}" method="post" style="display:inline" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--text-muted)">No contact messages yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($messages->hasPages())
    <div class="card-footer">{{ $messages->appends(request()->all())->links() }}</div>
    @endif
</div>
@endsection