<footer>
    <div class="footer-bg-color">
        <div class="container">
            <div class="footer-contain row justify-content-between">
                <div class="col-md-12 col-lg-4 mt-4">
                    <div class="logo">
                        <a href="#"><img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="logo"></a>
                    </div>
                    <p class="footer-contain my-4">
                        <?php echo e(trans('landing.footer_description')); ?>

                    </p>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4"><?php echo e(trans('landing.about_us')); ?></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#home')); ?>"><?php echo e(trans('landing.home')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#features')); ?>"><?php echo e(trans('landing.features')); ?></a></p>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#pricing-plans')); ?>"><?php echo e(trans('landing.pricing_plan')); ?></a></p>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                            <p class="mb-2"><a href="<?php echo e(URL::to('blog_list')); ?>"><?php echo e(trans('landing.blogs')); ?></a></p>
                            <?php endif; ?>
                            <p class="mb-1"><a href="#contect-us"><?php echo e(trans('landing.contact_us')); ?></a></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4"><?php echo e(trans('landing.other_pages')); ?></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('privacy_policy')); ?>"><?php echo e(trans('landing.privacy_policy')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('refund_policy')); ?>"><?php echo e(trans('landing.refund_policy')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('terms_condition')); ?>"><?php echo e(trans('landing.terms_condition')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('about_us')); ?>"><?php echo e(trans('landing.about_us')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('faqs')); ?>"><?php echo e(trans('landing.faqs')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#our-stores')); ?>"><?php echo e(trans('landing.our_stores')); ?></a></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4"><?php echo e(trans('landing.help')); ?></p>
                            <p class="mb-2"><a href="mailto:<?php echo e(helper::appdata('')->email); ?>"><?php echo e(helper::appdata('')->email); ?></a></p>
                            <p class="mb-2"><a href="tel:<?php echo e(helper::appdata('')->contact); ?>"><?php echo e(helper::appdata('')->contact); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-white">
            <div class="copyright-sec row justify-content-between align-items-center">
                <p class="m-0 text-white col-12 col-md-8 text-md-start text-center"><?php echo e(helper::appdata('')->copyright); ?></p>
                <div class="col-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-2 mt-md-0">
                    <div class="social-icon d-flex d-grid gap-3">
                        <a href="<?php echo e(helper::appdata('')->instagram_link); ?>"><i class="fa-brands fa-instagram fs-4"></i></a>
                        <a href="<?php echo e(helper::appdata('')->facebook_link); ?>"><i class="fa-brands fa-facebook fs-4"></i></a>
                        <a href="<?php echo e(helper::appdata('')->twitter_link); ?>"><i class="fa-brands fa-twitter fs-4"></i></a>
                        <a href="<?php echo e(helper::appdata('')->twitter_link); ?>"><i class="fa-brands fa-linkedin-in fs-4"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/landing/layout/footer.blade.php ENDPATH**/ ?>