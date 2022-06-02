<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index')->with('message', 'Yetki başarıyla oluşturuldu');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);
        return redirect()->route('admin.permissions.index')->with('message', 'Yetki başarıyla güncellendi');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('message', 'Yetki başarıyla silindi');
    }

    //YETKİ YÖNETİMİ
    public function  assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Bu yetki zaten bu rolü içeriyor');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Rol başarıyla eklendi');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Rol başarıyla silindi');
        } else {
            return back()->with('message', 'Bu yetki bu rolü içermiyor');
        }
    }
}
