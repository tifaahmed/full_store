$('.currency_code').keyup(function(){
    "use strict";
    this.value = this.value.replace(/[^a-zA-Z]/g, "");
});