<div id="custom_domain" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                    <i class="fa-solid fa-globe fs-5"></i>
                    <h5 class="px-2">{{ trans('labels.custom_domain') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('admin/settings/updatecustomedomain') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ trans('labels.cname_section_title') }}
                                        <span class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="cname_title"
                                        required value="{{ @$settingdata->cname_title }}" required>
                                    @error('cname_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ trans('labels.cname_section_text') }}
                                        <span class="text-danger"> * </span> </label>
                                    <textarea class="form-control" rows="3" id="cname_text" required name="cname_text" required>{{ @$settingdata->cname_text }}</textarea>
                                    @error('cname_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-success btn-succes mt-3"
                                    @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit"  @endif>{{ trans('labels.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>