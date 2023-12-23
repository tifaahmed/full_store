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
     

function addtocart(id,name,price,image,tax,qty,orignal_price) {
       "use strict";
        var variants_id = $('input[name="variants"]:checked').attr("variation-id");
        var variants_name = $('input[name="variants"]:checked').attr("variants_name");
        var variants_price = $('input[name="variants"]:checked').attr("price");
        var vendor_id = $('#vendor_id').val();
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
                vendor_id : vendor_id,
              
            },
            method: 'POST', //Post method,
            success: function(response) {
                $('.showload-'+id).hide();
                $('.addcartbtn-'+ id).show();
                $('.addactive-'+id).addClass('active');
                $('#additems').modal('hide');
                $('#cartcount').html(response.totalcart);
                $('#cartcount_mobile').html(response.totalcart);
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
        "use strict";
        var id = $('#item_id').val();
        var item_name = $('#item_name').val();
        var item_price = $('#item_price').val();
        var item_qty = $('#qty').val();
        var item_image = $('#item_image').val();
        var tax = $('#item_tax').val();
        var orignal_price = $('#orignal_price').val(); 

        addtocart(id,item_name,item_price,item_image,tax,item_qty,orignal_price);
    }

 function showitems(id,item_name,item_price)
 {
    "use strict";
    var message = 'I am interested for this item : ';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#showitemurl').val(),
        method: "post",
        data: {
            id: id,
        },
        success: function (response) {  
            console.log(response.variants);
           var e;
           var i;
           var u;
           let html = '';
           let html1 = '';
           let html2 = '';
           let html3 = '';
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

                html += ''+
                '<div class="col-12">'+
                    '<input class="form-check-input" type="radio" '+ checked +
                    'id="variation-'+response.variants[e].id+'" name="variants"' +
                    'variation-id="'+response.variants[e].id+'" '+
                    'variants_name="'+response.variants[e].name_translated+'" '+
                    'price="'+response.variants[e].price+'" >'+
                    '<label class="form-check-label" for="variation-'+response.variants[e].id+'">'+ response.variants[e].name_translated +
                        '<span>('+ currency_formate(response.variants[e].price) +')</span>'+
                    '</label>'+
                '</div>';    
            }

           for(i in response.extras)
           {
            count_extra = parseInt(count_extra + 1);   

                html1 += '<div class="col-12"><input class="form-check-input border Checkbox" type="checkbox" id="extrasitems-'+ response.extras[i].id +'" name="extras[]" value="'+response.extras[i].id+'" extras_name="'+response.extras[i].name_translated+'" price="'+response.extras[i].price+'" ><label class="form-check-label" for="extrasitems-'+ response.extras[i].id +'">'+response.extras[i].name_translated+'<span>('+ currency_formate(response.extras[i].price) +')</span></label></div>'

           }

           if(response.itemimages != '')
           {
                for(u in response.itemimages)
                {
                    if (u == 0) 
                    {
                        var checked = "active";
                        var yes = "true";
                        var itemimage = response.itemimages[u].image;
                    }
                    else
                    {
                        var checked = "";
                        var yes = "";
                    }
                    html2 += '<div class="carousel-item '+checked+'"><img src="'+response.itemimages[u].image_url+'" class="d-block w-100 rounded-5" alt="..."></div>';

                    html3 += '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'+ u +'" class="'+checked+'" aria-current="'+yes+'" aria-label="Slide '+ u +'"></button>'
                }
           }
           else{
                    html2 += '<div class="carousel-item active"><img src="'+response.getitem.image_url+'" class="d-block w-100 rounded-5" alt="..."></div>';
                    var itemimage = response.getitem.image;
               }

              
           $('#qty').val(1);
           $('#item_images').html(html2);
           $('#image_buttons').html(html3);
           $('#extras').html(html1);
           $('#variants').html(html);
           $('#viewitem_name').html(item_name);
           $('#item_desc').html(response.getitem.description);
           $('#viewitem_price').html(currency_formate(item_price));

           if(response.getitem.item_original_price != '')
           {
             if(response.getitem.item_original_price != null)
             {
                $('#viewitem_originalprice').html( currency_formate(response.getitem.item_original_price));
             }
             else
             {
                $('#viewitem_originalprice').html('');
             }
           
           }
          
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
           $('#item_image').val(itemimage);
           
           message += ''+ item_name + ' - ' + currency_formate(item_price);
           $('#orignal_price').val(parseInt(item_price));
           $('#enquiries').attr('href', 'https://api.whatsapp.com/send?phone='+whatsappnumber+'&text='+message+'');

           $('#additems').modal('show');
        },
        error: function (response) {
            toastr.error(wrong);
            return false;
        }
    });   
 }

 function showextra(variants_name,variants_price,extras_name,extras_price,item_name)
 {
    "use strict";
    $('#cart_extras_title').html('');
    $('#cart_variants_title').html('');
    var h1 = '';
    var h2 = '';
    if(variants_name != '' && variants_price != '')
    {
        h1 += '<div class="col-12"><label class="form-check-label mx-0" for="ex-radio-1">'+ variants_name +'<span>'+ currency_formate(variants_price) +'</span></label></div>';
        $('#cart_variants_title').html('Variants');
    }
    if(extras_name != '' && extras_price != '')
    {
        $.each(extras_name.split(','), function(key, value) {
            h2 += '<div class="col-12"><label class="form-check-label mx-0" for="ex-check-1">'+ value +'<span>'+ currency_formate(extras_price.split(',')[key]) +'</span></label></div>';
        });

        $('#cart_extras_title').html('Extras');
    }
    $('#cart_variants').html(h1);
    $('#cart_extras').html(h2);
    $('#cart_item_name').html(item_name);
    $('#customisation').modal('show');
 }

 function qtyupdate(cart_id, item_id, type) {
    var qtys = parseInt($("#number_" + cart_id).val());
    var item_id = item_id;
    var cart_id = cart_id;
    if (type == "minus") {
        qty = qtys - 1;
    } else {
        qty = qtys + 1;
    }
    if (qty >= "1") {
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $('#qtyupdate_url').val(),
            data: {
                cart_id: cart_id,
                qty: qty,
                item_id: item_id,
                type:type, 
            },
            method: 'POST',
            success: function(response) {
                if (response.status == 1) {
                    location.reload();
                } else {
                    $('#preloader').hide();
                    $('#ermsg').text(response.message);
                    $('#error-msg').addClass('alert-danger');
                    $('#error-msg').css("display", "block");
                    setTimeout(function() {
                        $("#success-msg").hide();
                    }, 5000);
                }
            },
            error: function(error) {}
        });
    } else {
        // $('#preloader').show();
        if (qty < "1") {
            $('#ermsg').text("You've reached the minimum units allowed for the purchase of this item");
            $('#error-msg').addClass('alert-danger');
            $('#error-msg').css("display", "block");
            setTimeout(function() {
                $("#error-msg").hide();
            }, 5000);
        }
    }
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
        title: are_you_sure,
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
                    url: $('#removecart').val(),
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


function removefavorite(vendor_id,slug, type, manageurl) {
 
    "use strict";
    $("#preload").show();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: manageurl,
        data: {
            slug: slug,
            type: type,
            favurl: manageurl,
            vendor_id : vendor_id
        },
        method: 'POST',
        success: function (response) {
          
            location.reload();
           
        },
        error: function (e) {
            $("#preload").hide();
            return false;
        }
    });
}

