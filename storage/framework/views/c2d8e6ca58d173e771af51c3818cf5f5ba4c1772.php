<!------------------- main-header start ------------------->
<header class="main-header">
    <div class="navbar d-flex align-items-center">
        <div class="container">
            <div class="logo">
                <a href="<?php echo e(URL::to('/')); ?>">
                    <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="logo">
                </a>
            </div>
            <nav class="element main-menu navbar navbar-expand-lg ms-xl-5 me-auto d-none d-lg-block">
                <ul class="navbar-nav nav-menu mb-2 mb-lg-0">
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('/#home')); ?>"><?php echo e(trans('landing.home')); ?></a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('/#features')); ?> "><?php echo e(trans('landing.features')); ?></a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('/#our-stores')); ?> "><?php echo e(trans('landing.our_stores')); ?></a>
                    </li>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('/#pricing-plans')); ?> "><?php echo e(trans('landing.pricing_plan')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('blog_list')); ?>"><?php echo e(trans('landing.blogs')); ?></a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="<?php echo e(URL::to('/#contect-us')); ?> "><?php echo e(trans('landing.contact_us')); ?></a>
                    </li>

                    <li class="nav-item text-uppercase text-white">
                        <a href="javascript:void(0)" aria-current="page" data-bs-toggle="modal" data-bs-target="#searchModal"> <?php echo e(trans('landing.search_store')); ?></a>
                    </li>

                </ul>

            </nav>


            <div class="d-flex align-items-center gap-2">
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1): ?>
                <div class="btn-group">
                    <a class="nav-link d-flex ctm-btn gap-1 align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-globe2"></i>  <?php echo e(session()->get('direction') == 2 ? 'AR' : 'EN'); ?>

                    </a>
                    <ul class="dropdown-menu user-dropdown-menu <?php echo e(session()->get('direction') == 2 ? 'drop-menu-rtl' : 'drop-menu'); ?>">

                        <?php $__currentLoopData = helper::listoflanguage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languagelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="dropdown-item language-items py-2 d-flex text-start" href="<?php echo e(URL::to('/lang/change?lang=' . $languagelist->code)); ?>">
                                <img src="<?php echo e(helper::image_path($languagelist->image)); ?>" alt="" class="language-items-img">
                                <span class="px-2 text-dark"><?php echo e($languagelist->name); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </div>

                <?php endif; ?>

                <div class="d-flex justify-content-end d-none d-lg-block">
                    <a href="<?php echo e(URL::to('/admin')); ?>" class="ctm-btn" target="_blank"><span class="m-0  fs-6"><?php echo e(trans('landing.get_started')); ?>  <i class="bi bi-arrow-right"></i> </a>
                </div>
            </div>




            <button class="btn text-white border-white d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasRight"><i class="fa-solid fa-bars-staggered"></i></button>


            <!---------------- sidebar ---------------->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header justify-content-between align-items-center border-bottom border-dark">
                    <p class="menu_title"><?php echo e(trans('landing.menu')); ?></p>
                    <button type="button" class="btn_close btn shadow" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="offcanvas-body p-0">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('/#home')); ?>" class="active"><?php echo e(trans('landing.home')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('/#features')); ?>"><?php echo e(trans('landing.features')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('/#our-stores')); ?>"><?php echo e(trans('landing.our_stores')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('/#pricing-plans')); ?>"><?php echo e(trans('landing.pricing_plan')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('blog_list')); ?>"><?php echo e(trans('landing.blogs')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="<?php echo e(URL::to('/#contect-us')); ?> "><?php echo e(trans('landing.contact_us')); ?></a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#searchModal"><?php echo e(trans('landing.search_store')); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!---------------- sidebar ---------------->
        </div>
    </div>

</header>
<!-------------------- main-header end -------------------->

<?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/landing/layout/header.blade.php ENDPATH**/ ?>