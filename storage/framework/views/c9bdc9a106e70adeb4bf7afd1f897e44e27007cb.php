

<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->

<div class="breadcrumb-sec desk-only">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2"><?php echo e(trans('labels.orders')); ?></h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-white">  <?php echo e(trans('labels.home')); ?></a></li>

                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''); ?>"><?php echo e(trans('labels.orders')); ?></li>

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

<!-- Orders section end -->




<section class="bg-light mt-0 py-5  pull-section-up">

    <div class="container">

        <div class="row">

            <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-md-12 col-lg-9">

                <div class="card shadow border-0 rounded-5">

                    <div class="card-body py-4">

                        <h2 class="page-title mb-2 px-3"><?php echo e(trans('labels.orders')); ?></h2>

                        <p class="page-subtitle px-3 mb-0 line-limit-2"></p>

                        <!-- data table start -->





                        <?php if(count($getorders) > 0): ?>

                        <div class="table-responsive py-4 px-3">

                            <table id="example" class="table table-striped table-bordered zero-configuration">

                                <thead>

                                    <tr>

                                        <th><?php echo e(trans('labels.srno')); ?></th>

                                            <th><?php echo e(trans('labels.order_number')); ?></th>

                                            <th><?php echo e(trans('labels.date')); ?></th>

                                            <th><?php echo e(trans('labels.grand_total')); ?></th>

                                            <th><?php echo e(trans('labels.payment_type')); ?></th>

                                            <th><?php echo e(trans('labels.status')); ?></th>

                                            <th><?php echo e(trans('labels.action')); ?></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $i = 1; ?>

                                    <?php $__currentLoopData = $getorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr >

                                        <td><?php echo $i++; ?></td>

                                        <td>

                                            <a href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number)); ?>">

                                                <?php echo e($orderdata->order_number); ?>


                                            </a>

                                        </td>

                                        <td><?php echo e(helper::date_format($orderdata->created_at)); ?></td>

                                        <td><?php echo e(helper::currency_formate($orderdata->grand_total, $orderdata->vendor_id)); ?></td>

                                        <td>

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

                                            <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10])): ?>

                                            : <?php echo e($orderdata->payment_id); ?>


                                            <?php endif; ?>

                                        </td>

                                        <td>
                                           
                                            <?php if($orderdata->status == '1'): ?>

                                            <span class="text-warning"> <i class="fa-regular fa-bell"></i>

                                                <?php echo e(trans('labels.placed')); ?></span>

                                            <?php elseif($orderdata->status == '2'): ?>

                                            <span class="text-info"> <i class="fa-solid fa-list-check"></i>

                                                <?php echo e(trans('labels.preparing')); ?></span>

                                            <?php elseif($orderdata->status == '3'): ?>

                                            <span class="text-danger"> <i class="fa-regular fa-circle-xmark"></i>

                                                <?php echo e(trans('labels.cancelled_by_you')); ?></span>

                                            <?php elseif($orderdata->status == '4'): ?>

                                            <span class="text-danger"> <i class="fa-regular fa-circle-xmark"></i>

                                                <?php echo e(trans('labels.cancelled_by_user')); ?></span>

                                            <?php elseif($orderdata->status == '5'): ?>

                                            <span class="text-success"> <i class="fa-solid fa-check"></i>

                                                <?php echo e(trans('labels.delivered')); ?></span>

                                            <?php else: ?>

                                            --

                                            <?php endif; ?>

                                        </td>

                                        <td>



                                            <a class="btn btn-sm btn-light eye-icon-box p-0 " href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number)); ?>">

                                                <i class="fa-regular fa-eye"></i>

                                            </a>

                                        </td>



                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    

                                    

                                </tbody>

                            </table>

                        </div>



                        <?php else: ?>

                                <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>







                        <!-- data table end -->

                    </div>

                </div>

            </div>

        </div>

    </div>
    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>

<!-- Orders section end -->

<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

    <i class="fa-solid fa-bars-staggered text-white"></i>

    <span class="px-2"><?php echo e(trans('labels.account_menu')); ?></span>

</button>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/orders.blade.php ENDPATH**/ ?>