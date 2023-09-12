<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
    <tr class="fw-500">
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.image') }}</td>
            <td>{{ trans('labels.title') }}</td>
            <td>{{ trans('labels.description') }}</td>
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($blog as $item)
            <tr class="fs-7">
                <td>@php
                    echo $i++;
                @endphp</td>
                <td>
                    <img src="{{ helper::image_path($item->image) }}" class="img-fluid rounded-3 hw-50 object-fit-cover" alt=""></td>
                <td>{{ $item->title }}</td>
                <td>{!! Str::limit($item->description, 100) !!}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ URL::to('admin/blogs/edit-'.$item->slug)}}" class="btn btn-sm btn-info btn-size mx-2" tooltip="{{trans('labels.edit')}}"> <i
    
                                class="fa-regular fa-pen-to-square"></i></a>
    
                        <a href="javascript:void(0)" @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{URL::to('admin/blogs/delete-'.$item->slug)}}')" @endif class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}">
    
                            <i class="fa-regular fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
