<div class="dashboard-header">
    <div class="dashboard-header__inner flex-between">
        <div class="dashboard-header__left">
            <h1 class="dashboard-header__grettings mb-0">Welcome, <?php echo e(auth()->user()->firstname); ?>!</h1>
        </div>
        <div class="dashboard-header__right d-flex flex-wrap align-items-center justify-content-between">
            <ul class="button-list flex-align">
                <li class="button-list__item"><a href="<?php echo e(route('user.ticket.new')); ?>" class="btn btn--base outline"> <span class="icon"><i class="icon-Profile"></i></span>  Get Support</a></li>
                <li class="button-list__item d-none d-lg-flex"> <a href="<?php echo e(route('user.logout')); ?>" class="btn btn--logout"> <span class="icon"><i class="icon-Logout"></i></span> Logout</a></li>
            </ul>
            <div class="dashboard-bar d-lg-none d-block">
                <span class="dashboard-bar__icon"><i class="far fa-bars"></i></span>
            </div> 
        </div>
    </div>
</div> <?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/partials/topbar.blade.php ENDPATH**/ ?>