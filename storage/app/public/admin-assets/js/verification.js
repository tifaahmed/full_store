let timerOn = true;
timer(120);
function timer(remaining) {
    "use strict";
    var m = Math.floor(remaining / 60);
    var s = remaining % 60;
    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;
    document.getElementById('timer').innerHTML = m + ':' + s;
    remaining -= 1;
    if (remaining >= 0 && timerOn) {
        setTimeout(function () {
            timer(remaining);
        }, 1000);
        return;
    }
    if (!timerOn) {
        return;
    }
    $('#timer').addClass('d-none');
    $('#resend').removeClass('d-none');
}