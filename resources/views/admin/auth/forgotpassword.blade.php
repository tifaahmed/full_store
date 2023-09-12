@extends('admin.layout.auth_default')
@section('content')

<body class="bg-white">
    <div class="wrapper">
        <section>
            <div class="row justify-content-center align-items-center g-0 h-100vh">
                <div class="col-lg-6 col-12 bg-white">
                    <div class="row g-0 vh-100 d-flex justify-content-center align-items-center">
                        <div class="col-md-8 col-lg-10 col-xl-7">
                            <div class="card overflow-hidden border-0 w-100 bg-transparent">
                                <div class="card-body pt-0">
                                    <h4 class="fw-bold text-dark fs-1 pb-0 mb-0">{{ trans('labels.forgot_password') }}</h4>
                                    <div class="d-flex align-items-center pt-3 pb-0">
                                        <p class="fs-7 text-center fw-500 text-muted">{{ trans('labels.remember_password') }}</p>
                                        <a href="{{ URL::to('/admin') }}" class="text-primary fw-semibold px-2">{{ trans('labels.login') }}</a>
                                    </div>
                                    <form class="my-3" method="POST" action="{{ URL::to('admin/send_password') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="form-label">{{ trans('labels.email') }} <span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="email" value="" id="email" placeholder="{{ trans('labels.email') }}" required>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary w-100 my-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.submit') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-none d-lg-block">
                    <div class="vh-100 d-flex justify-content-center align-items-center m-auto">
                        <img src="{{url(env('ASSETSPATHURL').'admin-assets/images/about/login.jpg')}}" alt="" class="formimg">
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection