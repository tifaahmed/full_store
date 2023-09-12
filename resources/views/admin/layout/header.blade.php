<header class="page-topbar">
    <div class="navbar-header">
        <button class="navbar-toggler d-lg-none d-md-block px-2 px-md-3" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fa-regular fa-bars fs-4"></i>
        </button>

        <div class="d-flex align-items-center">

            @if (session('vendor_login'))
            <a href="{{ URL::to('/admin/admin_back') }}" class="header_icon_box bg-success">
                <i class="fa-solid fa-desktop text-white"></i>
            </a>
            @endif
            @if (Auth::user()->type == 2)
            <a class="header_icon_box mx-2 bg-warning" href="{{ URL::to('/' . Auth::user()->slug) }}" target="_blank">
                <i class="fa-solid fa-link text-white"></i>
            </a>
            @endif

            <!-- dekstop-tablet-mobile-language-dropdown-button-start-->
            @if (App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1)

            <div class="position-relative mx-1">
                <div class="dropdown">
                    <a class="btn-sm border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ helper::image_path(session()->get('flag')) }}" alt="" class="language-dropdown">
                    </a>
                    <ul class="dropdown-menu drop-menu shadow border-0 {{ session()->get('direction') == 2 ? 'drop-menu-rtl' : 'drop-menu'}}">
                        @foreach (helper::listoflanguage() as $languagelist)
                        <li>
                            <a class="dropdown-item d-flex text-start px-3 py-2 align-items-center" href="{{ URL::to('/lang/change?lang=' . $languagelist->code) }}">
                                <img src="{{ helper::image_path($languagelist->image) }}" alt="" class="img-fluid language-dropdown">
                                <span class="px-2">{{ $languagelist->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- dekstop-tablet-mobile-language-dropdown-button-end-->

            <div class="dropwdown d-inline-block">
                <button class="btn header-item" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ helper::image_path(Auth::user()->image) }}">
                    <span class="d-none d-xxl-inline-block d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="fa-regular fa-angle-down d-none d-xxl-inline-block d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu shadow border-0">
                    <a href="{{ URL::to('admin/settings') }}#settings" class="dropdown-item d-flex align-items-center px-3 py-2">
                        <i class="fa-solid fa-gear fs-5"></i>
                        <span class="px-2">settings</span>
                    </a>

                    <a href="javascript:void(0)" onclick="statusupdate('{{ URL::to('/admin/logout')}}')" class="dropdown-item d-flex align-items-center px-3 py-2">
                            <i class="fa-solid fa-right-from-bracket fs-5"></i>
                        <span class="px-2">{{ trans('labels.logout') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>