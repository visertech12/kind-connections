@extends('user.layouts.app')
@section('panel')

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-megaphone-2"></i></span> Marketing Orders </h2>
            </div>
            <button type="button" class="btn btn--success outline" data-bs-toggle="modal" data-bs-target="#orderModal"> <span class="icon"><i class="icon-add"></i></span> Order Now</button>
        </div>
        <div class="table-card__table">
            @if ($orders->count())
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Service Type</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td data-label="Service">{{ ucfirst(@$order->details->type) }}</td>
                                <td data-label="Amount">${{ getAmount($order->amount) }} USD</td>
                                <td data-label="Payment Status">{!! printInvoiceStatus($order->invoice->status) !!}</td>
                                <td data-label="Order Status">{!! printMktOrderStatus($order->order_status) !!}</td>
                                <td data-label="Action"><a href="{{ route('user.marketing.details', encrypt($order->id)) }}" class="btn btn--base d-inline-block">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="not-data-found">
                    <span class="not-data-found__icon">
                        <i class="icon-megaphone-2"></i>
                    </span>
                    <span class="not-data-found__text">No Orders Yet!</span>
                </div>
            @endif
        </div>
    </div>

    {{ $orders->links('admin.partials.paginate') }}

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
                            <a href="{{ route('marketing.backlink') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-solid fa-link-simple"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Back Link</span>
                                    <p class="mega-menu-list__desc fs-14">Boost your online presence with back links</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item base-item">
                            <a href="{{ route('marketing.linkpyramid') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-duotone fa-link"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title">Link Pyramid</span>
                                    <p class="mega-menu-list__desc fs-14">Elevate your SEO strategy with link pyramids</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item info-item">
                            <a href="{{ route('marketing.pr') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-duotone fa-newspaper"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title"> Press Release</span>
                                    <p class="mega-menu-list__desc fs-14">Expand your reach through strategic press releases</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item" data-color="#ff793f">
                            <a href="{{ route('marketing.advertising') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-solid fa-rectangle-ad"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title"> Advertising</span>
                                    <p class="mega-menu-list__desc fs-14">Targeted campaigns for effective customer engagement</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item violet-item">
                            <a href="{{ route('marketing.branding') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-light fa-swatchbook"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title"> Branding</span>
                                    <p class="mega-menu-list__desc fs-14">Create a strong and memorable brand identity</p>
                                </div>
                            </a>
                        </li>
                        <li class="mega-menu-list__item" data-color="#009432">
                            <a href="{{ route('marketing.seo') }}" class="mega-menu-list__link flex-wrap">
                                <span class="mega-menu-list__icon flex-center fs-15">
                                    <i class="fa-brands fa-searchengin"></i>
                                </span>
                                <div class="mega-menu-list__content">
                                    <span class="mega-menu-list__title"> Seo Service</span>
                                    <p class="mega-menu-list__desc fs-14">Comprehensive search engine optimization services</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
