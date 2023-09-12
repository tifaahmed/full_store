<?php $__env->startSection('content'); ?>
<div class="row settings mb-7">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.language-settings')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('/admin/language-settings/language/add')); ?>" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>
                    <?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-3">
        <div class="card card-sticky-top border-0">
            <div class="card-body">
                <ul class="list-group list-options">
                    <?php $__currentLoopData = $getlanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(URL::to('admin/language-settings/'.$data->code)); ?>" class="list-group-item basicinfo p-3 list-item-primary mb-2 <?php if($currantLang->code == $data->code): ?> active  <?php endif; ?>" aria-current="true">
                        <div class="d-flex justify-content-between align-item-center">
                            <?php echo e($data->name); ?>

                            <div class="d-flex align-item-center">
                                <?php if($data->is_default == '1'): ?>
                                <span><?php echo e(trans('labels.default')); ?></span>
                                <?php endif; ?>
                                <i class="fa-regular fa-angle-right ps-2"></i>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="dropdown">
            <?php
            $title = $currantLang->layout == 1 ? trans('labels.ltr') : trans('labels.rtl') ;
            ?>
            <button class="btn btn-secondary dropdown-toggle rounded-5 px-4 rtlbtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo e($title); ?>

            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <?php if($currantLang->layout == 1): ?>
                <a class="dropdown-item w-auto" <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/layout/update-' . $currantLang->id . '/2')); ?>')" <?php endif; ?>> <?php echo e(trans('labels.rtl')); ?> </a>
                <?php else: ?>
                <a class="dropdown-item w-auto" <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/layout/update-' . $currantLang->id . '/1')); ?>')" <?php endif; ?>> <?php echo e(trans('labels.ltr')); ?> </a>
                <?php endif; ?>
            </ul>

            <a class="btn btn-info text-white rounded-5 px-4 mx-2 bg-dark border-0" href="<?php echo e(URL::to('/admin/language-settings/language/edit-'.$currantLang->id)); ?>"> <?php echo e(trans('labels.edit')); ?> </a>
            <?php if(Strtolower($currantLang->name) != "english"): ?>
            <a class="btn btn-danger rounded-5 px-4 text-white bg-danger border-0" <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/language-settings/layout/status-' . $currantLang->id . '/2')); ?>')" <?php endif; ?>> <?php echo e(trans('labels.delete')); ?> </a>
            <?php endif; ?>
        </div>
        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="labels-tab" data-bs-toggle="tab" data-bs-target="#labels" type="button" role="tab" aria-controls="labels" aria-selected="true">Labels</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab" aria-controls="message" aria-selected="false">Messages</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="landing-tab" data-bs-toggle="tab" data-bs-target="#landing" type="button" role="tab" aria-controls="landing" aria-selected="false">Landing</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="labels" role="tabpanel" aria-labelledby="labels-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="currantLang" value="<?php echo e($currantLang->code); ?>">
                            <input type="hidden" class="form-control" name="file" value="label">
                            <div class="row">
                                <?php $__currentLoopData = $arrLabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input"><?php echo e($label); ?> </label>
                                        <input type="text" class="form-control" name="label[<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <?php if(env('Environment') == 'sendbox'): ?>
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="currantLang" value="<?php echo e($currantLang->code); ?>">
                            <input type="hidden" class="form-control" name="file" value="message">
                            <div class="row">
                                <?php $__currentLoopData = $arrMessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input"><?php echo e($label); ?> </label>
                                        <input type="text" class="form-control" name="message[<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <?php if(env('Environment') == 'sendbox'): ?>
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="landing" role="tabpanel" aria-labelledby="landing-tab">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form method="post" action="<?php echo e(URL::to('admin/language-settings/update')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="currantLang" value="<?php echo e($currantLang->code); ?>">
                            <input type="hidden" class="form-control" name="file" value="landing">
                            <div class="row">
                                <?php $__currentLoopData = $arrLanding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="example3cols1Input"><?php echo e($label); ?> </label>
                                        <input type="text" class="form-control" name="landing[<?php echo e($label); ?>]" value="<?php echo e($value); ?>">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <?php if(env('Environment') == 'sendbox'): ?>
                                            <button type="button" class="btn btn-success btn-succes m-1" onclick="myFunction()"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-success btn-succes m-1"><i class="fa fa-check-square-o"></i> <?php echo e(trans('labels.save')); ?> </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/settings.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/language/index.blade.php ENDPATH**/ ?>