<input type="hidden" id="discount_amount" value="{{Session::get('offer_amount')}}" />
<input type="hidden" name="couponcode" id="couponcode" value="{{ Session::get('offer_code') }}">
    @php
        $promocode = 1;
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
   