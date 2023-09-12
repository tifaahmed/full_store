<div id="recaptcha" class="hidechild">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 box-shadow">
            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                <i class="fa-solid fa-gears fs-5"></i>
                    <h5 class="px-2">{{ trans('labels.cookie_recaptcha') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('admin/settings/updaterecaptcha') }}"
                        enctype="multipart/form-data">  
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.cookie_text') }}
                                        <span class="text-danger"> * </span> </label>
                                    <textarea class="form-control" name="cookie_text" id="cookie_text" placeholder="{{ trans('labels.cookie_text') }}" required>{{ @$settingdata->cookie_text }}</textarea>
                                    @error('cookie_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.cookie_button_text') }}
                                        <span class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="cookie_button_text" id="cookie_button_text" placeholder="{{ trans('labels.cookie_button_text') }}" value="{{ @$settingdata->cookie_button_text }}" required>
                                    @error('cookie_button_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.recaptcha_version') }}
                                        <span class="text-danger"> * </span> </label>
                                    <select class="form-control" name="recaptcha_version" required id="recaptcha_version">
                                        <option value="">{{ trans('labels.select') }}</option>
                                        <option value="v2" {{ @$settingdata->recaptcha_version == 'v2' ? 'selected' : '' }}>V2</option>
                                        <option value="v3" {{ @$settingdata->recaptcha_version == 'v3' ? 'selected' : '' }}>V3</option>
                                    </select>
                                    @error('recaptcha_version')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.google_recaptcha_site_key') }} <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="google_recaptcha_site_key"
                                        required value="{{ @$settingdata->google_recaptcha_site_key }}" placeholder="{{ trans('labels.google_recaptcha_site_key') }}">
                                    @error('google_recaptcha_site_key')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.google_recaptcha_secret_key') }} <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="google_recaptcha_secret_key"
                                        required value="{{ @$settingdata->google_recaptcha_secret_key }}" placeholder="{{ trans('labels.google_recaptcha_secret_key') }}">
                                    @error('google_recaptcha_secret_key')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" id="score_threshold" @if($settingdata->recaptcha_version == 'v3') @else style="display: none;" @endif>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('labels.score_threshold') }} <span
                                            class="text-danger"> * </span> </label>
                                    <input type="text" class="form-control" name="score_threshold" value="{{ @$settingdata->score_threshold }}" placeholder="{{ trans('labels.score_threshold') }}" required>
                                    <span class="text-muted"><i>reCAPTCHA v3 returns a score (1.0 is very likely a good interaction, 0.0 is very likely a bot). If the score less than or equal to this threshold, the form submission will be blocked and the message above will be displayed.</i><span>
                                    @error('score_threshold')
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