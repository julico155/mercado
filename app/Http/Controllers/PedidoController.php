<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\DetalleCompra;
use App\Models\marca;
use App\Models\Pedido;
use App\Models\pedido_detalle;
use App\Models\producto;
use App\Models\proveedor;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id = auth()->user()->id;
        // $pedido = pedido::where('cliente_id', $id)->first();
        // // dd($id);
        // // dd($carrito);
        // $pedido_detalle = pedido_detalle::where('carrito_id', $pedido->id)
        // ->join('productos','productos.id','=','producto_detalle.producto_id')
        // ->join('users','users.id','=','productos.id_propietario')
        // ->select('detalle_carritos.*','productos.nombre','productos.descripcion','productos.imagen','users.name as empresa')
        // ->get();

        $arrayProductos = [];
        // $productos = producto::where('stock','<=', 'stock_min')->get();
        $productos = Producto::whereRaw('stock <= stock_min')->get();

        foreach ($productos as $p) {
            $marca = marca::where('id', $p->marca_id)->first();
            dd($marca);
            $proveedores = Proveedor::where('marca_id', $p->marca_id)->get();
            $arrayProductos[] = [
                "producto_id"    => $p->id,
                "producto_nombre"    => $p->nombre,
                "producto_descripcion"    => $p->descripcion,
                "producto_stock"     => $p->stock,
                "producto_stock_min" => $p->stock_min,
                "marca"              => $marca->nombre,
                "proveedor"          => $proveedores,
            ];
        }

        return view('VistaPedido.index', compact('arrayProductos'));
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
        // dd($request);
        $compra = Compra::create([
            // Agregar los atributos de la compra
        ]);
        $compra->save();
        $stocks = $request->input('stock');
        $id = $request->input('id_producto');
        $prov = $request->input('proveedor');
        $contador = 0;
        foreach ($stocks as $cantidad) {
            // dd($id[$contador]);
            $proveedor = proveedor::where('id','=',$prov[$contador])->first();
            $producto = Producto::where('id','=',$id[$contador])->first();
            if($cantidad > 0){
            $detallecompra = DetalleCompra::create([
                'compra_id' => $compra->id,
                'producto_id' => $producto->id,
                'cantidad'  => $cantidad,
                'proveedor_id' => $proveedor->id,
        ]);

            $detallecompra->save();
        }
            $producto->stock += $cantidad;
            // dd($producto);
            $producto->save();
            $contador++;
        }
        activity()
            ->causedBy(auth()->user()) // El usuario responsable de la actividad
            ->log('Se realizo un pedido de compra al proveedor ' );

        return redirect()->route('categoria.index');

        // Aquí puedes realizar otras acciones relacionadas con el pedido,
        // como almacenar la información en la base de datos, enviar notificaciones, etc.

        return redirect()->route('producto.index')->with('success', 'Pedido solicitado correctamente.');
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
