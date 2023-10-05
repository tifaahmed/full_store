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
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact("roles"));
    }

    public function edit(Role $role) {
        $permissions = Permission::with('roles')->get()->groupBy('page');
        return view('admin.roles.edit', compact("role",'permissions'));
    }
    public function update(Request $request ,Role $role) {
        $role->syncPermissions($request->permission_names);
        $roles = Role::with('permissions')->get();
        return redirect('admin/roles')->with('success', trans('messages.success'));

    }
}