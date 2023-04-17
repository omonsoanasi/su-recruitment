<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user) {

        if($user->hasRole($request->role)){
            return back()->with('message', 'Role already exists');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'User has been assigned role');
    }
    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role does not exist');
    }

    public function givePermission (Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message','Permission exists');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message','Permission added');
    }

    public function revokePermission (User $user, Permission $permission)
    {
        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked!');
        }
        return back()->with('message', 'Permission does not exist!');
    }

}
