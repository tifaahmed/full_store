var api_key = "";
var payment_type = "";
var currency = "";
var price = $('#price').val();
var plan_id = $('#plan_id').val();
var user_name = $('#user_name').val();
var user_email = $('#user_email').val();
var user_mobile = $('#user_mobile').val();
if ($('#stripe_public_key').val() != null) {
    var stripe_public_key = $('#stripe_public_key').val();
    var stripe = Stripe(stripe_public_key);
    var card = stripe.elements().create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
            },
        },
    });
    card.mount('#card-element');
    $('.__PrivateStripeElement iframe').removeAttr('style');
}
$('input[name=paymentmode]').on('click', function (e) {
    "use strict";
    $(".payment_error").addClass('d-none');
    api_key = $('input[name=paymentmode]:checked').val();
    currency = $('input[name=paymentmode]:checked').attr('data-currency');
    payment_type = $('input[name=paymentmode]:checked').attr('data-transaction-type');
    if (payment_type == 'stripe') {
        $('.stripe-form').removeClass('d-none');
    } else {
        $('.stripe-form').addClass('d-none');
    }
});
$('.buy_now').on('click', function (e) {
    "use strict";
    if ($('input[name=paymentmode]:checked').length == 0) {
        $(".payment_error").removeClass('d-none');
        return false;
    } else {
        $(".payment_error").addClass('d-none');
    }
    // RazorPay
    if (payment_type == 'razorpay') {
        var options = {
            "key": api_key,
            "amount": parseFloat(price*100),
            "name": title,
            "description": description,
            "image": 'https://badges.razorpay.com/badge-light.png',
            "handler": function (response) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: buyurl,
                    type: 'post',
                    data: {
                        amount: price,
                        plan_id: plan_id,
                        payment_type: payment_type,
                        payment_id: response.razorpay_payment_id,
                    },
                    success: function (response) {
                        $('#preloader').hide();
                        if (response.status == 0) {
                            toastr.error(response.message);
                            return false;
                        } else {
                            window.location.href = planlisturl;
                        }
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        toastr.error(wrong);
                        return false;
                    }
                });
            },
            "modal": {
                "ondismiss": function () {
                    location.reload();
                }
            },
            "prefill": {
                "name": user_name,
                "email": user_email,
                "contact": user_mobile,
            },
            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    }
    // Stripe
    if (payment_type == 'stripe') {
        stripe.createToken(card).then(function (result) {
            if (result.error) {
                $('.stripe_error').html(result.error.message);
                return false;
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: buyurl,
                    type: 'post',
                    data: {
                        amount: price,
                        plan_id: plan_id,
                        currency: currency,
                        payment_type: payment_type,
                        payment_id: result.token.id,
                    },
                    success: function (response) {
                        $('#preloader').hide();
                        if (response.status == 0) {
                            toastr.error(response.message);
                            return false;
                        } else {
                            window.location.href = planlisturl;
                        }
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        toastr.error(wrong);
                        return false;
                    }
                });
            }
        });
    }
    // Flutterwave
    if (payment_type == 'flutterwave') {
        FlutterwaveCheckout({
            public_key: api_key,
            tx_ref: user_name,
            amount: price,
            currency: currency,
            payment_options: "",
            customer: {
                email: user_email,
                phone_number: user_mobile,
                name: user_name,
            },
            callback: function (response) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: buyurl,
                    type: 'post',
                    data: {
                        amount: price,
                        plan_id: plan_id,
                        payment_type: payment_type,
                        payment_id: response.flw_ref,
                    },
                    success: function (response) {
                        $('#preloader').hide();
                        if (response.status == 0) {
                            toastr.error(response.message);
                            return false;
                        } else {
                            window.location.href = planlisturl;
                        }
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        toastr.error(wrong);
                        return false;
                    }
                });
            },
            onclose: function () {
                location.reload();
            },
            customizations: {
                title: title,
                description: description,
                logo: "https://flutterwave.com/images/logo/logo-mark/full.svg",
            },
        });
    }
    // Paystack
    if (payment_type == 'paystack') {
        var handler = PaystackPop.setup({
            key: api_key,
            email: user_email,
            amount: price *
                100,
            currency: currency, // Use GHS for Ghana Cedis or USD for US Dollars
            callback: function (response) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: buyurl,
                    type: 'post',
                    data: {
                        amount: price,
                        plan_id: plan_id,
                        payment_type: payment_type,
                        payment_id: response.reference,
                    },
                    success: function (response) {
                        $('#preloader').hide();
                        if (response.status == 0) {
                            toastr.error(response.message);
                            return false;
                        } else {
                            window.location.href = planlisturl;
                        }
                    },
                    error: function (error) {
                        $('#preloader').hide();
                        toastr.error(wrong);
                        return false;
                    }
                });
            },
            onClose: function () {
                window.location.reload();
            },
        });
        handler.openIframe();
    }
    // Banktransfer
    if (payment_type == 'banktransfer') {
        $('#modalbankdetails').modal('show');
        $('.data-bank-name').html($('input[name=paymentmode]:checked').attr('data-bank-name'))
        $('.data-account-holder-name').html($('input[name=paymentmode]:checked').attr('data-account-holder-name'))
        $('.data-account-number').html($('input[name=paymentmode]:checked').attr('data-account-number'))
        $('.data-bank-ifsc-code').html($('input[name=paymentmode]:checked').attr('data-bank-ifsc-code'))
        $('#modal_plan_id').val(plan_id);
        $('#modal_payment_type').val(payment_type);
        $('#modal_amount').val(price);
    }
    // Mercado pago
    if (payment_type == 'mercadopago') {
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: buyurl+'/mercadorequest',
            data: {
                amount: price,
                plan_id: plan_id,
                plan_name: plan_name,
                plan_description: plan_description,
                payment_type: payment_type,
                payment_id: "",
                successurl: buyurl+'/paymentsuccess/success',
                failureurl: location.href,
            },
            method: 'POST',
            success: function (response) {
                $('#preloader').hide();
                if (response.status == 1) {
                    window.location.href = response.redirecturl;
                }else{
                    toastr.error(response.message);
                    return false;
                }
            },
            error: function (error) {
                $('#preloader').hide();
                toastr.error(wrong);
                return false;
            }
        });
    }
    // PayPal
    if (payment_type == 'paypal') {
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: buyurl+'/paypalrequest',
            data: {
                amount: price,
                plan_id: plan_id,
                plan_name: plan_name,
                plan_description: plan_description,
                payment_type: payment_type,
                payment_id: "",
                successurl: buyurl+'/paymentsuccess/success',
                failureurl: location.href,
                return: '1',
            },
            method: 'POST',
            success: function (response) {
                $('#preloader').hide();
                if (response.status == 1) {
                    $(".callpaypal").trigger("click")
                }else{
                    toastr.error(response.message);
                    return false;
                }
            },
            error: function (error) {
                $('#preloader').hide();
                toastr.error(wrong);
                return false;
            }
        });
    }
    
    // myfatoorah
    if (payment_type == 'myfatoorah') {
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: buyurl+'/myfatoorahrequest',
            data: {
                amount: price,
                plan_id: plan_id,
                plan_name: plan_name,
                plan_description: plan_description,
                payment_type: payment_type,
                payment_id: "",
                successurl: buyurl+'/paymentsuccess/success',
                failureurl: location.href,
                return: '1',
            },
            method: 'POST',
            success: function (response) {
                $('#preloader').hide();
                if (response.status == 1) {
                    window.location.href = response.redirecturl;
                }else{
                    toastr.error(response.message);
                    return false;
                }
            },
            error: function (error) {
                $('#preloader').hide();
                toastr.error(wrong);
                return false;
            }
        });
    }

    //toyyibpay
    if (payment_type == 'toyyibpay') {
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: buyurl + '/toyyibpay',
            data: {
                amount: price,
                plan_id: plan_id,
                plan_name: plan_name,
                plan_description: plan_description,
                payment_type: payment_type,
                payment_id: "",
                successurl: buyurl + '/paymentsuccess/success',
                failureurl: location.href,
            },
            method: 'POST',
            success: function(response) {
                $('#preloader').hide();
                if (response.status == 1) {
                    window.location.href = response.redirecturl;
                } else {
                    toastr.error(response.message);
                    return false;
                }
            },
            error: function(error) {
                $('#preloader').hide();
                toastr.error(wrong);
                return false;
            }
        });
    }
});