<!-- Kivi Card List -->
@foreach ($getcategory as $key => $category)
                    
@php
    $check_cat_count = 0;
@endphp
     @foreach ($getitem as $item)
          @if ($category->id == $item->cat_id)
               @php
                    $check_cat_count++;
               @endphp
          @endif
     @endforeach
@if($check_cat_count > 0)
<div class="specs @if($check_cat_count > 0 && $key != 0) card-none @endif" id="specs-{{$category->id}}">
    <div class="row g-3">
        @if (!$getcategory->isEmpty())
        @php $i = 0; @endphp
          @foreach ($getitem as $item)
               @if ($category->id == $item->cat_id)
               @php 
                    if(@$item['item_image']->image_name != null ) 
                    {
                        $image = @$item['item_image']->image_name;
                    }
                    else{
                        $image = $item->image;
                    }
                @endphp
        <div class="col-md-6">
            <div class="card thme1categories dark h-100">
                <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top" alt="..." onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                <div class="card-body">
                    <div class="text-section">
                        <a href="javascript:void(0)" class="title pb-1" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">{{$item->item_name}}</a>
                        <small class="mb-2 d_sm_none">{{$item->description}}</small>
                        <div class="d-flex align-items-baseline">
                            <div class="products-price">
                                <span class="price"> {{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                @if($item->item_original_price != null)
                                <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            @if($item->has_variants == 1)
                            <button class="product-cart-icon" type="button"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            @else
                           
                            <div class="load showload-{{$item->id}}" style="display:none"></div>
                            <button class="product-cart-icon addcartbtn-{{$item->id}}" type="button"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{ $image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            @endif
                           
                                            
                            @if(Auth::user() && Auth::user()->type == 3)
                            <div class="favorite-icon1 set-fav1-{{ $item->id }}">
                                @if ($item->is_favorite == 1)
                                    <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-solid fa-heart"></i></a>
                                @else
                                    <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-regular fa-heart"></i></a>
                                @endif
                            </div>

                            @endif
                            
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        @php $i += 1; @endphp
        @endif
   @endforeach
@endif
    </div>
</div>
@endif
@endforeach
