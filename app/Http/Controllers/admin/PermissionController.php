<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

// Support
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// Models
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::with('roles')->get();
        return view('admin.permissions.index', compact("permissions"));
    }

}