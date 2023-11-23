@extends('front.theme.default')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-sec desk-only">
    <div class="container">
        <nav class="px-2">
            <h3 class="page-title text-white mb-2">{{ trans('labels.my_addresses') }}</h3>
            <ol class="breadcrumb d-flex text-capitalize">
                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{ trans('home') }}</a></li>
                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{ trans('labels.my_addresses') }}</li>
            </ol>
        </nav>
    </div>
</div>
<section>
    <div class="theme-4-bannre mobile-only ">
        <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="">
    </div>
</section>
<!-- breadcrumb end -->
<!-- user_addresses Section end -->
<section class="bg-light mt-0 py-5 pull-section-up">
    <div class="container">
        <div class="row">
            @include('front.theme.user_sidebar')
            <div class="col-md-12 col-lg-9">
                <div class="card shadow border-0 rounded-5">
                    <div class="card-body py-4">
                        <h2 class="page-title mb-2 px-3">
                            {{ trans('labels.my_addresses') }}
                            <a  class="btn btn-success btn-size" type="button" 
                            href="{{ URL::to($storeinfo->slug . '/user-address/create') }}">
                                  {{ trans('labels.add') }}
                            </a>
                        </h2>
                        @if (count($addresses) > 0)
                        <div class="row g-3 products-img ">
                            @foreach ($addresses as $address)
                             
                            <div class="col-12 col-lg-4 col-md-6">
                                <div class="card h-100 position-relative">
                                    <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                                        <div class="row justify-content-between align-items-center gx-0">
                                            <div class="col-lg-12 col-md-12  " style="text-align: center">

                                                <h4> <i class="{{$address_types[$address->type]['icon']}}"></i> </h4> 
                                                <h4>{{$address->title}}</h4> 
                                                <p>{{$address->address}}</p>
                                                
                                                
                                            </div>
                                            <div class="col-lg-12 col-md-12 ">
                                                
                                                <a  class="btn btn-info btn-block" style="color: #fff;width: 100%;" 
                                                href="{{ url($storeinfo->slug.'/user-address/'.$address->id.'/edit') }}">
                                                      {{ trans('labels.edit') }}
                                                </a>
                                                <br>
                                                <form action="{{ url($storeinfo->slug.'/user-address/delete') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="text" hidden name="id" value="{{$address->id}}">
                                                    <button class="btn btn-danger btn-block" type="submit" style="width: 100%;"> 
                                                        {{ trans('labels.delete') }}
                                                    </button>
                                                </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="d-flex justify-content-center align-items-center m-auto mt-4">
                                <nav aria-label="Page navigation example">
                                    @if ($addresses->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="page-item {{ ($addresses->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link {{session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'}}" href="{{ $addresses->url(1) }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $addresses->lastPage(); $i++)
                                            <li class="page-item  {{ ($addresses->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $addresses->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li class="page-item {{ ($addresses->currentPage() == $addresses->lastPage()) ? ' disabled' : '' }}">
                                                <a class="page-link {{session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'}}" href="{{ $addresses->url($addresses->currentPage()+1) }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                    </ul>
                                    @endif
                                </nav>
                            </div>





                        </div>
                        @else
                        @include('front.nodata')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.theme.footer-bar')

</section>
<!-- Favorites Section end -->
<!-- Account menu button Start -->
<button class="btn account-menu btn-primary d-lg-none d-md-block hide_when_footer_bar_show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <i class="fa-solid fa-bars-staggered text-white"></i>
    <span class="px-2">{{ trans('labels.account_menu') }}</span>
</button>
<!-- Account menu button End -->
@endsection
@section('script')
<script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection