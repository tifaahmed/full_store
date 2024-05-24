<div class="row border shadow rounded-4 py-3 mb-4"   

>
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-regular fa-clock"></i>
                        <p class="title px-2"><?php echo e(trans('labels.date_time')); ?></p>
                    </div>

                    
                    <div class="row " id="is_delivery_now_dev">
                        <div class="col-6 px-0 mb-2" >
                            <label class="form-check-label d-flex  justify-content-between align-items-center" >
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="is_delivery_now" 
                                    value="0"  <?php if(true): echo 'checked'; endif; ?> id="delivery_later">
                                    <p class="px-2">
                                        <?php echo e(trans('labels.delivery_later')); ?>

                                    </p>
                                </div>
                            </label>
                        </div>
                        <div class="col-6 px-0 mb-2" >
                            <label id="is_delivery_now_store_close"
                                class="d-none text-danger"><?php echo e(trans('labels.today_store_closed')); ?>

                            </label>
                            <label class="form-check-label d-flex  justify-content-between align-items-center" >
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="is_delivery_now" 
                                    value="1" id="delivery_now" <?php if(true): echo 'checked'; endif; ?>>
                                    <p class="px-2">
                                        <?php echo e(trans('labels.delivery_now')); ?>

                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>
                        
                    

                    <div id="order_time_date" class="row">
                        <div class="col-md-6 mb-4">
                            <label for="Name" class="form-label" id="delivery_date">
                                <?php echo e(trans('labels.delivery_date')); ?><span class="text-danger" id="delivery_date_star"> * </span>
                            </label>
                            <label for="Name" class="form-label" id="pickup_date">
                                <?php echo e(trans('labels.pickup_date')); ?><span class="text-danger"> * </span>
                            </label>
                            <input type="date" class="form-control input-h" id="delivery_dt" value="" placeholder="Delivery date"   min="<?php echo e(date('Y-m-d')); ?>">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="Name" class="form-label" id="delivery">
                                <?php echo e(trans('labels.delivery_time')); ?><span class="text-danger" id="delivery_time_star"> *  </span>
                            </label>
                            <label for="Name" class="form-label" id="pickup">
                                <?php echo e(trans('labels.pickup_time')); ?><span class="text-danger"> * </span>
                            </label>
                            <label id="store_close"
                                class="d-none text-danger"><?php echo e(trans('labels.today_store_closed')); ?>

                            </label>
                            <input type="hidden" name="store_id" id="store_id" value="<?php echo e($storeinfo->id); ?>">
                            <input type="hidden" name="sloturl" id="sloturl" value="<?php echo e(URL::to($storeinfo->slug . '/timeslot')); ?>">
                            <select name="delivery_time" id="delivery_time" class="form-select input-h"  >
                                <option value="<?php echo e(old('delivery_time')); ?>"><?php echo e(trans('labels.select')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deliveryNowRadio = document.getElementById('delivery_now');
        const deliveryLaterRadio = document.getElementById('delivery_later');
        const orderTimeDateDiv = document.getElementById('order_time_date');
        const deliveryDateInput = document.getElementById('delivery_dt');
        const deliveryTimeSelect = document.getElementById('delivery_time');
        const delivery_date_star = document.getElementById('delivery_date_star');
        const delivery_time_star = document.getElementById('delivery_time_star');
        
        function toggleOrderTimeDate() {
            if (deliveryNowRadio.checked) {
                orderTimeDateDiv.style.display = 'none';
                delivery_date_star.style.display = 'none';
                delivery_time_star.style.display = 'none';
                deliveryDateInput.removeAttribute('required');
                deliveryTimeSelect.removeAttribute('required');

                const today = new Date().toISOString().split('T')[0];
                deliveryDateInput.value = today;

            } else {
                orderTimeDateDiv.style.display = 'flex'; // use 'flex' since it's a row
                delivery_date_star.style.display = 'unset'; // use 'flex' since it's a row
                delivery_time_star.style.display = 'unset'; // use 'flex' since it's a row
                deliveryDateInput.setAttribute('required', 'required');
                deliveryTimeSelect.setAttribute('required', 'required');

                const today = new Date().toISOString().split('T')[0];
                deliveryDateInput.value = today;
            }
        }
    
        deliveryNowRadio.addEventListener('change', toggleOrderTimeDate);
        deliveryLaterRadio.addEventListener('change', toggleOrderTimeDate);
    
        // Initial check
        toggleOrderTimeDate();
    });
</script><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/front/checkout-pages/pickup_form.blade.php ENDPATH**/ ?>