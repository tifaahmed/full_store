<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/areas/save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> * </span></label>
                            <select name="city" class="form-select" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $allcity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(trans('labels.area')); ?>" required>
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
                        <div class="form-group text-end">
                            <a href="<?php echo e(URL::to('admin/areas')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/areas/add.blade.php ENDPATH**/ ?>