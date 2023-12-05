@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

<div class="breadcrumb-sec desk-only">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2">{{trans('labels.orders')}}</h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">  {{trans('labels.home')}}</a></li>

                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.orders')}}</li>

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

<!-- Orders section end -->




<section class="bg-light mt-0 py-5  pull-section-up">

    <div class="container">

        <div class="row">

            @include('front.theme.user_sidebar')

            <div class="col-md-12 pg-none col-lg-9">

                <div class="card shadow border-0 rounded-5">

                    <div class="card-body py-4">

                        <h2 class="page-title mb-2 px-3">{{trans('labels.orders')}}</h2>

                        <p class="page-subtitle px-3 mb-0 line-limit-2"></p>

                        <!-- data table start -->





                        @if(count($getorders) > 0)

                        <div class="table-responsive py-4 px-3">

                            <table id="example" class="table table-striped table-bordered zero-configuration">

                                <thead>

                                    <tr>

                                        <th>{{ trans('labels.srno') }}</th>

                                            <th>{{ trans('labels.order_number') }}</th>

                                            <th>{{ trans('labels.date') }}</th>

                                            <th>{{ trans('labels.grand_total') }}</th>

                                            <th>{{ trans('labels.payment_type') }}</th>

                                            <th>{{ trans('labels.status') }}</th>

                                            <th>{{ trans('labels.action') }}</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @php $i = 1; @endphp

                                    @foreach ($getorders as $orderdata)

                                    <tr >

                                        <td>@php echo $i++; @endphp</td>

                                        <td>

                                            <a href="{{ URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number) }}">

                                                {{ $orderdata->order_number }}

                                            </a>

                                        </td>

                                        <td>{{ helper::date_format($orderdata->created_at) }}</td>

                                        <td>{{ helper::currency_formate($orderdata->grand_total, $orderdata->vendor_id) }}</td>

                                        <td>

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

                                            @if (in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10]))

                                            : {{ $orderdata->payment_id }}

                                            @endif

                                        </td>

                                        <td>
                                           
                                            @if ($orderdata->status == '1')

                                            <span class="text-warning"> <i class="fa-regular fa-bell"></i>

                                                {{ trans('labels.placed') }}</span>

                                            @elseif($orderdata->status == '2')

                                            <span class="text-info"> <i class="fa-solid fa-list-check"></i>

                                                {{ trans('labels.preparing') }}</span>

                                            @elseif($orderdata->status == '3')

                                            <span class="text-danger"> <i class="fa-regular fa-circle-xmark"></i>

                                                {{ trans('labels.cancelled_by_you') }}</span>

                                            @elseif($orderdata->status == '4')

                                            <span class="text-danger"> <i class="fa-regular fa-circle-xmark"></i>

                                                {{ trans('labels.cancelled_by_user') }}</span>

                                            @elseif($orderdata->status == '5')

                                            <span class="text-success"> <i class="fa-solid fa-check"></i>

                                                {{ trans('labels.delivered') }}</span>

                                            @else

                                            --

                                            @endif

                                        </td>

                                        <td>



                                            <a class="btn btn-sm btn-light eye-icon-box p-0 " href="{{ URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number) }}">

                                                <i class="fa-regular fa-eye"></i>

                                            </a>

                                        </td>



                                    </tr>

                                    @endforeach

                                    

                                    

                                </tbody>

                            </table>

                        </div>



                        @else

                                @include('front.nodata')

                        @endif







                        <!-- data table end -->

                    </div>

                </div>

            </div>

        </div>

    </div>
    @include('front.theme.footer-bar')

</section>

<!-- Orders section end -->

<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

    <i class="fa-solid fa-bars-staggered text-white"></i>

    <span class="px-2">{{ trans('labels.account_menu') }}</span>

</button>

@endsection