@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center">
            <div class="col-12">
                <h5 class="pages-title fs-2">{{trans('labels.edit')}}</h5>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{URL::to('admin/cities')}}">{{trans('labels.cities')}}</a></li>
                    <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}" aria-current="page">{{trans('labels.edit')}}</li>
                </ol>
            </nav>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <form action="{{URL::to('admin/cities/update-'.$editcity->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label">{{trans('labels.city')}}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="name" value="{{$editcity->name}}" placeholder="{{trans('labels.city')}}" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span> 
                                 @enderror
                                </div>
                                
                                <div class="form-group text-end">
                                    <a href="{{ URL::to('admin/cities') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                                    <button class="btn btn-success btn-succes m-1" @if(env('Environment')=='sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@endsection