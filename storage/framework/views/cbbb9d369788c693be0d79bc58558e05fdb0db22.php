
<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-6">
        <!-- <h5 class="pages-title fs-2"><?php echo e(trans('labels.invoice')); ?></h5> -->
        <h5 class="pages-title fs-2">Order details</h5>
        <div class="d-flex">

            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="col-md-12 my-2 d-flex justify-content-end justify-content-md-end">
            <a href="<?php echo e(URL::to('admin/orders/print/' . $getorderdata->order_number)); ?>" tooltip="<?php echo e(trans('labels.print')); ?>" class="btn btn-success rounded-5 mx-2 px-3 py-2 <?php echo e(Auth::user()->type == 1 ? 'disabled' : ''); ?>">
                <i class="fa fa-pdf" aria-hidden="true"></i> <i class="fa-solid fa-print"></i>
            </a>
            <button type="button" class="btn btn-sm btn-primary px-4 dropdown-toggle" data-bs-toggle="dropdown"><?php echo e(trans('labels.status')); ?> :
                <?php if($getorderdata->status == '1'): ?> <?php echo e(trans('labels.pending')); ?> <?php elseif($getorderdata->status == '2'): ?> <?php echo e(trans('labels.accept')); ?> <?php elseif($getorderdata->status == '5'): ?> <?php echo e(trans('labels.complete')); ?> <?php elseif($getorderdata->status == '3'): ?> <?php echo e(trans('labels.reject')); ?> <?php endif; ?></button>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow <?php echo e(Auth::user()->type == 1 ? 'disabled' : ''); ?>">
                <a href="#" class="dropdown-item w-auto py-2 <?php if($getorderdata->status == '1'): ?> fw-600 <?php endif; ?>" onclick="statusupdate('<?php echo e(URL::to('admin/orders/update-' . $getorderdata->id . '-2')); ?>')"><?php echo e(trans('labels.accept')); ?></a>
                <a href="#" class="dropdown-item w-auto py-2 <?php if($getorderdata->status == '2'): ?> fw-600 <?php endif; ?>" onclick="statusupdate('<?php echo e(URL::to('admin/orders/update-' . $getorderdata->id . '-5')); ?>')"><?php echo e(trans('labels.complete')); ?></a>
                <a href="#" class="dropdown-item w-auto py-2" onclick="statusupdate('<?php echo e(URL::to('admin/orders/update-' . $getorderdata->id . '-3')); ?>')"><?php echo e(trans('labels.reject')); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row justify-content-between g-md-4 g-lg-4">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-circle-info fs-5"></i>
                        <h5 class="px-2 fw-500"><?php echo e(trans('labels.order_details')); ?></h5>
                    </div>
                    <div class="card-body">

                        <div class="basic-list-group">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <p><?php echo e(trans('labels.order_number')); ?></p>
                                    <p class="text-dark fw-600">#<?php echo e($getorderdata->order_number); ?></p>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <?php echo e(trans('labels.order_date')); ?>

                                    <p class="text-muted"><?php echo e(helper::date_format($getorderdata->created_at)); ?></p>
                                </li>
                                <?php if($getorderdata->order_from != 'pos' && $getorderdata->order_type != 3): ?>
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <?php echo e($getorderdata->order_type == 1 ? trans('labels.delivery_date') : trans('labels.pickup_date')); ?>

                                    <p class="text-muted"><?php echo e(helper::date_format($getorderdata->delivery_date)); ?></p>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <?php echo e($getorderdata->order_type == 1 ? trans('labels.delivery_time') : trans('labels.pickup_time')); ?>

                                    <p class="text-muted"><?php echo e($getorderdata->delivery_time); ?></p>
                                </li>
                                <?php endif; ?>

                                
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <?php echo e(trans('labels.payment_type')); ?>

                                    <span class="text-muted">
                                        <?php if($getorderdata->payment_type == 1): ?>
                                        <?php echo e(trans('labels.cod')); ?>

                                        <?php elseif($getorderdata->payment_type == 2): ?>
                                        <?php echo e(trans('labels.razorpay')); ?>

                                        <?php elseif($getorderdata->payment_type == 3): ?>
                                        <?php echo e(trans('labels.stripe')); ?>

                                        <?php elseif($getorderdata->payment_type == 4): ?>
                                        <?php echo e(trans('labels.flutterwave')); ?>

                                        <?php elseif($getorderdata->payment_type == 5): ?>
                                        <?php echo e(trans('labels.paystack')); ?>

                                        <?php elseif($getorderdata->payment_type == 7): ?>
                                        <?php echo e(trans('labels.mercadopago')); ?>

                                        <?php elseif($getorderdata->payment_type == 8): ?>
                                        <?php echo e(trans('labels.paypal')); ?>

                                        <?php elseif($getorderdata->payment_type == 9): ?>
                                        <?php echo e(trans('labels.myfatoorah')); ?>

                                        <?php elseif($getorderdata->payment_type == 10): ?>
                                        <?php echo e(trans('labels.toyyibpay')); ?>

                                        <?php elseif($getorderdata->payment_type == 0): ?>
                                        <?php echo e(trans('labels.online')); ?>

                                        <?php endif; ?>
                                    </span>
                                </li>
                                <?php if(in_array($getorderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10])): ?>
                                <li class="list-group-item px-0"><?php echo e(trans('labels.payment_id')); ?>

                                    <p class="text-muted">
                                        <?php echo e($getorderdata->payment_id); ?>

                                    </p>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if($getorderdata->notes != ''): ?>
                        <h6><?php echo e(trans('labels.order_notes')); ?></h6>
                        <small class="text-muted"><?php echo e($getorderdata->notes); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-user fs-5"></i>
                        <h5 class="px-2 fw-500"><?php echo e(trans('labels.customer')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <div class="basic-list-group">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <p><?php echo e(trans('labels.name')); ?></p>
                                            <p class="text-muted"> <?php echo e($getorderdata->customer_name); ?></p>
                                        </li>

                                        <?php if($getorderdata->mobile != null): ?>

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <p><?php echo e(trans('labels.mobile')); ?></p>
                                            <p class="text-muted"><?php echo e($getorderdata->mobile); ?></p>
                                        </li>

                                        <?php endif; ?>

                                        <?php if($getorderdata->customer_email != null): ?>

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <p><?php echo e(trans('labels.email')); ?></p>
                                            <p class="text-muted"><?php echo e($getorderdata->customer_email); ?></p>
                                        </li>
                                        <?php endif; ?>


                                        <?php if($getorderdata->delivery_time != null): ?>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <?php echo e($getorderdata->order_type == 1 ? trans('labels.delivery_time') : trans('labels.pickup_time')); ?>

                                            <p class="text-muted"><?php echo e($getorderdata->delivery_time); ?></p>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                        <h5 class="px-2 fw-500">
                            <?php if($getorderdata->order_type == 3): ?>
                                <?php echo e(trans('labels.other_info')); ?>

                            <?php else: ?>
                                <?php echo e(trans('labels.billing_info')); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <?php if($getorderdata->order_type == 1): ?>
                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                <?php if($getorderdata->order_from == 'pos'): ?>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.pos')); ?></p>
                                                        <p class="text-muted"> <?php echo e(trans('labels.dine_in')); ?></p>
                                                    </li>
                                                <?php else: ?>
                                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                    <p><?php echo e(trans('labels.block')); ?></p>
                                                    <p class="text-muted"> <?php echo e($getorderdata->block); ?></p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p><?php echo e(trans('labels.street')); ?></p>
                                                    <p class="text-muted"><?php echo e($getorderdata->street); ?></p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p><?php echo e(trans('labels.house_num')); ?></p>
                                                    <p class="text-muted"><?php echo e($getorderdata->house_num); ?></p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p><?php echo e(trans('labels.pincode')); ?></p>
                                                    <p class="text-muted"> <?php echo e($getorderdata->pincode); ?>.</p>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php elseif($getorderdata->order_type == 2): ?>

                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                <?php if($getorderdata->order_from == 'pos'): ?>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.order_type')); ?></p>
                                                        <p class="text-muted"> <?php echo e(trans('labels.takeaway')); ?></p>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.order_type')); ?></p>
                                                        <p class="text-muted"> <?php echo e(trans('labels.pickup')); ?></p>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php elseif($getorderdata->order_type == 3): ?>
                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.table')); ?></p>
                                                        <p class="text-muted"> <?php echo e($getorderdata['tableqr']->name); ?></p>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.size')); ?></p>
                                                        <p class="text-muted"> <?php echo e($getorderdata['tableqr']->size); ?> <?php echo e(trans('labels.seats')); ?></p>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p><?php echo e(trans('labels.area')); ?></p>
                                                        <p class="text-muted"> <?php echo e($getorderdata['tableqr']->area->name); ?> </p>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($getorderdata->latitude && $getorderdata->longitude): ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <?php if (isset($component)) { $__componentOriginal408930a965c8ff9a32054713b4ae63431ba000eb = $component; } ?>
<?php $component = Larswiegers\LaravelMaps\Components\Leaflet::resolve(['markers' => [['lat' => $getorderdata->latitude, 'long' => $getorderdata->longitude]],'centerPoint' => ['lat' => $getorderdata->latitude, 'long' => $getorderdata->longitude]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        </div>
    </div>  
<?php endif; ?>

<div class="row mt-4">
    <div class="col-md-12">

        <div class="card border-0 mb-3">
            <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                <i class="fa-solid fa-bag-shopping fs-5"></i>
                <h5 class="px-2 fw-500">Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="fw-500">
                                <td><?php echo e(trans('labels.image')); ?></td>
                                <td><?php echo e(trans('labels.products')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.unit_cost')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.qty')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.sub_total')); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $itemprice = $orders->price;
                            if ($orders->variants_id != '') {
                            $itemprice = $orders->variants_price;
                            }
                            ?>
                            <tr>
                                <td><img src="<?php echo e(helper::image_path($orders->item_image)); ?>" class="rounded-3 object-fit-cover hw-50" alt=""></td>
                                <td><?php echo e($orders->item_name); ?>

                                    <?php if($orders->variants_id != ''): ?>
                                    - <small><?php echo e($orders->variants_name); ?></small>
                                    <?php endif; ?>
                                    <?php if($orders->extras_id != ''): ?>
                                    <?php
                                    $extras_id = explode(',', $orders->extras_id);
                                    $extras_name = explode(',', $orders->extras_name);
                                    $extras_price = explode(',', $orders->extras_price);
                                    $extras_total_price = 0;
                                    ?>
                                    <br>
                                    <?php $__currentLoopData = $extras_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <small>
                                        <b class="text-muted"><?php echo e($extras_name[$key]); ?></b> :
                                        <?php echo e(helper::currency_formate($extras_price[$key], $getorderdata->vendor_id)); ?><br>
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
                                </td>
                                <td class="text-end">
                                    <?php echo e(helper::currency_formate($itemprice, $getorderdata->vendor_id)); ?>

                                    <?php if($extras_total_price > 0): ?>
                                    <br> <small class="text-muted"> +
                                        <?php echo e(helper::currency_formate($extras_total_price, $getorderdata->vendor_id)); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end"><?php echo e($orders->qty); ?></td>
                                <td class="text-end">
                                    <?php echo e(helper::currency_formate(($itemprice + $extras_total_price) * $orders->qty, $getorderdata->vendor_id)); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600"><?php echo e(trans('labels.sub_total')); ?></strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600"><?php echo e(helper::currency_formate($getorderdata->sub_total, $getorderdata->vendor_id)); ?></strong>
                                </td>
                            </tr>
                            <?php if($getorderdata->discount_amount > 0): ?>
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600"><?php echo e(trans('labels.discount')); ?></strong><?php echo e($getorderdata->couponcode != '' ? '(' . $getorderdata->couponcode . ')' : ''); ?>

                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600"><?php echo e(helper::currency_formate($getorderdata->discount_amount, $getorderdata->vendor_id)); ?></strong>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600"><?php echo e(trans('labels.tax')); ?></strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600"><?php echo e(helper::currency_formate($getorderdata->tax, $getorderdata->vendor_id)); ?></strong>
                                </td>
                            </tr>
                            <?php if($getorderdata->order_type == 1): ?>
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600"><?php echo e(trans('labels.delivery_charge')); ?>

                                        (<?php echo e($getorderdata->delivery_area); ?>) </strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600"><?php echo e(helper::currency_formate($getorderdata->delivery_charge, $getorderdata->vendor_id)); ?></strong>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr >
                                <td class="text-end text-success border-0" colspan="4">
                                    <strong class="fs-5"><?php echo e(trans('labels.grand_total')); ?></strong>
                                </td>
                                <td class="text-end text-success border-0">
                                    <strong class="fs-5"><?php echo e(helper::currency_formate($getorderdata->grand_total, $getorderdata->vendor_id)); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/orders/invoice.blade.php ENDPATH**/ ?>