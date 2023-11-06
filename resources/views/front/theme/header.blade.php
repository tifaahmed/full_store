<header>
    <div class="header-main fixed-top">
        @if (env('Environment') == 'sendbox') 
        <div class="sale">
            <div class="container">
                <div class="d-block d-md-flex justify-content-center align-items-center">
                    <p class="text-center"> <a href="https://1.envato.market/XxMgjX" target="_blank">This is a demo website - Buy genuine Restro SaaS using our official link! Click Now >>> Buy Now</a></p>
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="Navbar" style="padding: 0px 0px;">
                <a href="{{ URL::to(@$storeinfo->slug) }}" class="logo">
                    <img style="height: 73px;min-width: 240px;" src="{{ helper::image_path(helper::appdata(@$storeinfo->id)->logo) }}" alt="">
                </a>
                <div class="d-flex align-items-center gap-3">
                    <nav class="align-items-center {{session()->get('direction') == 2 ? 'menu-rtl' : 'menu'}}">
                        <div id="deletebtn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <ul class="navbar-nav header-menu-items">
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link {{ request()->is(@$storeinfo->slug) ? 'active' : '' }} {{ request()->is('/') ? 'active' : '' }}"  href="{{ URL::to(@$storeinfo->slug) }}">
                                    {{ trans('labels.home') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link {{ request()->is(@$storeinfo->slug.'/aboutus') ? 'active' : '' }} {{ request()->is('aboutus') ? 'active' : '' }}" href="{{ URL::to(@$storeinfo->slug . '/aboutus') }}">
                                    {{ trans('labels.about_us') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link {{ request()->is(@$storeinfo->slug.'/contact') ? 'active' : '' }} {{ request()->is('contact') ? 'active' : '' }}" href="{{ URL::to(@$storeinfo->slug . '/contact') }}">
                                    {{ trans('labels.contact_us') }}
                                </a>
                            </li>

                            <li class="nav-item dropdown header-dropdown-menu px-4 desk-only">
                                <a href="{{ URL::to(@$storeinfo->slug . '/tablebook') }}" class="nav-link {{ request()->is(@$storeinfo->slug.'/tablebook') ? 'active' : '' }} {{ request()->is('tablebook') ? 'active' : '' }}">
                                    {{ trans('labels.table_book') }}
                                </a>
                            </li>

                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a href="javascript:void(0)" class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    {{ trans('labels.search') }}
                                </a>
                            </li>
                            
                            <li class="nav-item dropdown header-dropdown-menu px-4 d-flex align-items-center d-none d-lg-inline-block">
                                <div class="d-flex align-items-center">
                                    <a class="nav-link position-relative {{ request()->is(@$storeinfo->slug.'/cart') ? 'active' : '' }} {{ request()->is('cart') ? 'active' : '' }}" href="{{ URL::to(@$storeinfo->slug . '/cart') }}">
                                        <span>
                                            {{ trans('labels.my_cart') }}
                                        </span>
                                        <a class="cart-counting mx-2"
                                            id="cartcount">{{ helper::getcartcount($storeinfo->id, @Auth::user()->id) }}</a>
                                    </a>
                                </div>
                            </li>


                            @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)

                                @if (Auth::user() && Auth::user()->type == 3)
                                    <li
                                        class="nav-item dropdown header-dropdown-menu px-4 d-flex align-items-center d-lg-none">
                                        <a class="nav-link position-relative"
                                            href="{{ URL::to($storeinfo->slug . '/profile/') }}">
                                            <span>
                                                {{ trans('labels.profile') }}
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-item dropdown header-dropdown-menu px-4 d-flex align-items-center d-lg-none">
                                        <a class="nav-link position-relative"
                                            href="{{ URL::to($storeinfo->slug . '/logout/') }}">
                                            <span>
                                                {{ trans('labels.logout') }}
                                            </span>
                                        </a>
                                    </li>

                                    <a href="" class="login-button-mobile login-buuton d-lg-none"><i
                                            class="fa fa-user ms-3"></i> {{ Auth::user()->name }}</a>
                                @else
                                    <a href="{{ URL::to($storeinfo->slug . '/login/') }}"
                                        class="login-button-mobile login-buuton d-lg-none">{{ trans('labels.login') }}</a>
                                @endif

                            @endif

                        </ul>
                    </nav>
                    <!-- Search Modal Start  -->
 
                    <a class="nav-link d-lg-none text-white desk-only" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                        <span>
                            <i class="fa-solid fa-magnifying-glass fs-5"></i>
                        </span>
                    </a>
 
                    

                    {{-- cart mobile --}}
                        <div class="position-relative desk-only">
                            <a class="nav-link d-lg-none text-white" 
                            href="{{ URL::to(@$storeinfo->slug . '/cart') }}">
                                <span>
                                    <i class="fa-solid fa-cart-shopping fs-5"></i>
                                </span>
                                <a class="cart-counting cart-2 mx-2 d-lg-none "
                                    id="cartcount_mobile">
                                    {{ helper::getcartcount($storeinfo->id, @Auth::user()->id) }}
                                </a>
                            </a>
                        </div>
                    {{-- cart mobile --}}

                    @if (App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1)

                        <div class="btn-group">
                            <a class="nav-link d-flex align-items-center" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- <img src="{{ helper::image_path(session()->get('flag')) }}"
                                    alt="" class="language-dropdown-image"> --}}
                                <span class="px-2" style="color: white">{{  session()->get('language') }}</span>

                            </a>
                            <ul
                                class="dropdown-menu user-dropdown-menu {{ session()->get('direction') == 2 ? 'drop-menu-rtl' : 'drop-menu' }}">

                                @foreach (helper::listoflanguage() as $languagelist)
                                    <li>
                                        <a class="dropdown-item language-items d-flex text-start"
                                            href="{{ URL::to('/lang/change?lang=' . $languagelist->code) }}">
                                            <img src="{{ helper::image_path($languagelist->image) }}" alt=""
                                                class="language-items-img">
                                            <span class="px-2">{{ $languagelist->name }}</span>
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>

                    @endif



                        @if (Auth::user() && Auth::user()->type == 3)
                            <a class="nav-link d-flex align-items-center mx-2 mx-md-0 d-none d-md-block text-white"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ helper::image_path(@Auth::user()->image) }}" alt="" class="profile_image">
                            </a>
                            <ul class="dropdown-menu user-dropdown-menu">
                                <li>
                                    <a class="dropdown-item language-items"
                                        href="{{ URL::to($storeinfo->slug . '/profile/') }}">
                                        <i class="fa fa-user"></i>
                                        <p>{{ trans('labels.profile') }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item language-items"
                                        href="{{ URL::to($storeinfo->slug . '/logout/') }}">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <p>{{ trans('labels.logout') }}</p>
                                    </a>
                                </li>

                            </ul>
                        @else
                            <a href="{{ URL::to($storeinfo->slug . '/login/') }}"
                                class="login-buuton d-none d-md-block">{{ trans('labels.login') }}</a>
                        @endif

                    <div class="togl-btn toggle_button desk-only"  >
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
            <div class="bg-layer"></div>
        </div>
    </div>

</header>

@include('cookie-consent::index')
