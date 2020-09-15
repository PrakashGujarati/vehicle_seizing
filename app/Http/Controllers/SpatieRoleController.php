<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SpatieRoleController extends Controller
{
    public function index_roles()
    {
        $data['roles'] = Role::select('id', 'name', 'slug')->get();
        $data['selected_role'] = Role::whereId(request('role_id'))->first();
        $data['permissions'] = Permission::get();
        return view('spatie-role.table')->with($data);
    }

    public function assign_permissions(Request $request, $role_id)
    {
        $selected_permissions = collect(request('permissions'))->keys()->toArray();
        $role = Role::findOrFail($role_id);
        $role->syncPermissions($selected_permissions);
        return redirect()->back()->with('success', "Permissions are assigned successfully to selected role.");
    }
}
