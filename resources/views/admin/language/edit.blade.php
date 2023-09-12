@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.languages') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card border-0 my-3">
            <div class="card-body">
                <form action="{{ URL::to('/admin/language-settings/update-' . $getlanguage->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label">{{trans('labels.layout')}}</label>
                                <select name="layout" class="form-control layout-dropdown" id="layout">
                                    <option value="" selected>{{trans('labels.select')}}</option>
                                    <option value="1"{{ $getlanguage->layout == "1" ? 'selected' : '' }} >{{ trans('labels.ltr') }}</option>
                                    <option value="2"{{ $getlanguage->layout == "2" ? 'selected' : '' }} >{{ trans('labels.rtl') }}</option>
                                </select>
                                @error('layout') <br><span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label">{{trans('labels.image')}}</label>
                                <input type="file" class="form-control" name="image">
                                @error('image') <br><span class="text-danger">{{ $message }}</span> @enderror
                                <img src="{{ helper::image_path($getlanguage->image) }}" class="img-fluid rounded-3 object-fit-cover hw-50 mt-3" alt="">
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="form-label"
                                    for="">{{ trans('labels.default') }} </label>
                                <input id="default-switch" type="checkbox"
                                    class="checkbox-switch" name="default" value="1"
                                    {{ $getlanguage->is_default == 1 ? 'checked' : '' }}>
                                <label for="default-switch" class="switch">
                                    <span class="{{session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'}}"><span
                                            class="switch__circle-inner"></span></span>
                                    <span class="switch__left {{session()->get('direction') == 2 ? 'pe-2' : 'ps-2'}}">{{ trans('labels.off') }}</span>
                                    <span class="switch__right {{session()->get('direction') == 2 ? 'ps-2' : 'pe-2'}}">{{ trans('labels.on') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{URL::to('admin/language-settings')}}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
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