
@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="mx-2">
            <h3 class="page-title text-white mb-2">  {{ trans('labels.checkout') }}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">  {{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">  {{ trans('labels.checkout') }}</li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
    </div>
</section>
<!-- breadcrumb end -->
<section class="py-5 pull-section-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                @include('front.checkout-pages.delivery_types')
                @include('front.checkout-pages.pickup_form')
                @include('front.checkout-pages.dine_in_form')
                @include('front.checkout-pages.address_form')
                <div class="row border shadow rounded-4 py-3 mb-4" id="pickup_date">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            @include('front.checkout-pages.branches')
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            @include('front.checkout-pages.customer_info_form')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                @include('front.checkout-pages.coupons')
                @include('front.checkout-pages.order_summary')
                @include('front.checkout-pages.payment_option')
                <button target="_blank" class="btn-primary text-center w-100"  
                onclick="Order()">
                    {{ trans('labels.place_order') }}
                </button>
            </div>
        </div>
    </div>
</section>
{{-- address --}}
<input type="hidden" id="landmark_required" value="{{ trans('messages.landmark_required') }}">
<input type="hidden" id="block_required" value="{{ trans('messages.block_required') }}">
<input type="hidden" id="street_required" value="{{ trans('messages.street_required') }}">
<input type="hidden" id="house_num_required" value="{{ trans('messages.house_num_required') }}">
{{-- <input type="hidden" id="pincode_required" value="{{ trans('messages.pincode_required') }}"> --}}
<input type="hidden" id="delivery_area_required" value="{{ trans('messages.delivery_area') }}">
<input type="hidden" id="address_required" value="{{ trans('messages.address_required') }}">


{{-- user info --}}
<input type="hidden" id="customer_mobile_required" value="{{ trans('messages.customer_mobile_required') }}">
<input type="hidden" id="customer_email_required" value="{{ trans('messages.customer_email_required') }}">
<input type="hidden" id="customer_name_required" value="{{ trans('messages.customer_name_required') }}">

{{-- table --}}
<input type="hidden" id="table_required" value="{{ trans('messages.table_required') }}">

{{-- pickup_form --}}
<input type="hidden" id="delivery_time_required" value="{{ trans('messages.delivery_time_required') }}">
<input type="hidden" id="delivery_date_required" value="{{ trans('messages.delivery_date_required') }}">
<input type="hidden" id="no_required" value="{{ trans('messages.no_required') }}">
<input type="hidden" id="pickup_date_required" value="{{ trans('messages.pickup_date_required') }}">
<input type="hidden" id="pickup_time_required" value="{{ trans('messages.pickup_time_required') }}">

{{-- payment --}}
<input type="hidden" id="currency" value="{{ helper::appdata($storeinfo->id)->currency }}">
<input type="hidden" id="checkplanurl" value="{{ URL::to('/orders/checkplan') }}">
<input type="hidden" id="paymenturl" value="{{ URL::to('/orders/paymentmethod') }}">
<input type="hidden" id="mecadourl" value="{{ URL::to('/orders/mercadoorderrequest') }}">
<input type="hidden" id="paypalurl" value="{{ URL::to('/orders/paypalrequest') }}">
<input type="hidden" id="myfatoorahurl" value="{{ URL::to('/orders/myfatoorahrequest') }}">
<input type="hidden" id="toyyibpayurl" value="{{ URL::to('/orders/toyyibpayrequest') }}">
<input type="hidden" id="payment_url" value="{{ URL::to($storeinfo->slug) }}/payment/">
<input type="hidden" id="website_title" value="{{ helper::appdata($storeinfo->id)->website_title }}">
<input type="hidden" id="image" value="{{ helper::appdata(@$storeinfo->id)->image }}">
<input type="hidden" id="slug" value="{{ $storeinfo->slug }}">
<input type="hidden" id="failure" value="{{ url()->current() }}">
<form action="{{ url('/orders/paypalrequest') }}" method="post" class="d-none">
    {{ csrf_field() }}
    <input type="hidden" name="return" value="2">
    <input type="submit" class="callpaypal" name="submit">
</form>

<!-- Apply Coupon Modal Promocode -->
@include('front.checkout-pages.coupon_modal')

</div>
@include('front.theme.footer-bar')

@endsection
@section('script')
<script>
    function toggleSquare(square,branch_id) {
      // Remove 'active' class from all squares
      document.querySelectorAll('.custom-square').forEach(function(element) {
        element.classList.remove('active');
      });
      console.log(branch_id);
      // Add 'active' class to the clicked square
      square.classList.add('active');
      document.getElementById("branch_id").value = branch_id;
    }
