
<table class="table table-striped table-bordered py-3  w-100">
        <thead>
        <tr class="fw-500 py-3">
            <td style="font-size: 18px;font-weight: 700;height: 40px;height: 40px;">
                <?php echo e(trans('labels.srno')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                <?php echo e(trans('labels.order_number')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                <?php echo e(trans('labels.customer_mobile')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                <?php echo e(trans('labels.customer_name')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                <?php echo e(trans('labels.date_time')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                <?php echo e(trans('labels.grand_total')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                <?php echo e(trans('labels.payment_type')); ?>

            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                <?php echo e(trans('labels.status')); ?>

            </td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="fs-7">

            
            <td style="height: 40px;">
                <?php echo e(++$key); ?>

            </td>

            
            <td> 
                <a class="text-dark fw-700" href="<?php echo e(URL::to('admin/orders/invoice/'.$orderdata->order_number)); ?>"> 
                    #<?php echo e($orderdata->order_number); ?> 
                </a>
            </td>

            
            <td> 
                    <?php echo e($orderdata->mobile); ?> 
            </td>

            
            <td> 
                    <?php echo e($orderdata->customer_name); ?> 
            </td>

            
            <td>
                <?php if($orderdata->order_type == 3): ?>
                    <?php echo e($orderdata->created_at_date_format); ?>

                <?php else: ?>
                    <?php echo e($orderdata->delivery_date_format); ?> <br>
                    <?php echo e($orderdata->delivery_time); ?>

                <?php endif; ?>
            </td>
            <td><?php echo e(helper::currency_formate($orderdata->grand_total, Auth::user()->id)); ?></td>
            <td>
                
                <?php echo e($orderdata->payment_type_name); ?>


                <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10])): ?>
                : <?php echo e($orderdata->payment_id); ?>

                <?php endif; ?>
            </td>
            <td style="width: 120px">
                <?php if($orderdata->status == 1): ?>
                <?php
                $status = trans('labels.pending');
                $color = 'warning';
                ?>
                <?php elseif($orderdata->status == 2): ?>
                <?php
                $status = trans('labels.accepted');
                $color = 'info';
                ?>
                <?php elseif($orderdata->status == 3): ?>
                <?php
                $status = trans('labels.rejected');
                $color = 'danger';
                ?>
                <?php elseif($orderdata->status == 4): ?>
                <?php
                $status = trans('labels.cancelled');
                $color = 'danger';
                ?>
                <?php elseif($orderdata->status == 5): ?>
                <?php
                $status = trans('labels.completed');
                $color = 'success';
                ?>
                <?php endif; ?>
                <span class="badge bg-<?php echo e($color); ?>" tooltip="<?php echo e($status); ?>"><?php echo e($status); ?></span>
            </td>
            <?php if(Auth::user()->type == 2): ?>
            <td>
                <?php if(Auth::user()->type == 2): ?>
                <a href="<?php echo e(URL::to('admin/orders/print/' . $orderdata->order_number)); ?>" class="btn btn-sm btn-success btn-success btn-size" tooltip="<?php echo e(trans('labels.print')); ?>">
 
                    <i class="fa-solid fa-print"></i>
                </a>
                <?php endif; ?>
                <a class="btn btn-sm btn-dark btn-size" tooltip="<?php echo e(trans('labels.view')); ?>" href="<?php echo e(URL::to('admin/orders/invoice/' . $orderdata->order_number)); ?>">    <i class="fa-regular fa-eye"></i> 
                </a>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/orders/export-excel-orders-vendor-rceived.blade.php ENDPATH**/ ?>