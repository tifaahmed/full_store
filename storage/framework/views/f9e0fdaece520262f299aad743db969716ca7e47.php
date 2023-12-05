 
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.change_password')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.change_password')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
    </div>
</section>
<!-- breadcrumb end -->
<!-- Change Password section end -->
<section class="bg-light mt-0 py-5  pull-section-up">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3"><?php echo e(trans('labels.change_password')); ?></h2>
                        <form action="<?php echo e(URL::to($storeinfo->slug . '/change_password/')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.current_password')); ?> <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="current_password" id="validationDefault" value="" placeholder="<?php echo e(trans('labels.current_password')); ?> "  required>
                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.new_password')); ?><span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="new_password" id="validationDefault" value="" placeholder="<?php echo e(trans('labels.new_password')); ?>"  required>
                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.confirm_password')); ?><span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="confirm_password" id="validationDefault" value="" placeholder="<?php echo e(trans('labels.confirm_password')); ?>" required>
                                    <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn-primary rounded-3 mobile-viwe-btn"><?php echo e(trans('labels.save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- Change Password section end -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2"><?php echo e(trans('labels.account_menu')); ?></span>
</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/front/change-password.blade.php ENDPATH**/ ?>