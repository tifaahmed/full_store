<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
       
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/categories/update-' . $editcategory->slug)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group row ">

                                <div class="col-12 col-md-6">
                                    <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="category_name"
                                        value="<?php echo e($editcategory->name); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                </div>                                        
                                <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                <div class="col-12 col-md-6">
                                    <label class="form-label"><?php echo e(trans('labels.image')); ?><span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="category_image"
                                        value="<?php echo e(old('category_image')); ?>" placeholder="<?php echo e(trans('labels.image')); ?>">
                                    <img src="<?php echo e(url(env('ASSETSPATHURL').'admin-assets/images/category/'.$editcategory->image)); ?>" class="img-fluid rounded-3 hw-70 object-fit-cover" alt="">
                                </div>
                                <?php $__errorArgs = ['category_image'];
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
                                <a href="<?php echo e(URL::to('admin/categories')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                                <button class="btn btn-success btn-succes m-1 " <?php if(env('Environment') == 'sendbox'): ?> type="button"
                                    onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>