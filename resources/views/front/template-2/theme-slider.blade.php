
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
            <div id="product_items-{{ $category->id }}" class="row g-2 g-md-3  owl-carousel product-items  owl-theme" >

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


         {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3" > --}}
             <div class="card mb-3 border-0 rounded-0 theme-2-products-card h-100">
               <div class="theme_2_grid_img overflow-hidden">
                    <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="img-fluid" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">
               </div>
                    <div class="card-body px-2 px-md-3 pb-0">
                         <p class="title" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">{{$item->item_name}}</p>
                         <small class="d_sm_none">{{$item->description}}</small>
                    </div>
                    <div class="card-footer px-2 px-md-3 pt-0">
                         <div class="row justify-content-between align-items-center gx-0">
                              <div class="col-9 col-md-9 mb-2 mb-md-0">
                                   <div class="products-price mb-2 align-items-center">
                                        <span class="price">{{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                        @if($item->item_original_price != null)
                                        <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                   </div>
                              </div>
                              <div class="col-3 col-md-3 d-flex justify-content-end mb-2 mb-md-0">
                                   <div class="d-flex align-items-center justify-content-between">

                                             @if($item->has_variants == 1)
                                                  <button class="theme-2-product-icon btn" type="button"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">
                                                  <i class="fa-solid fa-cart-shopping"></i>
                                                  </button>
                                             @else
                                                  <div class="load showload-{{$item->id}}" style="display:none"></div>
                                                  <button class="theme-2-product-icon btn addcartbtn-{{$item->id}}" ttype="button"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
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
         {{-- </div> --}}

               @php $i += 1; @endphp
               @endif
          @endforeach
          @endif



         </div>
     </div>
@endif

@endforeach
