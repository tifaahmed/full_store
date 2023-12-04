<div id="google_analytics" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items text-dark">
                <i class="fa-solid fa-chart-pie fs-5"></i>
                    <h5 class="px-2"><?php echo e(trans('labels.google_analytics')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(URL::to('admin/settings/updateanalytics')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.tracking_id')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="tracking_id"
                                        required value="<?php echo e(@$settingdata->tracking_id); ?>" placeholder="<?php echo e(trans('labels.tracking_id')); ?>">
                                    <?php $__errorArgs = ['tracking_id'];
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
                                    <label class="form-label"><?php echo e(trans('labels.view_id')); ?> <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="view_id"
                                        required value="<?php echo e(@$settingdata->view_id); ?>" placeholder="<?php echo e(trans('labels.view_id')); ?>">
                                    <?php $__errorArgs = ['view_id'];
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
</div><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/admin/analytics/setting_form.blade.php ENDPATH**/ ?>