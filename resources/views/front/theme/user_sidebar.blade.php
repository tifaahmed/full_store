<div class="col-md-3 d-lg-block d-none">
    <div class="setting-page-profile">
        <img src="{{ helper::image_path(@Auth::user()->image) }}" alt="" class="mb-2">
        <h3 class="mb-1">{{ @Auth::user()->name }}</h3>
        <a>{{ @Auth::user()->email }}</a>
    </div>
    <p class="setting-left-sidetitle">{{ trans('labels.account') }}</p>
    <ul class="setting-left-sidebar">
        <li>
            <a href="{{ URL::to($storeinfo->slug . '/profile/') }}">
                <i class="fa-regular fa-user"></i>
                <span class="px-3">{{ trans('labels.profile') }}</span>
            </a>
        </li>
        <li>
            @if(@Auth::user()->google_id == "" && @Auth::user()->facebook_id == "")
             <a href="{{ URL::to($storeinfo->slug . '/change-password/') }}">
                <i class="fa-solid fa-lock"></i>
                <span class="px-3">{{ trans('labels.change_password') }}</span>
            </a>
            @endif
        </li>
    </ul>
    <p class="setting-left-sidetitle">{{ trans('labels.dashboard') }}</p>
    <ul class="setting-left-sidebar">
        <li>
            <a class="list-group-item rounded-0 d-flex align-items-center gap-2  "
            href="#">
                <i class="fa-solid fa-book"></i>
                <span class="px-3">{{ trans('labels.my_booking') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to($storeinfo->slug . '/orders/') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="px-3">{{ trans('labels.orders') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to($storeinfo->slug . '/favorites/') }}">
                <i class="fa-regular fa-heart"></i>
                <span class="px-3">{{ trans('labels.favourites') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to($storeinfo->slug . '/logout/') }}" >
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="px-3">{{ trans('labels.logout') }}</span>
            </a>
        </li>
    </ul>
</div>







<div class="offcanvas offcanvas-start bg-light offcanvas-width" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header justify-content-end mx-4">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-5">
        <div class="setting-page-profile">
            <img src="{{ helper::image_path(@Auth::user()->image) }}" alt="" class="mb-2">
            <h3 class="mb-1">{{ @Auth::user()->name }}</h3>
            <a>{{ @Auth::user()->email }}</a>
        </div>
        <p class="setting-left-sidetitle">{{ trans('labels.account') }}</p>
        <ul class="setting-left-sidebar">
            <li>
                <a href="{{ URL::to($storeinfo->slug . '/profile/') }}">
                    <i class="fa-regular fa-user"></i>
                    <span class="px-3">{{ trans('labels.profile') }}</span>
                </a>
            </li>
            <li>
                @if(@Auth::user()->google_id == "" && @Auth::user()->facebook_id == "")
                 <a href="{{ URL::to($storeinfo->slug . '/change-password/') }}">
                    <i class="fa-solid fa-lock"></i>
                    <span class="px-3">{{ trans('labels.change_password') }}</span>
                </a>
                @endif
            </li>
        </ul>
        <p class="setting-left-sidetitle">{{ trans('labels.dashboard') }}</p>
        <ul class="setting-left-sidebar">
            <li>
                <a href="#">
                    <i class="fa-solid fa-book"></i>
                    <span class="px-3">{{ trans('labels.my_booking') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to($storeinfo->slug . '/orders/') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="px-3">{{ trans('labels.orders') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to($storeinfo->slug . '/favorites/') }}">
                    <i class="fa-regular fa-heart"></i>
                    <span class="px-3">{{ trans('labels.favourites') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to($storeinfo->slug . '/logout/') }}" >
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="px-3">{{ trans('labels.logout') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>