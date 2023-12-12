
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
     <p class="page-title title-start mb-0 fs-5 py-4">{{$category->name}}</p>
     <div class="row theme-4-gridproduct-card g-2 g-md-3">

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
                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="card main-themegrid-product h-100">
                        <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')" alt="...">
                        <div class="card-body">
                            <a class="title pb-1" href="javascript:void(0)" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">{{$item->item_name}}</a>
                            <small class="d_sm_none">{{$item->description}}</small>
                        </div>
                        <div class="card-footer px-0 pt-0">
                            <div class="row justify-content-between align-items-center gx-0">
                                <div class="col-9 col-md-10 mb-2 mb-md-0">
                                    <div class="products-price">
                                        <span class="price">{{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                        @if($item->item_original_price != null)
                                        <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3 col-md-2 d-flex justify-content-end px-2 mb-2 mb-md-0">
                                    @if($item->has_variants == 1)
                                        <a type="button"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">
                                                <i class="fa-solid fa-circle-plus fs-5 px-2"></i>
                                        </a>
                                    @else
                                        <div class="load showload-{{$item->id}}" style="display:none"></div>
                                        <a type="button" class="addcartbtn-{{$item->id}}"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                                <i class="fa-solid fa-circle-plus fs-5"></i>
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
                @php $i += 1; @endphp
                    @endif
                @endforeach
        @endif
     </div>
 </div>
@endif
 @endforeach
