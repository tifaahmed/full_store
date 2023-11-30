<!DOCTYPE html>
<html lang="en" dir="{{session()->get('direction') == 2 ? 'rtl' : 'ltr'}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ helper::appdata('')->meta_title }}" />
    <meta property="og:description" content="{{ helper::appdata('')->meta_description }}" />
    <meta property="og:image" content='{{ helper::image_path(helper::appdata('')->og_image) }}' />
    <link rel="icon" type="image" sizes="16x16" href="{{ helper::image_path(helper::appdata('')->favicon) }}"><!-- Favicon icon -->
    <title>{{helper::appdata('')->landing_website_title}}</title>
    <!-- Font Awesome icon css-->

<!-- icon Bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.xyz/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/all.min.css')}}">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/owl.carousel.min.css')}}">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/owl.theme.default.min.css')}}">

    <!-- Poppins fonts -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/fonts/poppins.css')}}">

    <!-- bootstrap-icons css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/bootstrap-icons.css')}}">

    <!-- bootstrap css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/bootstrap.min.css')}}">

    <!-- style css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/style.css')}}">

    <!-- responsive css -->

    <link rel="stylesheet" href="{{url(env('ASSETSPATHURL').'landing/css/responsive.css')}}">
    <style>
        :root {

            /* Color */
            --bs-primary: {{helper::appdata('')->primary_color}};
            --bs-secondary : {{helper::appdata('')->secondary_color}};

        }
    </style>
    @yield('styles')
    {!! helper::app_static_data()->pixel_header !!}
</head>

<body>
    @include('landing.layout.preloader')

    @include('landing.layout.header')
    <div>

        @yield('content')
    </div>
    @include('landing.layout.footer')

    <!-- Modal -->
    <div class="d-flex align-items-center float-end">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-5">
                    <div class="modal-header border-0 px-4 align-items-center">
                        <h3 class="page-title mb-0 d-block d-md-none">search</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 mb-0">
                        <form class="" action="{{URL::to('stores')}}" method="get">

                            <div class="col-12">
                                <div class="row align-items-center justify-content-between">

                                    <div class="col-6 d-none d-lg-block">
                                        <div class="Search-left-img">
                                            <img src="{{ url(env('ASSETSPATHURL').'landing/images/search.webp')}}" alt="search-left-img" class="w-100 object-fit-cover search-left-img">
                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-6">
                                        <div class="search-content text-capitalize">
                                            <h4 class="fs-2 text-dark fw-bolder mb-2 d-none d-md-block">{{ trans('labels.search') }}</h4>
                                            <p class="fs-6">{{ trans('labels.search_title') }}</p>
                                        </div>


                                        <select name="city" id="city" class="py-2 input-width px-2 mt-4 mb-1 w-100 border rounded-5 fs-7">
                                            <option value="" data-value="{{ URL::to('/stores?city=' . '&area=' . request()->get('area')) }}" data-id="0" selected>{{ trans('landing.select_city') }}</option>

                                            @foreach (helper::get_city() as $city)
                                            <option value="{{ $city->name }}" data-value="{{ URL::to('/stores?city=' . request()->get('city') . '&area=' . request()->get('area')) }}" data-id={{ $city->id }} {{ request()->get('city') == $city->name ? 'selected' : '' }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                        <select name="area" id="area" class="py-2 input-width px-2 mt-2 mb-1 w-100 border rounded-5 fs-7">
                                            <option value="">{{ trans('landing.select_area') }}</option>
                                            @if(request()->get('area'))
                                            <option value="{{request()->get('area')}}" selected>{{request()->get('area')}}</option>
                                            @endif


                                        </select>

                                        <div class="search-btn-group">
                                            <div class="d-flex justify-content-between align-items-center mt-5">
                                                <a type="submit" class="btn-primary bg-danger w-100 rounded-3 rounded-3 m-1 text-center" data-bs-dismiss="modal">{{ trans('labels.cancel') }} </a>
                                                <input type="submit" class="btn-primary w-100 rounded-3 rounded-3 m-1 text-center" value="{{ trans('labels.submit') }}" />
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

    <!-- whatsapp modal start -->
    @if(helper::appdata(@$storeinfo->id)->contact != "")
    <input type="checkbox" id="check">
    <div class="whatsapp_icon {{session()->get('direction') == 2 ? 'whatsapp_icon_rtl' : 'whatsapp_icon_ltr'}}">
        <label class="chat-btn" for="check">
            <i class="fa-brands fa-whatsapp comment"></i>
            <i class="fa fa-close close"></i>
        </label>
    </div>

    <div class="{{session()->get('direction') == 2 ? 'wrapper_rtl' : 'wrapper'}}  wp_chat_box d-none">
        <div class="msg_header">
            <h6>{{ helper::appdata('')->website_title }}</h6>
        </div>
        <div class="text-start p-3 bg-msg">
            <div class="card p-2 msg">
                How can I help you ?
            </div>
        </div>
        <div class="chat-form">

            <form action="https://api.whatsapp.com/send" method="get" target="_blank" class="d-flex align-items-center d-grid gap-2">
                <textarea class="form-control" name="text" placeholder="Your Text Message"></textarea>
                <input type="hidden" name="phone" value="{{ helper::appdata('')->contact }}">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
    @endif
    <!-- whatsapp modal end -->



    {!! helper::app_static_data()->pixel_footer !!}

    <!-- Jquery Min js -->
    <script>
        let direction = "{{ session()->get('direction') }}";

    </script>

    <script src="{{url(env('ASSETSPATHURL').'landing/js/jquery.min.js')}}"></script>

    <!-- Bootstrap js -->

    <script src="{{url(env('ASSETSPATHURL').'landing/js/bootstrap.bundle.min.js')}}"></script>

    <!-- owl carousel js -->

    <script src="{{url(env('ASSETSPATHURL').'landing/js/owl.carousel.min.js')}}"></script>

    <!-- custom js -->

    <script src="{{url(env('ASSETSPATHURL').'landing/js/custom.js')}}"></script>

    @yield('scripts')

    <script>
        var areaurl = "{{ URL::to('admin/getarea') }}";
        var select = "{{ trans('landing.select_area') }}";
        var areaname = "{{ request()->get('area') }}";


        $('.whatsapp_icon').on("click",function(event)
        {
            $(".wp_chat_box").toggleClass("d-none");
        });


    </script>


</body>
