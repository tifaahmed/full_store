    <div class="row" >
        <div class="d-flex align-items-center mb-3">
            <i class="fa-regular fa-address-card"></i>
            <p class="title px-2"><?php echo e(trans('labels.branches')); ?></p>
        </div>
        <style>
            .custom-square {
                padding: 14px;
                width: 100%;
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: center;
              border: 2px solid #ccc;
              border-radius: 10px;
              cursor: pointer;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              margin-bottom: 20px;
            }
        
            .custom-square.active {
              border-color: red;
            }
        
            .custom-icon {
              font-size: 24px;
            }
        
            .icon-text {
              margin-top: 10px;
              font-size: 14px;
              text-align: center
            }
        </style>
        <input hidden type="text" name="branch_id" id="branch_id" value="<?php echo e(session('favorite_branch')); ?>"  >

        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6"> 
                <div class="custom-square <?php echo e(session('favorite_branch') == $branch->id  ? 'active' : ''); ?>" onclick="toggleSquare(this,<?php echo e($branch->id); ?>)">
                    <i class="custom-icon fas fa-home"></i>
                    <div class="icon-text"><?php echo e($branch->name); ?></div>
                    <div class="icon-text"><?php echo e($branch->address); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/front/checkout-pages/branches.blade.php ENDPATH**/ ?>