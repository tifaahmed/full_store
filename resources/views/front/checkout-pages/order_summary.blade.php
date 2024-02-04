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
            {{-- <li class="list-group-item" id="tax_list">
                {{ trans('labels.tax') }} (+)
                <span>

                    {{ helper::currency_formate($tax, $storeinfo->id) }}
                </span>
            </li> --}}
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