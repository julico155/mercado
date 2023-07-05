<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Roles extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new Role();
     $role->name = $request->input('rol');
     $role->save();
    return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $r = Role::findOrFail($id);

        return view('roles.edit', compact('r'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
    $role->name = $request->input('rol');
    $role->save();

    return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
       $role->delete();

    return redirect()->route('rol.index');
    }

    public function assignPermissions($roleId)
{
    $permissions = Permission::all();
    $role = Role::findOrFail($roleId);

    return view('roles.assign_permissions', compact('permissions', 'role'));
}

public function updatePermissions(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);
    $permissions = $request->input('permissions', []);

    $role->syncPermissions($permissions);

    return redirect()->route('rol.index');
}


}
