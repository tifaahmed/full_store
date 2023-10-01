<ul class="navbar-nav mx-3">
    <li class="nav-item fs-7">
        <a class="nav-link d-flex align-items-center  {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/dashboard') }}">
            <span class="{{ request()->is('admin/dashboard') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-house-user"></i> -->
                <i class="fa-solid fa-desktop"></i>
            </span>
            <span class="px-2">{{ trans('labels.dashboard') }}</span>
        </a>
    </li>
    @if (Auth::user()->type == 2)
    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.orders_management') }}</h6>
    </li>

    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

        @if (App\Models\SystemAddons::where('unique_identifier', 'pos')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'pos')->first()->activated == 1)

            @php

            if (Auth::user()->allow_without_subscription == 1) {
            $pos = 1;
            } else {
            $pos = @helper::get_plan(Auth::user()->id)->pos;
            }

            @endphp

            @if($pos == 1)
                <li class="nav-item mb-2 fs-7">
                    <a class="nav-link d-flex align-items-center {{ request()->is('admin/pos*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/pos') }}">
                        <span class="{{ request()->is('admin/pos*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                            <!-- <i class="fa-solid fa-users"></i> -->
                            <i class="fa-solid fa-cash-register"></i>
                        </span>
                        <span class="nav-text px-2">{{ trans('labels.pos') }}</span>
                        @if (env('Environment') == 'sendbox')
                        <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                        @endif
                    </a>
                </li>
            @endif

        @endif
    @else
        @if (App\Models\SystemAddons::where('unique_identifier', 'pos')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'pos')->first()->activated == 1)
            <li class="nav-item mb-2 fs-7">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/pos*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/pos') }}">
                    <span class="{{ request()->is('admin/pos*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                        <!-- <i class="fa-solid fa-users"></i> -->
                        <i class="fa-solid fa-cash-register"></i>
                    </span>
                    <span class="nav-text px-2">{{ trans('labels.pos') }}</span>
                    @if (env('Environment') == 'sendbox')
                    <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                    @endif
                </a>
            </li>
        @endif
    @endif
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex d-flex align-items-center {{ request()->is('admin/orders*') ? 'active' : '' }}" href="{{ URL::to('/admin/orders') }}" aria-expanded="false">
            <span class="{{ request()->is('admin/orders*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                <i class="fa-solid fa-list-check"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.orders') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex d-flex align-items-center {{ request()->is('admin/report*') ? 'active' : '' }}" href="{{ URL::to('/admin/report') }}" aria-expanded="false">
            <span class="{{ request()->is('admin/report*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-chart-mixed"></i> -->
                <i class="fa-solid fa-chart-pie"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.report') }}</span>
        </a>
    </li>
    @endif
    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.business_management') }}</h6>
    </li>

    @role('super admin')
        <li class="nav-item mb-2 fs-7 dropdown multimenu">
            <a class="nav-link collapsed d-flex align-items-center  justify-content-between dropdown-toggle mb-1 {{ (request()->is('admin/cities*') || request()->is('admin/areas*')) ? 'active' : '' }}" href="#location" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="location">
                <div class="d-flex align-items-center">
                    <span class=" {{ (request()->is('admin/roles*') || request()->is('admin/permissions*')) ? 'sidebariconbox' : 'sidebariconbox1' }}">
                        <i class="fa-solid fa-location-crosshairs"></i>
                    </span>
                    <span class="multimenu-title px-2">{{ trans('labels.roles') }}</span>
                </div>
            </a>
            <ul class="collapse" id="location">
                <li class="nav-item ps-4 mb-1">
                    <a class="nav-link  {{ request()->is('admin/roles*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/roles') }}">
                        <span class="d-flex align-items-center multimenu-menu-indicator">
                            <i class="fa-solid fa-circle-small"></i>
                            {{ trans('labels.roles') }}
                        </span>
                    </a>
                </li>
                <li class="nav-item ps-4 mb-1">
                    <a class="nav-link {{ request()->is('admin/permissions*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/permissions') }}">
                        <span class="d-flex align-items-center multimenu-menu-indicator">
                            <i class="fa-solid fa-circle-small"></i>
                            {{ trans('labels.permissions') }}
                        </span>
                    </a>
                </li>
            </ul>
        </li>
    @endrole
    @can('administrators view')
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex align-items-center  {{ request()->is('admin/administrators*') ? 'active' : '' }}" 
                aria-current="page" href="{{ URL::to('admin/administrators') }}">
                <span class="{{ request()->is('admin/administrators*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <i class="fa-solid fa-user-plus"></i>
                </span>
                <span class="px-2">
                    {{ trans('labels.administrators') }}
                </span>
            </a>
        </li>
    @endcan

    
    @can('users view')
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex align-items-center  {{ request()->is('admin/users*') ? 'active' : '' }}" 
                aria-current="page" href="{{ URL::to('admin/users') }}">
                <span class="{{ request()->is('admin/users*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <i class="fa-solid fa-user-plus"></i>
                </span>
                <span class="px-2">
                    {{ trans('labels.users') }}
                </span>
            </a>
        </li>
    @endcan

    {{-- if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center  {{ request()->is('admin/customers*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/customers') }}">
            <span class="{{ request()->is('admin/customers') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-users"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.customers') }}</span>
            @if (env('Environment') == 'sendbox')
            <span class="badge badge bg-danger float-right mt-1">{{ trans('labels.addon') }}</span>
            @endif
        </a>
    </li>
    endif --}}



    @if (Auth::user()->allow_without_subscription != 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center  {{ request()->is('admin/plan*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/plan') }}">

            <span class="{{ request()->is('admin/plan') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-medal"></i> -->
                <i class="fa-solid fa-bell"></i>
            </span>
            <span class="px-2">{{ trans('labels.pricing_plans') }}</span>
        </a>
    </li>

    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/transaction') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/transaction') }}">
            <span class="{{ request()->is('admin/transaction') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </span>
            <span class="px-2">{{ trans('labels.transaction') }}</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->type == 1 &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center  {{ request()->is('admin/payment') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/payment') }}">

            <span class="{{ request()->is('admin/payment') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-money-check-dollar-pen"></i> -->
                <i class="fa-solid fa-hand-holding-dollar"></i>

            </span>
            <span class="px-2">{{ trans('labels.payment_methods') }}</span>
        </a>
    </li>
    @endif
    @if (Auth::user()->type == 2)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center  {{ request()->is('admin/payment') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/payment') }}">
            <span class="{{ request()->is('admin/payment') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </span>
            <span class="px-2">{{ trans('labels.payment_methods') }}</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->type == 2)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/shipping-area*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/shipping-area') }}">
            <span class="{{ request()->is('admin/shipping-area*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-cart-flatbed"></i>
            </span>
            <span class="px-2">{{ trans('labels.shipping_area') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/time*') ? 'active' : '' }}" href="{{ URL::to('/admin/time') }}" aria-expanded="false">
            <span class="{{ request()->is('admin/time*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-business-time"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.working_hours') }}</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->type == 1)
    <li class="nav-item mb-2 fs-7 dropdown multimenu">
        <a class="nav-link collapsed d-flex align-items-center  justify-content-between dropdown-toggle mb-1 {{ (request()->is('admin/cities*') || request()->is('admin/areas*')) ? 'active' : '' }}" href="#location" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="location">
            <div class="d-flex align-items-center">
                <span class=" {{ (request()->is('admin/cities*') || request()->is('admin/areas*')) ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <i class="fa-solid fa-location-crosshairs"></i>
                </span>
                <span class="multimenu-title px-2">{{ trans('labels.location') }}</span>
            </div>
        </a>
        <ul class="collapse" id="location">
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link  {{ request()->is('admin/cities*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/cities') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator">
                        <i class="fa-solid fa-circle-small"></i>

                        {{ trans('labels.cities') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/areas*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/areas') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.areas') }}</span>
                </a>
            </li>
        </ul>
    </li>
    @endif
    @if (Auth::user()->type == 1)
    @if (App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/custom_domain*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/custom_domain') }}">

            <span class="{{ request()->is('admin/custom_domain') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-globe"></i>
            </span>

            <span class="nav-text px-2">{{ trans('labels.custom_domains') }}</span>
            @if (env('Environment') == 'sendbox')
            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
            @endif

        </a>
    </li>
    @endif
    @endif

    @if (Auth::user()->type == 2)
    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
    @if (App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1)
    @php
    $checkplan = App\Models\Transaction::where('vendor_id', Auth::user()->id)
    ->orderByDesc('id')
    ->first();
    if (Auth::user()->allow_without_subscription == 1) {
    $custom_domain = 1;
    } else {
    $custom_domain = @$checkplan->custom_domain;
    }

    @endphp
    @if ($custom_domain == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/custom_domain*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/custom_domain') }}">
            <span class="{{ request()->is('admin/custom_domain*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-globe"></i>
                <!-- <i class="fa-solid fa-link"></i> -->
            </span>
            <span class="nav-text px-2">{{ trans('labels.custom_domains') }}</span>
            @if (env('Environment') == 'sendbox')
            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
            @endif
        </a>
    </li>
    @endif
    @endif
    @else
    @if (App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/custom_domain*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/custom_domain') }}">
            <span class="{{ request()->is('admin/custom_domain*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-globe"></i>
                <!-- <i class="fa-solid fa-link"></i> -->
            </span>
            <span class="nav-text px-2">{{ trans('labels.custom_domains') }}</span>
            @if (env('Environment') == 'sendbox')
            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
            @endif
        </a>
    </li>
    @endif
    @endif
    @endif

    @if (Auth::user()->type == '2')
    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
        @if (App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1)
            @php
            $checkplan = App\Models\Transaction::where('vendor_id', Auth::user()->id)
            ->orderByDesc('id')
            ->first();
            if (Auth::user()->allow_without_subscription == 1) {
            $google_analytics = 1;
            } else {
            $google_analytics = @$checkplan->google_analytics;
            }

            @endphp
            @if ($google_analytics == 1)
            <li class="nav-item mb-2 fs-7">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/google_analytics*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/google_analytics') }}">
                    <span class="{{ request()->is('admin/google_analytics*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                        <i class="fa-solid fa-bar-chart"></i>
                    </span>
                    <span class="nav-text px-2">{{ trans('labels.google_analytics') }}</span>
                    @if (env('Environment') == 'sendbox')
                    <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                    @endif
                </a>
            </li>
            @endif
        @endif
    @else

        @if (App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1)
        <li class="nav-item mb-2 fs-7">
            <a class="nav-link d-flex align-items-center {{ request()->is('admin/google_analytics*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/google_analytics') }}">
                <span class="{{ request()->is('admin/google_analytics*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <i class="fa-solid fa-bar-chart"></i>
                </span>
                <span class="nav-text px-2">{{ trans('labels.google_analytics') }}</span>
                @if (env('Environment') == 'sendbox')
                <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                @endif
            </a>
        </li>
        @endif

    @endif


    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/booking*') ? 'active' : '' }}" href="{{ URL::to('/admin/booking') }}" aria-expanded="false">
            <span class="{{ request()->is('admin/booking*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-list-check"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.booking') }}</span>
        </a>
    </li>


    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

            @if (App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1)
                
                @php

                if (Auth::user()->allow_without_subscription == 1) {
                $tableqr = 1;
                } else {
                $tableqr = @helper::get_plan(Auth::user()->id)->tableqr;
                }

                @endphp

                @if($tableqr == 1)

                    <li class="nav-item mt-3">
                        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.table_management') }}</h6>
                    </li>


                    <li class="nav-item mb-2 fs-7">
                        <a class="nav-link d-flex align-items-center {{ request()->is('admin/tableqr*') ? 'active' : '' }}" href="{{ URL::to('/admin/tableqr') }}" aria-expanded="false">
                            <span class="{{ request()->is('admin/tableqr*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                                <i class="fa-solid fa-qrcode"></i>
                            </span>
                            <span class="nav-text px-2">{{ trans('labels.tableqr') }}</span>
                            @if (env('Environment') == 'sendbox')
                            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item mb-2 fs-7">
                        <a class="nav-link d-flex align-items-center {{ request()->is('admin/area*') ? 'active' : '' }}" href="{{ URL::to('/admin/area') }}" aria-expanded="false">
                            <span class="{{ request()->is('admin/area*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <span class="nav-text px-2">{{ trans('labels.area') }}</span>
                        </a>
                    </li>

                @endif
                
            @endif
        @else
                @if (App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1)

                
                        <li class="nav-item mt-3">
                            <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.table_management') }}</h6>
                        </li>

                        <li class="nav-item mb-2 fs-7">
                            <a class="nav-link d-flex align-items-center {{ request()->is('admin/tableqr*') ? 'active' : '' }}" href="{{ URL::to('/admin/tableqr') }}" aria-expanded="false">
                                <span class="{{ request()->is('admin/tableqr*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                                    <i class="fa-solid fa-qrcode"></i>
                                </span>
                                <span class="nav-text px-2">{{ trans('labels.tableqr') }}</span>
                                @if (env('Environment') == 'sendbox')
                                <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item mb-2 fs-7">
                            <a class="nav-link d-flex align-items-center {{ request()->is('admin/area*') ? 'active' : '' }}" href="{{ URL::to('/admin/area') }}" aria-expanded="false">
                                <span class="{{ request()->is('admin/area*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <span class="nav-text px-2">{{ trans('labels.area') }}</span>
                                @if (env('Environment') == 'sendbox')
                                <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                                @endif
                            </a>
                        </li>

                @endif
        @endif

    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.product_managment') }}</h6>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/categories*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/categories') }}">
            <span class="{{ request()->is('admin/categories*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-sharp fa-solid fa-list"></i>
            </span>
            <span class="px-2">{{ trans('labels.categories') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/products*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/products') }}">
            <span class="{{ request()->is('admin/products*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-list-timeline"></i> -->
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span class="px-2">{{ trans('labels.products') }}</span>
        </a>
    </li>
    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.promotions') }}</h6>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/banner*') ? 'active' : '' }}" href="{{ URL::to('/admin/banner') }}" aria-expanded="false">
            <span class="{{ request()->is('admin/banner*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-image"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.banner') }}</span>
        </a>
    </li>
        {{-- active subscriped  --}}
        @if ($system_addons_subscription &&  $system_addons_subscription_is_active)
            {{--  active coupon  --}}
            @if ($system_addons_coupon && $system_addons_coupon_is_active)
                @php

                if ($is_user_allow_without_subscription) {
                $coupons = 1;
                } else {
                $coupons = @helper::get_plan(Auth::user()->id)->coupons;
                }

                @endphp

                @if($coupons == 1)
                    <li class="nav-item mb-2 fs-7">
                        <a class="nav-link d-flex align-items-center {{ request()->is('admin/coupons*') ? 'active' : '' }}" href="{{ URL::to('/admin/coupons') }}" aria-expanded="false">
                            <span class="{{ request()->is('admin/coupons*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                                <i class="fa-solid fa-badge-percent"></i>
                            </span>
                            <span class="nav-text px-2">{{ trans('labels.coupons') }}</span>
                            @if (env('Environment') == 'sendbox')
                            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                            @endif
                        </a>
                    </li>
                @endif
                
            @endif
        @else
            {{--  active coupon  --}}
            @if ($system_addons_coupon && $system_addons_coupon_is_active)
                <li class="nav-item mb-2 fs-7">
                    <a class="nav-link d-flex align-items-center {{ request()->is('admin/coupons*') ? 'active' : '' }}" href="{{ URL::to('/admin/coupons') }}" aria-expanded="false">
                        <span class="{{ request()->is('admin/coupons*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                            <i class="fa-solid fa-badge-percent"></i>
                        </span>
                        <span class="nav-text px-2">{{ trans('labels.coupons') }}</span>
                        @if (env('Environment') == 'sendbox')
                        <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                        @endif
                    </a>
                </li>
            @endif
        @endif
    
    @endif

    
    @if (Auth::user()->type == 1)
    {{-- landing Page --}}
    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.landing_page') }}</h6>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/features*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/features') }}">
            <span class="{{ request()->is('admin/features') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-list"></i> -->
                <i class="fa-solid fa-lightbulb"></i>
            </span>
            <span class="px-2">{{ trans('labels.features') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/promotionalbanners*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/promotionalbanners') }}">
            <span class="{{ request()->is('admin/promotionalbanners') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-bullhorn"></i>
            </span>
            <span class="px-2">{{ trans('labels.promotional_banners') }}</span>
        </a>
    </li>

    @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)

            <li class="nav-item mb-2 fs-7">
                <a class="nav-link d-flex align-items-center {{ request()->is('admin/blogs*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/blogs') }}">
                    <span class="{{ request()->is('admin/blogs*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                        <i class="fa-solid fa-blog"></i>
                    </span>
                    <span class="nav-text px-2">{{ trans('labels.blogs') }}</span>
                    @if (env('Environment') == 'sendbox')
                    <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                    @endif
                </a>
            </li>

    @endif
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/faqs*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/faqs') }}">
            <span class="{{ request()->is('admin/faqs*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-question"></i>
            </span>
            <span class="px-2">{{ trans('labels.faqs') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/testimonials*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/testimonials') }}">
            <span class="{{ request()->is('admin/testimonials*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-comment-dots"></i> -->
                <i class="fa-solid fa-star"></i>
            </span>
            <span class="px-2">{{ trans('labels.testimonials') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/subscribers*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/subscribers') }}">
            <span class="{{ request()->is('admin/subscribers*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-envelope"></i> -->
                <i class="fa-solid fa-envelope-open-text"></i>
            </span>
            <span class="px-2">{{ trans('labels.subscribers') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/inquiries*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/inquiries') }}">

            <span class="{{ request()->is('admin/inquiries*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-id-badge"></i>
                <!-- <i class="fa-solid fa-solid fa-address-book"></i> -->
            </span>
            <span class="px-2">{{ trans('labels.inquiries') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7 dropdown multimenu">
        <a class="nav-link collapsed d-flex align-items-center justify-content-between dropdown-toggle mb-1 {{ ( request()->is('admin/`priv`acy-policy*') ||  request()->is('admin/terms-conditions*') || request()->is('admin/aboutus*') ) ? 'active' : '' }}" href="#pages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pages">
            <div class="d-flex align-items-center">
                <span class="{{ ( request()->is('admin/privacy-policy*') ||  request()->is('admin/terms-conditions*') || request()->is('admin/aboutus*') ) ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <!-- <i class="fa-solid fa-file-lines"></i> -->
                    <i class="fa-regular fa-file-lines"></i>
                </span>
                <span class="multimenu-title px-2">{{ trans('labels.cms_pages') }}</span>
            </div>
        </a>
        <ul class="collapse" id="pages">
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/privacy-policy*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/privacy-policy') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.privacypolicy') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/refund-policy*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/refund-policy') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.refund_policy') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/terms-conditions*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/terms-conditions') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.terms') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/aboutus*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/aboutus') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.about') }}</span>
                </a>
            </li>


        </ul>
    </li>
    @endif
    <li class="nav-item mt-3">
        <h6 class="text-dark fw-500 mb-2 fs-7 text-uppercase mx-3">{{ trans('labels.other') }}</h6>
    </li>
    @if (Auth::user()->type == '2')

    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)


        @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)

            @php
                                
            if (Auth::user()->allow_without_subscription == 1) {
                $blogs = 1;
            } else {
                $blogs = @helper::get_plan(Auth::user()->id)->blogs;
            }

            @endphp

            @if($blogs == 1)
                <li class="nav-item mb-2 fs-7">
                    <a class="nav-link d-flex  align-items-center {{ request()->is('admin/blogs*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/blogs') }}">
                        <span class="{{ request()->is('admin/blogs*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                            <i class="fa-solid fa-blog"></i>
                        </span>
                        <span class="nav-text px-2">{{ trans('labels.blogs') }}</span>
                        @if (env('Environment') == 'sendbox')
                        <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                        @endif
                    </a>
                </li>
            @endif

        @endif

    @else

        @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)

            <li class="nav-item mb-2 fs-7">
                <a class="nav-link d-flex  align-items-center {{ request()->is('admin/blogs*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/blogs') }}">
                    <span class="{{ request()->is('admin/blogs*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                        <i class="fa-solid fa-blog"></i>
                    </span>
                    <span class="nav-text px-2">{{ trans('labels.blogs') }}</span>
                    @if (env('Environment') == 'sendbox')
                    <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
                    @endif
                </a>
            </li>

        @endif

    @endif

    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/subscribers*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/subscribers') }}">
            <span class="{{ request()->is('admin/subscribers*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-envelope"></i>
            </span>
            <span class="px-2">{{ trans('labels.subscribers') }}</span>
        </a>
    </li>
    
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/inquiries*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/inquiries') }}">
            <span class="{{ request()->is('admin/inquiries*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-solid fa-address-book"></i>
            </span>
            <span class="px-2">{{ trans('labels.inquiries') }}</span>
        </a>
    </li>
    <li class="nav-item mb-2 fs-7 dropdown multimenu">
        <a class="nav-link collapsed d-flex align-items-center justify-content-between dropdown-toggle mb-1 {{ ( request()->is('admin/privacy-policy*') ||  request()->is('admin/terms-conditions*') || request()->is('admin/aboutus*') ) ? 'active' : '' }}" href="#pages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="pages">
            <div class="d-flex align-items-center">
                <span class="{{ ( request()->is('admin/privacy-policy*') ||  request()->is('admin/terms-conditions*') || request()->is('admin/aboutus*') ) ? 'sidebariconbox' : 'sidebariconbox1' }}">
                    <!-- <i class="fa-solid fa-file-lines"></i> -->
                    <i class="fa-regular fa-file-lines"></i>
                </span>
                <span class="multimenu-title px-2">{{ trans('labels.cms_pages') }}</span>
            </div>
        </a>
        <ul class="collapse" id="pages">
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/privacy-policy*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/privacy-policy') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.privacypolicy') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/refund-policy*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/refund-policy') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.refund_policy') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/terms-conditions*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/terms-conditions') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.terms') }}</span>
                </a>
            </li>
            <li class="nav-item ps-4 mb-1">
                <a class="nav-link {{ request()->is('admin/aboutus*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/aboutus') }}">
                    <span class="d-flex align-items-center multimenu-menu-indicator"><i class="fa-solid fa-circle-small"></i>{{ trans('labels.about') }}</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/share*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/share') }}">
            <span class="{{ request()->is('admin/share*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <i class="fa-solid fa-share-from-square"></i>
            </span>
            <span class="px-2">{{ trans('labels.share') }}</span>
        </a>
    </li>
    @endif
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/settings') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('admin/settings') }}">
            <span class="{{ request()->is('admin/settings') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-gear"></i> -->
                <i class="fa-solid fa-gears"></i>
            </span>
            <span class="px-2">{{ trans('labels.settings') }}</span>
        </a>
    </li>

    @if (Auth::user()->type == '1')
    @if (App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
    App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1)
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/language-settings*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/language-settings') }}">
            <span class="{{ request()->is('admin/language-settings*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-language"></i> -->
                <i class="fa-solid fa-language"></i>
            </span>
            <span class="nav-text px-2">{{ trans('labels.language-settings') }}</span>
            @if (env('Environment') == 'sendbox')
            <span class="badge badge bg-danger float-right mr-1 mt-1">{{ trans('labels.addon') }}</span>
            @endif
        </a>
    </li>
    @endif
    <li class="nav-item mb-2 fs-7">
        <a class="nav-link d-flex align-items-center {{ request()->is('admin/apps*') ? 'active' : '' }}" aria-current="page" href="{{ URL::to('/admin/apps') }}">
            <span class="{{ request()->is('admin/apps*') ? 'sidebariconbox' : 'sidebariconbox1' }}">
                <!-- <i class="fa-solid fa-rocket"></i> -->
                <i class="fa-solid fa-puzzle-piece"></i>
            </span>
            <span class="px-2">{{ trans('labels.addons_manager') }}</span>
        </a>
    </li>
    @endif
</ul>