<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ helper::appdata($storeinfo->id)->website_title }}</title>
    <!-- font-family -->
    <link rel="icon" href="{{ helper::image_path(helper::appdata(@$storeinfo->id)->favicon) }}" type="image" sizes="16x16">
    <link href="assets/font/css2.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/font-awesome/css/all.min.css')}}">
    <!-- dataTables -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/dataTables.bootstrap4.min.css')}}">
    <!-- carousel css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/owl.carousel.min.css')}}">
    <!-- carousel css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/owl.theme.default.css')}}">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ url(env('ASSETSPATHURL').'web-assets/css/responsive.css')}}">
    <style>
         :root{
                --bs-primary: #80b213;
                --bs-secondary: #80b213;
        }
    </style>
    
</head>
<body>
   @include('front.theme.preloader')
    <section class="order-successful mt-0">
        <div class="container">
            <div class="row justify-content-between d-flex align-items-md-center vh-100">
                <div class="col-md-12 col-lg-6 order-2 order-lg-0 successfully-contain">
                    <h3 class="page-title mb-2"> {{ trans('labels.order_successfull') }}</h3>
                    <small class="mb-4 text-dark"></small>
                    @php
                    $host = $_SERVER['HTTP_HOST'];
                    @endphp
                    <div class="form-control m-auto  rounded-2 d-flex p-0 rounded-5">
                        <input type="text" class="form-control input-h border-0  rounded-5" value="{{ URL::to( $host  ==  env('WEBSITE_HOST') ? $storeinfo->slug. '/track-order/' . $order_number : '' . '/track-order/' . $order_number) }}" id="data">
                        <a href="{{ URL::to( $host  ==  env('WEBSITE_HOST') ? $storeinfo->slug. '/track-order/' . $order_number : '' . '/track-order/' . $order_number) }}" class="copy-btn px-5 rounded-5 text-dark" target="_blank">
                            <span class="tooltiptext" id="tool">{{ trans('labels.track_order') }} <i class="fa-solid fa-up-right-from-square"></i> </span>
                        </a>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4 col-lg-4 col-xl-4 mb-2 mb-lg-2 mb-xl-0">
                            <a class="btn-primary w-100 text-center my-cart-account-btn" href="{{ URL::to($host  ==  env('WEBSITE_HOST') ? $storeinfo->slug : '') }}">{{ trans('labels.continue_shop') }}</a>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 mb-2 mb-lg-2 mb-xl-0">
                            @if (App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1)
                                @php
                                                        
                                if ($storeinfo->allow_without_subscription == 1) {
                                    $telegram_message = 1;
                                } else {
                                    $telegram_message = @helper::get_plan($storeinfo->id)->telegram_message;
                                }
                                @endphp
                                @if($telegram_message == 1)
                                    <a href="{{ URL::to('/' . $storeinfo->slug . '/telegram/' . $order_number . '') }}"
                                    class="btn-primary w-100 text-center my-cart-account-btn" target="_blank"><i
                                        class="fab fa-telegram me-1"></i>{{ trans('labels.telegram_message') }}</a>
                                @endif
                            @endif
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 mb-2 mb-lg-2 mb-xl-0">
                            @php
                                                                                    
                            if ($storeinfo->allow_without_subscription == 1) {
                                $whatsapp_message = 1;
                            } else {
                                $whatsapp_message = @helper::get_plan($storeinfo->id)->whatsapp_message;
                            }
                            @endphp
                            @if($whatsapp_message == 1)
                                <a href="https://api.whatsapp.com/send?phone={{ helper::appdata($storeinfo->id)->contact }}&text={{ $whmessage }}" class="btn-primary w-100 text-center my-cart-account-btn" target="_blank">
                                <i class="fab fa-whatsapp me-1"></i>{{ trans('labels.send_order_whatsapp') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 d-flex justify-content-end">
                    <img src="{{url(env('ASSETSPATHURL').'images/order_placed.png')}}" class="vert-move object-fit-cover success-animetion-images" />
                </div>
            </div>
        </div>
    </section>
</body>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/jquery-3.6.3.min.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/custom.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url(env('ASSETSPATHURL').'web-assets/js/sweetalert2@11.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    function copytext(copied) {
    "use strict";
    var copyText = document.getElementById("data");
    copyText.select();
    document.execCommand("copy");
    document.getElementById("tool").innerHTML = copied;
}
</script>
</html>
