@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{trans('labels.search_products')}}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.search_products')}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end -->
<!-- Search Products section end -->
@if(count($getsearchitems) > 0)
    <section class="bg-light mt-0 py-5">
        <div class="container">
            <div class="row g-2 g-md-3 products-img" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <h3 class="page-title mb-1">{{trans('labels.search_products')}}</h3>
                <p class="page-subtitle line-limit-2 mt-0">
                
                </p>
                @foreach ($getsearchitems as $itemdata)
                    
                    @php 
                        if(@$itemdata['item_image']->image_name != null ) 
                        {
                            $image = @$itemdata['item_image']->image_name;
                        }
                        else{
                            $image = $itemdata->image;
                        }
                    @endphp
            
                <div class="col-6 col-lg-3 theme1grid">
                    <div class="card h-100 position-relative" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1000" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="overflow-hidden theme1grid_image">
                            <img src="@if( @$itemdata['item_image']->image_url != null ) {{ @$itemdata['item_image']->image_url }} @else {{ helper::image_path($itemdata->image) }} @endif" alt="" class="p-2 p-md-3" onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}','{{app()->getLocale()}}')">
                        </div>
                        <div class="card-body p-2 p-md-3 pb-0 pb-md-3">
                            @if(Auth::user() && Auth::user()->type == 3)
                                <div class="favorite-icon set-fav1-{{ $itemdata->id }}">
                                    @if ($itemdata->is_favorite == 1)
                                    <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $itemdata->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}')"><i class="fa-solid fa-heart"></i></a>
                                    @else
                                    <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $itemdata->id }}',1,'{{ URL::to($storeinfo->slug.'/managefavorite') }}')"><i class="fa-regular fa-heart"></i></a>
                                    @endif
                                </div>
                            @endif
                            <a href="javascript:void(0)" class="title pb-1" onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}','{{app()->getLocale()}}')">{{ $itemdata->item_name }}</a>
                            <small class="d_sm_none">{{$itemdata->description}}</small>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                            <div class="row justify-content-between align-items-center gx-0">
                                <div class="products-price col-9 mb-2 mb-md-0">
                                    <span class="price">{{ helper::currency_formate($itemdata->item_price,$storeinfo->id) }}</span>
                                    <del>{{ helper::currency_formate($itemdata->item_original_price,$storeinfo->id) }}</del>
                                </div>
                            <div class="col-3 d-flex justify-content-end mb-2 mb-md-0">          
                                                      
                                @if($itemdata->has_variants == 1)
    
                                <a class="btn-primary product-cart-icon"  onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}','{{app()->getLocale()}}')">
    
                                    <i class="fa-solid fa-cart-shopping"></i>
    
                                </a>
    
                                @else
    
                                <a class="btn-primary product-cart-icon"  onclick="addtocart('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}','{{$image}}','{{$itemdata->tax}}','1','{{$itemdata->item_price}}')">
    
                                    <i class="fa-solid fa-cart-shopping"></i>
    
                                </a>
    
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                
            </div>
        </div>
    </section>
@else
  @include('front.nodata')
@endif
<!-- Search Products section end -->
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection