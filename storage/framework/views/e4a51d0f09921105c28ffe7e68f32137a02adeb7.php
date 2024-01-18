<form action="#" method="get">
    <div class="row">
        <div class="d-flex align-items-center mb-3">
            <i class="fa-regular fa-address-card"></i>
            <p class="title px-2"><?php echo e(trans('labels.customer')); ?></p>
        </div>
        <div class="col-md-6 mb-4">
            <label for="validationDefault" class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">*  </span></label>
            <input type="text" class="form-control input-h" placeholder="Name"  name="customer_name" id="customer_name" value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->name : ''); ?>" >
        </div>
        <div class="col-md-6 mb-4">
            <label for="validationDefault" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
            <input type="number" class="form-control input-h" placeholder="Mobile" name="customer_mobile" id="customer_mobile" value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->mobile : ''); ?>" >
        </div>
        <div class="col-md-6 mb-4">
            <label for="validationDefault" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger">*  </span></label>
            <input type="email" class="form-control input-h" placeholder="Email"  name="customer_email" id="customer_email" value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->email : ''); ?>" >
        </div>
        <div class="col-md-6 mb-4">
            <label class="form-label"><?php echo e(trans('labels.note')); ?><span class="text-danger">  </span></label>
            <textarea id="notes" name="notes" class="form-control input-h" rows="5" aria-label="With textarea" placeholder="Message" value=""></textarea>
        </div>
        <input type="hidden" id="vendor" name="vendor"
        value="<?php echo e(helper::storeinfo($storeinfo->slug)->id); ?>" />
    </div>
</form><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/checkout-pages/customer_info_form.blade.php ENDPATH**/ ?>