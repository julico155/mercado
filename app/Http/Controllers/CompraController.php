<?php

namespace App\Http\Controllers;

use App\Models\compra;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;
use App\Models\producto;
use App\Models\proveedor;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $c = compra::get();
        return view('VistaCompra.index',compact('c'));
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
    public function show(compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(compra $compra)
    {
        //
    }

    public function notaCompra($id)
    {

        $com = DetalleCompra::where('compra_id', $id)->get();
        $compras = [];
        $contador = 0;
        foreach ($com as $c) {
            $p = producto::where('id', $c->producto_id)->first();
            $pro = Proveedor::where('id', $c->proveedor_id)->first();
            $contador = $contador + 1;
            $compras[] = [
                "fecha"    => $c->created_at,
                "cantidad"    => $c->cantidad,
                "producto_nombre"    => $p->nombre,
                "producto_descripcion"     =>$p->descripcion,
                "proveedor" => $pro->Nombre,
                "contador" => $contador
            ];
        // dd($ventas);
        }

        return view('VistaCompra.nota', compact('compras'));
    }

}
