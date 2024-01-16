<div class="row border shadow rounded-4 py-3 mb-4">
    <div class="card border-0 select-delivery">
        <div class="card-body">
            <div class="radio-item-container row">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <p class="title px-2"> {{ trans('labels.payment_option') }}</p>
                </div>
                <form>
                    @foreach ($paymentlist as $key => $payment)
                    @php  $transaction__type = strtolower($payment->payment_name); @endphp
                    <div class="col-12 select-payment-list-items">
                        <label class="form-check-label d-flex  justify-content-between align-items-center" for="{{ $payment->payment_name }}">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input m-0" type="radio" id="{{ $payment->payment_name }}"  name="payment" data-payment_type="{{strtolower($payment->payment_name)}}"  data-currency="{{ $payment->currency }}"  @if (!$key) {!! 'checked' !!} @endif  value="{{ $payment->public_key }}">
                                <p class="px-2">{{ $payment->payment_name_modified }}</p>
                            </div>
                            {{-- payment image --}}
                            <img src="{{ helper::image_path($payment->image) }}" alt="" class="select-paymentimages">

                            {{-- payment keys --}}

                                {{-- razorpay --}}
                                @if (strtolower($payment->payment_name) == 'razorpay')
                                <input type="hidden" name="razorpay" id="razorpay"
                                    value="{{ $payment->public_key }}">
                                @endif
                                {{-- stripe --}}
                                @if (strtolower($payment->payment_name) == 'stripe')
                                    <input type="hidden" name="stripekey" id="stripekey" value="{{ $payment->public_key }}">
                                    <input type="hidden" name="stripecurrency" id="stripecurrency" value="{{ $payment->currency }}">
                                @endif
                                {{-- stripe --}}

                                @if (strtolower($payment->payment_name) == 'flutterwave')
                                    <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                        value="{{ $payment->public_key }}">
                                @endif
                                @if (strtolower($payment->payment_name) == 'paystack')
                                    <input type="hidden" name="paystackkey" id="paystackkey"
                                        value="{{ $payment->public_key }}">
                                @endif

                        </label>
                    </div>

                    @endforeach

                </form>
            </div>
        </div>
    </div>
</div>