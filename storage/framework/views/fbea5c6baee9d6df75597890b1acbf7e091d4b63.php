
<?php $__env->startSection('content'); ?>
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2"><?php echo e(trans('labels.administrators')); ?></h5>
                <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(URL::to('admin/administrators/create')); ?>" class="btn-add"><i
                            class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?></a>
                </div>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-12">
                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                                <thead>
                                    <tr class="fw-500">
                                        <td><?php echo e(trans('labels.id')); ?></td>
                                        <td><?php echo e(trans('labels.name')); ?></td>
                                        <td><?php echo e(trans('labels.action')); ?></td>
                                    </tr>
                                </thead>
                                <tbody id="tabledetails" >
                                    <?php $__currentLoopData = $administrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $administrator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="fs-7 row1" id="dataid<?php echo e($administrator->id); ?>" data-administrator="<?php echo e($administrator->id); ?>">
                                            <td><?php echo e($administrator->id); ?></td>
                                            <td><?php echo e($administrator->name); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('administrators',$administrator->id)); ?>"
                                                    class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"> 
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/administrators/index.blade.php ENDPATH**/ ?>