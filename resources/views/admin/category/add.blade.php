@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.add_new') }}</h5>
            <div class="d-flex">
                @include('admin.layout.breadcrumb')
            </div>
        </div>

    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/categories/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="category_name"
                                        value="{{ old('category_name') }}" placeholder="{{ trans('labels.name') }}" required>
                                </div>
                                @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ trans('labels.image') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="category_image"
                                        value="{{ old('category_image') }}" placeholder="{{ trans('labels.image') }}" required>
                                </div>
                                @error('category_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/categories') }}" class="btn btn-danger btn-cancel m-1">{{
                                    trans('labels.cancel') }}</a>
                                <button class="btn btn-success btn-succes m-1" @if (env('Environment') == 'sendbox') type="button"
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