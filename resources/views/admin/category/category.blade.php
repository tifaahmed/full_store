@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2">{{ trans('labels.category') }}</h5>
                <div class="d-flex">
                @include('admin.layout.breadcrumb')
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-end">
                    <a href="{{ URL::to('admin/categories/add') }}" class="btn-add"><i
                            class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}</a>
                </div>
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
                                        <td>{{ trans('labels.image') }}</td>
                                        <td>{{ trans('labels.category') }}</td>
                                        <td>{{ trans('labels.status') }}</td>
                                        <td>{{ trans('labels.action') }}</td>
                                    </tr>
                                </thead>
                                <tbody id="tabledetails" data-url="{{url('admin/categories/reorder_category')}}">
                                    @php $i=1; @endphp
                                    @foreach ($allcategories as $category)
                                        <tr class="fs-7 row1" id="dataid{{$category->id}}" data-id="{{$category->id}}">
                                            <td>@php echo $i++ @endphp</td>
                                            <td><img src="{{url(env('ASSETSPATHURL').'admin-assets/images/category/'.$category->image)}}" alt="" width="50" class="img-fluid rounded hw-50 object-fit-cover"></td>
                                            <td>{{ $category->name }}</td>
                                            
                                            <td>
                                                @if ($category->is_available == '1')
                                                    <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/categories/change_status-' . $category->slug . '/2') }}')" @endif
                                                        class="btn btn-sm btn-success btn-size" tooltip="{{trans('labels.active')}}"><i class="fas fa-check"></i></a>
                                                @else
                                                    <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/categories/change_status-' . $category->slug . '/1') }}')" @endif
                                                        class="btn btn-sm btn-danger btn-xmark" tooltip="{{trans('labels.in_active')}}"><i class="fas fa-close"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('admin/categories/edit-' . $category->slug) }}"
                                                    class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> <i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/categories/delete-' . $category->slug) }}')" @endif
                                                    class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}"> <i
                                                        class="fa-regular fa-trash"></i></a>
                                            </td>
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
