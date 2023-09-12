<div class="row g-4 mb-2">

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div class="card box-shadow h-100 ordercard1 {{ request()->get('status') == '' ? 'border border-primary' : 'border-0' }}">
            @if (request()->is('admin/report'))
                <a
                    href="{{ URL::to(request()->url() . '?status=&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}">
                @elseif(request()->is('admin/orders'))
                    <a href="{{ URL::to('admin/orders?status=') }}">
                    @elseif(request()->is('admin/customers/orders*'))
                        <a href="{{ URL::to('admin/customers/orders-' . @$userinfo->id . '?status=') }}">
            @endif
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                        <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.total_orders') }}</p>
                        <h4 class="text-dark fw-bold fs-2">{{ $totalorders }}</h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-shopping-cart"></i> -->
                        <i class="fa-regular fa-rectangle-list fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>
    @if (request()->is('admin/orders') || request()->is('admin/customers/orders*'))
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div
                class="card box-shadow h-100 ordercard2 {{ request()->get('status') == 'processing' ? 'border border-primary' : 'border-0' }}">
                @if (request()->is('admin/report'))
                    <a
                        href="{{ URL::to(request()->url() . '?status=processing&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}">
                    @elseif(request()->is('admin/orders'))
                        <a href="{{ URL::to('admin/orders?status=processing') }}">
                        @elseif(request()->is('admin/customers/orders*'))
                            <a href="{{ URL::to('admin/customers/orders-' . @$userinfo->id . '?status=processing') }}">
                @endif
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                            <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.processing') }}</p>
                            <h4 class="text-dark fw-bold fs-2">{{ $totalprocessing }}</h4>
                        </span>
                        <span class="card-icon">
                            <i class="fa-solid fa-hourglass-half fs-5"></i>
                        </span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    @endif
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div
            class="card box-shadow h-100 ordercard3 {{ request()->get('status') == 'delivered' ? 'border border-primary' : 'border-0' }}">
            @if (request()->is('admin/report'))
                <a
                    href="{{ URL::to(request()->url() . '?status=delivered&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}">
                @elseif(request()->is('admin/orders'))
                    <a href="{{ URL::to('admin/orders?status=delivered') }}">
                    @elseif(request()->is('admin/customers/orders*'))
                        <a href="{{ URL::to('admin/customers/orders-' . @$userinfo->id . '?status=delivered') }}">
            @endif
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                        <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.delivered') }}</p>
                        <h4 class="text-dark fw-bold fs-2">{{ $totalcompleted }}</h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-check"></i> -->
                        <i class="fa-solid fa-check-to-slot fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div
            class="card box-shadow h-100 ordercard4 {{ request()->get('status') == 'cancelled' ? 'border border-primary' : 'border-0' }}">
            @if (request()->is('admin/report'))
                <a
                    href="{{ URL::to(request()->url() . '?status=cancelled&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}">
                @elseif(request()->is('admin/orders'))
                    <a href="{{ URL::to('admin/orders?status=cancelled') }}">
                    @elseif(request()->is('admin/customers/orders*'))
                        <a href="{{ URL::to('admin/customers/orders-' . @$userinfo->id . '?status=cancelled') }}">
            @endif
            <div class="card-body">
                <div class="dashboard-card">
                    <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                        <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.cancelled') }}</p>
                        <h4 class="text-dark fw-bold fs-2">{{ $totalcancelled }}</h4>
                    </span>
                    <span class="card-icon">
                        <!-- <i class="fa fa-close"></i> -->
                        <i class="fa-solid fa-circle-xmark fs-5"></i>
                    </span>
                </div>
            </div>
            </a>
        </div>
    </div>

    @if (request()->is('admin/report*'))
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="card box-shadow h-100 reportcard1">
                <div class="card-body">
                    <div class="dashboard-card">
                        <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                            <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.revenue') }}</p>
                            <h4 class="text-dark fw-bold fs-2">{{ helper::currency_formate($totalrevenue, Auth::user()->id) }}</h4>
                        </span>
                        <span class="card-icon">
                            <i class="fa-regular fa-money-bill-1-wave"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
