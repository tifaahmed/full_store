<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.coupon_name') }}</td>
            <td>{{ trans('labels.coupon_code') }}</td>
            <td>{{ trans('labels.amount') }}</td>
            <td>{{ trans('labels.start_date') }}</td>
            <td>{{ trans('labels.end_date') }}</td>
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php $i = 1;@endphp
        @foreach ($coupons as $ddata)
            <tr>
                <th>@php echo $i++;@endphp</th>
                <td>{{ $ddata->name }}</td>
                <td>{{ $ddata->code }}</td>
                <td>{{ helper::currency_formate($ddata->price, $ddata->vendor_id) }}</td>
                <td><span class="badge bg-success">{{ helper::date_format($ddata->active_from) }}</td>
                <td><span class="badge bg-danger mx-2">{{ helper::date_format($ddata->active_to) }}</span></td>
                <th>
                    <a class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}" data-original-title="" title=""
                        href="{{ URL::to('admin/coupons/edit-' . $ddata->id) }}"> <i
                            class="fa-regular fa-pen-to-square"></i> </a>
                    <a class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}"
                        @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="deletedata('{{ URL::to('admin/coupons/del-' . $ddata->id) }}')" @endif>
                        <i class="fa-regular fa-trash"></i> </a>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>