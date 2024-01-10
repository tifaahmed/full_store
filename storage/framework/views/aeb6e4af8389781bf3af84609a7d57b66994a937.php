<div id="facebook_pixel" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items text-dark">
                <i class="fa-solid fa-chart-pie fs-5"></i>
                    <h5 class="px-2"><?php echo e(trans('labels.pixel')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(URL::to('admin/settings/pixel')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.pixel_header')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <textarea rows="20" type="text" class="form-control" name="pixel_header"
                                        placeholder="<?php echo e(trans('labels.pixel_header')); ?>"><?php echo e(@$settingdata->pixel_header); ?></textarea>
                                    <?php $__errorArgs = ['pixel_header'];
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
                                    <label class="form-label"><?php echo e(trans('labels.pixel_footer')); ?> <span
                                            class="text-danger"> * </span> </label>
                                    <textarea rows="20" type="text" class="form-control" name="pixel_footer"
                                        placeholder="<?php echo e(trans('labels.pixel_footer')); ?>"><?php echo e(@$settingdata->pixel_footer); ?></textarea>
                                    <?php $__errorArgs = ['pixel_footer'];
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
</div><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/admin/facebook_pixel/facebook_pixel_form.blade.php ENDPATH**/ ?>