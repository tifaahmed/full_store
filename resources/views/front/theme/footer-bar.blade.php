<style>

    @media (max-width: 768px) {
        .footer-main {
            overflow: hidden;
            position: fixed;
            bottom: 0;
            z-index: 9;
            height: 65px;
            width: 100%;
            right: 0;
            left: 0;
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
            display: none
        }
        .menu-links {
            margin: 0 auto;
            border-radius: 50px!important;
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
        .modal_basec{
            border-radius: 46px;
            z-index: 2;
            bottom: 18px;    
            box-shadow: 2px 23px 7px 33px #dae0eb;
        }
        .modal_user{
            border-radius: 46px;
            z-index: 2;
            bottom: 0;   
            height: 507px!important;            
            box-shadow: 2px 23px 7px 33px #dae0eb;
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
<div class=" footer-main mobile-only primary-color">
    <div class="ddd row footer-icons">


 
        <div class="col-2">
            <a style="width: 100%;"  type="button" data-bs-toggle="offcanvas"
            data-bs-target="#userProfileBottom" aria-controls="userProfileBottom">
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
                    {{ request()->is(@$storeinfo->slug.'/cart') ? 'active' : '' }} 
                    {{ request()->is('cart') ? 'active' : '' }}
                " 
                href="{{ URL::to(@$storeinfo->slug . '/cart') }}">
                <i class="fa fa-shopping-bag" style="font-size: 38px;" aria-hidden="true">
                    <span id="cartcount" class="cart-counting mx-2" >
                        {{ helper::getcartcount($storeinfo->id, @Auth::user()->id) }}
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
    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas modal_basec"  tabindex="-1"
     id="menuBottom" aria-labelledby="menuBottomLabel" >
        <div class="offcanvas-body small overflow-auto">
            <div class="tab-row" id="menu-center">

                <ul class="list-group theme-3-store-infos-list">

                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="{{ URL::to(@$storeinfo->slug . '/aboutus') }}">
                        <p class="px-2 fw-400 menu-p">
                            {{ trans('labels.about_us') }}
                            <i class="fa-regular fa-file-lines"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="{{ URL::to(@$storeinfo->slug . '/contact') }}">
                        <p class="px-2 fw-400 menu-p">
                            {{ trans('labels.contact_us') }}
                            <i class="fa-regular fa-address-card"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="{{ URL::to(@$storeinfo->slug . '/terms_condition') }}">
                        <p class="px-2 fw-400 menu-p">
                            {{ trans('labels.terms') }}
                            <i class="fa-regular fa-note-sticky"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="{{ URL::to(@$storeinfo->slug . '/privacypolicy') }}">
                        <p class="px-2 fw-400 menu-p">
                            {{ trans('labels.privacy_policy') }}
                            <i class="fa-solid fa-building-shield"></i>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color " href="javascript:void(0)"
                        data-bs-toggle="modal" data-bs-target="#subscribe_modal">
                        <p href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subscribe_modal"
                            class="px-2 fw-400 menu-p">
                            {{ trans('labels.subscribe') }}
                            <i class="fa-solid fa-bell"></i>
                        </p>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="col-md-6 d-flex justify-content-center m-auto">
    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas modal_user" tabindex="-1" id="userProfileBottom" aria-labelledby="userProfileBottomLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                {{trans('labels.my_acount')}}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small overflow-auto">
            <div class="tab-row" id="menu-center">
                <ul class="list-group theme-4-categories-list">

                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="#">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa-solid fa-user"></i>                            
                                {{ trans('labels.acount_information') }}
                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="#">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fas fa-map-marker-alt"></i>                                
                                {{ trans('labels.delivery_addresses') }}
                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="#">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class='fas fa-box-open'></i>
                                {{ trans('labels.my_orders') }}
                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    
                    <li class="list-group-item p-2 border-top-0" >
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="{{ URL::to($storeinfo->slug . '/change-password') }}">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                {{ trans('labels.change_password') }}
                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="#">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa-solid fa-book"></i>
                                {{ trans('labels.my_booking') }}
                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    @if (Auth::user() && Auth::user()->type == 3)
                        <li class="list-group-item p-2 border-top-0">
                            <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                            href="{{ URL::to($storeinfo->slug . '/login') }}">
                                <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    {{ trans('labels.log_out') }}
                                </p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="list-group-item p-2 border-top-0">
                            <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                            href="{{ URL::to($storeinfo->slug . '/login') }}">
                                <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    {{ trans('labels.log_in') }}
                                </p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
