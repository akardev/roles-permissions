<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        Role::create($validated);
        return redirect()->route('admin.roles.index')->with('message', 'Rol başarıyla oluşturuldu');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        $role->update($validated);
        return redirect()->route('admin.roles.index')->with('message', 'Rol başarıyla güncellendi');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('message', 'Rol başarıyla silindi');
    }


    //ROL YÖNETİMİ
    public function givePermissions(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Bu rol zaten bu yetkiye sahip');
        }

        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Yetki başarıyla eklendi');
    }

    public function revokePermissions(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Yetki başarıyla silindi');
        } else {
            return back()->with('message', 'Bu rol bu yetkiye sahip değil');
        }
    }
}
