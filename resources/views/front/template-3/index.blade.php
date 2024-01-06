@extends('front.theme.default')
@section('content')
    <div class="d-none">
    </div>
    @if (count(helper::footer_features(@$storeinfo->id)) > 0 ||
            (count($getcategory) > 0 && count($getitem) > 0) ||
            count($bannerimage) > 0 ||
            count($blogs) > 0)
        <main>
            <section>
                <div class="row">
                    <div class="col-md-12 col-lg-5 col-xl-5 order-1 order-lg-0 position-relative categories-left-side">
                        <div class="col px-0 py-3" data-bs-toggle="offcanvas" href="#offcanvasinfo" role="button"
                            aria-controls="offcanvasinfo">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-block d-md-flex d-lg-block d-xl-flex align-items-center">
                                        <a href="#" class="">
                                            <img src="{{ helper::image_path(helper::appdata(@$storeinfo->id)->logo) }}"
                                                alt="" class="rounded-3">
                                        </a>
                                        <div class="w-100">
                                            {{-- <h5
                                                class="mb-3 px-3 {{ session()->get('direction') == 2 ? 'text-center text-md-end text-lg-center text-xl-end' : 'text-center text-md-start text-lg-center text-xl-start' }}">
                                                {{ @$storeinfo->name }}
                                            </h5> --}}
                                            <div class="peyment-overflow d-flex">
                                                <div class="theme-3-image-gallery">
                                                    {{-- <ul class="image-container pay-card-imag p-0">
                                                        @foreach ($paymentlist as $payment)
                                                            <li>
                                                                <img src="{{ helper::image_path($payment->image) }}">
                                                            </li>
                                                        @endforeach
                                                    </ul> --}}
                                                </div>
                                                <i
                                                    class="fa-solid  {{ session()->get('direction') == 2 ? 'fa-chevron-left' : 'fa-chevron-right' }} d-none d-lg-none d-md-block d-xl-block"></i>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn border mt-4 d-block d-md-none d-lg-block d-xl-none">
                                                    {{ trans('labels.store_info') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 pb-3">

                            {{-- start from here  --}}

                            <div class="col-12  sticky-nav horizontal-category-list bg-white et-hero-tabs d-flex">
                                <div class="col-10 col-sm-11">
                                    <div class="et-hero-tabs-container mt-2">
                                        <div id="category_list" class="owl-carousel owl-theme d-flex owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 1737px;">

                                                    {{-- end here --}}
                                                    @foreach ($getcategory as $key => $category)
                                                        @php
                                                            $check_cat_count = 0;
                                                        @endphp
                                                        @foreach ($getitem as $index => $item)
                                                            @if ($category->id == $item->cat_id)
                                                                @php
                                                                    $check_cat_count++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($check_cat_count > 0)
                                                            <div class="owl-item custom_item"
                                                                style="width: auto; margin-right: 10px;">
                                                                <div class="item" data-count="{{ $key }}">
                                                                    <a class="et-hero-tab btn show-category-product key_{{ $key }} category_{{ $category->id }} @if ($key == 0)   @else @endif  "
                                                                        data-count="{{ $key }}"
                                                                        data-id="category_{{ $category->id }}"
                                                                        href="#tab-category_{{ $category->id }}"
                                                                        data-order="{{ $key + 1 }}"
                                                                        style=" border-radius: 20px;">{{ $category->name }}</a>
                                                                </div>
                                                            </div>










                                                            {{-- <div class="col-6 col-md-3 col-lg-6 col-xl-4">
                                                                    <div class="card shadow-0 border-0 position-relative categories-theme-3card">
                                                                        <a href="{{ URL::to($storeinfo->slug . '/categories#' . $category->slug) }}">
                                                                            <img src="{{ helper::image_path($category->image) }}" class="rounded-3">
                                                                        </a>
                                                                        <a class="categories-layer" href="{{ URL::to($storeinfo->slug . '/categories#' . $category->slug) }}">
                                                                            <div class="categories-text">
                                                                                <p>{{ $category->name }}</p>
                                                                                <span class="rounded-layer">{{ $check_cat_count }}</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div> --}}
                                                        @endif
                                                    @endforeach

                                                    {{-- start here  --}}


                                                </div>
                                            </div>
                                            <div class="owl-nav disabled">
                                                <div class="owl-prev">prev</div>
                                                <div class="owl-next">next</div>
                                            </div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end here --}}


                        {{-- start product here --}}

                        @if(helper::appdata($storeinfo->id)->template_type == 1)

                        @include('front.template-3.theme-grid')

                        @elseif(helper::appdata($storeinfo->id)->template_type == 2)

                        @include('front.template-3.theme-list')

                        @elseif(helper::appdata($storeinfo->id)->template_type == 3)

                        @include('front.template-3.theme-slider')

                        @endif

                        {{-- end product here --}}

                        </div>



                        <!-- <div class="row categories-left-side">

                    </div> -->

                    </div>
                    <div class="col-md-12 col-lg-7 col-xl-7 px-0 theme-3-header-position">
                        @include('front.template-3.header')
                    </div>
                </div>
            </section>
        </main>
    @else
        @include('front.nodata')
    @endif
    <!-- Store info Offcanvas Theme-3 Start -->
    <div class="offcanvas {{ session()->get('direction') == 2 ? 'offcanvas-end' : 'offcanvas-start' }} categoriesoffcanvastheme-4"
        tabindex="-1" id="offcanvasinfo" aria-labelledby="offcanvasinfo">
        <div class="offcanvas-header border-bottom border-dark bg-light">
            <p class="title pb-1 fs-5 offcanvas-title text-center m-auto fw-600" id="offcanvasExampleLabel">Store Info</p>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="row">
                <div class="col p-3" data-bs-toggle="offcanvas" href="#offcanvasinfo" role="button"
                    aria-controls="offcanvasinfo">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="" class="store-info-logo-img">
                                    <img src="{{ helper::image_path(helper::appdata(@$storeinfo->id)->logo) }}"
                                        alt="" class="rounded-3">
                                </a>
                                <div class="w-100 mx-3">
                                    <h5 class="mb-0 mb-md-2">{{ @$storeinfo->name }}</h5>
                                    <div class="row g-2 align-items-center justify-content-between theme-4-contactinfo">
                                        <div class="col col-md-6">
                                            <a href="tel:{{ helper::appdata($storeinfo->id)->contact }}"
                                                class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-phone-volume"></i>
                                                <div class="d-md-block d-none">
                                                    <span class="px-3"> {{ trans('labels.call_us') }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col col-md-6">
                                            <a href="mailto:{{ helper::appdata($storeinfo->id)->email }}"
                                                class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-envelope"></i>
                                                <div class="d-md-block d-none">
                                                    <span class="px-3"> {{ trans('labels.email') }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group theme-3-store-infos-list">
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="https://www.google.com/maps/place/323/{{ helper::appdata($storeinfo->id)->address }}">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="w-100">
                        <p class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                            {{ helper::appdata($storeinfo->id)->address }}</p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="tel:{{ helper::appdata($storeinfo->id)->contact }}">
                    <i class="fa-solid fa-headphones"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">{{ trans('labels.call_us') }}
                        <p>
                            +{{ helper::appdata($storeinfo->id)->contact }}
                        </p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="mailto:{{ helper::appdata($storeinfo->id)->email }}">
                    <i class="fa-regular fa-envelope"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                        {{ trans('labels.email') }}
                        <p>
                            {{ helper::appdata($storeinfo->id)->email }}
                        </p>
                    </span>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2" href="#"
                    data-bs-toggle="modal" data-bs-target="#examplehours" data-bs-whatever="@mdo">
                    <i class="fa-regular fa-circle-question"></i>
                    <span class="px-2 fw-400 w-100 d-flex gap-1 align-items-center">
                        <p href="#" data-bs-toggle="modal" data-bs-target="#examplehours" data-bs-whatever="@mdo">
                            {{ trans('labels.working_hours') }}
                        </p>
                    </span>
                </a>
                @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
                    @php

                        if ($storeinfo->allow_without_subscription == 1) {
                            $blog = 1;
                        } else {
                            $blog = @helper::get_plan($storeinfo->id)->blogs;
                        }
                    @endphp
                    @if ($blog == 1)
                        <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                            href="{{ URL::to(@$storeinfo->slug . '/blog-list') }}">
                            <i class="fa-regular fa-clipboard"></i>
                            <p href="{{ URL::to(@$storeinfo->slug . '/blog-list') }}" class="px-2 fw-400">
                                {{ trans('labels.blogs') }}</p>
                        </a>
                    @endif
                @endif

                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="{{ URL::to(@$storeinfo->slug . '/aboutus') }}">
                    <i class="fa-regular fa-file-lines"></i>
                    <p class="px-2 fw-400">{{ trans('labels.about_us') }}</p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="{{ URL::to(@$storeinfo->slug . '/contact') }}">
                    <i class="fa-regular fa-address-card"></i>
                    <p class="px-2 fw-400">{{ trans('labels.contact_us') }}</p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="{{ URL::to(@$storeinfo->slug . '/terms_condition') }}">
                    <i class="fa-regular fa-note-sticky"></i>
                    <p class="px-2 fw-400">{{ trans('labels.terms') }}</p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2"
                    href="{{ URL::to(@$storeinfo->slug . '/privacypolicy') }}">
                    <i class="fa-solid fa-building-shield"></i>
                    <p class="px-2 fw-400">{{ trans('labels.privacy_policy') }}</p>
                </a>
                <a class="list-group-item rounded-0 d-flex align-items-center gap-2" href="javascript:void(0)"
                    data-bs-toggle="modal" data-bs-target="#subscribe_modal">
                    <i class="fa-solid fa-bell"></i>
                    <p href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#subscribe_modal"
                        class="px-2 fw-400">{{ trans('labels.subscribe') }}</p>
                </a>
            </ul>
        </div>
        <div class="offcanvas-footer">
            <div class="row g-0 theme-3-footer my-3 border-top">
                <div class="col rounded-3">
                    <p>{{ helper::appdata($storeinfo->id)->copyright }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Store info Offcanvas Theme-3 End -->
    @include('front.theme.location_popup',[
        'deliveryareas' => $deliveryareas,
        'branches' => $branches, 
    ])
@endsection
@section('script')
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/theme-3header.js') }}"></script>
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            if (document.cookie.indexOf("FooBar=true") == -1) {
                document.cookie = "FooBar=true; max-age=86400"; // 86400: seconds in a day
                $('#subscribe_modal').modal('show');
            }
        });

        console.log('asdasd');

        $('.owl-item').removeClass('active');
        $('.owl-item').first().addClass('active') ;

        $('.custom_item').on("click" ,  function()    {
            console.log('gemy el...');
            $('.custom_item').removeClass('active');
            $(this).addClass('active');

        })



        </script>
@endsection




