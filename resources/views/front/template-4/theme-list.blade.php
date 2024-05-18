
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
<div id="{{$category->slug}}">
    <p class="page-title mb-0 fs-5 py-4">{{$category->name}}</p>
    <div class="row theme-4-listproduct-card">
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
                <div class="col-md-6 col-lg-6 col-xl-4 px-0">
                    <div class="thme4product-list card thme4categories dark">
                        <div class="card-body main-text-section4" >
                            <div class="text-section">
                                <p class="title pb-1" 
                                onclick="showitems(
                                    '{{ $item->id }}',
                                    '{{$item->item_name}}',
                                    '{{$item->item_price}}'
                                )">
                                    {{$item->item_name}}
                                </p>
                                <a href="javascript:void(0)" 
                                onclick="showitems(
                                    '{{ $item->id }}',
                                    '{{$item->item_name}}',
                                    '{{$item->item_price}}'
                                )">
                                    <small class="d_sm_none">{{$item->description}}</small>
                                </a>
                                <div class="d-flex align-items-end gap-2">
                                    <div class="products-price">
                                        <span class="price"> {{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                        @if($item->item_original_price != null)
                                        <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        @if($item->has_variants == 1)
                                            <a type="button"  
                                            onclick="showitems(
                                                '{{ $item->id }}',
                                                '{{$item->item_name}}',
                                                '{{$item->item_price}}'
                                            )">
                                                <i class="fa-solid fa-circle-plus fs-4"></i>
                                            </a>
                                        @else
                                            <div class="load showload-{{$item->id}}" style="display:none"></div>
                                            <a type="button" class="btn-cartnew addcartbtn-{{$item->id}}"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                                    <i class="fa-solid fa-circle-plus fs-4"></i>
                                            </a>

                                        @endif
                                        @if(Auth::user() && Auth::user()->type == 3)
                                        <div class="favorite-icon1 px-0 set-fav1-{{ $item->id }}">
                                            @if ($item->is_favorite == 1)
                                                <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-solid fa-heart fs-4"></i></a>
                                            @else
                                                <a href="javascript:void(0)" onclick="managefavorite('{{$storeinfo->id}}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug.'/managefavorite') }}','{{request()->url()}}')"><i class="fa-regular fa-heart fs-4"></i></a>
                                            @endif
                                        </div>

                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top" 
                        onclick="showitems(
                            '{{ $item->id }}',
                            '{{$item->item_name}}',
                            '{{$item->item_price}}'
                        )" alt="...">
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
