<!------------------------------------------ mobile siderbar ------------------------------------------>
@if(count($cartitems))
<div class="offcanvas offcanvas-end pos_sidebar" tabindex="-1" id="rightsidebar" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Customer Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0 pt-0">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 rounded-4 right-sidemain">
                    <div class="card-body px-0 desktop-card-body pt-0">
                        <!----------------- Customer Name section start ----------------->
                        <div class="border-bottom pb-3 px-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <select class="form-select" aria-label="Default select example" id="customer1">
                                        <option value="walk-in customer">walk-in customer</option>
                                        @foreach($getcustomerslist as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(count($cartitems) > 0)
                                <div class="col-lg-4">
                                    <!-- <button class="btn btn-danger" onclick="RemoveCart('')">Empty Cart</button> -->
                                </div>
                                @endif
                            </div>
                        </div>
                        <!----------------- Customer Name section end ----------------->
                        <!--------------- product purchase section start --------------->
                        <div class="pro-itmes p-3 pb-0">
                            @php
                            $sub_total = 0;
                            $tax = 0;
                            $discount = 0;
                            @endphp
                            @if(count($cartitems) > 0)
                            @foreach($cartitems as $cart)
                            @php
                            $sub_total += ($cart->price * $cart->qty);
                            $tax += $cart->tax;
                            @endphp
                            <div class="card mb-3 border rounded-4 shadow-sm posproductimg">
                                <div class="card-body d-flex align-items-center p-0">
                                    <img src="{{ asset('storage/app/public/item/' . $cart->item_image) }}" alt="">
                                    <div class="px-2">
                                        <div class="row justify-content-between">
                                            <div class="col-9">
                                                <p class="line-limit-1">{{$cart->item_name}}</p>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <a href="#" class="" onclick="RemoveCart('{{$cart->id}}')">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between align-items-start">
                                            <div class="col-12">
                                                @if($cart->variants_name != null)
                                                <span class="fs-7">{{$cart->variants_name}} : {{ helper::currency_formate($cart->variants_price, Auth::user()->id) }} @if($cart->extras_name != null) | <a href="javascript:void(0)" class="adone-hover m-0" onclick="showaddons('{{ $cart->extras_name }}','{{ $cart->extras_price }}')" data-toggle="modal" data-target="#modal_selected_addons">Extras</a>@endif </span>@endif
                                                <p class="pro-price">{{ helper::currency_formate($cart->price * $cart->qty, Auth::user()->id) }}</p>
                                            </div>
                                            <div class="price-range col-12">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <a href="javascript:void(0)" class="circle" onclick="qtyupdate('{{ $cart->id }}','minus','{{ URL::to('admin/pos/cart/qtyupdate') }}')"><i class="fa-light fa-minus"></i></a>
                                                    <input type="text" value="{{$cart->qty}}" readonly>
                                                    <a href="javascript:void(0)" class="circle" onclick="qtyupdate('{{ $cart->id }}','plus','{{ URL::to('admin/pos/cart/qtyupdate') }}')"><i class="fa-light fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                            @else
                            {{-- <h2 class="text-muted text-center">{{trans('labels.empty_cart')}}</h2> --}}
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png') }}" alt="empty-cart" class="w-25 object-fit-cover">
                            </div>
                            @endif
                            @php
                            $total = $sub_total + $tax - $discount ;
                            @endphp
                        </div>
                        <!---------------- product purchase section end ---------------->
                        <!----------------- total amount section start ----------------->
                        <div class="p-3 pt-0">
                            <div class="card bg-light border-0 currency">
                                <div class="card-body border rounded-4">
                                    <div class="input-group d-grid gap-2 d-flex">
                                        <input type="number" class="form-control border rounded-3 bg-white discount_amount" placeholder="{{trans('labels.discount')}}" aria-label="currency" id="discount1" value="" aria-describedby="currency" min="1" max="1000" @if(count($cartitems)> 0) '' @else disabled @endif>
                                        <span class="input-group-text rounded-3 border-0 discountdolor" id="currency">{{helper::appdata(Auth::user()->id)->currency}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total-sec text-capitalize">
                            <div class="card border-0 shadow-sm mx-3 rounded-4">
                                <div class="card-body">
                                    <div class="sub-total d-flex align-items-center justify-content-between mb-1" id="subtotal">
                                        <h6 class="fs-18 m-0">{{trans('labels.sub_total')}}</h6>
                                        <span>{{helper::currency_formate($sub_total, Auth::user()->id) }}</span>
                                    </div>
                                    <div class="tax-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                        <h6 class="fs-18 m-0">{{trans('labels.tax')}} (+) </h6>
                                        <span>{{helper::currency_formate($tax, Auth::user()->id) }}</span>
                                    </div>
                                    <div class="discount-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                        <h6 class="fs-18 m-0">{{trans('labels.discount')}} (-) </h6>
                                        <span id="discount_amount11" class="show_discount_amount">$0.000</span>
                                    </div>
                                    <div class="pay-total d-flex align-items-center justify-content-between mt-2 pt-2" id="subtotal">
                                        <h6 class="fs-18 m-0 text-success fw-semibold">{{trans('labels.total')}}</h6>
                                        <span class="text-success total_amount" id="total_amount1">{{helper::currency_formate($total, Auth::user()->id) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       

                        <!------------------ currency section end ------------------>
                        <hr>
                        <!---------------- payment-option section start ---------------->
                        <div class="payment-option text-capitalize px-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                <a href="#" class="btn btn-success py-3 w-100 rounded-5" @if(count($cartitems)> 0) data-bs-toggle="modal" data-bs-target="#peyment_methed" @endif >{{trans('labels.place_order')}}</a>
                                @if(count($cartitems) > 0)
                                <button class="btn btn-danger py-3 w-100 rounded-5" onclick="RemoveCart('')">Empty Cart</button>
                                @endif
                            </div>
                        </div>
                        <!----------------- payment-option section end ----------------->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!------------------------------------------ mobile siderbar end------------------------------------------>

<!------------------------------------------ desktop siderbar start------------------------------------------>
<div class="row">
    <div class="col-12 mt-3">
        <div class="card border-0 d-none d-lg-block rounded-4 right-sidemain">
            <div class="card-body px-0 desktop-card-body">
                <!----------------- Customer Name section start ----------------->
                <div class="border-bottom pb-3 px-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" id="customer">
                                <option value="walk-in customer">walk-in customer</option>
                                @foreach($getcustomerslist as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(count($cartitems) > 0)
                        <div class="col-lg-4">
                            <!-- <button class="btn btn-danger" onclick="RemoveCart('')">Empty Cart</button> -->
                        </div>
                        @endif
                    </div>
                </div>
                <!----------------- Customer Name section end ----------------->
                <!--------------- product purchase section start --------------->
                <div class="pro-itmes p-3 pb-0">
                    @php
                    $sub_total = 0;
                    $tax = 0;
                    $discount = 0;
                    @endphp
                    @if(count($cartitems) > 0)
                    @foreach($cartitems as $cart)
                    @php
                    $sub_total += ($cart->price * $cart->qty);
                    $tax += $cart->tax;
                    @endphp
                    <div class="card mb-3 border rounded-4 shadow-sm posproductimg">
                        <div class="card-body d-flex align-items-center p-0">
                            <img src="{{ asset('storage/app/public/item/' . $cart->item_image) }}" alt="">
                            <div class="px-2">
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <p class="line-limit-1">{{$cart->item_name}}</p>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <a href="#" class="" onclick="RemoveCart('{{$cart->id}}')">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row justify-content-between align-items-start">
                                    <div class="col-6">
                                        @if($cart->variants_name != null)
                                        <span class="fs-7">{{$cart->variants_name}} : {{ helper::currency_formate($cart->variants_price, Auth::user()->id) }} @if($cart->extras_name != null) | <a href="javascript:void(0)" class="adone-hover m-0" onclick="showaddons('{{ $cart->extras_name }}','{{ $cart->extras_price }}')" data-toggle="modal" data-target="#modal_selected_addons">Extras</a>@endif </span>@endif
                                        <p class="pro-price">{{ helper::currency_formate($cart->price * $cart->qty, Auth::user()->id) }}</p>
                                    </div>
                                    <div class="price-range col-6">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="javascript:void(0)" class="circle" onclick="qtyupdate('{{ $cart->id }}','minus','{{ URL::to('admin/pos/cart/qtyupdate') }}')"><i class="fa-light fa-minus"></i></a>
                                            <input type="text" value="{{$cart->qty}}" readonly>
                                            <a href="javascript:void(0)" class="circle" onclick="qtyupdate('{{ $cart->id }}','plus','{{ URL::to('admin/pos/cart/qtyupdate') }}')"><i class="fa-light fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                    @else
                    {{-- <h2 class="text-muted text-center">{{trans('labels.empty_cart')}}</h2> --}}
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png') }}" alt="empty-cart" class="w-25 object-fit-cover">
                    </div>
                    @endif
                    @php
                    $total = $sub_total + $tax - $discount ;
                    @endphp
                </div>
                <!---------------- product purchase section end ---------------->
                <!----------------- total amount section start ----------------->
                <div class="p-3 pt-0">
                    <div class="card bg-light border-0 currency">
                        <div class="card-body border rounded-4">
                            <div class="input-group d-grid gap-2 d-flex">
                                <input type="number" class="form-control border rounded-3 bg-white discount_amount" placeholder="{{trans('labels.discount')}}" aria-label="currency" id="discount" value="" aria-describedby="currency" min="1" max="1000" @if(count($cartitems)> 0) '' @else disabled @endif>
                                <span class="input-group-text rounded-3 border-0 discountdolor" id="currency">{{helper::appdata(Auth::user()->id)->currency}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total-sec text-capitalize">
                    <div class="card border-0 shadow-sm mx-3 rounded-4">
                        <div class="card-body">
                            <div class="sub-total d-flex align-items-center justify-content-between mb-1" id="subtotal">
                                <h6 class="fs-18 m-0">{{trans('labels.sub_total')}}</h6>
                                <span>{{helper::currency_formate($sub_total, Auth::user()->id) }}</span>
                            </div>
                            <div class="tax-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                <h6 class="fs-18 m-0">{{trans('labels.tax')}} (+) </h6>
                                <span>{{helper::currency_formate($tax, Auth::user()->id) }}</span>
                            </div>
                            <div class="discount-total d-flex align-items-center justify-content-between mb-1" id="tax">
                                <h6 class="fs-18 m-0">{{trans('labels.discount')}} (-) </h6>
                                <span id="discount_amount1" class="show_discount_amount">$0.000</span>
                            </div>
                            <div class="pay-total d-flex align-items-center justify-content-between mt-2 pt-2" id="subtotal">
                                <h6 class="fs-18 m-0 text-success fw-semibold">{{trans('labels.total')}}</h6>
                                <span class="text-success total_amount" id="total_amount">{{helper::currency_formate($total, Auth::user()->id) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="tax" id="tax_data" value="{{$tax}}" />
                <input type="hidden" name="discount_amount" id="discount_amount" value="" />
                <input type="hidden" name="sub_total" id="sub_total" value="{{$sub_total}}" />
                <input type="hidden" name="grand_total" id="grand_total" value="{{$total}}" />
                <input type="hidden" name="orderurl" id="orderurl" value="{{ URL::to('admin/pos/placeorder') }}" />
                <input type="hidden" name="customer" id="customer_info" value="" />
                <input type="hidden" name="grand_total1" id="grand_total1" value="{{$total}}" />
                <!------------------ currency section end ------------------>
                <hr>
                
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <a href="#" class="btn btn-success py-3 w-100 rounded-5" @if(count($cartitems)> 0) data-bs-toggle="modal" data-bs-target="#peyment_methed" @endif >{{trans('labels.place_order')}}</a>
                        @if(count($cartitems) > 0)
                        <button class="btn btn-danger py-3 w-100 rounded-5" onclick="RemoveCart('')">Empty Cart</button>
                        @endif
                    </div>
                </div>
                <!----------------- payment-option section end ----------------->
            </div>
        </div>
    </div>
</div>

@else
<div class="d-flex justify-content-center align-items-center vh-100">
    <img src="{{ url(env('ASSETSPATHURL') . 'web-assets/iamges/empty-cart.png') }}" alt="empty-cart" class="w-25 object-fit-cover">
</div>

@endif
<!------------------------------------------ descktop siderbar end ------------------------------------------>
<!-- POS Invoice Model -->
<div class="modal fade pos-modal" id="pos-invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">POS Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-2">{{@Auth::user()->name}}</h3>
                <div class="order-details">
                    <p>#{{@$getorderdata->order_number}}</p>
                    <p class="fw-semibold">{{@$getorderdata->customer_name}}</p>
                    <p>{{@$getorderdata->customer_email}}</p>
                    <p>{{@$getorderdata->mobile}}</p>
                </div>
                <div class="store-details">
                    <p>{{trans('labels.date')}}: <span>{{@date('Y-m-d',strtotime($getorderdata->created_at))}}</span></p>
                </div>
                @if(!empty($ordersdetails))
                @foreach($ordersdetails as $item)
                <div class="items-details mt-4">
                    <span class="fw-semibold mb-3">{{@$item->item_name}} @if($item->variants_name != null) - ({{$item->variants_name}} : {{helper::currency_formate($item->variants_price, Auth::user()->id)}}) @endif</span>
                    @if ($item->extras_id != '')
                    <?php
                    $extras_id = explode(',', $item->extras_id);
                    $extras_name = explode(',', $item->extras_name);
                    $extras_price = explode(',', $item->extras_price);
                    $extras_total_price = 0;
                    ?>
                    <br>
                    @foreach ($extras_id as $key => $addons)
                    <small>
                        <b class="text-muted">{{ $extras_name[$key] }}</b> :
                        {{ helper::currency_formate($extras_price[$key], Auth::user()->id) }}<br>
                    </small>
                    @php
                    $extras_total_price += $extras_price[$key];
                    @endphp
                    @endforeach
                    @else
                    @php
                    $extras_total_price = 0;
                    @endphp
                    @endif
                    <div class="items">
                        <p>{{trans('labels.price')}}</p>
                        <p>{{@$item->qty}} X {{@helper::currency_formate($item->price, Auth::user()->id) }}</p>
                    </div>
                    <div class="items">
                        <p>{{trans('labels.tax')}}</p>
                        <p>{{@helper::currency_formate($item->tax, Auth::user()->id) }}</p>
                    </div>
                    <div class="items">
                        <p>{{trans('labels.total')}}</p>
                        <p>{{@helper::currency_formate($item->price * $item->qty, Auth::user()->id) }}</p>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="total-amount mt-4">
                    <div class="items fw-semibold">
                        <p>{{trans('labels.sub_total')}}</p>
                        <p>{{@helper::currency_formate($getorderdata->sub_total, Auth::user()->id) }}</p>
                    </div>
                    <div class="items fw-semibold">
                        <p>{{trans('labels.tax')}} (+)</p>
                        <p>{{@helper::currency_formate($getorderdata->tax, Auth::user()->id) }}</p>
                    </div>
                    <div class="items fw-semibold">
                        <p>{{trans('labels.discount')}} (-)</p>
                        <p>{{@helper::currency_formate($getorderdata->discount_amount, Auth::user()->id) }}</p>
                    </div>
                    <div class="items fw-semibold">
                        <p>{{trans('labels.grand_total')}}</p>
                        <p>{{@helper::currency_formate($getorderdata->grand_total, Auth::user()->id) }}</p>
                    </div>
                </div>
                <h6 class="fw-semibold text-center mt-4">{{trans('labels.thank_you_note')}}</h6>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <a href="{{ URL::to('admin/orders/print/' . @$getorderdata->order_number) }}" target="new" class="btn btn-secondary">
                    <i class="fa-solid fa-print"></i>
                    <span class="px-2">{{trans('labels.print')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- POS ENd Invoice -->

<!-- payment method Modal -->
<div class="modal fade peyment_methed" id="peyment_methed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4">{{trans('labels.select_option')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="payment-option delivery-Option text-capitalize px-3">
                    <h1 class="modal-title fs-5 fw-600">{{trans('labels.delivery_option')}}</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="order_type" value="2" id="takeaway" class="card-input-element" checked />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <img src="{{url(env('ASSETSPATHURL').'images/takeaway1.png')}}" alt="" class="">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600">{{trans('labels.takeaway')}}</p>
                        </div>
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="order_type" value="1" id="dinein" class="card-input-element" />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <img src="{{url(env('ASSETSPATHURL').'images/dine_in.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600">{{trans('labels.dine_in')}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="payment-option text-capitalize px-3">
                    <h1 class="modal-title fs-5 fw-600">Payment option</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="payment_type" value="1" id="payment_type" class="card-input-element" checked />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <i class="fa-solid fa-wallet fs-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600">{{trans('labels.cash')}}</p>

                        </div>
                        <div class="w-100 rounded-4">
                            <label class="bg-light">
                                <input type="radio" name="payment_type" value="0" id="payment_type2" class="card-input-element" />
                                <div class="card h-100 rounded-3">
                                    <div class="card-body p-2 w-100 d-flex justify-content-center">
                                        <div>
                                            <i class="fa-solid fa-globe fs-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <p class="pt-2 text-center fw-600">{{trans('labels.online')}}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="gap-1 d-flex justify-content-md-end sm-w-100">
                    <a href="http://192.168.29.206/restro/admin/plan" class="btn btn-danger btn-cancel m-1 sm-w-100" data-bs-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-success btn-succes m-1 sm-w-100" @if(count($cartitems)> 0) onclick="placeorder()" @endif >Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- payment method Modal -->

<!-- MODAL_SELECTED_ADDONS--START -->
<div class="modal fade pos-modal" id="modal_selected_addons" tabindex="-1" aria-labelledby="selected_addons_Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selected_addons_Label">{{ trans('labels.selected_addons') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 extra-variation-modal">
                <ul class="list-group list-group-flush p-0 {{ session()->get('direction') == 2 ? 'text-right' : 'text-left' }}">
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- MODAL_SELECTED_ADDONS--END -->
<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/pos_cartview.js') }}" type="text/javascript"></script>