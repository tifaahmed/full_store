{{-- <table class="table table-striped table-bordered py-3 zero-configuration w-100"> --}}
<table class="table table-striped table-bordered py-3  w-100">
        <thead>
        <tr class="fw-500 py-3">
            <td>{{ trans('labels.srno') }}</td>
            @if(request()->is('admin/customers*') && (Auth::user()->type == 1))
            <td>{{ trans('labels.vendor_title') }}</td>
            @endif
            <td>{{ trans('labels.order_number') }}</td>
            <td>{{ trans('labels.date_time') }}</td>
            <td>{{ trans('labels.grand_total') }}</td>
            <td>{{ trans('labels.payment_type') }}</td>
            <td>{{ trans('labels.status') }}</td>
            @if (Auth::user()->type == 2)
            <td>{{ trans('labels.action') }}</td>
            @endif
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getorders as $orderdata)
        <tr id="dataid{{ $orderdata->id }}" class="fs-7">
            <td>@php echo $i++; @endphp</td>
            @if(request()->is('admin/customers*') && (Auth::user()->type == 1))
            <td>{{ $orderdata['vendorinfo']->name }}</td>
            @endif
            <td> 
                <a class="text-dark fw-700" href="{{ URL::to('admin/orders/invoice/' . $orderdata->order_number) }}"> #{{ $orderdata->order_number }} </a>
            </td>
            <td>
                @if($orderdata->order_type == 3)
                    {{  helper::date_format($orderdata->created_at) }}
                @else
                    {{ helper::date_format($orderdata->delivery_date) }} <br>
                    {{ $orderdata->delivery_time }}
                @endif

            </td>
            <td>{{ helper::currency_formate($orderdata->grand_total, Auth::user()->id) }}</td>
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
                @elseif ($orderdata->payment_type == 0)
                {{ trans('labels.online') }}
                @endif
                @if (in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10]))
                : {{ $orderdata->payment_id }}
                @endif
            </td>
            <td>
                @if ($orderdata->status == 1)
                @php
                $status = trans('labels.pending');
                $color = 'warning';
                @endphp
                @elseif ($orderdata->status == 2)
                @php
                $status = trans('labels.accepted');
                $color = 'info';
                @endphp
                @elseif ($orderdata->status == 3)
                @php
                $status = trans('labels.rejected');
                $color = 'danger';
                @endphp
                @elseif ($orderdata->status == 4)
                @php
                $status = trans('labels.cancelled');
                $color = 'danger';
                @endphp
                @elseif ($orderdata->status == 5)
                @php
                $status = trans('labels.completed');
                $color = 'success';
                @endphp
                @endif
                <span class="badge bg-{{ $color }}" tooltip="{{ $status }}">{{ $status }}</span>
            </td>
            @if (Auth::user()->type == 2)
            <td>
                @if(Auth::user()->type == 2)
                <a href="{{ URL::to('admin/orders/print/' . $orderdata->order_number) }}" class="btn btn-sm btn-success btn-success btn-size" tooltip="{{ trans('labels.print') }}">
 
                    <i class="fa-solid fa-print"></i>
                </a>
                @endif
                <a class="btn btn-sm btn-dark btn-size" tooltip="{{ trans('labels.view') }}" href="{{ URL::to('admin/orders/invoice/' . $orderdata->order_number) }}">    <i class="fa-regular fa-eye"></i> 
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

