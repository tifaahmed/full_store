@extends('landing.layout.default')

@section('content')

<section id="blog" class="blog py-5">
    <div class="container">
        <div class="sec-title text-center mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <h2 class="text-capitalize fw-semibold">{{ trans('landing.blog_details') }}</h2>
            <h5 class="sub-title">{{ trans('landing.blog_details_desc') }}</h5>
        </div>



        <div class="card h-100 rounded-3 p-3">
            <img class="card-img-top blog-image blog_img rounded-3" src="{{url(env('ASSETSPATHURL').'admin-assets/images/blog/'.$blog->image)}}" alt="">
            <div class="card-body px-0">
                <div class="d-flex align-items-start">
                    <div>
                        <h4 class="card-title text-truncate-2">{{$blog->title}}</h4>
                        <p class="card-text text-truncate-3">{!!@$blog->description!!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="sec-title text-center my-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <h2 class="text-capitalize fw-semibold">{{ trans('landing.related_blogs') }}</h2>
            <h5 class="sub-title">{{ trans('landing.related_blogs_desc') }}</h5>
        </div>

        <div id="blog-owl" class="owl-carousel owl-theme">
            @foreach ($blogdata as $blog)
            <div class="item" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <div class="card h-100 border-0 rounded-0">
                    <img class="card-img-top blog-image" src="{{url(env('ASSETSPATHURL').'admin-assets/images/blog/'.$blog->image)}}" alt="">
                    <div class="card-body px-0">
                        <div class="d-flex align-items-start">
                            <div>
                                <a href="{{URL::to('blog_details-'.$blog->id)}}"><h4 class="card-title text-truncate-2">{{$blog->title}}</h4></a>
                                <p class="card-text text-truncate-3">{!! Str::limit(@$blog->description,100) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center align-items-center">
        <a href="{{URL::to('blog_list')}}" class="btn text-dark mt-4 border border-dark fw-500 px-3">See all <i class="fa-solid fa-arrow-right px-2"></i></a>
        </div>
        
    </div>
</section>

@endsection