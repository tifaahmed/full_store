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
        .footer-icons {
            font-size: 31px !important;
            color: #fff;
            position: relative;
            bottom: 0;
            height: 100%;
        }
        .cart-counting {
            position: absolute;
            bottom: auto;
            left: 12px;
            top: -8px;
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
            top: -50px;
            padding: 0px 0;
        }
        .pull-section-up   .card-body {
                padding: 0;
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
        .hide_when_footer_bar_show {
            display: none!important;
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
<div class="nav-responsive"> 


        <div class="sub-nav-responsive">
            <?php if(Auth::user() && Auth::user()->type == 3): ?>
            <a style="width: 100%; "  type="button" data-bs-toggle="offcanvas"
            data-bs-target="#userProfileBottom" aria-controls="userProfileBottom">
                <svg id="Capa_1" enable-background="new 0 0 189.524 189.524"
                    viewBox="0 0 189.524 189.524" width="27px" style="fill:#fff;"
                    xmlns="http://www.w3.org/2000/svg"><g><g>
                    <path clip-rule="evenodd"
                    d="m170.94 151.134c11.678-15.753 18.584-35.256 18.584-56.372 0-52.336-42.427-94.762-94.762-94.762-52.336 0-94.762 42.426-94.762 94.762 0 52.335 42.426 94.762 94.762 94.762 27.458 0 52.188-11.678 69.496-30.339 2.37-2.557 4.602-5.244 6.682-8.051zm-5.254-8.991c9.071-13.552 14.361-29.849 14.361-47.381 0-47.102-38.183-85.286-85.286-85.286-47.101 0-85.285 38.184-85.285 85.286 0 17.533 5.29 33.829 14.362 47.381 11.445-17.098 28.909-29.827 49.361-35.155-9.875-6.843-16.342-18.255-16.342-31.179 0-20.934 16.971-37.905 37.905-37.905s37.905 16.971 37.905 37.905c0 12.923-6.468 24.336-16.342 31.178 20.451 5.329 37.916 18.057 49.361 35.156zm-6.104 8.047c-13.299-21.869-37.353-36.476-64.819-36.476-27.467 0-51.522 14.607-64.821 36.477 15.642 18.275 38.878 29.857 64.82 29.857s49.178-11.583 64.82-29.858zm-64.82-45.952c15.701 0 28.429-12.727 28.429-28.429 0-15.701-12.727-28.429-28.429-28.429s-28.429 12.729-28.429 28.43 12.728 28.428 28.429 28.428z"
                    fill-rule="evenodd"/></g></g>
                </svg>
            </a>
            <?php else: ?>
            <a style="width: 100% ; display: block;" href="<?php echo e(URL::to($storeinfo->slug.'/login')); ?>">
                <svg id="Capa_1" enable-background="new 0 0 189.524 189.524"
                    viewBox="0 0 189.524 189.524" width="27px" style="fill:#fff;"
                    xmlns="http://www.w3.org/2000/svg"><g><g>
                    <path clip-rule="evenodd"
                    d="m170.94 151.134c11.678-15.753 18.584-35.256 18.584-56.372 0-52.336-42.427-94.762-94.762-94.762-52.336 0-94.762 42.426-94.762 94.762 0 52.335 42.426 94.762 94.762 94.762 27.458 0 52.188-11.678 69.496-30.339 2.37-2.557 4.602-5.244 6.682-8.051zm-5.254-8.991c9.071-13.552 14.361-29.849 14.361-47.381 0-47.102-38.183-85.286-85.286-85.286-47.101 0-85.285 38.184-85.285 85.286 0 17.533 5.29 33.829 14.362 47.381 11.445-17.098 28.909-29.827 49.361-35.155-9.875-6.843-16.342-18.255-16.342-31.179 0-20.934 16.971-37.905 37.905-37.905s37.905 16.971 37.905 37.905c0 12.923-6.468 24.336-16.342 31.178 20.451 5.329 37.916 18.057 49.361 35.156zm-6.104 8.047c-13.299-21.869-37.353-36.476-64.819-36.476-27.467 0-51.522 14.607-64.821 36.477 15.642 18.275 38.878 29.857 64.82 29.857s49.178-11.583 64.82-29.858zm-64.82-45.952c15.701 0 28.429-12.727 28.429-28.429 0-15.701-12.727-28.429-28.429-28.429s-28.429 12.729-28.429 28.43 12.728 28.428 28.429 28.428z"
                    fill-rule="evenodd"/></g></g>
                </svg>
            </a>
            <?php endif; ?>

        </div>


        <div class="sub-nav-responsive">
            <a
            class="nav-link d-lg-none"
            href="javascript:void(0)"
            data-bs-toggle="modal"
            data-bs-target="#searchModal">
                <span>


                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none">
                    <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 22L20 20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>


                </span>
            </a>
        </div>


        <div class="sub-nav-responsive">
            <a class="
                    card-nav-bar
                    <?php echo e(request()->is(@$storeinfo->slug.'/cart') ? 'active' : ''); ?>

                    <?php echo e(request()->is('cart') ? 'active' : ''); ?>

                "
                href="<?php echo e(URL::to(@$storeinfo->slug . '/cart')); ?>">

                <!-- Created with Inkscape (http://www.inkscape.org/) -->

                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none">
                        <path d="M7.5 7.67001V6.70001C7.5 4.45001 9.31 2.24001 11.56 2.03001C14.24 1.77001 16.5 3.88001 16.5 6.51001V7.89001" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.99999 22H15C19.02 22 19.74 20.39 19.95 18.43L20.7 12.43C20.97 9.99 20.27 8 16 8H7.99999C3.72999 8 3.02999 9.99 3.29999 12.43L4.04999 18.43C4.25999 20.39 4.97999 22 8.99999 22Z" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.4955 12H15.5045" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.49451 12H8.50349" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span id="cartcount" class="cart-counting">
                        <?php echo e(helper::getcartcount($storeinfo->id, @Auth::user()->id)); ?>

                    </span>
                </i>
            </a>
        </div>

        <div class="sub-nav-responsive">
            <div class="whatsapp_icon ">
                <label class=" " for="check">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none">
                    <path d="M6.9 20.6C8.4 21.5 10.2 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 13.8 2.5 15.5 3.3 17L2.44044 20.306C2.24572 21.0549 2.93892 21.7317 3.68299 21.5191L6.9 20.6Z" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.5 14.8485C16.5 15.0105 16.4639 15.177 16.3873 15.339C16.3107 15.501 16.2116 15.654 16.0809 15.798C15.86 16.041 15.6167 16.2165 15.3418 16.329C15.0714 16.4415 14.7784 16.5 14.4629 16.5C14.0033 16.5 13.512 16.392 12.9937 16.1715C12.4755 15.951 11.9572 15.654 11.4434 15.2805C10.9251 14.9025 10.4339 14.484 9.9652 14.0205C9.501 13.5525 9.08187 13.062 8.70781 12.549C8.33826 12.036 8.04081 11.523 7.82449 11.0145C7.60816 10.5015 7.5 10.011 7.5 9.543C7.5 9.237 7.55408 8.9445 7.66224 8.6745C7.77041 8.4 7.94166 8.148 8.18052 7.923C8.46895 7.6395 8.78443 7.5 9.11793 7.5C9.24412 7.5 9.37031 7.527 9.48297 7.581C9.60015 7.635 9.70381 7.716 9.78493 7.833L10.8305 9.3045C10.9116 9.417 10.9702 9.5205 11.0108 9.6195C11.0513 9.714 11.0739 9.8085 11.0739 9.894C11.0739 10.002 11.0423 10.11 10.9792 10.2135C10.9206 10.317 10.835 10.425 10.7268 10.533L10.3843 10.8885C10.3348 10.938 10.3122 10.9965 10.3122 11.0685C10.3122 11.1045 10.3167 11.136 10.3257 11.172C10.3393 11.208 10.3528 11.235 10.3618 11.262C10.4429 11.4105 10.5826 11.604 10.7809 11.838C10.9837 12.072 11.2 12.3105 11.4344 12.549C11.6778 12.7875 11.9121 13.008 12.151 13.2105C12.3853 13.4085 12.5791 13.5435 12.7323 13.6245C12.7549 13.6335 12.7819 13.647 12.8135 13.6605C12.8495 13.674 12.8856 13.6785 12.9261 13.6785C13.0028 13.6785 13.0613 13.6515 13.1109 13.602L13.4534 13.2645C13.5661 13.152 13.6743 13.0665 13.7779 13.0125C13.8816 12.9495 13.9852 12.918 14.0979 12.918C14.1835 12.918 14.2737 12.936 14.3728 12.9765C14.472 13.017 14.5756 13.0755 14.6883 13.152L16.18 14.2095C16.2972 14.2905 16.3783 14.385 16.4279 14.4975C16.473 14.61 16.5 14.7225 16.5 14.8485Z" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10"/>
                </svg>
                </label>
            </div>
        </div>
        <div class="sub-nav-responsive">
            <a id="mune-click">
                <div class="menu-div">
                    <div class="content active">
                        <div href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                            <span class="navicon__item"></span>
                            <span class="navicon__item"></span>
                            <span class="navicon__item"></span>
                            <span class="navicon__item"></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>




<!-- <div class="col-md-6 d-flex justify-content-center m-auto">
    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas modal_basec"  tabindex="-1"
     id="menuBottom" aria-labelledby="menuBottomLabel" >
        <div class="offcanvas-body small overflow-auto">
            <div class="tab-row" id="menu-center">
          <ul class="list-group theme-3-store-infos-list">


                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/tablebook')); ?>"  style="margin: 5px 10%;border-radius: 10px!important;">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.catring')); ?>


                            <svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg"  width="30px" style="fill:#fff;"  >
                            <g><g>
                                <path d="m480.845 389.392c-1.028-58.554-24.301-113.452-65.821-154.972-32.282-32.282-72.653-53.527-116.54-61.873v-29.924c0-23.426-19.059-42.485-42.485-42.485s-42.485 19.058-42.485 42.485v29.924c-43.887 8.346-84.258 29.591-116.54 61.873-41.52 41.52-64.792 96.418-65.82 154.972-17.94 4.972-31.154 21.436-31.154 40.939 0 23.426 19.059 42.484 42.485 42.484h427.03c23.426 0 42.485-19.058 42.485-42.484 0-19.503-13.214-35.967-31.155-40.939zm-247.329-246.769c0-12.398 10.086-22.484 22.484-22.484s22.484 10.086 22.484 22.484v27.031c-7.424-.732-14.925-1.105-22.484-1.105s-15.06.372-22.484 1.105zm22.484 45.927c111.106 0 201.837 88.895 204.815 199.296h-409.63c2.977-110.401 93.709-199.296 204.815-199.296zm213.515 264.264h-427.03c-12.398 0-22.484-10.086-22.484-22.483 0-12.398 10.086-22.484 22.484-22.484h427.03c12.398 0 22.484 10.086 22.484 22.484 0 12.397-10.086 22.483-22.484 22.483z"/>
                                <path d="m329.641 293.94c3.314 0 6-2.687 6-6v-15.153c0-3.314-2.687-6-6-6-3.314 0-6 2.687-6 6v15.153c0 3.313 2.686 6 6 6z"/>
                                <path d="m390.142 320.81c3.314 0 6-2.687 6-6v-15.153c0-3.314-2.687-6-6-6s-6 2.687-6 6v15.153c0 3.313 2.686 6 6 6z"/>
                                <path d="m353.158 353.307c3.314 0 6-2.687 6-6v-15.154c0-3.314-2.687-6-6-6-3.314 0-6 2.687-6 6v15.154c0 3.313 2.687 6 6 6z"/>
                                <path d="m118.29 310.383c-1.646 0-3.314-.407-4.854-1.264-4.826-2.687-6.561-8.776-3.875-13.602 7.741-13.909 17.58-26.485 29.244-37.38 4.037-3.77 10.365-3.556 14.135.481 3.77 4.036 3.554 10.365-.482 14.134-10.14 9.472-18.693 20.404-25.42 32.491-1.829 3.286-5.236 5.14-8.748 5.14z"/>
                                <path d="m188.313 247.558c-3.864 0-7.544-2.253-9.18-6.024-2.198-5.066.128-10.956 5.195-13.154 4.682-2.031 8.934-3.565 12.999-4.687 5.324-1.473 10.831 1.651 12.302 6.977 1.47 5.323-1.654 10.831-6.977 12.301-3.157.872-6.548 2.102-10.365 3.757-1.295.564-2.646.83-3.974.83z"/></g><g>
                                <path d="m77.27 93.994-8.215 23.098c-.352.989-1.048 1.773-1.927 2.169l-20.522 9.246c-2.899 1.306-2.899 5.926 0 7.232l20.522 9.246c.879.396 1.575 1.18 1.927 2.169l8.215 23.098c1.16 3.263 5.265 3.263 6.425 0l8.215-23.098c.352-.989 1.048-1.773 1.927-2.169l20.522-9.246c2.899-1.306 2.899-5.926 0-7.232l-20.522-9.246c-.879-.396-1.575-1.18-1.927-2.169l-8.215-23.098c-1.16-3.263-5.265-3.263-6.425 0z"/>
                                <path d="m361.017 41.001-6.093 17.134c-.261.734-.777 1.315-1.429 1.609l-15.223 6.858c-2.151.969-2.151 4.396 0 5.365l15.223 6.858c.652.294 1.168.875 1.429 1.609l6.093 17.134c.861 2.421 3.905 2.421 4.766 0l6.093-17.134c.261-.734.777-1.315 1.429-1.609l15.223-6.858c2.151-.969 2.151-4.396 0-5.365l-15.223-6.858c-.652-.294-1.168-.875-1.429-1.609l-6.093-17.134c-.86-2.421-3.905-2.421-4.766 0z"/>
                                <ellipse cx="444.268" cy="165.252" rx="17.937" ry="17.937" transform="matrix(.925 -.381 .381 .925 -29.459 181.524)"/>
                                <path d="m153.849 69.284c0 4.273 3.464 7.738 7.737 7.738 4.274 0 7.738-3.464 7.738-7.738s-3.464-7.738-7.738-7.738c-4.273.001-7.737 3.465-7.737 7.738z"/>
                            </g></g></svg>
                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>" style="margin: 5px 10%;border-radius: 10px!important;">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.about_us')); ?>


                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                            width="35px"    viewBox="0 0 225.000000 225.000000"
                                preserveAspectRatio="xMidYMid meet" style="fill:#fff;"  >

                                <g transform="translate(0.000000,225.000000) scale(0.100000,-0.100000)"
                                 stroke="none">
                                <path d="M1033 1726 c-103 -33 -176 -98 -222 -196 -20 -44 -25 -70 -26 -135 0
                                -71 4 -88 33 -147 20 -41 50 -82 77 -106 25 -22 45 -42 45 -45 0 -3 -10 -7
                                -22 -11 -13 -3 -50 -21 -82 -41 -32 -19 -60 -34 -61 -33 -1 2 -12 24 -23 50
                                -35 81 -63 111 -181 194 -2 2 7 17 20 35 24 34 37 117 25 163 -8 32 -61 93
                                -97 112 -44 22 -134 18 -181 -8 -87 -49 -118 -180 -61 -263 17 -26 22 -40 14
                                -43 -30 -10 -115 -88 -142 -130 -52 -82 -74 -187 -44 -212 29 -24 49 -8 61 50
                                29 146 118 230 255 238 52 3 76 -1 118 -18 86 -38 161 -139 161 -219 0 -11
                                -16 -43 -35 -70 -48 -66 -83 -146 -100 -228 -21 -97 -19 -130 6 -143 32 -18
                                59 12 59 65 0 147 125 337 271 410 211 108 477 46 621 -142 54 -72 83 -143
                                100 -250 14 -83 33 -108 63 -83 24 20 14 136 -19 225 -24 61 -86 168 -107 181
                                -33 20 17 151 79 205 61 54 115 72 196 67 80 -5 120 -22 171 -73 45 -46 64
                                -83 79 -159 12 -58 14 -61 42 -61 29 0 29 0 28 60 -1 102 -60 199 -159 261
                                l-43 28 26 38 c81 124 -7 288 -155 288 -106 0 -182 -70 -191 -175 -4 -45 0
                                -62 22 -102 l27 -48 -23 -15 c-57 -37 -120 -107 -149 -166 -18 -35 -33 -64
                                -35 -64 -2 0 -26 14 -53 30 -26 17 -63 35 -80 41 l-32 11 50 48 c27 26 62 71
                                78 101 25 48 28 64 28 149 0 77 -4 104 -22 143 -31 67 -119 150 -185 175 -73
                                27 -172 35 -225 18z m202 -87 c56 -27 127 -104 143 -157 15 -51 15 -124 0
                                -176 -16 -55 -109 -148 -164 -164 -138 -40 -279 19 -335 142 -26 58 -25 162 2
                                221 25 53 103 127 151 142 59 19 153 15 203 -8z m-744 -146 c32 -19 59 -68 59
                                -108 0 -40 -68 -105 -109 -105 -68 0 -121 50 -121 116 0 29 8 44 39 75 44 44
                                83 51 132 22z m1379 2 c105 -55 60 -215 -61 -215 -47 0 -109 65 -109 115 0 30
                                8 45 39 76 43 44 80 50 131 24z"/>
                                </g>
                            </svg>

                        </p>
                    </a>
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color "
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>"  style="margin: 5px 10%;border-radius: 10px!important;">
                        <p class="px-2 fw-400 menu-p">
                            <?php echo e(trans('labels.contact_us')); ?>

                            <svg id="Layer_1" enable-background="new 0 0 90 90" viewBox="0 0 90 90"
                            xmlns="http://www.w3.org/2000/svg" width="30px" style="fill:#fff;"  >
                                <g>
                                    <path
                                    d="m32.991 24.801h46.908l-25.624 20.122c-.543.426-1.189.634-1.775.691-.59-.058-1.238-.266-1.787-.691l-18.312-14.385c-.194-.156-.413-.275-.654-.349.862-1.216 1.354-2.687 1.328-4.272-.005-.363-.037-.737-.084-1.116zm-11.929-12.941c.059.01.156.047.367.145.417.198 1.08.708 1.729 1.419 1.307 1.424 2.613 3.581 3.291 5.005.021.042.043.088.063.135 1.924 3.301 2.754 5.826 2.779 7.41.027 1.591-.4 2.276-1.749 3.051l-3.48 2.006c-2.267 1.305-3.338 3.644-3.604 5.826-.267 2.183.126 4.304 1.097 5.981l8.59 14.805c.973 1.676 2.634 3.078 4.665 3.939 2.033.863 4.604 1.107 6.871-.195l3.48-2.002c1.348-.773 2.163-.789 3.532.025 1.373.816 3.156 2.787 5.072 6.09.027.049.053.09.084.137.898 1.295 2.121 3.492 2.711 5.332.293.914.408 1.74.371 2.197-.041.459-.051.412-.172.484l-2.648 1.518c-6.652 2.885-12.749 2.234-18.198-.592-5.459-2.838-10.204-7.963-13.512-13.98-.011-.012-.016-.027-.025-.035l-7.246-12.488c-.012-.012-.017-.023-.027-.039-3.585-5.86-5.674-12.513-5.412-18.634.262-6.112 2.742-11.684 8.584-15.971l2.649-1.513c.061-.035.081-.062.138-.056zm.027-3.721c-.701-.011-1.416.136-2.059.509l-2.801 1.611c-.063.036-.121.073-.178.109-6.739 4.932-9.842 11.798-10.145 18.875-.303 7.074 2.059 14.375 5.961 20.758l7.222 12.445-.017-.037c3.605 6.551 8.771 12.234 15.084 15.508 6.316 3.279 13.84 4.039 21.504.697.063-.027.127-.057.184-.092l2.805-1.611c1.297-.738 1.949-2.174 2.055-3.428.109-1.25-.146-2.467-.533-3.666-.758-2.371-2.08-4.674-3.172-6.254-2.063-3.549-4.055-6.012-6.357-7.389-2.32-1.383-5.105-1.363-7.377-.057l-3.48 2.006c-1.028.592-2.23.523-3.495-.012-1.259-.535-2.425-1.605-2.858-2.355l-8.59-14.804c-.434-.754-.789-2.292-.621-3.648.162-1.352.711-2.411 1.74-3.004l3.381-1.944c.088.453.344.864.715 1.14l18.313 14.388c1.191.936 2.602 1.457 4.023 1.539.072.004.146.004.219 0 1.422-.082 2.826-.604 4.018-1.539l25.222-19.814v32.734c0 .498-.568 1.154-1.682 1.154h-17.461c-1.051-.006-1.902.842-1.902 1.887 0 1.043.852 1.891 1.902 1.885h17.461c2.854 0 5.477-2.063 5.477-4.926v-34.849c0-2.865-2.623-4.927-5.477-4.927h-48.218c-.534-1.335-1.239-2.75-2.127-4.288-.831-1.73-2.179-4.017-3.866-5.856-.852-.932-1.771-1.758-2.92-2.292v.005c-.571-.27-1.25-.443-1.95-.458z"/>
                                </g>
                            </svg>
                        </p>
                    </a>
                    
                    
                    
                </ul>

            </div>
        </div>
    </div>
</div> -->


<div class="mune-res" >
    <div class="element-res">
        <ul>
            <li> <a href="<?php echo e(URL::to(@$storeinfo->slug . '/tablebook')); ?>"> <?php echo e(trans('labels.catring')); ?></a></li>
            <li> <a href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>" >   <?php echo e(trans('labels.about_us')); ?></a></li>
            <li> <a href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>"><?php echo e(trans('labels.contact_us')); ?></a></li>
            <!-- <li> <a href="<?php echo e(URL::to(@$storeinfo->slug . '/terms_condition')); ?>"> <?php echo e(trans('labels.terms')); ?></a></li>
            <li> <a href="<?php echo e(URL::to(@$storeinfo->slug . '/privacypolicy')); ?>"><?php echo e(trans('labels.privacy_policy')); ?></a></li>
            <li>
            <a href="javascript:void(0)"
                            data-bs-toggle="modal" data-bs-target="#subscribe_modal"   style="margin: 5px 10%;border-radius: 10px!important;">
                    <p href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subscribe_modal"
                                class="menu-p">
                        <?php echo e(trans('labels.subscribe')); ?>

                        <i class="fa-solid fa-bell"></i>
                    </p>
                </a>
            </li> -->
        </ul>
    </div>
</div>





<div class="col-md-6 d-flex justify-content-center m-auto">
    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas modal_user" tabindex="-1" id="userProfileBottom" aria-labelledby="userProfileBottomLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <?php echo e(trans('labels.my_acount')); ?>

            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small overflow-auto">
            <div class="tab-row" id="menu-center">
                <ul class="list-group theme-4-categories-list">

                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/profile')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa-solid fa-user"></i>
                                <?php echo e(trans('labels.acount_information')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/user-address')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo e(trans('labels.delivery_addresses')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/orders')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class='fas fa-box-open'></i>
                                <?php echo e(trans('labels.my_orders')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>

                    <li class="list-group-item p-2 border-top-0" >
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/change-password')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <?php echo e(trans('labels.change_password')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="#">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa-solid fa-book"></i>
                                <?php echo e(trans('labels.my_booking')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/favorites/')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa-regular fa-heart"></i>
                                <?php echo e(trans('labels.favourites')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>

                    <li class="list-group-item p-2 border-top-0">
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
                        href="<?php echo e(URL::to($storeinfo->slug . '/logout')); ?>">
                            <p class="px-2 fw-400 menu-p" style="text-align: left;">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <?php echo e(trans('labels.log_out')); ?>

                            </p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </li>
                    <li>
                    </li>
                    <li>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\jop\full_store\resources\views/front/theme/footer-bar.blade.php ENDPATH**/ ?>