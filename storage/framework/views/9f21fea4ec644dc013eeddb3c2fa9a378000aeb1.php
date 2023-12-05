<div class="col-md-3 d-lg-block d-none">
    <div class="setting-page-profile">
        <img src="<?php echo e(helper::image_path(@Auth::user()->image)); ?>" alt="" class="mb-2">
        <h3 class="mb-1"><?php echo e(@Auth::user()->name); ?></h3>
        <a><?php echo e(@Auth::user()->email); ?></a>
    </div>
    <p class="setting-left-sidetitle"><?php echo e(trans('labels.account')); ?></p>
    <ul class="setting-left-sidebar">
        <li>
            <a href="<?php echo e(URL::to($storeinfo->slug . '/profile/')); ?>">
                <i class="fa-regular fa-user"></i>
                <span class="px-3"><?php echo e(trans('labels.profile')); ?></span>
            </a>
        </li>
        <li>
            <?php if(@Auth::user()->google_id == "" && @Auth::user()->facebook_id == ""): ?>
             <a href="<?php echo e(URL::to($storeinfo->slug . '/change-password/')); ?>">
                <i class="fa-solid fa-lock"></i>
                <span class="px-3"><?php echo e(trans('labels.change_password')); ?></span>
            </a>
            <?php endif; ?>
        </li>
    </ul>
    <p class="setting-left-sidetitle"><?php echo e(trans('labels.dashboard')); ?></p>
    <ul class="setting-left-sidebar">
        <li>
            <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
            href="#">
                <i class="fa-solid fa-book"></i>
                <span class="px-3"><?php echo e(trans('labels.my_booking')); ?></span>
            </a>
        </li>
        <li>
            <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
            href="<?php echo e(URL::to($storeinfo->slug . '/user-address')); ?>">
            <i class="fas fa-map-marker-alt"></i>   
                <span class="px-3"><?php echo e(trans('labels.my_addresses')); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(URL::to($storeinfo->slug . '/orders/')); ?>">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="px-3"><?php echo e(trans('labels.orders')); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(URL::to($storeinfo->slug . '/favorites/')); ?>">
                <i class="fa-regular fa-heart"></i>
                <span class="px-3"><?php echo e(trans('labels.favourites')); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(URL::to($storeinfo->slug . '/logout/')); ?>" >
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="px-3"><?php echo e(trans('labels.logout')); ?></span>
            </a>
        </li>
    </ul>
</div>







<div class="offcanvas offcanvas-start bg-light offcanvas-width" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header justify-content-end mx-4">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-5">
        <div class="setting-page-profile">
            <img src="<?php echo e(helper::image_path(@Auth::user()->image)); ?>" alt="" class="mb-2">
            <h3 class="mb-1"><?php echo e(@Auth::user()->name); ?></h3>
            <a><?php echo e(@Auth::user()->email); ?></a>
        </div>
        <p class="setting-left-sidetitle"><?php echo e(trans('labels.account')); ?></p>
        <ul class="setting-left-sidebar">
            <li>
                <a href="<?php echo e(URL::to($storeinfo->slug . '/profile/')); ?>">
                    <i class="fa-regular fa-user"></i>
                    <span class="px-3"><?php echo e(trans('labels.profile')); ?></span>
                </a>
            </li>
            <li>
                <?php if(@Auth::user()->google_id == "" && @Auth::user()->facebook_id == ""): ?>
                 <a href="<?php echo e(URL::to($storeinfo->slug . '/change-password/')); ?>">
                    <i class="fa-solid fa-lock"></i>
                    <span class="px-3"><?php echo e(trans('labels.change_password')); ?></span>
                </a>
                <?php endif; ?>
            </li>
        </ul>
        <p class="setting-left-sidetitle"><?php echo e(trans('labels.dashboard')); ?></p>
        <ul class="setting-left-sidebar">
            <li>
                <a href="#">
                    <i class="fa-solid fa-book"></i>
                    <span class="px-3"><?php echo e(trans('labels.my_booking')); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(URL::to($storeinfo->slug . '/orders/')); ?>">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="px-3"><?php echo e(trans('labels.orders')); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(URL::to($storeinfo->slug . '/favorites/')); ?>">
                    <i class="fa-regular fa-heart"></i>
                    <span class="px-3"><?php echo e(trans('labels.favourites')); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(URL::to($storeinfo->slug . '/logout/')); ?>" >
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="px-3"><?php echo e(trans('labels.logout')); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\Users\Jadara\Desktop\store\full_store\resources\views/front/theme/user_sidebar.blade.php ENDPATH**/ ?>