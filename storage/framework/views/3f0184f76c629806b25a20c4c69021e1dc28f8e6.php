<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.image')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getbannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="fs-7">
            <td><?php echo $i++; ?></td>
            <td><img src="<?php echo e(helper::image_path($banner->banner_image)); ?>" class="img-fluid rounded hw-50 object-fit-cover" alt="">
            </td>
            <td>
                <a href="<?php echo e(URL::to('admin/banner/edit-' . $banner->id)); ?>" class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"><i
                        class="fa-regular fa-pen-to-square"></i></a>
                <a href="javascript:void(0)" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?>
                    onclick="deletedata('<?php echo e(URL::to('admin/banner/delete-' . $banner->id)); ?>')" <?php endif; ?>
                    class="btn btn-sm btn-danger btn-size" tooltip="<?php echo e(trans('labels.delete')); ?>"> <i class="fa-regular fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/banner/table.blade.php ENDPATH**/ ?>