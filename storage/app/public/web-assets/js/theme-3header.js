document.addEventListener("scroll", function () {

    var header = document.querySelector(".theme-3-header");

    var scrollPosition = window.scrollY;



    if (scrollPosition > 50) {

        header.classList.add("header-bg");

    } else {

        header.classList.remove("header-bg");

    }

});



document.addEventListener("scroll", function () {

    var header = document.querySelector(".theme-3-iconbox");

    var anchorTags = document.querySelectorAll(".theme-3-iconbox a");

    var header = document.querySelector(".theme-3-cart");

    var svgs = document.querySelectorAll(".theme-3-cart");

    var span = document.querySelectorAll(".cart-counting-color");

    var scrollPosition = window.scrollY;



    if (scrollPosition > 50) {

        header.classList.add("active");

        anchorTags.forEach(function (anchor) {

            anchor.classList.add("iconwhiteadd");

            anchor.classList.add("my-svg-class");

            anchor.classList.add("text-color-class");

        });

    } else {

        header.classList.remove("active");

        anchorTags.forEach(function (anchor) {

            anchor.classList.remove("iconwhiteadd");

            anchor.classList.add("my-svg-class");

            anchor.classList.remove("text-color-class");

        });

    }

    if (scrollPosition > 50) {

        header.classList.add("active");

        svgs.forEach(function (svg) {

            svg.classList.add("svg-bg");

        });

        svgs.forEach(function (svg) {

            svg.classList.add("svg-bg");

        });



    } else {

        header.classList.remove("active");

        svgs.forEach(function (svg) {

            svg.classList.remove("svg-bg");

        });

    }

    if (scrollPosition > 50) {

        header.classList.add("active");

        span.forEach(function (span) {

            span.classList.add("svg-bg");

        });

    } else {

        header.classList.remove("active");

        span.forEach(function (span) {

            span.classList.remove("svg-bg");

        });

    }

});





$(document).ready(function () {

    $('#example').DataTable();

});



var selector = '.theme-3-navbar li a';



$(selector).on('click', function () {

    $(selector).removeClass('active');

    $(this).addClass('active');

});
