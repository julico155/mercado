@extends('dashboard')

@section('content')


    <div class="w-full lg:w-1/2 mx-auto mb-4">
        <div class="overflow-x-auto my-6 shadow-md rounded">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">#</th>
                        <th class="py-2 px-4 border-b text-left">Marca</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $stock)
                        <tr>
                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    {{ $stock->id }}</p>
                            </td>

                            <td class="text-center py-2 px-4 border-b">
                                <p class="font-semibold text-left">
                                    {{ $stock->cantidad }}
                                </p>
                            </td>



                        </tr>
                    @empty
                        <td class="text-center py-2 px-4 border-b">id</td>
                        <td class="text-center py-2 px-4 border-b">nombre</td>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
