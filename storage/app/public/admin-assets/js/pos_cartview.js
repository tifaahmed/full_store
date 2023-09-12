$('#customer1').on("change",function(){
    $('#customer_info').val($('#customer1').val());
});

$('#customer').on("change",function(){
    $('#customer_info').val($('#customer').val());
});

$('.discount_amount').keyup(function()
    {
    $('#discount').val($(this).val());
    $('#discount1').val($(this).val());
    
        var discount = $('#discount').val();
        var grand_total = $('#grand_total1').val();
        var sub_total = $('#sub_total').val();

        if(discount == '')
        {
            discount = 0;
        }

        if(parseFloat(sub_total - discount) >= 0)
        {
            $('.show_discount_amount').html(currency_formate(discount));
            $('#discount_amount').val(discount);

            $('.total_amount').html(currency_formate(parseFloat(grand_total - discount)));
            $('#grand_total').val(parseFloat(grand_total - discount));

        }
        else
        {
            $('.show_discount_amount').html(currency_formate(0));
            $('#discount_amount').val(0);

            $('.total_amount').html(currency_formate(parseFloat(grand_total)));
            $('#grand_total').val(parseFloat(grand_total));
            toastr.error('Discount amnount must be less than sub total');
        }

    });


function showaddons(name, price) {
    
    $('#modal_selected_addons').find('.list-group-flush').html(
        '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'
    );
    var response = '';
    $.each(name.split(','), function(key, value) {
        response += '<li class="list-group-item"> <b> ' + value + ' </b> <p class="mb-0">' +
            currency_formate(price.split(',')[key]) + '</p> </li>';
    });
    $('#modal_selected_addons').find('.list-group-flush').html(response);
    $('#modal_selected_addons').modal('show');
}


function qtyupdate(id, type, qtyurl) {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: qtyurl,
        data: {
            id: id,
            type: type
        },
        method: 'POST',
        success: function (response) {
            $("#cartview").html('');
            $("#cartview").html(response);
            
        },
        error: function (e) {
            $('#preload').hide();
            $('.err' + id).html(e.message);
            return false;
        }
    });
}