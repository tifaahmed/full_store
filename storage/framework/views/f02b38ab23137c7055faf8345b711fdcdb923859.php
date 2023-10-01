
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
                    <form action="<?php echo e(URL::to('admin/roles/'.$role->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group_by): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($key); ?>

                                    <div class="form-group row ">
                                        <?php $__currentLoopData = $group_by; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group my-2 col-md-2">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($permission->name); ?>"
                                                name="permission_names[]" id="<?php echo e($permission->name); ?>" 
                                                <?php if(
                                                    isset($permission->roles)&&
                                                    $permission['roles']->where('id',$role->id)->first()
                                                ): echo 'checked'; endif; ?>>
                                                <label class="form-check-label" for="<?php echo e($permission->name); ?>">
                                                    <span class="fw-600">
                                                        <?php echo e($permission->action); ?> 
                                                    </span>
                                                </label>
                                            </div>     
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
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
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>