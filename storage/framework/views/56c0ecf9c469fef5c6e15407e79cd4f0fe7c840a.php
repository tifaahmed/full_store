<?php $__env->startSection('content'); ?>

<div class="row justify-content-between align-items-center">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<div class="row mt-3 mb-7">

    <div class="col-12">

        <div class="card border-0 box-shadow">

            <div class="card-body">

                <form action="<?php echo e(URL::to('/admin/promotionalbanners/update-'.$banner->id)); ?>" method="POST" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(trans('labels.vendor_title')); ?><span class="text-danger"> *
                                </span></label>
                            <select class="form-select" name="vendor" id="" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vendor->id); ?>" <?php echo e($vendor->id == $banner->vendor_id ? 'selected' : ''); ?>><?php echo e($vendor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['vendor'];
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
                            <label class="form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> *
                                </span></label>
                            <input type="file" name="image" class="form-control">
                            <img src="<?php echo e(helper::image_path($banner->image)); ?>" class="hw-50 rounded-3 object-fit-cover" alt="">
                            <?php $__errorArgs = ['image'];
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

                        <a href="<?php echo e(URL::to('admin/promotionalbanners')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>

                        <button <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/promotionalbanners/edit.blade.php ENDPATH**/ ?>