<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
    <tr class="fw-500">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.image')); ?></td>
            <td><?php echo e(trans('labels.title')); ?></td>
            <td><?php echo e(trans('labels.description')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
        ?>
        <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="fs-7">
                <td><?php
                    echo $i++;
                ?></td>
                <td>
                    <img src="<?php echo e(helper::image_path($item->image)); ?>" class="img-fluid rounded-3 hw-50 object-fit-cover" alt=""></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo Str::limit($item->description, 100); ?></td>
                <td>
                    <div class="d-flex">
                        <a href="<?php echo e(URL::to('admin/blogs/edit-'.$item->slug)); ?>" class="btn btn-sm btn-info btn-size mx-2" tooltip="<?php echo e(trans('labels.edit')); ?>"> <i
    
                                class="fa-regular fa-pen-to-square"></i></a>
    
                        <a href="javascript:void(0)" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/blogs/delete-'.$item->slug)); ?>')" <?php endif; ?> class="btn btn-sm btn-danger btn-size" tooltip="<?php echo e(trans('labels.delete')); ?>">
    
                            <i class="fa-regular fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/blog/table.blade.php ENDPATH**/ ?>