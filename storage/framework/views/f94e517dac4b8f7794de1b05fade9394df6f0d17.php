<div id="recaptcha" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                <i class="fa-solid fa-gears fs-5"></i>
                    <h5 class="px-2"><?php echo e(trans('labels.cookie_recaptcha')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(URL::to('admin/settings/updaterecaptcha')); ?>"
                        enctype="multipart/form-data">  
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.cookie_text')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <textarea class="form-control" name="cookie_text" id="cookie_text" placeholder="<?php echo e(trans('labels.cookie_text')); ?>" required><?php echo e(@$settingdata->cookie_text); ?></textarea>
                                    <?php $__errorArgs = ['cookie_text'];
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.cookie_button_text')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="cookie_button_text" id="cookie_button_text" placeholder="<?php echo e(trans('labels.cookie_button_text')); ?>" value="<?php echo e(@$settingdata->cookie_button_text); ?>" required>
                                    <?php $__errorArgs = ['cookie_button_text'];
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.recaptcha_version')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <select class="form-control" name="recaptcha_version" required id="recaptcha_version">
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <option value="v2" <?php echo e(@$settingdata->recaptcha_version == 'v2' ? 'selected' : ''); ?>>V2</option>
                                        <option value="v3" <?php echo e(@$settingdata->recaptcha_version == 'v3' ? 'selected' : ''); ?>>V3</option>
                                    </select>
                                    <?php $__errorArgs = ['recaptcha_version'];
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.google_recaptcha_site_key')); ?> <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="google_recaptcha_site_key"
                                        required value="<?php echo e(@$settingdata->google_recaptcha_site_key); ?>" placeholder="<?php echo e(trans('labels.google_recaptcha_site_key')); ?>">
                                    <?php $__errorArgs = ['google_recaptcha_site_key'];
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.google_recaptcha_secret_key')); ?> <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="google_recaptcha_secret_key"
                                        required value="<?php echo e(@$settingdata->google_recaptcha_secret_key); ?>" placeholder="<?php echo e(trans('labels.google_recaptcha_secret_key')); ?>">
                                    <?php $__errorArgs = ['google_recaptcha_secret_key'];
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
                            <div class="col-md-12" id="score_threshold" <?php if($settingdata->recaptcha_version == 'v3'): ?> <?php else: ?> style="display: none;" <?php endif; ?>>
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.score_threshold')); ?> <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="score_threshold" value="<?php echo e(@$settingdata->score_threshold); ?>" placeholder="<?php echo e(trans('labels.score_threshold')); ?>" required>
                                    <span class="text-muted"><i>reCAPTCHA v3 returns a score (1.0 is very likely a good interaction, 0.0 is very likely a bot). If the score less than or equal to this threshold, the form submission will be blocked and the message above will be displayed.</i><span>
                                    <?php $__errorArgs = ['score_threshold'];
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
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes mt-3"
                                    <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/mostafa/work/full_store/resources/views/admin/cookie_recaptcha/setting_form.blade.php ENDPATH**/ ?>