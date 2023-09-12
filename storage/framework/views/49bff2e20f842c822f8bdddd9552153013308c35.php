<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row mb-7">
    <div class="col-12">
        <div class="card border-0 box-shadow mb-3">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/register_vendor')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">
                                    * </span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" id="name" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                            <?php $__errorArgs = ['name'];
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
                            <label for="email" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> * </span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                            <?php $__errorArgs = ['email'];
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
                            <label for="mobile" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
                            <input type="number" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                            <?php $__errorArgs = ['mobile'];
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
                            <label for="password" class="form-label"><?php echo e(trans('labels.password')); ?><span class="text-danger"> * </span></label>
                            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" id="password" placeholder="<?php echo e(trans('labels.password')); ?>" required>
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
                        <div class="form-group col-md-6">
                            <label for="city" class="form-label"><?php echo e(trans('labels.city')); ?><span class="text-danger"> * </span></label>
                            <select name="city" class="form-select" id="city" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="area" class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> * </span></label>
                            <select name="area" class="form-select" id="area" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group text-center text-md-end">

                        <a href="<?php echo e(URL::to('admin/users')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>

                        <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?>

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
    var select = "<?php echo e(trans('labels.select')); ?>";
    var areaid = '0';
</script>
<script src="<?php echo e(url(env('ASSETSPATHURL') . '/admin-assets/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/user/add.blade.php ENDPATH**/ ?>