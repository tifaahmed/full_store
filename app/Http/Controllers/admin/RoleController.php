<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

// Support
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// Models
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::get();
        return view('admin.roles.index', compact("roles"));
    }
    
}