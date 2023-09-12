@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.welcome_dashboard') }}</h5>
        </div>
    </div>
<div class="row mb-0 mb-md-4">
    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card h-100 border-0 shadow desh_left">
            <div class="card-body p-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6">
                        <h4 class="card-title fw-600 fs-2">{{ trans('labels.quick_access_card_title') }}</h4>
                        <p class="card-text pb-3">
                            {{ trans('labels.quick_access_card_description') }}
                        </p>
                        <div class="dropwdown d-inline-block">
                            <a class="btn bg-white border-0 dropwdown-desh-card" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="ms-1">{{ trans('labels.quick_access') }}</span>
                                <i class="fa-regular fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu shadow border-0">

                                {{-- for Admin  --}}

                                @if(Auth::user()->type == 1)
                                    <a href="{{URL::to('admin/users')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        {{ trans('labels.restaurants') }}
                                    </a>

                                    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                                        <a href="{{URL::to('admin/plan')}}" class="dropdown-item d-flex align-items-center px-3 py-2">        
                                            {{ trans('labels.pricing_plans') }}
                                        </a>
                                    @endif

                                    <a href="{{URL::to('admin/transaction')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        {{ trans('labels.transaction') }}
                                    </a>    
                                @endif

                                {{-- for  vendor  --}}

                                @if(Auth::user()->type == 2)
                                    <a href="{{URL::to('admin/categories')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        {{ trans('labels.category') }}
                                    </a>
                                    <a href="{{URL::to('admin/products')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        {{ trans('labels.products') }}
                                    </a>
                                    <a href="{{URL::to('admin/orders')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                        {{ trans('labels.orders') }}
                                    </a>
                                @endif

                                {{-- common for admin & vendor  --}}

                                <a href="{{URL::to('admin/settings')}}" class="dropdown-item d-flex align-items-center px-3 py-2">
                                    {{ trans('labels.setting') }}
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end">
                        <img src="{{ url(env('ASSETSPATHURL') . 'admin-assets/images/about/seo-dashboard.png') }}" alt="" class="desh-chart-img d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-6 mt-4 mt-xl-0">
        <div class="row h-100">
            @if (Auth::user()->type == 1)
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard1">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == '2' ? 'text-start' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.users') }}</p>
                                <h4 class="text-dark fw-bold fs-2">{{ $totalvendors }}</h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-user-plus fs-5"></i>
                            </span>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard2">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.pricing_plans') }}</p>
                                <h4 class="text-dark fw-bold fs-2">{{ $totalplans }}</h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-regular fa-medal fs-5"></i>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endif
            @if (Auth::user()->type == 2)
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard02">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == '2' ? 'text-end' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.products') }}</p>
                                <h4 class="text-dark fw-bold fs-2">{{ $totalvendors }}</h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-list-timeline fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card border-0 box-shadow h-100 deshcard03">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == '2' ? 'text-end' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.current_plan') }}</p>
                                @if (!empty($currentplanname))
                                <h4 class="text-dark fw-bold fs-2"> {{ @$currentplanname->name }} </h4>
                                @else
                                <i class="fa-regular fa-exclamation-triangle h4 text-muted"></i>
                                @endif
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-cart-flatbed-suitcase fs-5"></i>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="card h-100 border-0 box-shadow deshcard3">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">
                                    {{ Auth::user()->type == 1 ? trans('labels.transaction') : trans('labels.orders') }}
                                </p>
                                <h4 class="text-dark fw-bold fs-2">{{ $totalorders }}</h4>
                            </span>
                            <span class="card-icon">
                                @if (Auth::user()->type == 1)
                                <i class="fa-solid fa-chart-line fs-5"></i>
                                @else
                                <i class="fa-regular fa-cart-shopping fs-5"></i>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-0">
                <div class="card h-100 border-0 box-shadow deshcard4">
                    <div class="card-body">
                        <div class="dashboard-card">
                            <span class="{{ session()->get('direction') == 2 ? 'text-end' : 'text-start' }}">
                                <p class="fw-semibold fs-5 mb-1 text-dark">{{ trans('labels.revenue') }}</p>
                                <h4 class="text-dark fw-bold fs-2">{{ helper::currency_formate($totalrevenue, Auth::user()->id) }}</h4>
                            </span>
                            <span class="card-icon">
                                <i class="fa-solid fa-chart-pie fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">{{ trans('labels.revenue') }}</h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="revenueyear"
                            data-url="{{ URL::to('/admin/dashboard') }}">
                            @if (count($revenue_years) > 0 && !in_array(date('Y'), array_column($revenue_years->toArray(), 'year')))
                                <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                            @endif
                            @forelse ($revenue_years as $revenue)
                                <option value="{{ $revenue->year }}" {{ date('Y') == $revenue->year ? 'selected' : '' }}>
                                    {{ $revenue->year }}
                                </option>
                            @empty
                                <option value="" selected disabled>{{ trans('labels.select') }}</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="revenuechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6 mb-4">
            <div class="card border-0 box-shadow h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            {{ Auth::user()->type == 1 ? trans('labels.users') : trans('labels.orders') }}</h5>
                        <select class="form-select form-select-sm w-auto selectdrop" id="doughnutyear"
                            data-url="{{ request()->url() }}">
                            @if (count($doughnut_years) > 0 && !in_array(date('Y'), array_column($doughnut_years->toArray(), 'year')))
                                <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                            @endif
                            @forelse ($doughnut_years as $useryear)
                                <option value="{{ $useryear->year }}"
                                    {{ date('Y') == $useryear->year ? 'selected' : '' }}>{{ $useryear->year }}
                                </option>
                            @empty
                                <option value="" selected disabled>{{ trans('labels.select') }}</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="row">
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <h5 class="pages-title fs-2 py-2">
                {{ Auth::user()->type == 1 ? trans('labels.today_transaction') : trans('labels.processing_orders') }}
            </h5>
        </div>
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Auth::user()->type == 1)
                            @include('admin.dashboard.admintransaction')
                        @else
                            @include('admin.orders.orderstable')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!--- Admin -------- users-chart-script --->
    <!--- VendorAdmin -------- orders-count-chart-script --->
    <script type="text/javascript">
        var doughnut = null;
        var doughnutlabels = {{ Js::from($doughnutlabels) }};
        var doughnutdata = {{ Js::from($doughnutdata) }};
    </script>
    <!--- Admin ------ revenue-by-plans-chart-script --->
    <!--- vendorAdmin ------ revenue-by-orders-script --->
    <script type="text/javascript">
        var revenuechart = null;
        var labels = {{ Js::from($revenuelabels) }};
        var revenuedata = {{ Js::from($revenuedata) }};
    </script>
    <script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/dashboard.js') }}"></script>
@endsection
