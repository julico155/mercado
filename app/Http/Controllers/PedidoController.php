<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\pedido_detalle;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $pedido = pedido::where('cliente_id', $id)->first();
        // dd($id);
        // dd($carrito);
        $pedido_detalle = pedido_detalle::where('carrito_id', $pedido->id)
        ->join('productos','productos.id','=','producto_detalle.producto_id')
        ->join('users','users.id','=','productos.id_propietario')
        ->select('detalle_carritos.*','productos.nombre','productos.descripcion','productos.imagen','users.name as empresa')
        ->get();


        return view('VistaPedido.index', compact('pedido_detalle', 'pedido'));
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
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
