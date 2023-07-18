<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('VistaUser.index', compact('users'));
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
        //
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
        $u = user::find($id);
        return view('VistaUser.edit', compact('u'));
        activity()
            ->causedBy(auth()->user()) // El usuario responsable de la actividad
            ->log('Se edito el usuario : ' . $u->name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $u = user::where('id', $id)->first();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->save();
        activity()
            ->causedBy(auth()->user()) // El usuario responsable de la actividad
            ->log('Se edito el usuario : ' . $u->name);
        return redirect()->route('user.index')->with('success', 'Producto Actualizado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::find($id);
        $user->delete();
        activity()
            ->causedBy(auth()->user()) // El usuario responsable de la actividad
            ->log('Se elimino el usuario : ' . $user->name);
    }

    public function assignRole($userId)
{
    $user = User::findOrFail($userId);
    $roles = Role::all();

    return view('VistaUser.assign_role', compact('user', 'roles'));
}
public function updateRole(Request $request, $userId)
{
    $user = User::findOrFail($userId);
    $role = $request->input('role');

    $user->syncRoles([$role]);
    activity()
            ->causedBy(auth()->user()) // El usuario responsable de la actividad
            ->log('Se actualizo el rol del usuario : ' . $user->name);
    return redirect()->route('user.index');
}


}
