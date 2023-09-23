<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.users')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/users/add')); ?>" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>
                    <?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-7">
            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="fw-500">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.image')); ?></td>
                                    <td><?php echo e(trans('labels.name')); ?></td>
                                    <td><?php echo e(trans('labels.email')); ?></td>
                                    <td><?php echo e(trans('labels.mobile')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $getuserslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7">
                                        <td><?php echo $i++; ?></td>
                                        <td> <img src="<?php echo e(helper::image_path($user->image)); ?>"
                                                class="img-fluid rounded hw-50" alt="" srcset=""> </td>
                                        <td> <?php echo e($user->name); ?> </td>
                                        <td> <?php echo e($user->email); ?> </td>
                                        <td> <?php echo e($user->mobile); ?> </td>
                                        <td>
                                            <?php if($user->is_available == 1): ?>
                                                <a class="btn btn-sm btn-success btn-size" tooltip="<?php echo e(trans('labels.active')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/2')); ?>')" <?php endif; ?>><i
                                                        class="fa-sharp fa-solid fa-check"></i></a>
                                            <?php else: ?> 
                                                <a class="btn btn-sm btn-danger btn-xmark" tooltip="<?php echo e(trans('labels.in_active')); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/users/status-' . $user->slug . '/1')); ?>')" <?php endif; ?>><i
                                                        class="fa-sharp fa-solid fa-xmark"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"
                                                href="<?php echo e(URL::to('admin/users/edit-' . $user->slug)); ?>"> <i
                                                    class="fa fa-pen-to-square"></i></a>
                                      
                                            <a class="btn btn-sm btn-dark btn-size" tooltip="<?php echo e(trans('labels.view')); ?>" href="<?php echo e(URL::to('/' . $user->slug)); ?>" target="_blank"><i class="fa-regular fa-eye"></i></a>
                                            
                                            <a class="btn btn-sm bg-warning btn-size" tooltip="<?php echo e(trans('labels.login')); ?>"
                                                href="<?php echo e(URL::to('admin/users/login-' . $user->slug)); ?>"> <i
                                                    class="fa-regular fa-arrow-right-to-bracket"></i> </a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/user/index.blade.php ENDPATH**/ ?>