$(document ).ready(function() {
    $('#settingmenuContent').find('.hidechild').addClass('d-none');
   
    $('#settingmenuContent :first-child').removeClass('d-none');
});


$('.basicinfo').on('click', function() {

    "use strict";

    $('#settingmenuContent').find('.hidechild').addClass('d-none');
    $('#'+$(this).attr('data_attribute')).removeClass('d-none');

    $('.list-options').find('.active').removeClass('active');

    $(this).addClass('active');

});

function show_feature_icon(x){

    "use strict";

    $(x).next().html($(x).val())

}

var id = 1;

function add_features(icon, title, description) {

    "use strict";

    var html = '<div class="row remove' + id + '"><div class="col-md-3 form-group"><div class="input-group"><input type="text" class="form-control feature_icon mb-0" onkeyup="show_feature_icon(this)" name="feature_icon[]" placeholder="' + icon + '" required><p class="input-group-text"></p></div></div><div class="col-md-3 form-group"><input type="text" class="form-control" name="feature_title[]" placeholder="' + title + '" required></div><div class="col-md-5 form-group"><input type="text" class="form-control" name="feature_description[]" placeholder="' + description + '" required></div><div class="col-md-1 form-group"> <button class="btn btn-danger btn-sm rounded-5 pricebtn" type="button" onclick="remove_features(' + id + ')"><i class="fa-sharp fa-solid fa-xmark"></i></button></div></div>';

    $('.extra_footer_features').append(html);

    $(".feature_required").prop('required',true);

    id++;

}

function remove_features(id) {

    "use strict";

    $('.remove' + id).remove();

    if ($('.extra_footer_features .row').length == 0) {

        $(".feature_required").prop('required',false);

    }

}


$(function() {
    //bg color selector
    $(".color").click(function() {
        var color = $(this).attr("data-value");
        $("body").css("background-color", color);
    });

       //add color picker if supported
      

});


// button color piker active js

var selector1 = '.secondary_color span';
$(selector1).on('click', function() {
    "use strict";
    $(selector1).removeClass('spanactive');
    $(this).addClass('spanactive');
});

var selector = '.primary_color span';
$(selector).on('click', function() {
    "use strict";
    $(selector).removeClass('spanactive');
    $(this).addClass('spanactive');
});


$('#colorpicker2').on("change",function()
{
    "use strict";
    $("#secondary_color").val($('#colorpicker2').val());
});

$('#colorpicker').on("change",function()
{
    "use strict";
    $("#primary_color").val($('#colorpicker').val());
});

$('#colorpicker2_landing').on("change",function()
{
    "use strict";
    $("#secondary_color_admin").val($('#colorpicker2_landing').val());
});

$('#colorpicker_landing').on("change",function()
{
    "use strict";
    $("#primary_color_admin").val($('#colorpicker_landing').val());
});


function pickColor() {
    "use strict";
    $("#colorpicker").click();
}

function pickColor2() {
    "use strict";
    $("#colorpicker2").click();
}

function pickColor_admin() {
    "use strict";
    $("#colorpicker_landing").click();
}

function pickColor2_admin() {
    "use strict";
    $("#colorpicker2_landing").click();
}

function secondary_color_update(secondary_color)
{
    "use strict";
    $("#secondary_color").val(secondary_color);
}

function secondary_color_update1(secondary_color1)
{
    "use strict";
    $("#secondary_color_admin").val(secondary_color1);
}

function primary_color_update(primary_color)
{
    "use strict";
    $("#primary_color").val(primary_color);
}
function primary_color_update1(primary_color1)
{
    "use strict";
    $("#primary_color_admin").val(primary_color1);
}