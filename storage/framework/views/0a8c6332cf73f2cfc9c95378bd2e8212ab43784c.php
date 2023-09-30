<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.pricing_plans')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end align-items-center">
                <?php if(Auth::user()->type == '1'): ?>
                    <a href="<?php echo e(URL::to('admin/plan/add')); ?>" class="btn-add"> <i
                            class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?> </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
  
    <div class="row mb-7">
        <?php if(count($allplan) > 0): ?>
            <?php $__currentLoopData = $allplan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plandata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mt-3">
                    <div class="card box-shadow border-0 h-100 text-dark plancard">
                        <div class="card-body">
                            <div class="mb-4">
                                <h1 class="mb-4 plan-price"><?php echo e(helper::currency_formate($plandata->price, '')); ?>

                                    <span class="per-month">/
                                        <?php if($plandata->plan_type == 1): ?>
                                            <?php if($plandata->duration == 1): ?>
                                                <?php echo e(trans('labels.one_month')); ?>

                                            <?php elseif($plandata->duration == 2): ?>
                                                <?php echo e(trans('labels.three_month')); ?>

                                            <?php elseif($plandata->duration == 3): ?>
                                                <?php echo e(trans('labels.six_month')); ?>

                                            <?php elseif($plandata->duration == 4): ?>
                                                <?php echo e(trans('labels.one_year')); ?>

                                            <?php elseif($plandata->duration == 5): ?>
                                                <?php echo e(trans('labels.lifetime')); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($plandata->plan_type == 2): ?>
                                            <?php echo e($plandata->days); ?>

                                            <?php echo e($plandata->days > 1 ? trans('labels.days') : trans('labels.day')); ?>

                                        <?php endif; ?>

                                    </span>
                                </h1>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4><?php echo e($plandata->name); ?></h4>
                                </div>
                                <small class="text-muted line-limit-3"><?php echo e(Str::limit($plandata->description, 150)); ?></small>
                            </div>
                            <hr>
                            <ul>
                                <?php $features = explode('|', $plandata->features); ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2">
                                        <?php echo e($plandata->order_limit == -1 ? trans('labels.unlimited') : $plandata->order_limit); ?>

                                        <?php echo e($plandata->order_limit > 1 || $plandata->order_limit == -1 ? trans('labels.products') : trans('labels.product')); ?>

                                    </span>
                                </li>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2">
                                        <?php echo e($plandata->appointment_limit == -1 ? trans('labels.unlimited') : $plandata->appointment_limit); ?>

                                        <?php echo e($plandata->appointment_limit > 1 || $plandata->appointment_limit == -1 ? trans('labels.orders') : trans('labels.order')); ?>

                                    </span>
                                </li>
                                <?php
                                    $themes = [];
                                    if ($plandata->themes_id != '' && $plandata->themes_id != null) {
                                        $themes = explode(',', $plandata->themes_id);
                                } ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2"><?php echo e(count($themes)); ?>

                                        <?php echo e(count($themes) > 1 ? trans('labels.themes') : trans('labels.theme')); ?></span>
                                </li>
                                <?php if($plandata->coupons == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.coupons')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->custom_domain == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.custome_domain_available')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->google_analytics == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.google_analytics_available')); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if($plandata->vendor_app == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.vendor_app_available')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->blogs == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.blogs')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->social_logins == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.social_login')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->sound_notification == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.sound_notification')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->whatsapp_message == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.whatsapp_message')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->telegram_message == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.telegram_message')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->pos == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.pos')); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($plandata->tableqr == 1): ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.tableqr')); ?></span>
                                    </li>
                                <?php endif; ?>


                                
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2"> <?php echo e($feature); ?> </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                        <div class="card-footer bg-white border-top-0 my-2 text-center d-flex justify-content-between align-items-center">

                        


                                <?php if(Auth::user()->type == '1'): ?>
                                        <div>

                                            <a href="<?php echo e(URL::to('admin/plan/edit-' . $plandata->id)); ?>" class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"> 
                                                <i class="fa-regular fa-pen-to-square "></i> </a>
                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <a onclick="myFunction()"> <i class="fa-regular fa-trash"></i></a>
                                            <?php else: ?>
                                                <a
                                                    onclick="statusupdate('<?php echo e(URL::to('admin/plan/delete-' . $plandata->id)); ?>')" tooltip="<?php echo e(trans('labels.delete')); ?>" class="btn btn-sm btn-danger btn-size">
                                                    <i class="fa-regular fa-trash"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>  




                            <?php if(Auth::user()->type == '1'): ?>
                                <?php if(env('Environment') == 'sendbox'): ?>
                                    <?php if($plandata->is_available == 1): ?>
                                        <a onclick="myFunction()"
                                            class="btn btn-success  btn-sm w-50 mt-2 rounded-5"><?php echo e(trans('labels.active')); ?></a>
                                    <?php elseif($plandata->is_available == 2): ?>
                                        <a onclick="myFunction()"
                                            class="btn btn-danger w-50 btn-sm mt-2 rounded-5"><?php echo e(trans('labels.inactive')); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($plandata->is_available == 1): ?>
                                        <a onclick="statusupdate('<?php echo e(URL::to('admin/plan/status_change-' . $plandata->id . '/2')); ?>')"
                                            class="btn btn-success  btn-sm w-50 mt-2 rounded-5"><?php echo e(trans('labels.active')); ?></a>
                                    <?php elseif($plandata->is_available == 2): ?>
                                        <a onclick="statusupdate('<?php echo e(URL::to('admin/plan/status_change-' . $plandata->id . '/1')); ?>')"
                                            class="btn btn-danger w-50 btn-sm mt-2 rounded-5"><?php echo e(trans('labels.inactive')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(Auth::user()->plan_id == $plandata->id): ?>
                                    <?php
                                        $check_vendorplan = helper::checkplan(Auth::user()->id, '');
                                        $data = json_decode(json_encode($check_vendorplan), true);
                                        
                                    ?>
                                  
                                    <?php if(@$data['original']['status'] == '2'): ?>
                                        <?php if($plandata->price > 0): ?>
                                            <?php if(@$plandata->duration == 5): ?>
                                                <small
                                                    class="text-success d-block fw-500 text-start"><span><?php echo e(@$data['original']['plan_message']); ?></span></small>
                                            <?php else: ?>
                                                <?php if(@$data['original']['plan_date'] > date('Y-m-d')): ?>
                                                    <small
                                                        class="text-dark d-block fw-500 text-start"><?php echo e(@$data['original']['plan_message']); ?>

                                                        : <span
                                                            class="text-success"><?php echo e($data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']):''); ?></span>
                                                        </small>
                                                  
                                                <?php else: ?>
                                                    <small
                                                        class="text-dark d-block fw-500 text-start"><?php echo e(@$data['original']['plan_message']); ?>

                                                        : <span
                                                            class="text-danger"><?php echo e($data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) : ''); ?></span>
                                                        </small>
                                                  
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(@$data['original']['showclick'] == 1): ?>
                                                <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                                    class="btn btn-sm d-block mt-2 bg-success text-white rounded-5 px-3"><?php echo e(trans('labels.subscribe')); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(@$data['original']['plan_date'] > date('Y-m-d')): ?>
                                                <small class="text-dark d-block fw-500 text-start"><?php echo e(@$data['original']['plan_message']); ?>

                                                    <span class="text-success">
                                                        <?php echo e($data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']):''); ?>

                                                    </span>
                                                </small>
                                                <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                                    class="btn btn-sm d-block bg-success text-white rounded-5 px-3"><?php echo e(trans('labels.subscribe')); ?></a>
                                            <?php else: ?>
                                                <small class="text-dark d-block fw-500 text-start"><?php echo e(@$data['original']['plan_message']); ?>

                                                    <span class="text-danger">
                                                        <?php echo e($data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) :''); ?></span>
                                                </small>
                                                <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                                    class="btn btn-sm d-block bg-success text-white rounded-5 px-3"><?php echo e(trans('labels.subscribe')); ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php elseif(@$data['original']['status'] == '1'): ?>
                                        <?php if(@$plandata->duration == 5): ?>
                                            <small class="text-dark fw-500 text-start"><span>
                                                    <?php echo e(@$data['original']['plan_message']); ?>

                                                </span>
                                            </small>
                                        <?php else: ?>
                                            <?php if($data['original']['plan_date'] != ''): ?>
                                                <small class="text-dark fw-500 text-start">
                                                    <?php echo e(@$data['original']['plan_message']); ?>: <span
                                                        class="text-success"><?php echo e($data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) : ''); ?></span>
                                                </small>
                                                <div class="d-flex justify-content-end w-100">
                                                    <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                                        class="btn btn-sm bg-success text-white rounded-5 px-3 d-block">
                                                        <?php echo e(trans('labels.subscribe')); ?>

                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <small
                                                    class="text-success"><?php echo e(@$data['original']['plan_message']); ?></small>
                                                <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                                    class="btn btn-sm bg-success text-white rounded-5 px-3 d-block"><?php echo e(trans('labels.subscribe')); ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($plandata->price > 0): ?>
                                    <div class="d-flex justify-content-end w-100">
                                        <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                            class="btn btn-sm bg-success text-white rounded-5 px-3 d-block"><?php echo e(trans('labels.subscribe')); ?></a>
                                    </div>
                                    <?php elseif((float) Auth::user()->purchase_amount > $plandata->price): ?>
                                        <small class="text-danger d-block fw-500 text-start"><?php echo e(trans('labels.already_used')); ?></small>
                                    <?php else: ?>
                                    <div class="d-flex justify-content-end w-100">
                                        <a href="<?php echo e(URL::to('admin/plan/selectplan-' . $plandata->id)); ?>"
                                            class="btn btn-sm bg-success text-white rounded-5 px-3 d-block"><?php echo e(trans('labels.subscribe')); ?></a>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make('admin.layout.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/full_store/resources/views/admin/plan/plan.blade.php ENDPATH**/ ?>