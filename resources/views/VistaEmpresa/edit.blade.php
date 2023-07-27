@extends('dashboard')

@section('venta')
<div class="container mx-auto">
    <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
        {{-- <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6 mt-8"> --}}
            <h2 class="text-2xl text-green-500 font-bold mb-6">Registro de Empresa</h2>

        {{-- <h2 class="text-2xl font-bold text-green-500 mb-4 ml-4">Registro de Empresa</h2> --}}
        {{-- @dd($empresas) --}}
            <form action="{{ route('empresa.update', $empresas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block font-bold mb-2">Nombre de la Empresa</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $empresas->name }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block font-bold mb-2">Correo de la Empresa</label>
                    <input type="email" name="correo" id="correo" value="{{ $empresas->email }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-bold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" value="" required
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="foto" class="block font-bold mb-2">Logo de la Empresa</label>
                    <input type="file" name="foto" id="foto" value="{{ $empresas->profile_photo_path }}"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md">
                </div>
                <button class="bg-green-500 text-white px-4 py-2 rounded-md">Registrar Empresa</button>
            </form>
        </div>
</div>
@endsection
