<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.area_name')); ?></td>
            <td><?php echo e(trans('labels.amount')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php $__currentLoopData = $getshippingarealist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="fs-7">
                <td><?php echo $i++ ?></td>
                <td><?php echo e($shippingarea->name); ?></td>
                <td><?php echo e(helper::currency_formate($shippingarea->price, Auth::user()->id)); ?></td>
                <td>
                    <a href="<?php echo e(URL::to('admin/shipping-area/show-' . $shippingarea->id)); ?>"
                        class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"> <i class="fa-regular fa-pen-to-square"></i></a>
                    <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>  onclick="deletedata('<?php echo e(URL::to('admin/shipping-area/delete-' . $shippingarea->id)); ?>')" <?php endif; ?>
                        class="btn btn-sm btn-danger btn-size" tooltip="<?php echo e(trans('labels.delete')); ?>"> <i class="fa-regular fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/shippingarea/table.blade.php ENDPATH**/ ?>