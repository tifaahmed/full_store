@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-6">
        <!-- <h5 class="pages-title fs-2">{{ trans('labels.invoice') }}</h5> -->
        <h5 class="pages-title fs-2">Order details</h5>
        <div class="d-flex">

            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="col-md-12 my-2 d-flex justify-content-end justify-content-md-end">
            <a href="{{ URL::to('admin/orders/print/' . $getorderdata->order_number) }}" tooltip="{{trans('labels.print')}}" class="btn btn-success rounded-5 mx-2 px-3 py-2 {{Auth::user()->type == 1 ? 'disabled' : ''}}">
                <i class="fa fa-pdf" aria-hidden="true"></i> <i class="fa-solid fa-print"></i>
            </a>
            <button type="button" class="btn btn-sm btn-primary px-4 dropdown-toggle" data-bs-toggle="dropdown">{{ trans('labels.status') }} :
                @if ($getorderdata->status == '1') {{ trans('labels.pending') }} @elseif ($getorderdata->status == '2') {{ trans('labels.accept') }} @elseif ($getorderdata->status == '5') {{ trans('labels.complete') }} @elseif ($getorderdata->status == '3') {{ trans('labels.reject') }} @endif</button>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow {{Auth::user()->type == 1 ? 'disabled' : ''}}">
                <a href="#" class="dropdown-item w-auto py-2 @if ($getorderdata->status == '1') fw-600 @endif" onclick="statusupdate('{{ URL::to('admin/orders/update-' . $getorderdata->id . '-2') }}')">{{ trans('labels.accept') }}</a>
                <a href="#" class="dropdown-item w-auto py-2 @if ($getorderdata->status == '2') fw-600 @endif" onclick="statusupdate('{{ URL::to('admin/orders/update-' . $getorderdata->id . '-5') }}')">{{ trans('labels.complete') }}</a>
                <a href="#" class="dropdown-item w-auto py-2" onclick="statusupdate('{{ URL::to('admin/orders/update-' . $getorderdata->id . '-3') }}')">{{ trans('labels.reject') }}</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row justify-content-between g-md-4 g-lg-4">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-circle-info fs-5"></i>
                        <h5 class="px-2 fw-500">{{trans('labels.order_details')}}</h5>
                    </div>
                    <div class="card-body">

                        <div class="basic-list-group">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <p>{{trans('labels.order_number')}}</p>
                                    <p class="text-dark fw-600">#{{ $getorderdata->order_number }}</p>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    {{ trans('labels.order_date') }}
                                    <p class="text-muted">{{ helper::date_format($getorderdata->created_at) }}</p>
                                </li>
                                @if($getorderdata->order_from != 'pos' && $getorderdata->order_type != 3)
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    {{ $getorderdata->order_type == 1 ? trans('labels.delivery_date') : trans('labels.pickup_date') }}
                                    <p class="text-muted">{{ helper::date_format($getorderdata->delivery_date) }}</p>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    {{ $getorderdata->order_type == 1 ? trans('labels.delivery_time') : trans('labels.pickup_time') }}
                                    <p class="text-muted">{{ $getorderdata->delivery_time }}</p>
                                </li>
                                @endif

                                {{-- payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10 --}}
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    {{ trans('labels.payment_type') }}
                                    <span class="text-muted">
                                        @if ($getorderdata->payment_type == 1)
                                        {{ trans('labels.cod') }}
                                        @elseif ($getorderdata->payment_type == 2)
                                        {{ trans('labels.razorpay') }}
                                        @elseif ($getorderdata->payment_type == 3)
                                        {{ trans('labels.stripe') }}
                                        @elseif ($getorderdata->payment_type == 4)
                                        {{ trans('labels.flutterwave') }}
                                        @elseif ($getorderdata->payment_type == 5)
                                        {{ trans('labels.paystack') }}
                                        @elseif ($getorderdata->payment_type == 7)
                                        {{ trans('labels.mercadopago') }}
                                        @elseif ($getorderdata->payment_type == 8)
                                        {{ trans('labels.paypal') }}
                                        @elseif ($getorderdata->payment_type == 9)
                                        {{ trans('labels.myfatoorah') }}
                                        @elseif ($getorderdata->payment_type == 10)
                                        {{ trans('labels.toyyibpay') }}
                                        @elseif ($getorderdata->payment_type == 0)
                                        {{ trans('labels.online') }}
                                        @endif
                                    </span>
                                </li>
                                @if (in_array($getorderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10]))
                                <li class="list-group-item px-0">{{ trans('labels.payment_id') }}
                                    <p class="text-muted">
                                        {{ $getorderdata->payment_id }}
                                    </p>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @if ($getorderdata->notes != '')
                        <h6>{{ trans('labels.order_notes') }}</h6>
                        <small class="text-muted">{{ $getorderdata->notes }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-user fs-5"></i>
                        <h5 class="px-2 fw-500">{{ trans('labels.customer') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <div class="basic-list-group">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <p>{{ trans('labels.name') }}</p>
                                            <p class="text-muted"> {{ $getorderdata->customer_name }}</p>
                                        </li>

                                        @if($getorderdata->mobile != null)

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <p>{{ trans('labels.mobile') }}</p>
                                            <p class="text-muted">{{ $getorderdata->mobile }}</p>
                                        </li>

                                        @endif

                                        @if($getorderdata->customer_email != null)

                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <p>{{ trans('labels.email') }}</p>
                                            <p class="text-muted">{{ $getorderdata->customer_email }}</p>
                                        </li>
                                        @endif
                                        @if($getorderdata->order_notes != null)
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <p>{{ trans('labels.notes') }}</p>
                                            <p class="text-muted">{{ $getorderdata->order_notes }}</p>
                                        </li>
                                        @endif

                                        @if($getorderdata->delivery_time != null)
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            {{ $getorderdata->order_type == 1 ? trans('labels.delivery_time') : trans('labels.pickup_time') }}
                                            <p class="text-muted">{{ $getorderdata->delivery_time }}</p>
                                        </li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card border-0 mb-3 h-100 d-flex">
                    <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                        <i class="fa-solid fa-file-invoice fs-5"></i>
                        <h5 class="px-2 fw-500">
                            @if($getorderdata->order_type == 3)
                                {{ trans('labels.other_info') }}
                            @else
                                {{ trans('labels.delivery_info') }}
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                {{-- delivery --}}
                                @if ($getorderdata->order_type == 1)
                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                @if($getorderdata->order_from == 'pos')
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.pos') }}</p>
                                                        <p class="text-muted"> {{ trans('labels.dine_in') }}</p>
                                                    </li>
                                                @else
                                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                    <p>{{ trans('labels.block') }}</p>
                                                    <p class="text-muted"> {{ $getorderdata->block }}</p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.street') }}</p>
                                                    <p class="text-muted">{{ $getorderdata->street }}</p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.house_num') }}</p>
                                                    <p class="text-muted">{{ $getorderdata->house_num }}</p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.landmark') }}</p>
                                                    <p class="text-muted">{{ $getorderdata->landmark }}</p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.delivery_area') }}</p>
                                                    <p class="text-muted">{{ $getorderdata->delivery_area }}</p>
                                                </li>
                                                
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.address') }} ar </p>
                                                    <p class="text-muted"> 
                                                        {{ isset( json_decode($getorderdata->address , true)['ar'] ) ?  json_decode($getorderdata->address , true)['ar']:''  }}.</p>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <p>{{ trans('labels.address') }} en </p>
                                                    <p class="text-muted"> 
                                                        {{ isset( json_decode($getorderdata->address , true)['en'] ) ?  json_decode($getorderdata->address , true)['en']  :''}}.</p>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                {{-- pickup --}}
                                @elseif ($getorderdata->order_type == 2)
                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                @if($getorderdata->order_from == 'pos')
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.order_type') }}</p>
                                                        <p class="text-muted"> {{ trans('labels.takeaway') }}</p>
                                                    </li>
                                                @else
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.order_type') }}</p>
                                                        <p class="text-muted"> {{ trans('labels.pickup') }}</p>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                {{-- dine_in --}}
                                @elseif ($getorderdata->order_type == 3)
                                    <div class="col-md-12 mb-2">
                                        <div class="basic-list-group">
                                            <ul class="list-group list-group-flush">
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.table') }}</p>
                                                        <p class="text-muted"> {{ $getorderdata['tableqr']->name }}</p>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.size') }}</p>
                                                        <p class="text-muted"> {{ $getorderdata['tableqr']->size }} {{ trans('labels.seats') }}</p>
                                                    </li>
                                                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                                        <p>{{ trans('labels.area') }}</p>
                                                        <p class="text-muted"> {{ $getorderdata['tableqr']->area->name }} </p>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($getorderdata->latitude && $getorderdata->longitude)
    <div class="row mt-4">
        <div class="col-md-12">
            <a href="https://www.google.com/maps/search/?api=1&query={{$getorderdata->latitude}},{{$getorderdata->longitude}}" target="_blank">
                go to the location
            </a>
            <br>
            <a href="https://www.google.com/maps/search/?api=1&query={{$getorderdata->latitude}},{{$getorderdata->longitude}}" target="_blank">
                https://www.google.com/maps/search/?api=1&query={{$getorderdata->latitude}},{{$getorderdata->longitude}}
            </a>
            <x-maps-leaflet   style="height: 200px"
            :markers="[['lat' => $getorderdata->latitude, 'long' => $getorderdata->longitude]]"
            :centerPoint="['lat' => $getorderdata->latitude, 'long' => $getorderdata->longitude]"
            ></x-maps-leaflet>
        </div>
    </div>  
@endif

<div class="row mt-4">
    <div class="col-md-12">

        <div class="card border-0 mb-3">
            <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                <i class="fa-solid fa-bag-shopping fs-5"></i>
                <h5 class="px-2 fw-500">Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="fw-500">
                                <td>{{ trans('labels.image') }}</td>
                                <td>{{ trans('labels.products') }}</td>
                                <td class="text-end">{{ trans('labels.unit_cost') }}</td>
                                <td class="text-end">{{ trans('labels.qty') }}</td>
                                <td class="text-end">{{ trans('labels.sub_total') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordersdetails as $orders)
                            @php
                            $itemprice = $orders->price;
                            if ($orders->variants_id != '') {
                            $itemprice = $orders->variants_price;
                            }
                            @endphp
                            <tr>
                                <td><img src="{{ helper::image_path($orders->item_image) }}" class="rounded-3 object-fit-cover hw-50" alt=""></td>
                                <td>{{ $orders->item_name }}
                                    @if ($orders->variants_id != '')
                                    - <small>{{ $orders->variants_name }}</small>
                                    @endif
                                    @if ($orders->extras_id != '')
                                    <?php
                                    $extras_id = explode(',', $orders->extras_id);
                                    $extras_name = explode(',', $orders->extras_name);
                                    $extras_price = explode(',', $orders->extras_price);
                                    $extras_total_price = 0;
                                    ?>
                                    <br>
                                    @foreach ($extras_id as $key => $addons)
                                    <small>
                                        <b class="text-muted">{{ $extras_name[$key] }}</b> :
                                        {{ helper::currency_formate($extras_price[$key], $getorderdata->vendor_id) }}<br>
                                    </small>
                                    @php
                                    $extras_total_price += $extras_price[$key];
                                    @endphp
                                    @endforeach
                                    @else
                                    @php
                                    $extras_total_price = 0;
                                    @endphp
                                    @endif
                                </td>
                                <td class="text-end">
                                    {{ helper::currency_formate($itemprice, $getorderdata->vendor_id) }}
                                    @if ($extras_total_price > 0)
                                    <br> <small class="text-muted"> +
                                        {{ helper::currency_formate($extras_total_price, $getorderdata->vendor_id) }}</small>
                                    @endif
                                </td>
                                <td class="text-end">{{ $orders->qty }}</td>
                                <td class="text-end">
                                    {{ helper::currency_formate(($itemprice + $extras_total_price) * $orders->qty, $getorderdata->vendor_id) }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600">{{ trans('labels.sub_total') }}</strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600">{{ helper::currency_formate($getorderdata->sub_total, $getorderdata->vendor_id) }}</strong>
                                </td>
                            </tr>
                            @if ($getorderdata->discount_amount > 0)
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600">{{ trans('labels.discount') }}</strong>{{ $getorderdata->couponcode != '' ? '(' . $getorderdata->couponcode . ')' : '' }}
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600">{{ helper::currency_formate($getorderdata->discount_amount, $getorderdata->vendor_id) }}</strong>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600">{{ trans('labels.tax') }}</strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600">{{ helper::currency_formate($getorderdata->tax, $getorderdata->vendor_id) }}</strong>
                                </td>
                            </tr>
                            @if ($getorderdata->order_type == 1)
                            <tr>
                                <td class="text-end border-0" colspan="4">
                                    <strong class="fw-600">{{ trans('labels.delivery_charge') }}
                                        ({{ $getorderdata->delivery_area }}) </strong>
                                </td>
                                <td class="text-end border-0">
                                    <strong class="fw-600">{{ helper::currency_formate($getorderdata->delivery_charge, $getorderdata->vendor_id) }}</strong>
                                </td>
                            </tr>
                            @endif
                            <tr >
                                <td class="text-end text-success border-0" colspan="4">
                                    <strong class="fs-5">{{ trans('labels.grand_total') }}</strong>
                                </td>
                                <td class="text-end text-success border-0">
                                    <strong class="fs-5">{{ helper::currency_formate($getorderdata->grand_total, $getorderdata->vendor_id) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
