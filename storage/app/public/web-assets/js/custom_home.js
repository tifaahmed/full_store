var scroll_position_bottom = 0;
$(document).scroll(function () {
  if($(".custom-nav-mobile").length>0) {
    var $nav = $(".custom-nav-mobile");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    if($(this).scrollTop() > $nav.height()) {
      $(".mobile-header.scrolled").find(".user-svg").find(".a").css("fill", "#000");
      $(".mobile-header.scrolled").find(".shopping-bag").find(".a").css("fill", "#000");
      $(".mobile-header.scrolled").removeClass("navbar-dark nav-position").addClass("navbar-light");
    } else {
      $(".mobile-header").removeClass("navbar-light").addClass("nav-light scrolled navbar-light nav-position");
    }
  }else{
    var $nav = $(".mobile-header");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    if($(this).scrollTop() > $nav.height()) {
      $(".mobile-header.scrolled").find(".user-svg").find(".a").css("fill", "#000");
      $(".mobile-header.scrolled").find(".shopping-bag").find(".a").css("fill", "#000");
      $(".mobile-header.scrolled").removeClass("navbar-dark").addClass("navbar-light");
      $(".mobile-header.scrolled .navbar-brand").removeClass("d-none");
    } else {
      $(".mobile-header").find(".user-svg").find(".a").css("fill", "#fff");
      $(".mobile-header").find(".shopping-bag").find(".a").css("fill", "#fff");
      $(".mobile-header").removeClass("navbar-light").addClass("navbar-dark");
      $(".mobile-header .navbar-brand").addClass("d-none");
    }
  }
  var $gridheader = $(".grid-header-menu");
  $gridheader.toggleClass('header-scrolled', $(this).scrollTop() > $gridheader.height());

  if($(window).scrollTop() >= ($(document).height() - $(window).height()) - 100) {
    scroll_position_bottom = 1;
  }
});
if($(window).width() <= 991) {

} else {
    if(language == "ar") {
        $("#bottom_delivery_modal, #store_info_modal, #category_list_modal").removeClass(["modal-bottom", "fade"]).addClass("modal-right");
    } else {
        $("#bottom_delivery_modal, #store_info_modal, #category_list_modal").removeClass(["modal-bottom", "fade"]).addClass("modal-left");
    }
}
//END Homde delivery button click then show delivery location

//START Delivery area list
$(".home-area-section .collapse").on('show.bs.collapse', function(){
    $(this).prev(".home-area-section .home-country-section").find(".fa").removeClass("fa-chevron-down").addClass("fa-chevron-up");
}).on('hide.bs.collapse', function(){
    $(this).prev(".home-area-section .home-country-section").find(".fa").removeClass("fa-chevron-up").addClass("fa-chevron-down");
});

$(".checkRadioContainer label").on('click',function(){
    if($(".home-area-section .checkRadioContainer label input:checked"))
        $("#bottom_delivery_modal .modal-footer button").css("background-color", buttonColor);
});

