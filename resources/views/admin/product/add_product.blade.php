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
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 form-group">
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
                                <div class="col-12 form-group">
                                    <label class="form-label">{{ trans('labels.name') }} <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" placeholder="{{ trans('labels.name') }}" required>
                                    @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label">{{ trans('labels.tax') }} <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control numbers_only" name="tax" value="{{ old('tax') > 0 ? old('tax') : 0 }}" placeholder="{{ trans('labels.tax') }}" required>
                                    @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group mt-2">
                                    <label class="form-label">{{ trans('labels.description') }} <span class="text-danger"> * </span></label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ trans('labels.description') }}" required>{{ old('description') }}</textarea>
                                    @error('description')
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
                        <div class="col-md-7">
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
                                        <label class="col-form-label">{{ trans('labels.price') }} <span class="text-danger"> * </span></label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.variation') }} <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control variation" name="variation[]" placeholder="{{ trans('labels.variation') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.price') }} <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only variation_price" name="variation_price[]" placeholder="{{ trans('labels.price') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.original_price') }} <span class="text-danger"> * </span></label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[]" placeholder="{{ trans('labels.original_price') }}">
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" onclick="variation_fields('{{ trans('labels.variation') }}','{{ trans('labels.price') }}','{{ trans('labels.original_price') }}')"><i class="fa-sharp fa-solid fa-plus"></i> </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="more_variation_fields"></div>
                            <div class="card-header bg-transparent px-0"> {{ trans('labels.extras') }} </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.name') }}</label>
                                        <input type="text" class="form-control" name="extras_name[]" placeholder="{{ trans('labels.name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ trans('labels.price') }}</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only" name="extras_price[]" placeholder="{{ trans('labels.price') }}">
                                             <!--  for rtl use this class (me-2) -->
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" onclick="extras_fields('{{ trans('labels.name') }}','{{ trans('labels.price') }}')"><i class="fa-sharp fa-solid fa-plus"></i> </button>

                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="more_extras_fields"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/products') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button class="btn btn-success btn-succes m-1" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
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