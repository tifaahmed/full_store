@extends('admin.layout.auth_default')
@section('content')

<body class="bg-white">
    <div class="wrapper">
        <section>
            <div class="row row justify-content-center align-items-center g-0 h-100vh">
                <div class="col-lg-6 col-12 bg-white">
                    <div class="row g-0 vh-100 d-flex justify-content-center align-items-center">
                        <div class="col-md-8 col-lg-10 col-xl-7">
                            <div class="card overflow-hidden border-0 w-100 bg-transparent">
                                <div class="card-body pt-0">
                                
                                    <h4 class="fw-bold text-dark fs-1 pb-0 mb-0">{{ trans('labels.welcome_back') }}</h4>
                                    <p class="fs-7 text-start fw-500 text-muted py-3">Verification</p>
                                    <form method="POST" class="mb-5" action="{{ route('admin.systemverification') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus placeholder="Enter Envato username">
                                        </div>
                                        @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus placeholder="Email">
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <input id="purchase_key" type="text" class="form-control @error('purchase_key') is-invalid @enderror" name="purchase_key" required autocomplete="current-purchase_key" placeholder="Envato purchase key">
                                        </div>
                                        @error('purchase_key')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <?php
                                        $text = str_replace('verification', '', url()->current());
                                        ?>
                                        <div class="form-group mb-3">
                                            <input id="domain" type="hidden" class="form-control @error('domain') is-invalid @enderror" name="domain" required autocomplete="current-domain" value="{{ $text }}" readonly="">
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary w-100">{{ trans('labels.save') }}</button>
                                        </div>
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