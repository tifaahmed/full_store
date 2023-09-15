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
<section id="<?php echo e($category->slug); ?>" class="theme3pruductgrid px-0">
     <div class="bg-light mb-3 margin_top">
          <p class="page-title mb-0 fs-5 px-2 py-2"><?php echo e($category->name); ?></p>
     </div>
     <div class="row border-bottom pb-3 g-2 g-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">


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

          <div class="col-md-4 col-lg-6 col-xl-4 col-6">
               <div class="card thme3girdproduct h-100">
                    <img src="<?php if( @$item['item_image']->image_url != null ): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>" class="card-img-top" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')" alt="...">
                    <div class="card-body px-2 px-md-2 pb-md-2 py-0">
                         <div class="text-section">
                              <p class="title pb-1" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')"><?php echo e($item->item_name); ?></p>
                              <small class="d_sm_none"><?php echo e($item->description); ?></small>
                         </div>
                    </div>
                    <div class="card-footer px-2 px-md-2 pb-md-2 py-0">
                         <div class="row justify-content-between align-items-center gx-0">
                              <div class="col-9 col-md-10 mb-2 mb-md-0">
                                   <div class="products-price">
                                        <span class="price"><?php echo e(helper::currency_formate($item->item_price, @$storeinfo->id)); ?></span>
                                        <?php if($item->item_original_price != null): ?>
                                        <del><?php echo e(helper::currency_formate($item->item_original_price, @$storeinfo->id)); ?></del>
                                        <?php endif; ?>
                                   </div>
                              </div>
                              <div class="col-3 col-md-2 d-flex justify-content-end mb-2 mb-md-0">
                                   <?php if($item->has_variants == 1): ?>
                                   <a class="theme-3-product-icon m-0" href="javascript:void(0)" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                        <i class="fa-solid fa-plus"></i>
                                   </a>
                                   <?php else: ?>
                                   <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                                   <a class="theme-3-product-icon m-0 addcartbtn-<?php echo e($item->id); ?>" href="javascript:void(0)" onclick="addtocart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($image); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')">
                                        <i class="fa-solid fa-plus"></i>
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
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </div>
</section>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/front/template-3/theme-grid.blade.php ENDPATH**/ ?>