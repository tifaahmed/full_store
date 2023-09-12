<div class="theme-3-banner">
    <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->banner) }}" alt="" class="theme-3-banner-image">
    <div class="theme-3-banner-leyer">
        <div class="theme-3-header">
            <div class="theme-3-iconbox">


            @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)

                    @if (Auth::user() && Auth::user()->type == 3)
                    <a href="#" class="theme-3-icon-box" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-user"></i>
                    </a>
                    <ul class="dropdown-menu user-dropdown-menu">
                        <li>
                            <a class="dropdown-item language-items" href="{{ URL::to($storeinfo->slug . '/profile/') }}">
                                <i class="fa fa-user"></i>
                                <p>{{ trans('labels.profile') }}</p>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item language-items" href="{{ URL::to($storeinfo->slug . '/logout/') }}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>{{ trans('labels.logout') }}</p>
                            </a>
                        </li>

                    </ul>
                    @else
                    <a href="{{ URL::to($storeinfo->slug . '/login/') }}" class="theme-3-icon-box ">
                        <i class="fa-regular fa-user"></i>
                    </a>
                    @endif
                @endif
                <a href="#" class="theme-3-icon-box" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>

            @if (App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1)
            <div class="theme-3-language-dropdown">
                <div class="btn-group">
                    <a class="nav-link mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ helper::image_path(session()->get('flag')) }}" alt="" class="language-dropdown-image">
                    </a>
                    <ul class="dropdown-menu user-dropdown-menu">
                        @foreach (helper::listoflanguage() as $languagelist)
                        <li>
                            <a class="dropdown-item language-items" href="{{ URL::to('/lang/change?lang=' . $languagelist->code) }}">
                                <img src="{{ helper::image_path($languagelist->image) }}" alt="" class="language-items-img">
                                <span class="px-2">{{ $languagelist->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{URL::to(@$storeinfo->slug.'/cart')}}" class="position-relative cart-icon-color">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.691" height="25" viewBox="0 0 19.691 25" class="theme-3-cart mx-1">
                        <path id="Path_8965" data-name="Path 8965" d="M32.526,10.38H29.137V9.621a5.667,5.667,0,1,0-11.334,0v.759H14.413a.8.8,0,0,0-.813.813V26.812A2.089,2.089,0,0,0,15.688,28.9H31.2a2.089,2.089,0,0,0,2.088-2.088V11.167A.733.733,0,0,0,32.526,10.38Zm-13.1-.786a4.04,4.04,0,1,1,8.08,0v.759H19.43Zm11.8,17.679H15.715a.486.486,0,0,1-.488-.488V11.98H31.713v14.8A.486.486,0,0,1,31.225,27.273Z" transform="translate(-13.6 -3.9)"></path>
                    </svg>
                    <span class="cart-counting-color" id="cartcount">{{ helper::getcartcount($storeinfo->id,@Auth::user()->id)}}</span>
                </a>
            </div>
            @endif

        </div>
        <div class="container d-flex justify-content-center align-items-center m-auto">
            <div class="col-md-6">
                <a href="{{url('/'.$storeinfo->slug)}}" class="logo">
                    <img src="{{ helper::image_path(helper::appdata(@$storeinfo->id)->logo) }}" alt="" class="m-auto d-flex rounded-3">
                </a>
                <h2 class="theme-3-titlebanner">{{@$storeinfo->name}}</h2>
                <h5 class="text-center pt-3">{{ helper::appdata($storeinfo->id)->description }}</h5>
                
            </div>
        </div>
    </div>
</div>

<!-- Subscribe Modal -->

<div class="modal subscription-popup fade" id="subscribe_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-lights">
            <div class="modal-body p-md-0">
                <div class="card rounded-4 border-0 bg-lights p-md-3">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4 d-none d-lg-block">
                            <img src="{{ helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)}}" alt=""
                                class="w-100 object-fit-cover rounded-4">
                        </div>
                        <div class="col-12 col-lg-8">
                            <h4 class="fs-2 mb-2 fw-600">{{trans('labels.subscribe_title')}}</h4>
                            <p class="text-muted pb-3">{{trans('labels.subscribe_description')}}</p>
                            <form action="{{ URL::to($storeinfo->slug . '/subscribe') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$storeinfo->id}}">
                                <div class="bg-body rounded-2 p-2 shadow-lg rounded-4 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <input class="form-control border-0 me-1" type="email" name="email"
                                            placeholder="{{trans('labels.enter_email')}}" required>
                                        <button type="submit"
                                            class="btn btn-primary rounded-2 mb-0 btn-submit rounded-4 d-none d-md-inline-block">{{ trans('labels.subscribe') }}!</button>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn w-100 btn-primary rounded-2 mb-0 btn-submit rounded-4 d-inline-block d-md-none">{{ trans('labels.subscribe') }}!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('cookie-consent::index')