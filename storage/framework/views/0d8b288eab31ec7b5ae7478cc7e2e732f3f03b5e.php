<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.coupon_name')); ?></td>
            <td><?php echo e(trans('labels.coupon_code')); ?></td>
            <td><?php echo e(trans('labels.amount')); ?></td>
            <td><?php echo e(trans('labels.start_date')); ?></td>
            <td><?php echo e(trans('labels.end_date')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;?>
        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ddata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo $i++;?></th>
                <td><?php echo e($ddata->name); ?></td>
                <td><?php echo e($ddata->code); ?></td>
                <td><?php echo e(helper::currency_formate($ddata->price, $ddata->vendor_id)); ?></td>
                <td><span class="badge bg-success"><?php echo e(helper::date_format($ddata->active_from)); ?></td>
                <td><span class="badge bg-danger mx-2"><?php echo e(helper::date_format($ddata->active_to)); ?></span></td>
                <th>
                    <a class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>" data-original-title="" title=""
                        href="<?php echo e(URL::to('admin/coupons/edit-' . $ddata->id)); ?>"> <i
                            class="fa-regular fa-pen-to-square"></i> </a>
                    <a class="btn btn-sm btn-danger btn-size" tooltip="<?php echo e(trans('labels.delete')); ?>"
                        <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/coupons/del-' . $ddata->id)); ?>')" <?php endif; ?>>
                        <i class="fa-regular fa-trash"></i> </a>
                </th>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/coupons/coupons_table.blade.php ENDPATH**/ ?>