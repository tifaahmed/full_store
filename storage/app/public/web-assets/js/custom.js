$(window).on("load", function () {
    "use strict";

    $("#preloader").fadeOut("slow");

    if ($(".multimenu").find(".active")) {
        $(".multimenu").find(".active").parent().parent().addClass("show");

        $(".multimenu")
            .find(".active")
            .parent()
            .parent()
            .parent()
            .attr("aria-expanded", true);
    }
});

$(document).ready(function () {
    $(".togl-btn").click(function () {
        if (direction == 1) {
            $(".menu").toggleClass("togl-show");
        } else {
            $(".menu-rtl").toggleClass("togl-show-rtl");
        }

        $(".bg-layer").toggleClass("bg-gray");
        $("body").addClass("overflow-hidden");
    });

    $("#deletebtn").click(function () {
        if (direction == 1) {
            $(".menu").removeClass("togl-show");
        } else {
            $(".menu-rtl").removeClass("togl-show-rtl");
        }

        $(".bg-layer").removeClass("bg-gray");
        $("body").removeClass("overflow-hidden");
    });

    $(".bg-layer").click(function () {
        if (direction == 1) {
            $(".menu").removeClass("togl-show");
        } else {
            $(".menu-rtl").removeClass("togl-show-rtl");
        }

        $(".bg-layer").removeClass("bg-gray");
        $("body").removeClass("overflow-hidden");
    });
});

$(document).ready(function () {
    "use strict";

    $(".zero-configuration").DataTable({
        dom: "Bfrtip",

        buttons: ["excelHtml5", "pdfHtml5"],
    });
});

// # Sweetalert2

$(document).on("click", "#sweetalert", function (e) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mx-1 yes-btn",

            cancelButton: "btn btn-danger mx-1 no-btn",
        },

        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",

            text: "You won't be able to revert this! hy",

            icon: "warning",

            showCancelButton: true,

            confirmButtonText: "Yes",

            cancelButtonText: "No",

            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    "Deleted!",

                    "Your file has been deleted.",

                    "success"
                );
            } else if (
                /* Read more about handling dismissals below */

                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelled",

                    "Your imaginary file is safe :)",

                    "error"
                );
            }
        });
});

function managefavorite(vendor_id, slug, type, manageurl, url) {
    "use strict";

    $("#preload").show();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        url: manageurl,

        data: {
            slug: slug,

            type: type,

            favurl: manageurl,

            vendor_id: vendor_id,

            url: url,
        },

        method: "POST",

        success: function (response) {
            $(".set-fav1-" + slug).html(response.data);
        },

        error: function (e) {
            $("#preload").hide();

            return false;
        },
    });
}

$(".navgation_lower li").click(function () {
    $(".specs").hide().eq($(this).index()).show();

    $(".navgation_lower li ")
        .removeClass("active1")
        .eq($(this).index())
        .addClass("active1");
});

$("#mune-click").click(function (e) {
    e.preventDefault();
    $(".mune-res").toggleClass("active");
    $(".navicon").toggleClass("is-active");

});
$("#click-profile").click(function (e) {
    e.preventDefault();
    $(".main-menu-profile-footer").toggleClass("active");

});


var $winl = $(window); // or $box parent container
var $boxl = $("#mune-click, .mune-re , #click-profile , .main-menu-profile-footer ") ;
$winl.on("click.Bst", function (event) {
    if (
        $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
        !$boxl.is(event.target) //checks if the $box itself was clicked
    ) {
        close();
    }
});


function close() {
    $(".navicon").removeClass("is-active");
    $("#mune-click").removeClass("active");
    $(".mune-res").removeClass("active");
    $(".main-menu-profile-footer").removeClass("active");

  }

