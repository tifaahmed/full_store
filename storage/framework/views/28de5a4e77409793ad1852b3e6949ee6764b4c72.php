

<?php $__env->startSection('content'); ?>

<section id="our-stores ">
    <div class="owl-carousel owl_our_stores owl-theme position-relative">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <a href="<?php echo e(URL::to('/' . $banner['vendor_info']->slug)); ?>" target="_blank">
            <div class="item">
                <div class="leyer">
                </div>
                <img src="<?php echo e(helper::image_path($banner->image)); ?>" alt="">
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <?php if(count($stores) > 0): ?>


    <div class="container">
        <div class="row row-cols-1 mt-2 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xll-4 g-2 py-5">
            <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                <div class="col">
                    <a href="<?php echo e(URL::to($store->slug . '/')); ?>" target="_blank">
                        <div class="card mx-1 rounded-4 h-100 border-0">
                            <img src="<?php echo e(helper::image_path(helper::appdata($store->id)->cover_image)); ?>" class="card-img-top our_stores_images" alt="...">
                            <div class="card-body px-0">
                                <h5 class="card-title hotel-title"><?php echo e(helper::appdata($store->id)->website_title); ?></h5>
                                <p class="hotel-subtitle text-muted">
                                    <?php echo e(helper::appdata($store->id)->description); ?>

                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        </div>
    </div>


    <?php else: ?>
        <?php echo $__env->make('landing.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>



</section>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/landing/store_list.blade.php ENDPATH**/ ?>