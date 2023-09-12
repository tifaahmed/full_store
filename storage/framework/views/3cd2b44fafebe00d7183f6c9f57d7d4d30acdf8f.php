<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="row mb-7">

        <div class="card border-0 box-shadow mb-3">

            <div class="card-body">

                <form action="<?php echo e(URL::to('admin/users/update-' . $getuserdata->slug)); ?>" method="post"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="hidden" value="<?php echo e($getuserdata->id); ?>" name="id">
                            <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> *
                                </span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($getuserdata->name); ?>"
                                placeholder="<?php echo e(trans('labels.name')); ?>" required>
                            <?php $__errorArgs = ['name'];
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
                        <div class="col-sm-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> *
                                </span></label>
                            <input type="email" class="form-control" name="email" value="<?php echo e($getuserdata->email); ?>"
                                placeholder="<?php echo e(trans('labels.email')); ?>" required>
                            <?php $__errorArgs = ['email'];
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

                        <div class="col-sm-6 form-group">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> *
                                    </span></label>
                                <input type="number" class="form-control" name="mobile"
                                    value="<?php echo e($getuserdata->mobile); ?>" placeholder="<?php echo e(trans('labels.mobile')); ?>"
                                    required>
                                <?php $__errorArgs = ['mobile'];
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
                        <div class="col-sm-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.image')); ?> (250 x 250) </label>
                            <input type="file" class="form-control" name="profile">
                            <img class="rounded-circle mb-2" src="<?php echo e(helper::image_path($getuserdata->image)); ?>"
                                alt="" width="70" height="70">
                            <?php $__errorArgs = ['profile'];
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
                        <div class="form-group col-md-6">
                            <label for="city" class="form-label"><?php echo e(trans('labels.city')); ?><span
                                    class="text-danger"> * </span></label>
                            <select name="city" class="form-select" id="city" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->id); ?>"
                                        <?php echo e($city->id == $getuserdata->city_id ? 'selected' : ''); ?>>
                                        <?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="area" class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger">
                                    * </span></label>
                            <select name="area" class="form-select" id="area" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                            </select>
                        </div>
                        <div class=" col-sm-6">
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                <div class="form-group" id="plan">
                                    <?php
                                        $plan = helper::plandetail(@$getuserdata->plan_id);
                                    ?>
                                    <div class="d-flex">
                                        <input class="form-check-input mx-1" type="checkbox" name="plan_checkbox"
                                            id="plan_checkbox">
                                        <div>
                                            <label for="plan_checkbox"
                                                class="form-label"><?php echo e(trans('labels.assign_plan')); ?></label>&nbsp;<span>(<?php echo e(trans('labels.current_plan')); ?>&nbsp;:&nbsp;</span>
                                            <span class="fw-500"> <?php echo e(!empty($plan) ? $plan->name : '-'); ?>)</span>
                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span
                                                    class="badge badge bg-danger ms-2 mb-0"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <select name="plan" id="selectplan" class="form-select" disabled>
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $getplanlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($plan->id); ?>">
                                                <?php echo e($plan->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>

                                <div class="form-group d-flex">
                                    <input class="form-check-input mx-1" type="checkbox" name="allow_store_subscription"
                                        id="allow_store_subscription" <?php if($getuserdata->allow_without_subscription == '1'): ?> checked <?php endif; ?>>
                                    <div>
                                        <label class="form-check-label"
                                            for="allow_store_subscription"><?php echo e(trans('labels.allow_store_without_subscription')); ?>

                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <input class="form-check-input mx-1" type="checkbox" name="show_landing_page"
                                    id="show_landing_page" <?php if($getuserdata->available_on_landing == '1'): ?> checked <?php endif; ?>><label
                                    class="form-check-label"
                                    for="show_landing_page"><?php echo e(trans('labels.display_store_on_landing')); ?></label>

                            </div>
                        </div>
                        <div class="form-group text-end">
                            <a href="<?php echo e(URL::to('admin/users')); ?>"
                                class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                            <button
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('labels.select')); ?>";
        var areaid = "<?php echo e($getuserdata->area_id); ?>";
    </script>
    <script src="<?php echo e(url('storage/app/public/admin-assets/js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>