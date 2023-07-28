@extends('dashboard')

@section('venta')

<div class="flex justify-center items-center mt-8">
    <p> Pago realizado con exito</p>
    <form action="{{ route('venta.store') }}" method="post">
        @csrf
        <input type="text" name="carrito" hidden value="{{ $c }}">
        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded mx-4 sm:mt-0">Pulse para continuar</button>
    </form>
</div>

@endsection
