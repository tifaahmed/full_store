
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/branches/store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label"><?php echo e(trans('labels.name_ar')); ?><span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="name[ar]"
                                        value="<?php echo e(old('name.ar')); ?>" placeholder="<?php echo e(trans('labels.name_ar')); ?>" required>
                                    <?php $__errorArgs = ['name.ar'];
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
                                <div class="col-12 col-md-6">
                                    <label class="form-label"><?php echo e(trans('labels.name_en')); ?><span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="name[en]"
                                        value="<?php echo e(old('name.en')); ?>" placeholder="<?php echo e(trans('labels.name_en')); ?>" required>
                                    <?php $__errorArgs = ['name.en'];
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
                                
                                <div class="form-group col-md-6">
                                    <label class="form-label"><?php echo e(trans('labels.delivery')); ?><span class="text-danger"> * </span></label>
                                    <select name="deliveryarea_id" class="form-select" required>
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deliveryArea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"  ><?php echo e($deliveryArea); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['deliveryarea_id'];
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

                                <div class="col-md-6 form-group">
                                    <?php echo e(trans('labels.is_active')); ?>

                                    <input id="checkbox-switch" type="checkbox" 
                                    class="checkbox-switch" name="is_active" 
                                    value="1"  >
        
                                    <label for="checkbox-switch" class="switch">
                                        <span class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>">
                                            <span class="switch__circle-inner"></span>
                                        </span>
                                        <span class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>">
                                            <?php echo e(trans('labels.off')); ?>

                                        </span>
                                        <span class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>">
                                            <?php echo e(trans('labels.on')); ?>

                                        </span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group text-end">
                                <a href="<?php echo e(URL::to('admin/branches')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                                <button class="btn btn-success btn-succes m-1" type="submit" >
                                    <?php echo e(trans('labels.save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/admin/branch/add.blade.php ENDPATH**/ ?>