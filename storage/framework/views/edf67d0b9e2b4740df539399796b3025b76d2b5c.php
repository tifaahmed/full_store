

<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->

<div class="breadcrumb-sec desk-only">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.about_us')); ?></h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item">

                    <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('labels.home')); ?></a>

                </li>

                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.about_us')); ?></li>

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

<!-- About Us Section Start -->

<section class="theme-1-margin-top  pull-section-up">

    <div class="container">

        <div class="details row">

            

            <?php if(!empty($aboutus->about_content)): ?>

                <div class="cms-section my-3">



                    <?php echo $aboutus->about_content; ?>




                </div>

            <?php else: ?>

                <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>

        </div>

    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>

<!-- About Us Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/about.blade.php ENDPATH**/ ?>