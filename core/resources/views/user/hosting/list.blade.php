@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-Hosting-outline"></i></span> My Hosting </h2>
            </div>
            <button type="button" class="btn btn--success outline" data-bs-toggle="modal" data-bs-target="#orderModal"> <span class="icon"><i class="icon-add"></i></span> Order Now</button>
        </div>
        <div class="table-card__table">
            @if ($hostingCount)
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Pricing</th>
                            <th>Registration Date</th>
                            <th>Next Due Date</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hostings as $product)
                            <tr>
                                <td data-label="Service">
                                    <div>
                                        <span class="fw-bold">{{ $product->groupname }}</span> <span class="text--primary">{{ $product->name }}</span>
                                        <br>
                                        <em class="text-muted">{{ $product->domain }}</em>
                                    </div>
                                </td>
                                <td data-label="Pricing">
                                    <div>
                                        <span class="fw-bold">{{ getAmount($product->recurringamount) }} USD</span><br>
                                        <em class="text-muted">{{ $product->billingcycle }}</em>
                                    </div>
                                </td>
                                <td data-label="Registration Date">{{ $product->regdate }}</td>
                                <td data-label="Next Due Date">{{ $product->nextduedate }}</td>
                                <td data-label="Status"><span class="{{ getBadge($product->status) }}">{{ $product->status }}</span></td>
                                <td data-label="Action"><a href="{{ route('user.hosting.details', [$product->pid, encrypt($product->domain)]) }}" class="btn btn--base d-inline-block">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-Hosting-outline"></i></span>
                    <span class="not-data-found__text">No Hosting Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $fakePage->links('admin.partials.paginate') }}

    {{-- orderModal --}}
    <div id="orderModal" class="modal wide-modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="mega-menu-list flex-wrap">
                        <li class="mega-menu-list__item success-item">
                            <a href="{{ route('hosting.budget') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-sharp fa-light fa-server"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Budget Hosting</span>
                                    <p class="mega-menu-list__desc fs-14">Affordable hosting for every need</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item base-item">
                            <a href="{{ route('hosting.premium') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-regular fa-server"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Premium Hosting</span>
                                    <p class="mega-menu-list__desc fs-14">High-Quality hosting with advanced features</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item warning-item">
                            <a href="{{ route('hosting.vps') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-light fa-chart-tree-map"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">VPS Hosting</span>
                                    <p class="mega-menu-list__desc fs-14">Flexible and scalable virtual private servers</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item violet-item">
                            <a href="{{ route('hosting.dedicated') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-duotone fa-server"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Dedicated Server</span>
                                    <p class="mega-menu-list__desc fs-14">Powerful dedicated servers for ultimate performance</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item info-item">
                            <a href="{{ route('hosting.cluster') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-regular fa-network-wired"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Server Cluster</span>
                                    <p class="mega-menu-list__desc fs-14">Robust architecture for load management and performance.</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item danger-item">
                            <a href="{{ route('hosting.smtp') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-regular fa-envelopes-bulk"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">SMTP Server</span>
                                    <p class="mega-menu-list__desc fs-14">Reliable SMTP server setup for seamless email delivery</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
