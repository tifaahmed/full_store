<input type="hidden" id="discount_amount" value="<?php echo e(Session::get('offer_amount')); ?>" />
<input type="hidden" name="couponcode" id="couponcode" value="<?php echo e(Session::get('offer_code')); ?>">
    <?php
        if($storeinfo->allow_without_subscription == 1)
        {
            $promocode = 1;
        }
        else {
            $promocode = helper::get_plan(@$storeinfo->id)->coupons;
        }
    ?>
    <?php if($promocode == 1): ?>

        <div class="row border shadow rounded-4 py-3 mb-4 <?php if(@$coupons->count() == 0): ?> d-none <?php endif; ?>">
            <div class="card border-0 select-delivery" >
                <div class="card-body row justify-content-between align-items-center">
                    <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                        <div>
                            <p class="title px-2 mb-2"><i class="fa-solid fa-receipt"></i><span class="px-2" id="promocode_code"><?php if(Session::has('offer_amount')): ?> <?php echo e(Session::get('offer_code')); ?> applied <?php else: ?> <?php echo e(trans('labels.apply_coupon')); ?> <?php endif; ?> </span></p>
                            <p class="apply-coupon-subtitle" id="promocode_desc"><?php if(!Session::has('offer_amount')): ?> <?php echo e(trans('labels.save_offer')); ?><?php endif; ?></p>
                        </div>
                    </div>
                    <input type="hidden" id="removecouponurl" value="<?php echo e(URL::to('/cart/removepromocode')); ?>"/>
                    <div class="col-md-6 col-lg-12 col-xl-5 d-md-flex d-lg-block d-xl-flex justify-content-end px-2" id="promocode_button">
                        <?php if(Session::has('offer_amount')): ?>
                        <a class=" text-danger" href="javascript:void(0)"  onclick="RemoveCopon()"> <?php echo e(trans('labels.remove')); ?></a>
                        <?php else: ?>
                            <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" <?php if(@$coupons->count() > 0): ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" <?php endif; ?>><?php echo e(@$coupons->count()); ?>

                                <?php echo e(trans('labels.offer')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
   <?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/checkout-pages/coupons.blade.php ENDPATH**/ ?>