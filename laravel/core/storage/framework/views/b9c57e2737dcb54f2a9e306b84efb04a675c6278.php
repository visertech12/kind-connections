
<?php $__env->startSection('panel'); ?>
    <div class="row gy-4">
        <div class="col-md-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Your Profile</h2>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">First Name</h6>
                                <p class="information-item__text"><?php echo e($user->firstname); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Last Name</h6>
                                <p class="information-item__text"><?php echo e($user->lastname); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Email</h6>
                                <p class="information-item__text"><?php echo e($user->email); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Mobile</h6>
                                <p class="information-item__text">+<?php echo e($user->country_code); ?><?php echo e($user->mobile); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Address</h6>
                                <p class="information-item__text"><?php echo e(@$user->address->address); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">City</h6>
                                <p class="information-item__text"><?php echo e(@$user->address->city); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">State</h6>
                                <p class="information-item__text"><?php echo e(@$user->address->state); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Postcode/Zip</h6>
                                <p class="information-item__text"><?php echo e(@$user->address->zip); ?> </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Country</h6>
                                <p class="information-item__text"><?php echo e(@$user->address->country); ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="custom--card card h-auto mb-3">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Update Profile</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('user.profile')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form--label">First Name</label>
                                    <input type="text" class="form--control" id="firstname" name="firstname" value="<?php echo e($user->firstname); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="form--label">Last Name</label>
                                    <input type="text" class="form--control" id="lastname" name="lastname" value="<?php echo e($user->lastname); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mkt_mail" class="form--label"> Email Preference</label>
                                    <select id="mkt_mail" name="mkt_mail" class="form-select form--control">
                                        <option value="1" <?php if($user->mkt_mail == 1): ?> selected <?php endif; ?>>I am okay with promo emails from <?php echo e(gs('site_name')); ?></option>
                                        <option value="0" <?php if($user->mkt_mail == 0): ?> selected <?php endif; ?>>Please do not send any promo email.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Change Password</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('user.password')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password" class="form--label">Old Password</label>
                                    <input type="password" class="form--control" id="current_password" name="current_password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form--label">New Password</label>
                                    <input type="password" class="form--control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form--label">Confirm Password</label>
                                    <input type="password" class="form--control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/setting.blade.php ENDPATH**/ ?>