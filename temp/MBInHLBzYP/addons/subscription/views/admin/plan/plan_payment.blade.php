@extends('admin.layout.default')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.pricing_plan') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-8 mb-3 payments">
        <div class="card border-0 box-shadow">
            <div class="card-header bg-transparent border-0 pt-3">
                <h5 class="px-2 text-dark mb">{{ trans('labels.payment_methods') }}</h5>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 mb-3 g-3">
                    @foreach ($paymentmethod as $pmdata)
                    @php
                    $payment_type = strtolower($pmdata->payment_name);
                    @endphp
                    <div class="col">
                        <label for="{{ $payment_type }}" class="form-control border mb-0 px-2 py-1 cursor-pointer">
                            <div class="card h-100 border-0">
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-text bg-transparent border-0 p-0">
                                            <input class="form-check-input mt-0" type="radio" value="{{ $pmdata->public_key }}" id="{{ $payment_type }}" data-transaction-type="{{ $payment_type }}" data-currency="{{ $pmdata->currency }}" @if ($payment_type=='banktransfer' ) data-bank-name="{{ $pmdata->bank_name }}" data-account-holder-name="{{ $pmdata->account_holder_name }}" data-account-number="{{ $pmdata->account_number }}" data-bank-ifsc-code="{{ $pmdata->bank_ifsc_code }}" @endif name="paymentmode">
                                        </div>
                                        <!-- <label for="{{ $payment_type }}" class="d-flex align-items-center form-control border-0"> -->
                                        <!-- </label> -->
                                        <div class="mx-3">
                                            <img src="{{ helper::image_path($pmdata->image) }}" class="hw-20 rounded-0" alt="" srcset="">
                                            <span class="px-1">{{ $pmdata->payment_name }}</span>
                                        </div>
                                    </div>
                                    @if ($payment_type == 'stripe')
                                    <input type="hidden" name="stripe_public_key" id="stripe_public_key" value="{{ $pmdata->public_key }}">
                                    <div class="stripe-form d-none pt-3">
                                        <div id="card-element"></div>
                                    </div>
                                    <div class="text-danger stripe_error"></div>
                                    @endif
                                </div>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    <span class="text-danger payment_error d-none">{{ trans('messages.select_atleast_one') }}</span>
                </div>
                <div class="d-flex justify-content-end">
                    <button @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="button" @endif class="btn btn-success btn-succes m-1 {{(env('Environment') == 'sendbox') ? '' : 'buy_now'  }} "> {{ trans('labels.checkout') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-3">
        <div class="card box-shadow border-0 h-100 text-dark plancard">
            <div class="card-body">
                <div class="mb-4">
                    <h1 class="mb-4 plan-price">{{ helper::currency_formate($plan->price, '') }}
                        <span class="per-month">/
                            @if ($plan->plan_type == 1)
                            @if ($plan->duration == 1)
                            {{ trans('labels.one_month') }}
                            @elseif($plan->duration == 2)
                            {{ trans('labels.three_month') }}
                            @elseif($plan->duration == 3)
                            {{ trans('labels.six_month') }}
                            @elseif($plan->duration == 4)
                            {{ trans('labels.one_year') }}
                            @elseif($plan->duration == 5)
                            {{ trans('labels.lifetime') }}
                            @endif
                            @endif
                            @if ($plan->plan_type == 2)
                            {{ $plan->days }}
                            {{ $plan->days > 1 ? trans('labels.days') : trans('labels.day') }}
                            @endif

                        </span>
                    </h1>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>{{ $plan->name }}</h4>
                    </div>
                    <small class="text-muted line-limit-3">{{ Str::limit($plan->description, 150) }}</small>
                </div>
                <hr>
                <ul>
                    @php $features = explode('|', $plan->features); @endphp
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">
                            {{ $plan->order_limit == -1 ? trans('labels.unlimited') : $plan->order_limit }}
                            {{ $plan->order_limit > 1 || $plan->order_limit == -1 ? trans('labels.products') : trans('labels.product') }}
                        </span>
                    </li>
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">
                            {{ $plan->appointment_limit == -1 ? trans('labels.unlimited') : $plan->appointment_limit }}
                            {{ $plan->appointment_limit > 1 || $plan->appointment_limit == -1 ? trans('labels.orders') : trans('labels.order') }}
                        </span>
                    </li>
                    @php
                    $themes = [];
                    if ($plan->themes_id != '' && $plan->themes_id != null) {
                    $themes = explode(',', $plan->themes_id);
                    } @endphp
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">{{ count($themes) }}
                            {{ count($themes) > 1 ? trans('labels.themes') : trans('labels.theme') }}</span>
                    </li>
                    @if ($plan->coupons == 1)
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">{{ trans('labels.coupons') }}</span>
                    </li>
                    @endif
                    @if ($plan->custom_domain == 1)
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">{{ trans('labels.custome_domain_available') }}</span>
                    </li>
                    @endif
                    @if ($plan->vendor_app == 1)
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">{{ trans('labels.vendor_app_available') }}</span>
                    </li>
                    @endif
                    @if ($plan->google_analytics == 1)
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2">{{ trans('labels.google_analytics_available') }}</span>
                    </li>
                    @endif

                    @if ($plan->blogs == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.blogs') }}</span>
                        </li>
                    @endif
                    @if ($plan->social_logins == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.social_login') }}</span>
                        </li>
                    @endif
                    @if ($plan->sound_notification == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.sound_notification') }}</span>
                        </li>
                    @endif
                    @if ($plan->whatsapp_message == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.whatsapp_message') }}</span>
                        </li>
                    @endif
                    @if ($plan->telegram_message == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.telegram_message') }}</span>
                        </li>
                    @endif
                    @if ($plan->pos == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.pos') }}</span>
                        </li>
                    @endif

                    @if ($plan->tableqr == 1)
                        <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                            <span class="mx-2">{{ trans('labels.tableqr') }}</span>
                        </li>
                    @endif


                    @foreach ($features as $feature)
                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                        <span class="mx-2"> {{ $feature }} </span>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    
</div>
<!-- Modal -->
<div class="modal fade" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalbankdetailsLabel">{{ trans('labels.banktransfer') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" action="{{ URL::to('admin/plan/buyplan') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="payment_type" id="modal_payment_type" class="form-control" value="">
                    <input type="hidden" name="plan_id" id="modal_plan_id" class="form-control" value="">
                    <input type="hidden" name="amount" id="modal_amount" class="form-control" value="">
                    <p> {{ trans('labels.bank_name') }} : <span class="data-bank-name"></span></p>
                    <p> {{ trans('labels.account_holder_name') }} : <span class="data-account-holder-name"></span></p>
                    <p> {{ trans('labels.account_number') }} : <span class="data-account-number"></span></p>
                    <p> {{ trans('labels.bank_ifsc_code') }} : <span class="data-bank-ifsc-code"></span></p>
                    <hr>
                    <div class="form-group col-md-12">
                        <label for="screenshot"> {{ trans('labels.screenshot') }} </label>
                        <div class="controls">
                            <input type="file" name="screenshot" id="screenshot" class="form-control  @error('screenshot') is-invalid @enderror" required>
                            @error('screenshot')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">{{ trans('labels.close') }}</button>
                    <button @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" type="submit" @endif class="btn btn-primary"> {{ trans('labels.save') }} </button>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="price" id="price" value="{{ $plan->price }}">
<input type="hidden" name="plan_id" id="plan_id" value="{{ $plan->id }}">
<input type="hidden" name="user_name" id="user_name" value="{{ Auth::user()->name }}">
<input type="hidden" name="user_email" id="user_email" value="{{ Auth::user()->email }}">
<input type="hidden" name="user_mobile" id="user_mobile" value="{{ Auth::user()->mobile }}">

<form action="{{ url('admin/plan/buyplan/paypalrequest') }}" method="post" class="d-none">
    {{ csrf_field() }}
    <input type="hidden" name="return" value="2">
    <input type="submit" class="callpaypal" name="submit">
</form>
@endsection
@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    var SITEURL = "{{ URL::to('') }}";
    var planlisturl = "{{ URL::to('admin/plan') }}";
    var buyurl = "{{ URL::to('admin/plan/buyplan') }}";
    var plan_name = "{{ $plan->name }}";
    var plan_description = "{{ $plan->description }}";
    var title = "{{ Str::limit(helper::appdata('')->website_title, 50) }}";
    var description = "Plan Subscription";
</script>
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/plan_payment.js') }}"></script>
@endsection