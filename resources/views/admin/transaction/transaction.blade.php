@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.transaction') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <form action="{{ URL::to('/admin/transaction') }} " method="get">
                <div class="input-group ps-0 justify-content-end gap-2">
                    @if (Auth::user()->type == 1)
                        <select class="form-select transaction-select rounded-5" name="vendor">
                            <option value=""
                                data-value="{{ URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                selected>{{ trans('labels.select') }}</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"
                                    data-value="{{ URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                    {{ request()->get('vendor') == $vendor->id ? 'selected' : '' }}>
                                    {{ $vendor->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    <div class="input-group-append col-auto pb-2">
                        <input type="date" class="form-control rounded-5 px-4 bg-white mb-0" name="startdate"
                            value="{{ request()->get('startdate') }}">
                    </div>
                    <div class="input-group-append col-auto pb-2">
                        <input type="date" class="form-control rounded-5 px-4 bg-white mb-0" name="enddate"
                            value="{{ request()->get('enddate') }}">
                    </div>
                    <div class="input-group-append pb-2">
                        <button class="btn btn-primary rounded-5 px-4" type="submit">{{ trans('labels.fetch') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="fw-500">
                                    <td>{{ trans('labels.srno') }}</td>
                                    @if (Auth::user()->type == '1')
                                        <td>{{ trans('labels.name') }}</td>
                                    @endif
                                    <td>{{ trans('labels.plan_name') }}</td>
                                    <td>{{ trans('labels.amount') }}</td>
                                    <td>{{ trans('labels.payment_type') }}</td>
                                    <td>{{ trans('labels.purchase_date') }}</td>
                                    <td>{{ trans('labels.expire_date') }}</td>
                                    <td>{{ trans('labels.status') }}</td>
                                    @if (Auth::user()->type == '1')
                                        <td>{{ trans('labels.action') }}</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    
                                    $i = 1;
                                    
                                @endphp
                                @foreach ($transaction as $transaction)
                                    <tr class="fs-7">
                                        <td>@php echo $i++; @endphp</td>
                                        @if (Auth::user()->type == '1')
                                            <td>{{ $transaction['vendor_info']->name }}</td>
                                        @endif
                                        <td>{{ $transaction['plan_info']->name }}</td>
                                        <td>{{ helper::currency_formate($transaction->amount, '') }}</td>
                                        <td>
                                            @if ($transaction->payment_type == 'banktransfer')
                                                {{ trans('labels.' . $transaction->payment_type) }}
                                                : <small><a href="{{ helper::image_path($transaction->screenshot) }}"
                                                        target="_blank"
                                                        class="text-danger">{{ trans('labels.click_here') }}</a></small>
                                            @elseif($transaction->payment_type != '')
                                                {{-- payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10 --}}
                                                @if ($transaction->payment_type == 1)
                                                    {{ trans('labels.offline') }}
                                                @endif
                                                @if ($transaction->payment_type == 2)
                                                    {{ trans('labels.razorpay') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 3)
                                                    {{ trans('labels.stripe') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 4)
                                                    {{ trans('labels.flutterwave') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 5)
                                                    {{ trans('labels.paystack') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 7)
                                                    {{ trans('labels.mercadopago') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 8)
                                                    {{ trans('labels.paypal') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 9)
                                                    {{ trans('labels.myfatoorah') }} : {{ $transaction->payment_id }}
                                                @endif
                                                @if ($transaction->payment_type == 10)
                                                    {{ trans('labels.toyyibpay') }} : {{ $transaction->payment_id }}
                                                @endif
                                            @elseif($transaction->amount == 0)
                                                -
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->payment_type == 'banktransfer')
                                                @if ($transaction->status == 2)
                                                    <span
                                                        class="badge bg-success">{{ helper::date_format($transaction->purchase_date) }}</span>
                                                @else
                                                    -
                                                @endif
                                            @else
                                                <span
                                                    class="badge bg-success">{{ helper::date_format($transaction->purchase_date) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->payment_type == 'banktransfer')
                                                @if ($transaction->status == 2)
                                                    <span
                                                        class="badge bg-danger">{{$transaction->expire_date != "" ? helper::date_format($transaction->expire_date) :'-'}}</span>
                                                @else
                                                    -
                                                @endif
                                            @else
                                                <span
                                                    class="badge bg-danger">{{ $transaction->expire_date != "" ? helper::date_format($transaction->expire_date) : '-' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->payment_type == 'banktransfer')
                                                @if ($transaction->status == 1)
                                                    <span class="badge bg-warning">{{ trans('labels.pending') }}</span>
                                                @elseif ($transaction->status == 2)
                                                    <span class="badge bg-success">{{ trans('labels.accepted') }}</span>
                                                @elseif ($transaction->status == 3)
                                                    <span class="badge bg-danger">{{ trans('labels.rejected') }}</span>
                                                @else
                                                    -
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        @if (Auth::user()->type == '1')
                                            <td>
                                                @if ($transaction->payment_type == 'banktransfer')
                                                    @if ($transaction->status == 1)
                                                        <a class="btn btn-sm btn-outline-success"
                                                            onclick="statusupdate('{{ URL::to('admin/transaction-' . $transaction->id . '-2') }}')" tooltip="{{trans('labels.accept')}}"><i
                                                                class="fas fa-check"></i></a>
                                                        <a class="btn btn-sm btn-outline-danger"
                                                            onclick="statusupdate('{{ URL::to('admin/transaction-' . $transaction->id . '-3') }}')" tooltip="{{trans('labels.cancel')}}"><i
                                                                class="fas fa-close"></i></a>
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
