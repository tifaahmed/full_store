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



 <div class="specs <?php if($check_cat_count > 0 && $key != 0): ?> card-none <?php endif; ?>" id="specs-<?php echo e($category->id); ?>">
    <div class="row">

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

                        <?php if($check_cat_count > 0): ?>
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-4">
                            <div class="card border-0 rounded-0 theme-2-products-card h-100 p-2">
                                <div class="row justify-content-center align-items-start">
                                    <div class="col-6 px-0">
                                        <img src="<?php if( @$item['item_image']->image_url != null ): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>" class="img-fluid rounded-0" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')" alt="...">
                                    </div>
                                    <div class="col-6 theme2list">
                                        <div class="card-body p-0">
                                            <div>
                                                <p class="title pb-1" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')"><?php echo e($item->item_name); ?></p>
                                                <small class="pb-1 d_sm_none"><?php echo e($item->description); ?></small>
                                                <div class="products-price mb-1 align-items-center">
                                                    <span class="price"><?php echo e(helper::currency_formate($item->item_price, @$storeinfo->id)); ?></span>
                                                    <?php if($item->item_original_price != null): ?>
                                                    <del><?php echo e(helper::currency_formate($item->item_original_price, @$storeinfo->id)); ?></del>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <?php if($item->has_variants == 1): ?>

                                                    <button class="theme-2-product-icon btn" type="button"  onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>

                                                <?php else: ?>
                                                    <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                                                    <button class="theme-2-product-icon btn addcartbtn-<?php echo e($item->id); ?>" type="button"  onclick="addtocart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($image); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>

                                                <?php endif; ?>



                                                <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                                    <div class="set-fav1-<?php echo e($item->id); ?>">
                                                    
                                                    <?php if($item->is_favorite == 1): ?>
                                                        <a class="theme-2-product-icon mx-2" href="javascript:void(0)" onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',0,'<?php echo e(URL::to($storeinfo->slug.'/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                                            <i class="fa-solid fa-heart"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="theme-2-product-icon mx-2" href="javascript:void(0)" onclick="managefavorite('<?php echo e($storeinfo->id); ?>','<?php echo e($item->id); ?>',1,'<?php echo e(URL::to($storeinfo->slug.'/managefavorite')); ?>','<?php echo e(request()->url()); ?>')">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php $i += 1; ?>
                        <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </div>
</div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/html/full_store/resources/views/front/template-2/theme-list.blade.php ENDPATH**/ ?>