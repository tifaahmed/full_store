@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

<div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2">{{trans('labels.about_us')}}</h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item">

                    <a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a>

                </li>

                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.about_us')}}</li>

            </ol>

        </nav>

    </div>

</div>

<!-- breadcrumb end -->

<!-- About Us Section Start -->

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            

            @if (!empty($aboutus->about_content))

                <div class="cms-section my-3">



                    {!! $aboutus->about_content !!}



                </div>

            @else

                @include('front.nodata')

            @endif

        </div>

    </div>

</section>

<!-- About Us Section End -->

@endsection