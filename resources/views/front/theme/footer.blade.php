<!-- Footer Section Start -->
<footer class="mt-25">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-md-4 mb-lg-0">
                <a href="{{ URL::to(@$storeinfo->slug) }}" class="footer-logo text-white">
                    <img src="{{ helper::image_path(helper::appdata(@$storeinfo->id)->logo) }}" alt="">
                </a>
                <p class="footersubtitle"> {{ helper::appdata($storeinfo->id)->description }}</p>

            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row justify-content-center justify-content-center">
                    <!-- <div class="col-md-4 col-lg-6 mb-4 mb-md-0 px-0 ">
                        <h5 class="footer-title"> {{ trans('labels.links') }}</h5>
                        <ul class="footer-right-side">
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug) }}" class="mb-3">
                                    {{ trans('labels.home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/aboutus') }}" class="mb-3">
                                    {{ trans('labels.about_us') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/contact') }}" class="mb-3">
                                    {{ trans('labels.contact_us') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/tablebook') }}" class="mb-3">
                                    {{ trans('labels.table_book') }}
                                </a>
                            </li>
                            @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
                                @php

                                if ($storeinfo->allow_without_subscription == 1) {
                                    $blog = 1;
                                } else {
                                    $blog = @helper::get_plan($storeinfo->id)->blogs;
                                }
                                @endphp
                                @if($blog == 1)
                                    <li>
                                        <a href="{{ URL::to(@$storeinfo->slug . '/blog-list') }}" class="mb-3">
                                            {{ trans('labels.blogs') }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div> -->
                    <!-- <div class="col-md-4  col-lg-6 mb-4 mb-md-0 px-0 ">
                        <h5 class="footer-title"> {{ trans('labels.other_pages') }}</h5>
                        <ul class="footer-right-side">
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/terms_condition') }}" class="mb-3">
                                    {{ trans('labels.terms') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/privacypolicy') }}" class="mb-3">
                                    {{ trans('labels.privacy_policy') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/refundprivacypolicy') }}" class="mb-3">
                                    {{ trans('labels.refund_policy') }}
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="col-md-12 col-12 mb-md-0 px-0 ">
                        <h5 class="footer-title"> {{ trans('labels.infromation') }}</h5>
                        <ul class="footer-right-side">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>
                                    <a href="https://www.google.com/maps/place/323/{{ helper::appdata($storeinfo->id)->address }}"
                                        class="px-2">{{ helper::appdata($storeinfo->id)->address }}</a>
                                </span>
                            </li>
                    
                 
                            <li>
                                <i class="fa-regular fa-circle-question"></i>
                                <span class="px-2">
                                    <a href="#" href="#" data-bs-toggle="modal" data-bs-target="#examplehours"
                                        data-bs-whatever="@mdo">{{ trans('labels.hours') }}</a>
                                </span>
                            </li>
                            <li>
                                <i class="fa-solid fa-headphones"></i>
                                <span class="px-2"> <a
                                        href="tel:{{ helper::appdata($storeinfo->id)->contact }}">{{ helper::appdata($storeinfo->id)->contact }}</a>
                                </span>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/privacypolicy') }}" class="mb-3">
                                    {{ trans('labels.privacy_policy') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/terms_condition') }}" class="mb-3">
                                    {{ trans('labels.terms') }}
                                </a>
                            </li>
                
                            <li>
                                <a href="{{ URL::to(@$storeinfo->slug . '/refundprivacypolicy') }}" class="mb-3">
                                    {{ trans('labels.refund_policy') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa-regular fa-envelope"></i>
                                <span class="px-2">
                                    <a href="mailto:{{ helper::appdata($storeinfo->id)->email }}">
                                        {{ helper::appdata($storeinfo->id)->email }}</a>
                                </span>
                            </li>
                    
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3">
        <div class="d-block d-md-flex align-items-center justify-content-center justify-content-md-between pb-3">
            <p class="fs-7 pb-3 md-mb-0 lg-mb-0 xl-mb-0 text-md-start text-center">
                {{ helper::appdata($storeinfo->id)->copyright }}</p>
            <!-- <div class="ml-lg-0 text-center text-md-end">
                <a class="btn btn-outline-light m-1 border-0 facebook" role="button"
                    href="{{ helper::appdata($storeinfo->id)->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light m-1 border-0"
                    href="{{ helper::appdata($storeinfo->id)->twitter_link }}" role="button"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light m-1 border-0" href="{{ helper::appdata($storeinfo->id)->linkedin_link }}"
                    role="button"><i class="fa-brands fa-linkedin"></i></a>
                <a class="btn btn-outline-light m-1 border-0"
                    href="{{ helper::appdata($storeinfo->id)->instagram_link }}" role="button"><i
                        class="fab fa-instagram"></i></a>
            </div> -->
        </div>
    </div>
</footer>
<!-- Customisation modal Start -->
<div class="modal fade slide-up" id="customisation" tabindex="-1" aria-labelledby="customisationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded-5">
            <div class="modal-header px-4">
                <p class="title pb-1" id="cart_item_name"></p>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <p class="title pb-1 pt-2 variants" id="cart_variants_title"></p>
                <form id="cart_variants">

                </form>
                <p class="title pb-1 pt-3 variants" id="cart_extras_title"></p>
                <form class="extras-form" id="cart_extras">

                </form>
            </div>
        </div>
    </div>
</div>
