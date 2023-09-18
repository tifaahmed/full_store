<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500 py-3">
            <td><?php echo e(trans('labels.srno')); ?></td>
            <?php if(request()->is('admin/customers*') && (Auth::user()->type == 1)): ?>
            <td><?php echo e(trans('labels.vendor_title')); ?></td>
            <?php endif; ?>
            <td><?php echo e(trans('labels.order_number')); ?></td>
            <td><?php echo e(trans('labels.date_time')); ?></td>
            <td><?php echo e(trans('labels.grand_total')); ?></td>
            <td><?php echo e(trans('labels.payment_type')); ?></td>
            <td><?php echo e(trans('labels.status')); ?></td>
            <?php if(Auth::user()->type == 2): ?>
            <td><?php echo e(trans('labels.action')); ?></td>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($orderdata->id); ?>" class="fs-7">
            <td><?php echo $i++; ?></td>
            <?php if(request()->is('admin/customers*') && (Auth::user()->type == 1)): ?>
            <td><?php echo e($orderdata['vendorinfo']->name); ?></td>
            <?php endif; ?>
            <td> 
                <a class="text-dark fw-700" href="<?php echo e(URL::to('admin/orders/invoice/' . $orderdata->order_number)); ?>"> #<?php echo e($orderdata->order_number); ?> </a>
            </td>
            <td>
                <?php if($orderdata->order_type == 3): ?>
                    <?php echo e(helper::date_format($orderdata->created_at)); ?>

                <?php else: ?>
                    <?php echo e(helper::date_format($orderdata->delivery_date)); ?> <br>
                    <?php echo e($orderdata->delivery_time); ?>

                <?php endif; ?>

            </td>
            <td><?php echo e(helper::currency_formate($orderdata->grand_total, Auth::user()->id)); ?></td>
            <td>
                
                <?php if($orderdata->payment_type == 1): ?>
                <?php echo e(trans('labels.cod')); ?>

                <?php elseif($orderdata->payment_type == 2): ?>
                <?php echo e(trans('labels.razorpay')); ?>

                <?php elseif($orderdata->payment_type == 3): ?>
                <?php echo e(trans('labels.stripe')); ?>

                <?php elseif($orderdata->payment_type == 4): ?>
                <?php echo e(trans('labels.flutterwave')); ?>

                <?php elseif($orderdata->payment_type == 5): ?>
                <?php echo e(trans('labels.paystack')); ?>

                <?php elseif($orderdata->payment_type == 7): ?>
                <?php echo e(trans('labels.mercadopago')); ?>

                <?php elseif($orderdata->payment_type == 8): ?>
                <?php echo e(trans('labels.paypal')); ?>

                <?php elseif($orderdata->payment_type == 9): ?>
                <?php echo e(trans('labels.myfatoorah')); ?>

                <?php elseif($orderdata->payment_type == 10): ?>
                <?php echo e(trans('labels.toyyibpay')); ?>

                <?php elseif($orderdata->payment_type == 0): ?>
                <?php echo e(trans('labels.online')); ?>

                <?php endif; ?>
                <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10])): ?>
                : <?php echo e($orderdata->payment_id); ?>

                <?php endif; ?>
            </td>
            <td>
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
</table><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/orders/orderstable.blade.php ENDPATH**/ ?>