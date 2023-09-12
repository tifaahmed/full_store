@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
        </div>
        @include('admin.layout.breadcrumb')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/banner/update-' . $getbannerdata->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="form-label">{{ trans('labels.image') }} <span
                                        class="text-danger"> * </span></label>
                                <input type="file" class="form-control" name="image" required>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                                <img src="{{ helper::image_path($getbannerdata->banner_image) }}"
                                    class="img-fluid rounded-3 hw-70 object-fit-cover" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/banner') }}" class="btn btn-danger btn-cancel m-1">{{
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