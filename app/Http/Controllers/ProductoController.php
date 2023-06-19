<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\producto;
use App\Models\User;
use App\Models\marca;
use App\Models\stock;
use Illuminate\Http\Request;

class ProductoController extends Controller
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

        return view('VistaProductos.index', compact('productos', 'e', 'p', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        // dd($categorias->isEmpty());
        return view('VistaProductos.create', compact('categorias','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;

        // dd($request);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destino = 'img/fotosProductos/';
            $foto = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('foto')->move($destino, $foto);
        } else {
            $foto = "perfil_falso.png";
        }


        $p = new producto();
        $p->nombre = $request->nombre;
        $p->descripcion = $request->descripcion;
        $p->precio = $request->precio;
        $p->id_propietario = $id;
        $p->imagen = $destino . $foto;
        $p->categoria_id = $request->categoria;
        $p->marca_id = $request->marca;
        $p->save();

        $stock = new Stock;
        $stock->producto_id = $p->id;
        $stock->cantidad = 0;
        $stock->save();


        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        // dd($producto);
        $p = producto::find($producto->id);
        $u = User::find($p->id_propietario)->first();
        $s = stock::where('producto_id',$producto->id)->first();
        // dd($p);
        return view('VistaEmpresa.productoShow', compact('p', 'u','s'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        $categorias = categoria::get();
        $p = producto::find($producto->id);
        return view('VistaProductos.edit', compact('p', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        // dd($request,$producto);
        $p = producto::where('id', $producto->id)->first();
        $p->nombre = $request->nombre;
        $p->descripcion = $request->descripcion;
        $p->cantidad = $request->cantidad;
        $p->precio = $request->precio;
        $p->categoria_id = $request->categoria;


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destino = 'img/fotosProductos/';
            $foto =  time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('foto')->move($destino, $foto);
            $p->imagen = $destino . $foto;
        } else {
            $foto = $p->imagen;
            $p->imagen = $foto;
        }
        $p->save();

        return redirect()->route('producto.index')->with('success', 'Producto Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // dd($producto);


        $p = producto::where('id',$id)->first();
        $p->delete();

        return redirect()->route('producto.index')->with('success', 'Producto Eliminado con Exito');;
    }
}
