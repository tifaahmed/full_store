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
<div class="specs theme1grid @if($check_cat_count > 0 && $key != 0) card-none @endif" id="specs-{{$category->id}}">
<div class="row g-2 g-md-3 products-img" >

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
               <div class="col-6 col-lg-3">
                    <div class="card h-100 position-relative">
                         <div class="overflow-hidden theme1grid_image">
                              <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" alt="" class="p-2 p-md-3" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                         </div>
                         <div class="card-body p-2 p-md-3 pb-0 pb-md-3">
                                @if(Auth::user() && Auth::user()->type == 3)
                                   <div class="favorite-icon set-fav1-{{ $item->id }}">
                                        @if ($item->is_favorite == 1)
                                           <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-solid fa-heart"></i></a>
                                        @else
                                          <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-regular fa-heart"></i></a>
                                        @endif
                                   </div>
                                @endif


                              <a href="javascript:void(0)" class="title pb-1" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">{{$item->item_name}}</a>
                              <small class="d_sm_none">{{$item->description}}</small>
                         </div>
                         <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                              <div class="row justify-content-between align-items-center gx-0">
                                   <div class="col-9 col-md-4 mb-2 mb-md-0">
                                        <p class="price">
                                                 {{ helper::currency_formate($item->item_price, @$storeinfo->id) }}
                                        </p>
                                        @if($item->item_original_price != null)
                                        <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                   </div>
                                   <div class="col-3 col-md-8 d-flex justify-content-end mb-2 mb-md-0">
                                        @if($item->has_variants == 1)
                                             <button class="btn-primary product-cart-icon" type="button"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                             </button>
                                        @else
                                             <div class="load showload-{{$item->id}}" style="display:none"></div>
                                             <button class="btn-primary product-cart-icon addcartbtn-{{$item->id}}" type="button"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                             </button>
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
