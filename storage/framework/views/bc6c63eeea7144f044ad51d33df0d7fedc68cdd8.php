

<?php $__env->startSection('content'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="mx-2">
            <h3 class="page-title text-white mb-2">  <?php echo e(trans('labels.checkout')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white">  <?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>">  <?php echo e(trans('labels.checkout')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
        
    </div>
</section>
<!-- breadcrumb end -->
<section class="py-5 pull-section-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">

                <div class="row border shadow rounded-4 py-3 mb-4">
                    <?php 
                        $total_price = 0;
                        $tax = 0;
                    ?>
                    <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        
                            $total_price += ($cart->qty * $cart->price);
                            $tax += ($cart->qty * $cart->price * $cart->tax) / 100;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card border-0 select-delivery">
                        <div class="card-body row">
                            <div class="radio-item-container row">
                                <div class="d-flex align-items-center mb-3 px-1">
                                    <i class="fa-solid fa-truck"></i>
                                    <p class="title px-2"><?php echo e(trans('labels.delivery_option')); ?></p>
                                </div>
                                <form class="px-0">
                                    <?php
                                        $delivery_types = explode(',', helper::appdata($storeinfo->id)->delivery_type);
                                        if(Session::has('table_id'))
                                        {
                                            $delivery_types = array(3);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $delivery_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $delivery_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 px-0 mb-2">
                                            <label class="form-check-label d-flex  justify-content-between align-items-center" for="cart-delivery-<?php echo e($delivery_type); ?>">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input m-0" type="radio" name="cart-delivery" id="cart-delivery-<?php echo e($delivery_type); ?>" value="<?php echo e($delivery_type); ?>"  <?php echo e($key == 0 ? 'checked' : ''); ?>>
                                                    <p class="px-2">
                                                        <?php if($delivery_type == 1): ?>
                                                            <?php echo e(trans('labels.delivery')); ?>

                                                        <?php elseif($delivery_type == 2): ?>
                                                            <?php echo e(trans('labels.pickup')); ?>

                                                        <?php elseif($delivery_type == 3): ?>
                                                            <?php echo e(trans('labels.dine_in')); ?>

                                                        <?php endif; ?>
                                                    </p>
                                            
                                                </div>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
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
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4" id="open">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            
                            
                            <form action="#" method="get">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fa-regular fa-circle-question"></i>
                                        <p class="title px-2"><?php echo e(trans('labels.delivery_info')); ?></p>
                                    </div>



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


                                    <div class="col-md-12 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.delivery_area')); ?><span class="text-danger"> * </span></label>
                                        <select name="delivery_area" id="delivery_area" class="form-control">
                                            <option value=""price="<?php echo e(0); ?>">
                                                <?php echo e(trans('labels.select')); ?></option>
                                            <?php $__currentLoopData = $deliveryarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($area->name); ?>" price="<?php echo e($area->price); ?>">
                                                    <?php echo e($area->name); ?>                                                     
                                                    
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </select>
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
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.address')); ?><span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control input-h" name="address" id="address" placeholder="Address" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.landmark')); ?><span class="text-danger"> </span></label>
                                        <input type="text" class="form-control input-h"   name="landmark"  id="landmark" placeholder="Landmark" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.building')); ?></label>
                                        <input type="text" class="form-control input-h" name="building" id="building" placeholder="Building" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.pincode')); ?></label>
                                        <input type="number" class="form-control input-h" placeholder="Pincode" name="postal_code" id="postal_code" >
                                    </div>

                                    <div>
                                        
                                        <?php echo $__env->make('maps.google_map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                        <input type="hidden" id="discount_amount" value="<?php echo e(Session::get('offer_amount')); ?>" />
                        <input type="hidden" name="couponcode" id="couponcode" value="<?php echo e(Session::get('offer_code')); ?>">
                 <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                            <?php
                                if($storeinfo->allow_without_subscription == 1)
                                {
                                    $promocode = 1;
                                }
                                else {
                                    $promocode = helper::get_plan(@$storeinfo->id)->coupons;
                                }
                            ?>
                            <?php if($promocode == 1): ?>
                            
                                <div class="row border shadow rounded-4 py-3 mb-4 <?php if(@$coupons->count() == 0): ?> d-none <?php endif; ?>">
                                    <div class="card border-0 select-delivery" >
                                        <div class="card-body row justify-content-between align-items-center">
                                            <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                                                <div>
                                                    <p class="title px-2 mb-2"><i class="fa-solid fa-receipt"></i><span class="px-2" id="promocode_code"><?php if(Session::has('offer_amount')): ?> <?php echo e(Session::get('offer_code')); ?> applied <?php else: ?> <?php echo e(trans('labels.apply_coupon')); ?> <?php endif; ?> </span></p>
                                                    <p class="apply-coupon-subtitle" id="promocode_desc"><?php if(!Session::has('offer_amount')): ?> <?php echo e(trans('labels.save_offer')); ?><?php endif; ?></p>
                                                </div>
                                            </div>
                                            <input type="hidden" id="removecouponurl" value="<?php echo e(URL::to('/cart/removepromocode')); ?>"/>
                                            <div class="col-md-6 col-lg-12 col-xl-5 d-md-flex d-lg-block d-xl-flex justify-content-end px-2" id="promocode_button">
                                                <?php if(Session::has('offer_amount')): ?>
                                                <a class=" text-danger" href="javascript:void(0)"  onclick="RemoveCopon()"> <?php echo e(trans('labels.remove')); ?></a> 
                                                <?php else: ?>
                                                    <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" <?php if(@$coupons->count() > 0): ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" <?php endif; ?>><?php echo e(@$coupons->count()); ?>

                                                        <?php echo e(trans('labels.offer')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                            <div class="row border shadow rounded-4 py-3 mb-4">
                                <div class="card border-0 select-delivery" >
                                    <div class="card-body row justify-content-between align-items-center">
                                        <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                                            <div>
                                                <p class="title px-2 mb-2"><i class="fa-solid fa-receipt"></i><span class="px-2" id="promocode_code"><?php if(Session::has('offer_amount')): ?> <?php echo e(Session::get('offer_code')); ?> applied <?php else: ?> <?php echo e(trans('labels.apply_coupon')); ?> <?php endif; ?> </span></p>
                                                <p class="apply-coupon-subtitle" id="promocode_desc"><?php if(!Session::has('offer_amount')): ?> <?php echo e(trans('labels.save_offer')); ?><?php endif; ?></p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="removecouponurl" value="<?php echo e(URL::to('/cart/removepromocode')); ?>"/>
                                        <div class="col-md-6 col-lg-12 col-xl-5 d-md-flex d-lg-block d-xl-flex justify-content-end px-2" id="promocode_button">
                                            <?php if(Session::has('offer_amount')): ?>
                                            <a class=" text-danger" href="javascript:void(0)"  onclick="RemoveCopon()"> <?php echo e(trans('labels.remove')); ?></a> 
                                            <?php else: ?>
                                                <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" <?php if(@$coupons->count() > 0): ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" <?php endif; ?>><?php echo e(@$coupons->count()); ?>

                                                    <?php echo e(trans('labels.offer')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                  <?php
                        $grand_total = 0;
                        $total_coupons = $coupons->count();
                  ?>
                  <?php if(Session::has('offer_amount')): ?>
                        <?php
                             $grand_total = ($total_price - Session::get('offer_amount')) + $tax ; 
                        ?>
                  <?php else: ?>
                        <?php
                             $grand_total = $total_price + $tax ; 
                        ?>
                  <?php endif; ?>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body row">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <p class="title px-2"><?php echo e(trans('labels.order_summary')); ?></p>
                            </div>
                            <div class="col">
                                <input type="hidden" id="sub_total" value="<?php echo e($total_price); ?>"/>
                                <input type="hidden" id="tax" value="<?php echo e($tax); ?>"/>
                                <input type="hidden" name="delivery_charge" id="delivery_charge" value="0">
                                <input type="hidden" name="grand_total" id="grand_total" value="<?php echo e($grand_total); ?>">
                                <ul class="list-group list-group-flush order-summary-list" id="payment_summery_list">
                                    <li class="list-group-item">
                                        <?php echo e(trans('labels.sub_total')); ?>

                                        <span>
                                            <?php echo e(helper::currency_formate($total_price, $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                    <li class="list-group-item" id="shipping_charge_hide">
                                        <?php echo e(trans('labels.delivery_charge')); ?> (+)
                                        <span id="shipping_charge">
                                            
                                            <?php echo e(helper::currency_formate('0.0', $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                    <li class="list-group-item" id="tax_list">
                                        <?php echo e(trans('labels.tax')); ?> (+)
                                        <span>
                                            
                                            <?php echo e(helper::currency_formate($tax, $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                    <?php if(Session::has('offer_amount')): ?>
                                    <li class="list-group-item" id="discount_1">
                                        <?php echo e(trans('labels.discount')); ?> (-)
                                        <span>
                                            
                                            <?php echo e(helper::currency_formate(Session::get('offer_amount'), $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                    <?php endif; ?>
                                    <li class="list-group-item fw-700 text-success">
                                        <?php echo e(trans('labels.order_total')); ?> 
                                        <span class="fw-700 text-success" id="grand_total_view">
                                            <?php echo e(helper::currency_formate($grand_total, $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            <div class="radio-item-container row">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                    <p class="title px-2"> <?php echo e(trans('labels.payment_option')); ?></p>
                                </div>
                                <form>
                                    <?php $__currentLoopData = $paymentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php  $transaction__type = strtolower($payment->payment_name); ?> 
                                    <div class="col-12 select-payment-list-items">
                                        <label class="form-check-label d-flex  justify-content-between align-items-center" for="<?php echo e($payment->payment_name); ?>">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input m-0" type="radio" id="<?php echo e($payment->payment_name); ?>"  name="payment" data-payment_type="<?php echo e(strtolower($payment->payment_name)); ?>"  data-currency="<?php echo e($payment->currency); ?>"  <?php if(!$key): ?> <?php echo 'checked'; ?> <?php endif; ?>  value="<?php echo e($payment->public_key); ?>">
                                                <p class="px-2"><?php echo e($payment->payment_name); ?></p>
                                            </div>
                                            <img src="<?php echo e(helper::image_path($payment->image)); ?>" alt="" class="select-paymentimages">
                                            
                                            
                                            <?php if(strtolower($payment->payment_name) == 'razorpay'): ?>
                                            <input type="hidden" name="razorpay" id="razorpay"
                                                value="<?php echo e($payment->public_key); ?>">
                                            <?php endif; ?>
                                            
                                            <?php if(strtolower($payment->payment_name) == 'stripe'): ?>
                                                <input type="hidden" name="stripekey" id="stripekey" value="<?php echo e($payment->public_key); ?>">
                                                <input type="hidden" name="stripecurrency" id="stripecurrency" value="<?php echo e($payment->currency); ?>">
                                               
                                            <?php endif; ?>
                                            <?php if(strtolower($payment->payment_name) == 'flutterwave'): ?>
                                                <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                                    value="<?php echo e($payment->public_key); ?>">
                                            <?php endif; ?>
                                            <?php if(strtolower($payment->payment_name) == 'paystack'): ?>
                                                <input type="hidden" name="paystackkey" id="paystackkey"
                                                    value="<?php echo e($payment->public_key); ?>">
                                            <?php endif; ?>
                                            
                                        </label>
                                    </div>
                                  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button target="_blank" class="btn-primary text-center w-100"  onclick="Order()">
                    <?php echo e(trans('labels.place_order')); ?>

                </button>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="table_required" value="<?php echo e(trans('messages.table_required')); ?>">
<input type="hidden" id="delivery_time_required" value="<?php echo e(trans('messages.delivery_time_required')); ?>">
<input type="hidden" id="delivery_date_required" value="<?php echo e(trans('messages.delivery_date_required')); ?>">
<input type="hidden" id="address_required" value="<?php echo e(trans('messages.address_required')); ?>">
<input type="hidden" id="no_required" value="<?php echo e(trans('messages.no_required')); ?>">
<input type="hidden" id="landmark_required" value="<?php echo e(trans('messages.landmark_required')); ?>">
<input type="hidden" id="block_required" value="<?php echo e(trans('messages.block_required')); ?>">
<input type="hidden" id="street_required" value="<?php echo e(trans('messages.street_required')); ?>">
<input type="hidden" id="house_num_required" value="<?php echo e(trans('messages.house_num_required')); ?>">
<input type="hidden" id="pincode_required" value="<?php echo e(trans('messages.pincode_required')); ?>">
<input type="hidden" id="delivery_area_required" value="<?php echo e(trans('messages.delivery_area')); ?>">
<input type="hidden" id="pickup_date_required" value="<?php echo e(trans('messages.pickup_date_required')); ?>">
<input type="hidden" id="pickup_time_required" value="<?php echo e(trans('messages.pickup_time_required')); ?>">
<input type="hidden" id="customer_mobile_required" value="<?php echo e(trans('messages.customer_mobile_required')); ?>">
<input type="hidden" id="customer_email_required" value="<?php echo e(trans('messages.customer_email_required')); ?>">
<input type="hidden" id="customer_name_required" value="<?php echo e(trans('messages.customer_name_required')); ?>">
<input type="hidden" id="currency" value="<?php echo e(helper::appdata($storeinfo->id)->currency); ?>">
<input type="hidden" id="checkplanurl" value="<?php echo e(URL::to('/orders/checkplan')); ?>">
<input type="hidden" id="paymenturl" value="<?php echo e(URL::to('/orders/paymentmethod')); ?>">
<input type="hidden" id="mecadourl" value="<?php echo e(URL::to('/orders/mercadoorderrequest')); ?>">
<input type="hidden" id="paypalurl" value="<?php echo e(URL::to('/orders/paypalrequest')); ?>">
<input type="hidden" id="myfatoorahurl" value="<?php echo e(URL::to('/orders/myfatoorahrequest')); ?>">
<input type="hidden" id="toyyibpayurl" value="<?php echo e(URL::to('/orders/toyyibpayrequest')); ?>">
<input type="hidden" id="payment_url" value="<?php echo e(URL::to($storeinfo->slug)); ?>/payment/">
<input type="hidden" id="website_title" value="<?php echo e(helper::appdata($storeinfo->id)->website_title); ?>">
<input type="hidden" id="image" value="<?php echo e(helper::appdata(@$storeinfo->id)->image); ?>">
<input type="hidden" id="slug" value="<?php echo e($storeinfo->slug); ?>">
<input type="hidden" id="failure" value="<?php echo e(url()->current()); ?>">
<form action="<?php echo e(url('/orders/paypalrequest')); ?>" method="post" class="d-none">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="return" value="2">
    <input type="submit" class="callpaypal" name="submit">
</form>
<!-- Apply Coupon Modal Promocode -->
<div class="offcanvas  <?php echo e(session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'); ?>" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-coupons">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo e(trans('labels.coupons_offers')); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body offer-coupons">
       
        
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row g-4">
                    <div class="col px-0">
                        <div class="card promo-card position-relative rounded-5 h-100">
                            <div class="card-body p-4">
                                <div class="row main-row">
                                    <div class="coupons-imag col-12 col-md-4 col-lg-4 col-xl-4">
                                      <h1 >  <?php echo e($coupon->price); ?>%</h1>
                                      <h6 class="ms-3"> <?php echo e(trans('labels.coupons')); ?></h6>
                                     
                                    </div>
                                    <div class="coupons-content col-12 col-md-8 col-lg-8 col-xl-8 d-md-flex justify-content-end">
                                        <div>
                                            <h2><?php echo e($coupon->name); ?></h2>
                                            
                                            <p class="ps-7"><?php echo e($coupon->name); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <form class="form-group" data-copy=true>
                                    <div class="copy-button rounded-5">
                                        <input type="hidden" id="applycoponurl" value="<?php echo e(URL::to('/cart/applypromocode')); ?>"/>
                                        <input id="promocode" type="text" class="rounded-5 px-2 input-h" readonly value="<?php echo e($coupon->code); ?>" />
                                        <button type="button" class="copybtn btn-primary" onclick="ApplyCopon('<?php echo e($coupon->code); ?>','<?php echo e($storeinfo->id); ?>')"><?php echo e(trans('labels.apply')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    </div>
</div>
</div>
<?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    
$(document).ready(function() {
        var user_address_address = $('.child-container').find('#user_address_address_0').val();
        var user_address_house_num = $('.child-container').find('#user_address_house_num_0').val();
        var user_address_street = $('.child-container').find('#user_address_street_0').val();
        var user_address_block = $('.child-container').find('#user_address_block_0').val();
        var user_address_pincode = $('.child-container').find('#user_address_pincode_0').val();
        var user_address_building = $('.child-container').find('#user_address_building_0').val();
        var user_address_landmark = $('.child-container').find('#user_address_landmark_0').val();
        var user_address_longitude = $('.child-container').find('#user_address_longitude_0').val();
        var user_address_latitude = $('.child-container').find('#user_address_latitude_0').val();
        $('input[name="address"]').val(user_address_address);
        $('input[name="house_num"]').val(user_address_house_num);
        $('input[name="street"]').val(user_address_street);
        $('input[name="block"]').val(user_address_block);
        $('input[name="postal_code"]').val(user_address_pincode);
        $('input[name="building"]').val(user_address_building);
        $('input[name="landmark"]').val(user_address_landmark);
        $('input[name="longitude"]').val(user_address_longitude);
        $('input[name="latitude"]').val(user_address_latitude);
    $('input[name="user_address"]').change(function() {
        var parentValue = $(this).val();
        var user_address_address = $('.child-container').find('#user_address_address_'+parentValue).val();
        var user_address_house_num = $('.child-container').find('#user_address_house_num_'+parentValue).val();
        var user_address_street = $('.child-container').find('#user_address_street_'+parentValue).val();
        var user_address_block = $('.child-container').find('#user_address_block_'+parentValue).val();
        var user_address_pincode = $('.child-container').find('#user_address_pincode_'+parentValue).val();
        var user_address_building = $('.child-container').find('#user_address_building_'+parentValue).val();
        var user_address_landmark = $('.child-container').find('#user_address_landmark_'+parentValue).val();
        var user_address_longitude = $('.child-container').find('#user_address_longitude_'+parentValue).val();
        var user_address_latitude = $('.child-container').find('#user_address_latitude_'+parentValue).val();
        $('input[name="address"]').val(user_address_address);
        $('input[name="house_num"]').val(user_address_house_num);
        $('input[name="street"]').val(user_address_street);
        $('input[name="block"]').val(user_address_block);
        $('input[name="postal_code"]').val(user_address_pincode);
        $('input[name="building"]').val(user_address_building);
        $('input[name="landmark"]').val(user_address_landmark);
        $('input[name="longitude"]').val(user_address_longitude);
        $('input[name="latitude"]').val(user_address_latitude);
    });
});
function RemoveCopon() {
    "use strict";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1 yes-btn',
            cancelButton: 'btn btn-danger mx-1 no-btn'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! hy",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('#removecouponurl').val(),
                method: 'post',
                data: {
                    promocode: jQuery('#promocode').val()
                },
                success: function(response) {
                    $('#preloader').hide();
                    if (response.status == 1) {
                        var html;
                    let coupons = "<?php echo e($coupons->count()); ?>";
                        html = ' <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">'+coupons+'  Offer(S)</a>';
                        var grand_total =   (parseFloat($('#grand_total').val()) + parseFloat($('#discount_amount').val()));
                       
                        $('#discount_1').remove();
                        $('#promocode_button').html(html);
                        $('#promocode_code').html("Apply Coupon");
                        $('#promocode_desc').show();
                        $('#discount_amount').val('');
                        $('#couponcode').val('');
                        $('#grand_total_view').html(currency_formate(grand_total));
                        $('#grand_total').val(grand_total);
                    } else {
                        $('#ermsg').text(response.message);
                        $('#error-msg').addClass('alert-danger');
                        $('#error-msg').css("display", "block");
                        setTimeout(function() {
                            $("#success-msg").hide();
                        }, 5000);
                    }
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.DismissReason.cancel
        }
    })
}
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/checkout.js')); ?>"></script>
<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/checkout.blade.php ENDPATH**/ ?>