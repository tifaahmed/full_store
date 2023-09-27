<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo e(helper::appdata($storeinfo->id)->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata($storeinfo->id)->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->og_image)); ?>' />
    <title><?php echo e(helper::appdata($storeinfo->id)->website_title); ?></title>
    <link rel="icon" href="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->favicon)); ?>" type="image" sizes="16x16">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <!--Aos animetion  -->
    <link href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/unpkg.com_aos@2.3.1_dist_aos.css')); ?>" rel="stylesheet">
    <!-- swiper Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/swiper-bundle.min.css')); ?>">
    <!-- Font-Family -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/font/outfit.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/font-awesome/css/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/toastr/toastr.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/dataTables.bootstrap4.min.css')); ?>">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/owl.carousel.min.css')); ?>">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/owl.theme.default.css')); ?>">
    <!-- Bootstrap Min Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/bootstrap.min.css')); ?>">
    <!-- Style Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/style.css')); ?>">
    <!-- Responsive Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'web-assets/css/responsive.css')); ?>">
     <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/sweetalert/sweetalert2.min.css')); ?>">

    

    




    <?php echo $__env->yieldContent('recaptcha_script'); ?>

    <style>
        :root {
            --bs-primary: #ce6a19;
            --bs-secondary: #5a0bee;
            <?php if(helper::appdata($storeinfo->id)->primary_color != null): ?>
                --bs-primary: <?php echo e(helper::appdata($storeinfo->id)->primary_color); ?>;
            <?php endif; ?>
            <?php if(helper::appdata($storeinfo->id)->secondary_color != null): ?>
                --bs-secondary: <?php echo e(helper::appdata($storeinfo->id)->secondary_color); ?>;
            <?php endif; ?>
            --secondary-color: #000;
            --font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body>
    <?php
        $baseurl = url('/').'/'.$storeinfo->slug;
        $basecaturl = url('/').'/'.$storeinfo->slug.'/categories';
    ?>
    <?php echo $__env->make('front.theme.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(helper::appdata(@$storeinfo->id)->template != 3): ?>
        <?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php else: ?>
        <?php if($baseurl != request()->url() && $basecaturl != request()->url()): ?>
            <?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>

    <?php if(helper::appdata(@$storeinfo->id)->template != 3): ?>
        <?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php if($baseurl != request()->url() && $basecaturl != request()->url()): ?>
            <?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>
     <!-- Modal -->
     <div class="d-flex align-items-center float-end">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-5">
                    <div class="modal-header align-items-center px-3 px-md-4">
                        <h3 class="page-title mb-0 fs-2 text-dark fw-bolder"><?php echo e(trans('labels.search')); ?></h3>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-3 px-md-4 mb-0">
                        <form class="" action="<?php echo e(URL::to($storeinfo->slug . '/search/')); ?>" method="get">
                            <div class="col-12">
                                <div class="row align-items-center justify-content-between g-0">
                                    <span><?php echo e(trans('labels.search_desc')); ?></span>
                                    <div class="col-12">
                                        <input type="hidden" name="vendor_id" value="<?php echo e($storeinfo->id); ?>" >
                                        <input type="text" placeholder="<?php echo e(trans('labels.search_here')); ?>" name="search" id="searchText" class="py-2 input-width px-2 mt-3 mb-1 w-100 border rounded-5 fs-7 search_input" value="" >
                                        <div class="search-btn-group">
                                            <div class="d-flex justify-content-between align-items-center mt-3 mt-md-4">
                                                <a type="submit" class="btn-primary bg-danger w-100 rounded-0 rounded-3 m-1 text-center" data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?> </a>
                                                <input type="submit" class="btn-primary w-100 rounded-0 rounded-3 m-1 text-center" value="<?php echo e(trans('labels.submit')); ?>" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hours Modal Start -->
    <div class="modal fade" id="examplehours" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content rounded-5">
                <div class="modal-header px-4">
                    <p class="title pb-1 fs-5">  <?php echo e(trans('labels.working_hours')); ?></p>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <ul>
                        <?php if(is_array(@helper::timings($storeinfo->id)) || is_object(@helper::timings($storeinfo->id))): ?>
                        <?php $__currentLoopData = @helper::timings($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($time->is_always_close != 1): ?>
                            <li class="working-hours-main pb-3">
                                <p>
                                    <i class="fa-regular fa-calendar-days hours-to"></i>
                                    <span class="px-2 fw-600">   <?php echo e(trans('labels.' . strtolower($time->day))); ?></span>
                                </p>
                                <div class="hours-list">
                                    <button type="button" class="btn border hours-to fs-7"><?php echo e($time->open_time); ?></button>
                                    <p class="to"><?php echo e(trans('labels.to')); ?></p>
                                    <button type="button" class="btn border hours-to fs-7"><?php echo e($time->close_time); ?></button>
                                </div>
                            </li>
                            <?php else: ?>
                                <li class="d-flex align-items-center justify-content-end pb-3">
                                    <p class="sunday">
                                        <i class="fa-regular fa-calendar-days hours-to"></i>
                                        <span class="px-2 fw-600 text-danger sunday"><?php echo e(trans('labels.' . strtolower($time->day))); ?>

                                        </span>
                                    </p>
                                    <div class="hours-list justify-content-center m-auto">
                                        <button type="button" class="btn border text-dark bg-danger text-white fs-7" data-bs-dismiss="modal"><?php echo e(trans('labels.closed')); ?></button>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hours Modal end -->
    <div class="modal fade" id="additems" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content rounded-5">
                <div class="modal-header border-0 px-4">
                    <p class="title pb-1 fs-5" id="viewitem_name" ></p>
                    <button type="button" class="btn-close m-0" onclick="cleardata()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div id="carouselExampleIndicators" class="carousel slide" >
                        <div class="carousel-indicators" id="image_buttons">

                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

                        </div>
                        <div class="carousel-inner card-modal-iages" id="item_images">

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="mt-4">
                        <div class="products-price">
                            <span class="price fs-5" id="viewitem_price"></span>
                            <del id="viewitem_originalprice"></del>
                        </div>
                        <p class="title mt-3 mb-1" ><?php echo e(trans('labels.description')); ?></p>
                        <p class="description-cart" id="item_desc">

                        </p>
                        <p class="title pb-1 pt-3 variants" id="variants_title"><?php echo e(trans('labels.variants')); ?></p>
                        <div id="variants">

                        </div>
                        <p class="title pb-1 pt-3 variants" id="extras_title"><?php echo e(trans('labels.extras')); ?></p>
                        <form class="extras-form" id="extras">
                        </form>
                    </div>
                </div>

                <input type="hidden" id="item_id" value=""/>
                <input type="hidden" id="item_name" value=""/>
                <input type="hidden" id="item_price" value=""/>
                <input type="hidden" id="item_tax" value=""/>
                <input type="hidden" id="orignal_price" value=""/>
                <input type="hidden" id="item_image" value=""/>
                <input type="hidden" id="vendor_id" value="<?php echo e(@$storeinfo->id); ?>"/>
                <input type="hidden" id="addtocarturl" value="<?php echo e(url('/add-to-cart')); ?>"/>
                <input type="hidden" id="showitemurl" value="<?php echo e(url('/product-details')); ?>"/>

                <div class="modal-footer border-0 d-block">
                    <div class="row d-flex justify-content-between align-items-center gx-2">
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'); ?>" href="javascript:void(0)" aria-label="Previous" id="minusqty">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-minus fs-8"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <input type="text" class="page-link px-2 px-md-4 bg-light" id="qty" value="1" readonly/>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'); ?>" href="javascript:void(0)" aria-label="Next" id="plusqty">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-plus fs-8"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-6 col-md-4">
                            <a class="btn-secondary rounded-3 w-100 text-center" id="enquiries" href="" target="_blank"><?php echo e(trans('labels.enquiries')); ?></a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a class="btn-primary rounded-3 w-100 text-center" href="javascript:void(0)" onclick="calladdtocart()" ><?php echo e(trans('labels.add_to_cart')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- whatsapp modal start -->
    <?php if(helper::appdata(@$storeinfo->id)->contact != ""): ?>
    <input type="checkbox" id="check">
    <div class="whatsapp_icon <?php echo e(session()->get('direction') == 2 ? 'whatsapp_icon_rtl' : 'whatsapp_icon_ltr'); ?>">
        <label class="chat-btn" for="check">
            <i class="fa-brands fa-whatsapp comment"></i>
            <i class="fa fa-close close"></i>
        </label>
    </div>
    <div class=" <?php echo e(session()->get('direction') == 2 ? 'wrapper_rtl' : 'wrapper'); ?>  wp_chat_box d-none">
        <div class="msg_header">
            <h6><?php echo e(helper::appdata(@$storeinfo->id)->website_title); ?></h6>
        </div>
        <div class="text-start p-3 bg-msg">
            <div class="card p-2 msg">
                How can I help you ?
            </div>
        </div>
        <div class="chat-form">

            <form action="https://api.whatsapp.com/send" method="get" target="_blank" class="d-flex align-items-center d-grid gap-2">
                <textarea class="form-control" name="text" placeholder="Your Text Message" required></textarea>
                <input type="hidden" name="phone" value="<?php echo e(helper::appdata(@$storeinfo->id)->contact); ?>">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <!-- whatsapp modal end -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(helper::appdata(1)->tracking_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo e(helper::appdata(1)->tracking_id); ?>');
    </script>


    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/jquery-3.6.3.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/custom.js')); ?>"></script>
    <!-- Bootstrap Bundle Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Owl Carousel Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/toastr/toastr.min.js')); ?>"></script><!-- Toastr JS -->

    <!-- Jquery DataTables Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/jquery.dataTables.min.js')); ?>"></script>

    <!-- DataTables Bootstrap4 Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Sweetalert2@11 Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/sweetalert2@11.js')); ?>"></script>

    <!-- Aos Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/unpkg.com_aos@2.3.1_dist_aos.js')); ?>"></script>

    <!-- Swiper Bundle Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/js/cdn.jsdelivr.net_npm_swiper@9_swiper-bundle.min.js')); ?>"></script>






    <script>
        var are_you_sure = "<?php echo e(trans('messages.are_you_sure')); ?>";
        var yes = "<?php echo e(trans('messages.yes')); ?>";
        var no = "<?php echo e(trans('messages.no')); ?>";
        var cancel = "<?php echo e(trans('labels.cancel')); ?>";
        let wrong = "<?php echo e(trans('messages.wrong')); ?>";
        let env = "<?php echo e(env('Environment')); ?>";
        let whatsappnumber = "<?php echo e(@helper::appdata(@$storeinfo->id)->mobile); ?>";
        let direction = "<?php echo e(session('direction')); ?>";
        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right",
        }
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

    </script>
    <script>
        function currency_formate(price) {
            if ("<?php echo e(@helper::appdata(@$storeinfo->id)->currency_position); ?>" == "left") {
                return "<?php echo e(@helper::appdata(@$storeinfo->id)->currency); ?>" + parseFloat(price).toFixed(2);
            } else {
                return parseFloat(price).toFixed(2) + "<?php echo e(@helper::appdata(@$storeinfo->id)->currency); ?>";
            }
        }
        $('.whatsapp_icon').on("click",function(event)
        {
            $(".wp_chat_box").toggleClass("d-none");
        });


        var swiper = new Swiper(".horizontal_scroll_swiper", {
            slidesPerView: "3",
            freeMode: false,
            slideToClickedSlide: false,
            spaceBetween: 30,
            mousewheel: false,
            scrollbar: {
                el: ".swiper-scrollbar",
                draggable: 50
            },
            paginationClickable: true,
            spaceBetween: 20,
            breakpoints: {
                1440: {
                    slidesPerView: 8,
                },
                1024: {
                    slidesPerView: 6,
                },

                768: {
                    slidesPerView: 5,
                },
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                }
            }
        });

        var swiper2 = new Swiper(".horizontal_scroll_swiper_theme-2", {
            slidesPerView: "3",
            freeMode: false,
            slideToClickedSlide: false,
            spaceBetween: 30,
            mousewheel: false,
            scrollbar: {
                el: ".swiper-scrollbar",
                draggable: 50
            },
            paginationClickable: true,
            spaceBetween: 20,
            breakpoints: {
                1440: {
                    slidesPerView: 8,
                },
                1024: {
                    slidesPerView: 6,
                },

                768: {
                    slidesPerView: 5,
                },
                375: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                280: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                }
            }
        });

        // Theme-1 owlCarousel js
        $('.categories-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            // margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 5
                },
                1024: {
                    items: 6
                },
                1000: {
                    items: 8
                }
            }
        })
        $('.blogs-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3

                },
                1440: {
                    items: 4

                },
                1660: {
                    items: 4

                }
            }
        })
        $('.banner-imges-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 25,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 2
                },
                1660: {
                    items: 3
                }
            }
        })
        // Theme-2 owlCarousel js
        $('.theme-2-categories').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 30,
            padding: 30,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.theme-2blogs-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3

                },
                1440: {
                    items: 4

                },
                1660: {
                    items: 4

                }
            }
        })
        $('.theme-2-banner-imges-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 25,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1660: {
                    items: 3
                }
            }
        })
        $('.cart-modal').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 25,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 2
                },
                1660: {
                    items: 2
                }
            }
        })
        // Theme-3 slider
        $('.theme-3bannerslider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 10,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 2
                }
            }
        })
        // aos js important
        AOS.init();

        AOS.init({
            // Global settings:
            disable: false,
            startEvent: 'DOMContentLoaded',
            initClassName: 'aos-init',
            animatedClassName: 'aos-animate',
            useClassNames: false,
            disableMutationObserver: false,
            debounceDelay: 50,
            throttleDelay: 99,


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120,
            delay: 0,
            duration: 400,
            easing: 'ease',
            once: false,
            mirror: false,
            anchorPlacement: 'top-bottom',

        });





    </script>

    <?php echo $__env->yieldContent('script'); ?>



    <script>
        $(document).ready(function(){
            // $(document).find("a[id^='reject_button-']").on('click', function(){
                   console.log($("#product_items"));
               console.log('its     asdasd   run');
            //    $("#product_items").owlCarousel({
            $(document).find("div[id^='product_items-']").owlCarousel({
             items : 4, //4 items above 1000px browser width
             itemsDesktop : [1000,4], //5 items between 1000px and 901px
             itemsDesktopSmall : [900,3], // betweem 900px and 601px
             itemsTablet: [600,2], //2 items between 600 and 0;
            itemsMobile : false  ,  // itemsMobile disabled - inherit from itemsTablet option
             navigation : true ,
            navigationText : ["prev","next"],
         });

            });
    </script>
</body>

</html>
<?php /**PATH /var/www/html/full_store/resources/views/front/theme/default.blade.php ENDPATH**/ ?>