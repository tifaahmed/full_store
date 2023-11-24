@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-3">
            <h3 class="page-title text-white mb-2">{{trans('labels.table_book')}}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.table_book')}}</li>
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
<!-- contact section start -->
<section class="mt-3 pull-section-up">
    <div class="container">
        <div class="row contact-form">
            <div class="col-lg-12 col-sm-12 col-auto mb-4 mb-lg-0">
                <div class="card shadow rounded-5 h-100 select-delivery py-3 px-2">
                    <div class="card-body">
                        <form action="{{ URL::To(@$storeinfo->slug.'/book') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <h2 class="page-title mb-1 px-2"> {{ trans('labels.table_book') }}</h2>
                                <p class="page-subtitle px-2 mb-3 md-mb-5">
                                </p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.event') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="event" placeholder="{{ trans('labels.event') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.people') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="people" placeholder="{{ trans('labels.people') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.event_date') }}<span class="text-danger"> * </span></label>
                                    <input type="date" class="form-control input-h" name="event_date" placeholder="{{ trans('labels.event_date') }}" min="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.event_time') }}<span class="text-danger"> * </span></label>
                                    <input type="time" class="form-control input-h" name="event_time" placeholder="{{ trans('labels.event_time') }}" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.name') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="name" placeholder="{{ trans('labels.name') }}" required>
                                    <input type="hidden" name="vendor_id" value="{{$storeinfo->id}}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.email') }}<span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control input-h" name="email" placeholder="{{ trans('labels.email') }}" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="validationDefault" class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>
                                    <input type="number" class="form-control input-h" name="mobile" placeholder="{{ trans('labels.mobile') }}" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">{{ trans('labels.special_request') }}</label>
                                    <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="notes" placeholder="{{ trans('labels.special_request') }}" ></textarea>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn-primary mobile-viwe-btn">{{ trans('labels.submit') }}</button>
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
<!-- contact section start -->
@endsection