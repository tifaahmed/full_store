<?php



namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class NotificationController extends Controller

{
    public function getorder()
    {
        $todayorders = Order::whereDate('created_at', Carbon::today())->where('is_notification', '=', '1')->where('vendor_id', Auth::user()->id)->count();
        return json_encode($todayorders);
    }
}
