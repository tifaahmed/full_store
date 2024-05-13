<div class="col-md-12">
    <div class="row">
        <input type="hidden" id="primary_color" name="primary_color" value="<?php echo e(@$settingdata->primary_color); ?>" />

        <div class="form-group col-sm-6">
            <label class="form-label"><?php echo e(trans('labels.primary_color')); ?></label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor();">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker" class="piker-position" type="color" value="<?php echo e(@$settingdata->primary_color); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#1D5B79')">
                        <span class="p_color1 <?php echo e(@$settingdata->primary_color == '#1D5B79' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>

                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#181D31')">
                        <span class="p_color2 <?php echo e(@$settingdata->primary_color == '#181D31' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#643843')">
                        <span class="p_color3 <?php echo e(@$settingdata->primary_color == '#643843' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button primary_color" onclick="primary_color_update('#064635')">
                        <span class="p_color4 <?php echo e(@$settingdata->primary_color == '#064635' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>

        <input type="hidden" id="secondary_color" name="secondary_color" value="<?php echo e(@$settingdata->secondary_color); ?>" />
        <div class="form-group col-sm-6">
            <label class="form-label">Secondary Color</label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor2()">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker2" class="piker-position" type="color" value="<?php echo e(@$settingdata->secondary_color); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#468B97')">
                        <span class="s_color1  <?php echo e(@$settingdata->secondary_color == '#468B97' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>

                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#6096B4')">
                        <span class="s_color2  <?php echo e(@$settingdata->secondary_color == '#6096B4' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#99627A')">
                        <span class="s_color3  <?php echo e(@$settingdata->secondary_color == '#99627A' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#519259')">
                        <span class="s_color4  <?php echo e(@$settingdata->secondary_color == '#519259' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <input hidden  id="footer_background0" name="footer_background[]" value="<?php echo e(@$settingdata->footer_background_first); ?>" />
        <div class="form-group col-sm-3">
            <label class="form-label"><?php echo e(trans('labels.footer_background')); ?></label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor3();">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker3" class="piker-position" type="color" value="<?php echo e(@$settingdata->footer_background_first); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background0" onclick="footer_background_update0('#1D5B79')">
                        <span class="p_color1 <?php echo e(@$settingdata->footer_background_first== '#1D5B79' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background0" onclick="footer_background_update0('#181D31')">
                        <span class="p_color2 <?php echo e(@$settingdata->footer_background_first== '#181D31' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>

        <input hidden id="footer_background1" name="footer_background[]" value="<?php echo e(@$settingdata->footer_background_second); ?>" />
        <div class="form-group col-sm-3">
            <label class="form-label"><?php echo e(trans('labels.footer_background')); ?></label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor4();">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker4" class="piker-position" type="color" value="<?php echo e(@$settingdata->footer_background_second); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background" onclick="footer_background_update1('#1D5B79')">
                        <span class="p_color1 <?php echo e(@$settingdata->footer_background_second== '#1D5B79' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button footer_background" onclick="footer_background_update1('#181D31')">
                        <span class="p_color2 <?php echo e(@$settingdata->footer_background_second== '#181D31' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <input  hidden id="home_background_color" name="home_background_color" value="<?php echo e(@$settingdata->home_background_color); ?>" />
        <div class="form-group col-sm-3">
            <label class="form-label"><?php echo e(trans('labels.home_background_color')); ?></label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor5()">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker5" class="piker-position" type="color" value="<?php echo e(@$settingdata->home_background_color); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#468B97')">
                        <span class="s_color1  <?php echo e(@$settingdata->home_background_color == '#468B97' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button home_background_color" onclick="home_background_color_update('#6096B4')">
                        <span class="s_color2  <?php echo e(@$settingdata->home_background_color == '#6096B4' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>
        <input hidden id="web_footer_color" name="web_footer_color" value="<?php echo e($settingdata->web_footer_color); ?>" />
        <div class="form-group col-sm-3">
            <label class="form-label"><?php echo e(trans('labels.web_footer_color')); ?></label>
            <div class="row g-2">
                <div class="col-auto">
                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                        <div class="color picker form-control-color" onclick="pickColor6()">
                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'images/color.png')); ?>">
                        </div>
                        <input id="colorpicker6" class="piker-position" type="color" value="<?php echo e(@$settingdata->web_footer_color); ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="piker-button web_footer_color" onclick="web_footer_color_update('#468B97')">
                        <span class="s_color1  <?php echo e($settingdata->web_footer_color == '#468B97' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
        
                <div class="col-auto">
                    <button type="button" class="piker-button web_footer_color" onclick="web_footer_color_update('#6096B4')">
                        <span class="s_color2  <?php echo e($settingdata->web_footer_color == '#6096B4' ? 'spanactive' : ''); ?>"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function web_footer_color_update(web_footer_color)
    {
        $("#web_footer_color").val(web_footer_color);
    }
    
    function pickColor6() {
        // alert('kk');
        "use strict";
        $("#colorpicker6").click();
    }
    $(document ).ready(function() {
        $('#colorpicker6').on("change",function(){
            "use strict";
            $("#web_footer_color").val($('#colorpicker6').val());
        });
    });
</script><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/otherpages/colors.blade.php ENDPATH**/ ?>