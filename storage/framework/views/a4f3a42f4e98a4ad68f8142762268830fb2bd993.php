<div class="row border shadow rounded-4 py-3 mb-4">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <div class="radio-item-container row">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <p class="title px-2"> <?php echo e(trans('labels.payment_option')); ?></p>
                </div>
                <form>
                    <?php $__currentLoopData = $paymentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php  $transaction__type = strtolower($payment->payment_name); ?>
                    <div class="col-12 select-payment-list-items">
                        <label class="form-check-label d-flex  justify-content-between align-items-center" for="<?php echo e($payment->payment_name); ?>">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input m-0" type="radio" id="<?php echo e($payment->payment_name); ?>"  name="payment" data-payment_type="<?php echo e(strtolower($payment->payment_name)); ?>"  data-currency="<?php echo e($payment->currency); ?>"  <?php if(!$key): ?> <?php echo 'checked'; ?> <?php endif; ?>  value="<?php echo e($payment->public_key); ?>">
                                <p class="px-2"><?php echo e($payment->payment_name_modified); ?></p>
                            </div>
                            
                            <img src="<?php echo e(helper::image_path($payment->image)); ?>" alt="" class="select-paymentimages">

                            

                                
                                <?php if(strtolower($payment->payment_name) == 'razorpay'): ?>
                                <input type="hidden" name="razorpay" id="razorpay"
                                    value="<?php echo e($payment->public_key); ?>">
                                <?php endif; ?>
                                
                                <?php if(strtolower($payment->payment_name) == 'stripe'): ?>
                                    <input type="hidden" name="stripekey" id="stripekey" value="<?php echo e($payment->public_key); ?>">
                                    <input type="hidden" name="stripecurrency" id="stripecurrency" value="<?php echo e($payment->currency); ?>">
                                <?php endif; ?>
                                

                                <?php if(strtolower($payment->payment_name) == 'flutterwave'): ?>
                                    <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                        value="<?php echo e($payment->public_key); ?>">
                                <?php endif; ?>
                                <?php if(strtolower($payment->payment_name) == 'paystack'): ?>
                                    <input type="hidden" name="paystackkey" id="paystackkey"
                                        value="<?php echo e($payment->public_key); ?>">
                                <?php endif; ?>

                        </label>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/front/checkout-pages/payment_option.blade.php ENDPATH**/ ?>