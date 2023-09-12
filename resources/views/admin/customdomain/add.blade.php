@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.add_new') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="alert alert-
                    ">
                        <small>You already have a custom domain
                            (<a target="_blank" href="//{{ helper::appdata(Auth::user()->id)->custom_domain }}">{{ empty(helper::appdata(Auth::user()->id)->custom_domain) ? '-' : helper::appdata(Auth::user()->id)->custom_domain }}</a>)
                            connected with your website. <br>
                            if you request another domain now &amp; if it gets connected with our server, then
                            your current domain
                            (<a target="_blank" href="//{{ helper::appdata(Auth::user()->id)->custom_domain }}">{{ empty(helper::appdata(Auth::user()->id)->custom_domain) ? '-' : helper::appdata(Auth::user()->id)->custom_domain }}</a>)
                            will be removed.</small>
                    </div>
                    <form class="col-md-12 my-2" action="{{ URL::to('admin/custom_domain/save') }}">
                        <div class="my-2">
                            <label for="custom_domain"> {{ trans('labels.custom_domains') }}</label>
                            <input type="text" name="custom_domain" class="form-control" placeholder="{{ trans('labels.custom_domains') }}" required>
                            @error('custom_domain')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <p class="mb-0"><i class="fas fa-exclamation-circle"></i> Do not use
                            <strong class="text-danger">http://</strong> or <strong class="text-danger">https://</strong>
                        </p>
                        <p class="mb-0 mb-2"><i class="fas fa-exclamation-circle"></i>
                            The valid format will be exactly like this one - <strong class="text-danger">domain.tld,
                                www.domain.tld</strong> or <strong class="text-danger">subdomain.domain.tld,
                                www.subdomain.domain.tld</strong>
                        </p>
                        <div class="form-group text-end">
                            <a href="{{ URL::to('admin/custom_domain') }}" class="btn btn-danger btn-cancel m-1">{{ trans('labels.cancel') }}</a>
                            <button @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif class="btn btn-success btn-succes m-1 ">{{ trans('labels.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection