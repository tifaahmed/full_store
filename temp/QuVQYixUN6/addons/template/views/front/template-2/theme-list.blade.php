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



 <div class="specs @if($check_cat_count > 0 && $key != 0) card-none @endif" id="specs-{{$category->id}}">
    <div class="row">

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

                        @if($check_cat_count > 0)
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-4">
                            <div class="card border-0 rounded-0 theme-2-products-card h-100 p-2">
                                <div class="row justify-content-center align-items-start">
                                    <div class="col-6 px-0">
                                        <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="img-fluid rounded-0" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')" alt="...">
                                    </div>
                                    <div class="col-6 theme2list">
                                        <div class="card-body p-0">
                                            <div>
                                                <p class="title pb-1" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">{{$item->item_name}}</p>
                                                <small class="pb-1 d_sm_none">{{$item->description}}</small>
                                                <div class="products-price mb-1 align-items-center">
                                                    <span class="price">{{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                                    @if($item->item_original_price != null)
                                                    <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                @if($item->has_variants == 1)

                                                    <button class="theme-2-product-icon btn" type="button"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>

                                                @else
                                                    <div class="load showload-{{$item->id}}" style="display:none"></div>
                                                    <button class="theme-2-product-icon btn addcartbtn-{{$item->id}}" type="button"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>

                                                @endif



                                                @if(Auth::user() && Auth::user()->type == 3)
                                                    <div class="set-fav1-{{ $item->id }}">
                                                    
                                                    @if ($item->is_favorite == 1)
                                                        <a class="theme-2-product-icon mx-2" href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')">
                                                            <i class="fa-solid fa-heart"></i>
                                                        </a>
                                                    @else
                                                        <a class="theme-2-product-icon mx-2" href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </a>
                                                    @endif

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @php $i += 1; @endphp
                        @endif
                @endif
                @endforeach
    
    </div>
</div>
@endif

@endforeach