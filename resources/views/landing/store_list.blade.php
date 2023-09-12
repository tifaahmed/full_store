@extends('landing.layout.default')

@section('content')

<section id="our-stores ">
    <div class="owl-carousel owl_our_stores owl-theme position-relative">
        @foreach ($banners as $banner)
        
        <a href="{{ URL::to('/' . $banner['vendor_info']->slug) }}" target="_blank">
            <div class="item">
                <div class="leyer">
                </div>
                <img src="{{ helper::image_path($banner->image) }}" alt="">
            </div>
        </a>
        @endforeach

    </div>

    @if(count($stores) > 0)


    <div class="container">
        <div class="row row-cols-1 mt-2 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xll-4 g-2 py-5">
            @foreach ($stores as $store)      
                <div class="col">
                    <a href="{{URL::to($store->slug . '/')}}" target="_blank">
                        <div class="card mx-1 rounded-4 h-100 border-0">
                            <img src="{{ helper::image_path(helper::appdata($store->id)->cover_image) }}" class="card-img-top our_stores_images" alt="...">
                            <div class="card-body px-0">
                                <h5 class="card-title hotel-title">{{ helper::appdata($store->id)->website_title }}</h5>
                                <p class="hotel-subtitle text-muted">
                                    {{ helper::appdata($store->id)->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach    
        </div>
    </div>


    @else
        @include('landing.nodata')
    @endif



</section>

@endsection



