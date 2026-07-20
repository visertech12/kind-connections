@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div>
        <div class="page-header__title">{{ $pageTitle ?? 'Support Tickets' }}</div>
        <div class="page-header__subtitle">Manage and respond to user support tickets</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            All Tickets
            <span style="font-size:.78rem;font-weight:500;color:var(--text-muted);margin-left:8px">({{ $items->total() }} total)</span>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>@lang('Subject')</th>
                    <th>@lang('Submitted By')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Priority')</th>
                    <th>@lang('Last Reply')</th>
                    <th style="text-align:right">@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('admin.ticket.view', $item->id) }}" style="font-weight:600;color:var(--primary);text-decoration:none">
                                [@lang('Ticket')#{{ $item->ticket }}] {{ strLimit($item->subject, 30) }}
                            </a>
                        </td>
                        <td>
                            @if($item->user_id)
                                <a href="{{ route('admin.users.detail', $item->user_id) }}" style="font-weight:600;color:var(--text-primary);text-decoration:none">
                                    {{ @$item->user->fullname }}
                                </a>
                            @else
                                <span style="font-weight:600;color:var(--text-primary)">{{ $item->name }}</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status == 0)
                                <span class="badge badge-success">@lang('Open')</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-primary">@lang('Answered')</span>
                            @elseif($item->status == 2)
                                <span class="badge badge-warning">@lang('Customer Reply')</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">@lang('Closed')</span>
                            @endif
                        </td>
                        <td>
                            @if($item->priority == 'Low')
                                <span class="badge badge-secondary">@lang('Low')</span>
                            @elseif($item->priority == 'Medium')
                                <span class="badge badge-warning">@lang('Medium')</span>
                            @elseif($item->priority == 'High')
                                <span class="badge badge-danger">@lang('High')</span>
                            @endif
                        </td>
                        <td style="color:var(--text-muted);font-size:.82rem">
                            {{ diffForHumans($item->last_reply) }}
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px">
                                <a href="{{ route('admin.ticket.view', $item->id) }}" class="btn btn-icon" style="background:var(--primary-light);color:var(--primary)" title="Details">
                                    <i class="fas fa-desktop"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div style="text-align:center;padding:40px 0">
                                <div style="font-size:2.5rem;margin-bottom:12px;opacity:.3"><i class="fas fa-ticket-alt"></i></div>
                                <div style="color:var(--text-muted);font-size:.9rem">{{ __($emptyMessage ?? 'No tickets found') }}</div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
        <div class="pagination-wrapper">{{ $items->links() }}</div>
    @endif
</div>
@endsection
