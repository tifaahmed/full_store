@extends('landing.layout.default')
@section('content')
<section id="blog" class="blog mb-5 py-5">
    <div class="container">
        <div class="sec-title text-center mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <h2 class="text-capitalize fw-semibold">{{ trans('landing.blog_section_title') }}</h2>
            <h5 class="sub-title">{{ trans('landing.blog_section_description') }}</h5>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 rounded-0">
                    <img class="card-img-top blog-image" src="{{url(env('ASSETSPATHURL').'admin-assets/images/blog/'.$blog->image)}}" alt="">
                    <div class="card-body px-0">
                        <div class="d-flex align-items-start">
                            <div>
                                <a href="{{URL::to('blog_details-'.$blog->id)}}">
                                    <h4 class="card-title text-truncate-2">{{$blog->title}}</h4>
                                </a>
                                <p class="card-text text-truncate-3">{!! Str::limit(@$blog->description,100) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection