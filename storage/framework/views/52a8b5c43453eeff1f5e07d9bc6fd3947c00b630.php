

<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->

<div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.terms')); ?></h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('labels.home')); ?></a></li>

                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.terms')); ?></li>

            </ol>

        </nav>

    </div>

</div>

<!-- breadcrumb end -->

<!-- terms-and-condition section start -->



<?php if($terms != null): ?>

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            <?php echo @$terms->terms_content; ?>


        </div>

    </div>

</section>

<?php else: ?>

    <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<!-- terms-and-condition section end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/front/terms_and_condition.blade.php ENDPATH**/ ?>