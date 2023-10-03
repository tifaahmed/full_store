@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2">{{ trans('labels.roles') }}</h5>
                <div class="d-flex">
                @include('admin.layout.breadcrumb')
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
                                        <td>{{ trans('labels.id') }}</td>
                                        <td>{{ trans('labels.name') }}</td>
                                        <td>{{ trans('labels.action') }}</td>
                                    </tr>
                                </thead>
                                <tbody id="tabledetails" >
                                    @foreach ($roles as $role)
                                        <tr class="fs-7 row1" id="dataid{{$role->id}}" data-id="{{$role->id}}">
                                            <td>{{$role->id}}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/roles/'.$role->id.'/edit') }}"
                                                    class="btn btn-sm btn-info btn-size" tooltip="{{trans('labels.edit')}}"> 
                                                    <i class="fa-regular fa-pen-to-square"></i>
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
