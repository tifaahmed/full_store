@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h5 class="pages-title fs-2">{{ trans('labels.pricing_plans') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end align-items-center">
                @if (Auth::user()->type == '1')
                    <a href="{{ URL::to('admin/plan/add') }}" class="btn-add"> <i
                            class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }} </a>
                @endif
            </div>
        </div>
    </div>
  
    <div class="row mb-7">
        @if (count($allplan) > 0)
            @foreach ($allplan as $plandata)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mt-3">
                    <div class="card box-shadow border-0 h-100 text-dark plancard">
                        <div class="card-body">
                            <div class="mb-4">
                                <h1 class="mb-4 plan-price">{{ helper::currency_formate($plandata->price, '') }}
                                    <span class="per-month">/
                                        @if ($plandata->plan_type == 1)
                                            @if ($plandata->duration == 1)
                                                {{ trans('labels.one_month') }}
                                            @elseif($plandata->duration == 2)
                                                {{ trans('labels.three_month') }}
                                            @elseif($plandata->duration == 3)
                                                {{ trans('labels.six_month') }}
                                            @elseif($plandata->duration == 4)
                                                {{ trans('labels.one_year') }}
                                            @elseif($plandata->duration == 5)
                                                {{ trans('labels.lifetime') }}
                                            @endif
                                        @endif
                                        @if ($plandata->plan_type == 2)
                                            {{ $plandata->days }}
                                            {{ $plandata->days > 1 ? trans('labels.days') : trans('labels.day') }}
                                        @endif

                                    </span>
                                </h1>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{ $plandata->name }}</h4>
                                </div>
                                <small class="text-muted line-limit-3">{{ Str::limit($plandata->description, 150) }}</small>
                            </div>
                            <hr>
                            <ul>
                                @php $features = explode('|', $plandata->features); @endphp
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2">
                                        {{ $plandata->order_limit == -1 ? trans('labels.unlimited') : $plandata->order_limit }}
                                        {{ $plandata->order_limit > 1 || $plandata->order_limit == -1 ? trans('labels.products') : trans('labels.product') }}
                                    </span>
                                </li>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2">
                                        {{ $plandata->appointment_limit == -1 ? trans('labels.unlimited') : $plandata->appointment_limit }}
                                        {{ $plandata->appointment_limit > 1 || $plandata->appointment_limit == -1 ? trans('labels.orders') : trans('labels.order') }}
                                    </span>
                                </li>
                                @php
                                    $themes = [];
                                    if ($plandata->themes_id != '' && $plandata->themes_id != null) {
                                        $themes = explode(',', $plandata->themes_id);
                                } @endphp
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                    <span class="mx-2">{{ count($themes) }}
                                        {{ count($themes) > 1 ? trans('labels.themes') : trans('labels.theme') }}</span>
                                </li>
                                @if ($plandata->coupons == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.coupons') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->custom_domain == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.custome_domain_available') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->google_analytics == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.google_analytics_available') }}</span>
                                    </li>
                                @endif

                                @if ($plandata->vendor_app == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.vendor_app_available') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->blogs == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.blogs') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->social_logins == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.social_login') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->sound_notification == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.sound_notification') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->whatsapp_message == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.whatsapp_message') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->telegram_message == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.telegram_message') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->pos == 1)
                                    <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-success "></i>
                                        <span class="mx-2">{{ trans('labels.pos') }}</span>
                                    </li>
                                @endif
                                @if ($plandata->tableqr == 1)
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
                        <div class="card-footer bg-white border-top-0 my-2 text-center d-flex justify-content-between align-items-center">

                        


                                @if (Auth::user()->type == '1')
                                        <div>

                                            <a href="{{ URL::to('admin/plan/edit-' . $plandata->id) }}" class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> 
                                                <i class="fa-regular fa-pen-to-square "></i> </a>
                                            @if (env('Environment') == 'sendbox')
                                                <a onclick="myFunction()"> <i class="fa-regular fa-trash"></i></a>
                                            @else
                                                <a
                                                    onclick="statusupdate('{{ URL::to('admin/plan/delete-' . $plandata->id) }}')" tooltip="{{trans('labels.delete')}}" class="btn btn-sm btn-danger btn-size">
                                                    <i class="fa-regular fa-trash"></i></a>
                                            @endif
                                        </div>
                                    @endif  




                            @if (Auth::user()->type == '1')
                                @if (env('Environment') == 'sendbox')
                                    @if ($plandata->is_available == 1)
                                        <a onclick="myFunction()"
                                            class="btn btn-success  btn-sm w-50 mt-2 rounded-5">{{ trans('labels.active') }}</a>
                                    @elseif ($plandata->is_available == 2)
                                        <a onclick="myFunction()"
                                            class="btn btn-danger w-50 btn-sm mt-2 rounded-5">{{ trans('labels.inactive') }}</a>
                                    @endif
                                @else
                                    @if ($plandata->is_available == 1)
                                        <a onclick="statusupdate('{{ URL::to('admin/plan/status_change-' . $plandata->id . '/2') }}')"
                                            class="btn btn-success  btn-sm w-50 mt-2 rounded-5">{{ trans('labels.active') }}</a>
                                    @elseif ($plandata->is_available == 2)
                                        <a onclick="statusupdate('{{ URL::to('admin/plan/status_change-' . $plandata->id . '/1') }}')"
                                            class="btn btn-danger w-50 btn-sm mt-2 rounded-5">{{ trans('labels.inactive') }}</a>
                                    @endif
                                @endif
                            @else
                                @if (Auth::user()->plan_id == $plandata->id)
                                    @php
                                        $check_vendorplan = helper::checkplan(Auth::user()->id, '');
                                        $data = json_decode(json_encode($check_vendorplan), true);
                                        
                                    @endphp
                                  
                                    @if (@$data['original']['status'] == '2')
                                        @if ($plandata->price > 0)
                                            @if (@$plandata->duration == 5)
                                                <small
                                                    class="text-success d-block fw-500 text-start"><span>{{ @$data['original']['plan_message'] }}</span></small>
                                            @else
                                                @if (@$data['original']['plan_date'] > date('Y-m-d'))
                                                    <small
                                                        class="text-dark d-block fw-500 text-start">{{ @$data['original']['plan_message'] }}
                                                        : <span
                                                            class="text-success">{{$data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']):'' }}</span>
                                                        </small>
                                                  
                                                @else
                                                    <small
                                                        class="text-dark d-block fw-500 text-start">{{ @$data['original']['plan_message'] }}
                                                        : <span
                                                            class="text-danger">{{$data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) : ''}}</span>
                                                        </small>
                                                  
                                                @endif
                                            @endif

                                            @if (@$data['original']['showclick'] == 1)
                                                <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                                    class="btn btn-sm d-block mt-2 bg-success text-white rounded-5 px-3">{{ trans('labels.subscribe') }}</a>
                                            @endif
                                        @else
                                            @if (@$data['original']['plan_date'] > date('Y-m-d'))
                                                <small class="text-dark d-block fw-500 text-start">{{ @$data['original']['plan_message'] }}
                                                    <span class="text-success">
                                                        {{$data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']):'' }}
                                                    </span>
                                                </small>
                                                <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                                    class="btn btn-sm d-block bg-success text-white rounded-5 px-3">{{ trans('labels.subscribe') }}</a>
                                            @else
                                                <small class="text-dark d-block fw-500 text-start">{{ @$data['original']['plan_message'] }}
                                                    <span class="text-danger">
                                                        {{$data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) :'' }}</span>
                                                </small>
                                                <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                                    class="btn btn-sm d-block bg-success text-white rounded-5 px-3">{{ trans('labels.subscribe') }}</a>
                                            @endif
                                        @endif
                                    @elseif(@$data['original']['status'] == '1')
                                        @if (@$plandata->duration == 5)
                                            <small class="text-dark fw-500 text-start"><span>
                                                    {{ @$data['original']['plan_message'] }}
                                                </span>
                                            </small>
                                        @else
                                            @if ($data['original']['plan_date'] != '')
                                                <small class="text-dark fw-500 text-start">
                                                    {{ @$data['original']['plan_message'] }}: <span
                                                        class="text-success">{{ $data['original']['plan_date'] !="" ? helper::date_format($data['original']['plan_date']) : ''}}</span>
                                                </small>
                                                <div class="d-flex justify-content-end w-100">
                                                    <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                                        class="btn btn-sm bg-success text-white rounded-5 px-3 d-block">
                                                        {{ trans('labels.subscribe') }}
                                                    </a>
                                                </div>
                                            @else
                                                <small
                                                    class="text-success">{{ @$data['original']['plan_message'] }}</small>
                                                <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                                    class="btn btn-sm bg-success text-white rounded-5 px-3 d-block">{{ trans('labels.subscribe') }}</a>
                                            @endif
                                        @endif
                                    @else
                                        -
                                    @endif
                                @else
                                    @if ($plandata->price > 0)
                                    <div class="d-flex justify-content-end w-100">
                                        <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                            class="btn btn-sm bg-success text-white rounded-5 px-3 d-block">{{ trans('labels.subscribe') }}</a>
                                    </div>
                                    @elseif ((float) Auth::user()->purchase_amount > $plandata->price)
                                        <small class="text-danger d-block fw-500 text-start">{{ trans('labels.already_used') }}</small>
                                    @else
                                    <div class="d-flex justify-content-end w-100">
                                        <a href="{{ URL::to('admin/plan/selectplan-' . $plandata->id) }}"
                                            class="btn btn-sm bg-success text-white rounded-5 px-3 d-block">{{ trans('labels.subscribe') }}</a>
                                    </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @include('admin.layout.no_data')
        @endif
    </div>

@endsection
