<div class="offcanvas  {{session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'}}" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header offcanvas-header-coupons">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">{{ trans('labels.coupons_offers') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body offer-coupons">
        @foreach ($coupons as $coupon)
            <div class="row g-4">
                <div class="col px-0">
                    <div class="card promo-card position-relative rounded-5 h-100">
                        <div class="card-body p-4">
                            <div class="row main-row">
                                <div class="coupons-imag col-12 col-md-4 col-lg-4 col-xl-4">
                                    <h1 >  {{$coupon->price}}%</h1>
                                    <h6 class="ms-3"> {{ trans('labels.coupons') }}</h6>

                                </div>
                                <div class="coupons-content col-12 col-md-8 col-lg-8 col-xl-8 d-md-flex justify-content-end">
                                    <div>
                                        <h2>{{ $coupon->name }}</h2>

                                        <p class="ps-7">{{ $coupon->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <form class="form-group" data-copy=true>
                                <div class="copy-button rounded-5">
                                    <input type="hidden" id="applycoponurl" value="{{ URL::to('/cart/applypromocode') }}"/>
                                    <input id="promocode" type="text" class="rounded-5 px-2 input-h" readonly value="{{ $coupon->code }}" />
                                    <button type="button" class="copybtn btn-primary" onclick="ApplyCopon('{{ $coupon->code }}','{{$storeinfo->id}}')">{{ trans('labels.apply') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>