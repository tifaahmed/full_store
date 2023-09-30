<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.table_book')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.table_book')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end -->
<!-- contact section start -->
<section class="mt-3">
    <div class="container">
        <div class="row contact-form">
            <div class="col-lg-12 col-sm-12 col-auto mb-4 mb-lg-0">
                <div class="card shadow rounded-5 h-100 select-delivery py-3 px-2">
                    <div class="card-body">
                        <form action="<?php echo e(URL::To(@$storeinfo->slug.'/book')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <h2 class="page-title mb-1 px-2"> <?php echo e(trans('labels.table_book')); ?></h2>
                                <p class="page-subtitle px-2 mb-3 md-mb-5">
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.event')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="event" placeholder="<?php echo e(trans('labels.event')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.people')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="people" placeholder="<?php echo e(trans('labels.people')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.event_date')); ?><span class="text-danger"> * </span></label>
                                    <input type="date" class="form-control input-h" name="event_date" placeholder="<?php echo e(trans('labels.event_date')); ?>" min="<?php echo e(date('Y-m-d')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.event_time')); ?><span class="text-danger"> * </span></label>
                                    <input type="time" class="form-control input-h" name="event_time" placeholder="<?php echo e(trans('labels.event_time')); ?>" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="name" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                    <input type="hidden" name="vendor_id" value="<?php echo e($storeinfo->id); ?>">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
                                    <input type="number" class="form-control input-h" name="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label"><?php echo e(trans('labels.special_request')); ?></label>
                                    <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="notes" placeholder="<?php echo e(trans('labels.special_request')); ?>" ></textarea>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn-primary mobile-viwe-btn"><?php echo e(trans('labels.submit')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<!-- contact section start -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/full_store/resources/views/front/tablebook.blade.php ENDPATH**/ ?>