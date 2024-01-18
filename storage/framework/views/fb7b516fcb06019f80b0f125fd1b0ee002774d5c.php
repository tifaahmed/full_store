
<div class="row border shadow rounded-4 py-3 mb-4" id="open">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <form action="#" method="get">
                <div class="row">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-regular fa-circle-question"></i>
                        <p class="title px-2"><?php echo e(trans('labels.delivery_info')); ?></p>
                    </div>


                    <?php if(auth()->user() && auth()->user()->userAddresses && auth()->user()->userAddresses->count()): ?>
                    <div class="row">
                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.user_addresses')); ?> </label>
                        <?php $__currentLoopData = auth()->user()->userAddresses()->orderBy('is_active','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $userAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3 px-0 mb-2">
                                <label class="form-check-label d-flex  justify-content-between align-items-center"
                                for="user-address-<?php echo e($userAddress->id); ?>">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input m-0" type="radio" name="user_address"
                                        id="user-address-<?php echo e($userAddress->id); ?>" value="<?php echo e($key); ?>"
                                        <?php echo e($userAddress->is_active ? 'checked' : ''); ?>>
                                        <p class="px-2">
                                            <?php echo e($userAddress->title); ?>

                                        </p>
                                    </div>
                                </label>
                                <div class="child-container">
                                    <input id="user_address_address_<?php echo e($key); ?>" value="<?php echo e($userAddress->address); ?>" hidden>
                                    <input id="user_address_house_num_<?php echo e($key); ?>" value="<?php echo e($userAddress->house_num); ?>" hidden>
                                    <input id="user_address_street_<?php echo e($key); ?>" value="<?php echo e($userAddress->street); ?>"hidden>
                                    <input id="user_address_block_<?php echo e($key); ?>" value="<?php echo e($userAddress->block); ?>"hidden>
                                    <input id="user_address_pincode_<?php echo e($key); ?>" value="<?php echo e($userAddress->pincode); ?>"hidden>
                                    <input id="user_address_building_<?php echo e($key); ?>" value="<?php echo e($userAddress->building); ?>"hidden>
                                    <input id="user_address_landmark_<?php echo e($key); ?>" value="<?php echo e($userAddress->landmark); ?>"hidden>

                                    <input id="user_address_longitude_<?php echo e($key); ?>" value="<?php echo e($userAddress->longitude); ?>"hidden>
                                    <input id="user_address_latitude_<?php echo e($key); ?>" value="<?php echo e($userAddress->latitude); ?>"hidden>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="col-md-12 mb-4">

                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.delivery_area')); ?><span class="text-danger"> * </span></label>
                        <select   name="delivery_area" id="delivery_area" class="form-control">
                            
                            <?php $__currentLoopData = $deliveryarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($area->name); ?>" price="<?php echo e($area->price); ?>">
                                    <?php echo e($area->name); ?> <?php echo e($area->delivery_time); ?>

                                    
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__currentLoopData = $deliveryarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordinates_key => $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input id="area_coordinates_<?php echo e($area->name); ?>" value="<?php echo e(json_encode([$area->coordinates])); ?>" hidden >
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $coordinatesToArray  =  $deliveryarea->whereNotNull('coordinates')
                                            ->pluck('coordinates','name')->map(function ($coordinates) {
                                                return json_decode($coordinates, true); // true to get an associative array
                                            })->toArray();

                                            



                        $coordinates = json_encode($coordinatesToArray);
                        ?>
                        <textarea style="width:100%" rows="12" id="all_coordinates" hidden ><?php echo e(isset($coordinates) ? $coordinates : ''); ?></textarea>

                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.block')); ?><span class="text-danger"> * </span></label>
                        <input type="text" class="form-control input-h" name="block" id="block" placeholder="Block" >
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.street')); ?><span class="text-danger"> </span></label>
                        <input type="text" class="form-control input-h"   name="street"  id="street" placeholder="Street" >
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.house_num')); ?></label>
                        <input type="text" class="form-control input-h" name="house_num" id="house_num" placeholder="House Number" >
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.landmark')); ?><span class="text-danger"> </span></label>
                        <input type="text" class="form-control input-h"   name="landmark"  id="landmark" placeholder="Landmark" >
                    </div>
                    
                    

                    <div>
                        <?php echo $__env->make('maps.google_maps_checkout',[
                            'longitude' => old('longitude'),
                            'latitude' => old('latitude'),
                            'address' => old('address'),
                            'coordinates' => $coordinates
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/checkout-pages/address_form.blade.php ENDPATH**/ ?>