
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.favorites')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.favorites')); ?></li>
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
<!-- Favorites Section end -->
<section class="bg-light mt-0 py-5  pull-section-up">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3"><?php echo e(trans('labels.favourites')); ?></h2>
                        <?php if(count($getfavoritelist) > 0): ?>
                        <div class="row g-3 products-img ">
                            <?php $__currentLoopData = $getfavoritelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            if(@$itemdata['item_image']->image_name != null )
                            {
                            $image = @$itemdata['item_image']->image_name;
                            }
                            else{
                            $image = $itemdata->image;
                            }
                            ?>
                            

                            <div class="col-6 col-lg-4">
                                <div class="card h-100 position-relative">
                                    <div class="overflow-hidden theme1grid_image">
                                        <img src="<?php if( @$itemdata['item_image']->image_url != null ): ?> <?php echo e(@$itemdata['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($itemdata->image)); ?> <?php endif; ?>" alt="" class="p-2 p-md-3 rounded-5" onclick="showitems('<?php echo e($itemdata->id); ?>','<?php echo e($itemdata->item_name); ?>','<?php echo e($itemdata->item_price); ?>')">
                                    </div>
                                    <div class="card-body p-2 p-md-3 pb-0 pb-md-3">
                                        <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                        <div class="favorite-icon set-fav1-<?php echo e($itemdata->id); ?>">
                                            <a href="javascript:void(0)" onclick="removefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($itemdata->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug.'/managefavorite')); ?>')"><i class="fa-solid fa-heart"></i></a>
                                        </div>
                                        <?php endif; ?>


                                        <a href="javascript:void(0)" class="title pb-1" onclick="showitems('<?php echo e($itemdata->id); ?>','<?php echo e($itemdata->item_name); ?>','<?php echo e($itemdata->item_price); ?>')"><?php echo e($itemdata->item_name); ?></a>
                                        <small class="d_sm_none"><?php echo e($itemdata->description); ?></small>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                                        <div class="row justify-content-between align-items-center gx-0">
                                            <div class="col-9 col-md-4 mb-2 mb-md-0">
                                                <p class="price">
                                                    <?php echo e(helper::currency_formate($itemdata->item_price, @$storeinfo->id)); ?>

                                                </p>
                                                <?php if($itemdata->item_original_price != null): ?>
                                                <del><?php echo e(helper::currency_formate($itemdata->item_original_price, @$storeinfo->id)); ?></del>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-3 col-md-8 d-flex justify-content-end mb-2 mb-md-0">
                                                <?php if($itemdata->has_variants == 1): ?>
                                                <button class="btn-primary product-cart-icon" type="button" onclick="showitems('<?php echo e($itemdata->id); ?>','<?php echo e($itemdata->item_name); ?>','<?php echo e($itemdata->item_price); ?>')">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                <?php else: ?>
                                                <div class="load showload-<?php echo e($itemdata->id); ?>" style="display:none"></div>
                                                <button class="btn-primary product-cart-icon addcartbtn-<?php echo e($itemdata->id); ?>" type="button" onclick="addtocart('<?php echo e($itemdata->id); ?>','<?php echo e($itemdata->item_name); ?>','<?php echo e($itemdata->item_price); ?>','<?php echo e($image); ?>','<?php echo e($itemdata->tax); ?>','1','<?php echo e($itemdata->item_price); ?>')">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="d-flex justify-content-center align-items-center m-auto mt-4">
                                <nav aria-label="Page navigation example">
                                    <?php if($getfavoritelist->lastPage() > 1): ?>
                                    <ul class="pagination">
                                        <li class="page-item <?php echo e(($getfavoritelist->currentPage() == 1) ? ' disabled' : ''); ?>">
                                            <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'); ?>" href="<?php echo e($getfavoritelist->url(1)); ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php for($i = 1; $i <= $getfavoritelist->lastPage(); $i++): ?>
                                            <li class="page-item  <?php echo e(($getfavoritelist->currentPage() == $i) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo e($getfavoritelist->url($i)); ?>"><?php echo e($i); ?></a></li>
                                            <?php endfor; ?>
                                            <li class="page-item <?php echo e(($getfavoritelist->currentPage() == $getfavoritelist->lastPage()) ? ' disabled' : ''); ?>">
                                                <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'); ?>" href="<?php echo e($getfavoritelist->url($getfavoritelist->currentPage()+1)); ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                    </ul>
                                    <?php endif; ?>
                                </nav>
                            </div>





                        </div>
                        <?php else: ?>
                        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- Favorites Section end -->
<!-- Account menu button Start -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2"><?php echo e(trans('labels.account_menu')); ?></span>
</button>
<!-- Account menu button End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/favoritelist.blade.php ENDPATH**/ ?>