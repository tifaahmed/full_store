@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

<div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2">{{trans('labels.privacy_policy')}}</h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>

                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.privacy_policy')}}</li>

            </ol>

        </nav>

    </div>

</div>

<!-- breadcrumb end -->

<!-- Privacy Policy section end -->

@if($privacy != null)

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            {!!@$privacy->privacypolicy_content!!}

        </div>

    </div>

</section>

@else

    @include('front.nodata')

@endif

<!-- Privacy Policy section end -->

@endsection