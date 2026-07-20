<?php $__env->startSection('panel'); ?>

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-Domain-outline"></i></span> My Support Tickets </h2>
    </div> 
    <a href="<?php echo e(route('user.ticket.new')); ?>" class="btn btn--success outline"> <span class="icon"><i class="icon-add"></i></span> New Ticket</a>
  </div>
  <div class="table-card__table">
    <?php if($ticketCount && $tickets): ?>
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>Ticket</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Last Response</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td data-label="Ticket">#<?php echo e($ticket->ticket); ?></td>
          <td data-label="Subject"><?php echo e(strLimit($ticket->subject,50)); ?></td>
          <td data-label="Status"><?php echo $ticket->statusBadge; ?></td>
          <td data-label="Last Response"><?php echo e(diffForHumans($ticket->last_reply)); ?></td>
          <td data-label="Details">
            <a href="<?php echo e(route('user.ticket.details',$ticket->ticket)); ?>" class="btn btn--base d-inline-block">Details</a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php else: ?>
    <div class="not-data-found">
      <span class="not-data-found__icon"><i class="icon-Profile"></i></span>
      <span class="not-data-found__text">No Support Ticket Yet!</span>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php echo e($fakePage->links('admin.partials.paginate')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/support/index.blade.php ENDPATH**/ ?>