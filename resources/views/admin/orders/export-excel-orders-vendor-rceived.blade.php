{{-- <table class="table table-striped table-bordered py-3 zero-configuration w-100"> --}}
<table class="table table-striped table-bordered py-3  w-100">
        <thead>
        <tr class="fw-500 py-3">
            <td style="font-size: 18px;font-weight: 700;height: 40px;height: 40px;">
                {{ trans('labels.srno') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                {{ trans('labels.order_number') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                {{ trans('labels.customer_mobile') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                {{ trans('labels.customer_name') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:180px">
                {{ trans('labels.date_time') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                {{ trans('labels.grand_total') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                {{ trans('labels.payment_type') }}
            </td>
            <td style="font-size: 18px;font-weight: 700;height: 40px;width:150px">
                {{ trans('labels.status') }}
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $orderdata)
        <tr class="fs-7">

            {{-- srno --}}
            <td style="height: 40px;">
                {{++$key}}
            </td>

            {{-- order_number --}}
            <td> 
                <a class="text-dark fw-700" href="{{ URL::to('admin/orders/invoice/'.$orderdata->order_number) }}"> 
                    #{{ $orderdata->order_number }} 
                </a>
            </td>

            {{--  customer_number --}}
            <td> 
                    {{ $orderdata->mobile }} 
            </td>

            {{-- customer_name --}}
            <td> 
                    {{ $orderdata->customer_name }} 
            </td>

            {{-- date_time --}}
            <td>
                @if($orderdata->order_type == 3)
                    {{  $orderdata->created_at_date_format }}
                @else
                    {{ $orderdata->delivery_date_format }} <br>
                    {{ $orderdata->delivery_time }}
                @endif
            </td>
            <td>{{ helper::currency_formate($orderdata->grand_total, Auth::user()->id) }}</td>
            <td>
                
                {{$orderdata->payment_type_name}}

                @if (in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10]))
                : {{ $orderdata->payment_id }}
                @endif
            </td>
            <td style="width: 120px">
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

