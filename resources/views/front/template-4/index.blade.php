@extends('front.theme.default')
@section('content')
@if(count(helper::footer_features(@$storeinfo->id)) > 0 || (count($getcategory) > 0 && count($getitem) > 0) || count($bannerimage) > 0 || count($blogs) > 0)
<main>
    <!-- Theme 4 Banner Start -->
    <section>
        <div class="theme-4-bannre">
            @if($bannerimage->count())
                <div class="owl-carousel owl-theme" id="slider-header">
                    @foreach ($bannerimage as $image)
                    <div class="item">
                        <div class="overflow-hidden rounded-3">
                            <img src="{{ helper::image_path($image->banner_image) }}" alt="" class="rounded-3">
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
            @endif
            {{-- <div class="container">
                <span>
                    <h1 class="col-md-10 col-11 col-lg-9 col-xl-6 text-center m-auto">{{ helper::appdata($storeinfo->id)->description }}</h1>
                </span>
            </div> --}}
        </div>
    </section>
    <!-- Theme 4 Banner End -->

    <!-- Theme 4 only Categories  Start -->
    <section class="thme4-section-padding">
        <div class="container">
            <div class="categorythme-4">
                <div class="tab-row" id="menu-center">
                    @foreach ($getcategory as $key => $category)
                        @if($category->items->count() > 0)
                            <a href="#{{$category->slug}}">
                                <span>{{$category->name}}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Theme 4 only Categories  End -->

    <!-- Theme 4 Categoriy & Product Start -->
    <section class="thme4-section-padding">
        <div class="container">
            <div class="categorythme-4">
                <div class="scrollspy_row">
                    @if(helper::appdata($storeinfo->id)->template_type == 1)
                    @include('front.template-4.theme-grid')
                    @elseif(helper::appdata($storeinfo->id)->template_type == 2)
                    @include('front.template-4.theme-list')
                    @elseif(helper::appdata($storeinfo->id)->template_type == 3)
                    @include('front.template-4.theme-slider')
                    @endif
                </div>

                {{-- popup category --}}
                {{-- <div class="col-md-6 d-flex justify-content-center m-auto">
                    <div class="offcanvas offcanvas-bottom categories_theme4_offcanvas" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                        <div class="offcanvas-header border-bottom">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                                {{trans('labels.categories')}}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body small overflow-auto">
                            <div class="tab-row" id="menu-center">
                                <ul class="list-group theme-4-categories-list">
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
                                    @if($check_cat_count > 0)
                                    <li class="list-group-item p-2 border-top-0" data-bs-dismiss="offcanvas">
                                        <a href="#{{$category->slug}}">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ helper::image_path($category->image) }}" alt="" class="rounded-circle categories_imgbox border">
                                                <p>{{$category->name}}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="m-0">{{$check_cat_count}}</span>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- popup category --}}
            </div>
        </div>
    </section>
    <!-- Theme 4 Categoriy & Product End -->


    
    <!-- Subscription Section Start -->
    <section class="theme-1-margin-top">
        <div class="container">
            <div class="row g-0">
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

    <!-- Theme 4 Footer Fisher Start -->
    <section class="thme4-section-padding py-4 pb-lg-5">
        <div class="container px-0">
            <div class="theme4-footerfisher">
                <div class="row my-1 justify-content-center align-items-center overflow-hidden g-3">
                    @foreach (helper::footer_features(@$storeinfo->id) as $feature)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card theme4footer-card h-100">
                            <div class="card-body d-flex align-items-start">
                                <h2 class="theme4quality-image">{!! $feature->icon !!}</h2>
                                <div class="card-body pt-0 quality-content">
                                    <h3>{{ $feature->title }}</h3>
                                    <p>{{ $feature->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Theme 4 Footer Fisher End -->



    @include('front.theme.footer-bar')


</main>
@else
@include('front.nodata')
@endif
@endsection
@section('script')
<script>
    window.addEventListener("scroll", onScroll);
    function onScroll(event) {
        var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
        var menuLinks = document.querySelectorAll("#menu-center ul li a");
        for (var i = 0; i < menuLinks.length; i++) {
            var currLink = menuLinks[i];
            var refElement = document.querySelector(currLink.getAttribute("href"));
            if (
                refElement.offsetTop - 150 <= scrollPos &&
                refElement.offsetTop + refElement.offsetHeight > scrollPos
            ) {
                document.querySelectorAll("#menu-center ul li a").forEach(function(el) {
                    el.classList.remove("active");
                });
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }
    var tabLinks = document.querySelectorAll(".tab-row a");
    for (var i = 0; i < tabLinks.length; i++) {
        tabLinks[i].addEventListener("click", function(event) {
            event.preventDefault();
            var currentId = this.getAttribute("href");
            setTimeout(function() {
                document.documentElement.scrollTop = document.body.scrollTop = document.querySelector(currentId).offsetTop - 50;
            }, 0);
        });
    }
    $('.theme-4-banner-2 .owl-carousel').owlCarousel({
        rtl: direction == '2' ? true : false,
        dots: false,
        loop: false,
        autoplay: false,
        margin: 25,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1024: {
                items: 2
            },
            1636: {
                items: 3
            }
        }
    })

    $('#slider-header').owlCarousel({
        rtl: direction == '2' ? true : false,
        dots: false,
        loop: true,
        autoplay: true,
        margin: 0,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items:1,
    })
    
</script>
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection
