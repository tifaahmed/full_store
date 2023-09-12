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
        <div class="card border-0 box-shadow mb-3">
            <div class="card-body">
                <form action="{{ URL::to('admin/register_vendor') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">{{ trans('labels.name') }}<span class="text-danger">
                                    * </span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="{{ trans('labels.name') }}" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="form-label">{{ trans('labels.email') }}<span class="text-danger"> * </span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="{{ trans('labels.email') }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile" class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>
                            <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="{{ trans('labels.mobile') }}" required>
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label">{{ trans('labels.password') }}<span class="text-danger"> * </span></label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="{{ trans('labels.password') }}" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city" class="form-label">{{ trans('labels.city') }}<span class="text-danger"> * </span></label>
                            <select name="city" class="form-select" id="city" required>
                                <option value="">{{trans('labels.select')}}</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="area" class="form-label">{{ trans('labels.area') }}<span class="text-danger"> * </span></label>
                            <select name="area" class="form-select" id="area" required>
                                <option value="">{{trans('labels.select')}}</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group text-center text-md-end">

                        <a href="{{ URL::to('admin/users') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>

                        <button class="btn btn-success btn-succes m-1" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var areaurl = "{{URL::to('admin/getarea')}}";
    var select = "{{trans('labels.select')}}";
    var areaid = '0';
</script>
<script src="{{ url(env('ASSETSPATHURL') . '/admin-assets/js/user.js') }}"></script>
@endsection