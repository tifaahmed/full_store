<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.area_name') }}</td>
            <td>{{ trans('labels.amount') }}</td>
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach ($getshippingarealist as $shippingarea)
            <tr class="fs-7">
                <td>@php echo $i++ @endphp</td>
                <td>{{ $shippingarea->name }}</td>
                <td>{{ helper::currency_formate($shippingarea->price, Auth::user()->id) }}</td>
                <td>
                    <a href="{{ URL::to('admin/shipping-area/show-' . $shippingarea->id) }}"
                        class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> <i class="fa-regular fa-pen-to-square"></i></a>
                    <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else  onclick="deletedata('{{ URL::to('admin/shipping-area/delete-' . $shippingarea->id) }}')" @endif
                        class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}"> <i class="fa-regular fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
