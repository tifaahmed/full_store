@extends('front.theme.default')

@section('content')

<main>

    <section>

        <div class="row">

            <div class="col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0 px-0">

                <div class="row categories-left-side position-relative">





                    @if(count($bannerimage) > 0)

                    <div class="col py-3">

                        <div class="owl-carousel theme-3bannerslider owl-theme">



                            @foreach ($bannerimage as $image)

                            <div class="item">

                                <div class="overflow-hidden rounded-3">

                                    <img src="{{ helper::image_path($image->banner_image) }}" alt="" class="rounded-3">

                                </div>

                            </div>

                            @endforeach



                        </div>

                    </div>

                    @endif





                    <div class="row p-0">


                        @if(helper::appdata($storeinfo->id)->template_type == 1)

                        @include('front.template-3.theme-grid')

                        @elseif(helper::appdata($storeinfo->id)->template_type == 2)

                        @include('front.template-3.theme-list')

                        @elseif(helper::appdata($storeinfo->id)->template_type == 3)

                        @include('front.template-3.theme-slider')

                        @endif



                    </div>



                    <div class="scrollToTopBtn_main col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0">
                        <p data-bs-target="#offcanvasExample" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasExample" class="browse_menu_btn gap-1">
                            <i class="fa-solid fa-utensils"></i>
                            <span>Browse Menu</span>
                        </p>
                    </div>

                </div>


            </div>

            <div class="col-md-12 col-lg-7 col-xl-7 px-0 theme-3-header-position">

                @include('front.template-3.header')

            </div>




        </div>

    </section>

</main>





<!-- Categories Offcanvas Theme-3 Start -->



<div class="offcanvas {{session()->get('direction') == 2 ? 'offcanvas-end' : 'offcanvas-start'}} categoriesoffcanvastheme-4" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-header border-bottom border-dark bg-light">

        <p class="title pb-1 fs-5 offcanvas-title text-center m-auto fw-600" id="offcanvasExampleLabel">{{trans('labels.categories')}}</p>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

    </div>

    <div class="offcanvas-body p-0">

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

            <li class="list-group-item" data-bs-dismiss="offcanvas">

                <a href="#{{$category->slug}}">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ helper::image_path($category->image) }}" alt="" class="rounded-circle categories_imgbox">
                        <p>{{$category->name}}</p>
                    </div>

                    <div class="d-flex align-items-center">

                        <span>{{$check_cat_count}}</span>

                        <i class="fa-solid {{session()->get('direction') == 2 ? 'fa-angle-left' : 'fa-angle-right'}}"></i>

                    </div>

                </a>

            </li>

            @endif

            @endforeach



        </ul>

    </div>

</div>



<!-- Categories Offcanvas Theme-3 End -->





@endsection



@section('script')



<script src="{{url(env('ASSETSPATHURL').'web-assets/js/theme-3header.js')}}"></script>

<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>

@endsection
