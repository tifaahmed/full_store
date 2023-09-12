@extends('admin.layout.default')

@section('content')
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col-12 col-md-6">
            <h5 class="pages-title fs-2">{{ trans('labels.custom_domains') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-end">
                @if (Auth::user()->type == 2)
                    <a href="{{ URL::to('admin/custom_domain/add') }}"
                        class="btn-add">{{ trans('labels.request_custom_domain') }}</a>
                @endif
            </div>
        </div>

    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Auth::user()->type == 2)
                            @include('admin.customdomain.customdomain_table')
                        @endif
                        @if (Auth::user()->type == 1)
                            @include('admin.customdomain.listcustomdomain_table')
                        @endif
                    </div>
                    @if (Auth::user()->type == 2)
                        <div class="card mt-4">
                            <div class="card-header">
                                {{ $setting->cname_title }}
                            </div>
                            <div class="card-body">
                                <p class="card-text"> {!! $setting->cname_text !!}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
