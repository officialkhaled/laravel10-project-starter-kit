<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole']]);
        $this->middleware('permission:update role', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::query()
            ->latest()
            ->get();

        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Roles'],
        ];

        return view('role-permission.roles.index', [
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Roles', 'route' => 'roles.index'],
            ['label' => 'Add Role'],
        ];

        return view('role-permission.roles.create', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name']
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('roles')->with([
            'status' => 'success',
            'message' => 'Role Added Successfully.'
        ]);
    }

    public function edit(Role $role)
    {
        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Roles', 'route' => 'roles.index'],
            ['label' => 'Edit Role'],
        ];

        return view('role-permission.roles.edit', [
            'role' => $role,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name,' . $role->id]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with([
            'status' => 'success',
            'message' => 'Role Updated Successfully.'
        ]);
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();

        return redirect('roles')->with([
            'status' => 'success',
            'message' => 'Role Deleted Successfully.'
        ]);
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Roles', 'route' => 'roles.index'],
            ['label' => 'Add Role-Permissions'],
        ];

        return view('role-permission.roles.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Permissions Added to Role.'
        ]);
    }
}
