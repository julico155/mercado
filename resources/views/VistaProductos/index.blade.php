@extends('dashboard')

@section('producto')
    <div class="container mx-auto px-4 my-4">
        <div class="flex flex-col items-center sm:flex-row justify-end">
            <div class="mt-4 sm:ml-4">
                <a href="{{ route('producto.create') }}">Registrar
                    Producto</a>
            </div>
        </div>
        @foreach ($categorias as $categoria)
            <h2 class="text-2xl   mt-8 mb-4 ml-4 uppercase">{{ $categoria->categoria }}</h2>
            <!-- Contenedor de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                @foreach ($categoria->productos as $producto)
                    <div class="bg-white p-4 shadow-md">
                        <div class="grid grid-cols-[1fr,3fr]">
                            <div>
                                <img src="{{ asset($producto->imagen) }}" alt="Foto del producto" class="w-24 h-24 mb-2">
                                <a href="{{ route('producto.edit', $producto->id) }}"
                                    class= "px-4 py-2 rounded-md mr-2">Editar</a>

                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg ">{{ $producto->nombre }}</h2>
                                <p class="mb-2">{{ $producto->descripcion }}</p>
                                <p class="text-lg">Precio: {{ $producto->precio }}</p>
                                <form action="{{ route('producto.destroy', $producto->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
@endsection
