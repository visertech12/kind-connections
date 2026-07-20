
<?php $__env->startSection('panel'); ?>
    <?php
        $statusType = getType($invoice->status);
        if ($statusType == 'integer') {
            $invoiceID = $invoice->invid;
            $invoiceType = 'system_invoice';
            $totalAmount = $invoice->amount;
            $remainAmount = $invoice->amount - $invoice->paid;
        } else {
            $invoiceID = $invoice->invoiceid;
            $invoiceType = 'whmcs_invoice';
            $totalAmount = $invoice->balance;
            $remainAmount = $invoice->balance;
        }
        $totalPaid = 0;
    ?>

    <div class="row gy-4">
        <div class="col-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <div class="card-header__left d-flex flex-wrap align-items-center gap-2">
                        <h2 class="card-header__title"> <span class="icon"><i class="icon-Invoice-outline"></i></span> Invoice#<?php echo e($invoiceID); ?> </h2>
                        <?php echo printInvoiceStatus($invoice->status); ?>

                    </div>
                    <div class="card-header__buttons d-flex flex-wrap align-items-center gap-2">
                        <a href="<?php echo e(route('user.invoice.download', $invoiceID)); ?>" class="btn btn--secondary outline"><span class="fa-icon me-2"><i class="fa-regular fa-download"></i></span> Download</a>
                        <?php if($invoice->status == 0 || $invoice->status == 2 || $invoice->status == 'Unpaid'): ?>
                            <button type="button" class="btn btn--success outline" data-bs-toggle="modal" data-bs-target="#paymentModal"> <span class="fa-icon me-2"><i class="fa-regular fa-credit-card"></i></span> Make Payment</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body overflow-x-auto">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th class="text-start">Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label="Sl#"><?php echo e($loop->iteration); ?></td>
                                    <td data-label="Description" class="text-start"><?php echo nl2br(@$item->description); ?></td>
                                    <td data-label="Amount" class="text-right">$<?php echo e($item->amount); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3">Total : $<?php echo e($totalAmount); ?> USD</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if($trxs && count($trxs)): ?>
            <div class="col-12">
                <div class="custom--card h-auto card">
                    <div class="card-header">
                        <h2 class="card-header__title">Transactions</h2>
                    </div>
                    <div class="card-body overflow-x-auto">
                        <table class="table invoice-table">
                            <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Trx#</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $totalPaid += $trx->amountin;
                                        if (@$trx->amountout > 0) {
                                            $totalPaid -= $trx->amountout;
                                        }
                                    ?>
                                    <tr>
                                        <td data-label="Sl#"><?php echo e($k + 1); ?></td>
                                        <td data-label="Date"><?php echo e(showDateTime($trx->date, 'Y-m-d')); ?></td>
                                        <td data-label="Description"><?php echo e($trx->description); ?></td>
                                        <td data-label="Trx#"><?php echo e($trx->transid); ?></td>
                                        <td data-label="Amount" class="fw-bold">
                                            <?php if(@$trx->amountout > 0): ?>
                                                - $<?php echo e($trx->amountout); ?>

                                            <?php else: ?>
                                                $<?php echo e($trx->amountin); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="5">Total Paid: <?php echo e($totalPaid); ?> USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Pay Now</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" class="invoicePayment">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form--label">Select Gateway:</label>
                            <select name="gateway" class="form-control form-select form-control-lg selectGateway" required>
                                <option value="">--Select One--</option>
                                <option value="balance" data-route="<?php echo e(route('user.invoice.pay')); ?>"> Account Balance (Available: <?php echo e(getamount($user->balance)); ?> USD)</option>
                                <?php $__currentLoopData = $gatewayCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gateway->method_code); ?>" data-min_amount="<?php echo e($gateway->min_amount); ?>" data-max_amount="<?php echo e($gateway->max_amount); ?>" data-route="<?php echo e(route('user.deposit.insert')); ?>"><?php echo e($gateway->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group amountdiv d-none">
                            <label for="amount" class="form--label">Enter Amount:</label>
                            <div class="input-group">
                                <input type="number" step="any" id="amount" name="amount" class="form-control form--control" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" value="<?php echo e(getAmount($remainAmount)); ?>" required>
                                <div class="input-group-text">USD</div>
                            </div>
                        </div>
                        <?php if($invoiceType == 'system_invoice' && @$invoice->invoice_for == ''): ?>
                            <input type="hidden" name="payload" value="<?php echo e(encrypt($invoiceType . '|' . $invoiceID . '|' . $totalAmount . '|0|' . getAmount($invoice->amount - $invoice->paid))); ?>">
                        <?php else: ?>
                            <input type="hidden" name="payload" value="<?php echo e(encrypt($invoiceType . '|' . $invoiceID . '|' . $totalAmount . '|1')); ?>">
                        <?php endif; ?>
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
    <?php if($invoiceType == 'system_invoice' && @$invoice->invoice_for == ''): ?>
        <script>
            $('.amountdiv').removeClass('d-none');
        </script>
    <?php endif; ?>
    <script>
        $('.selectGateway').on('change', function() {
            var route = $(this).find(':selected').attr('data-route');
            $('.invoicePayment').attr('action', route);
        });
        var route = $('.selectGateway').find(':selected').attr('data-route');
        $('.invoicePayment').attr('action', route);


        $('#gateway').change(function() {
            var minAmo = $(this).find("option:selected").data("min_amount");
            var maxAmo = $(this).find("option:selected").data("max_amount");

            $('#amount').attr('min', minAmo);
            $('#amount').attr('max', maxAmo);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/invoice/details.blade.php ENDPATH**/ ?>