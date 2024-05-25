<!DOCTYPE html>
<html lang="en" dir="{{ session()->get('direction') == 2 ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ helper::appdata($storeinfo->id)->meta_title }}" />
    <meta property="og:description" content="{{ helper::appdata($storeinfo->id)->meta_description }}" />
    <meta property="og:image" content='{{ helper::image_path(helper::appdata($storeinfo->id)->og_image) }}' />
    <title>{{ helper::appdata($storeinfo->id)->website_title }}</title>
    <link rel="icon" href="{{ helper::image_path(helper::appdata(@$storeinfo->id)->favicon) }}" type="image" sizes="16x16">
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css') }}">
    <!-- FontAwesome CSS -->
    <!--Aos animetion  -->
    <link href="{{ url(env('ASSETSPATHURL').'web-assets/css/unpkg.com_aos@2.3.1_dist_aos.css')}}" rel="stylesheet">
    <!-- swiper Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/swiper-bundle.min.css')}}">
    <!-- Font-Family -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/font/outfit.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.xyz/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'web-assets/css/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/dataTables.bootstrap4.min.css')}}">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/owl.carousel.min.css')}}">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/owl.theme.default.css')}}">
    <!-- Bootstrap Min Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/bootstrap.min.css')}}">
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/style.css')}}">
    {{-- custom_style.css --}}
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/custom_style.css')}}">
    <!-- aos  -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

    <!-- Responsive Css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/responsive.css')}}">
     <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'web-assets/css/sweetalert/sweetalert2.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    {{-- start for --}}

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}
    @if(session()->get('direction') == 2)
        <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/ar.css')}}">
    @else
        <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/en.css')}}">
    @endif


    @yield('recaptcha_script')

    <style>
        :root {
            --bs-primary: #ce6a19;
            --bs-secondary: #5a0bee;
            @if(helper::appdata($storeinfo->id)->primary_color != null)
                --bs-primary: {{helper::appdata($storeinfo->id)->primary_color}};
            @endif
            @if(helper::appdata($storeinfo->id)->secondary_color != null)
                --bs-secondary: {{helper::appdata($storeinfo->id)->secondary_color}};
            @endif
            --secondary-color: #000;
            --font-family: 'Outfit', sans-serif;
        }
    </style>

    {!! helper::appdata($storeinfo->id)->pixel_header !!}
    {!! helper::app_static_data()->pixel_header !!}

