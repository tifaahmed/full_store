<div class="row border shadow rounded-4 py-3 mb-4">
    <div class="card border-0 select-delivery">
        <div class="card-body row">
            <div class="radio-item-container row">
                <div class="d-flex align-items-center mb-3 px-1">
                    <i class="fa-solid fa-truck"></i>
                    <p class="title px-2">{{ trans('labels.delivery_option') }}</p>
                </div>
                <form class="px-0">
                    @php
                        $delivery_types = explode(',', helper::appdata($storeinfo->id)->delivery_type);
                        if(session()->has('receipt_type') && session('receipt_type') == 'pickup'){
                            $delivery_types = [2,1];
                        }
                        if(session()->has('receipt_type') && session('receipt_type') == 'delivery'){
                            $delivery_types = [1,2];
                        }
                    @endphp
                    @foreach ($delivery_types as $key => $delivery_type)
                        <div class="col-12 px-0 mb-2" id="class-cart-delivery-{{$delivery_type}}">
                            <label class="form-check-label d-flex  justify-content-between align-items-center "
                            for="cart-delivery-{{$delivery_type}}" >
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="cart-delivery" 
                                    id="cart-delivery-{{$delivery_type}}" 
                                    value="{{$delivery_type}}" {{ $key == 0 ? 'checked' : ''}}>
                                    <p class="px-2">
                                        @if($delivery_type == 1) 
                                            {{ trans('labels.delivery') }}
                                        @elseif($delivery_type == 2) 
                                            {{ trans('labels.pickup') }}
                                        @elseif($delivery_type == 3) 
                                            {{ trans('labels.dine_in') }}
                                        @endif
                                    </p>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>

               