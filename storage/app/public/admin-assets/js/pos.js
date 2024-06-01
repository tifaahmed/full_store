function cleardata()
{
    $('#additems').modal('hide');
    $('#item_id').val('');
    $('#item_name').val('');
    $('#item_price').val('');
    $('#item_tax').val('');
    $('#item_image').val('');
    $('#orignal_price').val('');
    $('#qty').val('');
    $('#extras').html('');
    $('#variants').html('');
    $('#viewitem_name').html('');
    $('#viewitem_price').html('');
}

 function categories_filter(cat_id,nexturl)
 {
    $('.scroll-list').hasClass('active');
    $('.active').removeClass('active');
    $('#search-keyword').val('');

    if(cat_id == '')
    {
        $("#cat").addClass('active');
    }
    $("#cat-"+cat_id).addClass('active');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: nexturl,
        method: "get",
        data: {
            id: cat_id 
        },
        success: function (data) {  
            $("#pos-item").html('');
            $("#cat_id").val();
            $("#pos-item").html(data);
        },
        error: function (data) {
            toastr.error(wrong);
            return false;
        }
    });
 }


 

    $('#plusqty').on("click",function(){
        "use strict";
       
        var qty = parseInt($('#qty').val());
        qty = qty + 1;
        $('#qty').val(qty);
    });

    $('#minusqty').on("click",function(){
        "use strict";
        var qty = parseInt($('#qty').val());
        qty = qty - 1;
        if(qty < 1)
        {
            qty = 1;
        }
        $('#qty').val(qty);
    });
     


 

 $('#search-keyword').keyup(function(){
    "use strict";

    var cat_id = $('#cat_id').val();
    var keyword =  $('#search-keyword').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#search-url').val(),
        method: "get",
        data: {
            id: cat_id,
            keyword : keyword 
        },
        success: function (data) {  
            $("#pos-item").html('');
            $("#cat_id").val();
            $("#pos-item").html(data);
        },
        error: function (data) {
            toastr.error(wrong);
            return false;
        }
    });
 });





function addtocart(id,name,price,image,tax,qty,orignal_price) {
 
        var variants_id = $('input[name="variants"]:checked').attr("variation-id");
        var variants_name = $('input[name="variants"]:checked').attr("variants_name");
        var variants_price = $('input[name="variants"]:checked').attr("price");

        var extras_id = ($('.Checkbox:checked').map(function() {
            return this.value;
        }).get().join(', '));
        var extras_name = ($('.Checkbox:checked').map(function() {
            return $(this).attr('extras_name');
        }).get().join(', '));
        var extras_price = ($('.Checkbox:checked').map(function() {
            return $(this).attr('price');
        }).get().join(', '));
    $('.showload-' + id).show();
    $('.addcartbtn-'+ id).hide();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#addtocarturl').val(),
            data: {
                id: id,
                name: name,
                image: image,
                item_price: price,
                price: orignal_price,
                tax: tax,
                variants_id: variants_id,
                variants_name: variants_name,
                variants_price: variants_price,
                extras_id: extras_id,
                extras_name: extras_name,
                extras_price: extras_price,
                qty: qty,
              
            },
            method: 'POST', //Post method,
            success: function(response) {
                $('.showload-' + id).hide();
                $('.addcartbtn-'+ id).show();
                $('.addactive-'+id).addClass('active');
                $('#additems').modal('hide');
                $("#cartview").html('');
                $("#cartview").html(response);
                toastr.success("Add Success");
                cleardata();
            },
            error: function(response) {
                toastr.error(response.message);
            }
        })
    };


    function calladdtocart()
    {
        var id = $('#item_id').val();
        var item_name = $('#item_name').val();
        var item_price = $('#item_price').val();
        var item_qty = $('#qty').val();
        var item_image = $('#item_image').val();
        var tax = $('#item_tax').val();
        var orignal_price = $('#orignal_price').val(); 

        addtocart(id,item_name,item_price,item_image,tax,item_qty,orignal_price);
    }




    function showitems(id,item_name,item_price,language)
    {
         "use strict";
        console.log('showitems.pos.js');
         var currentSiteLang = $('#currentSiteLang').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#showitemurl').val(),

            method: "post",
            data: {
                id: id,
                current_site_lang: currentSiteLang,
                language: language,
            },
            success: function (response) {  
               var e;
               var i;
               let html = '';
               let html1 = '';
               var count_varient = 0;
               var count_extra = 0;
               let price = parseInt(item_price);
               for(e in response.variants)
               {
                count_varient = parseInt(count_varient + 1);
                     if (e == 0) 
                     {
                        var checked = "checked";
                     }
                     else
                     {
                        var checked = "";
                     }
                    
                    html += '<div><input class="form-check-input" type="radio" '+ checked + ' id="variants'+response.variants[e].id+'" name="variants" variation-id="'+response.variants[e].id+'" variants_name="'+response.variants[e].name+'" price="'+response.variants[e].price+'" onclick="pricechange()"  ><label class="form-check-label mx-1 text-primary fw-500 fs-7 " for="variants'+response.variants[e].id+'">'+ response.variants[e].name +' <span class="px-1 text-muted"> ('+ currency_formate(response.variants[e].price) +') </span></label></div>';
               }

               for(i in response.extras)
               {
                count_extra = parseInt(count_extra + 1);   
                    html1 += ' <div><input class="form-check-input border Checkbox" type="checkbox" id="Extras'+response.extras[i].id+'" name="extras[]" value="'+response.extras[i].id+'" extras_name="'+response.extras[i].name+'" price="'+response.extras[i].price+'"><label class="form-check-label mx-1 text-primary fw-500 fs-7 " for="Extras'+response.extras[i].id+'">'+response.extras[i].name+'<span class="px-1 text-muted"> ('+ currency_formate(response.extras[i].price) +') </span></label></div>';
               }

               $('#qty').val(1);
               $('#extras').html(html1);
               $('#variants').html(html);
               $('#viewitem_name').html(item_name);
               $('#viewitem_price').html(" ("+ currency_formate(item_price) + ")");
            
               if(count_extra == 0)
               {
                 $('#extras_title').html('');
               }

               if(count_varient == 0)
               {
                 $('#variants_title').html('');
               }

               $('#item_id').val(id);
               $('#item_name').val(item_name);
               $('#item_price').val(item_price);
               $('#item_tax').val(response.getitem.tax);
                $('#item_image').val(response.getitem.item_image.image_name);
                console.log(response.getitem);
                $('#item_desc').html(response.getitem.description_translated);

               $('#orignal_price').val(parseInt(item_price));

               $('#additems').modal('show');
            },
            error: function (response) {
                toastr.error(wrong);
                return false;
            }
        });

    }


 
