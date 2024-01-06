


<div id="whatsappmessagesettings" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                    <i class="fa-brands fa-whatsapp fs-5"></i>
                    <h5 class="px-2"><?php echo e(trans('labels.whatsapp_message_settings')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(URL::to('admin/settings/whatsapp_update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label fw-bold"><?php echo e(trans('labels.order_variable')); ?>

                                    </label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">Order No :
                                                    <code>{order_no}</code>
                                                </li>
                                                <li class="list-group-item px-0">Payment type :
                                                    <code>{payment_type}</code>
                                                </li>
                                                <li class="list-group-item px-0">Subtotal :
                                                    <code>{sub_total}</code>
                                                </li>
                                                <li class="list-group-item px-0">Total Tax :
                                                    <code>{total_tax}</code>
                                                </li>
                                                <li class="list-group-item px-0">Delivery
                                                    charge : <code>{delivery_charge}</code></li>
                                                <li class="list-group-item px-0">Discount
                                                    amount : <code>{discount_amount}</code></li>
                                                <li class="list-group-item px-0">Grand total :
                                                    <code>{grand_total}</code>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">Customer name
                                                    : <code>{customer_name}</code></li>
                                                <li class="list-group-item px-0">Customer
                                                    mobile : <code>{customer_mobile}</code></li>
                                                <li class="list-group-item px-0">Address :
                                                    <code>{address}</code>
                                                </li>
                                                <li class="list-group-item px-0">Building :
                                                    <code>{building}</code>
                                                </li>
                                                <li class="list-group-item px-0">Landmark :
                                                    <code>{landmark}</code>
                                                </li>
                                                <li class="list-group-item px-0">Postal code :
                                                    <code>{postal_code}</code>
                                                </li>
                                                <li class="list-group-item px-0">Delivery type
                                                    : <code>{delivery_type}</code></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">Notes :
                                                    <code>{notes}</code>
                                                </li>
                                                <li class="list-group-item px-0">Item Variable
                                                    : <code>{item_variable}</code></li>
                                                <li class="list-group-item px-0">Time :
                                                    <code>{time}</code>
                                                </li>
                                                <li class="list-group-item px-0">Date :
                                                    <code>{date}</code>
                                                </li>
                                                <li class="list-group-item px-0">Store name :
                                                    <code>{store_name}</code>
                                                </li>
                                                <li class="list-group-item px-0">Store URL :
                                                    <code>{store_url}</code>
                                                </li>
                                                <li class="list-group-item px-0">Track order
                                                    URL : <code>{track_order_url}</code></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label fw-bold"><?php echo e(trans('labels.item_variable')); ?>

                                    </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">Item name :
                                                    <code>{item_name}</code>
                                                </li>
                                                <li class="list-group-item px-0">QTY :
                                                    <code>{qty}</code>
                                                </li>
                                                <li class="list-group-item px-0">Variants :
                                                    <code>{variantsdata}</code>
                                                </li>
                                                <li class="list-group-item px-0">Item price :
                                                    <code>{item_price}</code>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <input type="text" name="item_message" class="form-control" placeholder="<?php echo e(trans('labels.item_message')); ?>" value="<?php echo e(@$settingdata->item_message); ?>">
                                                    <?php $__errorArgs = ['item_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger" id="timezone_error"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label fw-bold"><?php echo e(trans('labels.whatsapp_message')); ?>

                                        <span class="text-danger"> * </span> </label>
                                    <textarea class="form-control" required="required" name="whatsapp_message" cols="50" rows="10"><?php echo e(@$settingdata->whatsapp_message); ?></textarea>
                                    <?php $__errorArgs = ['whatsapp_message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(trans('labels.contact')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="contact" value="<?php echo e(@$settingdata->contact); ?>" placeholder="<?php echo e(trans('labels.contact')); ?>" required>
                                    <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes mt-3" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/admin/whatsapp_message/setting_form.blade.php ENDPATH**/ ?>