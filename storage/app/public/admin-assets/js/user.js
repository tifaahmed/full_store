
$("#allow_store_subscription").on('change',function() {
    "use strict";
    if($(this).prop('checked')) {
       $('#plan').addClass('d-none');
       $("#plan_checkbox").prop("checked", false);
    } else {
        $('#plan').removeClass('d-none');
        $('#plan').addClass('d-block');
    }
}).change();

$("#plan_checkbox").on('change',function() {
    "use strict";
    if($(this).prop('checked')) {
        $('#selectplan').prop("disabled", false);
    }
    else
    {
        $('#selectplan').prop("disabled", true);
    }
}).change();

$("#city").change(function() {
  $("#area").empty();
  var areaselect ;
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: areaurl,
    type: "post",
    dataType: "json",
    data: {
      city: $(this).val()
    },
    success: function(result){
        $('#area').html('<option value="">' + select + '</option>'); 
        $.each(result.area,function(key,value){
          if(areaid == value.id)
          {
             areaselect = "selected"; 
          }
          else
          {
            areaselect ="";
          }
        $("#area").append('<option value="'+ value.id +'"'+ areaselect + '>'+ value.area +'</option>');
        });
        }
  });
}).change();