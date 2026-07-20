<?php $__env->startSection('panel'); ?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="custom--card card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h2 class="card-header__title"><?php echo e(__($pageTitle)); ?></h2>
                <a href="<?php echo e(route('user.ticket.index')); ?>" class="btn btn-sm btn--danger">
                    <i class="fa fa-reply"></i> <?php echo app('translator')->get('My Tickets'); ?>
                </a>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('user.ticket.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="subject" class="form--label"><?php echo app('translator')->get('Subject'); ?></label>
                                <input type="text" name="subject" id="subject" class="form--control" placeholder="<?php echo app('translator')->get('In a few words, tell us what your enquiry is about'); ?>" value="<?php echo e(old('subject')); ?>" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="priority" class="form--label"> <?php echo app('translator')->get('Priority'); ?></label>
                                <select id="priority" name="priority" class="from-select form--control">
                                    <option value="Low"><?php echo app('translator')->get('Low'); ?></option>
                                    <option value="Medium"><?php echo app('translator')->get('Medium'); ?></option>
                                    <option value="High"><?php echo app('translator')->get('High'); ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <label for="message" class="form--label"> <?php echo app('translator')->get('Message'); ?></label>
                                <textarea id="message" name="message" class="form--control" rows="6" placeholder="<?php echo app('translator')->get('Provide a detailed description'); ?>" required><?php echo e(old('message')); ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 mt-3 d-flex justify-content-between flex-wrap mb-3 gap-2">
                            <div>
                                <h6 class="m-0"><?php echo app('translator')->get('Attachments'); ?> <span class="text-muted">(<?php echo app('translator')->get('optional'); ?>)</span></h6>
                                <small class="text--warning"> <?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>, .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?>  </small>
                            </div>
                            <div class="card-header__buttons">
                                <a href="javascript:void(0)" class="btn btn--base outline addFile"> <i class="fas fa-plus me-2"></i> <?php echo app('translator')->get('Add Attachment'); ?> </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group file-upload">
                                <input type="file" name="attachments[]" id="inputAttachments" class="form-control form--control mb-2" />
                                <div id="fileUploadsContainer"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            var fileAdded = 0;
            $('.addFile').on('click',function(){
                if (fileAdded >= 4) {
                    notify('error','You\'ve added maximum number of file');
                    return false;
                }
                fileAdded++;
                $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control form--control" required />
                        <button class="input-group-text btn-danger remove-btn"><i class="las la-times"></i></button>
                    </div>
                `)
            });
            $(document).on('click','.remove-btn',function(){
                fileAdded--;
                $(this).closest('.input-group').remove();
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/support/create.blade.php ENDPATH**/ ?>