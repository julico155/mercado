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
        $p->talla = 'm';
        $p->marca_id = $request->marca;
        $p->stock = 0;
        $p->stock_min = $request->cant_min;
        $p->save();

        activity()
    ->causedBy(auth()->user()) // El usuario responsable de la actividad
    ->log('Se creo un producto : ' . $p->nombre);

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

        // dd($p);
        return view('VistaEmpresa.productoShow', compact('p', 'u'));
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

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destino = 'img/fotosProductos/';
            $foto = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('foto')->move($destino, $foto);
        } else {
            $foto = $p->foto; // Mantenemos la foto existente si no se proporciona una nueva imagen
        }
        $p->nombre = $request->nombre;
        $p->descripcion = $request->descripcion;
        $p->stock_min = $request->stock_min;
        $p->precio = $request->precio;
        $p->categoria_id = $request->categoria;
        $p->imagen = $destino . $foto;


        $p->save();
        activity()
        ->causedBy(auth()->user()) // El usuario responsable de la actividad
        ->log('Se actualizo un producto : ' . $p->nombre);
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
        activity()
        ->causedBy(auth()->user()) // El usuario responsable de la actividad
        ->log('Se elimino un producto : ' . $p->nombre);
        return redirect()->route('producto.index')->with('success', 'Producto Eliminado con Exito');;
    }
}
