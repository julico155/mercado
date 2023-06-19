<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Models\proveedor;
use Illuminate\Http\Request;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = proveedor::get();
        return view('VistaProveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = marca::get();
        // dd($categorias->isEmpty());
        return view('VistaProveedor.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $p = new proveedor();
        $p->nombre = $request->nombre;
        $p->telefono = $request->telefono;
        $p->marca_id = $request->marca;
        $p->save();
        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proveedor $proveedor)
    {
        //
    }
}
