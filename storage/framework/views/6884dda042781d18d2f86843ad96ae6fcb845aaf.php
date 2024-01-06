
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.shipping_area')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/shipping-area/add')); ?>" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php echo $__env->make('admin.shippingarea.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $coordinates  =  $getshippingarealist->where('coordinates','!=',null)
                        ->pluck('coordinates')->toArray();             
    $coordinates = json_encode($coordinates);
    ?>
    <?php echo $__env->make('maps.google_map_draw_show',[
        'coordinates' => $coordinates
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/admin/shippingarea/index.blade.php ENDPATH**/ ?>