<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(trans('labels.print')); ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(helper::image_path(@helper::appdata($getorderdata->vendor_id)->favicon)); ?>">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/toastr/toastr.min.css')); ?>">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/sweetalert/sweetalert2.min.css')); ?>">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/style.css')); ?>"><!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/responsive.css')); ?>">
    <!-- Responsive CSS -->
    <style type="text/css">
         body {width: 88mm;height: 100%;margin: 0;padding: 0;--webkit-font-smoothing: antialiased;}
        #printDiv {font-weight: 600;margin-left: 15px;padding: 0;}
        #printDiv div
        .center {display: block;margin-left: auto;margin-right: auto;width: 50%;}
        @media print {
            @page {
                margin: 0;
            }
            body {
                margin: 1.6cm;
            }
            #btnPrint{
                display: none;
            }
        }
        .border-top-bottom {
            border-top: 1px solid black !important;
            border-bottom: 1px solid black !important;
        }
    </style>
</head>
<body>
    <div id="printDiv" class="pos-modal">
        <h3 class="text-center mb-4 mt-2"><?php echo e(@helper::appdata($getorderdata->vendor_id)->website_title); ?></h3>
        <div class="order-details border-0">
            <p class="fw-normal">#<?php echo e(@$getorderdata->order_number); ?></p>
            <p class="fw-500"><?php echo e(@$getorderdata->customer_name); ?></p>
            <p><?php echo e(@$getorderdata->customer_email); ?></p>
            <p><?php echo e(@$getorderdata->mobile); ?></p>
            <p><?php echo e(@$getorderdata->delivery_area); ?></p>
        </div>
        <div class="store-details border-bottom pb-2">
            <p class="fw-normal"><?php echo e(trans('labels.date')); ?> : <span><?php echo e(@date('Y-m-d',strtotime($getorderdata->created_at))); ?></span></p>
            <?php if($getorderdata->order_notes): ?><p><?php echo e(trans('labels.order_note')); ?> : <small
            style="color: gray"> <?php echo e($getorderdata->order_notes); ?></small></p><?php endif; ?>
        </div>
        
        <?php if(!empty($ordersdetails)): ?>
        <?php $i=0; ?>
            <?php $__currentLoopData = $ordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>
            <div class="items-details border-bottom mt-2">
                <span class="fw-500 mb-3"> <?php echo e(@$item->item_name); ?> <?php if($item->variants_name != null): ?> - (<?php echo e($item->variants_name); ?> : <?php echo e(helper::currency_formate($item->variants_price, Auth::user()->id)); ?>) <?php endif; ?></span>
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
                <div class="items border-0 mb-2">
                    <p class="fw-normal"><?php echo e(trans('labels.price')); ?></p>
                    <p class="fw-normal"><?php echo e(@$item->qty); ?>  X  <?php echo e(@helper::currency_formate($item->price + $extras_total_price, Auth::user()->id)); ?></p>
                </div>
                
                <div class="items border-0 mb-2">
                    <p class="fw-normal"><?php echo e(trans('labels.total')); ?></p>
                    <p class="fw-normal"><?php echo e(@helper::currency_formate($item->price * $item->qty, Auth::user()->id)); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="total-amount mt-2">
            <div class="items border-0 mb-2 fw-500">
                <p><?php echo e(trans('labels.sub_total')); ?></p>
                <p><?php echo e(@helper::currency_formate($getorderdata->sub_total, Auth::user()->id)); ?></p>
            </div>
            <div class="items border-0 mb-2 fw-500">
                <p><?php echo e(trans('labels.discount')); ?> (-)</p>
                <p><?php echo e(@helper::currency_formate($getorderdata->discount_amount, Auth::user()->id)); ?></p>
            </div>
            
            <?php if($getorderdata->order_type == 1): ?>
            <div class="items border-0 mb-2 fw-500">
                <p><?php echo e(trans('labels.delivery_charge')); ?> (+)</p>
                <p><?php echo e(@helper::currency_formate($getorderdata->delivery_charge, Auth::user()->id)); ?></p>
            </div>
            <?php endif; ?>
            <div class="items border-0 border-top-bottom mt-3 fs-5 fw-600">
                <p><?php echo e(trans('labels.grand_total')); ?></p>
                <p><?php echo e(@helper::currency_formate($getorderdata->grand_total, Auth::user()->id)); ?></p>
            </div>
        </div>
        <h6 class="fw-500 text-center mt-4"><?php echo e(trans('labels.thank_you_note')); ?></h6>
                            
    </div>
    <div class="d-flex align-items-center justify-content-center mt-4">
        <button id="btnPrint" class="btn btn-secondary hidden-print center">
            <i class="fa-solid fa-print"></i>
            <span class="px-2">
                <?php echo e(trans('labels.print')); ?>

            </span>
        </button>
    </div>
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/orders/print.blade.php ENDPATH**/ ?>