@extends('user.layouts.app')
@section('panel')
    <div class="row gy-4">
        <div class="col-md-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h3 class="card-header__title">Hosting Details</h3>
                </div>
                <div class="card-body">
                    <div class="row gy-3">

                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Host/Domain Name </h6>
                                <p class="information-item__text"> {{ $productDetails->domain }}</p>
                            </div>
                        </div>

                        @if (@$productDetails->dedicatedip)
                            <div class="col-md-3 col-sm-6">
                                <div class="information-item">
                                    <h6 class="information-item__title"> Dedicated/Main IP</h6>
                                    <p class="information-item__text"> {{ $productDetails->dedicatedip }}</p>
                                </div>
                            </div>
                        @endif

                        @if (@$productDetails->serverip)
                            <div class="col-md-3 col-sm-6">
                                <div class="information-item">
                                    <h6 class="information-item__title"> Main Shared IP</h6>
                                    <p class="information-item__text"> {{ $productDetails->serverip }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Additional IPs </h6>
                                <p class="information-item__text">
                                    @if ($productDetails->assignedips)
                                        {{ $productDetails->assignedips }}
                                    @else
                                        none
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Username </h6>
                                <p class="information-item__text"> {{ $productDetails->username }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Password </h6>
                                <p class="information-item__text">
                                    <span class="d-none hide">{{ $productDetails->password }}</span>
                                    <button type="button" class="show badge badge--primary">show</button>
                                    <button type="button" class="d-none hide badge badge--dark">hide</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h3 class="card-header__title">Billing Details</h3>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Services Name </h6>
                                <p class="information-item__text"> {{ $productDetails->groupname }} - {{ $productDetails->name }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Registration Date </h6>
                                <p class="information-item__text"> {{ $productDetails->regdate }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Renewal Date </h6>
                                <p class="information-item__text"> {{ $productDetails->nextduedate }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Recurring Amount</h6>
                                <p class="information-item__text"> ${{ $productDetails->recurringamount }} USD {{ $productDetails->billingcycle }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title"> Status </h6>
                                <p class="information-item__text d-flex flex-wrap gap-2 justify-content-between">
                                    <span class="{{ getBadge($productDetails->status) }}">{{ $productDetails->status }}</span>
                                    @if ($productDetails->status == 'Active')
                                        <button type="button" class="btn btn--secondary outline" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel Service</button>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Service Cancellation Request</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.hosting.cancel') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ encrypt($productDetails->id) }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <select id="type" name="type" class="form-select form-control" required>
                                <option value=""> Select Cancellation Type </option>
                                <option value="Immediate"> Immediate </option>
                                <option value="End of Billing Period"> End of Billing Period </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="reason" class="form-control" placeholder="Briefly Describe your reason for Cancellation" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary btn--md" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn--primary btn--md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            "use strict";
            $('.hide').on('click', function(e) {
                $(".show").removeClass("d-none");
                $(".hide").addClass("d-none");
            });
            $('.show').on('click', function(e) {
                $(".hide").removeClass("d-none");
                $(".show").addClass("d-none");
            });
        });
    </script>
@endpush
@push('style')
    <style>
        .badge::before {
            display: none;
        }

        .badge {
            padding: 8px 10px;
            font-size: 1rem;
        }
    </style>
@endpush
