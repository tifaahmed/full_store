@extends('admin.layout.default')
@section('content')
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-12 col-md-4">
                <h5 class="pages-title fs-2">{{ trans('labels.banner') }}</h5>
                @include('admin.layout.breadcrumb')
            </div>
            <div class="col-6 col-md-8">
                <div class="d-flex justify-content-end">
                    <a href="{{ URL::to(request()->url() . '/add') }}" class="btn-add">
                        <i class="fa-regular fa-plus mx-1"></i>{{ trans('labels.add') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-12">
                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('admin.banner.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection