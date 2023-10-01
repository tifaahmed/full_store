@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
            <div class="d-flex">
                @include('admin.layout.breadcrumb')
            </div>
        </div>
       
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/roles/'.$role->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            
                                @foreach ($permissions as $key => $group_by)
                                    {{$key}}
                                    <div class="form-group row ">
                                        @foreach ($group_by as $permission)
                                            <div class="form-group my-2 col-md-2">
                                                <input class="form-check-input" type="checkbox" value="{{$permission->name}}"
                                                name="permission_names[]" id="{{$permission->name}}" 
                                                @checked(
                                                    isset($permission->roles)&&
                                                    $permission['roles']->where('id',$role->id)->first()
                                                )>
                                                <label class="form-check-label" for="{{$permission->name}}">
                                                    <span class="fw-600">
                                                        {{$permission->action}} 
                                                    </span>
                                                </label>
                                            </div>     
                                        @endforeach
                                    </div>

                                @endforeach
                               
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/categories') }}" class="btn btn-danger btn-cancel m-1">{{
                                    trans('labels.cancel') }}</a>
                                <button class="btn btn-success btn-succes m-1 " @if (env('Environment') == 'sendbox') type="button"
                                    onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save')
                                    }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection