<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.languages')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 my-3">
            <div class="card-body">
                <form action="<?php echo e(URL::to('/admin/language-settings/update-' . $getlanguage->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.layout')); ?></label>
                                <select name="layout" class="form-control layout-dropdown" id="layout">
                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1"<?php echo e($getlanguage->layout == "1" ? 'selected' : ''); ?> ><?php echo e(trans('labels.ltr')); ?></option>
                                    <option value="2"<?php echo e($getlanguage->layout == "2" ? 'selected' : ''); ?> ><?php echo e(trans('labels.rtl')); ?></option>
                                </select>
                                <?php $__errorArgs = ['layout'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.image')); ?></label>
                                <input type="file" class="form-control" name="image">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <br><span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <img src="<?php echo e(helper::image_path($getlanguage->image)); ?>" class="img-fluid rounded-3 object-fit-cover hw-50 mt-3" alt="">
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="form-label"
                                    for=""><?php echo e(trans('labels.default')); ?> </label>
                                <input id="default-switch" type="checkbox"
                                    class="checkbox-switch" name="default" value="1"
                                    <?php echo e($getlanguage->is_default == 1 ? 'checked' : ''); ?>>
                                <label for="default-switch" class="switch">
                                    <span class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span
                                            class="switch__circle-inner"></span></span>
                                    <span class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                    <span class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="<?php echo e(URL::to('admin/language-settings')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                        <button
                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                        class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/language/edit.blade.php ENDPATH**/ ?>