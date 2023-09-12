<?php
return [
    'origin' => env('RECAPTCHAV3_ORIGIN', 'https://www.google.com/recaptcha'),
    'sitekey' => env('GOOGLE_RECAPTCHA_KEY', ''),
    'secret' => env('GOOGLE_RECAPTCHA_SECRET', ''),
    'locale' => env('RECAPTCHAV3_LOCALE', '')
];
