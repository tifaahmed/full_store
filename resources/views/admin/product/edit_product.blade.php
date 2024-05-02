@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
</div>
<div class="row mb-7">
    <div class="col-md-12">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                @if (!empty($getproductdata))
                <form action="{{ URL::to('admin/products/update-' . $getproductdata->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.item_name') }} ar<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="item_name[ar]" 
                            value="{{ old('item_name.ar') ?? ( isset($getproductdata->getTranslations('item_name')['ar']) ? $getproductdata->getTranslations('item_name')['ar'] :null ) }}"
                            placeholder="{{ trans('labels.item_name') }} ar" required>
                            @if($errors->has('item_name.ar'))
                            <div class="alert alert-danger">{{$errors->first('item_name.ar')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.item_name') }} en<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="item_name[en]" 
                            value="{{ old('item_name.en') ?? ( isset($getproductdata->getTranslations('item_name')['en']) ? $getproductdata->getTranslations('item_name')['en'] :null ) }}"
                             placeholder="{{ trans('labels.item_name') }} en" required>
                            @if($errors->has('item_name.en'))
                            <div class="alert alert-danger">{{$errors->first('item_name.en')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.description') }} ar <span class="text-danger"> * </span></label>
                            <textarea name="description[ar]" class="form-control" rows="3" placeholder="{{ trans('labels.description') }} ar" required>{{ 
                                old('description.ar') ?? ( isset($getproductdata->getTranslations('description')['ar']) ? $getproductdata->getTranslations('description')['ar'] :null )
                            }}</textarea>
                            @if($errors->has('description.ar'))
                            <div class="alert alert-danger">{{$errors->first('description.en')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6 form-group">
                            <label class="form-label">{{ trans('labels.description') }} en<span class="text-danger"> * </span></label>
                            <textarea name="description[en]" class="form-control" rows="3" placeholder="{{ trans('labels.description') }}en" required>{{ 
                                old('description.en') ?? ( isset($getproductdata->getTranslations('description')['en']) ? $getproductdata->getTranslations('description')['en'] :null )
                            }}</textarea>
                            @if($errors->has('description.en'))
                            <div class="alert alert-danger">{{$errors->first('description.en')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">{{ trans('labels.category') }} <span class="text-danger"> * </span></label>
                            <select class="form-select" name="category" id="editcat_id" required>
                                <option value="">{{ trans('labels.select') }}</option>
                                @foreach ($getcategorylist as $catdata)
                                <option value="{{ $catdata->id }}" data-id="{{ $catdata->id }}" {{ $getproductdata->cat_id == $catdata->id ? 'selected' : '' }}>
                                    {{ $catdata->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6 form-group">
                            <label class="form-label">{{ trans('labels.tax') }}<span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="tax" value="{{ $getproductdata->tax }}" placeholder="{{ trans('labels.tax') }}" required>
                            @error('tax')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        

                        <div class="col-md-12 form-group">
                            without time 
                            <input id="checkbox-switch" type="checkbox" 
                            class="checkbox-switch" name="remove_time" 
                            value="1" {{ !$getproductdata->start_time  ? 'checked' : '' }}>

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
                        <div class="col-md-6 form-group">
                            <label class="form-label">{{ trans('labels.start_time') }} </label>
                            <input type="time" class="form-control" name="start_time" value="{{ $getproductdata->start_time }}"   >
                            @error('start_time')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">{{ trans('labels.end_time') }} </label>
                            <input type="time" class="form-control" name="end_time" value="{{ $getproductdata->end_time }}"  >
                            @error('end_time')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="row align-items-center">
                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="has_variants" class="col-form-label">
                                            {{ trans('labels.product_has_variation') }}
                                        </label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="no" value="2" checked @if ($getproductdata->has_variants == 2) checked @endif>
                                                <label class="form-check-label" for="no">{{ trans('labels.no') }}</label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="yes" value="1" @if ($getproductdata->has_variants == 1) checked @endif>
                                                <label class="form-check-label" for="yes">{{ trans('labels.yes') }}</label>
                                            </div>
                                            @error('has_variants')
                                            <br><span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if ($getproductdata->has_variants == 1 && count($getproductdata['variation']) > 0)
                                <div class="col-md-12 col-lg-12 col-xl-6 d-flex justify-content-end mb-3 mb-xl-0">
                                    <button class="btn-add border-0 @if ($getproductdata->has_variants == 2) dn @endif" type="button" 
                                        onclick="edititem_fields(
                                            '{{ trans('labels.variation_ar') }}',
                                            '{{ trans('labels.variation_en') }}',
                                            '{{ trans('labels.price') }}',
                                            '{{ trans('labels.original_price') }}'
                                        );">
                                            {{ trans('labels.add_variation') }}
                                            <i class="fa-sharp fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                @endif
                            </div>
                            <div class="row @if ($getproductdata->has_variants == 1) dn @endif mt-4" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            {{ trans('labels.price') }} 
                                            <span class="text-danger"> * </span>
                                        </label>
                                        <input type="text" class="form-control numbers_only" name="price" 
                                        value="{{ $getproductdata->item_price }}" 
                                        placeholder="{{ trans('labels.price') }}" id="price">
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ trans('labels.original_price') }}</label>
                                        <input type="text" class="form-control numbers_only" name="original_price" value="{{ $getproductdata->item_original_price > 0 ? $getproductdata->item_original_price : 0 }}" placeholder="{{ trans('labels.original_price') }}" id="original_price">
                                        @error('original_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="@if ($getproductdata->has_variants == 2) dn @endif mt-4" id="variations">
                                @forelse ($getproductdata['variation'] as $ky => $variation)
                                <div class="row" id="del-{{ $variation->id }}">
                                    <input type="hidden" class="form-control" id="variation_id" 
                                    name="variation_id[{{ $ky }}]" value="{{ $variation->id }}">
                                    
                                    <div class="col-md-6 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            @if ($ky == 0)
                                                <label for="variation" class="col-form-label">
                                                    {{ trans('labels.variation_ar') }}
                                                    <span class="text-danger">*</span> 
                                                </label>
                                            @endif
                                            <input type="text" class="form-control variation" name="variation[{{ $ky }}][ar]" 
                                            placeholder="{{ trans('labels.variation') }}"  required 
                                            value="{{ old('variation.'.$ky.'.ar') ?? ( isset($variation->getTranslations('name')['ar']) ? $variation->getTranslations('name')['ar'] :null ) }}"
                                            >
                                            @if ($errors->has('variation.' . $ky))
                                                <span class="text-danger">{{ $errors->first('variation.' . $ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            @if ($ky == 0)
                                                <label for="variation" class="col-form-label">{{ trans('labels.variation_en') }}
                                                    <span class="text-danger">*</span> 
                                                </label>
                                            @endif
                                            <input type="text" class="form-control variation" name="variation[{{ $ky }}][en]" 
                                            placeholder="{{ trans('labels.variation') }}" required 
                                            value="{{ old('variation.'.$ky.'.en') ?? ( isset($variation->getTranslations('name')['en']) ? $variation->getTranslations('name')['en'] :null ) }}"
                                            >
                                            @if ($errors->has('variation.' . $ky))
                                                <span class="text-danger">{{ $errors->first('variation.' . $ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            @if ($ky == 0)
                                            <label for="price" class="col-form-label">{{ trans('labels.price') }}
                                                <span class="text-danger">*</span> </label>
                                            @endif
                                            <input type="text" class="form-control numbers_only variation_price" name="variation_price[{{ $ky }}]" placeholder="{{ trans('labels.price') }}" required value="{{ $variation->price }}">
                                            @if ($errors->has('price.' . $ky))
                                            <span class="text-danger">{{ $errors->first('price.' . $ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3">
                                        <div class="form-group">
                                            @if ($ky == 0)
                                            <label for="original_price" class="col-form-label">{{ trans('labels.original_price') }}
                                                  </label>
                                            @endif
                                            <div class="d-flex">
                                                <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[{{ $ky }}]" placeholder="{{ trans('labels.original_price') }}" required value="{{ $variation->original_price }}">
                                                <a class="btn btn-danger ms-2 btn-sm rounded-5 pricebtn" type="button" 
                                                @if (env('Environment')=='sendbox' ) 
                                                    onclick="myFunction()" 
                                                @else 
                                                    onclick="deletedata('{{ URL::to('admin/products/delete/variation-' . $variation->id . '-' . $variation->item_id) }}')" 
                                                @endif 
                                                {{ count($getproductdata['variation']) == 1 ? 'disabled' : '' }}>
                                                    <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            @if ($errors->has('original_price.' . $ky))
                                            <span class="text-danger">{{ $errors->first('original_price.' . $ky) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                </div>
                                <span class="hiddencount d-none">{{ $ky }}</span>
                                @empty
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ trans('labels.variation_en') }}</label>
                                            <input type="text" class="form-control variation" name="variation[0][ar]" 
                                            placeholder="{{ trans('labels.variation_ar') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ trans('labels.variation_ar') }}</label>
                                            <input type="text" class="form-control variation" name="variation[0][ar]" 
                                            placeholder="{{ trans('labels.variation_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ trans('labels.price') }}</label>
                                            <input type="text" class="form-control numbers_only variation_price" name="variation_price[]" 
                                            placeholder="{{ trans('labels.price') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-form-label">{{ trans('labels.original_price') }}</label>
                                            <div class="d-flex">
                                                <input type="text" class="form-control numbers_only variation_original_price" 
                                                name="variation_original_price[]" placeholder="{{ trans('labels.original_price') }}" value="0">
                                                <button class="btn btn-success ms-2 btn-sm rounded-5" type="button" 
                                                onclick="edititem_fields(
                                                    '{{ trans('labels.variation_ar') }}',
                                                    '{{ trans('labels.variation_en') }}',
                                                    '{{ trans('labels.price') }}',
                                                    '{{ trans('labels.original_price') }}'
                                                );">
                                                    <i class="fa-sharp fa-solid fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                @endforelse
                                <div id="edititem_fields"></div>
                            </div>

                        </div>

                        <div class="border-bottom px-0 my-2 d-flex justify-content-between align-items-center">
                            <p class="fs-5">{{ trans('labels.extras') }}</p>
                            @if (count($getproductdata['extras']) > 0)
                            <button class="btn btn-sm btn-outline-info m-2 float-end @if ($getproductdata->has_variants == 2) dn @endif" type="button" 
                            onclick="more_editextras_fields(
                                '{{ trans('labels.name_ar') }}',
                                '{{ trans('labels.name_en') }}',
                                '{{ trans('labels.price') }}')
                            ">
                                {{ trans('labels.add_extras') }} 
                            <i class="fa-sharp fa-solid fa-plus"></i> </button>
                            @endif
                        </div>
                        @forelse ($getproductdata['extras'] as $key => $extras)
                        <div class="row">
                            <input type="hidden" class="form-control" name="extras_id[]" value="{{ $extras->id }}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if ($key == 0)
                                    <label class="col-form-label">{{ trans('labels.name_ar') }}</label>
                                    @endif
                                    <input type="text" class="form-control extras_name" name="extras_name[{{$key}}][ar]" 
                                    value="{{ old('extras_name.'.$key.'.ar') ?? ( isset($extras->getTranslations('name')['ar']) ? $extras->getTranslations('name')['ar'] :null ) }}"
                                    placeholder="{{ trans('labels.name_ar') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if ($key == 0)
                                    <label class="col-form-label">{{ trans('labels.name_en') }}</label>
                                    @endif
                                    <input type="text" class="form-control extras_name" name="extras_name[{{$key}}][en]" 
                                    value="{{ old('extras_name.'.$key.'.en') ?? ( isset($extras->getTranslations('name')['en']) ? $extras->getTranslations('name')['en'] :null ) }}"
                                    placeholder="{{ trans('labels.name_en') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if ($key == 0)
                                    <label class="col-form-label">{{ trans('labels.price') }}</label>
                                    @endif
                                    <div class="d-flex">
                                        <input type="text" class="form-control numbers_only extras_price" name="extras_price[]" 
                                        value="{{ $extras->price }}" placeholder="{{ trans('labels.price') }}" required>
                                        <button class="btn btn-danger ms-2 btn-sm rounded-5" type="button" 
                                        @if (env('Environment')=='sendbox' ) 
                                            onclick="myFunction()" 
                                        @else 
                                            onclick="deletedata('{{ URL::to('admin/products/delete/extras-' . $extras->id) }}')" 
                                        @endif>
                                        <i class=" fa-solid fa-trash" aria-hidden="true"></i> </button>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                        <span class="hiddenextrascount d-none">{{ $key }}</span>
                        @empty
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">{{ trans('labels.name_ar') }}</label>
                                    <input type="text" class="form-control extras_name" name="extras_name[0][ar]" placeholder="{{ trans('labels.name_ar') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">{{ trans('labels.name_en') }}</label>
                                    <input type="text" class="form-control extras_name" name="extras_name[0][en]" placeholder="{{ trans('labels.name_en') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">{{ trans('labels.price') }}</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control numbers_only extras_price" name="extras_price[]" placeholder="{{ trans('labels.price') }}">
                                        <button class="btn btn-success ms-2 btn-sm rounded-5" type="button" 
                                        onclick="more_editextras_fields(
                                            '{{ trans('labels.name_ar') }}',
                                            '{{ trans('labels.name_en') }}',
                                            '{{ trans('labels.price') }}'
                                        )">
                                            <i class="fa-sharp fa-solid fa-plus"></i> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        @endforelse
                        <div id="more_editextras_fields"></div>
                    </div>
                    <div class="row">
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/products') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button class="btn btn-success btn-succes m-1" type="submit" >
                                {{ trans('labels.save') }}
                            </button>
                        </div>
                    </div>
                </form>

                <button class="btn-add border-0 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#AddProduct"> {{ trans('labels.add')}} {{trans('labels.image') }}s <i class="fa-sharp fa-solid fa-plus"></i> </button>
        


                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-5 g-4">
                @if(count($getproductimage) > 0)
                    @foreach ($getproductimage as $productimage)
                    <div class="col">
                        <div class="card p-2">
                            <div class="overflow-hidden">
                                <img src="{{ helper::image_path($productimage->image) }}" class="img-fluid product-image rounded-3">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info btn-size" tooltip="Edit" 
                                onclick="imageview('{{ $productimage->id }}','{{ $productimage->image }}')">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                @if (count($getproductimage) > 1)
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-size" tooltip="Delete" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else onClick="deleteItemImage('{{ $productimage->id }}','{{ $getproductdata->id }}','{{ URL::to('admin/products/destroyimage') }}')" @endif>
                                    <i class="fa-solid fa-trash" aria-hidden="true"></i> </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
            @else
            @include('admin.layout.no_data')
            @endif
        </div>
    </div>
</div>
</div>

<!-- Add Item Image -->
<div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ URL::to('admin/products/storeimages') }}" name="addproduct" class="addproduct" id="addproduct" enctype="multipart/form-data">
            @csrf
            <span id="msg"></span>
            <input type="hidden" id="storeimagesurl" value="">
            <input type="hidden" name="itemid" id="itemid" value="{{ $getproductdata->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('labels.image') }} add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <span id="iiemsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">{{ trans('labels.image') }} <span class="text-danger">*</span></label>
                        <input type="file" multiple="true" class="form-control" name="file[]" id="file" accept="image/*" required="">
                    </div>
                    <div class="gallery"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-cancel m-1" data-bs-dismiss="modal">{{ trans('labels.close') }}</button>
                    <button class="btn btn-success btn-succes m-1" 
                    @if (env('Environment')=='sendbox' ) type="button" 
                        onclick="myFunction()" 
                    @else 
                    type="submit" 
                    @endif>
                        {{ trans('labels.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- EDIT PRODUCT IMAGE MODAL --}}
<div class="modal modal-fade-transform" id="editModal" tabindex="-1" aria-labelledby="editModallable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModallable">{{ trans('labels.image') }} <span class="text-danger"> * </span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=" {{ URL::to('admin/products/updateimage') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="item_id" name="id">
                    <input type="hidden" id="img_name" name="image">
                    <input type="file" name="product_image" class="form-control" id="" required>
                    @error('product_image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-succes m-1">{{ trans('labels.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/product.js') }}"></script>
@endsection