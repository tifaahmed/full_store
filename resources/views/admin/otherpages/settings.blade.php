@extends('admin.layout.default')
@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2">{{ trans('labels.settings') }}</h5>
        @include('admin.layout.breadcrumb')
    </div>
</div>
<div class="row settings mt-3 mb-7">
    <div class="col-xl-12 mb-4">
        <div class="card card-sticky-top border-0 shadow">
            <div class="card-body">
                <nav class="scrolling-wrapper">
                    <ul class="d-flex align-items-center flex-md-wrap general_settings list-options gap-2 mb-3">
                        <li>
                            <a data_attribute="basicinfo" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline active" aria-current="true">
                                <i class="fa-solid fa-circle-info"></i>
                                <p class="px-2">{{ trans('labels.basic_info') }}</p>
                            </a>
                        </li>
                        @if (Auth::user()->type == 2)
                        <li>
                            <a data_attribute="themesettings" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline" aria-current="true">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                <p class="px-2">{{ trans('labels.theme_settings') }}</p>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a data_attribute="editprofile" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline" aria-current="true">
                                <i class="fa-solid fa-user-pen"></i>
                                <p class="px-2">{{ trans('labels.edit_profile') }}</p>
                            </a>
                        </li>
                        <li>
                            <a data_attribute="changepasssword" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-baseline" aria-current="true">
                                <i class="fa-solid fa-unlock"></i>
                                <p class="px-2">{{ trans('labels.change_password') }}</p>
                            </a>
                        </li>
                        <li>
                            <a data_attribute="seo" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-solid fa-chart-line"></i>
                                <p class="px-2">{{ trans('labels.seo') }}</p>
                            </a>
                        </li>
                        @if (Auth::user()->type == 1)
                        <li>
                            <a data_attribute="landing_page" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-solid fa-clipboard"></i>
                                <p class="px-2">{{ trans('labels.landing_page') }}</p>
                            </a>
                        </li>
                        @endif


                        @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
                        <li>
                            <a data_attribute="google_login_config" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-brands fa-google"></i>
                                <p class="px-2">{{ trans('labels.google_login_config') }}</p>
                            </a>
                        </li>
                        <li>
                            <a data_attribute="facebook_login_config" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-brands fa-facebook-f"></i>
                                <p class="px-2">{{ trans('labels.facebook_login_config') }}</p>
                            </a>
                        </li>
                        @endif

                        <li>

                            <a data_attribute="email_smtp_configuration" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-solid fa-envelope"></i>
                                <p class="px-2">{{ trans('labels.email_smtp_configuration') }}</p>
                            </a>

                        </li>


                        @if (Auth::user()->type == 2)

                        @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                        @php
                        if (Auth::user()->allow_without_subscription == 1) {
                        $whatsapp_message = 1;
                        } else {
                        $whatsapp_message = @helper::get_plan(Auth::user()->id)->whatsapp_message;
                        }
                        @endphp
                        @else
                        @php
                        $whatsapp_message = 1;
                        @endphp
                        @endif



                        @if ($whatsapp_message == 1)
                        <li>
                            <a data_attribute="whatsappmessagesettings" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center" aria-current="true">
                                <i class="fa-brands fa-whatsapp"></i>
                                <p class="px-2">{{ trans('labels.whatsapp_message') }}</p>
                            </a>
                        </li>
                        @endif

                        @if (App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1)

                        @php
                        if (Auth::user()->allow_without_subscription == 1) {
                        $telegram_message = 1;
                        } else {
                        $telegram_message = @helper::get_plan(Auth::user()->id)->telegram_message;
                        }
                        @endphp

                        @if ($telegram_message == 1)
                        <li>
                            <a data_attribute="telegram" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center" aria-current="true">
                                <i class="fa-brands fa-telegram"></i>
                                <p class="px-2">
                                    {{ trans('labels.telegram_message_settings') }}@if (env('Environment') == 'sendbox')
                                    <span class="badge badge bg-danger me-5">{{ trans('labels.addon') }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        @endif
                        @endif

                        @endif

                        @if (Auth::user()->type == 1)
                        @if (App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1)
                        <li>
                            <a data_attribute="custom_domain" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-baseline" aria-current="true">
                                <i class="fa-solid fa-globe"></i>
                                <p class="px-2">
                                    {{ trans('labels.custom_domain') }}@if (env('Environment') == 'sendbox')
                                    <span class="badge badge bg-danger me-5">{{ trans('labels.addon') }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        @endif
                        @if (App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1)
                        <li>
                            <a data_attribute="google_analytics" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-baseline" aria-current="true">
                                <i class="fa-solid fa-chart-pie"></i>
                                <p class="px-2">
                                    {{ trans('labels.google_analytics') }}@if (env('Environment') == 'sendbox')
                                    <span class="badge badge bg-danger me-5">{{ trans('labels.addon') }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a data_attribute="recaptcha" class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100" aria-current="true">
                                <i class="fa-solid fa-gears"></i>
                                <p class="px-2">
                                    {{ trans('labels.cookie_recaptcha') }}
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div id="settingmenuContent">
            <div id="basicinfo" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-circle-info fs-5"></i>
                                <h5 class="px-2 text-dark">{{ trans('labels.basic_info') }}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ URL::to('admin/settings/update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">{{ trans('labels.currency_symbol') }}<span class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control" name="currency" value="{{ @$settingdata->currency }}" placeholder="{{ trans('labels.currency_symbol') }}" required>
                                                        @error('currency')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                        <label class="form-label">
                                                            {{ trans('labels.currency_position') }}
                                                        </label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input form-check-input-secondary" type="radio" name="currency_position" id="radio" value="1" {{ @$settingdata->currency_position == 'left' ? 'checked' : '' }} />
                                                                <label for="radio" class="form-check-label">{{ trans('labels.left') }}</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input form-check-input-secondary" type="radio" name="currency_position" id="radio1" value="2" {{ @$settingdata->currency_position == 'right' ? 'checked' : '' }} />
                                                                <label for="radio1" class="form-check-label">{{ trans('labels.right') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-start mt-2 mt-md-0 justify-content-md-center {{ env('Environment') == 'sendbox' ? 'col-md-3 ' : 'col-md-3' }}">
                                                        <div>
                                                            <label class="form-label" for="">{{ trans('labels.maintenance_mode') }}
                                                            </label>
                                                            <input id="maintenance_mode-switch" type="checkbox" class="checkbox-switch" name="maintenance_mode" value="1" {{ $settingdata->maintenance_mode == 1 ? 'checked' : '' }}>
                                                            <label for="maintenance_mode-switch" class="switch">
                                                                <span class="{{ session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle' }}"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__left {{ session()->get('direction') == 2 ? 'pe-2' : 'ps-2' }}">{{ trans('labels.off') }}</span>
                                                                <span class="switch__right {{ session()->get('direction') == 2 ? 'ps-2' : 'pe-2' }}">{{ trans('labels.on') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if (Auth::user()->type == 2)
                                                    @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
                                                    <div class="d-flex justify-content-start mt-2 mt-md-0 justify-content-md-center {{ env('Environment') == 'sendbox' ? 'col-md-4' : 'col-md-3' }}">
                                                        <div>
                                                            <label class="form-label" for="">{{ trans('labels.checkout_login_required') }}
                                                            </label>
                                                            @if (env('Environment') == 'sendbox')
                                                            <span class="badge badge bg-danger ms-2 mb-0">{{ trans('labels.addon') }}</span>
                                                            @endif
                                                            <input id="checkout_login_required-switch" type="checkbox" class="checkbox-switch" name="checkout_login_required" value="1" {{ $settingdata->checkout_login_required == 1 ? 'checked' : '' }}>
                                                            <label for="checkout_login_required-switch" class="switch">
                                                                <span class="{{ session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle' }}"><span class="switch__circle-inner"></span></span>
                                                                <span class="switch__left {{ session()->get('direction') == 2 ? 'pe-2' : 'ps-2' }}">{{ trans('labels.off') }}</span>
                                                                <span class="switch__right {{ session()->get('direction') == 2 ? 'ps-2' : 'pe-2' }}">{{ trans('labels.on') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.time_zone') }}</label>
                                                <select class="form-select" name="timezone">
                                                    <option {{ @$settingdata->timezone == 'Pacific/Midway' ? 'selected' : '' }} value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Adak' ? 'selected' : '' }} value="America/Adak">(GMT-10:00) Hawaii-Aleutian
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Etc/GMT+10' ? 'selected' : '' }} value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Marquesas' ? 'selected' : '' }} value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Gambier' ? 'selected' : '' }} value="Pacific/Gambier">(GMT-09:00) Gambier Islands
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Anchorage' ? 'selected' : '' }} value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                    <option {{ @$settingdata->timezone == 'America/Ensenada' ? 'selected' : '' }} value="America/Ensenada">(GMT-08:00) Tijuana, Baja
                                                        California </option>
                                                    <option {{ @$settingdata->timezone == 'Etc/GMT+8' ? 'selected' : '' }} value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                                    <option {{ @$settingdata->timezone == 'America/Los_Angeles' ? 'selected' : '' }} value="America/Los_Angeles">(GMT-08:00) Pacific Time
                                                        (US
                                                        &amp; Canada) </option>
                                                    <option {{ @$settingdata->timezone == 'America/Denver' ? 'selected' : '' }} value="America/Denver">(GMT-07:00) Mountain Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option {{ @$settingdata->timezone == 'America/Chihuahua' ? 'selected' : '' }} value="America/Chihuahua">(GMT-07:00) Chihuahua, La
                                                        Paz,
                                                        Mazatlan </option>
                                                    <option {{ @$settingdata->timezone == 'America/Dawson_Creek' ? 'selected' : '' }} value="America/Dawson_Creek">(GMT-07:00) Arizona
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Belize' ? 'selected' : '' }} value="America/Belize">(GMT-06:00) Saskatchewan,
                                                        Central
                                                        America </option>
                                                    <option {{ @$settingdata->timezone == 'America/Cancun' ? 'selected' : '' }} value="America/Cancun">(GMT-06:00) Guadalajara, Mexico
                                                        City,
                                                        Monterrey </option>
                                                    <option {{ @$settingdata->timezone == 'Chile/EasterIsland' ? 'selected' : '' }} value="Chile/EasterIsland">(GMT-06:00) Easter Island
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Chicago' ? 'selected' : '' }} value="America/Chicago">(GMT-06:00) Central Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option {{ @$settingdata->timezone == 'America/New_York' ? 'selected' : '' }} value="America/New_York">(GMT-05:00) Eastern Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option {{ @$settingdata->timezone == 'America/Havana' ? 'selected' : '' }} value="America/Havana">(GMT-05:00) Cuba</option>
                                                    <option {{ @$settingdata->timezone == 'America/Bogota' ? 'selected' : '' }} value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito,
                                                        Rio
                                                        Branco </option>
                                                    <option {{ @$settingdata->timezone == 'America/Caracas' ? 'selected' : '' }} value="America/Caracas">(GMT-04:30) Caracas</option>
                                                    <option {{ @$settingdata->timezone == 'America/Santiago' ? 'selected' : '' }} value="America/Santiago">(GMT-04:00) Santiago</option>
                                                    <option {{ @$settingdata->timezone == 'America/La_Paz' ? 'selected' : '' }} value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                    <option {{ @$settingdata->timezone == 'Atlantic/Stanley' ? 'selected' : '' }} value="Atlantic/Stanley">(GMT-04:00) Faukland Islands
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Campo_Grande' ? 'selected' : '' }} value="America/Campo_Grande">(GMT-04:00) Brazil
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Goose_Bay' ? 'selected' : '' }} value="America/Goose_Bay">(GMT-04:00) Atlantic Time
                                                        (Goose
                                                        Bay) </option>
                                                    <option {{ @$settingdata->timezone == 'America/Glace_Bay' ? 'selected' : '' }} value="America/Glace_Bay">(GMT-04:00) Atlantic Time
                                                        (Canada) </option>
                                                    <option {{ @$settingdata->timezone == 'America/St_Johns' ? 'selected' : '' }} value="America/St_Johns">(GMT-03:30) Newfoundland
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Araguaina' ? 'selected' : '' }} value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                                    <option {{ @$settingdata->timezone == 'America/Montevideo' ? 'selected' : '' }} value="America/Montevideo">(GMT-03:00) Montevideo
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Miquelon' ? 'selected' : '' }} value="America/Miquelon">(GMT-03:00) Miquelon, St.
                                                        Pierre
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'America/Godthab' ? 'selected' : '' }} value="America/Godthab">(GMT-03:00) Greenland</option>
                                                    <option {{ @$settingdata->timezone == 'America/Argentina' ? 'selected' : '' }} value="America/Argentina/Buenos_Aires">(GMT-03:00)
                                                        Buenos
                                                        Aires </option>
                                                    <option {{ @$settingdata->timezone == 'America/Sao_Paulo' ? 'selected' : '' }} value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                    <option {{ @$settingdata->timezone == 'America/Noronha' ? 'selected' : '' }} value="America/Noronha">(GMT-02:00) Mid-Atlantic
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }} value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Atlantic/Azores' ? 'selected' : '' }} value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Belfast' ? 'selected' : '' }} value="Europe/Belfast">(GMT) Greenwich Mean Time :
                                                        Belfast
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Dublin' ? 'selected' : '' }} value="Europe/Dublin">(GMT) Greenwich Mean Time :
                                                        Dublin
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Lisbon' ? 'selected' : '' }} value="Europe/Lisbon">(GMT) Greenwich Mean Time :
                                                        Lisbon
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Europe/London' ? 'selected' : '' }} value="Europe/London">(GMT) Greenwich Mean Time :
                                                        London
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Abidjan' ? 'selected' : '' }} value="Africa/Abidjan">(GMT) Monrovia, Reykjavik
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Amsterdam' ? 'selected' : '' }} value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin,
                                                        Bern, Rome, Stockholm, Vienna</option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Belgrade' ? 'selected' : '' }} value="Europe/Belgrade">(GMT+01:00) Belgrade,
                                                        Bratislava,
                                                        Budapest, Ljubljana, Prague</option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Brussels' ? 'selected' : '' }} value="Europe/Brussels">(GMT+01:00) Brussels,
                                                        Copenhagen,
                                                        Madrid, Paris </option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Algiers' ? 'selected' : '' }} value="Africa/Algiers">(GMT+01:00) West Central Africa
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Windhoek' ? 'selected' : '' }} value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Beirut' ? 'selected' : '' }} value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Cairo' ? 'selected' : '' }} value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Gaza' ? 'selected' : '' }} value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Blantyre' ? 'selected' : '' }} value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Jerusalem' ? 'selected' : '' }} value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Minsk' ? 'selected' : '' }} value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Damascus' ? 'selected' : '' }} value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                    <option {{ @$settingdata->timezone == 'Europe/Moscow' ? 'selected' : '' }} value="Europe/Moscow">(GMT+03:00) Moscow, St.
                                                        Petersburg,
                                                        Volgograd </option>
                                                    <option {{ @$settingdata->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }} value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Tehran' ? 'selected' : '' }} value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Dubai' ? 'selected' : '' }} value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Yerevan' ? 'selected' : '' }} value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Kabul' ? 'selected' : '' }} value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }} value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Tashkent' ? 'selected' : '' }} value="Asia/Tashkent"> (GMT+05:00) Tashkent</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Kolkata' ? 'selected' : '' }} value="Asia/Kolkata"> (GMT+05:30) Chennai, Kolkata,
                                                        Mumbai,
                                                        New Delhi</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Katmandu' ? 'selected' : '' }} value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Dhaka' ? 'selected' : '' }} value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }} value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Rangoon' ? 'selected' : '' }} value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Bangkok' ? 'selected' : '' }} value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi,
                                                        Jakarta
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }} value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }} value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }} value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing,
                                                        Hong
                                                        Kong, Urumqi</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Irkutsk' ? 'selected' : '' }} value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Perth' ? 'selected' : '' }} value="Australia/Perth">(GMT+08:00) Perth</option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Eucla' ? 'selected' : '' }} value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Tokyo' ? 'selected' : '' }} value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Seoul' ? 'selected' : '' }} value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Yakutsk' ? 'selected' : '' }} value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Adelaide' ? 'selected' : '' }} value="Australia/Adelaide">(GMT+09:30) Adelaide
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Darwin' ? 'selected' : '' }} value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Brisbane' ? 'selected' : '' }} value="Australia/Brisbane">(GMT+10:00) Brisbane
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Hobart' ? 'selected' : '' }} value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Vladivostok' ? 'selected' : '' }} value="Asia/Vladivostok">(GMT+10:00) Vladivostok
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }} value="Australia/Lord_Howe">(GMT+10:30) Lord Howe
                                                        Island
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Etc/GMT-11' ? 'selected' : '' }} value="Etc/GMT-11">(GMT+11:00) Solomon Is., New
                                                        Caledonia
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Magadan' ? 'selected' : '' }} value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Norfolk' ? 'selected' : '' }} value="Pacific/Norfolk">(GMT+11:30) Norfolk Island
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Asia/Anadyr' ? 'selected' : '' }} value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Auckland' ? 'selected' : '' }} value="Pacific/Auckland">(GMT+12:00) Auckland,
                                                        Wellington
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Etc/GMT-12' ? 'selected' : '' }} value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka,
                                                        Marshall
                                                        Is. </option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Chatham' ? 'selected' : '' }} value="Pacific/Chatham">(GMT+12:45) Chatham Islands
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }} value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa
                                                    </option>
                                                    <option {{ @$settingdata->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }} value="Pacific/Kiritimati">(GMT+14:00) Kiritimati
                                                    </option>
                                                </select>
                                                @error('timezone')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.website_title') }}<span class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="website_title" value="{{ @$settingdata->website_title }}" placeholder="{{ trans('labels.website_title') }}" required>
                                                @error('website_title')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.copyright') }}<span class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="copyright" value="{{ @$settingdata->copyright }}" placeholder="{{ trans('labels.copyright') }}" required>
                                                @error('copyright')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        @if (Auth::user()->type == 2)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.personlized_link') }}<span class="text-danger"> * </span></label>
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text rounded-start-3">{{ URL::to('/') }}</span>
                                                    <input type="text" class="form-control mb-0" id="slug" name="slug" value="{{ Auth::user()->slug }}" required>
                                                </div>
                                                @error('slug')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.contact_email') }}<span class="text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email" value="{{ @$settingdata->email }}" placeholder="{{ trans('labels.contact_email') }}" required>
                                                @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.address') }}<span class="text-danger"> * </span></label>
                                                <textarea class="form-control" name="address" rows="3" placeholder="{{ trans('labels.address') }}" required>{{ @$settingdata->address }}</textarea required>
                                                @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        @php
                                        $delivery_type = explode(',', $settingdata->delivery_type);
                                        @endphp

                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">{{ trans('labels.delivery_option') }}<span class="text-danger"> * </span></label>

                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" name="delivery_type[]" value="1" id="delivery" {{ in_array(1, $delivery_type) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="delivery">{{ trans('labels.delivery') }}</label>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" name="delivery_type[]" value="2" id="pickup" {{ in_array(2, $delivery_type) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pickup">{{ trans('labels.pickup') }}</label>
                                            </div>


                                            @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

                                            @if (App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1)
                                            @php
                                            if (Auth::user()->allow_without_subscription == 1) {
                                            $tableqr = 1;
                                            } else {
                                            $tableqr = @helper::get_plan(Auth::user()->id)->tableqr;
                                            }
                                            @endphp
                                            @if ($tableqr == 1)
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" name="delivery_type[]" value="3" id="dine_in" {{ in_array(3, $delivery_type) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="dine_in">{{ trans('labels.dine_in') }}</label>
                                            </div>
                                            @endif
                                            @endif
                                            @else
                                            @if (App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1)
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" name="delivery_type[]" value="3" id="dine_in" {{ in_array(3, $delivery_type) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="dine_in">{{ trans('labels.dine_in') }}</label>
                                            </div>
                                            @endif
                                            @endif

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.facebook_link') }}</label>
                                                <input type="text" class="form-control" name="facebook_link" value="{{ @$settingdata->facebook_link }}" placeholder="{{ trans('labels.facebook_link') }}">
                                                @error('facebook_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.twitter_link') }}</label>
                                                <input type="text" class="form-control" name="twitter_link" value="{{ @$settingdata->twitter_link }}" placeholder="{{ trans('labels.twitter_link') }}">
                                                @error('twitter_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.instagram_link') }}</label>
                                                <input type="text" class="form-control" name="instagram_link" value="{{ @$settingdata->instagram_link }}" placeholder="{{ trans('labels.instagram_link') }}">
                                                @error('instagram_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.linkedin_link') }}</label>
                                                <input type="text" class="form-control" name="linkedin_link" value="{{ @$settingdata->linkedin_link }}" placeholder="{{ trans('labels.linkedin_link') }}">
                                                @error('linkedin_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.description') }}</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="{{ trans('labels.description') }}">{{ @$settingdata->description }}</textarea>
                                                @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row justify-content-between align-items-center mb-2">
                                                <label class="col-auto col-form-label" for="">{{ trans('labels.footer_features') }}
                                                    <span class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Ex. <i class='fa-solid fa-truck-fast'></i> Visit https://fontawesome.com/ for more info">
                                                    </span>
                                                </label>
                                                @if (count($getfooterfeatures) > 0)
                                                <span class="col-auto"><button class="btn-add border-0" type="button" onclick="add_features('{{ trans('labels.icon') }}','{{ trans('labels.title') }}','{{ trans('labels.description') }}')">
                                                        {{ trans('labels.add_new') }}
                                                        {{ trans('labels.footer_features') }} <i class="fa-sharp fa-solid fa-plus"></i></button></span>
                                                @endif
                                            </div>

                                            <div class="row mb-2">
                                                @forelse ($getfooterfeatures as $key => $features)
                                                <input type="hidden" name="edit_icon_key[]" value="{{ $features->id }}">
                                                <div class="col-md-3 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control mb-0 {{ session()->get('direction') == 2 ? 'input-group-rtl' : '' }}" onkeyup="show_feature_icon(this)" name="edi_feature_icon[{{ $features->id }}]" placeholder="{{ trans('labels.icon') }}" value="{{ $features->icon }}" required>
                                                        <p class="input-group-text {{ session()->get('direction') == 2 ? 'input-group-icon-rtl' : '' }}">
                                                            {!! $features->icon !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <input type="text" class="form-control" name="edi_feature_title[{{ $features->id }}]" placeholder="{{ trans('labels.title') }}" value="{{ $features->title }}" required>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <input type="text" class="form-control mb-0" name="edi_feature_description[{{ $features->id }}]" placeholder="{{ trans('labels.description') }}" value="{{ $features->description }}" required>
                                                </div>
                                                <div class="col-md-1 form-group">
                                                    <button class="btn btn-danger btn-sm rounded-5 pricebtn" type="button" onclick="statusupdate('{{ URL::to('admin/settings/delete-feature-' . $features->id) }}')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>

                                                @empty

                                                <div class="col-md-3 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control mb-0 {{ session()->get('direction') == 2 ? 'input-group-rtl' : '' }}" onkeyup="show_feature_icon(this)" name="feature_icon[]" placeholder="{{ trans('labels.icon') }}">
                                                        <p class="input-group-text {{ session()->get('direction') == 2 ? 'input-group-icon-rtl' : '' }}">
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <input type="text" class="form-control" name="feature_title[]" placeholder="{{ trans('labels.title') }}">
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <input type="text" class="form-control mb-0" name="feature_description[]" placeholder="{{ trans('labels.description') }}" >
                                                </div>
                                                <div class="col-md-1 form-group">
                                                    <button class="btn btn-info btn-sm rounded-5 pricebtn" type="button" onclick="add_features('{{ trans('labels.icon') }}','{{ trans('labels.title') }}','{{ trans('labels.description') }}')">
                                                            <i class="fa-sharp fa-solid fa-plus"></i>
                                                        </button>
                                                </div>
                                                @endforelse
                                                <span class="extra_footer_features"></span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        @if (Auth::user()->type == 2)
                                        <div class="form-group col-sm-6 mt-2">
                                            <label class="form-label">{{ trans('labels.banner') }}</label>
                                            <input type="file" class="form-control" name="banner">
                                            @error('banner')
                                            <small class="text-danger">{{ $message }}</small> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 mb-2 object-fit-cover" src="{{ helper::image_path(@$settingdata->banner) }}" alt="">
                                        </div>
                                        <div class="form-group col-sm-6 mt-2">
                                            <label class="form-label">{{ trans('labels.landing_page_cover_image') }}
                                            </label>
                                            <input type="file" class="form-control" name="landin_page_cover_image">
                                            @error('landin_page_cover_image')
                                            <small class="text-danger">{{ $message }}</small> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 mb-2 object-fit-cover" src="{{ helper::image_path($settingdata->cover_image) }}" alt="">
                                        </div>
                                        <div class="form-group col-sm-6 mt-2">
                                            <label class="form-label">{{ trans('labels.subscribe_background') }}
                                            </label>
                                            <input type="file" class="form-control" name="subscribe_background">
                                            @error('subscribe_background')
                                            <small class="text-danger">{{ $message }}</small> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 mb-2" src="{{ helper::image_path($settingdata->subscribe_background) }}" alt="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">{{ trans('labels.notification_sound') }}</label>
                                            <input type="file" class="form-control" name="notification_sound">
                                            @error('notification_sound')
                                            <small class="text-danger">{{ $message }}</small><br>
                                            @enderror
                                            @if (!empty($settingdata->notification_sound) && $settingdata->notification_sound != null)
                                            <audio controls class="mt-3">
                                                <source src="{{ url(env('ASSETSPATHURL') . 'admin-assets/notification/' . $settingdata->notification_sound) }}" type="audio/mpeg">
                                            </audio>
                                            @endif
                                        </div>
                                        @endif
                                        <div class="form-group text-end">
                                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" name="updatebasicinfo" value="1" @endif>{{ trans('labels.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->type == 2)
            <div id="themesettings" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-screwdriver-wrench fs-5"></i>
                                <h5 class="px-2 text-dark">{{ trans('labels.theme_settings') }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ URL::to('admin/settings/updatetheme') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ trans('labels.logo') }}
                                                        </label>
                                                        <input type="file" class="form-control" name="logo">
                                                        @error('logo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        <br>
                                                        @enderror
                                                        <img class="img-fluid rounded-3 hw-70 mb-2 object-fit-contain" src="{{ helper::image_path(@$settingdata->logo) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ trans('labels.favicon') }}</label>
                                                        <input type="file" class="form-control" name="favicon">
                                                        @error('favicon')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        <br>
                                                        @enderror
                                                        <img class="img-fluid rounded-3 hw-70 mb-2 object-fit-contain" src="{{ helper::image_path(@$settingdata->favicon) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <input type="hidden" id="primary_color" name="primary_color" value="{{ @$settingdata->primary_color }}" />

                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">{{ trans('labels.primary_color') }}</label>
                                                    <div class="row g-2">
                                                        <div class="col-auto">
                                                            <div id="bg-selector" tooltip="Custom" class="position-relative">
                                                                <div class="color picker form-control-color" onclick="pickColor();">
                                                                    <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                                                                </div>
                                                                <input id="colorpicker" class="piker-position" type="color" value="{{ @$settingdata->primary_color }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button primary_color" onclick="primary_color_update('#1D5B79')">
                                                                <span class="p_color1 {{ @$settingdata->primary_color == '#1D5B79' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>

                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button primary_color" onclick="primary_color_update('#181D31')">
                                                                <span class="p_color2 {{ @$settingdata->primary_color == '#181D31' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button primary_color" onclick="primary_color_update('#643843')">
                                                                <span class="p_color3 {{ @$settingdata->primary_color == '#643843' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button primary_color" onclick="primary_color_update('#064635')">
                                                                <span class="p_color4 {{ @$settingdata->primary_color == '#064635' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="secondary_color" name="secondary_color" value="{{ @$settingdata->secondary_color }}" />
                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Secondary Color</label>
                                                    <div class="row g-2">
                                                        <div class="col-auto">
                                                            <div id="bg-selector" tooltip="Custom" class="position-relative">
                                                                <div class="color picker form-control-color" onclick="pickColor2()">
                                                                    <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}">
                                                                </div>
                                                                <input id="colorpicker2" class="piker-position" type="color" value="{{ @$settingdata->secondary_color }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#468B97')">
                                                                <span class="s_color1  {{ @$settingdata->secondary_color == '#468B97' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>

                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#6096B4')">
                                                                <span class="s_color2  {{ @$settingdata->secondary_color == '#6096B4' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#99627A')">
                                                                <span class="s_color3  {{ @$settingdata->secondary_color == '#99627A' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="piker-button secondary_color" onclick="secondary_color_update('#519259')">
                                                                <span class="s_color4  {{ @$settingdata->secondary_color == '#519259' ? 'spanactive' : '' }}"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        if (Auth::user()->allow_without_subscription == 1) {
                                        if (App\Models\SystemAddons::where('unique_identifier', 'template')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'template')->first()->activated == 1) {
                                        $themes = [1, 2, 3, 4];
                                        } else {
                                        $themes = [1];
                                        }
                                        } else {
                                        if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1) {
                                        if (empty($theme)) {
                                        $themes = [1];
                                        } else {
                                        $themes = explode(',', @$theme->themes_id);
                                        }
                                        } elseif (App\Models\SystemAddons::where('unique_identifier', 'template')->first() != null && App\Models\SystemAddons::where('unique_identifier', 'template')->first()->activated == 1) {
                                        $themes = [1, 2, 3, 4];
                                        } else {
                                        $themes = [1];
                                        }
                                        }

                                        @endphp


                                        <div class="col-md-12 selectimg">
                                            <div class="form-group">
                                                <label class="form-label mt-4">{{ trans('labels.theme') }}
                                                    <span class="text-danger"> * </span> </label>
                                                @if (env('Environment') == 'sendbox')
                                                <span class="badge badge bg-danger ms-2">{{ trans('labels.addon') }}</span>
                                                @endif

                                                <div class="row">
                                                    @foreach ($themes as $item)
                                                    <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                        <label for="template{{ $item }}" class="radio-card position-relative">
                                                            <input type="radio" name="template" id="template{{ $item }}" value="{{ $item }}" {{ @$settingdata->template == $item ? 'checked' : '' }}>
                                                            <div class="card-content-wrapper border rounded-2">
                                                                <span class="check-icon position-absolute"></span>
                                                                <div class="selecimg">
                                                                    <img src="{{ helper::image_path('theme-' . $item . '.png') }}">
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 selectimg">
                                            <div class="form-group">

                                                <label class="form-label mt-4">{{ trans('labels.theme_type') }}
                                                    <span class="text-danger"> * </span> </label>
                                                @if (env('Environment') == 'sendbox')
                                                <span class="badge badge bg-danger ms-2">{{ trans('labels.addon') }}</span>
                                                @endif


                                                <div class="row">

                                                    <div class="col-12 col-md-6">
                                                        <label for="template_type_1" class="radio-card position-relative">
                                                            <input type="radio" name="template_type" id="template_type_1" value="1" {{ @$settingdata->template_type == 1 ? 'checked' : '' }}>
                                                            <div class="card-content-wrapper border rounded-2">
                                                                <span class="check-icon position-absolute m-2"></span>
                                                                <div class="selecimg">
                                                                    <img src="{{ helper::image_path('theme-grid.png') }}" class="w-100 h-100">
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <label for="template_type_2" class="radio-card position-relative">
                                                            <input type="radio" name="template_type" id="template_type_2" value="2" {{ @$settingdata->template_type == 2 ? 'checked' : '' }}>
                                                            <div class="card-content-wrapper border rounded-2">
                                                                <span class="check-icon position-absolute m-2"></span>
                                                                <div class="selecimg">
                                                                    <img src="{{ helper::image_path('theme-list.png') }}" class="w-100 h-100">
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>




                                        <div class="form-group text-end">
                                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div id="editprofile" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-user-pen fs-5"></i>
                                <h5 class="px-2">{{ trans('labels.edit_profile') }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ URL::to('admin/settings/update-profile-' . Auth::user()->slug) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="{{ trans('labels.name') }}" required>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.email') }}<span class="text-danger"> * </span></label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="{{ trans('labels.email') }}" required>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="mobile">{{ trans('labels.mobile') }}<span class="text-danger"> * </span></label>
                                            <input type="number" class="form-control" name="mobile" id="mobile" value="{{ Auth::user()->mobile }}" placeholder="{{ trans('labels.mobile') }}" required>
                                            @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.image') }}</label>
                                            <input type="file" class="form-control" name="profile">
                                            @error('profile')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover mb-2" src="{{ helper::image_Path(Auth::user()->image) }}" alt="">
                                        </div>
                                        @if (Auth::user()->type == 2)
                                        <div class="form-group col-md-6">
                                            <label for="city" class="form-label">{{ trans('labels.city') }}<span class="text-danger"> * </span></label>
                                            <select name="city" class="form-select" id="city" required>
                                                <option value="">{{ trans('labels.select') }}</option>
                                                @foreach ($city as $city)
                                                <option value="{{ $city->id }}" {{ $city->id == Auth::user()->city_id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="area" class="form-label">{{ trans('labels.area') }}<span class="text-danger">
                                                    * </span></label>
                                            <select name="area" class="form-select" id="area" required>
                                                <option value="">{{ trans('labels.select') }}</option>
                                            </select>
                                        </div>
                                        @endif
                                        <div class="form-group text-end">
                                            <button class="btn btn-success btn-succes m-1" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" name="updateprofile" value="1" @endif>{{ trans('labels.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="changepasssword" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-unlock fs-5"></i>
                                <h5 class="px-2">{{ trans('labels.change_password') }}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ URL::to('admin/settings/change-password') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="form-label">{{ trans('labels.current_password') }}<span class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" placeholder="{{ trans('labels.current_password') }}" autocomplete="on" required>
                                            @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.new_password') }}<span class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" placeholder="{{ trans('labels.new_password') }}" autocomplete="on" required>
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.confirm_password') }}<span class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="{{ trans('labels.confirm_password') }}" autocomplete="on" required>
                                            @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group text-end">
                                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="seo" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-chart-line fs-5"></i>
                                <h5 class="px-2">{{ trans('labels.seo') }}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ URL::to('admin/settings/updateseo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.meta_title') }}<span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ @$settingdata->meta_title }}" placeholder="{{ trans('labels.meta_title') }}" required>
                                            @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.meta_description') }}<span class="text-danger"> * </span></label>
                                            <textarea class="form-control" name="meta_description" rows="3" placeholder="{{ trans('labels.meta_description') }}" required>{{ @$settingdata->meta_description }}</textarea>
                                            @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.og_image') }}<span class="text-danger"> * </span></label>
                                            <input type="file" class="form-control" name="og_image">
                                            @error('og_image')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover mb-2" src="{{ helper::image_path(@$settingdata->og_image) }}" alt="">
                                        </div>
                                        <div class="form-group text-end">
                                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if (Auth::user()->type == 1)
            <div id="landing_page" class="hidechild">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">
                                <i class="fa-solid fa-clipboard"></i>
                                <h5 class="px-2">{{ trans('labels.landing_page') }}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ URL::to('/admin/landingsettings') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.logo') }} <small></small></label>
                                            <input type="file" class="form-control mb-0" name="logo">
                                            @error('logo')
                                            <small class="text-danger">{{ $message }}</small> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2" src="{{ helper::image_path(@$settingdata->logo) }}" alt="">
                                        </div>
                                        
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.favicon') }} </label>
                                            <input type="file" class="form-control mb-0" name="favicon">
                                            @error('favicon')
                                            <small class="text-danger">{{ $message }}</small> <br>
                                            @enderror
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2" src="{{ helper::image_path(@$settingdata->favicon) }}" alt="">
                                        </div>

                                        <input type="hidden" name="landing_primary_color" id="primary_color_admin" value="{{ @$settingdata->primary_color }}" />

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.primary_color') }}</label>
                                            <div class="row g-2 mb-2">
                                                <div class="col-auto">
                                                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                                                        <div class="color picker form-control-color" onclick="pickColor_admin();">
                                                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}" />
                                                        </div>
                                                        <input id="colorpicker_landing" class="piker-position" type="color" value="{{ @$settingdata->primary_color }}" />
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <button type="button" class="piker-button primary_color" onclick="primary_color_update1('#1D5B79')">
                                                        <span class="p1_color1 {{ @$settingdata->primary_color == '#1D5B79' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>

                                                <div class="col-auto">
                                                    <button type="button" class="piker-button primary_color" onclick="primary_color_update1('#181D31')">
                                                        <span class="p1_color2 {{ @$settingdata->primary_color == '#181D31' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="piker-button primary_color" onclick="primary_color_update1('#643843')">
                                                        <span class="p1_color3 {{ @$settingdata->primary_color == '#643843' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="piker-button primary_color" onclick="primary_color_update1('#064635')">
                                                        <span class="p1_color4 {{ @$settingdata->primary_color == '#064635' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="landing_secondary_color" id="secondary_color_admin" value="{{ @$settingdata->secondary_color }}" />
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">{{ trans('labels.secondary_color') }}</label>
                                            <div class="row g-2 mb-2">
                                                <div class="col-auto">
                                                    <div id="bg-selector" tooltip="Custom" class="position-relative">
                                                        <div class="color picker form-control-color" onclick="pickColor2_admin();">
                                                            <img src="{{ url(env('ASSETSPATHURL') . 'images/color.png') }}" />
                                                        </div>
                                                        <input id="colorpicker2_landing" class="piker-position" type="color" value="{{ @$settingdata->secondary_color }}" />
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update1('#468B97')">
                                                        <span class="s1_color1  {{ @$settingdata->secondary_color == '#468B97' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>

                                                <div class="col-auto">
                                                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update1('#6096B4')">
                                                        <span class="s1_color2  {{ @$settingdata->secondary_color == '#6096B4' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update1('#99627A')">
                                                        <span class="s1_color3  {{ @$settingdata->secondary_color == '#99627A' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="piker-button secondary_color" onclick="secondary_color_update1('#519259')">
                                                        <span class="s1_color4  {{ @$settingdata->secondary_color == '#519259' ? 'spanactive' : '' }}"></span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.website_title') }}<span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="landing_website_title" value="{{ @$settingdata->landing_website_title }}" placeholder="{{ trans('labels.website_title') }}" required>
                                            @error('landing_website_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">{{ trans('labels.contact_email') }}<span class="text-danger"> * </span></label>
                                            <input type="email" class="form-control" name="landing_email" value="{{ @$settingdata->email }}" placeholder="{{ trans('labels.contact_email') }}" required>
                                            @error('landing_email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">{{ trans('labels.contact_mobile') }}<span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="landing_mobile" value="{{ @$settingdata->contact }}" placeholder="{{ trans('labels.contact_mobile') }}" required>
                                            @error('contact_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('labels.address') }}<span class="text-danger"> * </span></label>
                                            <textarea class="form-control" name="landing_address" rows="3" placeholder="{{ trans('labels.address') }}" required>{{ @$settingdata->address }}</textarea>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.facebook_link') }}</label>
                                                <input type="text" class="form-control" name="landing_facebook_link" value="{{ @$settingdata->facebook_link }}" placeholder="{{ trans('labels.facebook_link') }}">
                                                @error('facebook_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.twitter_link') }}</label>
                                                <input type="text" class="form-control" name="landing_twitter_link" value="{{ @$settingdata->twitter_link }}" placeholder="{{ trans('labels.twitter_link') }}">
                                                @error('twitter_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.instagram_link') }}</label>
                                                <input type="text" class="form-control" name="landing_instagram_link" value="{{ @$settingdata->instagram_link }}" placeholder="{{ trans('labels.instagram_link') }}">
                                                @error('instagram_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">{{ trans('labels.linkedin_link') }}</label>
                                                <input type="text" class="form-control" name="landing_linkedin_link" value="{{ @$settingdata->linkedin_link }}" placeholder="{{ trans('labels.linkedin_link') }}">
                                                @error('linkedin_link')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif class="btn btn-success btn-succes mt-3">{{ trans('labels.save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
            @include('admin.sociallogin.social_settings')
            @endif

            @include('admin.emailsettings.email_setting')

            @if (Auth::user()->type == 2)

            @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

            @php
            if (Auth::user()->allow_without_subscription == 1) {
            $whatsapp_message = 1;
            } else {
            $whatsapp_message = @helper::get_plan(Auth::user()->id)->whatsapp_message;
            }
            @endphp
            @if ($whatsapp_message == 1)
            @include('admin.whatsapp_message.setting_form')
            @endif
            @else
            @include('admin.whatsapp_message.setting_form')
            @endif


            @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)

            @if (App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1)
            @php
            if (Auth::user()->allow_without_subscription == 1) {
            $telegram_message = 1;
            } else {
            $telegram_message = @helper::get_plan(Auth::user()->id)->telegram_message;
            }
            @endphp

            @if ($telegram_message == 1)
            @include('admin.telegram_message.setting_form')
            @endif
            @endif
            @else
            @if (App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1)
            @include('admin.telegram_message.setting_form')
            @endif
            @endif
            @endif

            @if (Auth::user()->type == 1)
            @if (App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1)
            @include('admin.customdomain.setting_form')
            @endif
            @if (App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1)
            @include('admin.analytics.setting_form')
            @endif
            @include('admin.cookie_recaptcha.setting_form')
            @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var areaurl = "{{ URL::to('admin/getarea') }}";
    var select = "{{ trans('labels.select') }}";
    var areaid = "{{ Auth::user()->area_id != null ? Auth::user()->area_id : '0' }}";
    $(document).ready(function() {
        $('#recaptcha_version').on('change', function() {
            var recaptcha_version = $(this).val();
            if (recaptcha_version == 'v3') {
                $("#score_threshold").show();
            } else {
                $("#score_threshold").hide();
            }
        });
    });
</script>
<script src="{{ url('storage/app/public/admin-assets/js/user.js') }}"></script>
@if(Auth::user()->id == 1)
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>

<script>
    CKEDITOR.replace('cname_text');
</script>

@endif

<script src="{{ url(env('ASSETSPATHURL') . 'admin-assets/js/settings.js') }}"></script>
@endsection