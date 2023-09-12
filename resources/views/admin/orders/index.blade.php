@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2 align-items-center">{{ request()->is('admin/report*') ? trans('labels.report') :
                trans('labels.orders') }}
            </h5>
            <div class="d-flex">
                @include('admin.layout.breadcrumb')
            </div>

        </div>
        <div class="col-12 col-md-8">
            @if (request()->is('admin/report*'))
            <form action="{{ URL::to('/admin/report') }}" class="mb-">
                <div class="input-group col-md-12 ps-0 justify-content-end">
                    <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                        <input type="date" class="form-control rounded-5 px-4 bg-white" name="startdate" @isset($_GET['startdate'])
                            value="{{ $_GET['startdate'] }}" @endisset required>
                    </div>
                    <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                        <input type="date" class="form-control rounded-5 px-4 bg-white" name="enddate" @isset($_GET['enddate'])
                            value="{{ $_GET['enddate'] }}" @endisset required>
                    </div>
                    <div class="input-group-append pb-2 pb-xl-0 px-1">
                        <button class="btn btn-primary rounded-5 px-4" type="submit">{{ trans('labels.fetch') }}</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
   
    @include('admin.orders.statistics')
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.orders.orderstable')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection