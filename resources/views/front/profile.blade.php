@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{trans('labels.settings')}}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">  {{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.settings')}}</li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
    </div>
</section>

<!-- breadcrumb end -->

<!-- Setting section end -->

<section class="bg-light py-5 pull-section-up">

    <div class="container">

        <div class="row">
            
           @include('front.theme.user_sidebar')

            <div class="col-lg-9 col-md-12">

                <div class="card shadow border-0 rounded-5">

                    <div class="card-body py-4">

                        <h2 class="page-title mb-2 px-3">{{ trans('labels.profile') }}</h2>

                        {{-- <p class="page-subtitle px-3 mb-4 line-limit-2">{{ trans('labels.profile_desc') }}</p> --}}

                        <form action="{{ URL::to($storeinfo->slug . '/updateprofile/') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <input type="hidden" value="{{ Auth::user()->id }}" name="id">

                                    <label for="Name" class="form-label">{{ trans('labels.name') }} <span class="text-danger"> * </span></label>

                                    <input type="text" class="form-control input-h" id="validationDefault" name="name" value="{{ Auth::user()->name }}" placeholder="{{ trans('labels.name') }} " required>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label for="Name" class="form-label">{{ trans('labels.email') }}<span class="text-danger"> * </span></label>

                                    <input type="email" class="form-control input-h" id="validationDefault" name="email" value="{{ Auth::user()->email }}" placeholder="{{ trans('labels.email') }}" required>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label for="Name" class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>

                                    <input type="tel" class="form-control input-h" id="validationDefault" name="mobile" value="{{ Auth::user()->mobile }}" placeholder="{{ trans('labels.mobile') }}" required>

                                </div>

                                <div class="col-md-12 mb-4">

                                    <label for="Name" class="form-label">{{ trans('labels.image') }}</label>

                                    <input class="form-control" type="file" id="formFile"  name="profile"/>

                                    @error('profile')

                                                <span class="text-danger">{{ $message }}</span>

                                     @enderror

                                </div>

                                <div class="col-md-12 d-flex justify-content-end">

                                    <button type="submit" class="btn-primary rounded-3 mobile-viwe-btn">{{ trans('labels.save') }}</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
    @include('front.theme.footer-bar')

</section>

<!-- Setting section end -->
 

<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

    <i class="fa-solid fa-bars-staggered text-white"></i>

    <span class="px-2">{{ trans('labels.account_menu') }}</span>

</button>

@endsection