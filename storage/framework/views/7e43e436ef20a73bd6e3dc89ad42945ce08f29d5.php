

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col-12 col-md-6">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.custom_domains')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-end">
                <?php if(Auth::user()->type == 2): ?>
                    <a href="<?php echo e(URL::to('admin/custom_domain/add')); ?>"
                        class="btn-add"><?php echo e(trans('labels.request_custom_domain')); ?></a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if(Auth::user()->type == 2): ?>
                            <?php echo $__env->make('admin.customdomain.customdomain_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if(Auth::user()->type == 1): ?>
                            <?php echo $__env->make('admin.customdomain.listcustomdomain_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                    <?php if(Auth::user()->type == 2): ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <?php echo e($setting->cname_title); ?>

                            </div>
                            <div class="card-body">
                                <p class="card-text"> <?php echo $setting->cname_text; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/customdomain/customdomain.blade.php ENDPATH**/ ?>