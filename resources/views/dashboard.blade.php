<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @can('AdmUsuario')
                    @yield('usuario')
                @endcan
                @can('AdmCompra')
                @yield('compra')
                @endcan
                @can('AdmVenta')
                @yield('venta')
                @endcan
                @can('AdmProductos')
                @yield('producto')
                @endcan
                {{-- @can('cliente') --}}
                    @yield('cliente')
                {{-- @endcan --}}
                <x-welcome />
            </div>
        </div>
    </div>


</x-app-layout>
