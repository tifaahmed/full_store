@if (helper::appdata('')->recaptcha_version == 'v2')
    <div class="col-12">
        <div class="g-recaptcha" data-sitekey="{{ helper::appdata('')->google_recaptcha_site_key }}"></div>
        @error('g-recaptcha-response')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endif

@if (helper::appdata('')->recaptcha_version == 'v3')
    <div class="col-12">
        {!! RecaptchaV3::field('contact') !!}
        @error('g-recaptcha-response')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endif
