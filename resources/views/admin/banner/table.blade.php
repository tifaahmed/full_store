<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.image') }}</td>
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($getbannerlist as $banner)
        <tr class="fs-7">
            <td>@php echo $i++; @endphp</td>
            <td><img src="{{ helper::image_path($banner->banner_image) }}" class="img-fluid rounded hw-50 object-fit-cover" alt="">
            </td>
            <td>
                <a href="{{ URL::to('admin/banner/edit-' . $banner->id) }}" class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"><i
                        class="fa-regular fa-pen-to-square"></i></a>
                <a href="javascript:void(0)" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else
                    onclick="deletedata('{{ URL::to('admin/banner/delete-' . $banner->id) }}')" @endif
                    class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}"> <i class="fa-regular fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>