@extends('user.layouts.app')
@section('panel')

<div class="table-card">
    <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
        <div class="table-card__heading">
            <h2 class="table-card__title"><span class="icon"><i class="icon-envato-new-outline"></i></span> Envato Purchases </h2>
        </div>
        <button type="button" class="btn btn--success outline" data-bs-toggle="modal" data-bs-target="#envatoModal"> <span class="icon"><i class="icon-add"></i></span> Add New</button>
    </div>
    <div class="table-card__table">
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
                @if(isset($purchases) && $purchases->count())
                    @foreach($purchases as $purchase)
                        <tr>
                            <td data-label="Item Name">
                                <div>
                                    <span class="fw-bold">{{ $purchase->item_name }}</span> <br>
                                    <small>{{ $purchase->item_description }}</small>
                                </div>
                            </td>
                            <td data-label="Username - Purchase Code">
                                <div>
                                    <span class="fw-bold">{{ $purchase->username }}</span> <br>
                                    <small>{{ $purchase->purchase_code }}</small>
                                </div>
                            </td>
                            <td data-label="License Type">
                                <span class="badge badge--secondary">{{ $purchase->license_type ?? 'Regular License' }}</span>
                            </td>
                            <td data-label="Purchased at">
                                <div>
                                    <em class="text-muted">{{ showDateTime($purchase->purchased_at, 'Y-m-d') }}</em><br>
                                    <small>{{ \Carbon\Carbon::parse($purchase->purchased_at)->diffForHumans() }}</small>
                                </div>
                            </td>
                            <td data-label="Supported Until">
                                <div>
                                    @if($purchase->supported_until)
                                        <em class="text-muted">{{ showDateTime($purchase->supported_until, 'Y-m-d') }}</em>
                                        <br>
                                        @if(\Carbon\Carbon::parse($purchase->supported_until)->isPast())
                                            <span class="badge badge--danger"> Support Expired </span>
                                        @else
                                            <span class="badge badge--success"> Supported </span>
                                        @endif
                                    @else
                                        <span class="badge badge--dark">Not Included</span>
                                    @endif
                                </div>
                            </td>
                            <td data-label="Action">
                                <a href="javascript:void(0)" class="btn btn--base d-inline-block">Reload</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="100%" class="text-center">
                            <div class="not-data-found">
                                <span class="not-data-found__icon">
                                    <i class="icon-envato-new-outline"></i>
                                </span>
                                <span class="not-data-found__text">No Envato Purchases Yet!</span>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if(isset($purchases) && $purchases->hasPages())
    {{$purchases->links('admin.partials.paginate')}}
@endif

<div class="modal fade" id="envatoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Envato Purchase</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.envato.add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="purchaseCode" class="form--label">Envato Purchase code:</label>
                        <input type="text" name="purchaseCode" id="purchaseCode" class="form--control" placeholder="********-****-****-****-************" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary btn--md" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn--primary btn--md">Add Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
