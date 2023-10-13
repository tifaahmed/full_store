<div id="facebook_pixel" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items text-dark">
                <i class="fa-solid fa-chart-pie fs-5"></i>
                    <h5 class="px-2">{{ trans('labels.pixel') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('admin/settings/pixel') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.pixel_header') }}
                                        <span class="text-danger"> * </span> </label>
                                    <textarea rows="20" type="text" class="form-control" name="pixel_header"
                                        placeholder="{{ trans('labels.pixel_header') }}">{{ @$settingdata->pixel_header }}</textarea>
                                    @error('pixel_header')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.pixel_footer') }} <span
                                            class="text-danger"> * </span> </label>
                                    <textarea rows="20" type="text" class="form-control" name="pixel_footer"
                                        placeholder="{{ trans('labels.pixel_footer') }}">{{ @$settingdata->pixel_footer }}</textarea>
                                    @error('pixel_footer')
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