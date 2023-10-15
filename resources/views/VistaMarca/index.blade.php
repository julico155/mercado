@extends('dashboard')

@section('producto')
<div class="flex flex-wrap">
    <div class="w-full lg:w-1/2 px-4 mb-4">
        <h2 class="text-2xl my-4 ml-4">
            Marca</h2>
        <form action="{{ route('marca.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">Registrar:</label>
                <input type="text" name="marca" id="marca"
                    class="border border-gray-400 rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
            </div>

            <div class="flex items-center justify-between mb-4">
                <button type="submit"
                    class="py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
            </div>
        </form>
    </div>

    <div class="w-full lg:w-1/2 px-4 mb-4">
        <div class="overflow-x-auto my-6 shadow-md rounded">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="">
                    <tr>
                        <th class="py-2 px-4 border-b ">#</th>
                        <th class="py-2 px-4 border-b ">Marca</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($marcas as $marca)
                        <tr>
                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    {{ $marca->id }}</p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    {{ $marca->nombre }}
                                </p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <a href="{{ route('marca.edit', $marca->id) }}"
                                    class="mr-2">
                                    Editar
                                </a>
                                <form action="{{ route('marca.destroy', $marca->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="">
                                        borrar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <td class="text-center py-2 px-4 border-b">id</td>
                        <td class="text-center py-2 px-4 border-b">nombre</td>
                        <td class="text-center py-2 px-4 border-b">
                            <div class="flex justify-center">
                                editar
                            </div>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
