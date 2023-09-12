<!DOCTYPE html>
<html lang="en" dir="{{ session()->get('direction') == 2 ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="{{ helper::appdata('')->meta_title }}" />
    <meta property="og:description" content="{{ helper::appdata('')->meta_description }}" />
    <meta property="og:image" content="{{ helper::image_path(helper::appdata('')->og_image) }}" />
    <link rel="icon" href="{{ helper::image_path(helper::appdata('')->favicon) }}" type="image" sizes="16x16">
    <title>{{ helper::appdata('')->website_title }}</title>

    <!-- Font Family Poppins -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/poppins.css') }}">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css') }}">

    <!-- Toastr CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/toastr/toastr.min.css') }}">

    <!-- Sweetalert CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/sweetalert/sweetalert2.min.css') }}">

    <!-- style CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/style.css') }}">

    <!-- Responsive CSS -->

    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/responsive.css') }}">

    <!-- Timepicker css -->

    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/timepicker/jquery.timepicker.min.css') }}">

    <!-- DataTables Bootstrap5 Min css -->

    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/dataTables.bootstrap5.min.css') }}">

    <!-- Buttons DataTables Min css -->

    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/buttons.dataTables.min.css') }}">

</head>
<body>
    @include('admin.layout.preloader')
    <main>
    <div class="wrapper">
        @if (env('Environment') == 'sendbox') 
        <div class="sale">
            <div class="container">
                <div class="d-block d-md-flex justify-content-center align-items-center">
                    <p class="text-center"> <a href="https://1.envato.market/XxMgjX" target="_blank">This is a demo website - Buy genuine Restro SaaS using our official link! Click Now >>> Buy Now</a></p>
                </div>
            </div>
        </div>
        @endif
        <div class="content-wrapper">
            <div class="row gx-0">
                <div class="col-md-2 d-none d-lg-block col-lg-3 col-xl-2">
                    @include('admin.layout.sidebar')
                </div>
                <div class="col-12 col-lg-9 col-xl-10 overflow-auto vh-100 scrollbar_body">
                     @include('admin.layout.header')
                    <div class="{{ session()->get('direction') == 2 ? 'main-content-rtl' : 'main-content' }}">
                        <div class="page-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 ml-sm-auto">
                                        @if (env('Environment') == 'live')
                                            @if(request()->is('admin/custom_domain'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ trans('messages.custom_domain_message') }}
                                            </div>
                                            @endif
                                            @if(request()->is('admin/apps'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ trans('messages.addon_message') }}
                                            </div>
                                            @endif
                                        @endif
                                        @if (Auth::user()->type == 2)
                                        <?php
                                        $checkplan = helper::checkplan(Auth::user()->id, '');
                                        $plan = json_decode(json_encode($checkplan));
                                        ?>
                                        @if (@$plan->original->status == '2')
                                        <div class="alert alert-danger" role="alert">
                                            {{ @$plan->original->message }}{{ empty($plan->original->expdate) ? '' : ':'.$plan->original->expdate}}
                                            @if (@$plan->original->showclick == 1)
                                            <u><a href="{{ URL::to('/admin/plan') }}">{{ trans('labels.click_here') }}</a></u>
                                            @endif
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <!--Modal: order-modal-->
                                <div class="modal fade" id="order-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                        <div class="modal-content text-center">
                                            <div class="modal-header d-flex justify-content-center">
                                                <p class="heading">{{ trans('messages.be_up_to_date') }}</p>
                                            </div>
                                            <div class="modal-body"><i class="fa fa-bell fa-4x animated rotateIn mb-4"></i>
                                                <p>{{ trans('messages.new_order_arrive') }}</p>
                                            </div>
                                            <div class="modal-footer flex-center">
                                                <a role="button" class="btn btn-outline-secondary-modal waves-effect"
                                                    onClick="window.location.reload();"
                                                    data-bs-dismiss="modal">{{ trans('labels.okay') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @yield('content')
                                <footer class="pt-3 bg-white border-top bg-transparent">
                                    <span class="text-dark fs-7">{{ helper::appdata('')->copyright }}</span>
                                </footer>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            {{-- <div class="container-fluid">
            </div> --}}
        </div>
        <div class="offcanvas offcanvas-start d-lg-none d-md-block" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header pb-0 border-bottom align-items-start">
                <div class="navbar-header-logoc pb-2 d-flex justify-content-center">
                    <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="">
                </div>
                <button type="button" class="btn-close shadow" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body sidebar sidebar-md">
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom border-white">
                    @include('admin.layout.sidebarcommon')
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/jquery/jquery.min.js') }}"></script><!-- jQuery JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/jquery/jquery_ui.js') }}"></script><!-- jQuery JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script><!-- Bootstrap JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/toastr/toastr.min.js') }}"></script><!-- Toastr JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/sweetalert/sweetalert2.min.js') }}"></script><!-- Sweetalert JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/chartjs/chart_3.9.1.min.js') }}"></script>
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/jquery.dataTables.min.js') }}"></script><!-- Datatables JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/dataTables.bootstrap5.min.js') }}"></script><!-- Datatables Bootstrap5 JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/dataTables.buttons.min.js') }}"></script><!-- Datatables Buttons JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/jszip.min.js') }}"></script><!-- Datatables Excel Buttons JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/pdfmake.min.js') }}"></script><!-- Datatables Make PDF Buttons JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/vfs_fonts.js') }}"></script><!-- Datatables Export PDF Buttons JS -->
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/buttons.html5.min.js') }}"></script><!-- Datatables Buttons HTML5 JS -->
    <script>
        var are_you_sure = "{{ trans('messages.are_you_sure') }}";
        var yes = "{{ trans('messages.yes') }}";
        var no = "{{ trans('messages.no') }}";
        var cancel = "{{ trans('labels.cancel') }}";
        let wrong = "{{ trans('messages.wrong') }}";
        let env = "{{ env('Environment') }}";
        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-top-right",
        }
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (Auth::user()->type == 2)
            // New Notification
            var noticount = 0;
            var notificationurl = "{{ URL::to('/admin/getorder') }}";
            var vendoraudio =
                "{{ url(env('ASSETSPATHURL') . 'admin-assets/notification/' . helper::appdata(Auth::user()->id)->notification_sound) }}";
        @endif
    </script>
    @if (Auth::user()->type == 2)
        <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/sound.js') }}"></script>
    @endif
    
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/common.js') }}"></script><!-- Common JS -->
    @yield('scripts')
</body>
</html>