</script>
<script>
    $(document).ready(function() {
        // var user_address_address = $('.child-container').find('#user_address_address_0').val();
        var user_address_house_num = $('.child-container').find('#user_address_house_num_0').val();
        var user_address_street = $('.child-container').find('#user_address_street_0').val();
        var user_address_block = $('.child-container').find('#user_address_block_0').val();
        // var user_address_pincode = $('.child-container').find('#user_address_pincode_0').val();
        var user_address_building = $('.child-container').find('#user_address_building_0').val();
        var user_address_landmark = $('.child-container').find('#user_address_landmark_0').val();
        var user_address_longitude = $('.child-container').find('#user_address_longitude_0').val();
        var user_address_latitude = $('.child-container').find('#user_address_latitude_0').val();
        // $('input[name="address"]').val(user_address_address);
        $('input[name="house_num"]').val(user_address_house_num);
        $('input[name="street"]').val(user_address_street);
        $('input[name="block"]').val(user_address_block);
        // $('input[name="postal_code"]').val(user_address_pincode);
        $('input[name="building"]').val(user_address_building);
        $('input[name="landmark"]').val(user_address_landmark);
        $('input[name="longitude"]').val(user_address_longitude);
        $('input[name="latitude"]').val(user_address_latitude);
        $('input[name="user_address"]').change(function() {
            var parentValue = $(this).val();
            // var user_address_address = $('.child-container').find('#user_address_address_'+parentValue).val();
            var user_address_house_num = $('.child-container').find('#user_address_house_num_'+parentValue).val();
            var user_address_street = $('.child-container').find('#user_address_street_'+parentValue).val();
            var user_address_block = $('.child-container').find('#user_address_block_'+parentValue).val();
            // var user_address_pincode = $('.child-container').find('#user_address_pincode_'+parentValue).val();
            var user_address_building = $('.child-container').find('#user_address_building_'+parentValue).val();
            var user_address_landmark = $('.child-container').find('#user_address_landmark_'+parentValue).val();
            var user_address_longitude = $('.child-container').find('#user_address_longitude_'+parentValue).val();
            var user_address_latitude = $('.child-container').find('#user_address_latitude_'+parentValue).val();
            // $('input[name="address"]').val(user_address_address);
            $('input[name="house_num"]').val(user_address_house_num);
            $('input[name="street"]').val(user_address_street);
            $('input[name="block"]').val(user_address_block);
            // $('input[name="postal_code"]').val(user_address_pincode);
            $('input[name="building"]').val(user_address_building);
            $('input[name="landmark"]').val(user_address_landmark);
            $('input[name="longitude"]').val(user_address_longitude);
            $('input[name="latitude"]').val(user_address_latitude);
        });
    

    });
function RemoveCopon() {
    "use strict";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1 yes-btn',
            cancelButton: 'btn btn-danger mx-1 no-btn'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this! hy",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('#removecouponurl').val(),
                method: 'post',
                data: {
                    promocode: jQuery('#promocode').val()
                },
                success: function(response) {
                    $('#preloader').hide();
                    if (response.status == 1) {
                        var html;
                    let coupons = "{{ $coupons->count() }}";
                        html = ' <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">'+coupons+'  Offer(S)</a>';
                        var grand_total =   (parseFloat($('#grand_total').val()) + parseFloat($('#discount_amount').val()));

                        $('#discount_1').remove();
                        $('#promocode_button').html(html);
                        $('#promocode_code').html("Apply Coupon");
                        $('#promocode_desc').show();
                        $('#discount_amount').val('');
                        $('#couponcode').val('');
                        $('#grand_total_view').html(currency_formate(grand_total));
                        $('#grand_total').val(grand_total);
                    } else {
                        $('#ermsg').text(response.message);
                        $('#error-msg').addClass('alert-danger');
                        $('#error-msg').css("display", "block");
                        setTimeout(function() {
                            $("#success-msg").hide();
                        }, 5000);
                    }
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.DismissReason.cancel
        }
    })
}
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/checkout.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo4iEau7G33x7oFsjSyGtT_P4vDJm2auc&libraries=drawing,geometry&callback=initMap" async defer></script>
<script src="{{ env('APP_URL_public', asset('')).'/js/maps_checkout.js' }}"></script>

@endsection

