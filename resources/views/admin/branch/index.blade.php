@extends('admin.layout.default')
@section('content')
<style>
    td{
        text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left'}}  !important;    
    }
</style>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2">{{ trans('labels.branches') }}</h5>
        <div class="d-flex">
        @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="d-flex justify-content-end">
            <a href="{{ URL::to('admin/branches/add') }}" class="btn-add"><i
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
                                <td>{{ trans('labels.name') }}</td>
                                <td>{{ trans('labels.active') }}</td>
                                <td>{{ trans('labels.delivery') }}</td>
                                <td>{{ trans('labels.address') }}</td>
                                <td>{{ trans('labels.action') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($branches as $branch)
                                <tr class="fs-7">
                                    <td>@php echo $i++ @endphp</td>
                                    <td>{{ $branch->name }}</td>                                           
                                    <td>{{ $branch->is_active ? 'true' : 'false' }}</td>                                           
                                    <td>{{ isset($branch->deliveryarea['name']) ? $branch->deliveryarea['name'] : ''  }}</td>                                           
                                    <td>{{ $branch->address }}</td>                                           
                                    <td>
                                        <a href="{{ URL::to('admin/branches/edit/' . $branch->id) }}"
                                            class="btn btn-sm btn-info btn-size" 
                                            tooltip="{{trans('labels.edit')}}"> 
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a @if (env('Environment') == 'sendbox') onclick="myFunction()" 
                                        @else onclick="statusupdate('{{ URL::to('admin/branches/delete/' . $branch->id) }}')" 
                                        @endif
                                            class="btn btn-sm btn-danger btn-size" tooltip="{{trans('labels.delete')}}">
                                            <i class="fa-regular fa-trash"></i></a>
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
