
<?php $__env->startSection('content'); ?>
    <div class="d-none">
    </div>
    <?php if(count(helper::footer_features(@$storeinfo->id)) > 0 ||
            (count($getcategory) > 0 && count($getitem) > 0) ||
            count($bannerimage) > 0 ||
            count($blogs) > 0): ?>
        <main>
            <section>
                <div class="row">
                    <div class="col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0 position-relative categories-left-side">
                        <div class="col px-0 py-3" data-bs-toggle="offcanvas" href="#offcanvasinfo" role="button"
                            aria-controls="offcanvasinfo">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-block d-md-flex d-lg-block d-xl-flex align-items-center">
                                        <a href="#" class="theme-3-logo">
                                            <img src="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->logo)); ?>"
                                                alt="" class="rounded-3">
                                        </a>
                                        <div class="w-100">
                                            
                                            <div class="peyment-overflow d-flex">
                                                <div class="theme-3-image-gallery">
                                                    
                                                </div>
                                                <i
                                                    class="fa-solid  <?php echo e(session()->get('direction') == 2 ? 'fa-chevron-left' : 'fa-chevron-right'); ?> d-none d-lg-none d-md-block d-xl-block"></i>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn border mt-4 d-block d-md-none d-lg-block d-xl-none">
                                                    <?php echo e(trans('labels.store_info')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 pb-3">

                            

                            <div class="col-12  sticky-nav horizontal-category-list bg-white et-hero-tabs d-flex">
                                <div class="col-10 col-sm-11">
                                    <div class="et-hero-tabs-container mt-2">
                                        <div id="category_list" class="owl-carousel owl-theme d-flex owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 1737px;">

                                                    
                                                    <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $check_cat_count = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($category->id == $item->cat_id): ?>
                                                                <?php
                                                                    $check_cat_count++;
                                                                ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($check_cat_count > 0): ?>
                                                            <div class="owl-item custom_item"
                                                                style="width: auto; margin-right: 10px;">
                                                                <div class="item" data-count="<?php echo e($key); ?>">
                                                                    <a class="et-hero-tab btn show-category-product key_<?php echo e($key); ?> category_<?php echo e($category->id); ?> <?php if($key == 0): ?>   <?php else: ?> <?php endif; ?>  "
                                                                        data-count="<?php echo e($key); ?>"
                                                                        data-id="category_<?php echo e($category->id); ?>"
                                                                        href="#tab-category_<?php echo e($category->id); ?>"
                                                                        data-order="<?php echo e($key + 1); ?>"
                                                                        style=" border-radius: 20px;"><?php echo e($category->name); ?></a>
                                                                </div>
                                                            </div>










                                                            
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    


                                                </div>
                                            </div>
                                            <div class="owl-nav disabled">
                                                <div class="owl-prev">prev</div>
                                                <div class="owl-next">next</div>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                        

                        <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>

                        <?php echo $__env->make('front.template-3.theme-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php elseif(helper::appdata($storeinfo->id)->template_type == 2): ?>

                        <?php echo $__env->make('front.template-3.theme-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php elseif(helper::appdata($storeinfo->id)->template_type == 3): ?>

                        <?php echo $__env->make('front.template-3.theme-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>

                        

                        </div>



                        <!-- <div class="row categories-left-side">

                    </div> -->

                    </div>
                    <div class="col-md-12 col-lg-7 col-xl-7 px-0 theme-3-header-position">
                        <?php echo $__env->make('front.template-3.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </section>
        </main>
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Store info Offcanvas Theme-3 Start -->
    <div class="offcanvas <?php echo e(session()->get('direction') == 2 ? 'offcanvas-end' : 'offcanvas-start'); ?> categoriesoffcanvastheme-4"
        tabindex="-1" id="offcanvasinfo" aria-labelledby="offcanvasinfo">
        <div class="offcanvas-header border-bottom border-dark bg-light">
            <p class="title pb-1 fs-5 offcanvas-title text-center m-auto fw-600" id="offcanvasExampleLabel">Store Info</p>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="row">
                <div class="col p-3" data-bs-toggle="offcanvas" href="#offcanvasinfo" role="button"
                    aria-controls="offcanvasinfo">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="" class="store-info-logo-img">
                                    <img src="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->logo)); ?>"
                                        alt="" class="rounded-3">
                                </a>
                                <div class="w-100 mx-3">
                                    <h5 class="mb-0 mb-md-2"><?php echo e(@$storeinfo->name); ?></h5>
                                    <div class="row g-2 align-items-center justify-content-between theme-4-contactinfo">
                                        <div class="col col-md-6">
                                            <a href="tel:<?php echo e(helper::appdata($storeinfo->id)->contact); ?>"
                                                class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-phone-volume"></i>
                                                <div class="d-md-block d-none">
                                                    <span class="px-3"> <?php echo e(trans('labels.call_us')); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col col-md-6">
                                            <a href="mailto:<?php echo e(helper::appdata($storeinfo->id)->email); ?>"
                                                class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-envelope"></i>
                                                <div class="d-md-block d-none">
                                                    <span class="px-3"> <?php echo e(trans('labels.email')); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group theme-3-store-infos-list">
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="https://www.google.com/maps/place/323/<?php echo e(helper::appdata($storeinfo->id)->address); ?>">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="w-100">
                        <p class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                            <?php echo e(helper::appdata($storeinfo->id)->address); ?></p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="tel:<?php echo e(helper::appdata($storeinfo->id)->contact); ?>">
                    <i class="fa-solid fa-headphones"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center"><?php echo e(trans('labels.call_us')); ?>

                        <p>
                            +<?php echo e(helper::appdata($storeinfo->id)->contact); ?>

                        </p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="mailto:<?php echo e(helper::appdata($storeinfo->id)->email); ?>">
                    <i class="fa-regular fa-envelope"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                        <?php echo e(trans('labels.email')); ?>

                        <p>
                            <?php echo e(helper::appdata($storeinfo->id)->email); ?>

                        </p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2" href="#"
                    data-bs-toggle="modal" data-bs-target="#examplehours" data-bs-whatever="@mdo">
                    <i class="fa-regular fa-circle-question"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                        <p href="#" data-bs-toggle="modal" data-bs-target="#examplehours" data-bs-whatever="@mdo">
                            <?php echo e(trans('labels.working_hours')); ?>

                        </p>
                    </span>
                </a>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                    <?php

                        if ($storeinfo->allow_without_subscription == 1) {
                            $blog = 1;
                        } else {
                            $blog = @helper::get_plan($storeinfo->id)->blogs;
                        }
                    ?>
                    <?php if($blog == 1): ?>
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                            href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>">
                            <i class="fa-regular fa-clipboard"></i>
                            <p href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>" class="px-2 fw-400">
                                <?php echo e(trans('labels.blogs')); ?></p>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>">
                    <i class="fa-regular fa-file-lines"></i>
                    <p class="px-2 fw-400"><?php echo e(trans('labels.about_us')); ?></p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>">
                    <i class="fa-regular fa-address-card"></i>
                    <p class="px-2 fw-400"><?php echo e(trans('labels.contact_us')); ?></p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/terms_condition')); ?>">
                    <i class="fa-regular fa-note-sticky"></i>
                    <p class="px-2 fw-400"><?php echo e(trans('labels.terms')); ?></p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/privacypolicy')); ?>">
                    <i class="fa-solid fa-building-shield"></i>
                    <p class="px-2 fw-400"><?php echo e(trans('labels.privacy_policy')); ?></p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2" href="javascript:void(0)"
                    data-bs-toggle="modal" data-bs-target="#subscribe_modal">
                    <i class="fa-solid fa-bell"></i>
                    <p href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subscribe_modal"
                        class="px-2 fw-400"><?php echo e(trans('labels.subscribe')); ?></p>
                </a>
            </ul>
        </div>
        <div class="offcanvas-footer">
            <div class="row g-0 theme-3-footer my-3 border-top">
                <div class="col rounded-3">
                    <p><?php echo e(helper::appdata($storeinfo->id)->copyright); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Store info Offcanvas Theme-3 End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/theme-3header.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            if (document.cookie.indexOf("FooBar=true") == -1) {
                document.cookie = "FooBar=true; max-age=86400"; // 86400: seconds in a day
                $('#subscribe_modal').modal('show');
            }
        });

        console.log('asdasd');

        $('.owl-item').removeClass('active');
        $('.owl-item').first().addClass('active') ;

        $('.custom_item').on("click" ,  function()    {
            console.log('gemy el...');
            $('.custom_item').removeClass('active');
            $(this).addClass('active');

        })



    </script>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/template-3/index.blade.php ENDPATH**/ ?>