//Select Area / Pickup branch
$(".confirm-branch").on('click',function(){
    var delivery_option = $("#bottom_delivery_modal").find(".modal-delivery-btn").find('.delivery-type.active').data('delivery_type');
    var area_name = $("[name='customer_delivery_area']:checked").val();
    var selected_branch = $("[name='customer_store_pickup']:checked").val();
    selectedDeliveryMethod = delivery_option;

    if ($.trim(delivery_option) != '' && ($.trim(area_name) != '' || $.trim(selected_branch) != '')) {
      $.ajax({
        type:'get',
        url: siteURL+'/check_for_branch_area_store',
        data:{encoded_store_code:encoded_store_code,delivery_option:delivery_option,area_name:area_name,selected_branch:selected_branch},
        dataType:'json',
        success:function(resp){
          if(resp.success){
            var store_url = resp.store_url;
            if (resp.show_empty_msg) {
              bootbox.confirm({
                title: youre_about_to_change_the_branch,
                message: changing_the_branch_might_result_in_removing_some_items_from_your_cart,
                buttons: { confirm: { label: label_yes,className: 'btn-success' }, cancel: { label: label_no,className: 'btn-danger' } },
                callback: function (result) {
                  if(result){
                    //After confirmaning user need to save selected details in session
                    $.ajax({
                      type:'get',
                      url: siteURL+'/check_for_branch_area_store',
                      data:{encoded_store_code:encoded_store_code,delivery_option:delivery_option,area_name:area_name,selected_branch:selected_branch,confirm_by_the_user:true},
                      dataType:'json',
                      success:function(resp){
                        if(resp.success){
                          store_url = siteURL+'/empty_cart/'+encoded_store_code+'?clear_branch_details=no';
                          window.location = store_url;
                        }else{
                          // hideLoader();
                          toastr['error'](resp.msg,'');
                        }
                      }
                    });
                  }else{
                    console.log("Cancel Clicked");
                  }
                }
              });
            } else if(typeof(processeAddToCart) != 'undefined' && processeAddToCart && (store_listing_type == 'list' || store_listing_type == 'list_with_category' || $("#product_detail_modal").is(':visible'))) {
              $("#product_detail_modal, .view-product-detail-page").find(".theme-add-to-cart").click();
            } else{
              window.location = store_url;
            }
          }else{
            // hideLoader();
            toastr['error'](resp.msg,'');
          }
        }
      });
    }

    $(".delivery-fees-info").removeClass("d-none");
    $(".start-ordering-section").removeClass("d-block").addClass("d-none");
    $(".page-footer").css("margin-bottom", "0px");
});
if($(".start-ordering-section").hasClass("d-block")) {
    $(".page-footer").css("margin-bottom", "60px");
}
//END Delivery area list

//START Store info area list
$(".branch-parent-section label").on('click',function(){
    $(".home-area-section .home-country-section").trigger("click");
});
//END Store info area list

// START delivery type home
function branch_type(delivery_type) {
  if(delivery_type == "delivery") {
    $(".pickup-location-section").addClass("d-none");
    $(".home-area-section").removeClass("d-none");
  }
  if(delivery_type == "pickup") {
    $(".home-area-section").addClass("d-none");
    $(".pickup-location-section").removeClass("d-none");
  }
  if(delivery_type == "book_table") {
    window.location.reload();
  }
}
$(".home-delivery-type").on('click',function(){
  var delivery_type = $(this).data("delivery_type");
  if(delivery_type != "") {
    if (delivery_type == 'book_table') {
      window.location.href = $(this).data("url");
    } else {
      $(".delivery-type").removeClass("active");
      $(".delivery-type[data-delivery_type="+delivery_type+"]").addClass("active");
      branch_type(delivery_type);
    }
  }
});
$(".delivery-type").on('click',function(){
  $(".delivery-type").removeClass("active");
  var delivery_type = $(this).data("delivery_type");
  if (delivery_type == 'book_table') {
    window.location.href = $(this).data("url");
  } else {
    branch_type(delivery_type);
  }
});
// END delivery type home

// START Category slider
var leftArr = "<div class='slider-btn'><i class='far fa-angle-left action-btn' aria-hidden='true'></i></div>";
var rightArr = "<div class='slider-btn'><i class='far fa-angle-right action-btn' aria-hidden='true'></i></div>";
if(language=='ar') {
  var leftArr = rightArr;
  var rightArr = "<div class='slider-btn'><i class='far fa-angle-left action-btn' aria-hidden='true'></i></div>";
}

