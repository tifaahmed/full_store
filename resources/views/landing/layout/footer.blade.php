<footer>
    <div class="footer-bg-color">
        <div class="container">
            <div class="footer-contain row justify-content-between">
                <div class="col-md-12 col-lg-4 mt-4">
                    <div class="logo">
                        <a href="#"><img src="{{ helper::image_path(helper::appdata('')->logo) }}" alt="logo"></a>
                    </div>
                    <p class="footer-contain my-4">
                        {{ trans('landing.footer_description') }}
                    </p>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4">{{ trans('landing.about_us') }}</p>
                            <p class="mb-2"><a href="{{URL::to('/#home')}}">{{ trans('landing.home') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('/#features')}}">{{ trans('landing.features') }}</a></p>
                            @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                            <p class="mb-2"><a href="{{URL::to('/#pricing-plans')}}">{{ trans('landing.pricing_plan') }}</a></p>
                            @endif
                            @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
                            <p class="mb-2"><a href="{{URL::to('blog_list')}}">{{ trans('landing.blogs') }}</a></p>
                            @endif
                            <p class="mb-1"><a href="#contect-us">{{ trans('landing.contact_us') }}</a></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4">{{ trans('landing.other_pages') }}</p>
                            <p class="mb-2"><a href="{{URL::to('privacy_policy')}}">{{ trans('landing.privacy_policy') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('refund_policy')}}">{{ trans('landing.refund_policy') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('terms_condition')}}">{{ trans('landing.terms_condition') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('about_us')}}">{{ trans('landing.about_us') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('faqs')}}">{{ trans('landing.faqs') }}</a></p>
                            <p class="mb-2"><a href="{{URL::to('/#our-stores')}}">{{ trans('landing.our_stores') }}</a></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-2 mt-4">{{ trans('landing.help') }}</p>
                            <p class="mb-2"><a href="mailto:{{helper::appdata('')->email}}">{{helper::appdata('')->email}}</a></p>
                            <p class="mb-2"><a href="tel:{{helper::appdata('')->contact}}">{{helper::appdata('')->contact}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-white">
            <div class="copyright-sec row justify-content-between align-items-center">
                <p class="m-0 text-white col-12 col-md-8 text-md-start text-center">{{helper::appdata('')->copyright}}</p>
                <div class="col-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-2 mt-md-0">
                    <div class="social-icon d-flex d-grid gap-3">
                        <a href="{{helper::appdata('')->instagram_link}}"><i class="fa-brands fa-instagram fs-4"></i></a>
                        <a href="{{helper::appdata('')->facebook_link}}"><i class="fa-brands fa-facebook fs-4"></i></a>
                        <a href="{{helper::appdata('')->twitter_link}}"><i class="fa-brands fa-twitter fs-4"></i></a>
                        <a href="{{helper::appdata('')->twitter_link}}"><i class="fa-brands fa-linkedin-in fs-4"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>