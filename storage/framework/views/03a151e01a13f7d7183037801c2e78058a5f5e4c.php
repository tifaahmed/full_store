
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('storage/app/public/admin-assets/css/timepicker/jquery.timepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="coo-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.working_hours')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-7">
        <div class="card border-0 mt-2">
            <div class="card-body">
                <form action="<?php echo e(URL::to('/admin/time/store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row border-bottom pb-4 pb-lg-0">
                        <div class="col-12 col-md-8 col-xl-6 mb-lg-4 md-1">
                            <label class="form-label">
                                <?php echo e(trans('labels.time_interval')); ?>

                                <span class="text-danger"> *</span>
                            </label>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-50 time-interval <?php echo e(session()->get('direction') == 2 ? 'input-group-rtl' : ''); ?>" name="interval_time"
                                        placeholder="<?php echo e(trans('labels.time_interval')); ?>" aria-describedby="button-addon2"
                                        value="<?php echo e($settingsdata->interval_time); ?>" required>
                                    <select name="interval_type" class="form-select w-25 working-hoursselect" id="">
                                        <option value="1" <?php echo e($settingsdata->interval_type == 1 ?'selected' : ''); ?>>
                                            <?php echo e(trans('labels.minute')); ?></option>
                                        <option value="2" <?php echo e($settingsdata->interval_type == 2 ?'selected' : ''); ?>>
                                            <?php echo e(trans('labels.hour')); ?></option>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['interval_time'];
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
                    <div class="row pt-2 pt-md-3">
                        <label class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block">Day</label>
                        <label
                            class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block"><?php echo e(trans('labels.opening_time')); ?></label>
                        <label
                            class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block"><?php echo e(trans('labels.break_start')); ?></label>
                        <label
                            class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block"><?php echo e(trans('labels.break_end')); ?></label>
                        <label
                            class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block"><?php echo e(trans('labels.closing_time')); ?></label>
                        <label
                            class="col-md-2 text-satrt mb-3 d-none d-lg-block d-xl-block d-xxl-block"><?php echo e(trans('labels.always_closed')); ?></label>
                    </div>
                    <?php $__currentLoopData = $gettime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row my-2">
                            <div class="form-group col-md-2">
                                <label class="form-label text-center fw-bold">
                                    <?php if(strtolower($time->day) == 'monday'): ?>
                                        <?php echo e(trans('labels.monday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'tuesday'): ?>
                                        <?php echo e(trans('labels.tuesday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'wednesday'): ?>
                                        <?php echo e(trans('labels.wednesday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'thursday'): ?>
                                        <?php echo e(trans('labels.thursday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'friday'): ?>
                                        <?php echo e(trans('labels.friday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'saturday'): ?>
                                        <?php echo e(trans('labels.saturday')); ?>

                                    <?php endif; ?>
                                    <?php if(strtolower($time->day) == 'sunday'): ?>
                                        <?php echo e(trans('labels.sunday')); ?>

                                    <?php endif; ?>
                                </label>
                            </div>

                            <input type="hidden" name="day[]" value="<?php echo e($time->day); ?>">
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control timepicker"
                                    placeholder="<?php echo e(trans('labels.opening_time')); ?>" id="open<?php echo e($time->day); ?>"
                                    name="open_time[]"
                                    <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->open_time); ?>" 
                                                <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control timepicker"
                                    placeholder="<?php echo e(trans('labels.break_start')); ?>" id="break_start<?php echo e($time->day); ?>"
                                    name="break_start[]" <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->break_start); ?>" 
                                                <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control timepicker"
                                    placeholder="<?php echo e(trans('labels.break_end')); ?>" id="break_end<?php echo e($time->day); ?>"
                                    name="break_end[]" <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->break_end); ?>" 
                                                <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control timepicker"
                                    placeholder="<?php echo e(trans('labels.closing_time')); ?>" id="close<?php echo e($time->day); ?>"
                                    name="close_time[]"
                                    <?php if($time->is_always_close == '2'): ?> value="<?php echo e($time->close_time); ?>" 
                                                <?php else: ?> value="<?php echo e(trans('labels.closed')); ?>" readonly="" <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-2">
                                <select class="form-control form-select" name="is_always_close[]"
                                    id="is_always_close<?php echo e($time->day); ?>">
                                    <option value="" disabled><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1" <?php if($time->is_always_close == '1'): ?> selected <?php endif; ?>>
                                        <?php echo e(trans('messages.yes')); ?></option>
                                    <option value="2" <?php if($time->is_always_close == '2'): ?> selected <?php endif; ?>>
                                        <?php echo e(trans('messages.no')); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group col-md-12 text-end">
                        <button
                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                            class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('storage/app/public/admin-assets/js/timepicker/jquery.timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/workinghours.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/otherpages/time.blade.php ENDPATH**/ ?>