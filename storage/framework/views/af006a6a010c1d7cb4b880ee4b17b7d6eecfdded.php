

<?php $__env->startSection('content'); ?>
 
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.my_cart')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"> <?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.my_cart')); ?></li>
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

<!-- My Cart section start -->


<section class="theme-1-margin-top pull-section-up">

    <div class="container">

        <div class="py-4">

            <div class="
                row 
                
                gx-2
            ">

                <!--  for rtl use this class (ps-md-5) -->

                <div class="col-md-12 col-lg-12 pb-12 px-0 <?php echo e(session()->get('direction') == 2 ? 'ps-lg-5 ' : 'pe-lg-5 '); ?>">

                    <div class="row align-items-center py-3" >

                            <h3 class="offcanvas-title" style="text-align: center">
                                <?php echo e(trans('labels.my_acount')); ?>

                            </h3>
                            <p style="text-align: center">
                                <?php echo e(trans('labels.login_to_continue')); ?>

                            </p>
                            <br>
                            <br>
                            <form action="<?php echo e(URL::to($storeinfo->slug . '/checklogin-normal')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <input class="form-control input-h" name="login"  value="<?php echo e(old('login')); ?>" placeholder="<?php echo e(trans('labels.email_or_mobile')); ?> "  required>
                                        <?php $__errorArgs = ['login'];
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
                                        <input type="password" class="form-control input-h" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(trans('labels.password')); ?>"  required>
                                        <?php $__errorArgs = ['password'];
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
                                    <div class="col-md-12 row mb-4">
                                        <div class="col-md-6   mb-4">
                                            <input type="checkbox" class="input-h" id="remember" name="remember" value="<?php echo e(old('remember')); ?>"  >
                                            <label for="remember" class="form-label"><?php echo e(trans('labels.remember')); ?></label>
                                        </div>
                                        <div class="col-md-6   mb-4" style="text-align: right">
                                            <a href="" style="text-decoration:revert;">
                                                <?php echo e(trans('labels.forget_password?')); ?>

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="submit" class="btn-primary rounded-3 mobile-viwe-btn btn-block"
                                        style="width: 100%;">
                                            <?php echo e(trans('labels.login')); ?>

                                        </button>
                                    </div>
                                    <div class="col-md-12 row mb-4" style="text-align: center">
                                        <p>
                                            <?php echo e(trans('labels.new_to_store?')); ?>

                                            <a href="<?php echo e(URL::to($storeinfo->slug . '/register/')); ?>" 
                                                style="text-decoration:revert;">
                                                <?php echo e(trans('labels.create_an_acount')); ?>

                                            </a>
                                        </p>
                                    </div>

                                    <div class="col-md-12 row mb-4" style="text-align: center">
                                        <p>
                                            <span>or</span>
                                        </p>
                                    </div>


                                    <div class="col-md-12 row mb-4" style="text-align: center">
                                        <ul class="list-group theme-4-categories-list">

                                            <li class="list-group-item p-2 border-top-0" data-bs-dismiss="offcanvas">
                                                <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                                                href="#">
                                                    <p class="px-2 fw-400 menu-p" style="    width: 100%;
                                                    text-align: center;">
                                                        <i class="fa-brands fa-apple"></i>
                                                        <?php echo e(trans('labels.continue_with_apple')); ?>

                                                    </p>
                                                </a>
                                            </li>
                                            <li class="list-group-item p-2 border-top-0" data-bs-dismiss="offcanvas">
                                                <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                                                href="<?php echo e(asset($storeinfo->slug.'/login/google')); ?>">
                                                    <p class="px-2 fw-400 menu-p" style="    width: 100%;
                                                    text-align: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="10px" width="25" height="25" viewBox="0 0 48 48">
                                                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                                    </svg>                                                
                                                        <?php echo e(trans('labels.continue_with_google')); ?>

                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

 

 
 
<?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/auth/login.blade.php ENDPATH**/ ?>