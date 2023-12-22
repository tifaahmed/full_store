@extends('admin.layout.default')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.payment_settings') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>

</div>
<div class="row g-3 mb-7">

    @php
        $payment_array = ['myfatoorah,mercado_pago','paypal','toyyibpay'];
    @endphp

    @foreach ($getpayment as $key => $pmdata)
        
        @php
            $transaction_type = strtolower($pmdata->payment_name);
            $image_tag_name = $transaction_type . '_image';
        @endphp

        <div class="col-md-12 col-lg-12 col-xl-6 {{ $transaction_type == 'cod' && Auth::user()->type == 1 ? 'd-none' : '' }} 
            {{ $transaction_type == 'banktransfer' && Auth::user()->type == 2 ? 'd-none' : '' }}">
            <form action="{{ URL::to('admin/payment/update') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="transaction_type" value="{{ $pmdata->id }}">

                <div class="card h-100">

                    <div class="card-header bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ helper::image_path($pmdata->image) }}" alt="" 
                                class="img-fluid rounded me-2" height="30" width="30">
                            </div>
                            <div>
                                <input id="checkbox-switch-{{$transaction_type}}" type="checkbox" 
                                class="checkbox-switch" name="is_available" 
                                value="1" {{ $pmdata->is_available == 1 ? 'checked' : '' }}>

                                <label for="checkbox-switch-{{$transaction_type}}" class="switch">
                                    <span class="{{ session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle' }}">
                                        <span class="switch__circle-inner"></span>
                                    </span>
                                    <span class="switch__left {{ session()->get('direction') == 2 ? 'pe-2' : 'ps-2' }}">
                                        {{ trans('labels.off') }}
                                    </span>
                                    <span class="switch__right {{ session()->get('direction') == 2 ? 'ps-2' : 'pe-2' }}">
                                        {{ trans('labels.on') }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            @if(!in_array($transaction_type,['cod']))

                            @if ($transaction_type == 'banktransfer')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_name" class="form-label"> 
                                        {{ trans('labels.bank_name') }} <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="bank_name" class="form-control" 
                                    name="bank_name" placeholder="{{ trans('labels.bank_name') }}" 
                                    value="{{$pmdata->bank_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_holder_name" class="form-label"> 
                                        {{ trans('labels.account_holder_name') }} <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="account_holder_name" class="form-control" 
                                    name="account_holder_name" placeholder="{{ trans('labels.account_holder_name') }}" 
                                    value="{{$pmdata->account_holder_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number" class="form-label"> 
                                        {{ trans('labels.account_number') }} <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="account_number" class="form-control" 
                                    name="account_number" placeholder="{{ trans('labels.account_number') }}" 
                                    value="{{$pmdata->account_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_ifsc_code" class="form-label"> 
                                        {{ trans('labels.bank_ifsc_code') }} <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="bank_ifsc_code" class="form-control" 
                                    name="bank_ifsc_code" placeholder="{{ trans('labels.bank_ifsc_code') }}" 
                                    value="{{$pmdata->bank_ifsc_code}}">
                                </div>
                            </div>

                            @else

                            <div class="col-md-6">
                                <label for="razorpaycurrency" class="form-label">
                                    {{trans('labels.environment')}}
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" 
                                        name="environment" id="sandbox-{{$transaction_type}}" 
                                        value="1" {{ $pmdata->environment == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sandbox-{{$transaction_type}}">
                                            {{trans('labels.sandbox')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mx-3">
                                        <input class="form-check-input" type="radio" 
                                        name="environment" id="production-{{$transaction_type}}" 
                                        value="2" {{ $pmdata->environment == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="production-{{$transaction_type}}">
                                            {{trans('labels.production')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency" class="form-label"> {{trans('labels.currency')}} 
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="currency" class="form-control" 
                                    name="currency" placeholder="Currency" 
                                    value="{{$pmdata->currency}}">
                                </div>
                            </div>

                            @if($transaction_type == 'flutterwave')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="encryption_key" class="form-label">
                                        {{trans('labels.encryption_key')}}
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" id="encryption_key" class="form-control" 
                                    name="encryption_key" placeholder="Encryption Key" 
                                    value="{{$pmdata->encryption_key}}" {{$transaction_type == 'flutterwave' ? 'required' : ''}}>
                                </div>
                            </div>
                            @endif

                            <div class=" {{ $transaction_type == 'mercadopago' || $transaction_type == 'myfatoorah' ? 'col-md-12' : 'col-md-6' }}">
                                <div class="form-group">
                                    <label for="secretkey" class="form-label">
                                        {{trans('labels.secret_key')}}
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" required="" id="secretkey" class="form-control" 
                                    name="secret_key" placeholder="Secret Key" 
                                    value="{{$pmdata->secret_key}}">
                                </div>
                            </div>
                            <div class="col-md-6 {{ $transaction_type == 'mercadopago' || $transaction_type == 'myfatoorah' ? 'd-none' : '' }}">
                                <div class="form-group">
                                    <label for="publickey" class="form-label">
                                        {{trans('labels.public_key')}}
                                        <span class="text-danger"> *</span></label>
                                    <input type="text" id="publickey" class="form-control" 
                                    name="public_key" placeholder="Public Key" 
                                    value="{{$pmdata->public_key}}" 
                                    {{ $transaction_type != 'mercadopago' || $transaction_type != 'myfatoorah' ? 'required' : '' }}>
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">
                                        {{trans('labels.image')}}
                                    </label>
                                    <input type="file" class="form-control" name="image">
                                    <img src="{{ helper::image_path($pmdata->image) }}" alt="" class="img-fluid rounded hw-50">
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-end">
                                <div class="form-group text-end">
                                    <button class="btn btn-success btn-succes m-1" @if (env('Environment')=='sendbox' ) 
                                    type="button" onclick="myFunction()" @else type="submit" @endif>
                                        {{ trans('labels.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endforeach

</div>

@endsection

@section('scripts')
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/payment.js') }}"></script>
@endsection