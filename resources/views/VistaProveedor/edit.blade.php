@extends('dashboard')

@section('content')
        <div class="w-full lg:w-1/2 mx-auto my-4">

            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Actualizar Proveedor:</h2>
            <form action="{{ route('proveedor.update', $p->id) }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required value="{{$p->Nombre}}"
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">Telefono:</label>
                    <input type="number" name="telefono" id="telefono" required value="{{$p->Telefono}}"
                        class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="marca">Marca:</label>
                    <select name="marca" id="marca" required class="border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option disabled>Elige una categoría</option>
                        @forelse ($marcas as $c)
                            <option value="{{ $c->id }}" {{ $p->marca_id == $c->id ? 'selected' : '' }}>{{ $c->nombre }}</option>
                        @empty
                            <option disabled>Registra una nueva categoría</option>
                        @endforelse
                    </select>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Actualizar</button>
                        <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('proveedor.index') }}">Cancelar</a></button>
                </div>
            </form>
        </div>

@endsection

