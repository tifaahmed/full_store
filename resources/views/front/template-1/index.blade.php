@extends('front.theme.default')
@section('content')
<main>
     <!-- banner Section Start -->
     @if(count(helper::footer_features(@$storeinfo->id)) > 0 || (count($getcategory) > 0 && count($getitem) > 0) || count($bannerimage) > 0 || count($blogs) > 0)
     @if(helper::appdata($storeinfo->id)->banner != null)
     <section class="mt-0 position-relative">
          <div class="theme-1">
               <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
          </div>
          <div class="leyer">
               <div class="container">
                    <div class="theme-1banner-text">
                         <h1 class="col-md-6 col-11 col-lg-9 col-xl-6 text-center m-auto">{{ helper::appdata($storeinfo->id)->description }}</h1>
                    </div>
               </div>
          </div>
     </section>
     @endif
     <!-- banner Section End -->
     <!-- fhishar Section Start -->
     @if(count(helper::footer_features(@$storeinfo->id)) > 0)
     <section class="bg-light py-3 mt-0">
          <div class="container">
               <div class="row my-1 justify-content-center align-items-center overflow-hidden">
                    @foreach (helper::footer_features(@$storeinfo->id) as $feature)
                    <div class="col-lg-3 col-sm-6 col-12">
                         <div class="card footer-card">
                              <div class="card-body d-flex align-items-center">
                                   <h2 class="px-3 py-1 fs-3 theme1quality-image">{!! $feature->icon !!}</h2>
                                   <div class="quality-content">
                                        <h3>{{ $feature->title }}</h3>
                                        <p>{{ $feature->description }}</p>
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
     <!-- Categories Section Start -->
     @if(count($getcategory) > 0 && count($getitem) > 0)
     <section class="theme-1-margin-top">
          <div class="container">
               <h3 class="page-title mb-1">{{trans('labels.our_products')}}</h3>
               <p class="page-subtitle line-limit-2 mt-0">
                    {{trans('labels.our_products_desc')}}
               </p>
               <div class="swiper horizontal_scroll_swiper">
                    <ul class="swiper-wrapper navgation_lower theme-1-category-card pb-1">
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
                              <img src="{{  helper::image_path($category->image) }}" alt="">
                              <p class="act-1">{{ $category->name }}</p>

                         </li>
                         @endif
                         @endforeach
                    </ul>
                    <div class="swiper-scrollbar"></div>
               </div>

               @if(helper::appdata($storeinfo->id)->template_type == 1)
               @include('front.template-1.theme-grid')
               @else
               @include('front.template-1.theme-list')
               @endif
     </section>
     @endif
     <!-- Categories Section End -->

     <!-- Banner Slider Section Start -->
     @if(count($bannerimage) > 0)
     <section class="banner-slider-section theme-1-margin-top">
          <div class="container">
               <div class="row py-5">
                    <div class="col">
                         <div class="owl-carousel banner-imges-slider owl-theme">
                              @foreach ($bannerimage as $image)
                              <div class="item">
                                   <div class="overflow-hidden rounded-5">
                                        <img src="{{ helper::image_path($image->banner_image) }}" alt="" class="rounded-5">
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
     <!-- Subscription Section Start -->
     <section class="theme-1-margin-top mb-5">
          <div class="container">
               <div class="row">
                    <div class="col">
                         <div class="subscription-main position-relative w-100 overflow-hidden">
                              <div class="overflow-hidden rounded-5">
                                   <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)}}" class="img-fluid subscription-image rounded-2">
                                   <div class="caption-subscription col-md-7 col-lg-6">
                                        <div class="subscription-text">
                                             <h3>{{trans('labels.subscribe_title')}}</h3>
                                             <p>{{trans('labels.subscribe_description')}}</p>
                                             <form action="{{ URL::to($storeinfo->slug . '/subscribe') }}" method="post">
                                                  @csrf
                                                  <div class="subscribe-input form-control col-md-6">
                                                       <input type="hidden" value="{{ $storeinfo->id }}" name="id">
                                                       <input type="email" name="email" class="form-control border-0" placeholder="{{trans('labels.enter_email')}}" required>
                                                       <button type="submit" class="btn btn-primary">{{trans('labels.subscribe')}}</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Subscription Section End -->
     <!-- Blogs Section Start -->
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
     <section class="bg-light theme-1-margin-top">
          <div class="container overflow-hidden">
               <div class="row blogs-card">
                    <div class="row align-items-center">
                         <div class="col-8">
                              <h3 class="page-title mb-1"> {{trans('labels.blogs')}}</h3>
                              <p class="page-subtitle line-limit-2 mb-4">
                                   {{trans('labels.blog_desc')}}
                              </p>
                         </div>
                         <div class="col-4 d-flex justify-content-end align-items-center">
                              <a href="{{URL::to(@$storeinfo->slug.'/blog-list')}}" class="border text-dark p-1 rounded-3">
                                   <span class="fs-8 p-1">{{trans('labels.view_all')}}</span>
                              </a>
                         </div>
                    </div>
                    <div class="col">
                         <div class="owl-carousel blogs-slider owl-theme">
                              @foreach ($blogs as $blog)
                              <a href="{{URL::to(@$storeinfo->slug.'/blog-details-'.$blog->slug)}}">
                                   <div class="item">
                                        <div class="card h-100 rounded-5">
                                             <img src="{{ helper::image_path($blog->image) }}" alt="" class="rounded-5">
                                             <div class="card-body py-4">
                                                  <div class="blogs-admin-data">
                                                       <div class="blog-admin">
                                                            <i class="fa-regular fa-user"></i>
                                                            <span>{{$storeinfo->name}}</span>
                                                       </div>
                                                       <div class="blog-deta">
                                                            <i class="fa-regular fa-calendar"></i>
                                                            <span>{{ helper::date_format($blog->created_at) }}</span>
                                                       </div>
                                                  </div>
                                                  <p class="title mt-2 blog-title">{{ $blog->title }}</p>
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
     <!-- Blogs Section End -->
</main>
@else
@include('front.nodata')
@endif
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection