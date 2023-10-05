
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.blogs')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/blogs/add')); ?>" class="btn-add">
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
                        <?php echo $__env->make('admin.blog.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/blog/blog.blade.php ENDPATH**/ ?>