// common
$('.has_variants').on('change', function () {
    "use strict";
    check_variation_validation($(this).val())
});
$('.has_variants:checked').on('change', function () {
    "use strict";
    check_variation_validation($(this).val())
}).change();
function check_variation_validation(value) {
    "use strict";
    if (value == 1) {
        document.getElementById('price_row').style.display = 'none';
        if (location.href.includes("add") == true) {
            document.getElementById('variations').style.display = 'flex';
        } else {
            document.getElementById('variations').style.display = 'grid';
        }
        $('.variations, .btn-add-variations').show();
        $(".variation , .variation_price, .variation_original_price").prop('required', true);
        $("#price, #original_price").prop('required', false);
    } else {
        document.getElementById('price_row').style.display = 'flex';
        document.getElementById('variations').style.display = 'none';
        $('.variations, .btn-add-variations').hide();
        $(".variation , .variation_price, .variation_original_price").prop('required', false);
        $("#price, #original_price").prop('required', true);
        $('#more_variation_fields').html('');
        $('#edititem_fields').html('');
    }
}
$(function () {
    $('#image').on('change', function () {
        "use strict";
        if (this.files) {
            var filesAmount = this.files.length;
            $('div.gallery').html('');
            $('div.gallery').addClass('row my-2');
            var n = 0;
            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<div>')).attr('class', 'col-lg-2 col-md-3 col-4 text-center').html('<img src="' + event.target.result + '" class="img-fluid w-auto rounded-3 mt-3">').appendTo('div.gallery');
                    n++;
                }
                reader.readAsDataURL(this.files[i]);
            }
        }
    });
});

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-1',
        cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
})

function swal_cancelled(issettitle) {
    "use strict";
    var title = wrong;
    if (issettitle) {
        title = "" + issettitle + "";
    }
    swalWithBootstrapButtons.fire('Cancelled', title, 'error')
};


// for add PRODUCT
var variation_row = 1;
function variation_fields(variation, price, original_price) {
    "use strict";
    variation_row++;
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group mb-0 removeclass" + variation_row);
    divtest.innerHTML = '<div class="row variations"><div class="col-md-4"><div class="form-group"><input type="text" class="form-control variation" name="variation[]" placeholder="' + variation + '" required></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control numbers_only variation_price" name="variation_price[]" placeholder="' + price + '" required></div></div><div class="col-md-4"><div class="form-group d-flex"><input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[]" placeholder="' + original_price + '" required><button class="btn btn-danger btn-sm rounded-5 ms-2 pricebtn" type="button" onclick="remove_variation_fields(' + variation_row + ');"><i class="fa-sharp fa-solid fa-xmark"></i></button> </div></div><div class="col-m d-1 d-flex align-items-end p-md-0"></div></div>';
    $('#more_variation_fields').append(divtest)
}
function remove_variation_fields(rid) {
    "use strict";
    $('.removeclass' + rid).remove();
}
var extras_row = 1;
function extras_fields(name, price) {
    "use strict";
    extras_row++;
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group mb-0 removeextras" + extras_row);
    divtest.innerHTML = '<div class="row variations"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="extras_name[]" placeholder="' + name + '" required></div></div><div class="col-md-6"><div class="form-group d-flex"><input type="text" class="form-control numbers_only" name="extras_price[]" placeholder="' + price + '" required>  <button class="btn btn-danger btn-sm rounded-5 ms-2 pricebtn" type="button" onclick="remove_extras_fields(' + extras_row + ');"><i class="fa-sharp fa-solid fa-xmark"></i></button>   </div></div><div class="col-md-1 d-flex align-items-end p-md-0"></div></div>';
    $('#more_extras_fields').append(divtest)
}
function remove_extras_fields(rid) {
    "use strict";
    $('.removeextras' + rid).remove();
}
function imageview(id, image) {
    
    "use strict";
    $("#item_id").val(id);
    $("#img_name").val(image);
    $("#editModal").modal('show');
}
function edititem_fields(variation, price, original_price) {
    "use strict";
    if (!$('span').hasClass('hiddencount')) {
        $('#edititem_fields').prepend('<span class="hiddencount d-none">' + 1 + '</span>')
    }
    var editroom = $('span.hiddencount:last()').html();
    editroom++;
    var editdivtest = document.createElement("div");
    editdivtest.setAttribute("class", "form-group mb-0 editremoveclass" + editroom);
    editdivtest.innerHTML = '<input type="hidden" class="form-control" name="variation_id[' + editroom + ']"><div class="row"><div class="col-md-4"><div class="form-group"><input type="text" class="form-control variation" name="variation[' + editroom + ']" placeholder="' + variation + '" required></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control numbers_only variation_price" name="variation_price[' + editroom + ']" placeholder="' + price + '" required></div></div><div class="col-md-4"><div class="form-group d-flex"><input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[' + editroom + ']" placeholder="' + original_price + '" required value="0"><button class="btn btn-danger btn-sm rounded-5 ms-2 pricebtn" type="button" onclick="remove_edit_fields(' + editroom + ');"><i class="fa-sharp fa-solid fa-xmark"></i></button></div></div><div class="col-md-1 d-flex align-items-end p-md-0"></div></div>';
    $('span.hiddencount:last()').html(editroom);
    $('#edititem_fields').append(editdivtest)
}
function remove_edit_fields(rid) {
    "use strict";
    $('.editremoveclass' + rid).remove();
}
function more_editextras_fields(name, price) {
    "use strict";
    if (!$('span').hasClass('hiddenextrascount')) {
        $('#more_editextras_fields').prepend('<span class="hiddenextrascount d-none">' + 1 + '</span>')
    }
    var editroom = $('span.hiddenextrascount:last()').html();
    editroom++;
    var editdivtest = document.createElement("div");
    editdivtest.setAttribute("class", "form-group mb-0 editextrasclass" + editroom);
    editdivtest.innerHTML = '<input type="hidden" class="form-control" name="extras_id[]"><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="extras_name[]" placeholder="' + name + '" required></div></div><div class="col-md-6"><div class="form-group d-flex"><input type="text" class="form-control numbers_only" name="extras_price[]" placeholder="' + price + '" required> <button class="btn btn-danger ms-2 btn-sm rounded-5 pricebtn" type="button" onclick="remove_editextras_fields(' + editroom + ');"><i class="fa-sharp fa-solid fa-xmark"></i></button> </div></div><div class="col-md-1 d-flex align-items-end p-md-0"></div></div>';
    $('span.hiddenextrascount:last()').html(editroom);
    $('#more_editextras_fields').append(editdivtest);
    if ($('#more_editextras_fields').find('.form-group').length > 1) {
        $('.extras_name, .extras_price').prop('required', true);
    }
}
function remove_editextras_fields(rid) {
    "use strict";
    $('.editextrasclass' + rid).remove();
    if ($('#more_editextras_fields').find('.form-group').length == 0) {
        $('.extras_name, .extras_price').prop('required', false);
    }
}

function deleteItemImage(id, item_id, deleteurl) {
    "use strict";
    swalWithBootstrapButtons.fire({
        icon: 'warning',
        title: are_you_sure,
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonText: yes,
        cancelButtonText: no,
        reverseButtons: true,
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: deleteurl,
                    data: { id: id, item_id: item_id, },
                    method: 'POST',
                    success: function (response) {
                        if (response == 1) {
                            location.reload();
                        } else if (response == 2) {
                            swal_cancelled(last_image)
                        } else {
                            swal_cancelled()
                        }
                    },
                    error: function (e) {
                        swal_cancelled()
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