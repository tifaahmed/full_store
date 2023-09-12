<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.addons_manager')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-12 col-md-8">
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(URL::to('/admin/createsystem-addons')); ?>" class="btn btn-primary">
                <?php echo e(trans('labels.install_update_addons')); ?>

            </a>
        </div>
    </div>
</div>
<div class="card mb-3 border-0 shadow">
    <div class="card-body py-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6">
                <h5 class="card-title mb-1 fw-bold">Buy More Premium Addons</h5>
                <p class="text-muted fw-medium">Connect your favorite tools.</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-3">
                <a href="https://rb.gy/40qzq" target="_blank" class="btn btn-primary">Buy More Premium Addons</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-7">
    <div class="col-md-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-1 fw-bold">Installed Addons </h5>
                    <?php if(env('Environment')=='sendbox' ): ?>
                    <p class="fw-bolder d-flex align-items-center gap-2 border border-dark p-2 rounded-2 ">
                        <span class="badge badge icon_circle text-success border border-dark icon_circle">
                            <i class="fa-solid fa-bolt fs-6"></i>
                        </span>
                        Free with Extended License
                        <span class="badge badge icon_circle text-danger border border-dark icon_circle">
                            <i class="fa-solid fa-money-check-dollar fs-6"></i>
                        </span>
                        Premium 
                    </p>
                    <?php endif; ?>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3 addons-manager ">
                    <?php $__empty_1 = true; $__currentLoopData = App\Models\SystemAddons::where('unique_identifier', '!=' ,'subscription')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col col-md-6 col-lg-6 col-xl-3">
                        <div class="card h-100 rounded-3">
                            <img src="<?php echo URL('storage/app/public/addons/' . $addon->image); ?>" alt="">

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">

                                    <span class="badge bg-primary mb-2 fw-400 fs-8"><?php echo e($addon->version); ?></span>
                                    <?php if(env('Environment')=='sendbox' ): ?>
                                    <p class="fw-bolder d-flex align-items-center gap-2">
                                        <?php if($addon->type == 1): ?>
                                        <span class="badge badge icon_circle text-success border border-dark icon_circle" tooltip="Free with Extended License">
                                            <i class="fa-solid fa-bolt fs-6"></i>
                                        </span>
                                        <?php else: ?>
                                        <span class="badge badge icon_circle text-danger border border-dark icon_circle" tooltip="Premium">
                                            <i class="fa-solid fa-money-check-dollar fs-6"></i>
                                        </span>
                                        <?php endif; ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="card-title fw-600 fs-5 line-limit-2"><?php echo e(ucfirst($addon->name)); ?></h5>
                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                <p class="text-muted fs-7 fw-500">
                                    <?php echo e(date('d M Y', strtotime($addon->created_at))); ?>

                                </p>
                                <?php if($addon->activated == 1): ?>
                                <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/systemaddons/status-' . $addon->id . '/2')); ?>')" <?php endif; ?> class="btn btn-sm btn-success <?php echo e(session()->get('direction') == 2 ? 'float-start' : 'float-end'); ?>"><?php echo e(trans('labels.activated')); ?></a>
                                <?php else: ?>
                                <a <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/systemaddons/status-' . $addon->id . '/1')); ?>')" <?php endif; ?> class="btn btn-sm btn-danger <?php echo e(session()->get('direction') == 2 ? 'float-start' : 'float-end'); ?>"><?php echo e(trans('labels.deactivated')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col col-md-12 text-center text-muted">
                        <h4><?php echo e(trans('labels.no_data')); ?></h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/assets/js/custom/systemaddons.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/apps/index.blade.php ENDPATH**/ ?>