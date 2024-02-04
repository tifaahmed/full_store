@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

<div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2">{{ trans('labels.order_details') }}</h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="{{ URL::to($storeinfo->slug . '/orders/') }}" class="text-white">{{ trans('labels.orders') }}</a></li>

                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{ trans('labels.order_details') }}</li>

            </ol>

        </nav>

    </div>
    
</div>


<!-- breadcrumb end -->

<section class="my-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 px-0 mt-0 order-det-card">
                <div class="row shadow rounded-4 py-3 mb-4">

                    @if ( isset($summery['latitude']) && isset($summery['longitude']) )
                        <a href="https://www.google.com/maps/search/?api=1&query={{$summery['latitude']}},{{$summery['longitude']}}" target="_blank">
                            go to the location
                        </a>
                        <br>
                        <a href="https://www.google.com/maps/search/?api=1&query={{$summery['latitude']}},{{$summery['longitude']}}" target="_blank">
                            https://www.google.com/maps/search/?api=1&query={{$summery['latitude']}},{{$summery['longitude']}}
                        </a>
                        <x-maps-leaflet   style="height: 200px"
                            :markers="[['lat' => $summery['latitude'], 'long' => $summery['longitude']  ]]"
                            :centerPoint="['lat' => $summery['latitude'], 'long' => $summery['longitude']]"
                            ></x-maps-leaflet>
                    @endif
                </div>
            </div>
        </div>
    <div class="row g-0 g-lg-5">

            <div class="col-lg-8 px-0 mt-0 order-det-card">

                <div class="row shadow rounded-4 py-3 mb-4">

                    <div class="d-flex align-items-center mb-3">

                        <i class="fa-solid fa-cart-flatbed"></i>

                        <p class="title px-2">{{ trans('labels.order_details') }}</p>

                    </div>

                    <div class="card border-0 p-0">

                        <div class="card-body p-0">

                            <div class="order-details">

                                <ul class="row">

                                    <li class="col-md-6 col-lg-3 col-6">

                                        <a>{{trans('labels.order_date')}}</a>

                                        <p>{{date('d/M/Y',strtotime($orderdata->created_at))}}</p>

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-md-0 mt-lg-0 col-6">

                                        <a>{{trans('labels.status')}}</a>

                                        <div class="d-flex align-items-center pt-1">

                                            <p class="pt-0 text-center m-auto">

                                             @if($orderdata->status == 1)

                                              {{trans('labels.pending')}}

                                            @elseif($orderdata->status == 2)

                                              {{trans('labels.processing')}}

                                            @elseif($orderdata->status == 5)

                                                @if($orderdata->order_type == 3)

                                                    {{trans('labels.completed')}}

                                                @else

                                                    {{trans('labels.deliverd')}}

                                                @endif

                                            @elseif($orderdata->status == '4')

                                                {{ trans('labels.cancelled_by_you') }}

                                            @elseif($orderdata->status == 3)

                                              {{trans('labels.cancelled')}}

                                            @endif

                                            </p>

                                        </div>

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">

                                        <a>{{trans('labels.type')}}</a>

                                        <p>

                                            @if($orderdata->order_type == 1)

                                                {{trans('labels.delivery')}}

                                            @elseif($orderdata->order_type == 2)

                                                {{trans('labels.pickup')}}

                                            @elseif($orderdata->order_type == 3)

                                                {{trans('labels.dine_in')}}

                                            @endif

                                        </p>



                                        @if($orderdata->order_type == 3)

                                            <span class="fs-8">( {{$orderdata['tableqr']->name}} )</span>

                                        @endif

                                    </li>

                                    <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">

                                        <a>{{trans('labels.order')}}</a>

                                        <div class="d-flex justify-content-center align-items-center pt-1">

                                            <strong class="pt-0">#{{$orderdata->order_number}}</strong>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="row align-items-center py-3">



                        @foreach ($orderdetails as $odata)

                            <div class="card my-cart-categories border-bottom rounded-0 dark px-0 py-2">

                                <img src="{{ asset('storage/app/public/item/' . $odata->item_image) }}" class="card-img-top p-0 object-fit-cover border rounded-4" alt="...">

                                <div class="card-body {{session()->get('direction') == 2 ? 'ps-2' : 'pe-0'}}">

                                    <div class="text-section">

                                        <p class="title fs-6 pb-2"> {{ $odata->item_name }}</p>

                                        <div class="d-flex justify-content-between">

                                            @if ($odata->variants_id != '' || $odata->extras_id != '')

                                               <a class="customisable" onclick="showextra('{{$odata->variants_name}}','{{$odata->variants_price}}','{{$odata->extras_name}}','{{$odata->extras_price}}','{{$odata->item_name}}')">{{ trans('labels.extras') }}</a>

                                             @endif

                                             <a class="customisable">-</a>

                                             <p class="price fs-6">{{$odata->qty}} X {{ helper::currency_formate($odata->price,$storeinfo->id)}}</p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                <div class="row shadow rounded-4 py-3 mb-4">

                    <div class="d-flex align-items-center mb-3 px-3">

                        <i class="fa-regular fa-credit-card"></i>

                        <p class="title px-2">{{ trans('labels.payment_summary') }}</p>

                    </div>

                    <div class="card border-0 p-0">

                        <div class="card-body p-0">

                            <ul class="list-group list-group-flush order-summary-list px-3">

                                <li class="list-group-item">

                                    {{ trans('labels.sub_total') }}

                                    <span>

                                        {{ helper::currency_formate(@$summery['sub_total'], $storeinfo->id) }}

                                    </span>

                                </li>

                                @if ($summery['discount_amount'] > 0)

                                <li class="list-group-item">

                                    {{ trans('labels.discount') }} ({{ $summery['couponcode'] }}) 

                                    <span>

                                        {{ helper::currency_formate(@$summery['discount_amount'], $storeinfo->id) }}

                                    </span>

                                </li>

                                @endif



                                @if ($summery['delivery_charge'] > 0)

                                <li class="list-group-item">

                                    {{ trans('labels.delivery_charge') }}

                                    <span>

                                        {{ helper::currency_formate(@$summery['delivery_charge'], $storeinfo->id) }}

                                    </span>

                                </li>

                                @endif





                                @if ($summery['tax'] > 0)

                                    {{-- <li class="list-group-item">

                                        {{ trans('labels.tax') }}

                                        <span>

                                            {{ helper::currency_formate(@$summery['tax'], $storeinfo->id) }}

                                        </span>

                                    </li> --}}



                                @endif

                                <li class="list-group-item fw-700 text-success">

                                    {{ trans('labels.total_amount') }}

                                    <span class="fw-700 text-success">

                                        {{ helper::currency_formate($summery['grand_total'], $storeinfo->id) }}

                                    </span>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>







            <div class="col-lg-4 mt-0 customer-left-side">



                <div class="row shadow rounded-4 py-3 mb-4">

                    <p class="title px-3">{{ trans('labels.customer') }}</p>

                    <div class="card border-0 px-0 py-2">

                        <div class="card-body cust-info pt-2 pb-0">

                            @if($summery['customer_name'] != null)

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-user"></i>

                                    <p class="px-2">{{ $summery['customer_name'] }}</p>

                                </div>

                            @endif



                            @if($summery['customer_email'] != null)

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-envelope"></i>

                                    <a href="#" class="px-2">{{ $summery['customer_email'] }}</a>

                                </div>

                            @endif

                            @if($summery['mobile'] != null)

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-solid fa-phone"></i>

                                    <b class="px-2 fw-500">{{ $summery['mobile'] }}</b>

                                </div>

                            @endif

                            @if($summery['order_notes'] != null)

                                <div class="d-flex align-items-center mb-2">

                                    <i class="fa-regular fa-clipboard"></i>

                                    <b class="px-2 fw-500">{{ $summery['order_notes'] }}</b>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>



                @if ($summery['order_type'] == 1)

                    <div class="row shadow rounded-4 py-3 mb-4">

                        <p class="title px-3">{{ trans('labels.delivery_info') }}</p>

                        <div class="card border-0 px-0 py-2">

                            <div class="card-body cust-info pt-2 pb-0">

                                <div class="d-flex align-items-start mb-2">

                                    <i class="fa-solid fa-location-dot pt-1"></i>

                                    <address class="px-2">

                                        <b> {{ $summery['house_num'] }}, {{ $summery['block'] }}, {{ $summery['street'] }}, {{ $summery['pincode'] }} </b>

                                    </address>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif





                <div class="row shadow rounded-4 py-3 mb-4">

                    <p class="title px-3">{{ trans('labels.payment_method') }}</p>

                    <div class="card border-0 px-0 py-2">

                        <div class="card-body cust-info pt-2 pb-0">

                            <div class="d-flex align-items-center mb-2">

                                <i class="fa-solid fa-money-bill-wave"></i>

                                <p class="px-2">

                                @if ($orderdata->payment_type == 1)

                                    {{ trans('labels.cod') }}

                                @elseif ($orderdata->payment_type == 2)

                                    {{ trans('labels.razorpay') }}

                                @elseif ($orderdata->payment_type == 3)

                                    {{ trans('labels.stripe') }}

                                @elseif ($orderdata->payment_type == 4)

                                    {{ trans('labels.flutterwave') }}

                                @elseif ($orderdata->payment_type == 5)

                                    {{ trans('labels.paystack') }}

                                @elseif ($orderdata->payment_type == 7)

                                    {{ trans('labels.mercadopago') }}

                                @elseif ($orderdata->payment_type == 8)

                                    {{ trans('labels.paypal') }}

                                @elseif ($orderdata->payment_type == 9)

                                    {{ trans('labels.myfatoorah') }}

                                @elseif ($orderdata->payment_type == 10)

                                    {{ trans('labels.toyyibpay') }}

                                @endif

                                </p>

                            </div>

                            @if (in_array($orderdata->payment_type, [2, 3, 4, 5, 7 ,8 ,9 ,10]))

                                <div class="mb-2">

                                    <span>{{ trans('labels.payment_id') }}</span>

                                    <p class="fw-600">{{ $orderdata->payment_id }}</p>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>





                @if($summery['status'] == 1)

                  {{-- <a href="{{ URL::to('/cancel-order/' . $summery['order_number']) }}" class="btn-primary text-center w-100 bg-danger">{{ trans('labels.cancel') }}</a> --}}

                @endif



            </div>





        </div>

    </div>

</section>

@endsection

@section('script')

<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>

@endsection