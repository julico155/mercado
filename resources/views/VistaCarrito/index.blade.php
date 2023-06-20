@extends('dashboard')

@section('cliente')
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            {{-- <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6 mt-8"> --}}
            <h2 class="text-2xl text-green-500 font-bold mb-6">Carrito de Compras</h2>
            <!-- Tabla de productos -->
            <center>
                <div class="w-full sm:w-3/4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 text-left">Nombre Producto</th>
                                <th class="py-3 px-4 text-left">Cantidad</th>
                                <th class="py-3 px-4 text-left">P. Unit</th>
                                <th class="py-3 px-4 text-left">P. Total</th>
                                <th class="py-3 px-4 text-left">Eliminar Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Aquí se generan las filas de la tabla dinámicamente --}}
                            {{-- Puedes utilizar un bucle en tu controlador para generar las filas --}}
                            {{-- Ejemplo: --}}
                            @foreach ($detalle_carrito as $producto)
                                <tr>
                                    <td class="py-3 px-4">
                                        <p class="font-semibold text-left">{{ $producto->nombre }}</p>
                                        <p class="text-xs text-left">Descripción: {{ $producto->descripcion }}</p>
                                        <p class="text-xs text-left"></p>
                                    </td>
                                    <td class="py-3 px-4">{{ $producto->cantidad }}</td>
                                    <td class="py-3 px-4">{{ $producto->precio }}</td>
                                    <td class="py-3 px-4">{{ $producto->cantidad * $producto->precio }}</td>
                                    <td class="py-3 px-4">
                                        {{-- formulario para eliminar producto del detalle del carrito --}}
                                        <form action="{{ route('carrito.destroy', $producto->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="text" name="producto_id" hidden
                                                value="{{ $producto->producto_id }}">
                                            <input type="text" name="precio" hidden value="{{ $producto->precio }}">
                                            <input type="text" name="cantidad" hidden value="{{ $producto->cantidad }}">
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <tfoot>
                        <div class="flex col-span-2 justify-between w-full sm:w-3/4 mt-8">
                            <div>
                                <!-- Botón Pagar -->
                                {{-- formulario venta.store --}}
                                <form action="{{ route('venta.store') }}" method="post">
                                    @csrf
                                    <input type="text" name="carrito" hidden value="{{ $carrito->id }}">
                                    @php
                                        $c = 0;
                                    @endphp
                                    @foreach ($detalle_carrito as $dp)
                                        <input type="text" name="producto{{ $c }}" hidden
                                            value="{{ $dp->producto_id }}">
                                        @php
                                            $c++;
                                        @endphp
                                    @endforeach
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-2 rounded mx-4 sm:mt-0">Pagar</button>
                                </form>
                            </div>
                            <!-- Total -->
                            <div class="py-2">
                                <span class="font-bold">Total:</span>
                                <span>BOB {{ $carrito->total }}</span>
                            </div>
                        </div>
                    </tfoot>
                </div>
            </center>
        </div>
    </div>
@endsection
