<table class="table">
    <thead>
        <tr class="fw-500">
            <td><?php echo e(trans('labels.requested_domain')); ?></td>
            <td><?php echo e(trans('labels.current_domain')); ?></td>
            <td><?php echo e(trans('labels.status')); ?></td>
        </tr>
    </thead>
    <tbody>
        <tr class="border">

            <td><?php echo e(empty(@$domain->requested_domain) ? '-' : @$domain->requested_domain); ?></td>
            <td><?php echo e(empty(@$domain->current_domain) ? '-' : @$domain->current_domain); ?></td>
            <td>
                <?php if(@$domain->status == 1): ?>
                <span class="badge bg-warning cursor-pointer" tooltip="Pending"><?php echo e(trans('labels.pending')); ?> </span>
                <?php elseif(@$domain->status == 2): ?>
                <span class="badge bg-success cursor-pointer" tooltip="Connected"><?php echo e(trans('labels.connected')); ?> </span>
                <?php else: ?>
                -

                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/customdomain/customdomain_table.blade.php ENDPATH**/ ?>