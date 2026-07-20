<?php $__env->startSection('panel'); ?>

    <div class="alert-item-wrapper">

        <?php if($invoicePending): ?>
            <div class="alert-item">
                <div class="alert flex-align alert--danger" role="alert">
                    <span class="alert__icon"><i class="icon-Warning"></i></span>
                    <div class="alert__content">
                        <span class="alert__title fs-16">You Have Outstanding Invoice</span>
                        <p class="alert__desc">Pay them as soon as possible for peace of mind and to avoid any interruption of service. <a href="<?php echo e(route('user.invoice.list')); ?>" class="alert__link text--base fw-semibold">View Invoices</a> </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($renewEnvatoSupport): ?>
            <div class="alert-item">
                <div class="alert flex-align alert--warning" role="alert">
                    <span class="alert__icon"><i class="icon-Warning"></i></span>
                    <div class="alert__content">
                        <span class="alert__title fs-16">Support Expired for Envato Purchase</span>
                        <p class="alert__desc">Renew support as soon as possible for peace of mind and to get support from us! <a href="<?php echo e(route('user.direct.purchases')); ?>" class="alert__link text--base fw-semibold">View Purchases</a> </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($renewDirectSupport): ?>
            <div class="alert-item">
                <div class="alert flex-align alert--warning" role="alert">
                    <span class="alert__icon"><i class="icon-Warning"></i></span>
                    <div class="alert__content">
                        <span class="alert__title fs-16">Support Expired for Direct Purchase</span>
                        <p class="alert__desc">Renew support as soon as possible for peace of mind and to get support from us! <a href="<?php echo e(route('user.direct.purchases')); ?>" class="alert__link text--base fw-semibold">View Direct Purchases</a> </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>


    <?php if($activeTicket): ?>
        <div class="table-card">
            <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
                <div class="table-card__heading">
                    <h2 class="table-card__title"> <span class="icon"><i class="icon-Profile"></i></span> Active Support Tickets </h2>
                </div>
                <a href="<?php echo e(route('user.ticket.index')); ?>" class="btn btn--base outline"> <span class="icon"><i class="fas fa-list"></i></span> View All</a>
            </div>
            <div class="table-card__table">
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Ticket</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Last Response</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ticket->status != 'Closed'): ?>
                                <tr>
                                    <td data-label="Department"><span class="fw-bold"><?php echo e($ticket->deptname); ?></span></td>
                                    <td data-label="Ticket">#<?php echo e($ticket->tid); ?></td>
                                    <td data-label="Subject"><?php echo e(shortDescription($ticket->subject, 50)); ?></td>
                                    <td data-label="Status"><span class="<?php echo e(getBadge($ticket->status)); ?>"><?php echo e($ticket->status); ?></span></td>
                                    <td data-label="Last Response"><?php echo e(diffForHumans($ticket->lastreply)); ?></td>
                                    <td data-label="Details">
                                        <a href="<?php echo e(route('user.ticket.details', $ticket->tid)); ?>" class="btn btn--base d-inline-block">Details</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <div class="dashboard-card-wrapper">
	<div class="row gy-md-4 gy-3">
		<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
			<div class="dashboard-card highlited-card flex-between">
				<a href="javascript:void(0)" class="dashboard-card__link"></a>
				<div class="dashboard-card__inner flex-align">
					<span class="dashboard-card__icon flex-center">
						<i class="icon-money-1"></i>                   
					</span>
					<span class="dashboard-card__big-icon">
						<i class="icon-money-1"></i>                   
					</span>
					<div class="dashboard-card__content">
						<span class="dashboard-card__text">Balance</span>
						<h2 class="dashboard-card__number">$<?php echo e(number_format($user->balance, 2)); ?> USD</h2>
					</div>
				</div>
				<button type="button" class="dashboard-card__button deposite-btn flex-center" data-bs-toggle="modal" data-bs-target="#depositModal"><i class="icon-add"></i></button>
			</div>
		</div>
            
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="https://viserlab.com/user/envato/purchases" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-envato-new"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-envato-new"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Envato Purchases</span>
                            <h2 class="dashboard-card__number">0</h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.direct.purchases')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-Direct-purchase-fill"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-Direct-purchase-fill"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Direct Purchases</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['direct']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.marketing.orders')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-megaphone-1"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-megaphone-1"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Marketing Orders</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['mktorder']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.domain.list')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-domain"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-domain"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Domains</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['domain']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.hosting.list')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-servers"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-servers"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Hosting</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['hosting']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            

            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.invoice.list')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-invoice"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-invoice"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Invoices</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['invoice']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-msm-6">
                <div class="dashboard-card flex-between">
                    <a href="<?php echo e(route('user.report.transactions')); ?>" class="dashboard-card__link"></a>
                    <div class="dashboard-card__inner flex-align">
                        <span class="dashboard-card__icon flex-center">
                            <i class="icon-transaction"></i>
                        </span>
                        <span class="dashboard-card__big-icon">
                            <i class="icon-transaction"></i>
                        </span>
                        <div class="dashboard-card__content">
                            <span class="dashboard-card__text">Transactions</span>
                            <h2 class="dashboard-card__number"><?php echo e($stat['transaction']); ?></h2>
                        </div>
                    </div>
                    <a href="" class="dashboard-card__button"><i class="far fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-wrapper">
        <div class="row gy-md-4 gy-3">
            <div class="col-xxl-4">
                <div class="custom--card card">
                    <div class="card-header">
                        <h2 class="card-header__title">Latest Transactions</h2>
                    </div>
                    <div class="card-body">
                        <?php if($transactions->count()): ?>
                            <ul class="transaction-list">
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="transaction-list__item flex-between <?php if($trx->trx_type == '+'): ?> success <?php else: ?> danger <?php endif; ?>">
                                        <div class="transaction-list__left flex-align">
                                            <div class="transaction-list__date">
                                                <span class="transaction-list__date-number"><?php echo e(showDatetime($trx->created_at, 'd')); ?></span>
                                                <span class="transaction-list__date-text fs-14"><?php echo e(strtoupper(showDatetime($trx->created_at, 'M'))); ?></span>
                                            </div>
                                            <div class="transaction-list__content">
                                                <h6 class="transaction-list__title">#<?php echo e($trx->trx); ?></h6>
                                                <p class="transaction-list__desc fs-14"><?php echo e($trx->details); ?></p>
                                            </div>
                                        </div>
                                        <div class="transaction-list__right">
                                            <span class="transaction-list__amount fs-16"><?php echo e($trx->trx_type); ?> $<?php echo e(getAmount($trx->amount)); ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <div class="not-data-found">
                                <span class="not-data-found__icon"><i class="icon-transaction"></i></span>
                                <span class="not-data-found__text">No Transaction Yet!</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="custom--card card">
                    <div class="card-header">
                        <h2 class="card-header__title">Latest Logins</h2>
                    </div>
                    <div class="card-body">
                        <?php if($logins->count()): ?>
                            <ul class="card-history">
                                <?php $__currentLoopData = $logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="card-history__item flex-between">
                                        <div class="card-history__inner flex-center">
                                            <span class="card-history__icon flex-center"><i class="<?php echo e(getOSIcon($login->os)); ?>"></i></span>
                                            <div class="card-history__content">
                                                <h6 class="card-history__title fs-16"><?php echo e($login->browser); ?> on <?php echo e($login->os); ?></h6>
                                                <p class="card-history__desc fs-14"><?php echo e($login->city); ?> <?php echo e($login->country); ?></p>
                                            </div>
                                        </div>
                                        <span class="card-history__right-text fs-16"><?php echo e(diffForHumans($login->created_at)); ?></span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <div class="not-data-found">
                                <span class="not-data-found__icon"><i class="icon-Logout"></i></span>
                                <span class="not-data-found__text">No Login Yet!</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="custom--card card">
                    <div class="card-header">
                        <h2 class="card-header__title">Latest Purchases</h2>
                    </div>
                    <div class="card-body">
                        <?php if($latestPurchase->count()): ?>
                            <ul class="card-history">
                                <?php $__currentLoopData = $latestPurchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $productItem = $purchase->items->first(function($item) {
                                            return strpos($item->description, 'Extended Support') === false;
                                        });
                                        $productName = $productItem ? $productItem->description : 'N/A';
                                        $details = $productItem ? json_decode($productItem->details, true) : [];
                                        $product = isset($details['product_id']) ? App\Models\Product::find($details['product_id']) : null;
                                        $hasExtendedSupport = $purchase->items->contains('description', 'Extended Support (6 months)');
                                        $supportMonths = $hasExtendedSupport ? 12 : 6;
                                        $supportedUntil = \Carbon\Carbon::parse($purchase->created_at)->addMonths($supportMonths);
                                        $isExpired = $supportedUntil->isPast();
                                    ?>
                                    <li class="card-history__item flex-between">
                                        <div class="card-history__inner flex-center">
                                            <span class="card-history__icon bg--base-two">
                                                <img src="<?php echo e(asset('assets/images/products/' . @$product->icon)); ?>" alt="" loading="lazy">
                                            </span>
                                            <div class="card-history__content">
                                                <h6 class="card-history__title fs-16"><?php echo e($productName); ?></h6>
                                                <p class="card-history__desc fs-14">#<?php echo e($purchase->invid); ?></p>
                                            </div>
                                        </div>
                                        <div class="card-history__right">
                                            <?php if($isExpired): ?>
                                                <span class="badge badge--danger">Support Expired</span>
                                            <?php else: ?>
                                                <span class="card-history__right-text fs-14">Support until</span>
                                                <span class="card-history__right-time fs-14"><?php echo e(showDateTime($supportedUntil, 'Y-m-d')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <div class="not-data-found">
                                <span class="not-data-found__icon"><i class="icon-envato"></i></span>
                                <span class="not-data-found__text">No Purchase Yet!</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="depositModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Deposit Now</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('user.deposit.insert')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="gateway" class="form--label">Select Gateway:</label>
                            <select id="gateway" name="gateway" class="form-select form--control" required>
                                <option value="">--Select One--</option>
                                <?php $__currentLoopData = $gatewayCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gateway->method_code); ?>" data-min_amount="<?php echo e($gateway->min_amount); ?>" data-max_amount="<?php echo e($gateway->max_amount); ?>"><?php echo e($gateway->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="form--label">Enter Amount:</label>
                            <div class="input-group">
                                <input type="number" step="any" id="amount" name="amount" class="form--control form-control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                                <div class="input-group-text">USD</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary btn--md" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn--primary btn--md">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#gateway').change(function() {
            var minAmo = $(this).find("option:selected").data("min_amount");
            var maxAmo = $(this).find("option:selected").data("max_amount");

            $('#amount').attr('min', minAmo);
            $('#amount').attr('max', maxAmo);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/dashboard.blade.php ENDPATH**/ ?>