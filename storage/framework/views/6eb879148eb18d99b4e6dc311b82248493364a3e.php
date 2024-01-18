<?php
$total_price = 0;
$tax = 0;
?>
<?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $total_price += ($cart->qty * $cart->price);
    $tax += ($cart->qty * $cart->price * $cart->tax) / 100;
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php
    $grand_total = 0;
    $total_coupons = $coupons->count();
?>
<?php if(Session::has('offer_amount')): ?>
<?php
     $grand_total = ($total_price - Session::get('offer_amount')) + $tax ;
?>
<?php else: ?>
<?php
     $grand_total = $total_price + $tax ;
?>
<?php endif; ?>
<div class="row border shadow rounded-4 py-3 mb-4">
<div class="card border-0 select-delivery">
<div class="card-body row">
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-basket-shopping"></i>
        <p class="title px-2"><?php echo e(trans('labels.order_summary')); ?></p>
    </div>
    <div class="col">
        <input type="hidden" id="sub_total" value="<?php echo e($total_price); ?>"/>
        <input type="hidden" id="tax" value="<?php echo e($tax); ?>"/>
        <input type="hidden" name="delivery_charge" id="delivery_charge" value="0">
        <input type="hidden" name="grand_total" id="grand_total" value="<?php echo e($grand_total); ?>">
        <ul class="list-group list-group-flush order-summary-list" id="payment_summery_list">
            <li class="list-group-item">
                <?php echo e(trans('labels.sub_total')); ?>

                <span>
                    <?php echo e(helper::currency_formate($total_price, $storeinfo->id)); ?>

                </span>
            </li>
            <li class="list-group-item" id="shipping_charge_hide">
                <?php echo e(trans('labels.delivery_charge')); ?> (+)
                <span id="shipping_charge">

                    <?php echo e(helper::currency_formate('0.0', $storeinfo->id)); ?>

                </span>
            </li>
            <li class="list-group-item" id="tax_list">
                <?php echo e(trans('labels.tax')); ?> (+)
                <span>

                    <?php echo e(helper::currency_formate($tax, $storeinfo->id)); ?>

                </span>
            </li>
            <?php if(Session::has('offer_amount')): ?>
            <li class="list-group-item" id="discount_1">
                <?php echo e(trans('labels.discount')); ?> (-)
                <span>

                    <?php echo e(helper::currency_formate(Session::get('offer_amount'), $storeinfo->id)); ?>

                </span>
            </li>
            <?php endif; ?>
            <li class="list-group-item fw-700 text-success">
                <?php echo e(trans('labels.order_total')); ?>

                <span class="fw-700 text-success" id="grand_total_view">
                    <?php echo e(helper::currency_formate($grand_total, $storeinfo->id)); ?>

                </span>
            </li>
        </ul>
    </div>
</div>
</div>
</div><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/checkout-pages/order_summary.blade.php ENDPATH**/ ?>