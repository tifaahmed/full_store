<!------------------- main-header start ------------------->
<header class="main-header">
    <div class="navbar d-flex align-items-center">
        <div class="container">
            <div class="logo">
                <a href="{{URL::to('/')}}">
                    <img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="logo">
                </a>
            </div>
            <nav class="main-menu navbar navbar-expand-lg ms-xl-5 me-auto d-none d-lg-block">
                <ul class="navbar-nav nav-menu mb-2 mb-lg-0">
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('/#home')}}">{{ trans('landing.home') }}</a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('/#features')}} ">{{ trans('landing.features') }}</a>
                    </li>
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('/#our-stores')}} ">{{ trans('landing.our_stores') }}</a>
                    </li>
                    @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('/#pricing-plans')}} ">{{ trans('landing.pricing_plan') }}</a>
                    </li>
                    @endif
                    @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('blog_list')}}">{{ trans('landing.blogs') }}</a>
                    </li>
                    @endif
                    <li class="nav-item text-uppercase">
                        <a aria-current="page" href="{{URL::to('/#contect-us')}} ">{{ trans('landing.contact_us') }}</a>
                    </li>
                    
                    <li class="nav-item text-uppercase text-white">
                        <a href="javascript:void(0)" aria-current="page" data-bs-toggle="modal" data-bs-target="#searchModal"> {{ trans('landing.search_store') }}</a>
                    </li>

                </ul>

            </nav>


            <div class="d-flex gap-2">
                @if (App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1)
                <div class="btn-group">
                    <a class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ helper::image_path(session()->get('flag')) }}" alt="" class="language-dropdown-image">
                    </a>
                    <ul class="dropdown-menu user-dropdown-menu {{ session()->get('direction') == 2 ? 'drop-menu-rtl' : 'drop-menu' }}">
    
                        @foreach (helper::listoflanguage() as $languagelist)
                        <li>
                            <a class="dropdown-item language-items py-2 d-flex text-start" href="{{ URL::to('/lang/change?lang=' . $languagelist->code) }}">
                                <img src="{{ helper::image_path($languagelist->image) }}" alt="" class="language-items-img">
                                <span class="px-2 text-dark">{{ $languagelist->name }}</span>
                            </a>
                        </li>
                        @endforeach
    
    
                    </ul>
                </div>
    
                @endif

                <div class="d-flex justify-content-end d-none d-lg-block">
                    <a href="{{ URL::to('/admin') }}" class="btn btn-secondary rounded h-45 text-end" target="_blank"><span class="m-0  fs-6">{{ trans('landing.get_started') }}</a>
                </div>
            </div>




            <button class="btn text-white border-white d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasRight"><i class="fa-solid fa-bars-staggered"></i></button>


            <!---------------- sidebar ---------------->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header justify-content-between align-items-center border-bottom border-dark">
                    <p class="menu_title">{{trans('landing.menu')}}</p>
                    <button type="button" class="btn_close btn shadow" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="offcanvas-body p-0">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('/#home')}}" class="active">{{ trans('landing.home') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('/#features')}}">{{ trans('landing.features') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('/#our-stores')}}">{{ trans('landing.our_stores') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('/#pricing-plans')}}">{{ trans('landing.pricing_plan') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('blog_list')}}">{{ trans('landing.blogs') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" href="{{URL::to('/#contect-us')}} ">{{ trans('landing.contact_us') }}</a>
                        </li>
                        <li class="nav-item text-uppercase border-bottom">
                            <a aria-current="page" data-bs-toggle="modal" data-bs-target="#searchModal">{{ trans('landing.search_store') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!---------------- sidebar ---------------->
        </div>
    </div>

</header>
<!-------------------- main-header end -------------------->

@include('cookie-consent::index')