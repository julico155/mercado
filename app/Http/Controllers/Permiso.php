<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class Permiso extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all();
        return view('permissions.index', compact('permisos'));
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
        $permission = new Permission();
    $permission->name = $request->input('permiso');
    $permission->save();
    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se creo un permiso : ' . $permission->name);
    return redirect()->route('permisos.index');
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
        $p = Permission::findOrFail($id);
        return view('permissions.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->input('permiso');
        $permission->save();
        activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se actualizo un permiso : ' . $permission->name);
        return redirect()->route('permisos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
    $permission->delete();
    activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se elimino un permiso : ' . $permission->name);
    return redirect()->route('permisos.index');
    }
}
