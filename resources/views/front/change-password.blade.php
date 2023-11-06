 @extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{ trans('labels.change_password') }}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{ trans('labels.change_password') }}</li>
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
<!-- Change Password section end -->
<section class="bg-light mt-0 py-5  pull-section-up">
    <div class="container">
        <div class="row">
            @include('front.theme.user_sidebar')
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3">{{ trans('labels.change_password') }}</h2>
                        <form action="{{ URL::to($storeinfo->slug . '/change_password/') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.current_password') }} <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="current_password" id="validationDefault" value="" placeholder="{{ trans('labels.current_password') }} "  required>
                                    @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.new_password') }}<span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="new_password" id="validationDefault" value="" placeholder="{{ trans('labels.new_password') }}"  required>
                                    @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                   @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Name" class="form-label">{{ trans('labels.confirm_password') }}<span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control input-h" name="confirm_password" id="validationDefault" value="" placeholder="{{ trans('labels.confirm_password') }}" required>
                                    @error('confirm_password')
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
<!-- Change Password section end -->
<button class="btn account-menu btn-primary d-lg-none d-md-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2">{{ trans('labels.account_menu') }}</span>
</button>
@endsection