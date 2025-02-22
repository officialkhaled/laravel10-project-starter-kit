<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission', ['only' => ['index']]);
        $this->middleware('permission:create permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:update permission', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete permission', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::query()
            ->latest()
            ->get();

        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Permissions'],
        ];

        return view('role-permission.permissions.index', [
            'permissions' => $permissions,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Permissions', 'route' => 'permissions.index'],
            ['label' => 'Add Permission'],
        ];

        return view('role-permission.permissions.create', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name']
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permissions')->with([
            'status' => 'success',
            'message' => 'Permission Added Successfully.'
        ]);
    }

    public function edit(Permission $permission)
    {
        $breadcrumbs = [
            ['label' => 'Home', 'route' => 'dashboard'],
            ['label' => 'Permissions', 'route' => 'permissions.index'],
            ['label' => 'Edit Permission'],
        ];

        return view('role-permission.permissions.edit', [
            'permission' => $permission,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name,' . $permission->id]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permissions')->with([
            'status' => 'success',
            'message' => 'Permission Updated Successfully.'
        ]);
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();

        return redirect('permissions')->with([
            'status' => 'success',
            'message' => 'Permission Deleted Successfully.'
        ]);
    }
}
