<!-- Kivi Card List -->
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
<div class="specs <?php if($check_cat_count > 0 && $key != 0): ?> card-none <?php endif; ?>" id="specs-<?php echo e($category->id); ?>">
    <div class="row g-3">
        <?php if(!$getcategory->isEmpty()): ?>
        <?php $i = 0; ?>
          <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($category->id == $item->cat_id): ?>
               <?php 
                    if(@$item['item_image']->image_name != null ) 
                    {
                        $image = @$item['item_image']->image_name;
                    }
                    else{
                        $image = $item->image;
                    }
                ?>
        <div class="col-md-6">
            <div class="card thme1categories dark h-100">
                <img src="<?php if( @$item['item_image']->image_url != null ): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>" class="card-img-top" alt="..." onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                <div class="card-body">
                    <div class="text-section">
                        <a href="javascript:void(0)" class="title pb-1" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')"><?php echo e($item->item_name); ?></a>
                        <small class="mb-2 d_sm_none"><?php echo e($item->description); ?></small>
                        <div class="d-flex align-items-baseline">
                            <div class="products-price">
                                <span class="price"> <?php echo e(helper::currency_formate($item->item_price, @$storeinfo->id)); ?></span>
                                <?php if($item->item_original_price != null): ?>
                                <del><?php echo e(helper::currency_formate($item->item_original_price, @$storeinfo->id)); ?></del>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <?php if($item->has_variants == 1): ?>
                            <button class="product-cart-icon" type="button"  onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            <?php else: ?>
                           
                            <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                            <button class="product-cart-icon addcartbtn-<?php echo e($item->id); ?>" type="button"  onclick="addtocart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($image); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            <?php endif; ?>
                           
                                            
                            <?php if(Auth::user() && Auth::user()->type == 3): ?>
                            <div class="favorite-icon1 set-fav1-<?php echo e($item->id); ?>">
                                <?php if($item->is_favorite == 1): ?>
                                    <a href="javascript:void(0)" onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug.'/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i class="fa-solid fa-heart"></i></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug.'/managefavorite')); ?>','<?php echo e(request()->url()); ?>')"><i class="fa-regular fa-heart"></i></a>
                                <?php endif; ?>
                            </div>

                            <?php endif; ?>
                            
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <?php $i += 1; ?>
        <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/full_store/resources/views/front/template-1/theme-list.blade.php ENDPATH**/ ?>