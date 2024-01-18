<div class="row border shadow rounded-4 py-3 mb-4">
    <div class="card border-0 select-delivery">
        <div class="card-body row">
            <div class="radio-item-container row">
                <div class="d-flex align-items-center mb-3 px-1">
                    <i class="fa-solid fa-truck"></i>
                    <p class="title px-2"><?php echo e(trans('labels.delivery_option')); ?></p>
                </div>
                <form class="px-0">
                    <?php
                        $delivery_types = explode(',', helper::appdata($storeinfo->id)->delivery_type);

                    ?>
                    <?php $__currentLoopData = $delivery_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $delivery_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-12 px-0 mb-2" id="class-cart-delivery-<?php echo e($delivery_type); ?>">
                            <label class="form-check-label d-flex  justify-content-between align-items-center "
                            for="cart-delivery-<?php echo e($delivery_type); ?>" >
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="cart-delivery" 
                                    id="cart-delivery-<?php echo e($delivery_type); ?>" 
                                    value="<?php echo e($delivery_type); ?>" <?php echo e($key == 0 ? 'checked' : ''); ?>>
                                    <p class="px-2">
                                        <?php if($delivery_type == 1): ?> 
                                            <?php echo e(trans('labels.delivery')); ?>

                                        <?php elseif($delivery_type == 2): ?> 
                                            <?php echo e(trans('labels.pickup')); ?>

                                        <?php elseif($delivery_type == 3): ?> 
                                            <?php echo e(trans('labels.dine_in')); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

               <?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/checkout-pages/delivery_types.blade.php ENDPATH**/ ?>