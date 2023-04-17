<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view ('admin.permissions.index', compact('permissions'));
    }

    public function create() {
        return view('admin.permissions.create');
    }

    public function store (Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255|min:3',
        ]);
        Permission::create($validated);

        return to_route('admin.permissions.index')->with('message','Permission added successfully');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255|min:3',
        ]);

        $permission->update($validated);

        return to_route('admin.permissions.index')->with('message','Permission updated successfully');
    }

    public function destroy (Permission $permission)
    {
        $permission->delete();

        return back()->with('message', 'Permission deleted');
    }

    public function assignRole(Request $request, Permission $permission) {

        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role already exists');
        }
        $permission->assignRole($request->role);
        return back()->with('message', 'Permission assigned role');
    }
    public function removeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role does not exist');
    }
}
