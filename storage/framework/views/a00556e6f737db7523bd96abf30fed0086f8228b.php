<?php $__env->startSection('content'); ?>

<main>

    <section>

        <div class="row">

            <div class="col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0 px-0">

                <div class="row categories-left-side position-relative">





                    <?php if(count($bannerimage) > 0): ?>

                    <div class="col py-3">

                        <div class="owl-carousel theme-3bannerslider owl-theme">



                            <?php $__currentLoopData = $bannerimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="item">

                                <div class="overflow-hidden rounded-3">

                                    <img src="<?php echo e(helper::image_path($image->banner_image)); ?>" alt="" class="rounded-3">

                                </div>

                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </div>

                    </div>

                    <?php endif; ?>





                    <div class="row p-0">

                       
                        <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>

                        <?php echo $__env->make('front.template-3.theme-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php else: ?>

                        <?php echo $__env->make('front.template-3.theme-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>



                    </div>



                    <div class="scrollToTopBtn_main col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0">
                        <p data-bs-target="#offcanvasExample" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasExample" class="browse_menu_btn gap-1">
                            <i class="fa-solid fa-utensils"></i>
                            <span>Browse Menu</span>
                        </p>
                    </div>

                </div>


            </div>

            <div class="col-md-12 col-lg-7 col-xl-7 px-0 theme-3-header-position">

                <?php echo $__env->make('front.template-3.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>




        </div>

    </section>

</main>





<!-- Categories Offcanvas Theme-3 Start -->



<div class="offcanvas <?php echo e(session()->get('direction') == 2 ? 'offcanvas-end' : 'offcanvas-start'); ?> categoriesoffcanvastheme-4" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-header border-bottom border-dark bg-light">

        <p class="title pb-1 fs-5 offcanvas-title text-center m-auto fw-600" id="offcanvasExampleLabel"><?php echo e(trans('labels.categories')); ?></p>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

    </div>

    <div class="offcanvas-body p-0">

        <ul class="list-group theme-4-categories-list">



            <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



            <?php

            $check_cat_count = 0;

            ?>



            <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($category->id == $item->cat_id): ?>

            <?php

            $check_cat_count++;

            ?>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <?php if($check_cat_count > 0): ?>

            <li class="list-group-item" data-bs-dismiss="offcanvas">

                <a href="#<?php echo e($category->slug); ?>">
                    <div class="d-flex align-items-center gap-2">
                        <img src="<?php echo e(helper::image_path($category->image)); ?>" alt="" class="rounded-circle categories_imgbox">
                        <p><?php echo e($category->name); ?></p>
                    </div>

                    <div class="d-flex align-items-center">

                        <span><?php echo e($check_cat_count); ?></span>

                        <i class="fa-solid <?php echo e(session()->get('direction') == 2 ? 'fa-angle-left' : 'fa-angle-right'); ?>"></i>

                    </div>

                </a>

            </li>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </ul>

    </div>

</div>



<!-- Categories Offcanvas Theme-3 End -->





<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>



<script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/theme-3header.js')); ?>"></script>

<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/front/template-3/category.blade.php ENDPATH**/ ?>