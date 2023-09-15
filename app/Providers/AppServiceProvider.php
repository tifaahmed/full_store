<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Auth;

use App\Models\SystemAddons;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $system_addons  = Schema::hasTable('systemaddons') ? SystemAddons::get() : null;


        $subscription = $system_addons->where('unique_identifier', 'subscription');
        $subscription_is_active = $system_addons->where('unique_identifier', 'subscription')
                                                ->where('activated', '1');
        View::share('system_addons_subscription', $subscription->count() ? 1 : 0);
        View::share('system_addons_subscription_is_active', $subscription_is_active->count() ? 1 : 0);



        $coupon = $system_addons->where('unique_identifier', 'coupon');
        $coupon_is_active = $system_addons->where('unique_identifier', 'coupon')
                                                ->where('activated', '1');
        View::share('system_addons_coupon', $coupon->count() ? 1 : 0);
        View::share('system_addons_coupon_is_active', $coupon_is_active->count() ? 1 : 0);

        view()->composer('*', function($view) {
            $view->with('is_user_allow_without_subscription', auth()->user() && auth()->user()->allow_without_subscription == 1? 1 : 0 );
        });
         

        
        
    }
}