if (typeof designtype !== 'undefined' && designtype == "grid") {
  $('.category-slider').owlCarousel({
    loop:false,
    margin:10,
    autoWidth:true,
    touchDrag: true,
    mouseDrag: true,
    nav      : true,
    dots     : false,
    rtl      : isRTL,
    navText:[
      leftArr,
      rightArr
    ],
    responsive: { 0: { rows: 1 } }
  });
  if(language == "ar") {
    $(".p-list").owlCarousel({
      items : 4,
      loop:false,
      margin : 10,
      autoWidth:true,
      nav    : true,
      smartSpeed :900,
      rtl      : isRTL,
      navText : ["<div class='slider-btn' style='background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 0px 1px 3px #2C2C2C26;border: 1px solid #E0E0E0;border-radius: 30px;opacity: 1;'><i class='fa fa-chevron-right'></i></div>","<div class='slider-btn'><i class='fa fa-chevron-left'></i></div>"],
      responsive: { 0: { rows: 1 } }
    });
  }else{
    $(".p-list").owlCarousel({
      items : 4,
      loop:false,
      margin : 10,
      autoWidth:true,
      nav    : true,
      smartSpeed :900,
      rtl      : isRTL,
      navText : ["<div class='slider-btn' style='background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 0px 1px 3px #2C2C2C26;border: 1px solid #E0E0E0;border-radius: 30px;opacity: 1;'><i class='fa fa-chevron-left'></i></div>","<div class='slider-btn'><i class='fa fa-chevron-right'></i></div>"],
      responsive: { 0: { rows: 1 } }
    });
  }
}
$('.owl-carousel').owlCarousel({
  margin: 10,
  loop: false,
  autoWidth: true,
  touchDrag: true,
  items: 3,
  dots: false,
  rtl: isRTL,
  responsive: { 0: { rows: 1 } },
  // responsive:{
  //     0:{
  //         items:1
  //     },
  //     600:{
  //         items:3
  //     },
  //     1000:{
  //         items:5
  //     }
  // }
  // mouseDrag:false,
});

$('.item').click(function(){
  // alert('f');
  $('.owl-theme').trigger('to.owl.carousel', $(this).data('count'));
});

var sticky_category_count = $(".et-hero-tabs-container .owl-item").length;
// var parent_category_width = 60 * sticky_category_count;
// $(".et-hero-tabs-container").css("width", parent_category_width);

class StickyNavigation {

  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    let self = this;
    // $('.et-hero-tab').click(function () {
    //   self.onTabClick(event, $(this));
    // });
    $(document).scroll(() => {this.onScroll();});
    // $(window).resize(() => {this.onResize();});
  }

  // onTabClick(event, element) {
  //   event.preventDefault();
  //   let scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
  //   $('html, body').animate({ scrollTop: scrollTop }, 600);
  // }

  onScroll() {
    // this.checkTabContainerPosition();
    this.findCurrentTabSelector();
  }

  // onResize() {
  //   if (this.currentId) {
  //     this.setSliderCss();
  //   }
  // }

// checkTabContainerPosition() {
//   if($('.et-hero-tabs').length > 0){
//     let offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - this.tabContainerHeight;

//     if ($(window).scrollTop() > offset) {
//       $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
//     } else{
//       $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
//     }
//   }
// }

