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
    <div class="ddd row footer-icons">


 
        <div class="col-2">
            <?php if(Auth::user() && Auth::user()->type == 3): ?>
            <a style="width: 100%;"  type="button" data-bs-toggle="offcanvas"
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
            <a style="width: 100%;" href="<?php echo e(URL::to($storeinfo->slug.'/login')); ?>">
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


        <div class="col-2">
            <a class="nav-link d-lg-none text-white" href="javascript:void(0)" data-bs-toggle="modal"
            data-bs-target="#searchModal">
                <span>

                    
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" 
                xmlns:xlink="http://www.w3.org/1999/xlink" 
                viewBox="0 0 612.01 612.01"  width="27px" style="fill:#fff;"  xml:space="preserve">
               <g>
                   <g id="_x34__4_">
                       <g>
                           <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                               C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                               l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                               c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                               S377.82,467.8,257.493,467.8z"/>
                       </g>
                   </g>
               </g>
               </svg>

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

                <!-- Created with Inkscape (http://www.inkscape.org/) -->
                <svg xmlns="http://www.w3.org/2000/svg"  xmlns:svg="http://www.w3.org/2000/svg" 
                width="40px" version="1.1" id="svg2325" viewBox="0 0 682.66669 682.66669" 
                style="margin-top: -9px;" >
                    <defs id="defs2329">
                        <clipPath clipPathUnits="userSpaceOnUse" id="clipPath2339">
                        <path d="M 0,512 H 512 V 0 H 0 Z" id="path2337"/>
                        </clipPath>
                    </defs>
                    <mask id="custom"><rect id="bg"   width="100%" height="100%" fill="white"/><g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)"/></mask><g mask="url(#custom)"><g id="g2331" transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                        <g id="g2333">
                        <g id="g2335" clip-path="url(#clipPath2339)">
                            <g id="g2341" transform="translate(459.1059,19)">
                            <path d="m 0,0 h -406.212 l 38.306,364.783 h 329.6 z" style="fill:none;stroke:#fff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path2343"/>
                            </g>
                            <g id="g2345" transform="translate(178.198,335.7281)">
                            <path d="m 0,0 v 79.47 c 0,42.969 34.833,77.802 77.802,77.802 v 0 c 42.969,0 77.802,-34.833 77.802,-77.802 V 0" style="fill:none;stroke:#fff;stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" id="path2347"/>
                            </g>
                        </g>
                        </g>
                    </g></g>
                </svg>


                    <span id="cartcount" class="cart-counting mx-2" style="bottom: 42px;left: 47%;">
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

            <svg  viewBox="0 -53 384 384" width="27px" style="fill:#fff;"  
                xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
                <path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
            </svg>        
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
                    href="<?php echo e(URL::to(@$storeinfo->slug . '/tablebook')); ?>"  style="margin: 5px 10%;">
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
                        href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>" style="margin: 5px 10%;">
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
                    
                    
                    <a class="list-group-item rounded-0 d-flex align-items-center gap-2 menu-links primary-color " href="javascript:void(0)"
                        data-bs-toggle="modal" data-bs-target="#subscribe_modal"  style="margin: 5px 10%;">
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
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/front/theme/footer-bar.blade.php ENDPATH**/ ?>