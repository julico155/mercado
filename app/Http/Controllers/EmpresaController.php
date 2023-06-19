<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\User;
use App\Models\empresa;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::get();
        $id = auth()->user()->id;
        $e = User::find($id);
        $p = producto::where('id_propietario', $e->id)->get();
        $categorias = categoria::get();


        return view('VistaEmpresa.index', compact('productos', 'e', 'p', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $empresas = User::get();
        return view('VistaEmpresa.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destino = 'img/fotosProductos/';
            $foto = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('foto')->move($destino, $foto);
        } else {
            $foto = "perfil_falso.png";
        }


        $empresa = new User();
        $empresa->name = $request->nombre;
        $empresa->email = $request->correo;
        $empresa->password = Hash::make($request->password);
        $empresa->profile_photo_path = $destino . $foto;
        $empresa->syncRoles('empresa');
        $empresa->save();

        return redirect()->route('empresa.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $empresa)
    {
        // dd($empresa);
        $e = User::find($empresa)->first();
        $p = producto::where('id_propietario', $e->id)->get();
        $categorias = categoria::get();
        return view('VistaEmpresa.show', compact('e', 'p', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $empresa)
    {
        // dd($empresa);
        $empresas = User::where('id', $empresa->id)->first();
        // dd($empresas);
        // dd($empresas);
        return view('VistaEmpresa.edit', compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $empresa)
    {

        // dd($request);
        $empresa = User::where('id', $empresa->id)->first();
        $empresa->name = $request->nombre;
        $empresa->email = $request->correo;
        $empresa->password = Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destino = 'img/fotosProductos/';
            $foto =  time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('foto')->move($destino, $foto);
        } else {
            $foto = $empresa->profile_photo_path;
        }

        $empresa->profile_photo_path = $destino . $foto;
        // dd($empresa);
        $empresa->save();

        return redirect()->route('empresa.show', $empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $u)
    {
        //
    }
}
