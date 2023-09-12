@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2">{{ trans('labels.addons_manager') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
    <div class="col-12 col-md-8">
        <div class="d-flex justify-content-end">
            <a href="{{ URL::to('/admin/createsystem-addons') }}" class="btn btn-primary">
                {{ trans('labels.install_update_addons') }}
            </a>
        </div>
    </div>
</div>
<div class="card mb-3 border-0 shadow">
    <div class="card-body py-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6">
                <h5 class="card-title mb-1 fw-bold">Buy More Premium Addons</h5>
                <p class="text-muted fw-medium">Connect your favorite tools.</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-3">
                <a href="https://rb.gy/40qzq" target="_blank" class="btn btn-primary">Buy More Premium Addons</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-7">
    <div class="col-md-12">
        <div class="card border-0 mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-1 fw-bold">Installed Addons </h5>
                    @if (env('Environment')=='sendbox' )
                    <p class="fw-bolder d-flex align-items-center gap-2 border border-dark p-2 rounded-2 ">
                        <span class="badge badge icon_circle text-success border border-dark icon_circle">
                            <i class="fa-solid fa-bolt fs-6"></i>
                        </span>
                        Free with Extended License
                        <span class="badge badge icon_circle text-danger border border-dark icon_circle">
                            <i class="fa-solid fa-money-check-dollar fs-6"></i>
                        </span>
                        Premium 
                    </p>
                    @endif
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3 addons-manager ">
                    @forelse(App\Models\SystemAddons::where('unique_identifier', '!=' ,'subscription')->get() as $key => $addon)
                    <div class="col col-md-6 col-lg-6 col-xl-3">
                        <div class="card h-100 rounded-3">
                            <img src="{!! URL('storage/app/public/addons/' . $addon->image) !!}" alt="">

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">

                                    <span class="badge bg-primary mb-2 fw-400 fs-8">{{ $addon->version }}</span>
                                    @if (env('Environment')=='sendbox' )
                                    <p class="fw-bolder d-flex align-items-center gap-2">
                                        @if ($addon->type == 1)
                                        <span class="badge badge icon_circle text-success border border-dark icon_circle" tooltip="Free with Extended License">
                                            <i class="fa-solid fa-bolt fs-6"></i>
                                        </span>
                                        @else
                                        <span class="badge badge icon_circle text-danger border border-dark icon_circle" tooltip="Premium">
                                            <i class="fa-solid fa-money-check-dollar fs-6"></i>
                                        </span>
                                        @endif
                                    </p>
                                    @endif
                                </div>
                                <h5 class="card-title fw-600 fs-5 line-limit-2">{{ ucfirst($addon->name) }}</h5>
                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                <p class="text-muted fs-7 fw-500">
                                    {{ date('d M Y', strtotime($addon->created_at)) }}
                                </p>
                                @if ($addon->activated == 1)
                                <a @if (env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/systemaddons/status-' . $addon->id . '/2') }}')" @endif class="btn btn-sm btn-success {{ session()->get('direction') == 2 ? 'float-start' : 'float-end' }}">{{ trans('labels.activated') }}</a>
                                @else
                                <a @if (env('Environment')=='sendbox' ) onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/systemaddons/status-' . $addon->id . '/1') }}')" @endif class="btn btn-sm btn-danger {{ session()->get('direction') == 2 ? 'float-start' : 'float-end' }}">{{ trans('labels.deactivated') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col col-md-12 text-center text-muted">
                        <h4>{{ trans('labels.no_data') }}</h4>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/assets/js/custom/systemaddons.js') }}"></script>
@endsection