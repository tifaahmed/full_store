<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-yellow-100">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <div class="col-md-2 col-3 m-auto py-3">
                        <img src="<?php echo e(url(env('ASSETSPATHURL').'web-assets/iamges/png/cookies.png')); ?>" class="w-100" alt="">
                    </div>
                    <p class="ml-3 text-black cookie-consent__message my-3">
                        <?php echo e(helper::appdata(@$storeinfo->id)->cookie_text); ?>

                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button class="js-cookie-consent-agree btn btn-class rounded-2 cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                        <?php echo e(helper::appdata(@$storeinfo->id)->cookie_button_text); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u182721273/domains/birds.re/public_html/vendor/spatie/laravel-cookie-consent/src/../resources/views/dialogContents.blade.php ENDPATH**/ ?>