<nav x-data="{ open: false }" class="bg-amber-900 border-b border-amber-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>
            </div>

            <!-- Menu Links -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                    {{ __('Dashboard') }}
                </x-nav-link>

                <x-nav-link :href="route('fincas.index')" :active="request()->routeIs('fincas.*')" class="text-white">
                    {{ __('Fincas') }}
                </x-nav-link>

                <x-nav-link :href="route('cultivos.index')" :active="request()->routeIs('cultivos.*')" class="text-white">
                    {{ __('Tipos de Cultivo') }}
                </x-nav-link>

                <!-- parcelas -->
                <x-nav-link :href="route('parcelas.index', session('finca_actual_id', 1))" class="text-white">
                    {{ __('Parcelas') }}
                </x-nav-link>


            </div>


            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-amber-900 hover:bg-amber-800 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-200 hover:bg-amber-800 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('fincas.index')" :active="request()->routeIs('fincas.*')">
                {{ __('Fincas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cultivos.index')" :active="request()->routeIs('cultivos.*')">
                {{ __('Tipos de Cultivo') }}
            </x-responsive-nav-link>
            @if(isset($parcelas) && $parcelas->count())
                @foreach($parcelas as $parcela)
                    <x-responsive-nav-link :href="route('parcelas.show', $parcela->id)">
                        {{ $parcela->nombre }}
                    </x-responsive-nav-link>
                @endforeach
            @endif
        </div>

        <!-- Responsive User -->
        <div class="pt-4 pb-1 border-t border-amber-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-200">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
