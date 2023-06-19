@extends('dashboard')

@section('cliente')
    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row">
            <div class="flex items-center justify-center w-32 h-32 rounded-full bg-gray-200 overflow-hidden">
                <img src="{{ asset($e->profile_photo_path) }}" alt="Foto de perfil" class="w-full h-full object-cover">
            </div>
            <div class="mt-4 sm:ml-4">
                <h1 class="text-xl font-bold">{{ $e->name }}</h1>
            </div>
        </div>
        @foreach ($categorias as $categoria)
            <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">{{ $categoria->categoria }}</h2>
            <!-- Contenedor de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">

                @foreach ($categoria->productos as $producto)
                    {{-- <div class="bg-white rounded-lg shadow-lg p-4">
                        <a href="{{ route('producto.show', $producto) }}"
                            class="bg-white rounded-lg p-4 flex flex-col items-center">
                            <img src="{{ asset($producto->imagen) }}" alt="Foto del producto" class="w-24 h-24 mb-2">
                            <h3 class="text-lg font-bold text-green-500 mb-2">{{ $producto->nombre }}</h3>
                            <p class="text-gray-500">{{ $producto->descripcion }}</p>
                            <p class="text-green-500 font-bold">{{ $producto->precio }}</p>
                        </a>
                    </div> --}}

                    <div class="bg-white p-4 shadow-md">
                        <div class="grid grid-cols-[1fr,3fr]">
                            <div>
                                <img src="{{ asset($producto->imagen) }}" alt="Foto del producto" class="w-24 h-24 mb-2">
                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg font-bold">{{ $producto->nombre }}</h2>
                                <p class="text-xs font-semibold mb-2">Cantidad: {{ $producto->cantidad }}</p>
                                <p class="mb-2">{{ $producto->descripcion }}</p>
                                <p class="text-lg font-semibold">Precio: {{ $producto->precio }}</p>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="border-t">
        <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">Seccion Clientes: </h2>
    </div>
@endsection
