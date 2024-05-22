<div class="offcanvas  <?php echo e(session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'); ?>" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-coupons">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo e(trans('labels.coupons_offers')); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body offer-coupons">
        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row g-4">
                <div class="col px-0">
                    <div class="card promo-card position-relative rounded-5 h-100">
                        <div class="card-body p-4">
                            <div class="row main-row">
                                <div class="coupons-imag col-12 col-md-4 col-lg-4 col-xl-4">
                                    <h1 >  <?php echo e($coupon->price); ?>%</h1>
                                    <h6 class="ms-3"> <?php echo e(trans('labels.coupons')); ?></h6>

                                </div>
                                <div class="coupons-content col-12 col-md-8 col-lg-8 col-xl-8 d-md-flex justify-content-end">
                                    <div>
                                        <h2><?php echo e($coupon->name); ?></h2>

                                        <p class="ps-7"><?php echo e($coupon->name); ?></p>
                                    </div>
                                </div>
                            </div>
                            <form class="form-group" data-copy=true>
                                <div class="copy-button rounded-5">
                                    <input type="hidden" id="applycoponurl" value="<?php echo e(URL::to('/cart/applypromocode')); ?>"/>
                                    <input id="promocode" type="text" class="rounded-5 px-2 input-h" readonly value="<?php echo e($coupon->code); ?>" />
                                    <button type="button" class="copybtn btn-primary" onclick="ApplyCopon('<?php echo e($coupon->code); ?>','<?php echo e($storeinfo->id); ?>')"><?php echo e(trans('labels.apply')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/front/checkout-pages/coupon_modal.blade.php ENDPATH**/ ?>