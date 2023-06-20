@extends('dashboard')

@section('cliente')
    <div class="my-8 mx-8">
        <div class="container mx-auto px-4">
            <form action="{{ route('pedido.store') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <h2 class="text-lg font-bold">Solicitar Pedido</h2>
                </div>
                <table class="w-full mb-8">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="py-2">Producto</th>
                            <th class="py-2">Descripción</th>
                            <th class="py-2">Stock</th>
                            <th class="py-2">Stock Mínimo</th>
                            <th class="py-2">Actualizar Stock</th>
                            <th class="py-2">Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arrayProductos  as $p)
                            <tr>
                                <td class="py-2 text-center">{{$p['producto_nombre']}}</td>
                                <td class="py-2 text-center">
                                    <p class="font-semibold">
                                        {{$p['producto_descripcion']}}
                                    </p>
                                    {{-- <p class="text-sm"> aqui va el proveedor</p> --}}
                                </td>
                                <td class="py-2 text-center">{{ $p['producto_stock'] }}</td>
                                <td class="py-2 text-center">{{ $p['producto_stock_min'] }}</td>
                                <td class="py-2 text-center">
                                    <input type="number" name="stock[]" class="w-20 px-2 py-1" placeholder="0">
                                    <input type="number" name="id_producto[]" class="hidden" value="{{$p['producto_id']}}">
                                    <input type="text" name="nombre_proveedor[]" class="hidden" value="{{$p['proveedor']}}">
                                </td>
                                <td class="py-2 text-center">{{ $p['proveedor'] }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Solicitar Pedido</button>
                </div>
            </form>
        </div>
    </div>
@endsection
