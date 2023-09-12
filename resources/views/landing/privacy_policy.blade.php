@extends('landing.layout.default')

@section('content')

<section class="theme-1-margin-top">
    <div class="container">
        <div class="sec-title text-center mb-4" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <h2 class="text-capitalize fw-semibold">{{ trans('landing.privacy_policy') }}</h2>
            <h5 class="sub-title">{{ trans('landing.privacy_policy_desc') }}</h5>
        </div>
        <div class="details row">
            {!! $privacy_policy->privacypolicy_content !!}
        </div>
    </div>
</section>

@endsection