@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-Domain-outline"></i></span> My Domains </h2>
            </div>
            <a href="{{ route('domain.register') }}" class="btn btn--success outline"> <span class="icon"><i class="icon-add"></i></span> Register Domain</a>
        </div>
        <div class="table-card__table">
            @if ($domainCount)
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Domain name</th>
                            <th>Whois Protection</th>
                            <th>Order Date</th>
                            <th>Expire Date</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($domains as $domain)
                            <tr>
                                <td data-label="Domain name"> <span class="fw-bold">{{ $domain->domainname }}</span> </td>
                                <td data-label="Whois Protection">
                                    @if ($domain->idprotection == 1)
                                        <span class="badge badge--success">YES</span>
                                    @else
                                        <span class="badge badge--warning">NO</span>
                                    @endif
                                </td>
                                <td data-label="Order Date">{{ showDateTime($domain->regdate, 'Y-m-d') }}</td>
                                <td data-label="Expire Date">{{ $domain->expirydate }}</td>
                                <td data-label="Price" class="font-weight-bold">${{ $domain->firstpaymentamount }}</td>
                                <td data-label="Status"><span class="{{ getBadge($domain->status) }}">{{ $domain->status }}</span></td>
                                <td data-label="Action"><a href="{{ route('user.domain.details', ['overview', encrypt($domain->id)]) }}" class="btn btn--base d-inline-block">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-Domain-outline"></i></span>
                    <span class="not-data-found__text">No Domain Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $fakePage->links('admin.partials.paginate') }}

@endsection
