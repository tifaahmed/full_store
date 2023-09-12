<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use App\Helpers\helper;
class MaintenanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
      
        if (@helper::appdata(@helper::storeinfo($request->vendor_id)->id)->maintenance_mode == 1){
            return response(view('errors.maintenance'));
        }
        return $next($request);
    }
}