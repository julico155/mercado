@extends('dashboard')

@section('cliente')
    <div class="container mx-auto">
        <div class="overflow-x-auto mx-auto bg-white shadow-md rounded px-8 py-6 mt-8">
            <div class="text-center">
                <a href="{{ route('dashboard') }}">
                    <h2 class="text-2xl text-green-500 font-bold mb-6">JLY COMPANY</h2>
                </a>
            </div>

            <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-6">
                <img src="{{ asset($p->imagen) }}" alt="Foto del producto" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-medium text-gray-800">{{ $p->nombre }}</h3>
                    <p class="text-sm text-gray-600 mb-4">Cantidad disponible: {{ $p->stock }}</p>
                    <p class="text-gray-600 mb-4">{{ $p->descripcion }}</p>
                    {{-- @dd($p->id) --}}
                    @auth
                        <form action="{{ route('carrito.update', $p->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $p->id }}">
                            <input type="hidden" name="producto_precio" value="{{ $p->precio }}">

                            <div class="flex justify-start">
                                <input type="number" name="cantidad" placeholder="Cantidad" required min="1" max="{{  $p->stock }}" class="border border-gray-300 px-4 py-2 rounded-l-md w-32">
                                <button class="bg-green-500 text-white px-4 py-2 rounded-r-md">Agregar al Carrito</button>
                            </div>
                        </form>
                    @else
                        <p class="text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">Inicia sesión para
                            poder
                            comprar</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
