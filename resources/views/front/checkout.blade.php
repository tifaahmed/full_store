
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
        {{-- <div class="container">
            <span>
                <h1 class="col-md-10 col-11 col-lg-9 col-xl-6 text-center m-auto">{{ helper::appdata($storeinfo->id)->description }}</h1>
            </span>
        </div> --}}
    </div>
</section>
<!-- breadcrumb end -->
<section class="py-5 pull-section-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">

                <div class="row border shadow rounded-4 py-3 mb-4">
                    @php 
                        $total_price = 0;
                        $tax = 0;
                    @endphp
                    @foreach ($cartdata as $cart)
                        <?php
                        
                            $total_price += ($cart->qty * $cart->price);
                            $tax += ($cart->qty * $cart->price * $cart->tax) / 100;
                        ?>
                    @endforeach
                    <div class="card border-0 select-delivery">
                        <div class="card-body row">
                            <div class="radio-item-container row">
                                <div class="d-flex align-items-center mb-3 px-1">
                                    <i class="fa-solid fa-truck"></i>
                                    <p class="title px-2">{{ trans('labels.delivery_option') }}</p>
                                </div>
                                <form class="px-0">
                                    @php
                                        $delivery_types = explode(',', helper::appdata($storeinfo->id)->delivery_type);
                                        if(Session::has('table_id'))
                                        {
                                            $delivery_types = array(3);
                                        }
                                    @endphp
                                    @foreach ($delivery_types as $key => $delivery_type)
                                        <div class="col-12 px-0 mb-2">
                                            <label class="form-check-label d-flex  justify-content-between align-items-center" for="cart-delivery-{{$delivery_type}}">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input m-0" type="radio" name="cart-delivery" id="cart-delivery-{{$delivery_type}}" value="{{$delivery_type}}"  {{ $key == 0 ? 'checked' : ''}}>
                                                    <p class="px-2">
                                                        @if($delivery_type == 1)
                                                            {{ trans('labels.delivery') }}
                                                        @elseif($delivery_type == 2)
                                                            {{ trans('labels.pickup') }}
                                                        @elseif($delivery_type == 3)
                                                            {{ trans('labels.dine_in') }}
                                                        @endif
                                                    </p>
                                            
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row border shadow rounded-4 py-3 mb-4" id="data_time">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            <form action="#" method="get">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fa-regular fa-clock"></i>
                                        <p class="title px-2">{{ trans('labels.date_time') }}</p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="Name" class="form-label" id="delivery_date">{{ trans('labels.delivery_date') }}<span class="text-danger"> * </span></label>
                                        <label for="Name" class="form-label" id="pickup_date">{{ trans('labels.pickup_date') }}<span class="text-danger"> * </span></label>
                                        <input type="date" class="form-control input-h" id="delivery_dt" value="" placeholder="Delivery date" required min="{{date('Y-m-d')}}">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="Name" class="form-label" id="delivery">{{ trans('labels.delivery_time') }}<span class="text-danger"> *  </span></label>
                                        <label for="Name" class="form-label" id="pickup">{{ trans('labels.pickup_time') }}<span class="text-danger"> * </span></label>
                                        <label id="store_close"
                                            class="d-none text-danger">{{ trans('labels.today_store_closed') }}</label>
                                            <input type="hidden" name="store_id" id="store_id" value="{{ $storeinfo->id }}">
                                            <input type="hidden" name="sloturl" id="sloturl" value="{{ URL::to($storeinfo->slug . '/timeslot') }}">
                                        <select name="delivery_time" id="delivery_time" class="form-select input-h" required>
                                            <option value="{{ old('delivery_time') }}">{{ trans('labels.select') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="row border shadow rounded-4 py-3 mb-4" id="table_show">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            <form action="#" method="get">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fa-solid fa-utensils"></i>
                                        <p class="title px-2">{{ trans('labels.table') }}</p>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="Name" class="form-label" id="delivery">{{ trans('labels.table') }}<span class="text-danger"> *  </span></label>
                                        <select name="table" id="table" class="form-select input-h" @if(Session::has('table_id')) disabled  @endif required>
                                            <option value="">{{ trans('labels.select_table') }}
                                            </option>
                                            @foreach ($tableqrs as $tableqr)
                                            <option value="{{$tableqr->id}}" {{@Session::get('table_id') == $tableqr->id ? 'selected' : ''}}> {{ $tableqr->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4" id="open">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            
                            
                            <form action="#" method="get">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fa-regular fa-circle-question"></i>
                                        <p class="title px-2">{{ trans('labels.delivery_info') }}</p>
                                    </div>



                                    <div class="row">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.user_addresses') }} </label>
                                        @foreach (auth()->user()->userAddresses()->orderBy('is_active','desc')->get() as $key => $userAddress)
                                            <div class="col-3 px-0 mb-2">
                                                <label class="form-check-label d-flex  justify-content-between align-items-center" 
                                                for="user-address-{{$userAddress->id}}">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input m-0" type="radio" name="user_address" 
                                                        id="user-address-{{$userAddress->id}}" value="{{$key}}"  
                                                        {{ $userAddress->is_active ? 'checked' : ''}}>
                                                        <p class="px-2">
                                                            {{ $userAddress->title}}
                                                        </p>
                                                    </div>
                                                </label>
                                                <div class="child-container">
                                                    <input id="user_address_address_{{$key}}" value="{{$userAddress->address}}" hidden>
                                                    <input id="user_address_house_num_{{$key}}" value="{{$userAddress->house_num}}" hidden>
                                                    <input id="user_address_street_{{$key}}" value="{{$userAddress->street}}"hidden>
                                                    <input id="user_address_block_{{$key}}" value="{{$userAddress->block}}"hidden>
                                                    <input id="user_address_pincode_{{$key}}" value="{{$userAddress->pincode}}"hidden>
                                                    <input id="user_address_building_{{$key}}" value="{{$userAddress->building}}"hidden>
                                                    <input id="user_address_landmark_{{$key}}" value="{{$userAddress->landmark}}"hidden>
                                                    <input id="user_address_longitude_{{$key}}" value="{{$userAddress->longitude}}"hidden>
                                                    <input id="user_address_latitude_{{$key}}" value="{{$userAddress->latitude}}"hidden>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <div class="col-md-12 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.delivery_area') }}<span class="text-danger"> * </span></label>
                                        <select name="delivery_area" id="delivery_area" class="form-control">
                                            <option value=""price="{{ 0 }}">
                                                {{ trans('labels.select') }}</option>
                                            @foreach ($deliveryarea as $area)
                                                <option value="{{ $area->name }}" price="{{ $area->price }}">
                                                    {{ $area->name }}                                                     
                                                    {{-- - {{ helper::currency_formate($area->price, $storeinfo->id) }} --}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>



                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.block') }}<span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control input-h" name="block" id="block" placeholder="Block" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.street') }}<span class="text-danger"> </span></label>
                                        <input type="text" class="form-control input-h"   name="street"  id="street" placeholder="Street" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.house_num') }}</label>
                                        <input type="text" class="form-control input-h" name="house_num" id="house_num" placeholder="House Number" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.address') }}<span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control input-h" name="address" id="address" placeholder="Address" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.landmark') }}<span class="text-danger"> </span></label>
                                        <input type="text" class="form-control input-h"   name="landmark"  id="landmark" placeholder="Landmark" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.building') }}</label>
                                        <input type="text" class="form-control input-h" name="building" id="building" placeholder="Building" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.pincode') }}</label>
                                        <input type="number" class="form-control input-h" placeholder="Pincode" name="postal_code" id="postal_code" >
                                    </div>

                                    <div>
                                        
                                        @include('maps.google_map')

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            <form action="#" method="get">
                                <div class="row">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fa-regular fa-address-card"></i>
                                        <p class="title px-2">{{ trans('labels.customer') }}</p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.name') }}<span class="text-danger">*  </span></label>
                                        <input type="text" class="form-control input-h" placeholder="Name"  name="customer_name" id="customer_name" value="{{ @Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->name : '' }}" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>
                                        <input type="number" class="form-control input-h" placeholder="Mobile" name="customer_mobile" id="customer_mobile" value="{{ @Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->mobile : '' }}" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label">{{ trans('labels.email') }}<span class="text-danger">*  </span></label>
                                        <input type="email" class="form-control input-h" placeholder="Email"  name="customer_email" id="customer_email" value="{{ @Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->email : '' }}" >
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">{{ trans('labels.note') }}<span class="text-danger">  </span></label>
                                        <textarea id="notes" name="notes" class="form-control input-h" rows="5" aria-label="With textarea" placeholder="Message" value=""></textarea> 
                                    </div>
                                    <input type="hidden" id="vendor" name="vendor"
                                    value="{{ helper::storeinfo($storeinfo->slug)->id }}" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                        <input type="hidden" id="discount_amount" value="{{Session::get('offer_amount')}}" />
                        <input type="hidden" name="couponcode" id="couponcode" value="{{ Session::get('offer_code') }}">
                 @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                        @if (App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1)
                            @php
                                if($storeinfo->allow_without_subscription == 1)
                                {
                                    $promocode = 1;
                                }
                                else {
                                    $promocode = helper::get_plan(@$storeinfo->id)->coupons;
                                }
                            @endphp
                            @if($promocode == 1)
                            
                                <div class="row border shadow rounded-4 py-3 mb-4 @if(@$coupons->count() == 0) d-none @endif">
                                    <div class="card border-0 select-delivery" >
                                        <div class="card-body row justify-content-between align-items-center">
                                            <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                                                <div>
                                                    <p class="title px-2 mb-2"><i class="fa-solid fa-receipt"></i><span class="px-2" id="promocode_code">@if (Session::has('offer_amount')) {{ Session::get('offer_code') }} applied @else {{ trans('labels.apply_coupon') }} @endif </span></p>
                                                    <p class="apply-coupon-subtitle" id="promocode_desc">@if (!Session::has('offer_amount')) {{ trans('labels.save_offer') }}@endif</p>
                                                </div>
                                            </div>
                                            <input type="hidden" id="removecouponurl" value="{{ URL::to('/cart/removepromocode') }}"/>
                                            <div class="col-md-6 col-lg-12 col-xl-5 d-md-flex d-lg-block d-xl-flex justify-content-end px-2" id="promocode_button">
                                                @if (Session::has('offer_amount'))
                                                <a class=" text-danger" href="javascript:void(0)"  onclick="RemoveCopon()"> {{ trans('labels.remove') }}</a> 
                                                @else
                                                    <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" @if(@$coupons->count() > 0) data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @endif>{{ @$coupons->count() }}
                                                        {{ trans('labels.offer') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @else
                        @if (App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1)
                            <div class="row border shadow rounded-4 py-3 mb-4">
                                <div class="card border-0 select-delivery" >
                                    <div class="card-body row justify-content-between align-items-center">
                                        <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                                            <div>
                                                <p class="title px-2 mb-2"><i class="fa-solid fa-receipt"></i><span class="px-2" id="promocode_code">@if (Session::has('offer_amount')) {{ Session::get('offer_code') }} applied @else {{ trans('labels.apply_coupon') }} @endif </span></p>
                                                <p class="apply-coupon-subtitle" id="promocode_desc">@if (!Session::has('offer_amount')) {{ trans('labels.save_offer') }}@endif</p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="removecouponurl" value="{{ URL::to('/cart/removepromocode') }}"/>
                                        <div class="col-md-6 col-lg-12 col-xl-5 d-md-flex d-lg-block d-xl-flex justify-content-end px-2" id="promocode_button">
                                            @if (Session::has('offer_amount'))
                                            <a class=" text-danger" href="javascript:void(0)"  onclick="RemoveCopon()"> {{ trans('labels.remove') }}</a> 
                                            @else
                                                <a class="btn-primary d-inline-bloc fs-7 mt-3 mobile-viwe-btn mt-md-0 mt-lg-3 mt-xl-0 mt-xxl-0" href="#" type="button" @if(@$coupons->count() > 0) data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" @endif>{{ @$coupons->count() }}
                                                    {{ trans('labels.offer') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                  @php
                        $grand_total = 0;
                        $total_coupons = $coupons->count();
                  @endphp
                  @if(Session::has('offer_amount'))
                        @php
                             $grand_total = ($total_price - Session::get('offer_amount')) + $tax ; 
                        @endphp
                  @else
                        @php
                             $grand_total = $total_price + $tax ; 
                        @endphp
                  @endif
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body row">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <p class="title px-2">{{ trans('labels.order_summary') }}</p>
                            </div>
                            <div class="col">
                                <input type="hidden" id="sub_total" value="{{$total_price}}"/>
                                <input type="hidden" id="tax" value="{{$tax}}"/>
                                <input type="hidden" name="delivery_charge" id="delivery_charge" value="0">
                                <input type="hidden" name="grand_total" id="grand_total" value="{{$grand_total}}">
                                <ul class="list-group list-group-flush order-summary-list" id="payment_summery_list">
                                    <li class="list-group-item">
                                        {{ trans('labels.sub_total') }}
                                        <span>
                                            {{ helper::currency_formate($total_price, $storeinfo->id) }}
                                        </span>
                                    </li>
                                    <li class="list-group-item" id="shipping_charge_hide">
                                        {{ trans('labels.delivery_charge') }} (+)
                                        <span id="shipping_charge">
                                            
                                            {{ helper::currency_formate('0.0', $storeinfo->id) }}
                                        </span>
                                    </li>
                                    <li class="list-group-item" id="tax_list">
                                        {{ trans('labels.tax') }} (+)
                                        <span>
                                            
                                            {{ helper::currency_formate($tax, $storeinfo->id) }}
                                        </span>
                                    </li>
                                    @if (Session::has('offer_amount'))
                                    <li class="list-group-item" id="discount_1">
                                        {{ trans('labels.discount') }} (-)
                                        <span>
                                            
                                            {{ helper::currency_formate(Session::get('offer_amount'), $storeinfo->id) }}
                                        </span>
                                    </li>
                                    @endif
                                    <li class="list-group-item fw-700 text-success">
                                        {{ trans('labels.order_total') }} 
                                        <span class="fw-700 text-success" id="grand_total_view">
                                            {{ helper::currency_formate($grand_total, $storeinfo->id) }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border shadow rounded-4 py-3 mb-4">
                    <div class="card border-0 select-delivery">
                        <div class="card-body">
                            <div class="radio-item-container row">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                    <p class="title px-2"> {{ trans('labels.payment_option') }}</p>
                                </div>
                                <form>
                                    @foreach ($paymentlist as $key => $payment)
                                    @php  $transaction__type = strtolower($payment->payment_name); @endphp 
                                    <div class="col-12 select-payment-list-items">
                                        <label class="form-check-label d-flex  justify-content-between align-items-center" for="{{ $payment->payment_name }}">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input m-0" type="radio" id="{{ $payment->payment_name }}"  name="payment" data-payment_type="{{strtolower($payment->payment_name)}}"  data-currency="{{ $payment->currency }}"  @if (!$key) {!! 'checked' !!} @endif  value="{{ $payment->public_key }}">
                                                <p class="px-2">{{ $payment->payment_name }}</p>
                                            </div>
                                            <img src="{{ helper::image_path($payment->image) }}" alt="" class="select-paymentimages">
                                            
                                            
                                            @if (strtolower($payment->payment_name) == 'razorpay')
                                            <input type="hidden" name="razorpay" id="razorpay"
                                                value="{{ $payment->public_key }}">
                                            @endif
                                            
                                            @if (strtolower($payment->payment_name) == 'stripe')
                                                <input type="hidden" name="stripekey" id="stripekey" value="{{ $payment->public_key }}">
                                                <input type="hidden" name="stripecurrency" id="stripecurrency" value="{{ $payment->currency }}">
                                               
                                            @endif
                                            @if (strtolower($payment->payment_name) == 'flutterwave')
                                                <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                                    value="{{ $payment->public_key }}">
                                            @endif
                                            @if (strtolower($payment->payment_name) == 'paystack')
                                                <input type="hidden" name="paystackkey" id="paystackkey"
                                                    value="{{ $payment->public_key }}">
                                            @endif
                                            
                                        </label>
                                    </div>
                                  
                                    @endforeach

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button target="_blank" class="btn-primary text-center w-100"  onclick="Order()">
                    {{ trans('labels.place_order') }}
                </button>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="table_required" value="{{ trans('messages.table_required') }}">
<input type="hidden" id="delivery_time_required" value="{{ trans('messages.delivery_time_required') }}">
<input type="hidden" id="delivery_date_required" value="{{ trans('messages.delivery_date_required') }}">
<input type="hidden" id="address_required" value="{{ trans('messages.address_required') }}">
<input type="hidden" id="no_required" value="{{ trans('messages.no_required') }}">
<input type="hidden" id="landmark_required" value="{{ trans('messages.landmark_required') }}">
<input type="hidden" id="block_required" value="{{ trans('messages.block_required') }}">
<input type="hidden" id="street_required" value="{{ trans('messages.street_required') }}">
<input type="hidden" id="house_num_required" value="{{ trans('messages.house_num_required') }}">
<input type="hidden" id="pincode_required" value="{{ trans('messages.pincode_required') }}">
<input type="hidden" id="delivery_area_required" value="{{ trans('messages.delivery_area') }}">
<input type="hidden" id="pickup_date_required" value="{{ trans('messages.pickup_date_required') }}">
<input type="hidden" id="pickup_time_required" value="{{ trans('messages.pickup_time_required') }}">
<input type="hidden" id="customer_mobile_required" value="{{ trans('messages.customer_mobile_required') }}">
<input type="hidden" id="customer_email_required" value="{{ trans('messages.customer_email_required') }}">
<input type="hidden" id="customer_name_required" value="{{ trans('messages.customer_name_required') }}">
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
<div class="offcanvas  {{session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'}}" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-coupons">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">{{ trans('labels.coupons_offers') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body offer-coupons">
       
        
            @foreach ($coupons as $coupon)
                <div class="row g-4">
                    <div class="col px-0">
                        <div class="card promo-card position-relative rounded-5 h-100">
                            <div class="card-body p-4">
                                <div class="row main-row">
                                    <div class="coupons-imag col-12 col-md-4 col-lg-4 col-xl-4">
                                      <h1 >  {{$coupon->price}}%</h1>
                                      <h6 class="ms-3"> {{ trans('labels.coupons') }}</h6>
                                     
                                    </div>
                                    <div class="coupons-content col-12 col-md-8 col-lg-8 col-xl-8 d-md-flex justify-content-end">
                                        <div>
                                            <h2>{{ $coupon->name }}</h2>
                                            
                                            <p class="ps-7">{{ $coupon->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <form class="form-group" data-copy=true>
                                    <div class="copy-button rounded-5">
                                        <input type="hidden" id="applycoponurl" value="{{ URL::to('/cart/applypromocode') }}"/>
                                        <input id="promocode" type="text" class="rounded-5 px-2 input-h" readonly value="{{ $coupon->code }}" />
                                        <button type="button" class="copybtn btn-primary" onclick="ApplyCopon('{{ $coupon->code }}','{{$storeinfo->id}}')">{{ trans('labels.apply') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
            @endforeach
    
    </div>
</div>
</div>
@include('front.theme.footer-bar')

@endsection
@section('script')
<script>
    
$(document).ready(function() {
        var user_address_address = $('.child-container').find('#user_address_address_0').val();
        var user_address_house_num = $('.child-container').find('#user_address_house_num_0').val();
        var user_address_street = $('.child-container').find('#user_address_street_0').val();
        var user_address_block = $('.child-container').find('#user_address_block_0').val();
        var user_address_pincode = $('.child-container').find('#user_address_pincode_0').val();
        var user_address_building = $('.child-container').find('#user_address_building_0').val();
        var user_address_landmark = $('.child-container').find('#user_address_landmark_0').val();
        var user_address_longitude = $('.child-container').find('#user_address_longitude_0').val();
        var user_address_latitude = $('.child-container').find('#user_address_latitude_0').val();
        $('input[name="address"]').val(user_address_address);
        $('input[name="house_num"]').val(user_address_house_num);
        $('input[name="street"]').val(user_address_street);
        $('input[name="block"]').val(user_address_block);
        $('input[name="postal_code"]').val(user_address_pincode);
        $('input[name="building"]').val(user_address_building);
        $('input[name="landmark"]').val(user_address_landmark);
        $('input[name="longitude"]').val(user_address_longitude);
        $('input[name="latitude"]').val(user_address_latitude);
    $('input[name="user_address"]').change(function() {
        var parentValue = $(this).val();
        var user_address_address = $('.child-container').find('#user_address_address_'+parentValue).val();
        var user_address_house_num = $('.child-container').find('#user_address_house_num_'+parentValue).val();
        var user_address_street = $('.child-container').find('#user_address_street_'+parentValue).val();
        var user_address_block = $('.child-container').find('#user_address_block_'+parentValue).val();
        var user_address_pincode = $('.child-container').find('#user_address_pincode_'+parentValue).val();
        var user_address_building = $('.child-container').find('#user_address_building_'+parentValue).val();
        var user_address_landmark = $('.child-container').find('#user_address_landmark_'+parentValue).val();
        var user_address_longitude = $('.child-container').find('#user_address_longitude_'+parentValue).val();
        var user_address_latitude = $('.child-container').find('#user_address_latitude_'+parentValue).val();
        $('input[name="address"]').val(user_address_address);
        $('input[name="house_num"]').val(user_address_house_num);
        $('input[name="street"]').val(user_address_street);
        $('input[name="block"]').val(user_address_block);
        $('input[name="postal_code"]').val(user_address_pincode);
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
@endsection

 