<div class="row border shadow rounded-4 py-3 mb-4" id="table_show">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-utensils"></i>
                        <p class="title px-2"><?php echo e(trans('labels.table')); ?></p>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="Name" class="form-label" id="delivery"><?php echo e(trans('labels.table')); ?><span class="text-danger"> *  </span></label>
                        <select name="table" id="table" class="form-select input-h" <?php if(Session::has('table_id')): ?> disabled  <?php endif; ?> required>
                            <option value=""><?php echo e(trans('labels.select_table')); ?>

                            </option>
                            <?php $__currentLoopData = $tableqrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableqr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tableqr->id); ?>" <?php echo e(@Session::get('table_id') == $tableqr->id ? 'selected' : ''); ?>> <?php echo e($tableqr->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/front/checkout-pages/dine_in_form.blade.php ENDPATH**/ ?>