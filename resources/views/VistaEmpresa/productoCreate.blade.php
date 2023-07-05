@extends('dashboard')

@section('venta')
    @if ($categorias->isEmpty())
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                <a href="{{ route('categoria.create') }}">
                    Primero debe registrar una categoria
                </a>
            </p>
        </div>
    @elseif($marcas->isEmpty())
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                <a href="{{ route('marca.create') }}">
                    Primero debe registrar una marca
                </a>
            </p>
        </div>
    @else
        <div class="w-full lg:w-1/2 mx-auto my-4">

            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Registro de productos:</h2>
            <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option selected disabled>Elige una categoria</option>
                        @forelse ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                        @empty
                            <option disabled>Registra una nueva categoria</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                </div>
            </form>
        </div>
    @endif
    <div class="border-t my-4">
        <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Seccion Clientes: </h2>
    </div>
@endsection
