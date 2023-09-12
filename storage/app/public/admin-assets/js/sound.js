
(function noti() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: notificationurl,
        method: 'GET', //Get method,
        dataType: "json",
        success: function(response) {
            noticount = localStorage.getItem("count");
            if (response > 9) {
                $('#notificationcount').text(response + "+");
            } else {
                $('#notificationcount').text(response);
            }
            if (response != 0) {
                if (noticount != response) {
                    localStorage.setItem("count", response);
                    jQuery("#order-modal").modal('show');
                    var audio = new Audio(vendoraudio);
                    audio.play();
                }
            } else {
                localStorage.setItem("count", response);
            }
            setTimeout(noti, 5000);
        }
    });
})();