@extends('dashboard')

@section('producto')
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
            <h2 class="text-2xl font-bold text-purple-500 mt-8 mb-4 ml-4 uppercase">Registro de productos:</h2>
            <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 grid grid-cols-2 gap-4">
                @csrf

                <div class="mb-4 col-span-2">
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

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Marca:</label>
                    <select name="marca" id="marca" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option selected disabled>Elige una Marca</option>
                        @forelse ($marcas as $m)
                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                        @empty
                            <option disabled>Registra una nueva marca</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                </div>

                <div class="mb-4 col-span-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cant_min">Cantidad Minima:</label>
                    <input type="number" name="cant_min" id="cant_min" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4 col-span-1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" required
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="col-span-2 flex items-center justify-between mb-4">
                    <button
                        class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                </div>
            </form>
        </div>


    @endif

@endsection
