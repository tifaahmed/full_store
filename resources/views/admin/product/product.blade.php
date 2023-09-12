@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.products') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="{{ URL::to('admin/products/add') }}" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}
                </a>
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
                                    <td>{{ trans('labels.name') }}</td>
                                    <td>{{ trans('labels.price') }}</td>
                                    <td>{{ trans('labels.tax') }}</td>
                                    <td>{{ trans('labels.status') }}</td>
                                    <td>{{ trans('labels.action') }}</td>
                                </tr>
                            </thead>
                            <tbody id="tabledetails" data-url="{{url('admin/products/reorder_product')}}">
                                @php $i = 1; @endphp
                                @foreach ($getproductslist as $product)
                                    <tr class="fs-7 row1" id="dataid{{$product->id}}" data-id="{{$product->id}}">
                                        <td>@php echo $i++; @endphp</td>
                                        <td><img src="@if( @$product['item_image']->image_url != null ) {{ @$product['item_image']->image_url }} @else {{ helper::image_path($product->image) }} @endif"
                                                class="img-fluid rounded hw-50 object-fit-cover" alt=""> </td>
                                        <td>{{ $product['category_info']->name }}</td>
                                        <td>{{ $product->item_name }} <br> <small
                                                class="fw-bold text-muted">{{ $product->has_variants == 1 ? trans('labels.customizable') : '' }}</small>
                                        </td>
                                        <td>{{ helper::currency_formate($product->item_price, Auth::user()->id) }}</td>
                                        <td>{{ $product->tax }}%</td>
                                        <td>
                                            @if ($product->is_available == '1')
                                                <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/products/status-' . $product->slug . '/2') }}')" @endif
                                                    class="btn btn-sm btn-success btn-size" tooltip="{{trans('labels.active')}}"><i class="fas fa-check"></i></a>
                                            @else
                                                <a @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/products/status-' . $product->slug . '/1') }}')" @endif
                                                    class="btn btn-sm btn-danger btn-xmark" tooltip="{{trans('labels.in_active')}}"><i class="fas fa-close"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"
                                                href="{{ URL::to('admin/products/edit-' . $product->slug) }}"> <i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}"   
                                                @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/products/delete-' . $product->slug) }}')" @endif><i
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