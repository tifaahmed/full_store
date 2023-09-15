<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-lg-0">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/coupons/store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name"><?php echo e(trans('labels.coupon_name')); ?><span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('labels.enter_name')); ?>" name="name" id="name" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="name"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="code"><?php echo e(trans('labels.coupon_code')); ?><span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('labels.enter_name')); ?>" name="code" id="code" required>
                                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="code"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="price"><?php echo e(trans('labels.amount')); ?><span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('labels.enter_price')); ?>" name="price" id="price" required>
                                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="price"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="limit"><?php echo e(trans('labels.usage_limit')); ?> <span class="text-danger"> *
                                    </span></label>
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('labels.limit_number')); ?>" name="limit" id="limit" required>
                                    <?php $__errorArgs = ['limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="limit"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="active_from"><?php echo e(trans('labels.start_date')); ?> <span class="text-danger"> *
                                    </span></label>
                                    <input type="date" class="form-control"
                                        placeholder="<?php echo e(trans('labels.enter_active_from')); ?>" name="active_from"
                                        id="active_from" required>
                                    <?php $__errorArgs = ['active_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="active_from"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="active_to"><?php echo e(trans('labels.end_date')); ?> <span class="text-danger"> *
                                    </span></label>
                                    <input type="date" class="form-control"
                                        placeholder="<?php echo e(trans('labels.enter_active_to')); ?>" name="active_to"
                                        id="active_to" required>
                                    <?php $__errorArgs = ['active_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger" id="active_to"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label"><?php echo e(trans('labels.items')); ?><span class="text-danger"> * </span></label>
                                <select name="items_ids[]" class="form-select" required multiple>
                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-end">
                            <a type="button" class="btn btn-danger btn-cancel m-1" href="<?php echo e(route('coupons')); ?>"><i
                                    class="ft-x"></i> <?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-success btn-succes m-1" <?php if(env('Environment') == 'sendbox'): ?> type="button"
                                onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/coupons/add.blade.php ENDPATH**/ ?>