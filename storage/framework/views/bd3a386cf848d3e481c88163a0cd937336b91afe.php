<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.subscribers')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.email')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $getsubscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7">
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo e($subscriber->email); ?></td>
                                    <td>
                                        <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/subscribers/delete-'.$subscriber->id)); ?>')" <?php endif; ?> class="btn btn-outline-danger btn-sm "> <i class="fa-regular fa-trash"></i></a>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/subscriber/index.blade.php ENDPATH**/ ?>