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
<section id="{{$category->slug}}" class="theme3pruductgrid px-0">
     <div class="bg-light mb-3 margin_top">
          <p class="page-title mb-0 fs-5 px-2 py-2">{{$category->name}}</p>
     </div>
     <div class="row border-bottom pb-3 g-2 g-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">


          @foreach ($getitem as $item)
          @if($category->id == $item->cat_id)
          @php
               if(@$item['item_image']->image_name != null )
               {
               $image = @$item['item_image']->image_name;
               }
               else{
               $image = $item->image;
               }
          @endphp

          <div class="col-md-4 col-lg-6 col-xl-4 col-6">
               <div class="card thme3girdproduct h-100">
                    <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">
                    <div class="card-body px-2 px-md-2 pb-md-2 py-0">
                         <div class="text-section">
                              <p class="title pb-1" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">{{$item->item_name}}</p>
                              <small class="d_sm_none">{{$item->description}}</small>
                         </div>
                    </div>
                    <div class="card-footer px-2 px-md-2 pb-md-2 py-0">
                         <div class="row justify-content-between align-items-center gx-0">
                              <div class="col-9 col-md-10 mb-2 mb-md-0">
                                   <div class="products-price">
                                        <span class="price">{{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                        @if($item->item_original_price != null)
                                        <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                   </div>
                              </div>
                              <div class="col-3 col-md-2 d-flex justify-content-end mb-2 mb-md-0">
                                   @if($item->has_variants == 1)
                                   <a class="theme-3-product-icon m-0" href="javascript:void(0)" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{app()->getLocale()}}')">
                                        <i class="fa-solid fa-plus"></i>
                                   </a>
                                   @else
                                   <div class="load showload-{{$item->id}}" style="display:none"></div>
                                   <a class="theme-3-product-icon m-0 addcartbtn-{{$item->id}}" href="javascript:void(0)" onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                        <i class="fa-solid fa-plus"></i>
                                   </a>
                                   @endif
                                   @if(Auth::user() && Auth::user()->type == 3)
                                   <div class="favorite-icon set-fav1-{{ $item->id }}">
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
          @endif
          @endforeach
     </div>
</section>
@endif
@endforeach