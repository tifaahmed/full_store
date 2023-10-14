

<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->

<div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.order_details')); ?></h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="<?php echo e(URL::to($storeinfo->slug . '/orders/')); ?>" class="text-white"><?php echo e(trans('labels.orders')); ?></a></li>

                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.order_details')); ?></li>

            </ol>

        </nav>

    </div>
    
</div>


<!-- breadcrumb end -->

<section class="my-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 px-0 mt-0 order-det-card">
                <div class="row shadow rounded-4 py-3 mb-4">

                    <?php if( isset($summery['latitude']) && isset($summery['longitude']) ): ?>
                            <?php if (isset($component)) { $__componentOriginal408930a965c8ff9a32054713b4ae63431ba000eb = $component; } ?>
<?php $component = Larswiegers\LaravelMaps\Components\Leaflet::resolve(['markers' => [['lat' => $summery['latitude'], 'long' => $summery['longitude']  ]],'centerPoint' => ['lat' => $summery['latitude'], 'long' => $summery['longitude']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('maps-leaflet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Larswiegers\LaravelMaps\Components\Leaflet::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'height: 200px']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal408930a965c8ff9a32054713b4ae63431ba000eb)): ?>
<?php $component = $__componentOriginal408930a965c8ff9a32054713b4ae63431ba000eb; ?>
<?php unset($__componentOriginal408930a965c8ff9a32054713b4ae63431ba000eb); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <div class="row g-0 g-lg-5">

            <div class="col-lg-8 px-0 mt-0 order-det-card">

                <div class="row shadow rounded-4 py-3 mb-4">

                    <div class="d-flex align-items-center mb-3">

                        <i class="fa-solid fa-cart-flatbed"></i>

                        <p class="title px-2"><?php echo e(trans('labels.order_details')); ?></p>

                    </div>

                    <div class="card border-0 p-0">

                        <div class="card-body p-0">

                            <div class="order-details">

                                <ul class="row">

                                    <li class="col-md-6 col-lg-3 col-6">

                                        <a><?php echo e(trans('labels.order_date')); ?></a>

                                        <p><?php echo e(date('d/M/Y',strtotime($orderdata->created_at))); ?></p>

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-md-0 mt-lg-0 col-6">

                                        <a><?php echo e(trans('labels.status')); ?></a>

                                        <div class="d-flex align-items-center pt-1">

                                            <p class="pt-0 text-center m-auto">

                                             <?php if($orderdata->status == 1): ?>

                                              <?php echo e(trans('labels.pending')); ?>


                                            <?php elseif($orderdata->status == 2): ?>

                                              <?php echo e(trans('labels.processing')); ?>


                                            <?php elseif($orderdata->status == 5): ?>

                                                <?php if($orderdata->order_type == 3): ?>

                                                    <?php echo e(trans('labels.completed')); ?>


                                                <?php else: ?>

                                                    <?php echo e(trans('labels.deliverd')); ?>


                                                <?php endif; ?>

                                            <?php elseif($orderdata->status == '4'): ?>

                                                <?php echo e(trans('labels.cancelled_by_you')); ?>


                                            <?php elseif($orderdata->status == 3): ?>

                                              <?php echo e(trans('labels.cancelled')); ?>


                                            <?php endif; ?>

                                            </p>

                                        </div>

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">

                                        <a><?php echo e(trans('labels.type')); ?></a>

                                        <p>

                                            <?php if($orderdata->order_type == 1): ?>

                                                <?php echo e(trans('labels.delivery')); ?>


                                            <?php elseif($orderdata->order_type == 2): ?>

                                                <?php echo e(trans('labels.pickup')); ?>


                                            <?php elseif($orderdata->order_type == 3): ?>

                                                <?php echo e(trans('labels.dine_in')); ?>


                                            <?php endif; ?>

                                        </p>



                                        <?php if($orderdata->order_type == 3): ?>

                                            <span class="fs-8">( <?php echo e($orderdata['tableqr']->name); ?> )</span>

                                        <?php endif; ?>

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">

                                        <a><?php echo e(trans('labels.order')); ?></a>

                                        <div class="d-flex justify-content-center align-items-center pt-1">

                                            <strong class="pt-0">#<?php echo e($orderdata->order_number); ?></strong>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="row align-items-center py-3">



                        <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="card my-cart-categories border-bottom rounded-0 dark px-0 py-2">

                                <img src="<?php echo e(asset('storage/app/public/item/' . $odata->item_image)); ?>" class="card-img-top p-0 object-fit-cover border rounded-4" alt="...">

                                <div class="card-body <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-0'); ?>">

                                    <div class="text-section">

                                        <p class="title fs-6 pb-2"> <?php echo e($odata->item_name); ?></p>

                                        <div class="d-flex justify-content-between">

                                            <?php if($odata->variants_id != '' || $odata->extras_id != ''): ?>

                                               <a class="customisable" onclick="showextra('<?php echo e($odata->variants_name); ?>','<?php echo e($odata->variants_price); ?>','<?php echo e($odata->extras_name); ?>','<?php echo e($odata->extras_price); ?>','<?php echo e($odata->item_name); ?>')"><?php echo e(trans('labels.extras')); ?></a>

                                             <?php endif; ?>

                                             <a class="customisable">-</a>

                                             <p class="price fs-6"><?php echo e($odata->qty); ?> X <?php echo e(helper::currency_formate($odata->price,$storeinfo->id)); ?></p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>

                <div class="row shadow rounded-4 py-3 mb-4">

                    <div class="d-flex align-items-center mb-3 px-3">

                        <i class="fa-regular fa-credit-card"></i>

                        <p class="title px-2"><?php echo e(trans('labels.payment_summary')); ?></p>

                    </div>

                    <div class="card border-0 p-0">

                        <div class="card-body p-0">

                            <ul class="list-group list-group-flush order-summary-list px-3">

                                <li class="list-group-item">

                                    <?php echo e(trans('labels.sub_total')); ?>


                                    <span>

                                        <?php echo e(helper::currency_formate(@$summery['sub_total'], $storeinfo->id)); ?>


                                    </span>

                                </li>

                                <?php if($summery['discount_amount'] > 0): ?>

                                <li class="list-group-item">

                                    <?php echo e(trans('labels.discount')); ?> (<?php echo e($summery['couponcode']); ?>) 

                                    <span>

                                        <?php echo e(helper::currency_formate(@$summery['discount_amount'], $storeinfo->id)); ?>


                                    </span>

                                </li>

                                <?php endif; ?>



                                <?php if($summery['delivery_charge'] > 0): ?>

                                <li class="list-group-item">

                                    <?php echo e(trans('labels.delivery_charge')); ?>


                                    <span>

                                        <?php echo e(helper::currency_formate(@$summery['delivery_charge'], $storeinfo->id)); ?>


                                    </span>

                                </li>

                                <?php endif; ?>





                                <?php if($summery['tax'] > 0): ?>

                                    <li class="list-group-item">

                                        <?php echo e(trans('labels.tax')); ?>


                                        <span>

                                            <?php echo e(helper::currency_formate(@$summery['tax'], $storeinfo->id)); ?>


                                        </span>

                                    </li>



                                <?php endif; ?>

                                <li class="list-group-item fw-700 text-success">

                                    <?php echo e(trans('labels.total_amount')); ?>


                                    <span class="fw-700 text-success">

                                        <?php echo e(helper::currency_formate($summery['grand_total'], $storeinfo->id)); ?>


                                    </span>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>







            <div class="col-lg-4 mt-0 customer-left-side">



                <div class="row shadow rounded-4 py-3 mb-4">

                    <p class="title px-3"><?php echo e(trans('labels.customer')); ?></p>

                    <div class="card border-0 px-0 py-2">

                        <div class="card-body cust-info pt-2 pb-0">

                            <?php if($summery['customer_name'] != null): ?>

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-user"></i>

                                    <p class="px-2"><?php echo e($summery['customer_name']); ?></p>

                                </div>

                            <?php endif; ?>



                            <?php if($summery['customer_email'] != null): ?>

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-envelope"></i>

                                    <a href="#" class="px-2"><?php echo e($summery['customer_email']); ?></a>

                                </div>

                            <?php endif; ?>

                            <?php if($summery['mobile'] != null): ?>

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-solid fa-phone"></i>

                                    <b class="px-2 fw-500"><?php echo e($summery['mobile']); ?></b>

                                </div>

                            <?php endif; ?>

                            <?php if($summery['order_notes'] != null): ?>

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-clipboard"></i>

                                    <b class="px-2 fw-500"><?php echo e($summery['order_notes']); ?></b>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>



                <?php if($summery['order_type'] == 1): ?>

                    <div class="row shadow rounded-4 py-3 mb-4">

                        <p class="title px-3"><?php echo e(trans('labels.delivery_info')); ?></p>

                        <div class="card border-0 px-0 py-2">

                            <div class="card-body cust-info pt-2 pb-0">

                                <div class="d-flex align-items-start mb-2">

                                    <i class="fa-solid fa-location-dot pt-1"></i>

                                    <address class="px-2">

                                        <b> <?php echo e($summery['house_num']); ?>, <?php echo e($summery['block']); ?>, <?php echo e($summery['street']); ?>, <?php echo e($summery['pincode']); ?> </b>

                                    </address>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>





                <div class="row shadow rounded-4 py-3 mb-4">

                    <p class="title px-3"><?php echo e(trans('labels.payment_method')); ?></p>

                    <div class="card border-0 px-0 py-2">

                        <div class="card-body cust-info pt-2 pb-0">

                            <div class="d-flex align-items-center mb-2">

                                <i class="fa-solid fa-money-bill-wave"></i>

                                <p class="px-2">

                                <?php if($orderdata->payment_type == 1): ?>

                                    <?php echo e(trans('labels.cod')); ?>


                                <?php elseif($orderdata->payment_type == 2): ?>

                                    <?php echo e(trans('labels.razorpay')); ?>


                                <?php elseif($orderdata->payment_type == 3): ?>

                                    <?php echo e(trans('labels.stripe')); ?>


                                <?php elseif($orderdata->payment_type == 4): ?>

                                    <?php echo e(trans('labels.flutterwave')); ?>


                                <?php elseif($orderdata->payment_type == 5): ?>

                                    <?php echo e(trans('labels.paystack')); ?>


                                <?php elseif($orderdata->payment_type == 7): ?>

                                    <?php echo e(trans('labels.mercadopago')); ?>


                                <?php elseif($orderdata->payment_type == 8): ?>

                                    <?php echo e(trans('labels.paypal')); ?>


                                <?php elseif($orderdata->payment_type == 9): ?>

                                    <?php echo e(trans('labels.myfatoorah')); ?>


                                <?php elseif($orderdata->payment_type == 10): ?>

                                    <?php echo e(trans('labels.toyyibpay')); ?>


                                <?php endif; ?>

                                </p>

                            </div>

                            <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7 ,8 ,9 ,10])): ?>

                                <div class="mb-2">

                                    <span><?php echo e(trans('labels.payment_id')); ?></span>

                                    <p class="fw-600"><?php echo e($orderdata->payment_id); ?></p>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>





                <?php if($summery['status'] == 1): ?>

                  <a href="<?php echo e(URL::to('/cancel-order/' . $summery['order_number'])); ?>" class="btn-primary text-center w-100 bg-danger"><?php echo e(trans('labels.cancel')); ?></a>

                <?php endif; ?>



            </div>





        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/track-order.blade.php ENDPATH**/ ?>