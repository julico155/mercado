@php

    use App\Models\producto;
    use App\Models\categoria;

    $buscar = Request('buscar');

    $categorias = Categoria::with([
        'productos' => function ($query) use ($buscar) {
            $query->where('nombre', 'like', '%' . $buscar . '%');
        },
    ])
        // ->where('categoria', 'like', '%' . $buscar . '%')
        ->get();
@endphp

<div class="bg-white py-8">
    <div class="container mx-auto">

        <form action="" method="GET">
            <!-- Contenedor del buscador -->
            <div class="flex justify-center mb-8">
                <input type="text" name="buscar" placeholder="Buscar producto"
                    class="border border-gray-300 px-4 py-2 rounded-l-md w-64">
                <a href="{{ route('dashboard') }}" class="bg-red-500 text-white px-4 py-2 ml-0.5">&times;</a>
                <button class="bg-green-500 text-white px-4 py-2 rounded-r-md">ir</button>
            </div>
        </form>

        <div class="container mx-auto px-4">
            <!-- Contenedor de categorias -->
            @foreach ($categorias as $categoria)
                <h2 class="text-2xl font-bold text-green-500 mt-8 mb-4 ml-4 uppercase">{{ $categoria->categoria }}</h2>
                <!-- Contenedor de productos -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 px-4">
                    @foreach ($categoria->productos as $producto)
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <a href="{{ route('producto.show', $producto) }}"
                                class="bg-white rounded-lg p-4 flex flex-col items-center">
                                <img src="{{ asset($producto->imagen) }}" alt="Foto del producto"
                                    class="w-24 h-24 mb-2">
                                <h3 class="text-lg font-bold text-green-500 mb-2">{{ $producto->nombre }}</h3>
                                <p class="text-gray-500">{{ $producto->descripcion }}</p>
                                <p class="text-green-500 font-bold">{{ $producto->precio }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
