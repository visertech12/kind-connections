@extends('template.layouts.frontend')
@section('content')

@push('style')
<style>
    ul.fs-18 {
        list-style: disc;
        margin-left: 40px;
    }
</style>
@endpush

<section class="plan-section py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Refund <span class="shape"> Policy </span> </h2>
                    <p class="section-heading__desc">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-md-12">
                <div class="mb-5">
                    <p class="fs-18">We endeavor to make our clients happy with the item they've bought from us. In case you're experiencing difficulty with excellent items or trust it is blemished, or potentially you're feeling baffled, at that point please present a pass to our Helpdesk to report your inadequate item and our team will help you at the earliest opportunity. For a harmed content, augmentation or layout, we will demand from you a connection and add a screen capture of the issue to be shipped off our help administration.</p>
                </div>
                <div class="mb-5">
                    <h3 class="mb-3">Refund Is Not Possible When:</h3>
                    <ul class="fs-18">
                        <li>The framework turns out great on your side yet includes don't match or you may have thought something different. </li>
                        <li>Your necessities are currently modified and you needn't bother with the Script anymore. </li>
                        <li>You end up discovering some other Software which you believe is better. </li>
                        <li>You don't need a site or administration right now. </li>
                        <li>Our highlights don't address your issues and prerequisites or aren't as extensive as you suspected. </li>
                        <li>You don't have such an environment for your worker to run our framework. </li>
                        <li>On the off chance that you as of now download our framework.</li>
                    </ul>
                </div>
                <div class="mb-5">
                    <p class="fs-18">
                        <em class="text-muted fw-bold lead">No returns/refunds will be offered for digital products except if the product you’ve purchased is:</em>
                        <ul class="fs-18">
                            <li>Completely non-functional / not same as demo.</li>
                            <li>If you’ve opened a support ticket but you didn't get any response in 48 hours (2 Business days).</li>
                            <li>The product description was fully misleading.</li>
                        </ul>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="fs-18">
                        <h3 class="mb-3">Please also note that:</h3>
                        <ul class="fs-18">
                            <li>Refunds can take up to 45 days (depends on Bank and payment Methods) to reflect in your account.</li>
                            <li>We normally charge 20% (4% gateway fee + 9% Dispute Fee + 7% Processing Fee) as Refund Processing fee.</li>
                            <li>You can cancel your account at any time; no refunds for cancellation.</li>
                            <li>You will be unable to download or use the item when you claim for refund.</li>
                            <li>If you have been downloaded items then no refund allowed.</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
