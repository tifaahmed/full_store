<div class="col-md-12">
    <div class="row">
        <input type="hidden" id="primary_color" name="primary_color" value="{{ @$settingdata->primary_color }}" />

        <div class="form-group col-sm-6">
            <label class="form-label">{{ trans('labels.primary_color') }}</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor();">
                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                        </div>
                        <input id="colorpicker" class="piker-position" type="color" value="{{ @$settingdata->primary_color }}">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#1D5B79')">
                        <span class="p_color1 {{ @$settingdata->primary_color == '#1D5B79' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>

                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#181D31')">
                        <span class="p_color2 {{ @$settingdata->primary_color == '#181D31' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#643843')">
                        <span class="p_color3 {{ @$settingdata->primary_color == '#643843' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#064635')">
                        <span class="p_color4 {{ @$settingdata->primary_color == '#064635' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
            </div>
        </div>

        <input type="hidden" id="secondary_color" name="secondary_color" value="{{ @$settingdata->secondary_color }}" />
        <div class="form-group col-sm-6">
            <label class="form-label">Secondary Color</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor2()">
                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                        </div>
                        <input id="colorpicker2" class="piker-position" type="color" value="{{ @$settingdata->secondary_color }}">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#468B97')">
                        <span class="s_color1  {{ @$settingdata->secondary_color == '#468B97' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>

                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#6096B4')">
                        <span class="s_color2  {{ @$settingdata->secondary_color == '#6096B4' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#99627A')">
                        <span class="s_color3  {{ @$settingdata->secondary_color == '#99627A' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#519259')">
                        <span class="s_color4  {{ @$settingdata->secondary_color == '#519259' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <input hidden  id="footer_background0" name="footer_background[]" value="{{ @$settingdata->footer_background_first }}" />
        <div class="form-group col-sm-3">
            <label class="form-label">{{ trans('labels.footer_background') }}</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor3();">
                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                        </div>
                        <input id="colorpicker3" class="piker-position" type="color" value="{{ @$settingdata->footer_background_first}}">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background0" onclick="footer_background_update0('#1D5B79')">
                        <span class="p_color1 {{ @$settingdata->footer_background_first== '#1D5B79' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background0" onclick="footer_background_update0('#181D31')">
                        <span class="p_color2 {{ @$settingdata->footer_background_first== '#181D31' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
            </div>
        </div>

        <input hidden id="footer_background1" name="footer_background[]" value="{{ @$settingdata->footer_background_second }}" />
        <div class="form-group col-sm-3">
            <label class="form-label">{{ trans('labels.footer_background') }}</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor4();">
                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                        </div>
                        <input id="colorpicker4" class="piker-position" type="color" value="{{ @$settingdata->footer_background_second}}">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background" onclick="footer_background_update1('#1D5B79')">
                        <span class="p_color1 {{ @$settingdata->footer_background_second== '#1D5B79' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background" onclick="footer_background_update1('#181D31')">
                        <span class="p_color2 {{ @$settingdata->footer_background_second== '#181D31' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <input  hidden id="home_background_color" name="home_background_color" value="{{ @$settingdata->home_background_color }}" />
        <div class="form-group col-sm-6">
            <label class="form-label">{{ trans('labels.home_background_color') }}</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor5()">
                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                        </div>
                        <input id="colorpicker5" class="piker-position" type="color" value="{{ @$settingdata->home_background_color }}">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#468B97')">
                        <span class="s_color1  {{ @$settingdata->home_background_color == '#468B97' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#6096B4')">
                        <span class="s_color2  {{ @$settingdata->home_background_color == '#6096B4' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#99627A')">
                        <span class="s_color3  {{ @$settingdata->home_background_color == '#99627A' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#519259')">
                        <span class="s_color4  {{ @$settingdata->home_background_color == '#519259' ? 'spanactive' : '' }}"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>