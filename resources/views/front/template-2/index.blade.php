@extends('front.theme.default')
@section('content')
@if(count(helper::footer_features(@$storeinfo->id)) > 0 || (count($getcategory) > 0 && count($getitem) > 0) ||  count($bannerimage) > 0  || count($blogs) > 0)
<main>
    <!-- banner Section Start -->
    @if(helper::appdata($storeinfo->id)->banner != null)
    <section class="mt-0 position-relative">
        <div class="theme-2">
            <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
        </div>
        {{-- <div class="leyer">
            <div class="container">
                <div class="theme-2banner-text">
                    <h1 class="col-md-6 col-11 col-lg-9 col-xl-6 text-center m-auto">{{ helper::appdata($storeinfo->id)->description }}</h1>
                </div>
            </div>
        </div> --}}
    </section>
    @endif
    <!-- banner Section End -->
    <!-- Categories Section Start -->
    @if(count($getcategory) > 0 && count($getitem) > 0)
    <section class="thme2-section-paddingt">
        <div class="container">
            <div class="row overflow-hidden">
                <div class="theme-2-title-subtitle">
                    <h3 class="page-title mb-1 text-center">{{trans('labels.our_products')}}</h3>
                    <p class="page-subtitle line-limit-2 mt-0 text-center">
                    {{trans('labels.our_products_desc')}}
                    </p>
                </div>
                <div class="col px-0">
                    <div class="swiper horizontal_scroll_swiper_theme-2">
                        <ul class="swiper-wrapper navgation_lower theme-2-category-card mb-5">
                         @foreach ($getcategory as $key => $category)
                         @php
                         $check_cat_count = 0;
                         @endphp
                              @foreach ($getitem as $item)
                                   @if ($category->id == $item->cat_id)
                                        @php
                                             $check_cat_count++;
                                        @endphp
                                   @endif
                              @endforeach
                              @if ($check_cat_count > 0)
                            <li class="{{ $key == 0 ? 'active1' : '' }} swiper-slide" id="specs-{{$category->id}}">
                                <div class="category-circle-theme-2">
                                    <div>
                                        <img src="{{  helper::image_path($category->image) }}" alt="">
                                        <p class="act-2">{{ Str::limit($category->name,11) }}</p>
                                    </div>
                                </div>
                            </li>

                            @endif
                            @endforeach
                        </ul>
                        <div class="swiper-scrollbar"></div>
                    </div>
                    @if(helper::appdata($storeinfo->id)->template_type == 1)
                         @include('front.template-2.theme-grid')
                    @elseif(helper::appdata($storeinfo->id)->template_type == 2)
                         @include('front.template-2.theme-list')
                    @elseif(helper::appdata($storeinfo->id)->template_type == 3)
                         @include('front.template-2.theme-slider')
                    @endif
                </div>
            </div>
    </section>
    @endif
    <!-- Categories Section End -->
    <!-- Banner Slider Section Start -->
    @if(count($bannerimage) > 0)
    <section class="banner-slider-section-theme-2">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <div class="owl-carousel theme-2-banner-imges-slider owl-theme">
                        @foreach ($bannerimage as $image)
                        <div class="item">
                            <div class="overflow-hidden rounded-3">
                                <img src="{{ helper::image_path($image->banner_image) }}" alt="" class="rounded-3">
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Banner Slider Section End -->
<!-- Blogs Products Section Start -->
@if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
    @php

    if ($storeinfo->allow_without_subscription == 1) {
        $blog = 1;
    } else {
        $blog = @helper::get_plan($storeinfo->id)->blogs;
    }
    @endphp
    @if($blog == 1)
        @if(count($blogs) > 0)
        <section class="thme2-section-padding pb-0" >
            <div class="container">
                <div class="row">
                    <div class="theme-2-title-subtitle">
                        <h3 class="page-title mb-1 text-center">{{trans('labels.blogs')}}</h3>
                        <p class="page-subtitle line-limit-2 mt-0 text-center">
                            {{trans('labels.blog_desc')}}
                        </p>
                    </div>
                    <div class="col">
                        <div class="owl-carousel theme-2blogs-slider owl-theme">
                            @foreach ($blogs as $blog)
                            <a href="{{URL::to(@$storeinfo->slug.'/blog-details-'.$blog->slug)}}">
                                <div class="item pb-3">
                                    <div class="card h-100 rounded-3 border-0">
                                        <img src="{{ helper::image_path($blog->image) }}" alt="" class="rounded-3">
                                        <div class="card-body">
                                            <p class="title blog-title text-start">{{ $blog->title }}</p>
                                            <span class="blog-description">{!!$blog->description!!}</span>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endif
@endif
<!-- Blogs Products Section end -->
    <!-- Subscription Section Start -->
    <section class="thme2-section-padding position-relative subscription-bg-imag pb-0">
        <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)}}" alt="">
        <div class="container theme-2subscription">
            <div class="row">
                <div class="col">
                    <div class="card backdrop-filter border-0 rounded-3">
                        <div class="card-body py-5">
                            <div class="theme-2-title-subtitle">
                                <h3 class="page-title mb-1 text-center">{{trans('labels.subscribe_title')}}</h3>
                                <p class="page-subtitle line-limit-2 text-center">
                                {{trans('labels.subscribe_description')}}
                                </p>
                                <form action="{{ URL::to($storeinfo->slug . '/subscribe') }}" method="post" class="col-md-8 col-lg-7 col-xl-5 m-auto">
                                    @csrf
                                    <div class="form-control subscribe-int-btn-main">
                                        <input type="hidden" value="{{ $storeinfo->id }}" name="id">
                                        <input type="email" name="email" class="form-control subscribe-input-theme2 input-h" placeholder="{{trans('labels.enter_email')}}" aria-label=".form-control-lg example" required>
                                        <button type="submit" class="subscribe-btn-theme2">{{trans('labels.subscribe')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscription Section End -->
    <!-- fhishar Section Start -->
    @if(count(helper::footer_features(@$storeinfo->id)) > 0)
    <section class="mt-0 position-relative">
        <div class="card bg-fhishar-card">
            <img src="{{url(env('ASSETSPATHURL').'web-assets/iamges/png/fhiser-bg.png')}}" alt="">
        </div>
        <div class="container fhishar-container">
            <div class="row my-1 justify-content-center align-items-center overflow-hidden">
                @foreach (helper::footer_features(@$storeinfo->id) as $feature)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card footer-card">
                            <div class="card-body d-flex align-items-start">
                                <h2 class="px-3 py-1 fs-3 theme2quality-image">{!! $feature->icon !!}</h2>
                                <div class="quality-content">
                                    <h3 class="mb-1">{{ $feature->title }}</h3>
                                    <p class="mb-2">{{ $feature->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- fhishar Section end -->
</main>
@else
    @include('front.nodata')
@endif
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection
