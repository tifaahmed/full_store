<?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
    <div class="col-12">
        <div class="g-recaptcha" data-sitekey="<?php echo e(helper::appdata('')->google_recaptcha_site_key); ?>"></div>
        <?php $__errorArgs = ['g-recaptcha-response'];
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
<?php endif; ?>

<?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
    <div class="col-12">
        <?php echo RecaptchaV3::field('contact'); ?>

        <?php $__errorArgs = ['g-recaptcha-response'];
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
<?php endif; ?>
<?php /**PATH /var/www/html/full_store/resources/views/landing/layout/recaptcha.blade.php ENDPATH**/ ?>