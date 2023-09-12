@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('admin/shipping-area/update-' . $shippingareadata->id) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.area_name') }}<span
                                            class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $shippingareadata->name }}"
                                        placeholder="{{ trans('labels.area_name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.amount') }}<span class="text-danger">
                                            * </span></label>
                                    <input type="text" class="form-control numbers_only" name="price"
                                        value="{{ $shippingareadata->price }}"
                                        placeholder="{{ trans('labels.amount') }}" required>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/shipping-area') }}"
                                    class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                                <button class="btn btn-success btn-succes m-1"
                                    @if (env('Environment') == 'sendbox') type="button"
                                onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection