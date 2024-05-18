@extends('landing.layout.default')
<!-- IF VERSION 2  -->
@if (helper::appdata('')->recaptcha_version == 'v2')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endif
<!-- IF VERSION 3  -->
@if (helper::appdata('')->recaptcha_version == 'v3')
{!! RecaptchaV3::initJs() !!}
@endif
@section('content')
<main>
    <!--------------------------------- home-banner start --------------------------------->
    <section id="home" class="home-banner my-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-12">
                    <div class="banner-content me-xl-5 me-lg-3 me-md-2">
                        <h1 id="typing-text" class="typewrite  banner-title text-primary" data-period="2000"
                        data-type='["{{ __("landing.hero_banner_title") }}", "{{ __("landing.hero_banner_title") }}"]'>
                        <span class="wrap"></span>
                     </h1>
                        <p class="fw-normal mb-lg-5 mb-4 text-muted">{{ trans('landing.hero_banner_description') }}</p>
                        <div class="input-group mb-lg-4 mb-3">
                            <a href="{{ URL::to('/admin') }}" class="ctm-btn2" target="_blank"><span class="m-0  fs-6">{{ trans('landing.get_started') }} <i class="bi bi-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-none d-md-block">
                    <div class="img-sub-header">
                        <img src="{{url(env('ASSETSPATHURL').'landing/images/Photo.webp')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------- home-banner end ---------------------------------->

    <!-------------------------------- work section start -------------------------------->
    <section class="work bg-primary mb-5">


            <div class="row pg-none">
                <div class="col-xl-4 pg-none col-lg-4 d-none d-lg-block">
                    <div class="img-works-new">
                        <img src="{{url(env('ASSETSPATHURL').'landing/images/w1.png')}}" alt="w1">
                        <img src="{{url(env('ASSETSPATHURL').'landing/images/w2.png')}}" alt="w2">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="text-work-index">

                    <div class="work-content ms-xl-5 ms-lg-4 px-3 sec-title mb-5">
                        <h2 class="text-white">{{ trans('landing.how_it_work') }}</h2>
                        <p class="sub-title text-white">{{ trans('landing.how_it_work_description') }}</p>
                    </div>
                    <div class="row ms-xl-5 ms-lg-4">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12 mb-4 mb-md-0">
                                <div class="card h-100  items-work border-0 rounded-0 pb-xl-5">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <img class="card-img-top" src="{{url(env('ASSETSPATHURL').'landing/images/png/signup.png')}}" alt="" class="rounded-circle">
                                            <div class="numbers">01</div>
                                        </div>
                                        <div class="card-body p-0 ms-3">
                                            <div class="border-start border-2 border-secondary-color ps-4 mb-xl-4 mb-lg-3">
                                                <h4 class="card-title">{{ trans('landing.how_it_work_step_one') }}</h4>
                                                <p class="card-text text-muted fs-7 text-truncate-2">{{ trans('landing.how_it_work_step_one_description') }}</p>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0 bg-transparent">
                                            <a href="{{ URL::to('/admin') }}" class="border-bottom ms-4 fw-500 ms-lg-0 ms-xl-4" target="_blank">{{ trans('landing.get_started') }}</a>
                                        </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-12 mb-4 mb-md-0">
                                <div class="card  items-work h-100 border-0 rounded-0 pb-xl-5">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <img class="card-img-top" src="{{url(env('ASSETSPATHURL').'landing/images/png/add-product.png')}}" alt="" class="rounded-circle">
                                        <div class="numbers">02</div>
                                    </div>
                                    <div class="card-body p-0 ms-3">
                                        <div class="border-start border-2 border-secondary-color ps-4 mb-xl-4 mb-lg-3">
                                            <h4 class="card-title">{{ trans('landing.how_it_work_step_two') }}</h4>
                                            <p class="card-text fs-7 text-truncate-2 text-muted">{{ trans('landing.how_it_work_step_two_description') }}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-transparent">
                                        <a href="{{ URL::to('/admin') }}" class="border-bottom ms-4 fw-500 ms-lg-0 ms-xl-4" target="_blank">{{ trans('landing.get_started') }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-12 mb-4 mb-md-0">
                                <div class="card items-work h-100 border-0 rounded-0 pb-xl-5">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <img class="card-img-top" src="{{url(env('ASSETSPATHURL').'landing/images/png/ready.png')}}" alt="" class="rounded-circle">
                                        <div class="numbers">03</div>
                                    </div>
                                    <div class="card-body p-0 ms-3">
                                        <div class="border-start border-2 border-secondary-color ps-4 mb-xl-4 mb-lg-3">
                                            <h4 class="card-title">{{ trans('landing.how_it_work_step_three') }}</h4>
                                            <p class="card-text text-muted fs-7 text-truncate-2">{{ trans('landing.how_it_work_step_three_description') }}</p>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-transparent">
                                        <a href="{{ URL::to('/admin') }}" class="border-bottom ms-4 fw-500 ms-lg-0 ms-xl-4" target="_blank">{{ trans('landing.get_started') }}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>

            </div>
        </div>
    </section>
    <!---------------------------------- work section end ---------------------------------->

    <!--------------------------- Premium Features section start --------------------------->
    @if(count($features) > 0)
    <section id="features" class="premium-features-sec pb-5">
        <div class="container">
            <div class="sec-title col-lg-6 text-strat mb-5">
                <h2 class="">{{ trans('landing.premium_features') }}</h2>
                <p class="sub-title">{{ trans('landing.premium_features_description') }}</p>
            </div>
            <div class="premium-features owl-carousel owl-theme">
                @foreach ($features as $feature)
                <div class="item">
                    <div class="sub-features">
                        <div class="card-body">
                            <div class="features-img-index">
                                <img src="{{url(env('ASSETSPATHURL').'admin-assets/images/feature/'.$feature->image)}}" alt="">
                            </div>
                            <div class="text-features">
                                <h2>{{$feature->title}}</h2>
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
    <!---------------------------- Premium Features section end ---------------------------->


    <!--  Store Section Start -->

    @if(count($userdata) > 0)
    <section id="our-stores">
        <div class="card-section-bg-color pb-5">
            <div class="container card-section-container">
                <div class="sec-title text-center col-xl-6 col-lg-8 col-md-10 mx-auto mb-5">
                    <h2>{{ trans('landing.our_partners') }}</h2>
                    <h5 class="sub-title">{{ trans('landing.our_partners_description') }}</h5>
                </div>
                <div class="row row-cols-1 mt-2 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xll-4` g-2">

                    @foreach ($userdata as $user)

                    <div class="col">
                        <a href="{{URL::to($user->slug . '/')}}" target="_blank">
                            <div class="sub-partners">
                                <div class="img-partners">
                                    <img src="{{ helper::image_path($user->cover_image) }}" alt="...">
                                </div>
                                <div class="text-partners">
                                    <h2>{{ $user->website_title }}</h2>
                                    <p>{{ $user->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{URL::to('stores')}}" class="ctm-btn2">{{trans('landing.see_all')}} <i class="fa-solid {{session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right'}} px-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    @endif



    <!--  Store Section End -->

    @if (App\Models\SystemAddons::where('unique_identifier', 'template')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'template')->first()->activated == 1)
    <!------------------------------ Templates section start ------------------------------->
    <section class="template bg-primary py-5">
        <div class="container">
            <div class="sec-title text-center col-xl-6 col-lg-8 col-md-10 mx-auto mb-5">
                <h2 class="text-white">{{ trans('landing.awesome_templates') }}</h2>
                <h5 class="sub-title text-white">{{ trans('landing.awesome_templates_description') }}</h5>
            </div>
            <!-- theme-preview-content -->
            <div class="templates-owl owl-carousel owl-theme text-white">
                <div class="item h-100 temp-active">
                    <img src="{{url(env('ASSETSPATHURL').'landing/images/png/01.webp')}}" alt="" class="object-fit-cover h-100">
                </div>
                <div class="item h-100">
                    <img src="{{url(env('ASSETSPATHURL').'landing/images/png/02.webp')}}" alt="" class="object-fit-cover h-100">
                </div>
                <div class="item h-100">
                    <img src="{{url(env('ASSETSPATHURL').'landing/images/png/03.webp')}}" alt="" class="object-fit-cover h-100">
                </div>
                <div class="item h-100">
                    <img src="{{url(env('ASSETSPATHURL').'landing/images/png/04.webp')}}" alt="" class="object-fit-cover h-100">
                </div>
            </div>
            <!-- theme-preview-content -->
        </div>
    </section>
    <!-------------------------------- Templates section end ------------------------------>
    @endif

    <!------------------------------- plan section start ------------------------------->

    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

    <section id="pricing-plans" class="our-plan pt-5">
        <div class="container">
            <div class="sec-title text-center col-xl-5 col-lg-7 col-md-9 col-12 mx-auto">
                <h2 class="text-capitalize fw-semibold">{{ trans('landing.pricing_plan_title') }}</h2>
                <h5 class="sub-title">{{ trans('landing.pricing_plan_description') }}</h5>
            </div>
            <div class="row mb-3 plan">
                @foreach ($planlist as $plan)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card border-0 rounded-3 shadow p-4 mb-4  h-100">
                        <div class="card-body p-0">
                            <p class="fw-semibold">{{ $plan->planname }}</p>
                            <h2 class="fw-semibold">{{ helper::currency_formate($plan->price, '') }}/
                                @if ($plan->duration == 1)
                                {{ trans('landing.one_month') }}
                                @elseif($plan->duration == 2)
                                {{ trans('landing.three_month') }}
                                @elseif($plan->duration == 3)
                                {{ trans('landing.six_month') }}
                                @elseif($plan->duration == 4)
                                {{ trans('landing.one_year') }}
                                @elseif($plan->duration == 5)
                                {{ trans('landing.lifetime') }}
                                @elseif($plan->duration == null)
                                {{ trans('landing.free') }}
                                @endif
                            </h2>
                            <span class="fs-7">{{ $plan->description }}</span>
                            <div class="plan-detals mt-4">
                                <ul class="m-0 p-0">

                                    @php $features = explode('|', $plan->features); @endphp
                                    <li class="d-flex align-items-start mb-3"> <i class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                        <span class="mx-2">
                                            {{ $plan->order_limit == -1 ? trans('landing.unlimited') : $plan->order_limit }}
                                            {{ $plan->order_limit > 1 || $plan->order_limit == -1 ? trans('landing.products') : trans('landing.product') }}
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-start mb-3"> <i class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                        <span class="mx-2">
                                            {{ $plan->appointment_limit == -1 ? trans('landing.unlimited') : $plan->appointment_limit }}
                                            {{ $plan->appointment_limit > 1 || $plan->appointment_limit == -1 ? trans('landing.orders') : trans('landing.order') }}
                                        </span>
                                    </li>
                                    @php
                                    $themes = [];
                                    if ($plan->themes_id != '' && $plan->themes_id != null) {
                                    $themes = explode(',', $plan->themes_id);
                                    } @endphp
                                    <li class="d-flex align-items-start mb-3"> <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ count($themes) }}
                                            {{ count($themes) > 1 ? trans('landing.themes') : trans('landing.theme') }}</span>
                                    </li>

                                    @if ($plan->coupons == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.coupons') }}</span>
                                    </li>
                                    @endif

                                    @if ($plan->custom_domain == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.custome_domain_available') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->vendor_app == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.vendor_app_available') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->google_analytics == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.google_analytics_available') }}</span>
                                    </li>
                                    @endif

                                    @if ($plan->blogs == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.blogs') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->social_logins == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.social_login') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->sound_notification == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.sound_notification') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->whatsapp_message == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.whatsapp_message') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->telegram_message == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.telegram_message') }}</span>
                                    </li>
                                    @endif
                                    @if ($plan->pos == 1)
                                    <li class="d-flex align-items-start mb-3">
                                        <i class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                        <span class="mx-2">{{ trans('landing.pos') }}</span>
                                    </li>
                                    @endif

                                    @php $features = explode('|',$plan->features); @endphp
                                    @foreach ($features as $feature)
                                    <li class="d-flex align-items-start mb-3"><i class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                    <span class="mx-2">{{$feature}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-transparent py-4 px-0">
                            <a href="{{ URL::to('/admin') }}" class="btn w-100 btn-secondary py-3">{{ trans('landing.subscribe') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endif
    <!-------------------------------- plan section end -------------------------------->

    <!-------------------------------- Trusted section start -------------------------------->
    <section class="trusted py-5">
        <div class="container bg-primary">
            <div class="row align-items-center justify-content-between trusted-box">
                <div class="col-md-4 col-12 ps-0 d-none d-lg-block">
                    <img src="{{url(env('ASSETSPATHURL').'landing/images/png/trusted.png')}}" alt="digital connection images" class="w-100 object-fit-content">
                </div>
                <div class="col-md-7 col-12">
                    <div>
                        <h3 class="mb-4 text-center text-md-start trusted-title">{{ trans('landing.trusted_by') }}</h3>
                        <div class="d-flex">
                            <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                <h2 class="num" data-val="65">65</h2>
                                <h3 class="num-title">{{ trans('landing.fun_fact_one') }}</h3>
                            </div>
                            <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                <h2 class="num" data-val="10">10</h2>
                                <h3 class="num-title">{{ trans('landing.fun_fact_two') }}</h3>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                <h2 class="num" data-val="275">275</h2>
                                <h3 class="num-title">{{ trans('landing.fun_fact_three') }}</h3>
                            </div>
                            <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                <h2 class="num" data-val="60">60</h2>
                                <h3 class="num-title">{{ trans('landing.fun_fact_four') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------- Trusted section end -------------------------------->

    <!----------------------------- testimonila section start ----------------------------->
    <section class="testimonila">
        <div class="container">
            <div class="sec-title text-center col-xl-5 col-lg-7 col-md-9 col-12 mx-auto">
                <h2 class="text-capitalize fw-semibold">{{ trans('landing.client_says') }}</h2>
                <h5 class="sub-title">{{ trans('landing.client_says_description') }}</h5>
            </div>
            <div id="testimonila-owl" class="owl-carousel owl-theme mt-5">

                @foreach ($testimonials as $testimonial)
                <div class="item">
                    <div class="card bg-secondary border-0 rounded-0 p-md-5">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center justify-content-between d-block">
                                <div class="col-lg-7 col-md-6">
                                    <div class="test-content">
                                        <i class="fa-solid fa-quote-left text-white"></i>
                                        <p class="text-truncate-3">{{$testimonial->description}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 profile-circle mb-4 mb-md-0 mx-auto mx-md-0">
                                    <img src="{{url(env('ASSETSPATHURL').'admin-assets/images/testimonials/'.$testimonial->image)}}" alt="user">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-transparent text-white">
                            <h3 class="text-md-start text-center">{{$testimonial->name}}</h3>
                            <p class="text-md-start text-center">{{$testimonial->position}}</p>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>
    <!------------------------------ testimonila section end ------------------------------>



    <!------------------------------ blog section end ------------------------------>
    @if(count($blogs) > 0)
    <section id="blog" class="blog py-5">
        <div class="container">
            <div class="sec-title text-center mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h2 class="text-capitalize fw-semibold">{{trans('landing.blogs')}}</h2>
                <h5 class="sub-title"> {{trans('landing.blog_desc')}}</h5>
            </div>

            <div id="blog-owl" class="owl-carousel owl-theme">

                @foreach ($blogs as $blog)
                <div class="item" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <div class="card border-0 rounded-0">
                        <img class="card-img-top blog-image" src="{{url(env('ASSETSPATHURL').'admin-assets/images/blog/'.$blog->image)}}" alt="">
                        <div class="card-body px-0">
                            <div class="d-flex align-items-start">
                                <div>
                                    <a href="{{URL::to('blog_details-'.$blog->id)}}">
                                        <h4 class="card-title text-truncate-2">{{$blog->title}}</h4>
                                    </a>
                                    <p class="card-text text-truncate-3">{!! Str::limit(@$blog->description,100)!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{URL::to('blog_list')}}" class="btn text-dark mt-4 border border-dark fw-500 px-3">{{trans('landing.see_all')}} <i class="fa-solid {{session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right'}} px-2"></i></a>
            </div>
        </div>
    </section>
    @endif
    <!------------------------------ blog section end ------------------------------>




    <!------------------------------ newsletter start ------------------------------>
    {{-- <section class="newsletter bg-primary mb-5">
        <div class="container text-center text-white">
            <div class="py-5">
                <h2 class="py-4 m-0 newsletter-title">{{ trans('landing.subscribe_section_title_msg') }}</h2>
                <h5 class="newsletter-subtitle col-xl-8 col-lg-10 col-auto m-auto text-white">{{ trans('landing.subscribe_section_description') }}</h5>
                <form action="{{URL::to('emailsubscribe')}}" method="POST">
                    @csrf
                    <div class="col-xl-6 col-lg-7 col-md-10 mx-md-auto mt-5">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control rounded h-45 fs-6" placeholder="Enter your email" name="email" id="email" aria-label="Recipient's username" aria-describedby="subscribe_button" required>
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            <button class="btn btn-secondary rounded h-45 {{session()->get('direction') == 2 ? 'me-md-3 me-2' : 'ms-md-3 ms-2'}}"  type="submit" id="subscribe_button">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}
    <!------------------------------- newsletter end ------------------------------->

    <!------------------------------- Contact start ------------------------------->
    <section id="contect-us" class="contact pb-5 mb-4">
        <div class="container">
            <div class="sec-title text-center col-xl-5 col-lg-7 col-md-9 col-12 mx-auto">
                <h2 class="text-capitalize fw-semibold">{{ trans('landing.contact_us') }}</h2>
                <h5 class="sub-title">{{ trans('landing.contact_section_title') }}</h5>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 col-md-6 col-12 mb-5 mb-md-0">
                    <div class="card card-info bg-primary border-0 text-white position-relative">
                        <div class="card-body">
                            <div class="info">
                                <h5>{{ trans('landing.contact_info') }}</h5>
                                <p>{{ trans('landing.contact_info_msg') }}</p>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <i class="fa-solid fa-phone-volume me-4"></i>
                                <p class="m-0">{{helper::appdata('')->contact}}</p>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <i class="fa-solid fa-envelope me-4"></i>
                                <p class="m-0">{{helper::appdata('')->email}}</p>
                            </div>
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-location-dot me-4"></i>
                                <p class="m-0">{{helper::appdata('')->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6 col-12">
                    <form class="row" action="{{URL::to('inquiry')}}" method="POST">
                        @csrf
                        <div class="col-md-6 mb-4 mb-lg-5">
                            <label for="first_name" class="form-label m-0 fw-semibold fs-7">{{ trans('landing.first_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0 p-0 pb-1 px-0 fs-7" name="first_name" id="first_name" required>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-5">
                            <label for="last_name" class="form-label m-0 fw-semibold fs-7">{{ trans('landing.last_name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control border-0 border-bottom rounded-0 p-0 pb-1 px-0 fs-7" name="last_name" id="last_name" required>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-5">
                            <label for="emaill" class="form-label m-0 fw-semibold fs-7">{{ trans('landing.email') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control border-0 border-bottom rounded-0 p-0 pb-1 px-0 fs-7" name="emaill" id="emaill" required>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-5">
                            <label for="phone" class="form-label m-0 fw-semibold fs-7">{{ trans('landing.mobile') }} <span class="text-danger">*</span></label>
                            <input type="number" class="form-control border-0 border-bottom rounded-0 p-0 pb-1 px-0 fs-7" name="mobile" id="phone" onKeyPress="if(this.value.length==10) return false;" required>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                            <label for="Message" class="form-label m-0 fw-semibold fs-7">{{ trans('landing.message') }} <span class="text-danger">*</span></label>
                            <textarea class="form-control border-0 border-bottom rounded-0 h-45 py-1 px-0 text-muted" name="message" id="Message" placeholder="Write your message.." required></textarea>
                        </div>

                        @include('landing.layout.recaptcha')

                        <div class="col-12 d-flex justify-content-end">
                            <button class="m-0 btn btn-primary" type="submit">{{ trans('landing.send_msg') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------- Contact end ------------------------------->
</main>
@endsection
