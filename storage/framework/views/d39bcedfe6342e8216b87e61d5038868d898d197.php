
<?php $__env->startSection('recaptcha_script'); ?>
<!-- IF VERSION 2  -->
<?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
<script src='https://www.google.com/recaptcha/api.js'></script> 
<?php endif; ?>
<!-- IF VERSION 3  -->
<?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
<?php echo RecaptchaV3::initJs(); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-3">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.contact_us')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"><?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.contact_us')); ?></li>
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
<!-- contact section start -->
<section class="mt-3 pull-section-up">
    <div class="container">
        <div class="row contact-form">
            <div class="col-12 col-lg-8 col-sm-12 col-auto mb-4 mb-lg-0">
                <div class="card shadow rounded-5 h-100 select-delivery py-3 px-2">
                    <div class="card-body">
                        <form action="<?php echo e(URL::To(@$storeinfo->slug.'/submit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <h2 class="page-title mb-1 px-2"> <?php echo e(trans('labels.contact_us')); ?></h2>
                                <p class="page-subtitle px-2 mb-3 md-mb-5">
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.frist_name')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="first_name" placeholder="<?php echo e(trans('labels.frist_name')); ?>" required>
                                    <input type="hidden" name="vendor_id" value="<?php echo e($storeinfo->id); ?>">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.last_name')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="last_name" placeholder="<?php echo e(trans('labels.last_name')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
                                    <input type="number" class="form-control input-h" name="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label"><?php echo e(trans('labels.message')); ?><span class="text-danger"> * </span></label>
                                    <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="message" placeholder="<?php echo e(trans('labels.message')); ?>" required></textarea>
                                </div>
                                    <?php echo $__env->make('landing.layout.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col d-flex justify-content-end mt-2">
                                    <button type="submit" class="btn-primary mobile-viwe-btn"><?php echo e(trans('labels.submit')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-sm-12 col-auto">
                <div class="card contact-details">
                    <div class="card-body mx-3">
                        <h4 class="page-title mb-4"><?php echo e(trans('labels.contact_details')); ?></h4>
                        <ul class="contact-right-side">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>
                                    <a href="#" class="px-2"> <?php echo e(helper::appdata($storeinfo->id)->address); ?></a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-solid fa-headphones"></i>
                                <span class="px-2"><?php echo e(trans('labels.call_us')); ?><a href="tel:<?php echo e(helper::appdata($storeinfo->id)->contact); ?>"> +<?php echo e(helper::appdata($storeinfo->id)->contact); ?></a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-regular fa-envelope"></i>
                                <span class="px-2">
                                    <?php echo e(trans('labels.email')); ?>

                                    <a href="mailto:<?php echo e(helper::appdata($storeinfo->id)->email); ?>"> <?php echo e(helper::appdata($storeinfo->id)->email); ?></a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="px-2">
                                    <?php echo e(trans('labels.hours')); ?>

                                    <?php $__currentLoopData = @helper::timings($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <br>
                                    <a href="#"> 
                                        <?php echo e(Str::upper($timing->day)); ?> --
                                        <?php if($timing->is_always_close == 1): ?>
                                            ( <?php echo e(trans('labels.closed')); ?> )
                                        <?php else: ?>
                                            (<?php echo e($timing->open_time); ?> to <?php echo e($timing->close_time); ?>)  
                                        <?php endif; ?>
                                    </a>    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </span>
                            </li>
                        </ul>
                        <hr class="my-4">
                        <h5 class="title mb-2"><?php echo e(trans('labels.social_share')); ?></h5>
                        <div class="social-share">
                            <a class="btn btn-outline-dark m-1 border facebook text-white" href="<?php echo e(helper::appdata($storeinfo->id)->facebook_link); ?>" role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="<?php echo e(helper::appdata($storeinfo->id)->twitter_link); ?>" role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="<?php echo e(helper::appdata($storeinfo->id)->linkedin_link); ?>" role="button"><i class="fa-brands fa-linkedin"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="<?php echo e(helper::appdata($storeinfo->id)->instagram_link); ?>" role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- contact section start -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/front/contactus.blade.php ENDPATH**/ ?>