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

        return view('VistaRolesyPermisos.index', compact('roles'));
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

    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se creo el rol : ' . $role->name);

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

    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se edito el rol : ' . $role->name);
    return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
       $role->delete();

       activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se elimino el rol : ' . $role->name);
    return redirect()->route('rol.index');
    }

    public function assignPermissions($roleId)
{
    $permissions = Permission::all();
    $role = Role::findOrFail($roleId);

    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se asignaron permisos al rol : ' . $role->name);

    return view('roles.assign_permissions', compact('permissions', 'role'));
}

public function updatePermissions(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);
    $permissions = $request->input('permissions', []);

    $role->syncPermissions($permissions);

    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se actualizaron los permisos del rol : ' . $role->name);

    return redirect()->route('rol.index');
}



}
