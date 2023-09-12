<input type="hidden" id="cat_id" value="{{$cat_id}}"/>

@if(count($getitem) > 0)

<div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-6 g-4 overflow-y-scroll pb-3">

@foreach($getitem as $item)
    <div class="col-sm-6">
        <div class="card h-100 shadow-sm rounded-4 addactive-{{$item->id}} @if ($item->is_cart == 1) active @else border-0 @endif" >
            <div class="card-body pb-0">
                <div class="pos-img">
                    <img src="{{url(env('ASSETSPATHURL').'/item/'.$item['item_image']->image_name)}}"
                        alt="product image">
                </div>
                <div class="pro-content w-100">
                    <h5 class="pro-title">{{$item->item_name}}</h5>
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- <h2 class="pro-price">
                            @php $price = 0; @endphp
                            @if (count($item['variation']) > 0)
                                @foreach ($item->variation as $key => $value)
                                    {{ helper::currency_formate($value->price, Auth::user()->id) }}
                                    @php $price = $value->price; @endphp
                                @break
                                @endforeach
                            @else
                                {{ helper::currency_formate($item->item_price, Auth::user()->id) }}
                                @php $price = $item->item_price; @endphp
                            @endif
                        </h2> -->

                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center pt-0">
                @if($item->has_variants == 1)
                    <a type="button" class="poscart addcartbtn-{{$item->id}}" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$price}}')">
                    <i  class="fa-solid fa-cart-shopping"></i>
                </a>

                @else
                    <div class="load showload-{{$item->id}}" style="display:none"></div>
                    <a type="button" class="poscart addcartbtn-{{$item->id}}" onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$item['item_image']->image_name}}','{{$item->tax}}','1','{{$item->item_price}}')" >
                        <i class="fa-solid fa-cart-shopping"></i>
                </a>
                @endif
                <h2 class="pro-price">
                            @php $price = 0; @endphp
                            @if (count($item['variation']) > 0)
                                @foreach ($item->variation as $key => $value)
                                    {{ helper::currency_formate($value->price, Auth::user()->id) }}
                                    @php $price = $value->price; @endphp
                                @break
                                @endforeach
                            @else
                                {{ helper::currency_formate($item->item_price, Auth::user()->id) }}
                                @php $price = $item->item_price; @endphp
                            @endif
                        </h2>
            </div>
        </div>
    </div>
@endforeach

</div>
@else
<div class="data-found">
    <h2 class="text-muted text-center">{{trans('labels.data_not_found')}}</h2>
</div>
@endif

