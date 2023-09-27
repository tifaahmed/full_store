<?php $__env->startSection('content'); ?>
<main>
     <!-- banner Section Start -->
     <?php if(count(helper::footer_features(@$storeinfo->id)) > 0 || (count($getcategory) > 0 && count($getitem) > 0) || count($bannerimage) > 0 || count($blogs) > 0): ?>
     <?php if(helper::appdata($storeinfo->id)->banner != null): ?>
     <section class="mt-0 position-relative">
          <div class="theme-1">
               <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
          </div>
          <div class="leyer">
               <div class="container">
                    <div class="theme-1banner-text">
                         <h1 class="col-md-6 col-11 col-lg-9 col-xl-6 text-center m-auto"><?php echo e(helper::appdata($storeinfo->id)->description); ?></h1>
                    </div>
               </div>
          </div>
     </section>
     <?php endif; ?>
     <!-- banner Section End -->
     <!-- fhishar Section Start -->
     <?php if(count(helper::footer_features(@$storeinfo->id)) > 0): ?>
     <section class="bg-light py-3 mt-0">
          <div class="container">
               <div class="row my-1 justify-content-center align-items-center overflow-hidden">
                    <?php $__currentLoopData = helper::footer_features(@$storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6 col-12">
                         <div class="card footer-card">
                              <div class="card-body d-flex align-items-center">
                                   <h2 class="px-3 py-1 fs-3 theme1quality-image"><?php echo $feature->icon; ?></h2>
                                   <div class="quality-content">
                                        <h3><?php echo e($feature->title); ?></h3>
                                        <p><?php echo e($feature->description); ?></p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
          </div>
     </section>
     <?php endif; ?>
     <!-- fhishar Section end -->
     <!-- Categories Section Start -->
     <?php if(count($getcategory) > 0 && count($getitem) > 0): ?>
     <section class="theme-1-margin-top">
          <div class="container">
               <h3 class="page-title mb-1"><?php echo e(trans('labels.our_products')); ?></h3>
               <p class="page-subtitle line-limit-2 mt-0">
                    <?php echo e(trans('labels.our_products_desc')); ?>

               </p>
               <div class="swiper horizontal_scroll_swiper">
                    <ul class="swiper-wrapper navgation_lower theme-1-category-card pb-1">
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
                         <li class="<?php echo e($key == 0 ? 'active1' : ''); ?> swiper-slide" id="specs-<?php echo e($category->id); ?>">
                              <img src="<?php echo e(helper::image_path($category->image)); ?>" alt="">
                              <p class="act-1"><?php echo e($category->name); ?></p>

                         </li>
                         <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="swiper-scrollbar"></div>
               </div>

               <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
               <?php echo $__env->make('front.template-1.theme-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php elseif(helper::appdata($storeinfo->id)->template_type == 2): ?>
               <?php echo $__env->make('front.template-1.theme-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php elseif(helper::appdata($storeinfo->id)->template_type == 3): ?>
               <?php echo $__env->make('front.template-1.theme-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php endif; ?>
     </section>
     <?php endif; ?>
     <!-- Categories Section End -->

     <!-- Banner Slider Section Start -->
     <?php if(count($bannerimage) > 0): ?>
     <section class="banner-slider-section theme-1-margin-top">
          <div class="container">
               <div class="row py-5">
                    <div class="col">
                         <div class="owl-carousel banner-imges-slider owl-theme">
                              <?php $__currentLoopData = $bannerimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="item">
                                   <div class="overflow-hidden rounded-5">
                                        <img src="<?php echo e(helper::image_path($image->banner_image)); ?>" alt="" class="rounded-5">
                                   </div>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <?php endif; ?>
     <!-- Banner Slider Section End -->
     <!-- Subscription Section Start -->
     <section class="theme-1-margin-top mb-5">
          <div class="container">
               <div class="row">
                    <div class="col">
                         <div class="subscription-main position-relative w-100 overflow-hidden">
                              <div class="overflow-hidden rounded-5">
                                   <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)); ?>" class="img-fluid subscription-image rounded-2">
                                   <div class="caption-subscription col-md-7 col-lg-6">
                                        <div class="subscription-text">
                                             <h3><?php echo e(trans('labels.subscribe_title')); ?></h3>
                                             <p><?php echo e(trans('labels.subscribe_description')); ?></p>
                                             <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="post">
                                                  <?php echo csrf_field(); ?>
                                                  <div class="subscribe-input form-control col-md-6">
                                                       <input type="hidden" value="<?php echo e($storeinfo->id); ?>" name="id">
                                                       <input type="email" name="email" class="form-control border-0" placeholder="<?php echo e(trans('labels.enter_email')); ?>" required>
                                                       <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.subscribe')); ?></button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Subscription Section End -->
     <!-- Blogs Section Start -->
     <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
     App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
     <?php

     if ($storeinfo->allow_without_subscription == 1) {
     $blog = 1;
     } else {
     $blog = @helper::get_plan($storeinfo->id)->blogs;
     }
     ?>

     <?php if($blog == 1): ?>
     <?php if(count($blogs) > 0): ?>
     <section class="bg-light theme-1-margin-top">
          <div class="container overflow-hidden">
               <div class="row blogs-card">
                    <div class="row align-items-center">
                         <div class="col-8">
                              <h3 class="page-title mb-1"> <?php echo e(trans('labels.blogs')); ?></h3>
                              <p class="page-subtitle line-limit-2 mb-4">
                                   <?php echo e(trans('labels.blog_desc')); ?>

                              </p>
                         </div>
                         <div class="col-4 d-flex justify-content-end align-items-center">
                              <a href="<?php echo e(URL::to(@$storeinfo->slug.'/blog-list')); ?>" class="border text-dark p-1 rounded-3">
                                   <span class="fs-8 p-1"><?php echo e(trans('labels.view_all')); ?></span>
                              </a>
                         </div>
                    </div>
                    <div class="col">
                         <div class="owl-carousel blogs-slider owl-theme">
                              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a href="<?php echo e(URL::to(@$storeinfo->slug.'/blog-details-'.$blog->slug)); ?>">
                                   <div class="item">
                                        <div class="card h-100 rounded-5">
                                             <img src="<?php echo e(helper::image_path($blog->image)); ?>" alt="" class="rounded-5">
                                             <div class="card-body py-4">
                                                  <div class="blogs-admin-data">
                                                       <div class="blog-admin">
                                                            <i class="fa-regular fa-user"></i>
                                                            <span><?php echo e($storeinfo->name); ?></span>
                                                       </div>
                                                       <div class="blog-deta">
                                                            <i class="fa-regular fa-calendar"></i>
                                                            <span><?php echo e(helper::date_format($blog->created_at)); ?></span>
                                                       </div>
                                                  </div>
                                                  <p class="title mt-2 blog-title"><?php echo e($blog->title); ?></p>
                                                  <span class="blog-description"><?php echo $blog->description; ?></span>
                                             </div>
                                        </div>
                                   </div>
                              </a>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>

                    </div>
               </div>
          </div>
     </section>
     <?php endif; ?>
     <?php endif; ?>
     <?php endif; ?>
     <!-- Blogs Section End -->
</main>
<?php else: ?>
<?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/full_store/resources/views/front/template-1/index.blade.php ENDPATH**/ ?>