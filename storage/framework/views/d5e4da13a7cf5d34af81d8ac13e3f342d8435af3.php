<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2 align-items-center"><?php echo e(request()->is('admin/report*') ? trans('labels.report') :
                trans('labels.orders')); ?>

            </h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
        <div class="col-12 col-md-8">
            <?php if(request()->is('admin/report*')): ?>
            <form action="<?php echo e(URL::to('/admin/report')); ?>" class="mb-">
                <div class="input-group col-md-12 ps-0 justify-content-end">
                    <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                        <input type="date" class="form-control rounded-5 px-4 bg-white" name="startdate" <?php if(isset($_GET['startdate'])): ?>
                            value="<?php echo e($_GET['startdate']); ?>" <?php endif; ?> required>
                    </div>
                    <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                        <input type="date" class="form-control rounded-5 px-4 bg-white" name="enddate" <?php if(isset($_GET['enddate'])): ?>
                            value="<?php echo e($_GET['enddate']); ?>" <?php endif; ?> required>
                    </div>
                    <div class="input-group-append pb-2 pb-xl-0 px-1">
                        <button class="btn btn-primary rounded-5 px-4" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
   
    <?php echo $__env->make('admin.orders.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <div class="row  align-items-center mb-3">
                            <div class="col-12 col-md-2">
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo e(URL::to('admin/features/add')); ?>" class="btn-add">
                                        <i class="far fa-file-export"></i> <?php echo e(trans('labels.pdf')); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo e(URL::to('admin/features/add')); ?>" class="btn-add">
                                        <i class="far fa-file-export"></i> <?php echo e(trans('labels.excel')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e($getorders->onEachSide(5)->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>