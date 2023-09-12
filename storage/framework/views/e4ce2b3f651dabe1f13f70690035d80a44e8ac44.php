<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row mb-7">
    <div class="col-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
                <form method="post" action="<?php echo e(URL::to('admin/systemaddons/store')); ?>" name="about" id="about" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group">
                                <label for="addon_zip" class="col-form-label"><?php echo e(trans('labels.zip_file')); ?><span class="text-danger"> * </span></label>
                                <input type="file" class="form-control" name="addon_zip" id="addon_zip" required="">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <?php if(env('Environment') == 'sendbox'): ?>
                        <button type="button" class="btn btn-success btn-succes mt-3" onclick="myFunction()">
                            <?php echo e(trans('labels.install')); ?>

                        </button>
                        <?php else: ?>
                        <button type="submit" class="btn btn-success btn-succes mt-3"><?php echo e(trans('labels.install')); ?></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/apps/add.blade.php ENDPATH**/ ?>