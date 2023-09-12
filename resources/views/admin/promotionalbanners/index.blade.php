@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2">{{ trans('labels.promotional_banners') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
    <div class="col-12 col-md-8">
        <div class="d-flex justify-content-end">
            <a href="{{ URL::to('admin/promotionalbanners/add') }}" class="btn-add">
                <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}
            </a>
        </div>
    </div>
</div>
<div class="row mb-7">
    <div class="col-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
                        <thead>
                            <tr class="fw-500">
                                <td>{{ trans('labels.srno') }}</td>
                                <td>{{ trans('labels.image') }}</td>
                                <td>{{ trans('labels.vendor_title') }}</td>
                                <td>{{ trans('labels.action') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($getbannerlist as $banner)
                            <tr class="fs-7">
                                <td>@php
                                    echo $i++;
                                    @endphp</td>
                                <td>
                                    <img src="{{helper::image_path($banner->image)}}" class="hw-50 object-fit-cover rounded-3" alt="">
                                </td>
                                <td>{{$banner['vendor_info']->name}}</td>
                                <td>
                                    <a href="{{URL::to('admin/promotionalbanners/edit-'.$banner->id)}}" class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> 
                                        <i class="fa-regular fa-pen-to-square"></i></a>

                                    <a href="javascript:void(0)" @if (env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{URL::to('admin/promotionalbanners/delete-'.$banner->id)}}')" @endif class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}">
                                        <i class="fa-regular fa-trash"></i>
                                    </a>
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