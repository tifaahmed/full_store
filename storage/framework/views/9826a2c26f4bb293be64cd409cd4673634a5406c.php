<style>

    @media (max-width: 768px) {
        .footer-main {
        overflow: hidden;
        position: fixed;
        bottom: 0;
        z-index: 9;
        height: 65px;
        width: 100%;
        text-align: center;
        border-radius: 45% 45% 0% 0%;
        }
        .footer-icons{
            font-size: 31px !important;
            color: #fff;
            position: relative;
            bottom: -16px;
        }
        .cart-counting{
            position: relative;
            bottom: 32px;
            left: 39%;
        }
        .mobile-only {
        display: block;
        }
        .desk-only {
            display: none;
        }
        .offcanvas-backdrop.show {
            opacity: 0!important;
        }
        .menu-links {
            margin: 0 auto;
            border-radius: 50px!important;
            background: red;
            color: #fff;
            font-size: 26px;
            padding: 4px 16px!important;
            width: 80%;
        }
        .menu-p{
            font-size: 20px;
            text-align: center;
            width: 100%;
        }

        .pull-section-up{
            border-radius: 50px;
            position: relative;
            background: #fff;
            top: -170px;
            padding: 0px 33px;
        }
    }
    @media (min-width: 768px) {
      .mobile-only {
        display: none;
      }
      .desk-only {
        display: block;
      }
    }

</style>
<div class=" footer-main mobile-only">
    <div class="ddd row footer-icons">


        <div class="col-2">
            <a href="#" >
                <i style="color:#fff;"  class="far fa-user-circle"></i>
            </a>
        </div>
        <div class="col-2">
            <a class="nav-link d-lg-none text-white" href="javascript:void(0)" data-bs-toggle="modal"
            data-bs-target="#searchModal">
                <span>
                    <i class="fa-solid fa-magnifying-glass fs-5" style="font-size: 31px !important;" ></i>
                </span>
            </a>
        </div>


        <div class="col-4">
            <a class="
                    nav-link position-relative 
                    <?php echo e(request()->is(@$storeinfo->slug.'/cart') ? 'active' : ''); ?> 
                    <?php echo e(request()->is('cart') ? 'active' : ''); ?>

                " 
                href="<?php echo e(URL::to(@$storeinfo->slug . '/cart')); ?>">
                <i class="fa fa-shopping-bag" style="font-size: 38px;" aria-hidden="true">
                    <span id="cartcount" class="cart-counting mx-2" >
                        <?php echo e(helper::getcartcount($storeinfo->id, @Auth::user()->id)); ?>

                    </span>
                </i>
            </a>
        </div>

        <div class="col-2">
            <div class="whatsapp_icon ">
                <label class=" " for="check">
                    <i class="fab fa-whatsapp" style=" "></i> 
                </label>
            </div>
        </div>
        <div class="col-2">
        
            <a style="width: 100%;"  type="button" data-bs-toggle="offcanvas"
            data-bs-target="#menuBottom" aria-controls="menuBottom">
                <i class="fa-solid fa-bars"></i>            
            </a>
        </div>
    </div>
</div>


 

<div class="col-md-6 d-flex justify-content-center m-auto">
    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas"  tabindex="-1"
     id="menuBottom" aria-labelledby="menuBottomLabel" style="    border-radius: 46px;
     z-index: 2;
     bottom: 18px;    box-shadow: 2px 23px 7px 33px #dae0eb;">
        <div class="offcanvas-body small overflow-auto">
            <div class="tab-row" id="menu-center">

                <ul class="list-group theme-3-store-infos-list">

                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links"
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.about_us')); ?>

                            <i class="fa-regular fa-file-lines"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links"
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.contact_us')); ?>

                            <i class="fa-regular fa-address-card"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links"
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/terms_condition')); ?>">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.terms')); ?>

                            <i class="fa-regular fa-note-sticky"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links"
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/privacypolicy')); ?>">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.privacy_policy')); ?>

                            <i class="fa-solid fa-building-shield"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links" href="javascript:void(0)"
                        data-bs-toggle="modal" data-bs-target="#subscribe_modal">
                        <p href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subscribe_modal"
                            class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.subscribe')); ?>

                            <i class="fa-solid fa-bell"></i>
                        </p>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/theme/footer-bar.blade.php ENDPATH**/ ?>