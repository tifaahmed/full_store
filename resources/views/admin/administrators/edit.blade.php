@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>

    <div class="row mb-7">

        <div class="card border-0 box-shadow mb-3">

            <div class="card-body">

                <form action="{{ URL::to('admin/administrators/'.$user->id.'/update') }}" method="POST"
                enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                </span></label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                placeholder="{{ trans('labels.name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">{{ trans('labels.email') }}<span class="text-danger"> *
                                </span></label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="{{ trans('labels.email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <div class="form-group">
                                <label class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="number" class="form-control" name="mobile" value="{{ $user->mobile }}" 
                                    placeholder="{{ trans('labels.mobile') }}"
                                    required>
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label">{{ trans('labels.password') }}<span class="text-danger"> * </span></label>
                            <input type="password" class="form-control" name="password" 
                            id="password" placeholder="{{ trans('labels.password') }}">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
 
  
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/users') }}"
                                class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-success btn-succes m-1">{{ trans('labels.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        var areaurl = "{{ URL::to('admin/getarea') }}";
        var select = "{{ trans('labels.select') }}";
        var areaid = "{{ $getuserdata->area_id }}";
    </script>
    <script src="{{ url('storage/app/public/admin-assets/js/user.js') }}"></script>
@endsection