findCurrentTabSelector(element) {
  let newCurrentId;
  let newCurrentTab;
  let self = this;
  $('.et-hero-tab').each(function () {
    let id = $(this).attr('href');
    if (id == 'javascript:void(0);'){
      id = '#tab-'+$(this).data('id').toString().toLowerCase();
    }

    if(typeof(id) !== "undefined")
      id = id.replace(/'/g, "\\'");
    let offsetTop = 0;
    let offsetBottom = 0;
    // console.log(id);
    if($(id).length > 0) {
      offsetTop = $(id).offset().top - self.tabContainerHeight;
      offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;
    }
    // console.log(self.tabContainerHeight);
    if ($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
      if(scroll_position_bottom == 1 && typeof designtype !== 'undefined' && designtype == "grid") {
        var last_second_cateroy_data_count = parseInt(sticky_category_count) - parseInt(1);
        var last_selected_category = (parseInt($(this).data('count')) + parseInt(1));

        if(last_second_cateroy_data_count == last_selected_category) {
          id='#tab-'+$(".item [data-count="+last_second_cateroy_data_count+"]").data('id').toLowerCase().replace(/\s/g, '');
          scroll_position_bottom = 0;
        }
      }
      newCurrentId = id;
      newCurrentTab = $(this);
      var currentIdClass = "";

      // console.log('ccc'+this.currentId);
      if(typeof(newCurrentId) !== "undefined" && $.trim(newCurrentId) !== "") {
        // console.log($.trim(this.currentId).slice(5));
        currentIdClass = $.trim(newCurrentId).slice(5);
      }
      $('.et-hero-tabs-container').find('.et-hero-tab').css({
        'cssText': 'color: '+CategorySliderColor+';background-color:inherit;border-radius: inherit;',
      }).removeClass('clicked');;

      if(currentIdClass !== "") {
        // console.log(currentIdClass);
        $('.owl-carousel').trigger('to.owl.carousel', $(this).data('count'));
        // if($("."+currentIdClass).data("order") > 1 && $("."+currentIdClass).data("order") < sticky_category_count) {
        //   var calc='-'+$("."+currentIdClass).data("order")*60;
        //   $('.et-hero-tabs-container').css({
        //     'cssText': 'transform: translate3d('+calc+'px, 0px, 0px);transition:  all 0.5s ease 0s;',
        //   });
        // } else {
        //   if($("."+currentIdClass).data("order") == 1) {
        //     $('.et-hero-tabs-container').css({
        //       'cssText': 'transform: translate3d(0px, 0px, 0px);transition:  all 0.5s ease 0s;',
        //     });
        //   }
        //   if($("."+currentIdClass).data("order") == sticky_category_count) {
        //     var calc='-'+($("."+currentIdClass).data("order")+1)*60;
        //     $('.et-hero-tabs-container').css({
        //       'cssText': 'transform: translate3d('+calc+'px, 0px, 0px);transition:  all 0.5s ease 0s;',
        //     });
        //   }
        // }
        $('.et-hero-tabs-container').find('.'+currentIdClass).css({
          'cssText': 'color: #fff;background-color:'+CategorySliderColor+';border-radius: 20px;',
        });
      } else { }
        // console.log(newCurrentId);
      }
    });
    // if (this.currentId != newCurrentId || this.currentId === null) {
    //   this.currentId = newCurrentId;
    //   this.currentTab = newCurrentTab;
    //   // this.setSliderCss();
    // }
  }

  // setSliderCss() {
  //   let width = 99;
  //   let left = 55;
  //   if (this.currentTab) {
  //     width = this.currentTab.css('width');
  //     left = this.currentTab.offset().left;
  //     console.log(width);
  //   }
  //   $('.et-hero-tab-slider').css('width', width);
  //   $('.et-hero-tab-slider').css('left', left);
  // }
}

new StickyNavigation();
// $(".horizontal-category-list, .et-hero-tabs-container").on('click',function(){

//   $(".et-hero-tabs-container").css({
//     'cssText': 'transform: unset;transition:  all 0.5s ease 0s;',
//   });
// });
// END Category slider

// START Branch list
if(Number(totalCount) <= 1){
  var id = $(".show-branch-detail").data('id');
  var name = $(".show-branch-detail").data('name');
  $("#detail-map-"+id).show();
  showMap(id, name);
}
$(".fwd-icon").on('click',function(){
  if(Number(totalCount) > 0) {
    $(".show-branch-detail:first").trigger('click');
  }
});
$(".show-branch-detail").on('click',function(){
  var id = $(this).data('id');
  var name = $(this).data('name');
  $(".detail-map").hide();
  $("#detail-map-"+id).show();
  showMap(id, name);
});
$(".google-map").find("iframe").attr({"height":"250","width":"100%"});
$(".branch-navigation").on('click',function(){
  var from = $(".branch-navigation").attr('data-action');
  if(from == "list")
      window.location.href = siteURL+'/'+$(".branch-navigation").attr('data-code');
  else{
      $(".detail-map, .branch-detail-title").hide();
      $(".branch-navigation").attr('data-action','list');
      $(".branch-list").show();
  }
});
// END Branch list

