@extends('dashboard')

@section('venta')
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            {{-- <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6 mt-8"> --}}
                <h2 class="text-2xl text-green-500 font-bold mb-6">Registro de Empresa</h2>

            {{-- <h2 class="text-2xl font-bold text-green-500 mb-4 ml-4">Registro de Empresa</h2> --}}
                <form action="{{ route('empresa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block font-bold mb-2">Nombre del Empleado</label>
                        <input type="text" name="nombre" id="nombre"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="correo" class="block font-bold mb-2">Correo del Empleado</label>
                        <input type="email" name="correo" id="correo"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block font-bold mb-2">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="block font-bold mb-2">Foto del Empleado</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md">
                    </div>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md">Registrar Empleado</button>
                </form>
            </div>
    </div>


    <div class="container mx-auto">
        <div class="overflow-x-auto my-6 shadow-md rounded">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">#</th>
                        <th class="py-2 px-4 border-b text-left">Datos</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empresas as $producto)
                    {{-- @dd($producto) --}}
                        <tr>
                            <td class="text-center py-2 px-4 border-b">

                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="{{ asset($producto->profile_photo_path) }}"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    {{ $producto->name }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 text-left">
                                    {{ $producto->email }}
                                </p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <a href="{{ route('empresa.edit', $producto->id) }}"
                                    class="text-green-500 hover:text-green-700 mr-2">
                                    Edit
                                </a>
                                <form action="{{ route('empresa.destroy', $producto->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <td class="text-center py-2 px-4 border-b">id</td>
                        <td class="text-center py-2 px-4 border-b">nombre</td>
                        <td class="text-center py-2 px-4 border-b">descripcion</td>
                        <td class="text-center py-2 px-4 border-b">precio</td>
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
@endsection
