$(window).on("load", function () {

    "use strict";

    $('#preloader').fadeOut('slow');



});

if (direction == 1)
{
    var navtext = ["<i class='fa-solid fa-arrow-left-long '></i>", "<i class='fa-solid fa-arrow-right-long'></i>"];
}
else
{
    var navtext = ["<i class='fa-solid fa-arrow-right-long '></i>", "<i class='fa-solid fa-arrow-left-long'></i>"];
}

$('.premium-features').owlCarousel({

    loop: false,

    rtl: direction == '2' ? true : false,

    margin: 0,

    nav: true,

    dots: false,

    navText: navtext,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 3

        },

        1000: {

            items: 4

        },

        1400: {

            items: 5

        }

    }

})



$('.templates-owl').owlCarousel({

    loop: true,

    rtl: direction == '2' ? true : false,

    autoplay: true,

    autoplayTimeout: 3000,

    items: 4,

    margin: 20,

    padding: 0,

    dots: false,

    nav: true,

    URLhashListener: true,

    responsive: {

        0: {

            items: 2

        },

        600: {

            items: 3

        },

        1000: {

            items: 3

        },

        1400: {

            items: 3

        }

    }

})



$('.partners-owl').owlCarousel({

    loop: false,

    rtl: direction == '2' ? true : false,

    margin: 10,

    nav: true,

    dots: false,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 2

        },

        1000: {

            items: 2

        }

    }

})

$('#testimonila-owl').owlCarousel({

    loop: true,

    rtl: direction == '2' ? true : false,

    margin: 10,

    nav: true,

    dots: false,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 1

        }

    }

})

$('#blog-owl').owlCarousel({

    loop: false,

    rtl: direction == '2' ? true : false,

    margin: 30,

    nav: false,

    dots: false,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 2

        },

        1000: {

            items: 4

        }

    }

})





$('.owl_our_stores').owlCarousel({

    loop: true,

    rtl: direction == '2' ? true : false,

    autoplay: true,

    autoplayTimeout: 3000,

    items: 4,

    margin: 20,

    padding: 0,

    dots: false,

    nav: false,

    URLhashListener: true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 1

        }

    }

})



//=========== choose your plan section js ===========//

function myFunction() {

    var x = document.getElementById("Choose_plan");

    if (x.style.display === "none") {

        x.style.display = "block";

    } else {

        x.style.display = "none";

    }

}



$('.see-all-btn a').click(function () {

    $(this).find('i').toggleClass('fa-solid fa-chevron-up fa-solid fa-chevron-down')

});





$("#city").on('change',function() {



    "use strict";

    var city_id = $("#city option:selected").attr("data-id");

    $("#area").empty();

    var areaselect;

    $.ajax({

        headers: {

            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")

        },

        url: areaurl,

        type: "post",

        dataType: "json",

        data: {

            city: city_id

        },

        success: function(result) {

            $('#area').html('<option value="">' + select + '</option>');

            $.each(result.area, function(key, value) {



                if (areaname == value.area) {

                    areaselect = "selected";

                } else {

                    areaselect = "";

                }

                $("#area").append('<option value="' + value.area + '"' + areaselect +

                    '>' + value.area + '</option>');

            });

        }

    });

});