// START MAP
function showMap(id = false,name = false){
    if(id){
        var map_id = id;
        var name = name;
        var latitude = $("#detail-map-"+id).find(".latitude").val();
        var longitude = $("#detail-map-"+id).find(".longitude").val();
        var isVisible = $("#detail-map-"+id).find(".branch-map").attr('data-isVisible');
        // alert(latitude);
        if($.trim(latitude) != '' && $.trim(longitude) != '' && isVisible == 'no'){
            var timeOut = 200;
            if(Number(totalCount) <= 1)
                timeOut = 700;
            setTimeout(() => {
                var latlongData = {lat: Number(latitude), lng: Number(longitude)};

                var map = new google.maps.Map(document.getElementById('branch-map-'+map_id), {
                    zoom: 15,
                    mapTypeControl: false,
                    center: latlongData,
                    scaleControl: false,
                    streetViewControl: true,
                    rotateControl: false,
                    fullscreenControl: false,
                    styles:[
                      {
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#ebe3cd"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.icon",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#523735"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                          {
                            "color": "#f5f1e6"
                          }
                        ]
                      },
                      {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                          {
                            "color": "#c9b2a6"
                          }
                        ]
                      },
                      {
                        "featureType": "administrative.land_parcel",
                        "elementType": "geometry.stroke",
                        "stylers": [
                          {
                            "color": "#dcd2be"
                          }
                        ]
                      },
                      {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#ae9e90"
                          }
                        ]
                      },
                      {
                        "featureType": "landscape.natural",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#dfd2ae"
                          }
                        ]
                      },
                      {
                        "featureType": "poi",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#dfd2ae"
                          }
                        ]
                      },
                      {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#93817c"
                          }
                        ]
                      },
                      {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#e5e5e5"
                          }
                        ]
                      },
                      {
                        "featureType": "poi.park",
                        "elementType": "geometry.fill",
                        "stylers": [
                          {
                            "color": "#a5b076"
                          }
                        ]
                      },
                      {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#447530"
                          }
                        ]
                      },
                      {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#f5f1e6"
                          }
                        ]
                      },
                      {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "road.arterial",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#fdfcf8"
                          }
                        ]
                      },
                      {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#757575"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#f8c967"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                          {
                            "color": "#e9bc62"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway",
                        "elementType": "labels",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#e98d58"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry.stroke",
                        "stylers": [
                          {
                            "color": "#db8555"
                          }
                        ]
                      },
                      {
                        "featureType": "road.local",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#806b63"
                          }
                        ]
                      },
                      {
                        "featureType": "transit",
                        "stylers": [
                          {
                            "visibility": "off"
                          }
                        ]
                      },
                      {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#dfd2ae"
                          }
                        ]
                      },
                      {
                        "featureType": "transit.line",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#8f7d77"
                          }
                        ]
                      },
                      {
                        "featureType": "transit.line",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                          {
                            "color": "#ebe3cd"
                          }
                        ]
                      },
                      {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#dfd2ae"
                          }
                        ]
                      },
                      {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                          {
                            "color": "#b9d3c2"
                          }
                        ]
                      },
                      {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#92998d"
                          }
                        ]
                      }
                    ]
                });

                var marker = new google.maps.Marker({position: latlongData, map: map,title: name});

                var infowindow = new google.maps.InfoWindow({
                    content: "<div class='branch-info'>"+name+"</div>"
                });

                infowindow.open(map,marker);
                $("#detail-map-"+map_id).find(".branch-map").attr('data-isVisible','yes');
            }, timeOut);
        }
    }
}
$(".fwd-icon").on('click',function(){
    showMap(1, "upayments");
});
// END MAP
var slideIndex = 1;
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("book-image");
  var dots = document.getElementsByClassName("book-thumb-img");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
function searchBookings(val) {
  var value = val.toLowerCase();
  $('.no-result').hide();
  $(".booking-ul .li-outer").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    if($('.li-outer').length == $(".li-outer:hidden").length){
      if($('.booking-ul .no-result').length == 0){
        $('.booking-ul').append('<li class="no-result">No result found</li>');
      }else{
        $('.no-result').show();
      }
    }
  });
}
