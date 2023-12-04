
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.welcome_dashboard')); ?></h5>
        </div>
    </div>
<div class="row mb-0 mb-md-4">
    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card h-100 border-0 shadow desh_left">
            <div class="card-body p-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6">
                        <h4 class="card-title fw-600 fs-2"><?php echo e(trans('labels.quick_access_card_title')); ?></h4>
                        <p class="card-text pb-3">
                            <?php echo e(trans('labels.quick_access_card_description')); ?>

                        </p>
                        <div class="dropwdown d-inline-block">
                            <a class="btn bg-white border-0 dropwdown-desh-card" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="ms-1"><?php echo e(trans('labels.quick_access')); ?></span>
                                <i class="fa-regular fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu shadow border-0">

                                

                                <?php if(Auth::user()->type == 1): ?>
                                    <a href="<?php echo e(URL::to('admin/users')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        <?php echo e(trans('labels.restaurants')); ?>

                                    </a>

                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                        <a href="<?php echo e(URL::to('admin/plan')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">        
                                            <?php echo e(trans('labels.pricing_plans')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <a href="<?php echo e(URL::to('admin/transaction')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        <?php echo e(trans('labels.transaction')); ?>

                                    </a>    
                                <?php endif; ?>

                                

                                <?php if(Auth::user()->type == 2): ?>
                                    <a href="<?php echo e(URL::to('admin/categories')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        <?php echo e(trans('labels.category')); ?>

                                    </a>
                                    <a href="<?php echo e(URL::to('admin/products')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        <?php echo e(trans('labels.products')); ?>

                                    </a>
                                    <a href="<?php echo e(URL::to('admin/orders')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        <?php echo e(trans('labels.orders')); ?>

                                    </a>
                                <?php endif; ?>

                                

                                <a href="<?php echo e(URL::to('admin/settings')); ?>" class="dropdown-item d-flex align-items-center px-3 py-2">
                                    <?php echo e(trans('labels.setting')); ?>

                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end">
                        <img src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/about/seo-dashboard.png')); ?>" alt="" class="desh-chart-img d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-6 mt-4 mt-xl-0">
        <div class="row h-100">
            <?php if(Auth::user()->type == 1): ?>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard1">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == '2' ? 'text-start' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.users')); ?></p>
                                <h4 class="text-dark fw-bold fs-2"><?php echo e($totalvendors); ?></h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-user-plus fs-5"></i>
                            </span>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard2">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.pricing_plans')); ?></p>
                                <h4 class="text-dark fw-bold fs-2"><?php echo e($totalplans); ?></h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-regular fa-medal fs-5"></i>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php endif; ?>
            <?php if(Auth::user()->type == 2): ?>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard02">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == '2' ? 'text-end' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.products')); ?></p>
                                <h4 class="text-dark fw-bold fs-2"><?php echo e($totalvendors); ?></h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-list-timeline fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard03">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == '2' ? 'text-end' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.current_plan')); ?></p>
                                <?php if(!empty($currentplanname)): ?>
                                <h4 class="text-dark fw-bold fs-2"> <?php echo e(@$currentplanname->name); ?> </h4>
                                <?php else: ?>
                                <i class="fa-regular fa-exclamation-triangle h4 text-muted"></i>
                                <?php endif; ?>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-cart-flatbed-suitcase fs-5"></i>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="card h-100 border-0 box-shadow deshcard3">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark">
                                    <?php echo e(Auth::user()->type == 1 ? trans('labels.transaction') : trans('labels.orders')); ?>

                                </p>
                                <h4 class="text-dark fw-bold fs-2"><?php echo e($totalorders); ?></h4>
                            </span>
                            <span class="card-icon">
                                <?php if(Auth::user()->type == 1): ?>
                                <i class="fa-solid fa-chart-line fs-5"></i>
                                <?php else: ?>
                                <i class="fa-regular fa-cart-shopping fs-5"></i>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="card h-100 border-0 box-shadow deshcard4">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="<?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                <p class="fw-semibold fs-5 mb-1 text-dark"><?php echo e(trans('labels.revenue')); ?></p>
                                <h4 class="text-dark fw-bold fs-2"><?php echo e(helper::currency_formate($totalrevenue, Auth::user()->id)); ?></h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-chart-pie fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title"><?php echo e(trans('labels.revenue')); ?></h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="revenueyear"
                            data-url="<?php echo e(URL::to('/admin/dashboard')); ?>">
                            <?php if(count($revenue_years) > 0 && !in_array(date('Y'), array_column($revenue_years->toArray(), 'year'))): ?>
                                <option value="<?php echo e(date('Y')); ?>" selected><?php echo e(date('Y')); ?></option>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $revenue_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($revenue->year); ?>" <?php echo e(date('Y') == $revenue->year ? 'selected' : ''); ?>>
                                    <?php echo e($revenue->year); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="revenuechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            <?php echo e(Auth::user()->type == 1 ? trans('labels.users') : trans('labels.orders')); ?></h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="doughnutyear"
                            data-url="<?php echo e(request()->url()); ?>">
                            <?php if(count($doughnut_years) > 0 && !in_array(date('Y'), array_column($doughnut_years->toArray(), 'year'))): ?>
                                <option value="<?php echo e(date('Y')); ?>" selected><?php echo e(date('Y')); ?></option>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $doughnut_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useryear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($useryear->year); ?>"
                                    <?php echo e(date('Y') == $useryear->year ? 'selected' : ''); ?>><?php echo e($useryear->year); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option value="" selected disabled><?php echo e(trans('labels.select')); ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <h5 class="pages-title fs-2 py-2">
                <?php echo e(Auth::user()->type == 1 ? trans('labels.today_transaction') : trans('labels.processing_orders')); ?>

            </h5>
        </div>
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if(Auth::user()->type == 1): ?>
                            <?php echo $__env->make('admin.dashboard.admintransaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!--- Admin -------- users-chart-script --->
    <!--- VendorAdmin -------- orders-count-chart-script --->
    <script type="text/javascript">
        var doughnut = null;
        var doughnutlabels = <?php echo e(Js::from($doughnutlabels)); ?>;
        var doughnutdata = <?php echo e(Js::from($doughnutdata)); ?>;
    </script>
    <!--- Admin ------ revenue-by-plans-chart-script --->
    <!--- vendorAdmin ------ revenue-by-orders-script --->
    <script type="text/javascript">
        var revenuechart = null;
        var labels = <?php echo e(Js::from($revenuelabels)); ?>;
        var revenuedata = <?php echo e(Js::from($revenuedata)); ?>;
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\jop\full_store\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>