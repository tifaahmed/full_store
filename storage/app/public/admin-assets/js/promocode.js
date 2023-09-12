$('.type').on('change', function() {
    "use strict";
    if ($('.type').val() == '1') {
        $('#usage_limit_input').show();
    } else {
        $('#usage_limit_input').hide();
    }
}).change();