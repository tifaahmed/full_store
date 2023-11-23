
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.my_addresses')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.my_addresses')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
    </div>
</section>
<!-- breadcrumb end -->
<!-- user_addresses Section end -->
<section class="bg-light mt-0 py-5 pull-section-up">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3">
                            <?php echo e(trans('labels.my_addresses')); ?>

                            <a  class="btn btn-success btn-size" type="button" 
                            href="<?php echo e(URL::to($storeinfo->slug . '/user-address/create')); ?>">
                                  <?php echo e(trans('labels.add')); ?>

                            </a>
                        </h2>
                        <?php if(count($addresses) > 0): ?>
                        <div class="row g-3 products-img ">
                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                            <div class="col-12 col-lg-4 col-md-6">
                                <div class="card h-100 position-relative">
                                    <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                                        <div class="row justify-content-between align-items-center gx-0">
                                            <div class="col-lg-12 col-md-12  " style="text-align: center">

                                                <h4> <i class="<?php echo e($address_types[$address->type]['icon']); ?>"></i> </h4> 
                                                <h4><?php echo e($address->title); ?></h4> 
                                                <p><?php echo e($address->address); ?></p>
                                                
                                                
                                            </div>
                                            <div class="col-lg-12 col-md-12 ">
                                                
                                                <a  class="btn btn-info btn-block" style="color: #fff;width: 100%;" 
                                                href="<?php echo e(url($storeinfo->slug.'/user-address/'.$address->id.'/edit')); ?>">
                                                      <?php echo e(trans('labels.edit')); ?>

                                                </a>
                                                <br>
                                                <form action="<?php echo e(url($storeinfo->slug.'/user-address/delete')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <input type="text" hidden name="id" value="<?php echo e($address->id); ?>">
                                                    <button class="btn btn-danger btn-block" type="submit" style="width: 100%;"> 
                                                        <?php echo e(trans('labels.delete')); ?>

                                                    </button>
                                                </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="d-flex justify-content-center align-items-center m-auto mt-4">
                                <nav aria-label="Page navigation example">
                                    <?php if($addresses->lastPage() > 1): ?>
                                    <ul class="pagination">
                                        <li class="page-item <?php echo e(($addresses->currentPage() == 1) ? ' disabled' : ''); ?>">
                                            <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'); ?>" href="<?php echo e($addresses->url(1)); ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php for($i = 1; $i <= $addresses->lastPage(); $i++): ?>
                                            <li class="page-item  <?php echo e(($addresses->currentPage() == $i) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo e($addresses->url($i)); ?>"><?php echo e($i); ?></a></li>
                                            <?php endfor; ?>
                                            <li class="page-item <?php echo e(($addresses->currentPage() == $addresses->lastPage()) ? ' disabled' : ''); ?>">
                                                <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'); ?>" href="<?php echo e($addresses->url($addresses->currentPage()+1)); ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                    </ul>
                                    <?php endif; ?>
                                </nav>
                            </div>





                        </div>
                        <?php else: ?>
                        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- Favorites Section end -->
<!-- Account menu button Start -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2"><?php echo e(trans('labels.account_menu')); ?></span>
</button>
<!-- Account menu button End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/user-address/index.blade.php ENDPATH**/ ?>