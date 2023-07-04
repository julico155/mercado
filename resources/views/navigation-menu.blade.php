<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- <x-application-mark class="block h-9 w-auto" /> --}}
                        <div class="flex justify-center ">
                            <img class="block h-14 w-auto" src="{{ asset('img/jly-logo.png') }}" alt="Jly Company"
                                width="30%">
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">



                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>

                    @can('admin')
                        <!-- Gestion de Usuarios -->
                        <div class="relative py-4" x-data="{ isOpen: false }" @mouseover="isOpen = true"
                            @mouseleave="isOpen = false">
                            <x-nav-link :active="request()->routeIs('empresa.create')">
                                {{ __('Gestion de Usuarios') }}
                            </x-nav-link>

                            <ul class="absolute left-0 z-10 py-2 mt-2 space-y-2 text-sm bg-white border border-gray-200 rounded-md shadow-lg w-40"
                                x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95" @mouseover="isOpen = true"
                                @mouseleave="isOpen = false">
                                <li><a href="{{ route('user.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Usuarios') }}</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Rol(No disponible)') }}</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Privilegios(No disponible)') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                    @can('vendedor')
                        <!-- Gestion de Compra -->
                        <div class="relative py-4" x-data="{ isOpen: false }" @mouseover="isOpen = true"
                            @mouseleave="isOpen = false">
                            <x-nav-link :active="request()->routeIs('empresa.create')">
                                {{ __('Gestion de Compra') }}
                            </x-nav-link>

                            <ul class="absolute left-0 z-10 py-2 mt-2 space-y-2 text-sm bg-white border border-gray-200 rounded-md shadow-lg w-40"
                                x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95" @mouseover="isOpen = true"
                                @mouseleave="isOpen = false">
                                <li><a href="{{ route('compra.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Compra(No disponible)') }}</a>
                                </li>
                                <li><a href="{{ route('pedido.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Pedido') }}</a>
                                </li>
                                <li><a href="{{ route('proveedor.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Proveedor') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                    @can('vendedor')
                        <!-- Gestion de Venta -->
                        <div class="relative py-4" x-data="{ isOpen: false }" @mouseover="isOpen = true"
                            @mouseleave="isOpen = false">
                            <x-nav-link :active="request()->routeIs('empresa.create')">
                                {{ __('Gestion de Venta') }}
                            </x-nav-link>

                            <ul class="absolute left-0 z-10 py-2 mt-2 space-y-2 text-sm bg-white border border-gray-200 rounded-md shadow-lg w-40"
                                x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95" @mouseover="isOpen = true"
                                @mouseleave="isOpen = false">
                                <li><a href="{{ route('venta.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Venta') }}</a>
                                </li>
                                <li><a href="{{ route('carrito.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Carrito de Venta') }}</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Realizar Factura(No disponible)') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                    @can('admin')
                        <!-- Gestion de Insumos -->
                        <div class="relative py-4" x-data="{ isOpen: false }" @mouseover="isOpen = true"
                            @mouseleave="isOpen = false">
                            <x-nav-link :active="request()->routeIs('empresa.create')">
                                {{ __('Gestion de Insumos') }}
                            </x-nav-link>

                            <ul class="absolute left-0 z-10 py-2 mt-2 space-y-2 text-sm bg-white border border-gray-200 rounded-md shadow-lg w-40"
                                x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95" @mouseover="isOpen = true"
                                @mouseleave="isOpen = false">
                                <li><a href="{{ route('marca.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Marca') }}</a>
                                </li>
                                <li><a href="{{ route('categoria.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Categoria') }}</a>
                                </li>
                                <li><a href="{{ route('producto.index') }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100">{{ __('Gestionar Producto') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endcan



                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        {{-- <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown> --}}
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative border-gray-300 ">
                    @if (auth()->check())
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar Cuenta') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesion
                        </a>
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar
                        </a>
                    @endif

                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            @can('empresa')
                <x-responsive-nav-link href="{{ route('empresa.index') }}" :active="request()->routeIs('empresa.index')">
                    {{ __('My Restaurante') }}
                </x-responsive-nav-link>
            @endcan
            @can('admin')
                <x-responsive-nav-link href="{{ route('empresa.create') }}" :active="request()->routeIs('empresa.create')">
                    {{ __('Registrar Empresa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('categoria.create') }}" :active="request()->routeIs('categoria.create')">
                    {{ __('Registrar Categoria') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

            @if (auth()->check())
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            @else
            @endif
        </div>
    </div>
</nav>
