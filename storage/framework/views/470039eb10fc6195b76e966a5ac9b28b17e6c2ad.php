<!------------------------------------------ mobile siderbar ------------------------------------------>
<?php if(count($cartitems)): ?>
<div class="offcanvas offcanvas-end pos_sidebar" tabindex="-1" id="rightsidebar" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Customer Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0 pt-0">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 rounded-4 right-sidemain">
                    <div class="card-body px-0 desktop-card-body pt-0">
                        <!----------------- Customer Name section start ----------------->
                        <div class="border-bottom pb-3 px-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <select class="form-select" aria-label="Default select example" id="customer1">
                                        <option value="walk-in customer">walk-in customer</option>
                                        <?php $__currentLoopData = $getcustomerslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php if(count($cartitems) > 0): ?>
                                <div class="col-lg-4">
                                    <!-- <button class="btn btn-danger" onclick="RemoveCart('')">Empty Cart</button> -->
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!----------------- Customer Name section end ----------------->
                        <!--------------- product purchase section start --------------->
                        <div class="pro-itmes p-3 pb-0">
                            <?php
                            $sub_total = 0;
                            $tax = 0;
                            $discount = 0;
                            ?>
                            <?php if(count($cartitems) > 0): ?>
                            <?php $__currentLoopData = $cartitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $sub_total += ($cart->price * $cart->qty);
                            $tax += $cart->tax;
                            ?>
                            <div class="card mb-3 border rounded-4 shadow-sm posproductimg">
                                <div class="card-body d-flex align-items-center p-0">
                                    <img src="<?php echo e(asset('storage/app/public/item/' . $cart->item_image)); ?>" alt="">
                                    <div class="px-2">
                                        <div class="row justify-content-between">
                                            <div class="col-9">
                                                <p class="line-limit-1"><?php echo e($cart->item_name); ?></p>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <a href="#" class="" onclick="RemoveCart('<?php echo e($cart->id); ?>')">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between align-items-start">
                                            <div class="col-12">
                                                <?php if($cart->variants_name != null): ?>
                                                <span class="fs-7"><?php echo e($cart->variants_name); ?> : <?php echo e(helper::currency_formate($cart->variants_price, Auth::user()->id)); ?> <?php if($cart->extras_name != null): ?> | <a href="javascript:void(0)" class="adone-hover m-0" onclick="showaddons('<?php echo e($cart->extras_name); ?>','<?php echo e($cart->extras_price); ?>')" data-toggle="modal" data-target="#modal_selected_addons">Extras</a><?php endif; ?> </span><?php endif; ?>
                                                <p class="pro-price"><?php echo e(helper::currency_formate($cart->price * $cart->qty, Auth::user()->id)); ?></p>
                                            </div>
                                            <div class="price-range col-12">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <a href="javascript:void(0)" class="circle" onclick="qtyupdate('<?php echo e($cart->id); ?>','minus','<?php echo e(URL::to('admin/pos/cart/qtyupdate')); ?>')"><i class="fa-light fa-minus"></i></a>
                                                    <input type="text" value="<?php echo e($cart->qty); ?>" readonly>
                                                    <a href="javascript:void(0)" class="circle" onclick="qtyupdate('<?php echo e($cart->id); ?>','plus','<?php echo e(URL::to('admin/pos/cart/qtyupdate')); ?>')"><i class="fa-light fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png')); ?>" alt="empty-cart" class="w-25 object-fit-cover">
                            </div>
                            <?php endif; ?>
                            <?php
                            $total = $sub_total + $tax - $discount ;
                            ?>
                        </div>
                        <!---------------- product purchase section end ---------------->
                        <!----------------- total amount section start ----------------->
                        <div class="p-3 pt-0">
                            <div class="card bg-light border-0 currency">
                                <div class="card-body border rounded-4">
                                    <div class="input-group d-grid gap-2 d-flex">
                                        <input type="number" class="form-control border rounded-3 bg-white discount_amount" placeholder="<?php echo e(trans('labels.discount')); ?>" aria-label="currency" id="discount1" value="" aria-describedby="currency" min="1" max="1000" <?php if(count($cartitems)> 0): ?> '' <?php else: ?> disabled <?php endif; ?>>
                                        <span class="input-group-text rounded-3 border-0 discountdolor" id="currency"><?php echo e(helper::appdata(Auth::user()->id)->currency); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total-sec text-capitalize">
                            <div class="card border-0 shadow-sm mx-3 rounded-4">
                                <div class="card-body">
                                    <div class="sub-total d-flex align-items-center justify-content-between mb-1" id="subtotal">
                                        <h6 class="fs-18 m-0"><?php echo e(trans('labels.sub_total')); ?></h6>
                                        <span><?php echo e(helper::currency_formate($sub_total, Auth::user()->id)); ?></span>
                                    </div>
                                    <div class="tax-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                        <h6 class="fs-18 m-0"><?php echo e(trans('labels.tax')); ?> (+) </h6>
                                        <span><?php echo e(helper::currency_formate($tax, Auth::user()->id)); ?></span>
                                    </div>
                                    <div class="discount-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                        <h6 class="fs-18 m-0"><?php echo e(trans('labels.discount')); ?> (-) </h6>
                                        <span id="discount_amount11" class="show_discount_amount">$0.000</span>
                                    </div>
                                    <div class="pay-total d-flex align-items-center justify-content-between mt-2 pt-2" id="subtotal">
                                        <h6 class="fs-18 m-0 text-success fw-semibold"><?php echo e(trans('labels.total')); ?></h6>
                                        <span class="text-success total_amount" id="total_amount1"><?php echo e(helper::currency_formate($total, Auth::user()->id)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       

                        <!------------------ currency section end ------------------>
                        <hr>
                        <!---------------- payment-option section start ---------------->
                        <div class="payment-option text-capitalize px-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                <a href="#" class="btn btn-success py-3 w-100 rounded-5" <?php if(count($cartitems)> 0): ?> data-bs-toggle="modal" data-bs-target="#peyment_methed" <?php endif; ?> ><?php echo e(trans('labels.place_order')); ?></a>
                                <?php if(count($cartitems) > 0): ?>
                                <button class="btn btn-danger py-3 w-100 rounded-5" onclick="RemoveCart('')">Empty Cart</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!----------------- payment-option section end ----------------->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!------------------------------------------ mobile siderbar end------------------------------------------>

<!------------------------------------------ desktop siderbar start------------------------------------------>
<div class="row">
    <div class="col-12 mt-3">
        <div class="card border-0 d-none d-lg-block rounded-4 right-sidemain">
            <div class="card-body px-0 desktop-card-body">
                <!----------------- Customer Name section start ----------------->
                <div class="border-bottom pb-3 px-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" id="customer">
                                <option value="walk-in customer">walk-in customer</option>
                                <?php $__currentLoopData = $getcustomerslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if(count($cartitems) > 0): ?>
                        <div class="col-lg-4">
                            <!-- <button class="btn btn-danger" onclick="RemoveCart('')">Empty Cart</button> -->
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!----------------- Customer Name section end ----------------->
                <!--------------- product purchase section start --------------->
                <div class="pro-itmes p-3 pb-0">
                    <?php
                    $sub_total = 0;
                    $tax = 0;
                    $discount = 0;
                    ?>
                    <?php if(count($cartitems) > 0): ?>
                    <?php $__currentLoopData = $cartitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $sub_total += ($cart->price * $cart->qty);
                    $tax += $cart->tax;
                    ?>
                    <div class="card mb-3 border rounded-4 shadow-sm posproductimg">
                        <div class="card-body d-flex align-items-center p-0">
                            <img src="<?php echo e(asset('storage/app/public/item/' . $cart->item_image)); ?>" alt="">
                            <div class="px-2">
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <p class="line-limit-1"><?php echo e($cart->item_name); ?></p>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <a href="#" class="" onclick="RemoveCart('<?php echo e($cart->id); ?>')">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start">
                                    <div class="col-6">
                                        <?php if($cart->variants_name != null): ?>
                                        <span class="fs-7"><?php echo e($cart->variants_name); ?> : <?php echo e(helper::currency_formate($cart->variants_price, Auth::user()->id)); ?> <?php if($cart->extras_name != null): ?> | <a href="javascript:void(0)" class="adone-hover m-0" onclick="showaddons('<?php echo e($cart->extras_name); ?>','<?php echo e($cart->extras_price); ?>')" data-toggle="modal" data-target="#modal_selected_addons">Extras</a><?php endif; ?> </span><?php endif; ?>
                                        <p class="pro-price"><?php echo e(helper::currency_formate($cart->price * $cart->qty, Auth::user()->id)); ?></p>
                                    </div>
                                    <div class="price-range col-6">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="javascript:void(0)" class="circle" onclick="qtyupdate('<?php echo e($cart->id); ?>','minus','<?php echo e(URL::to('admin/pos/cart/qtyupdate')); ?>')"><i class="fa-light fa-minus"></i></a>
                                            <input type="text" value="<?php echo e($cart->qty); ?>" readonly>
                                            <a href="javascript:void(0)" class="circle" onclick="qtyupdate('<?php echo e($cart->id); ?>','plus','<?php echo e(URL::to('admin/pos/cart/qtyupdate')); ?>')"><i class="fa-light fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png')); ?>" alt="empty-cart" class="w-25 object-fit-cover">
                    </div>
                    <?php endif; ?>
                    <?php
                    $total = $sub_total + $tax - $discount ;
                    ?>
                </div>
                <!---------------- product purchase section end ---------------->
                <!----------------- total amount section start ----------------->
                <div class="p-3 pt-0">
                    <div class="card bg-light border-0 currency">
                        <div class="card-body border rounded-4">
                            <div class="input-group d-grid gap-2 d-flex">
                                <input type="number" class="form-control border rounded-3 bg-white discount_amount" placeholder="<?php echo e(trans('labels.discount')); ?>" aria-label="currency" id="discount" value="" aria-describedby="currency" min="1" max="1000" <?php if(count($cartitems)> 0): ?> '' <?php else: ?> disabled <?php endif; ?>>
                                <span class="input-group-text rounded-3 border-0 discountdolor" id="currency"><?php echo e(helper::appdata(Auth::user()->id)->currency); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total-sec text-capitalize">
                    <div class="card border-0 shadow-sm mx-3 rounded-4">
                        <div class="card-body">
                            <div class="sub-total d-flex align-items-center justify-content-between mb-1" id="subtotal">
                                <h6 class="fs-18 m-0"><?php echo e(trans('labels.sub_total')); ?></h6>
                                <span><?php echo e(helper::currency_formate($sub_total, Auth::user()->id)); ?></span>
                            </div>
                            <div class="tax-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                <h6 class="fs-18 m-0"><?php echo e(trans('labels.tax')); ?> (+) </h6>
                                <span><?php echo e(helper::currency_formate($tax, Auth::user()->id)); ?></span>
                            </div>
                            <div class="discount-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                <h6 class="fs-18 m-0"><?php echo e(trans('labels.discount')); ?> (-) </h6>
                                <span id="discount_amount1" class="show_discount_amount">$0.000</span>
                            </div>
                            <div class="pay-total d-flex align-items-center justify-content-between mt-2 pt-2" id="subtotal">
                                <h6 class="fs-18 m-0 text-success fw-semibold"><?php echo e(trans('labels.total')); ?></h6>
                                <span class="text-success total_amount" id="total_amount"><?php echo e(helper::currency_formate($total, Auth::user()->id)); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="tax" id="tax_data" value="<?php echo e($tax); ?>" />
                <input type="hidden" name="discount_amount" id="discount_amount" value="" />
                <input type="hidden" name="sub_total" id="sub_total" value="<?php echo e($sub_total); ?>" />
                <input type="hidden" name="grand_total" id="grand_total" value="<?php echo e($total); ?>" />
                <input type="hidden" name="orderurl" id="orderurl" value="<?php echo e(URL::to('admin/pos/placeorder')); ?>" />
                <input type="hidden" name="customer" id="customer_info" value="" />
                <input type="hidden" name="grand_total1" id="grand_total1" value="<?php echo e($total); ?>" />
                <!------------------ currency section end ------------------>
                <hr>
                
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <a href="#" class="btn btn-success py-3 w-100 rounded-5" <?php if(count($cartitems)> 0): ?> data-bs-toggle="modal" data-bs-target="#peyment_methed" <?php endif; ?> ><?php echo e(trans('labels.place_order')); ?></a>
                        <?php if(count($cartitems) > 0): ?>
                        <button class="btn btn-danger py-3 w-100 rounded-5" onclick="RemoveCart('')">Empty Cart</button>
                        <?php endif; ?>
                    </div>
                </div>
                <!----------------- payment-option section end ----------------->
            </div>
        </div>
    </div>
</div>

<?php else: ?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <img src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png')); ?>" alt="empty-cart" class="w-25 object-fit-cover">
</div>

<?php endif; ?>
<!------------------------------------------ descktop siderbar end ------------------------------------------>
<!-- POS Invoice Model -->
<div class="modal fade pos-modal" id="pos-invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">POS Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-2"><?php echo e(@Auth::user()->name); ?></h3>
                <div class="order-details">
                    <p>#<?php echo e(@$getorderdata->order_number); ?></p>
                    <p class="fw-semibold"><?php echo e(@$getorderdata->customer_name); ?></p>
                    <p><?php echo e(@$getorderdata->customer_email); ?></p>
                    <p><?php echo e(@$getorderdata->mobile); ?></p>
                </div>
                <div class="store-details">
                    <p><?php echo e(trans('labels.date')); ?>: <span><?php echo e(@date('Y-m-d',strtotime($getorderdata->created_at))); ?></span></p>
                </div>
                <?php if(!empty($ordersdetails)): ?>
                <?php $__currentLoopData = $ordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="items-details mt-4">
                    <span class="fw-semibold mb-3"><?php echo e(@$item->item_name); ?> <?php if($item->variants_name != null): ?> - (<?php echo e($item->variants_name); ?> : <?php echo e(helper::currency_formate($item->variants_price, Auth::user()->id)); ?>) <?php endif; ?></span>
                    <?php if($item->extras_id != ''): ?>
                    <?php
                    $extras_id = explode(',', $item->extras_id);
                    $extras_name = explode(',', $item->extras_name);
                    $extras_price = explode(',', $item->extras_price);
                    $extras_total_price = 0;
                    ?>
                    <br>
                    <?php $__currentLoopData = $extras_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <small>
                        <b class="text-muted"><?php echo e($extras_name[$key]); ?></b> :
                        <?php echo e(helper::currency_formate($extras_price[$key], Auth::user()->id)); ?><br>
                    </small>
                    <?php
                    $extras_total_price += $extras_price[$key];
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php
                    $extras_total_price = 0;
                    ?>
                    <?php endif; ?>
                    <div class="items">
                        <p><?php echo e(trans('labels.price')); ?></p>
                        <p><?php echo e(@$item->qty); ?> X <?php echo e(@helper::currency_formate($item->price, Auth::user()->id)); ?></p>
                    </div>
                    <div class="items">
                        <p><?php echo e(trans('labels.tax')); ?></p>
                        <p><?php echo e(@helper::currency_formate($item->tax, Auth::user()->id)); ?></p>
                    </div>
                    <div class="items">
                        <p><?php echo e(trans('labels.total')); ?></p>
                        <p><?php echo e(@helper::currency_formate($item->price * $item->qty, Auth::user()->id)); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="total-amount mt-4">
                    <div class="items fw-semibold">
                        <p><?php echo e(trans('labels.sub_total')); ?></p>
                        <p><?php echo e(@helper::currency_formate($getorderdata->sub_total, Auth::user()->id)); ?></p>
                    </div>
                    <div class="items fw-semibold">
                        <p><?php echo e(trans('labels.tax')); ?> (+)</p>
                        <p><?php echo e(@helper::currency_formate($getorderdata->tax, Auth::user()->id)); ?></p>
                    </div>
                    <div class="items fw-semibold">
                        <p><?php echo e(trans('labels.discount')); ?> (-)</p>
                        <p><?php echo e(@helper::currency_formate($getorderdata->discount_amount, Auth::user()->id)); ?></p>
                    </div>
                    <div class="items fw-semibold">
                        <p><?php echo e(trans('labels.grand_total')); ?></p>
                        <p><?php echo e(@helper::currency_formate($getorderdata->grand_total, Auth::user()->id)); ?></p>
                    </div>
                </div>
                <h6 class="fw-semibold text-center mt-4"><?php echo e(trans('labels.thank_you_note')); ?></h6>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <a href="<?php echo e(URL::to('admin/orders/print/' . @$getorderdata->order_number)); ?>" target="new" class="btn btn-secondary">
                    <i class="fa-solid fa-print"></i>
                    <span class="px-2"><?php echo e(trans('labels.print')); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- POS ENd Invoice -->

<!-- payment method Modal -->
<div class="modal fade peyment_methed" id="peyment_methed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4"><?php echo e(trans('labels.select_option')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="payment-option delivery-Option text-capitalize px-3">
                    <h1 class="modal-title fs-5 fw-600"><?php echo e(trans('labels.delivery_option')); ?></h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="order_type" value="2" id="takeaway" class="card-input-element" checked />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <img src="<?php echo e(url(env('ASSETSPATHURL').'images/takeaway1.png')); ?>" alt="" class="">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600"><?php echo e(trans('labels.takeaway')); ?></p>
                        </div>
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="order_type" value="1" id="dinein" class="card-input-element" />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <img src="<?php echo e(url(env('ASSETSPATHURL').'images/dine_in.png')); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600"><?php echo e(trans('labels.dine_in')); ?></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="payment-option text-capitalize px-3">
                    <h1 class="modal-title fs-5 fw-600">Payment option</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="payment_type" value="1" id="payment_type" class="card-input-element" checked />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <i class="fa-solid fa-wallet fs-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600"><?php echo e(trans('labels.cash')); ?></p>

                        </div>
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="payment_type" value="0" id="payment_type2" class="card-input-element" />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <i class="fa-solid fa-globe fs-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600"><?php echo e(trans('labels.online')); ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="gap-1 d-flex justify-content-md-end sm-w-100">
                    <a href="http://192.168.29.206/restro/admin/plan" class="btn btn-danger btn-cancel m-1 sm-w-100" data-bs-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-success btn-succes m-1 sm-w-100" <?php if(count($cartitems)> 0): ?> onclick="placeorder()" <?php endif; ?> >Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- payment method Modal -->

<!-- MODAL_SELECTED_ADDONS--START -->
<div class="modal fade pos-modal" id="modal_selected_addons" tabindex="-1" aria-labelledby="selected_addons_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selected_addons_Label"><?php echo e(trans('labels.selected_addons')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 extra-variation-modal">
                <ul class="list-group list-group-flush p-0 <?php echo e(session()->get('direction') == 2 ? 'text-right' : 'text-left'); ?>">
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- MODAL_SELECTED_ADDONS--END -->
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/pos_cartview.js')); ?>" type="text/javascript"></script><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/pos/cartview.blade.php ENDPATH**/ ?>