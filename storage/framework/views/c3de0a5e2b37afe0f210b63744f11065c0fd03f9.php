<div class="row g-4 mb-2">

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div class="card box-shadow h-100 ordercard1 <?php echo e(request()->get('status') == '' ? 'border border-primary' : 'border-0'); ?>">
            <?php if(request()->is('admin/report')): ?>
                <a
                    href="<?php echo e(URL::to(request()->url() . '?status=&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                <?php elseif(request()->is('admin/orders')): ?>
                    <a href="<?php echo e(URL::to('admin/orders?status=')); ?>">
                    <?php elseif(request()->is('admin/customers/orders*')): ?>
                        <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=')); ?>">
            <?php endif; ?>
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.total_orders')); ?></p>
                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalorders); ?></h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-shopping-cart"></i> -->
                        <i class="fa-regular fa-rectangle-list fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>
    <?php if(request()->is('admin/orders') || request()->is('admin/customers/orders*')): ?>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div
                class="card box-shadow h-100 ordercard2 <?php echo e(request()->get('status') == 'processing' ? 'border border-primary' : 'border-0'); ?>">
                <?php if(request()->is('admin/report')): ?>
                    <a
                        href="<?php echo e(URL::to(request()->url() . '?status=processing&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                    <?php elseif(request()->is('admin/orders')): ?>
                        <a href="<?php echo e(URL::to('admin/orders?status=processing')); ?>">
                        <?php elseif(request()->is('admin/customers/orders*')): ?>
                            <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=processing')); ?>">
                <?php endif; ?>
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                            <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.processing')); ?></p>
                            <h4 class="text-dark fw-bold fs-2"><?php echo e($totalprocessing); ?></h4>
                        </span>
                        <span class="card-icon">
                            <i class="fa-solid fa-hourglass-half fs-5"></i>
                        </span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div
            class="card box-shadow h-100 ordercard3 <?php echo e(request()->get('status') == 'delivered' ? 'border border-primary' : 'border-0'); ?>">
            <?php if(request()->is('admin/report')): ?>
                <a
                    href="<?php echo e(URL::to(request()->url() . '?status=delivered&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                <?php elseif(request()->is('admin/orders')): ?>
                    <a href="<?php echo e(URL::to('admin/orders?status=delivered')); ?>">
                    <?php elseif(request()->is('admin/customers/orders*')): ?>
                        <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=delivered')); ?>">
            <?php endif; ?>
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.delivered')); ?></p>
                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalcompleted); ?></h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-check"></i> -->
                        <i class="fa-solid fa-check-to-slot fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div
            class="card box-shadow h-100 ordercard4 <?php echo e(request()->get('status') == 'cancelled' ? 'border border-primary' : 'border-0'); ?>">
            <?php if(request()->is('admin/report')): ?>
                <a
                    href="<?php echo e(URL::to(request()->url() . '?status=cancelled&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>">
                <?php elseif(request()->is('admin/orders')): ?>
                    <a href="<?php echo e(URL::to('admin/orders?status=cancelled')); ?>">
                    <?php elseif(request()->is('admin/customers/orders*')): ?>
                        <a href="<?php echo e(URL::to('admin/customers/orders-' . @$userinfo->id . '?status=cancelled')); ?>">
            <?php endif; ?>
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                        <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.cancelled')); ?></p>
                        <h4 class="text-dark fw-bold fs-2"><?php echo e($totalcancelled); ?></h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-close"></i> -->
                        <i class="fa-solid fa-circle-xmark fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>

    <?php if(request()->is('admin/report*')): ?>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="card box-shadow h-100 reportcard1">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                            <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.revenue')); ?></p>
                            <h4 class="text-dark fw-bold fs-2"><?php echo e(helper::currency_formate($totalrevenue, Auth::user()->id)); ?></h4>
                        </span>
                        <span class="card-icon">
                            <i class="fa-regular fa-money-bill-1-wave"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/orders/statistics.blade.php ENDPATH**/ ?>