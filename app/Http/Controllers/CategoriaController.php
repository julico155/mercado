<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categoria::get();
        return view('VistaCategoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new categoria();
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $c = categoria::find($id);

        return view('VistaCategoria.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $m = categoria::where('id', $id)->first();
        $m->categoria = $request->categoria;
        $m->save();
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $categoria = Categoria::find($id);

    // Verificar si la categoría tiene productos relacionados
    if ($categoria->productos()->exists()) {
        return redirect()->route('categoria.index')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados');
    }

    // Si no hay productos relacionados, se puede eliminar la categoría
    $categoria->delete();
    return redirect()->route('categoria.index')->with('success', 'Categoría eliminada correctamente');
}

}
