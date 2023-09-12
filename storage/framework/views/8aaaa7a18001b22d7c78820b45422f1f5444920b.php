<?php $__env->startSection('content'); ?>
<div class="row align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.payment_settings')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<div class="row g-3 mb-7">

    <?php
    $payment_array = ['myfatoorah,mercado_pago','paypal','toyyibpay'];
    ?>

    <?php $__currentLoopData = $getpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pmdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php

    $transaction_type = strtolower($pmdata->payment_name);

    $image_tag_name = $transaction_type . '_image';

    ?>

    <div class="col-md-12 col-lg-12 col-xl-6 <?php echo e($transaction_type == 'cod' && Auth::user()->type == 1 ? 'd-none' : ''); ?> <?php echo e($transaction_type == 'banktransfer' && Auth::user()->type == 2 ? 'd-none' : ''); ?>">
        <form action="<?php echo e(URL::to('admin/payment/update')); ?>" method="POST" class="" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="transaction_type" value="<?php echo e($pmdata->id); ?>">
            <div class="card h-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img src="<?php echo e(helper::image_path($pmdata->image)); ?>" alt="" class="img-fluid rounded me-2" height="30" width="30">
                            <b>
                                <?php echo e($transaction_type); ?>


                                <?php if(
                                $transaction_type == 'mercadopago' ||
                                $transaction_type == 'myfatoorah' ||
                                $transaction_type == 'paypal' ||
                                $transaction_type == 'toyyibpay'): ?>

                                <?php if(env('Environment') == 'sendbox'): ?>
                                <span class="badge badge bg-danger ms-2"><?php echo e(trans('labels.addon')); ?></span>
                                <?php endif; ?>



                                <?php endif; ?>
                            </b>
                        </div>
                        <div>
                            <input id="checkbox-switch-<?php echo e($transaction_type); ?>" type="checkbox" class="checkbox-switch" name="is_available" value="1" <?php echo e($pmdata->is_available == 1 ? 'checked' : ''); ?>>
                            <label for="checkbox-switch-<?php echo e($transaction_type); ?>" class="switch">
                                <span class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span class="switch__circle-inner"></span></span>
                                <span class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                <span class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if(!in_array($transaction_type,['cod'])): ?>

                        <?php if($transaction_type == 'banktransfer'): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_name" class="form-label"> <?php echo e(trans('labels.bank_name')); ?> <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="bank_name" class="form-control" name="bank_name" placeholder="<?php echo e(trans('labels.bank_name')); ?>" value="<?php echo e($pmdata->bank_name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_holder_name" class="form-label"> <?php echo e(trans('labels.account_holder_name')); ?> <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="account_holder_name" class="form-control" name="account_holder_name" placeholder="<?php echo e(trans('labels.account_holder_name')); ?>" value="<?php echo e($pmdata->account_holder_name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_number" class="form-label"> <?php echo e(trans('labels.account_number')); ?> <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="account_number" class="form-control" name="account_number" placeholder="<?php echo e(trans('labels.account_number')); ?>" value="<?php echo e($pmdata->account_number); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_ifsc_code" class="form-label"> <?php echo e(trans('labels.bank_ifsc_code')); ?> <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="bank_ifsc_code" class="form-control" name="bank_ifsc_code" placeholder="<?php echo e(trans('labels.bank_ifsc_code')); ?>" value="<?php echo e($pmdata->bank_ifsc_code); ?>">
                            </div>
                        </div>

                        <?php else: ?>

                        <div class="col-md-6">
                            <label for="razorpaycurrency" class="form-label">
                                <?php echo e(trans('labels.environment')); ?>

                                <span class="text-danger"> *</span>
                            </label>
                            <div class="d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="environment" id="sandbox-<?php echo e($transaction_type); ?>" value="1" <?php echo e($pmdata->environment == 1 ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="sandbox-<?php echo e($transaction_type); ?>">
                                        <?php echo e(trans('labels.sandbox')); ?>

                                    </label>
                                </div>
                                <div class="form-check form-check-inline mx-3">
                                    <input class="form-check-input" type="radio" name="environment" id="production-<?php echo e($transaction_type); ?>" value="2" <?php echo e($pmdata->environment == 2 ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="production-<?php echo e($transaction_type); ?>">
                                        <?php echo e(trans('labels.production')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="currency" class="form-label"> <?php echo e(trans('labels.currency')); ?> <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="currency" class="form-control" name="currency" placeholder="Currency" value="<?php echo e($pmdata->currency); ?>">
                            </div>
                        </div>


                        <?php if($transaction_type == 'flutterwave'): ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="encryption_key" class="form-label">
                                    <?php echo e(trans('labels.encryption_key')); ?>

                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="text" id="encryption_key" class="form-control" name="encryption_key" placeholder="Encryption Key" value="<?php echo e($pmdata->encryption_key); ?>" <?php echo e($transaction_type == 'flutterwave' ? 'required' : ''); ?>>
                            </div>
                        </div>
                        <?php endif; ?>



                        <div class=" <?php echo e($transaction_type == 'mercadopago' || $transaction_type == 'myfatoorah' ? 'col-md-12' : 'col-md-6'); ?>">
                            <div class="form-group">
                                <label for="secretkey" class="form-label">
                                    <?php echo e(trans('labels.secret_key')); ?>

                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="text" required="" id="secretkey" class="form-control" name="secret_key" placeholder="Secret Key" value="<?php echo e($pmdata->secret_key); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 <?php echo e($transaction_type == 'mercadopago' || $transaction_type == 'myfatoorah' ? 'd-none' : ''); ?>">
                            <div class="form-group">
                                <label for="publickey" class="form-label">
                                    <?php echo e(trans('labels.public_key')); ?>

                                    <span class="text-danger"> *</span></label>
                                <input type="text" id="publickey" class="form-control" name="public_key" placeholder="Public Key" value="<?php echo e($pmdata->public_key); ?>" <?php echo e($transaction_type != 'mercadopago' || $transaction_type != 'myfatoorah' ? 'required' : ''); ?>>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" class="form-label">
                                    <?php echo e(trans('labels.image')); ?>

                                </label>
                                <input type="file" class="form-control" name="image">
                                <img src="<?php echo e(helper::image_path($pmdata->image)); ?>" alt="" class="img-fluid rounded hw-50">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-end">
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/payment/payment.blade.php ENDPATH**/ ?>