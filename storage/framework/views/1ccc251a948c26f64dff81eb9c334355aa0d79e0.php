<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.transaction')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <form action="<?php echo e(URL::to('/admin/transaction')); ?> " method="get">
                <div class="input-group ps-0 justify-content-end gap-2">
                    <?php if(Auth::user()->type == 1): ?>
                        <select class="form-select transaction-select rounded-5" name="vendor">
                            <option value=""
                                data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                selected><?php echo e(trans('labels.select')); ?></option>
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vendor->id); ?>"
                                    data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                    <?php echo e(request()->get('vendor') == $vendor->id ? 'selected' : ''); ?>>
                                    <?php echo e($vendor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php endif; ?>
                    <div class="input-group-append col-auto pb-2">
                        <input type="date" class="form-control rounded-5 px-4 bg-white mb-0" name="startdate"
                            value="<?php echo e(request()->get('startdate')); ?>">
                    </div>
                    <div class="input-group-append col-auto pb-2">
                        <input type="date" class="form-control rounded-5 px-4 bg-white mb-0" name="enddate"
                            value="<?php echo e(request()->get('enddate')); ?>">
                    </div>
                    <div class="input-group-append pb-2">
                        <button class="btn btn-primary rounded-5 px-4" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                    </div>
                </div>
            </form>
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
                                    <?php if(Auth::user()->type == '1'): ?>
                                        <td><?php echo e(trans('labels.name')); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e(trans('labels.plan_name')); ?></td>
                                    <td><?php echo e(trans('labels.amount')); ?></td>
                                    <td><?php echo e(trans('labels.payment_type')); ?></td>
                                    <td><?php echo e(trans('labels.purchase_date')); ?></td>
                                    <td><?php echo e(trans('labels.expire_date')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <?php if(Auth::user()->type == '1'): ?>
                                        <td><?php echo e(trans('labels.action')); ?></td>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $i = 1;
                                    
                                ?>
                                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7">
                                        <td><?php echo $i++; ?></td>
                                        <?php if(Auth::user()->type == '1'): ?>
                                            <td><?php echo e($transaction['vendor_info']->name); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($transaction['plan_info']->name); ?></td>
                                        <td><?php echo e(helper::currency_formate($transaction->amount, '')); ?></td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php echo e(trans('labels.' . $transaction->payment_type)); ?>

                                                : <small><a href="<?php echo e(helper::image_path($transaction->screenshot)); ?>"
                                                        target="_blank"
                                                        class="text-danger"><?php echo e(trans('labels.click_here')); ?></a></small>
                                            <?php elseif($transaction->payment_type != ''): ?>
                                                
                                                <?php if($transaction->payment_type == 1): ?>
                                                    <?php echo e(trans('labels.offline')); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 2): ?>
                                                    <?php echo e(trans('labels.razorpay')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 3): ?>
                                                    <?php echo e(trans('labels.stripe')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 4): ?>
                                                    <?php echo e(trans('labels.flutterwave')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 5): ?>
                                                    <?php echo e(trans('labels.paystack')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 7): ?>
                                                    <?php echo e(trans('labels.mercadopago')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 8): ?>
                                                    <?php echo e(trans('labels.paypal')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 9): ?>
                                                    <?php echo e(trans('labels.myfatoorah')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                                <?php if($transaction->payment_type == 10): ?>
                                                    <?php echo e(trans('labels.toyyibpay')); ?> : <?php echo e($transaction->payment_id); ?>

                                                <?php endif; ?>
                                            <?php elseif($transaction->amount == 0): ?>
                                                -
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 2): ?>
                                                    <span
                                                        class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date)); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span
                                                    class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date)); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 2): ?>
                                                    <span
                                                        class="badge bg-danger"><?php echo e($transaction->expire_date != "" ? helper::date_format($transaction->expire_date) :'-'); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span
                                                    class="badge bg-danger"><?php echo e($transaction->expire_date != "" ? helper::date_format($transaction->expire_date) : '-'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                <?php if($transaction->status == 1): ?>
                                                    <span class="badge bg-warning"><?php echo e(trans('labels.pending')); ?></span>
                                                <?php elseif($transaction->status == 2): ?>
                                                    <span class="badge bg-success"><?php echo e(trans('labels.accepted')); ?></span>
                                                <?php elseif($transaction->status == 3): ?>
                                                    <span class="badge bg-danger"><?php echo e(trans('labels.rejected')); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Auth::user()->type == '1'): ?>
                                            <td>
                                                <?php if($transaction->payment_type == 'banktransfer'): ?>
                                                    <?php if($transaction->status == 1): ?>
                                                        <a class="btn btn-sm btn-outline-success"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-2')); ?>')" tooltip="<?php echo e(trans('labels.accept')); ?>"><i
                                                                class="fas fa-check"></i></a>
                                                        <a class="btn btn-sm btn-outline-danger"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-3')); ?>')" tooltip="<?php echo e(trans('labels.cancel')); ?>"><i
                                                                class="fas fa-close"></i></a>
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/transaction/transaction.blade.php ENDPATH**/ ?>