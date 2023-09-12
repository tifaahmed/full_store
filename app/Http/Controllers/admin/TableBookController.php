<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TableBook;
use Illuminate\Http\Request;
use Auth;

class TableBookController extends Controller
{
    public function index(Request $request)
    {
        $bookings = TableBook::where('vendor_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('admin.table_booking.index',compact('bookings'));
    }
}
