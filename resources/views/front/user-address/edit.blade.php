@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{ trans('labels.my_addresses') }}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item">
                    <a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">
                        {{trans('labels.home')}}
                    </a>
                </li>
                <li class="breadcrumb-item  {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">
                    <a href="{{ URL::to($storeinfo->slug . '/user-address') }}" class="text-white">
                    {{ trans('labels.my_addresses') }}
                    </a>
                </li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}"
                    >
                    {{ trans('labels.edit') }}
                </li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
    </div>
</section>
<!-- breadcrumb end -->
<!-- Change Password section end -->
<section class="bg-light mt-0 py-5  pull-section-up">
    <div class="container">
        <div class="row">
            @include('front.theme.user_sidebar')
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3">{{ trans('labels.my_addresses') }}</h2>
                        <form action="{{ URL::to($storeinfo->slug . '/user-address/'.$address->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.is_active') }} 
                                    </label>
                                    <input type="checkbox" class="form-check-input form-check-input-secondary" name="is_active" 
                                    id="validationDefault" value="1" placeholder="{{ trans('labels.is_active') }} "  
                                    @checked(old('labels.is_active') || $address->is_active) >
                                    @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.title') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="title" 
                                    id="validationDefault" value="{{ old('labels.title') ?? $address->title }}" placeholder="{{ trans('labels.title') }} "  
                                    required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">
                                        {{ trans('labels.type') }}
                                    </label>
                                    <div>
                                        @foreach ($address_types as $key => $address_type)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input form-check-input-secondary" type="radio" name="type"
                                                id="{{$address_type['name']}}" value="{{$key}}" 
                                                {{ old('type') == $key || $address->type == $key  ? 'checked' : '' }} />
                                                <label for="{{$address_type['name']}}" class="form-check-label">
                                                    {{ trans('labels.'.$address_type['name']) }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.address') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <textarea class="form-control input-h" name="address" 
                                    id="validationDefault" placeholder="{{ trans('labels.address') }} "  
                                    required>{{ old('address')?? $address->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.house_num') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="house_num" 
                                    id="validationDefault" value="{{ old('house_num')?? $address->house_num }}" placeholder="{{ trans('labels.house_num') }} "  
                                    required>
                                    @error('house_num')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.block') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="block" 
                                    id="validationDefault" value="{{ old('block')?? $address->house_num }}" placeholder="{{ trans('labels.block') }} "  
                                    required>
                                    @error('block')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.pincode') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input type="number" class="form-control input-h" name="pincode" 
                                    id="validationDefault" value="{{ old('pincode')?? $address->pincode }}" placeholder="{{ trans('labels.pincode') }} "  
                                    required>
                                    @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.building') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="building" 
                                    id="validationDefault" value="{{ old('building')?? $address->building }}" placeholder="{{ trans('labels.building') }} "  
                                    required>
                                    @error('building')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.landmark') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="landmark" 
                                    id="validationDefault" value="{{ old('landmark')?? $address->landmark }}"
                                    placeholder="{{ trans('labels.landmark') }} "  
                                    required>
                                    @error('landmark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.street') }} 
                                        <span class="text-danger"> * </span>
                                    </label>
                                    <input class="form-control input-h" name="street" 
                                    id="validationDefault" value="{{ old('street')?? $address->street }}" 
                                    placeholder="{{ trans('labels.street') }} "  
                                    required>
                                    @error('street')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @include('maps.google_map',[
                                    'latitude'=>old('latitude')?? $address->latitude ,
                                    'longitude'=>old('longitude')?? $address->longitude
                                ])

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn-primary rounded-3 mobile-viwe-btn">{{ trans('labels.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.theme.footer-bar')

</section>
<!-- Change Password section end -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2">{{ trans('labels.account_menu') }}</span>
</button>
@endsection