@extends('dashboard')

@section('cliente')
<div class="container mx-auto px-4 mt-8">
    <table class="min-w-full border border-gray-200 rounded">
        <thead>
            <tr>
                <th class="bg-gray-100 text-left px-6 py-3">No. de Venta</th>
                <th class="bg-gray-100 text-left px-6 py-3">Ver Nota de Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td class="border-t px-6 py-4">{{ $compra->id }}</td>
                <td class="border-t px-6 py-4">
                    <a href="{{ route('notaVenta', ['id' => $compra->id]) }}" class="text-blue-500 hover:underline">Ver Nota</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
