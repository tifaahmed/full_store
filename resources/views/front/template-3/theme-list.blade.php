
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
@if ($check_cat_count > 0)
<section  id="tab-category_{{$category->id}}" class="theme-3-categoris-section px-0">
    <div class="bg-light mb-3 margin_top">
        <p class="page-title mb-0 fs-5 px-2 py-2">{{$category->name}}</p>
    </div>
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
            <div class="row align-items-center border-bottom py-3 pointer" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <div class="col-12">
                    <div class="card thme3categories dark">
                        {{-- <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top border" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')" alt="..."> --}}
                        <div class="card-body {{session()->get('direction') == 2 ? 'ps-0' : 'pe-0'}}">
                            <div class="text-section">
                                <p class="title pb-1" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')">{{$item->item_name}}</p>
                                <small class="mb-2 ">{{$item->description}}</small>
                                <div class="d-flex align-items-baseline">
                                    <div class="products-price">
                                        <span class="price">{{ helper::currency_formate($item->item_price, @$storeinfo->id) }}</span>
                                        @if($item->item_original_price != null)
                                             <del>{{ helper::currency_formate($item->item_original_price, @$storeinfo->id) }}</del>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-1">
                                    @if($item->has_variants == 1)
                                    <a class="theme-3-product-icon" href="javascript:void(0)"  onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')" >
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    @else
                                    <div class="load showload-{{$item->id}}" style="display:none"></div>
                                    <a class="theme-3-product-icon addcartbtn-{{$item->id}}" href="javascript:void(0)"  onclick="addtocart('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}','{{$image}}','{{$item->tax}}','1','{{$item->item_price}}')">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
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
                        <div class="prod-img show-product">

                        <img src="@if( @$item['item_image']->image_url != null ) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif" class="card-img-top border" onclick="showitems('{{ $item->id }}','{{$item->item_name}}','{{$item->item_price}}')" alt="...">

                            {{-- <img src="https://d2bz4cnll657tl.cloudfront.net/uploads/merchants_products/Yo9dmLJvMZ/1621157059299055030_92.png?time=1696023554" alt="Frynado"> --}}

                        </div>
                    </div>
                </div>
            </div>
    @endif
    @endforeach
</section>
@endif
@endforeach