</head>
<body>
    @php
        $baseurl = url('/').'/'.$storeinfo->slug;
        $basecaturl = url('/').'/'.$storeinfo->slug.'/categories';
    @endphp
    @include('front.theme.preloader')

    @if(helper::appdata(@$storeinfo->id)->template != 3)
        @include('front.theme.header')

    @else
        @if($baseurl != request()->url() && $basecaturl != request()->url())
            @include('front.theme.header')
        @endif
    @endif
        @yield('content')

    @if(helper::appdata(@$storeinfo->id)->template != 3)
        @include('front.theme.footer')
    @else
        @if($baseurl != request()->url() && $basecaturl != request()->url())
            @include('front.theme.footer')
        @endif
    @endif

     <!-- Modal -->
     <div class="d-flex align-items-center float-end">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-5">
                    <div class="modal-header align-items-center px-3 px-md-4">
                        <h3 class="page-title mb-0 fs-2 text-dark fw-bolder">{{ trans('labels.search') }}</h3>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-3 px-md-4 mb-0">
                        <form class="" action="{{ URL::to($storeinfo->slug . '/search/') }}" method="get">
                            <div class="col-12">
                                <div class="row align-items-center justify-content-between g-0">
                                    <span>{{trans('labels.search_desc')}}</span>
                                    <div class="col-12">
                                        <input type="hidden" name="vendor_id" value="{{$storeinfo->id}}" >
                                        <input type="text" placeholder="{{ trans('labels.search_here') }}" name="search" id="searchText" class="py-2 input-width px-2 mt-3 mb-1 w-100 border rounded-5 fs-7 search_input" value="" >
                                        <div class="search-btn-group">
                                            <div class="d-flex justify-content-between align-items-center mt-3 mt-md-4">
                                                <a type="submit" class="btn-primary bg-danger w-100 rounded-0 rounded-3 m-1 text-center" data-bs-dismiss="modal">{{ trans('labels.cancel') }} </a>
                                                <input type="submit" class="btn-primary w-100 rounded-0 rounded-3 m-1 text-center" value="{{ trans('labels.submit') }}" />
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
                    <p class="title pb-1 fs-5">  {{ trans('labels.working_hours') }}</p>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <ul>
                        @if (is_array(@helper::timings($storeinfo->id)) || is_object(@helper::timings($storeinfo->id)))
                        @foreach (@helper::timings($storeinfo->id) as $time)
                            @if($time &&  $time->is_always_close != 1)
                            <li class="working-hours-main pb-3">
                                <p>
                                    <i class="fa-regular fa-calendar-days hours-to"></i>
                                    <span class="px-2 fw-600">   {{ trans('labels.' . strtolower($time->day)) }}</span>
                                </p>
                                <div class="hours-list">
                                    <button type="button" class="btn border hours-to fs-7">{{$time->open_time}}</button>
                                    <p class="to">{{ trans('labels.to') }}</p>
                                    <button type="button" class="btn border hours-to fs-7">{{$time->close_time}}</button>
                                </div>
                            </li>
                            @else
                                <li class="d-flex align-items-center justify-content-end pb-3">
                                    <p class="sunday">
                                        <i class="fa-regular fa-calendar-days hours-to"></i>
                                        <span class="px-2 fw-600 text-danger sunday">{{ trans('labels.' . strtolower($time->day)) }}
                                        </span>
                                    </p>
                                    <div class="hours-list justify-content-center m-auto">
                                        <button type="button" class="btn border text-dark bg-danger text-white fs-7" data-bs-dismiss="modal">{{ trans('labels.closed') }}</button>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hours Modal end -->
    <div class="modal fade slide-up" id="additems" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p class="title mt-3 mb-1" >{{trans('labels.description')}}</p>
                        <p class="description-cart" id="item_desc">

                        </p>
                        <p class="title pb-1 pt-3 variants" id="variants_title">{{trans('labels.variants')}}</p>
                        <div id="variants">

                        </div>
                        <p class="title pb-1 pt-3 variants" id="extras_title">{{trans('labels.extras')}}</p>
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
                <input type="hidden" id="vendor_id" value="{{@$storeinfo->id}}"/>
                <input type="hidden" id="addtocarturl" value="{{url('/add-to-cart')}}"/>
                <input type="hidden" id="showitemurl" value="{{url('/product-details')}}"/>

                <div class="modal-footer border-0 d-block">
                    <div class="row d-flex justify-content-between align-items-center gx-2">
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mb-0">
                                    <li class="page-item">
                                        <a class="page-link {{session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'}}" href="javascript:void(0)" aria-label="Previous" id="minusqty">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-minus fs-8"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <input type="text" class="page-link px-2 px-md-4 bg-light" id="qty" value="1" readonly/>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link {{session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'}}" href="javascript:void(0)" aria-label="Next" id="plusqty">
                                            <span aria-hidden="true">
                                                <i class="fa-solid fa-plus fs-8"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-6 col-md-4">
                            <a class="btn-secondary rounded-3 w-100 text-center"  href="javascript:void(0)" onclick="callAddToCartThenGoToCart('{{URL::to(@$storeinfo->slug . '/cart')}}')">{{trans('labels.buy_now')}}</a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a class="btn-primary rounded-3 w-100 text-center" href="javascript:void(0)" onclick="calladdtocart()" >{{trans('labels.add_to_cart')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- whatsapp modal start -->
    @if(helper::appdata(@$storeinfo->id)->contact != "")
    <input type="checkbox" id="check">
    {{-- <div class="whatsapp_icon {{session()->get('direction') == 2 ? 'whatsapp_icon_rtl' : 'whatsapp_icon_ltr'}}">
        <label class="chat-btn" for="check">
            <i class="fa-brands fa-whatsapp comment"></i>
            <i class="fa fa-close close"></i>
        </label>
    </div> --}}
    <div class=" {{session()->get('direction') == 2 ? 'wrapper_rtl' : 'wrapper'}}  wp_chat_box d-none">
        <div class="msg_header">
            <h6>{{ helper::appdata(@$storeinfo->id)->website_title }}</h6>
        </div>
        <div class="text-start p-3 bg-msg">
            <div class="card p-2 msg">
                How can I help you ?
            </div>
        </div>
        <div class="chat-form">

            <form action="https://api.whatsapp.com/send" method="get" target="_blank" class="d-flex align-items-center d-grid gap-2">
                <textarea class="form-control" name="text" placeholder="Your Text Message" required></textarea>
                <input type="hidden" name="phone" value="{{ helper::appdata(@$storeinfo->id)->contact }}">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
    @endif

    <!-- whatsapp modal end -->
    {!! helper::appdata($storeinfo->id)->pixel_footer !!}
    {!! helper::app_static_data()->pixel_footer !!}

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ helper::appdata(1)->tracking_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ helper::appdata(1)->tracking_id }}');
    </script>


    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/custom.js')}}"></script>
    <!-- Bootstrap Bundle Min Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Owl Carousel Min Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/toastr/toastr.min.js') }}"></script><!-- Toastr JS -->

    <!-- Jquery DataTables Min Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/jquery.dataTables.min.js')}}"></script>

    <!-- DataTables Bootstrap4 Min Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Sweetalert2@11 Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/sweetalert2@11.js')}}"></script>

    <!-- Aos Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/unpkg.com_aos@2.3.1_dist_aos.js')}}"></script>

    <!-- Swiper Bundle Min Js -->

    <script src="{{url(env('ASSETSPATHURL').'web-assets/js/cdn.jsdelivr.net_npm_swiper@9_swiper-bundle.min.js')}}"></script>

    <!-- aos  -->
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->


    {{-- home.js --}}

    {{-- <script src="{{url(env('ASSETSPATHURL').'web-assets/js/custom_home.js')}}"></script> --}}



    <script>
        var are_you_sure = "{{ trans('messages.are_you_sure') }}";
        var yes = "{{ trans('messages.yes') }}";
        var no = "{{ trans('messages.no') }}";
        var cancel = "{{ trans('labels.cancel') }}";
        let wrong = "{{ trans('messages.wrong') }}";
        let env = "{{ env('Environment') }}";
        let whatsappnumber = "{{ @helper::appdata(@$storeinfo->id)->mobile }}";
        let direction = "{{session('direction')}}";
        toastr.options = {
            "closeButton": true,
            "timeOut": "500",
            "showEasing": "swing", // Set your desired timeout here (in milliseconds)
            "positionClass": "toast-bottom-right",
        }
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif

    </script>
    <script>
        function currency_formate(price) {
            if ("{{ @helper::appdata(@$storeinfo->id)->currency_position }}" == "left") {
                return "{{ @helper::appdata(@$storeinfo->id)->currency }}" + parseFloat(price).toFixed(3);
            } else {
                return parseFloat(price).toFixed(3) + "{{ @helper::appdata(@$storeinfo->id)->currency }}";
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






    @yield('script')



    <script>
        //AOS.init();



        $(document).ready(function(){
            // $(document).find("a[id^='reject_button-']").on('click', function(){
                //    console.log($("#product_items"));
            //    console.log('its     asdasd   run');
            //    $("#product_items").owlCarousel({
            $(document).find("div[id^='product_items-']").owlCarousel({
                //Autoplay
            autoplay : 3000,
            loop:true,
            margin:10,
            goToFirst : true,
            nav:true,
            goToFirstSpeed : 1000,
            items : 1,
            responsive : {
                300 : { items : 2 ,margin:0,     stagePadding: 20 },
                480 : { items : 2 ,margin:5   }, // from zero to 480 screen width 4 items
                768 : { items : 3  }, // from 480 screen widthto 768 6 items
                1024 : { items : 4   // from 768 screen width to 1024 8 items
                }
            },

         });



         $(document).find("div[id^='category_list']").owlCarousel({
            //     //Autoplay
            // // autoplay : 3000,
            // // pagination:false,
            // dots: false,
            // // loop:true,
            // // nav:false,
            // margin:10,
            // // goToFirst : true,
            // // goToFirstSpeed : 1000,
            // items : 1,
            // responsive : {
            //     300 : { items : 2  },
            //     480 : { items : 2  }, // from zero to 480 screen width 4 items
            //     768 : { items : 3  }, // from 480 screen widthto 768 6 items
            //     1024 : { items : 3   // from 768 screen width to 1024 8 items
            //     }
            // },

            margin: 1,
            loop: false,
            autoWidth: true,
            items: 1,
            dots: false,
            rtl:isRTL,
            smartSpeed: 300,
            slideTransition: 'linear',
            startPosition: 0,

         });



        // Handle item click event
        $(document).find("div[id^='category_list']").on("click", ".owl-item", function (event) {
        // Get the index of the clicked item
        var clickedIndex = $(this).index();

        // Go to the first item (index 0)
        $(document).find("div[id^='category_list']").trigger("to.owl.carousel", [0, 300]); // Change '300' to your desired slide speed
        });





         $(window).on('load'  , function()
         {
            $('.owl-item').removeClass('active') ;
            $('.owl-item').first().addClass('active') ;

         })
        $('.custom_item').on("click" ,  function()    {
            console.log('gemy el...');
            $('.custom_item').removeClass('active');
            $(this).addClass('active');

        })

        $('.owl-carousel').on("click", ".owl-item", function (event) {
            // Get the index of the clicked item
            var clickedIndex = $(this).index();

            // Go to the first item (index 0)
            $('.owl-carousel').trigger("to.owl.carousel", [0, 300]); // Change '300' to your desired slide speed
        });

        //  $('.owl-carousel .owl-item.active').

            });



    </script>

</body>

</html>
