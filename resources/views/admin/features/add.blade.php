@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.add_new') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{URL::to('/admin/features/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.title')}}<span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="{{trans('labels.title')}}" required>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.description')}}<span class="text-danger"> * </span></label>
                                <textarea class="form-control" name="description"  placeholder="{{trans('labels.description')}}" rows="5" required>{{old('description')}}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.image')}}<span class="text-danger"> * </span></label>
                                <input type="file" class="form-control" name="image"  placeholder="{{trans('labels.image')}}" required>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            </div>
                        </div>
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/features') }}"
                                class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-success btn-succes m-1">{{ trans('labels.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection