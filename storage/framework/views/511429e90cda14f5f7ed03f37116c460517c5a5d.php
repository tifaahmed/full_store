
<table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
    <thead>
        <tr class="fw-500">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <td><?php echo e(trans('labels.name')); ?></td>
            <td><?php echo e(trans('labels.requested_domain')); ?></td>
            <td><?php echo e(trans('labels.current_domain')); ?></td>
            <td><?php echo e(trans('labels.status')); ?></td>
            <td><?php echo e(trans('labels.action')); ?></td>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
        ?>
        <?php $__currentLoopData = $customdomaindata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ddata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="fs-7">
                <td><?php
                    
                    echo $i++;
                    
                ?></td>
                <td><?php echo e($ddata['users']->name); ?></td>
                <td><?php echo e($ddata->requested_domain); ?></td>
                <td><?php echo e($ddata->current_domain); ?></td>
                <td>
                    <?php if($ddata->status == 1): ?>
                        <span class="badge bg-warning cursor-pointer" tooltip="Pending"><?php echo e(trans('labels.pending')); ?> </span>
                    <?php else: ?>
                        <span class="badge bg-success cursor-pointer" tooltip="Connected"><?php echo e(trans('labels.connected')); ?> </span>
                    <?php endif; ?>
                </td>
               
                <td>
                    
					<?php if($ddata->status == 1): ?>
                    <a class="btn btn-sm btn-success btn-size" tooltip="Active" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()"
                    <?php else: ?>
                        onclick="statusupdate('<?php echo e(URL::to('/admin/custom_domain/status_change-' . $ddata['users']->id) . '/2'); ?>') <?php endif; ?>"><i
                            class="fas fa-check"></i></a>
					<?php else: ?>
                    <a class="btn btn-sm btn-danger btn-xmark" tooltip="Inactive" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()"
                    <?php else: ?>
                        onclick="statusupdate('<?php echo e(URL::to('/admin/custom_domain/status_change-' . $ddata['users']->id) . '/1'); ?>') <?php endif; ?>"><i
                            class="fas fa-close"></i></a>
					<?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/customdomain/listcustomdomain_table.blade.php ENDPATH**/ ?>