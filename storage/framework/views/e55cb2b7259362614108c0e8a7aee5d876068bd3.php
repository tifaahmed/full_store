<input type="hidden" id="cat_id" value="<?php echo e($cat_id); ?>"/>

<?php if(count($getitem) > 0): ?>

<div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-6 g-4 overflow-y-scroll pb-3">

<?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-6">
        <div class="card h-100 shadow-sm rounded-4 addactive-<?php echo e($item->id); ?> <?php if($item->is_cart == 1): ?> active <?php else: ?> border-0 <?php endif; ?>" >
            <div class="card-body pb-0">
                <div class="pos-img">
                    <img src="<?php echo e(url(env('ASSETSPATHURL').'/item/'.$item['item_image']?->image_name)); ?>"
                        alt="product image">
                </div>
                <div class="pro-content w-100">
                    <h5 class="pro-title"><?php echo e($item->item_name); ?></h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- <h2 class="pro-price">
                            <?php $price = 0; ?>
                            <?php if(count($item['variation']) > 0): ?>
                                <?php $__currentLoopData = $item->variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(helper::currency_formate($value->price, Auth::user()->id)); ?>

                                    <?php $price = $value->price; ?>
                                <?php break; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php echo e(helper::currency_formate($item->item_price, Auth::user()->id)); ?>

                                <?php $price = $item->item_price; ?>
                            <?php endif; ?>
                        </h2> -->

                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center pt-0">
                <?php if($item->has_variants == 1): ?>
                    <a type="button" class="poscart addcartbtn-<?php echo e($item->id); ?>" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($price); ?>','<?php echo e(app()->getLocale()); ?>')">
                    <i  class="fa-solid fa-cart-shopping"></i>
                </a>

                <?php else: ?>
                    <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                    <a type="button" class="poscart addcartbtn-<?php echo e($item->id); ?>" onclick="addtocart('<?php echo e($item?->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($item['item_image']?->image_name); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')" >
                        <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <?php endif; ?>
                <h2 class="pro-price">
                            <?php $price = 0; ?>
                            <?php if(count($item['variation']) > 0): ?>
                                <?php $__currentLoopData = $item->variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(helper::currency_formate($value->price, Auth::user()->id)); ?>

                                    <?php $price = $value->price; ?>
                                <?php break; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php echo e(helper::currency_formate($item->item_price, Auth::user()->id)); ?>

                                <?php $price = $item->item_price; ?>
                            <?php endif; ?>
                        </h2>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php else: ?>
<div class="data-found">
    <h2 class="text-muted text-center"><?php echo e(trans('labels.data_not_found')); ?></h2>
</div>
<?php endif; ?>

<?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/pos/positem.blade.php ENDPATH**/ ?>