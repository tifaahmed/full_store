
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
<div id="<?php echo e($category->slug); ?>">
     <p class="page-title mb-0 fs-5 py-4"><?php echo e($category->name); ?></p>
     <div class="row theme-4-gridproduct-card g-2 g-md-3">
         
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
                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <img src="<?php if( @$item['item_image']->image_url != null ): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>" class="card-img-top" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')" alt="...">
                        <div class="card-body">
                            <a class="title pb-1" href="javascript:void(0)" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')"><?php echo e($item->item_name); ?></a>
                            <small class="d_sm_none"><?php echo e($item->description); ?></small>
                        </div>
                        <div class="card-footer px-0 pt-0">
                            <div class="row justify-content-between align-items-center gx-0">
                                <div class="col-9 col-md-10 mb-2 mb-md-0">
                                    <div class="products-price">
                                        <span class="price"><?php echo e(helper::currency_formate($item->item_price, @$storeinfo->id)); ?></span>
                                        <?php if($item->item_original_price != null): ?>
                                        <del><?php echo e(helper::currency_formate($item->item_original_price, @$storeinfo->id)); ?></del>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-3 col-md-2 d-flex justify-content-end px-2 mb-2 mb-md-0">
                                    <?php if($item->has_variants == 1): ?>
                                        <a type="button"  onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                <i class="fa-solid fa-circle-plus fs-5 px-2"></i>
                                        </a>
                                    <?php else: ?>
                                        <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                                        <a type="button" class="addcartbtn-<?php echo e($item->id); ?>"  onclick="addtocart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($image); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')">
                                                <i class="fa-solid fa-circle-plus fs-5"></i>
                                        </a>
                                    <?php endif; ?>
    
                                    <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                    <div class="favorite-icon set-fav1-<?php echo e($item->id); ?>">
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
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/front/template-4/theme-grid.blade.php ENDPATH**/ ?>