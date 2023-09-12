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
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/toastr/toastr.min.css') }}">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/sweetalert/sweetalert2.min.css') }}">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/style.css') }}"><!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/responsive.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/timepicker/jquery.timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/buttons.dataTables.min.css') }}">

    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/jquery/jquery.min.js') }}"></script><!-- jQuery JS -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</head>
<body class="posbody">
 
@include('admin.layout.preloader')

    @yield('content')

    
    
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