
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.my_addresses')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white">
                        <?php echo e(trans('labels.home')); ?>

                    </a>
                </li>
                <li class="breadcrumb-item  <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>">
                    <a href="<?php echo e(URL::to($storeinfo->slug . '/user-address')); ?>" class="text-white">
                    <?php echo e(trans('labels.my_addresses')); ?>

                    </a>
                </li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"
                    >
                    <?php echo e(trans('labels.add')); ?>

                </li>
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
<!-- Change Password section end -->
<section class="bg-light mt-0 py-5  pull-section-up">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3"><?php echo e(trans('labels.my_addresses')); ?></h2>
                        <form action="<?php echo e(URL::to($storeinfo->slug . '/user-address/')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.title')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="title" 
                                    id="validationDefault" value="<?php echo e(old('labels.title')); ?>" placeholder="<?php echo e(trans('labels.title')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">
                                        <?php echo e(trans('labels.type')); ?>

                                    </label>
                                    <div>
                                        <?php $__currentLoopData = $address_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-input-secondary" type="radio" name="type"
                                             id="<?php echo e($address_type['name']); ?>" value="<?php echo e($key); ?>" 
                                             <?php echo e(old('type') == $key ? 'checked' : ''); ?> />
                                            <label for="<?php echo e($address_type['name']); ?>" class="form-check-label">
                                                <?php echo e(trans('labels.'.$address_type['name'])); ?>

                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.address')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <textarea class="form-control input-h" name="address" 
                                    id="validationDefault" placeholder="<?php echo e(trans('labels.address')); ?> "  
                                    required><?php echo e(old('labels.address')); ?></textarea>
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.house_num')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="house_num" 
                                    id="validationDefault" value="<?php echo e(old('labels.house_num')); ?>" placeholder="<?php echo e(trans('labels.house_num')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['house_num'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.block')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="block" 
                                    id="validationDefault" value="<?php echo e(old('labels.block')); ?>" placeholder="<?php echo e(trans('labels.block')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['block'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.pincode')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="pincode" 
                                    id="validationDefault" value="<?php echo e(old('labels.pincode')); ?>" placeholder="<?php echo e(trans('labels.pincode')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.building')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="building" 
                                    id="validationDefault" value="<?php echo e(old('labels.building')); ?>" placeholder="<?php echo e(trans('labels.building')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['building'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label"><?php echo e(trans('labels.landmark')); ?> 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="landmark" 
                                    id="validationDefault" value="<?php echo e(old('labels.landmark')); ?>" placeholder="<?php echo e(trans('labels.landmark')); ?> "  
                                    required>
                                    <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php echo $__env->make('maps.google_map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn-primary rounded-3 mobile-viwe-btn"><?php echo e(trans('labels.save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- Change Password section end -->
<button class="btn account-menu btn-primary d-lg-none d-md-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2"><?php echo e(trans('labels.account_menu')); ?></span>
</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/user-address/create.blade.php ENDPATH**/ ?>