var variants = document.getElementsByName('variants');

function pricechange()
{
    var variant_price = $('input[name="variants"]:checked').attr("price");
    $('#viewitem_price').html(" ("+ currency_formate(variant_price) + ")");
}



   


function RemoveCart(cart_id) {
        "use strict";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-1',
                cancelButton: 'btn btn-danger bg-danger mx-1'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            icon: 'error',
            title: title,
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: yes,
            cancelButtonText: no,
            reverseButtons: true,
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: $('#deletecarturl').val(),
                        data: {
                            cart_id: cart_id
                        },
                        method: 'POST',
                        success: function(response) {
                            if (response.status == 1) {
                                location.reload();
                            } else {
                                swal("Cancelled", "{{ trans('messages.wrong') }} :(",
                                    "error");
                            }
                        },
                        error: function(e) {
                            swal("Cancelled", "{{ trans('messages.wrong') }} :(",
                                "error");
                        }
                    });
                });
            },
        }).then((result) => {
            if (!result.isConfirmed) {
                result.dismiss === Swal.DismissReason.cancel
            }
        })
    }



    function placeorder()
    {
        var discount_amount = $('#discount_amount').val();
        var customer = $('#customer').val();
        var payment_type = $('input[name="payment_type"]:checked').val();
        var order_type = $('input[name="order_type"]:checked').val();
        var sub_total = $('#sub_total').val();
        var tax = $('#tax_data').val();
        var grand_total = $('#grand_total').val();
      
        $('#peyment_methed').modal('hide');

        // alert(discount_amount + " - customer -  " + customer + " - payment type -- " + payment_type + " - sub_total -- " + sub_total + " - tax -- " + tax + " - grandtotal-- " + grand_total);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('#orderurl').val(),
                data: {
                    discount_amount : discount_amount,
                    customer : customer,
                    payment_type : payment_type,
                    sub_total : sub_total,
                    tax : tax,
                    grand_total : grand_total,
                    order_type : order_type,
                },
                method: 'POST',
                success: function(response) {
                    $("#cartview").html('');
                        $("#cartview").html(response);
                        toastr.success("Order Placed!!");
                        $('#pos-invoice').modal('show');
                    
                },
                error: function(e) {
                    swal("Cancelled", "{{ trans('messages.wrong') }} :(",
                        "error");
                }
            });
}