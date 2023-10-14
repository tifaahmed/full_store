  
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
  <div class="specs <?php if($check_cat_count > 0 && $key != 0): ?> card-none <?php endif; ?>" id="specs-<?php echo e($category->id); ?>" id="specs-<?php echo e($category->id); ?>">
     <div class="row row g-2 g-md-3">

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


         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3" >
             <div class="card mb-3 border-0 rounded-0 theme-2-products-card h-100">
               <div class="theme_2_grid_img overflow-hidden">
                    <img src="<?php if( @$item['item_image']->image_url != null ): ?> <?php echo e(@$item['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($item->image)); ?> <?php endif; ?>" class="img-fluid" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')" alt="...">
               </div>
                    <div class="card-body px-2 px-md-3 pb-0">                     
                         <p class="title" onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')"><?php echo e($item->item_name); ?></p>
                         <small class="d_sm_none"><?php echo e($item->description); ?></small>
                    </div>
                    <div class="card-footer px-2 px-md-3 pt-0">
                         <div class="row justify-content-between align-items-center gx-0">
                              <div class="col-9 col-md-9 mb-2 mb-md-0">
                                   <div class="products-price mb-2 align-items-center">
                                        <span class="price"><?php echo e(helper::currency_formate($item->item_price, @$storeinfo->id)); ?></span>
                                        <?php if($item->item_original_price != null): ?>
                                        <del><?php echo e(helper::currency_formate($item->item_original_price, @$storeinfo->id)); ?></del>
                                        <?php endif; ?>
                                   </div>
                              </div>
                              <div class="col-3 col-md-3 d-flex justify-content-end mb-2 mb-md-0">
                                   <div class="d-flex align-items-center justify-content-between">
     
                                             <?php if($item->has_variants == 1): ?>
                                                  <button class="theme-2-product-icon btn" type="button"  onclick="showitems('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>')">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                                  </button>
                                             <?php else: ?>
                                                  <div class="load showload-<?php echo e($item->id); ?>" style="display:none"></div>
                                                  <button class="theme-2-product-icon btn addcartbtn-<?php echo e($item->id); ?>" ttype="button"  onclick="addtocart('<?php echo e($item->id); ?>','<?php echo e($item->item_name); ?>','<?php echo e($item->item_price); ?>','<?php echo e($image); ?>','<?php echo e($item->tax); ?>','1','<?php echo e($item->item_price); ?>')">
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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>


       
         </div>
     </div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/template-2/theme-grid.blade.php ENDPATH**/ ?>