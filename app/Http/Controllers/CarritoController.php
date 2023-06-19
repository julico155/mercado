<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Models\detalle_carrito;
use App\Models\producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = auth()->user()->id;
        $carrito = carrito::where('cliente_id', $id)->first();
        // dd($id);
        // dd($carrito);
        $detalle_carrito = detalle_carrito::where('carrito_id', $carrito->id)
        ->join('productos','productos.id','=','detalle_carritos.producto_id')
        ->join('users','users.id','=','productos.id_propietario')
        ->select('detalle_carritos.*','productos.nombre','productos.descripcion','productos.imagen','users.name as empresa')
        ->get();


        return view('VistaCarrito.index', compact('detalle_carrito', 'carrito'));
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
    public function show(carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, carrito $carrito)
    {
        // dd($request ,$carrito);
        $id = auth()->user()->id;
        $carrito = carrito::where('cliente_id', $id)->first();
        $dc = new detalle_carrito();
        $dc->carrito_id = $carrito->id;
        $dc->producto_id = $request->producto_id;
        $dc->cantidad = $request->cantidad;
        $dc->precio = $request->producto_precio;
        $dc->save();

        $carrito->total = $carrito->total + ($request->producto_precio * $request->cantidad);
        $carrito->save();

        // $p = producto::where('id', $request->producto_id)->first();
        // $p->cantidad = $p->cantidad - $request->cantidad;
        // $p->save();
        return redirect()->route('carrito.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request)
    // {
    //     $id = auth()->user()->id;
    //     $carrito = carrito::where('cliente_id', $id)->first();
    //     $detalle_carrito = detalle_carrito::where('carrito_id', $carrito->id)->get();
    //     for($i=0; $i<count($detalle_carrito); $i++){
    //         if($detalle_carrito[$i]->producto_id == $request->producto_id){
    //             $detalle_carrito[$i]->delete();
    //             $detalle_carrito[$i]->save();
    //             $carrito->total = $carrito->total - ($request->producto_precio * $request->cantidad);
    //             $carrito->save();
    //         }
    //     }
    //     return redirect()->route('carrito.index');
    // }
    public function destroy(Request $request)
    {
        $id = auth()->user()->id;
        $carrito = Carrito::where('cliente_id', $id)->first();
        $detalle_carrito = detalle_carrito::where('carrito_id', $carrito->id)
            ->where('producto_id', $request->producto_id)
            ->first();

        if ($detalle_carrito) {
            $subtotal = $request->precio * $request->cantidad;
            $carrito->total = $carrito->total - $subtotal;
            $carrito->save();
            // dd($carrito);

            $detalle_carrito->delete();
        }

        return redirect()->route('carrito.index');
    }
}
