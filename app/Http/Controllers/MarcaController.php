<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = marca::get();

        return view('VistaMarca.index', compact('marcas'));
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
        $marca = new marca();
        $marca->nombre = $request->marca;
        $marca->save();
        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(marca $marca)
    {
        //
        $m = marca::find($marca->id);
        return view('VistaMarca.edit', compact('m'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marca = marca::find($id);

    // Verificar si la categoría tiene productos relacionados
    if ($marca->productos()->exists()) {
        return redirect()->route('marca.index')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados');
    }

    // Si no hay productos relacionados, se puede eliminar la marca
    $marca->delete();
    return redirect()->route('marca.index')->with('success', 'Categoría eliminada correctamente');
    }
}

