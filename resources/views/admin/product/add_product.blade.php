@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-6">
        <h5 class="pages-title fs-2">{{ trans('labels.add_new') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
</div>
<div class="row mb-7">
    <div class="col-12">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="{{ URL::to('admin/products/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.name_ar') }} <span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="item_name[ar]" value="{{ old('item_name.ar') }}" placeholder="{{ trans('labels.name_ar') }}" required>
                            @if($errors->has('item_name.ar'))
                            <div class="alert alert-danger">{{$errors->first('item_name.ar')}}</div>
                            @endif
                        </div>
                        {{ old('item_name.ar') }}
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.name_en') }} <span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="item_name[en]" value="{{ old('item_name.en') }}" placeholder="{{ trans('labels.name_ar') }}" required>
                            @if($errors->has('item_name.en'))
                            <div class="alert alert-danger">{{$errors->first('item_name.en')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.description_ar') }} <span class="text-danger"> * </span></label>
                            <textarea name="description[ar]" class="form-control" rows="3" placeholder="{{ trans('labels.description_ar') }}" required>{{ old('description.ar') }}</textarea>
                            @if($errors->has('description.ar'))
                            <div class="alert alert-danger">{{$errors->first('description.en')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.description_en') }} <span class="text-danger"> * </span></label>
                            <textarea name="description[en]" class="form-control" rows="3" placeholder="{{ trans('labels.description_en') }}" required>{{ old('description.en') }}</textarea>
                            @if($errors->has('description.en'))
                            <div class="alert alert-danger">{{$errors->first('description.en')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label">{{ trans('labels.category') }} <span class="text-danger"> * </span></label>
                                    <select class="form-select" name="category" id="cat_id" required>
                                        <option value="">{{ trans('labels.select') }}</option>
                                        @foreach ($getcategorylist as $catdata)
                                        <option value="{{ $catdata->id }}" data-id="{{ $catdata->id }}" {{ old('category') == $catdata->id ? 'selected' : '' }}>
                                            {{ $catdata->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="col-6 form-group">
                                    <label class="form-label">{{ trans('labels.tax') }} <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control numbers_only" name="tax" value="{{ old('tax') > 0 ? old('tax') : 0 }}" placeholder="{{ trans('labels.tax') }}" required>
                                    @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-12 form-group">
                                    without time 
                                    <input id="checkbox-switch" type="checkbox" 
                                    class="checkbox-switch" name="remove_time" 
                                    value="1"  >
        
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
                                <div class="col-6 form-group">
                                    <label class="form-label">{{ trans('labels.start_time') }}  </label>
                                    <input type="time" class="form-control" name="start_time" value="{{ old('start_time') }}" >
                                    @error('start_time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label class="form-label">{{ trans('labels.end_time') }}  </label>
                                    <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}">
                                    @error('end_time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label">{{ trans('labels.image') }} <span class="text-danger"> * </span></label>
                                    <input type="file" class="form-control" name="product_image[]" accept="image/*" id="image" multiple required>
                                    @error('product_image')
                                    <span class="text-danger">{{ $message }}</span> <br>
                                    @enderror
                                    <div class="gallery"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="has_variants" class="col-form-label">{{ trans('labels.product_has_variation') }}</label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="no" value="2" checked @if (old('has_variants')==2) checked @endif>
                                                <label class="form-check-label" for="no">{{ trans('labels.no') }}</label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="yes" value="1" @if (old('has_variants')==1) checked @endif>
                                                <label class="form-check-label" for="yes">{{ trans('labels.yes') }}</label>
                                            </div>
                                            @error('has_variants')
                                            <br><span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row dn mt-4 @if ($errors->has('variants_name.*') || $errors->has('variants_price.*')) dn @endif @if (old('variants') == 2) d-flex @endif" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.price') }}  </label>
                                        <input type="text" class="form-control numbers_only" name="price" value="{{ old('price') }}" placeholder="{{ trans('labels.price') }}" id="price">
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.original_price') }}
                                            <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="original_price" value="{{ old('original_price') }}" placeholder="{{ trans('labels.original_price') }}" id="original_price">
                                        @error('original_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 dn @if ($errors->has('variation.*') || $errors->has('variation_price.*') || old('has_variants') == 1) d-flex @endif" id="variations">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.variation_ar') }} 
                                            <span class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control variation" name="variation[0][ar]" 
                                        placeholder="{{ trans('labels.variation_ar') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.variation_en') }} 
                                            <span class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control variation" name="variation[0][en]" 
                                        placeholder="{{ trans('labels.variation_en') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.price') }} <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only variation_price" name="variation_price[]" placeholder="{{ trans('labels.price') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.original_price') }}  </label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[]" placeholder="{{ trans('labels.original_price') }}">
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" 
                                            onclick="variation_fields(
                                            '{{ trans('labels.variation_ar') }}',
                                            '{{ trans('labels.variation_en') }}',
                                            '{{ trans('labels.price') }}',
                                            '{{ trans('labels.original_price') }}'
                                            )">
                                                <i class="fa-sharp fa-solid fa-plus"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="more_variation_fields"></div>
                            
                        </div>
                        <div class="card-header bg-transparent px-0"> {{ trans('labels.extras') }} </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.name_ar') }}</label>
                                        <input type="text" class="form-control" name="extras_name[0][ar]" placeholder="{{ trans('labels.name_ar') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.name_en') }}</label>
                                        <input type="text" class="form-control" name="extras_name[0][en]" placeholder="{{ trans('labels.name_en') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.price') }}</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only" name="extras_price[]" placeholder="{{ trans('labels.price') }}">
                                             <!--  for rtl use this class (me-2) -->
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" 
                                            onclick="extras_fields('{{ trans('labels.name_ar') }}','{{ trans('labels.name_en') }}','{{ trans('labels.price') }}')">
                                                <i class="fa-sharp fa-solid fa-plus"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="more_extras_fields"></div>
                    </div>
                    <div class="row">
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/products') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button class="btn btn-success btn-succes m-1" @if (env('Environment')=='sendbox' ) type="button" 
                            onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/product.js') }}"></script>
@endsection