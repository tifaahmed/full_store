

<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.my_cart')); ?></h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white"> <?php echo e(trans('labels.home')); ?></a></li>
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.my_cart')); ?></li>
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

<!-- My Cart section start -->

<?php if(count($cartdata) > 0): ?>

<section class="theme-1-margin-top pull-section-up">

    <div class="container">

        <div class="py-4">

            <div class="
                row 
                
                gx-2
            ">

                <!--  for rtl use this class (ps-md-5) -->

                <div class="col-md-12 col-lg-8 pb-4 px-0 <?php echo e(session()->get('direction') == 2 ? 'ps-lg-5 ' : 'pe-lg-5 '); ?>">

                    <div class="row align-items-center py-3">



                    <?php 

                        $total_price = 0;

                        $tax = 0;

                        $grand_total = 0;

                    ?>



                        <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php

                        

                            $total_price += ($cart->qty * $cart->price);

                            $tax += ($cart->qty * $cart->price * $cart->tax) / 100;

                        

                        

                        ?>

                        <input type="hidden" id="removecart" value="<?php echo e(URL::to('/cart/deletecartitem')); ?>" />

                        <input type="hidden" id="qtyupdate_url" value="<?php echo e(URL::to('/cart/qtyupdate')); ?>" />

                        <div class="
                        card my-cart-categories 
                        
                        rounded-0 dark px-0
                        ">

                            <img src="<?php echo e(asset('storage/app/public/item/' . $cart->item_image)); ?>" class="card-img-top p-0 object-fit-cover border rounded-4" alt="...">

                            <div class="card-body <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-0'); ?>">

                                <div class="text-section">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <p class="title fs-6"><?php echo e($cart->item_name); ?></p>

                                        <p class="fs-7 fw-400 pointer text-center text-danger"  onclick="RemoveCart('<?php echo e($cart->id); ?>')"><?php echo e(trans('labels.remove')); ?></p>

                                    </div>





                                    <?php if($cart->variants_id != '' || $cart->extras_id != ''): ?>

                                    <a href="javascript:void(0)" class="customisable" onclick="showextra('<?php echo e(@$cart->variants_name); ?>','<?php echo e(@$cart->variants_price); ?>','<?php echo e(@$cart->extras_name); ?>','<?php echo e(@$cart->extras_price); ?>','<?php echo e(@$cart->item_name); ?>')">

                                        <?php echo e(trans('labels.extras')); ?>


                                    </a>

                                    <?php endif; ?>

                                    <div class="d-flex justify-content-between align-items-center">

                                        

                                        <p class="price fs-6">  <?php echo e(helper::currency_formate($cart->qty * $cart->price, $storeinfo->id)); ?></p>

                                        <nav aria-label="Page navigation example">

                                            <ul class="pagination mb-0 justify-content-end">

                                                <li class="page-item">

                                                    <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'); ?>" href="#"  onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','minus')" aria-label="Previous">

                                                        <span aria-hidden="true">

                                                            <i class="fa-solid fa-minus fs-8"></i>

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="page-item">

                                                    <input type="text" class="page-link px-2 px-md-4 bg-light"

                                                    id="number_<?php echo e($cart->id); ?>" name="number"

                                                    value="<?php echo e($cart->qty); ?>" min="1" max="10" readonly>

                                                    

                                                </li>

                                                <li class="page-item">

                                                    <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'); ?>" href="#" onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','plus')" aria-label="Next">

                                                        <span aria-hidden="true">

                                                            <i class="fa-solid fa-plus fs-8"></i>

                                                        </span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </nav>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                       <?php

                        $grand_total = 0;

                        $grand_total = $total_price + $tax; 

                       ?>



                

                    </div>

                </div>

                <div class="col-md-12 col-lg-4 px-0">

                    <div class="card my-4 border p-3 rounded-4 shadow">

                        <p class="title pb-2">Order Summary</p>

                        <ul class="list-group list-group-flush order-summary-list">

                            <li class="list-group-item">

                                <?php echo e(trans('labels.sub_total')); ?>


                                <span>

                                    <?php echo e(helper::currency_formate($total_price, $storeinfo->id)); ?>


                                </span>

                            </li>

                            <li class="list-group-item">

                                <?php echo e(trans('labels.tax')); ?>


                                <span>

                                    <?php echo e(helper::currency_formate($tax, $storeinfo->id)); ?>


                                </span>

                            </li>

                            <li class="list-group-item fw-700 text-success">

                                <?php echo e(trans('labels.order_total')); ?> 

                                <span class="fw-700 text-success">

                                    <?php echo e(helper::currency_formate($grand_total, $storeinfo->id)); ?>


                                </span>

                            </li>

                        </ul>



                        <?php if(Auth::user() && Auth::user()->type == 3): ?>



                            <a class="btn-primary rounded-3 mt-4 text-center" href="<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>"><?php echo e(trans('labels.checkout')); ?></a>

                      

                        <?php else: ?>

                            <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>



                                <a class="btn-primary rounded-3 mt-4 text-center" href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><?php echo e(trans('labels.checkout')); ?></a>

                            <?php else: ?>



                                <a class="btn-primary rounded-3 mt-4 text-center" href="<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>"><?php echo e(trans('labels.checkout')); ?></a>

                            <?php endif; ?>

                        <?php endif; ?>

                       

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php else: ?>

     <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php endif; ?>    

<!-- My Cart section end -->

<!-- Checkout as Guest Modal -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-5">

            <div class="modal-header px-4">

                <h3 class="page-title mb-0"><?php echo e(trans('labels.proceed_as_guest_or_login')); ?></h3>

                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body py-3 px-4">

                <small><?php echo e(trans('labels.dont_have_account_guest')); ?></small>

            </div>

            <div class="modal-footer d-block py-3 md-py-4 px-4">

                <div class="row justify-content-between align-items-center g-2">

                    <div class="col-md-6 md-mt-0">

                        <a class="btn-primary w-100 text-center my-cart-account-btn" href="<?php echo e(URL::to(@$storeinfo->slug . '/login')); ?>"><?php echo e(trans('labels.login_with_your_account')); ?></a>

                    </div>

                    <div class="col-md-6 md-mt-0">

                        <a class="btn-primary w-100 text-center" href="<?php echo e(URL::to(@$storeinfo->slug . '/checkout')); ?>" ><?php echo e(trans('labels.continue_as_guest')); ?></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>





<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/cart.blade.php ENDPATH**/ ?>