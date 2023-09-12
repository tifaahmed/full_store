<div id="google_analytics" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items text-dark">
                <i class="fa-solid fa-chart-pie fs-5"></i>
                    <h5 class="px-2">{{ trans('labels.google_analytics') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('admin/settings/updateanalytics') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.tracking_id') }}
                                        <span class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="tracking_id"
                                        required value="{{ @$settingdata->tracking_id }}" placeholder="{{ trans('labels.tracking_id') }}">
                                    @error('tracking_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.view_id') }} <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="view_id"
                                        required value="{{ @$settingdata->view_id }}" placeholder="{{ trans('labels.view_id') }}">
                                    @error('view_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes mt-3"
                                    @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>