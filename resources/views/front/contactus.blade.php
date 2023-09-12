@extends('front.theme.default')
@section('recaptcha_script')
<!-- IF VERSION 2  -->
@if (helper::appdata('')->recaptcha_version == 'v2')
<script src='https://www.google.com/recaptcha/api.js'></script> 
@endif
<!-- IF VERSION 3  -->
@if (helper::appdata('')->recaptcha_version == 'v3')
{!! RecaptchaV3::initJs() !!}
@endif
@endsection
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <h3 class="page-title text-white mb-2">{{trans('labels.contact_us')}}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.contact_us')}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end -->
<!-- contact section start -->
<section class="mt-3">
    <div class="container">
        <div class="row contact-form">
            <div class="col-12 col-lg-8 col-sm-12 col-auto mb-4 mb-lg-0">
                <div class="card shadow rounded-5 h-100 select-delivery py-3 px-2">
                    <div class="card-body">
                        <form action="{{ URL::To(@$storeinfo->slug.'/submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <h2 class="page-title mb-1 px-2"> {{ trans('labels.contact_us') }}</h2>
                                <p class="page-subtitle px-2 mb-3 md-mb-5">
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.frist_name') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="first_name" placeholder="{{ trans('labels.frist_name') }}" required>
                                    <input type="hidden" name="vendor_id" value="{{$storeinfo->id}}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.last_name') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="last_name" placeholder="{{ trans('labels.last_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.email') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="email" placeholder="{{ trans('labels.email') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>
                                    <input type="number" class="form-control input-h" name="mobile" placeholder="{{ trans('labels.mobile') }}" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">{{ trans('labels.message') }}<span class="text-danger"> * </span></label>
                                    <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="message" placeholder="{{ trans('labels.message') }}" required></textarea>
                                </div>
                                    @include('landing.layout.recaptcha')
                                <div class="col d-flex justify-content-end mt-2">
                                    <button type="submit" class="btn-primary mobile-viwe-btn">{{ trans('labels.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-sm-12 col-auto">
                <div class="card contact-details">
                    <div class="card-body mx-3">
                        <h4 class="page-title mb-4">{{trans('labels.contact_details')}}</h4>
                        <ul class="contact-right-side">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>
                                    <a href="#" class="px-2"> {{helper::appdata($storeinfo->id)->address}}</a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-solid fa-headphones"></i>
                                <span class="px-2">{{trans('labels.call_us')}}<a href="tel:{{helper::appdata($storeinfo->id)->contact}}"> +{{helper::appdata($storeinfo->id)->contact}}</a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-regular fa-envelope"></i>
                                <span class="px-2">
                                    {{ trans('labels.email') }}
                                    <a href="mailto:{{helper::appdata($storeinfo->id)->email}}"> {{helper::appdata($storeinfo->id)->email}}</a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="px-2">
                                    {{ trans('labels.hours') }}
                                    @foreach (@helper::timings($storeinfo->id) as $timing)
                                    <br>
                                    <a href="#"> 
                                        {{Str::upper($timing->day)}} --
                                        @if($timing->is_always_close == 1)
                                            ( {{ trans('labels.closed') }} )
                                        @else
                                            ({{$timing->open_time}} to {{$timing->close_time}})  
                                        @endif
                                    </a>    
                                    @endforeach
                                    
                                </span>
                            </li>
                        </ul>
                        <hr class="my-4">
                        <h5 class="title mb-2">{{trans('labels.social_share')}}</h5>
                        <div class="social-share">
                            <a class="btn btn-outline-dark m-1 border facebook text-white" href="{{helper::appdata($storeinfo->id)->facebook_link}}" role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="{{helper::appdata($storeinfo->id)->twitter_link}}" role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="{{helper::appdata($storeinfo->id)->linkedin_link}}" role="button"><i class="fa-brands fa-linkedin"></i></a>
                            <a class="btn btn-outline-dark m-1 border text-white" href="{{helper::appdata($storeinfo->id)->instagram_link}}" role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section start -->
@endsection