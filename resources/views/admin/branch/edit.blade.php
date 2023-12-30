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
                    <form action="{{ URL::to('admin/branches/update/' . $branch->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ trans('labels.name_ar') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="name[ar]"
                                    value="{{ old('name.ar')?? ( isset( $branch->getTranslations('name')['ar'] ) ? $branch->getTranslations('name')['ar'] : ''  ) }}" 
                                    placeholder="{{ trans('labels.name_ar') }}" required>
                                    @error('name.ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">{{ trans('labels.name_en') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="name[en]"
                                    value="{{ old('name.en')?? ( isset( $branch->getTranslations('name')['en'] ) ? $branch->getTranslations('name')['ar'] : ''  ) }}" 
                                    placeholder="{{ trans('labels.name_en') }}" required>
                                    @error('name.en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="form-label">{{trans('labels.delivery')}}<span class="text-danger"> * </span></label>
                                    <select name="deliveryarea_id" class="form-select" required>
                                        <option value="">{{trans('labels.select')}}</option>
                                        @foreach($deliveryAreas as $key => $deliveryArea)
                                            <option value="{{$key}}"  
                                            @selected($branch->deliveryarea_id == $key)>
                                                {{$deliveryArea}}  
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('deliveryarea_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>

                                <div class="col-md-6 form-group">
                                    {{trans('labels.is_active')}}
                                    <input id="checkbox-switch" type="checkbox" 
                                    class="checkbox-switch" name="is_active" 
                                    value="1"  {{ $branch->is_active  ? 'checked' : '' }}>
        
                                    <label for="checkbox-switch" class="switch">
                                        <span class="{{ session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle' }}">
                                            <span class="switch__circle-inner"></span>
                                        </span>
                                        <span class="switch__left {{ session()->get('direction') == 2 ? 'pe-2' : 'ps-2' }}">
                                            {{ trans('labels.off') }}
                                        </span>
                                        <span class="switch__right {{ session()->get('direction') == 2 ? 'ps-2' : 'pe-2' }}">
                                            {{ trans('labels.on') }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <a href="{{ URL::to('admin/area') }}" class="btn btn-danger btn-cancel m-1">{{
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