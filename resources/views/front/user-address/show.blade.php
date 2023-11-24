@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{ trans('labels.favorites') }}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{ trans('home') }}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{ trans('labels.favorites') }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end -->
<!-- Favorites Section end -->
<section class="bg-light mt-0 py-5">
    <div class="container">
        <div class="row">
            @include('front.theme.user_sidebar')
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3">{{ trans('labels.favourites') }}</h2>
                        @if (count($getfavoritelist) > 0)
                        <div class="row g-3 products-img ">
                            @foreach ($getfavoritelist as $itemdata)
                            @php
                            if(@$itemdata['item_image']->image_name != null )
                            {
                            $image = @$itemdata['item_image']->image_name;
                            }
                            else{
                            $image = $itemdata->image;
                            }
                            @endphp
                            

                            <div class="col-6 col-lg-4">
                                <div class="card h-100 position-relative">
                                    <div class="overflow-hidden theme1grid_image">
                                        <img src="@if( @$itemdata['item_image']->image_url != null ) {{ @$itemdata['item_image']->image_url }} @else {{ helper::image_path($itemdata->image) }} @endif" alt="" class="p-2 p-md-3 rounded-5" onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}')">
                                    </div>
                                    <div class="card-body p-2 p-md-3 pb-0 pb-md-3">
                                        @if(Auth::user() && Auth::user()->type == 3)
                                        <div class="favorite-icon set-fav1-{{ $itemdata->id }}">
                                            <a href="javascript:void(0)" onclick="removefavorite('{{$storeinfo->id}}','{{ $itemdata->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}')"><i class="fa-solid fa-heart"></i></a>
                                        </div>
                                        @endif


                                        <a href="javascript:void(0)" class="title pb-1" onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}')">{{$itemdata->item_name}}</a>
                                        <small class="d_sm_none">{{$itemdata->description}}</small>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                                        <div class="row justify-content-between align-items-center gx-0">
                                            <div class="col-9 col-md-4 mb-2 mb-md-0">
                                                <p class="price">
                                                    {{ helper::currency_formate($itemdata->item_price, @$storeinfo->id) }}
                                                </p>
                                                @if($itemdata->item_original_price != null)
                                                <del>{{ helper::currency_formate($itemdata->item_original_price, @$storeinfo->id) }}</del>
                                                @endif
                                            </div>
                                            <div class="col-3 col-md-8 d-flex justify-content-end mb-2 mb-md-0">
                                                @if($itemdata->has_variants == 1)
                                                <button class="btn-primary product-cart-icon" type="button" onclick="showitems('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}')">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                @else
                                                <div class="load showload-{{$itemdata->id}}" style="display:none"></div>
                                                <button class="btn-primary product-cart-icon addcartbtn-{{$itemdata->id}}" type="button" onclick="addtocart('{{ $itemdata->id }}','{{$itemdata->item_name}}','{{$itemdata->item_price}}','{{$image}}','{{$itemdata->tax}}','1','{{$itemdata->item_price}}')">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="d-flex justify-content-center align-items-center m-auto mt-4">
                                <nav aria-label="Page navigation example">
                                    @if ($getfavoritelist->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="page-item {{ ($getfavoritelist->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link {{session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'}}" href="{{ $getfavoritelist->url(1) }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $getfavoritelist->lastPage(); $i++)
                                            <li class="page-item  {{ ($getfavoritelist->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $getfavoritelist->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li class="page-item {{ ($getfavoritelist->currentPage() == $getfavoritelist->lastPage()) ? ' disabled' : '' }}">
                                                <a class="page-link {{session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'}}" href="{{ $getfavoritelist->url($getfavoritelist->currentPage()+1) }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                    </ul>
                                    @endif
                                </nav>
                            </div>





                        </div>
                        @else
                        @include('front.nodata')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Favorites Section end -->
<!-- Account menu button Start -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2">{{ trans('labels.account_menu') }}</span>
</button>
<!-- Account menu button End -->
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection