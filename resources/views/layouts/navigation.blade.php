<nav x-data="{ open: false }" class="bg-slate-700 text-white border-b border-gray-100 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a class="pl-2" href="{{route('index')}}" :active="request()->routeIs('index')">
                        {{ __('Pagrindinis') }}
                    </a>
                    <a class="pl-2" href="{{route('reviews.index')}}" :active="request()->routeIs('reviews.index')">
                        {{ __('Atsiliepimai') }}
                    </a>
                    <a class="pl-2" href="{{route('articles')}}" :active="request()->routeIs('articles')">
                        {{ __('Straipsniai') }}
                    </a>
                    <a class="pl-2" href="{{route('cars.index')}}" :active="request()->routeIs('cars.index')">
                        {{ __('Automobiliai') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->

            @if (Route::has('login'))
                @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6 text-white">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center font-medium hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Atsijungti') }}
                                </x-dropdown-link>

                            </form>

                             <x-dropdown-link :href="route('dashboard.index')">
                                {{ __('Profilis') }}
                             </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                </div>
                @else

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{ route('login') }}" class=" text-gray-700 text-white">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-white dark:text-gray-500">Register</a>
                    </div>
                    @endif
                @endauth

         @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden absolute w-full z-10">
            <div class="flex justify-center flex-col items-center text-xl bg-slate-600 py-2">
                <a class="p-1 w-full text-center hover:bg-gray-700" href="{{route('index')}}" :active="request()->routeIs('index')">
                    {{ __('Pagrindinis') }}
                </a>
                <a class="p-1 w-full text-center hover:bg-gray-700" href="{{route('reviews.index')}}" :active="request()->routeIs('reviews.index')">
                    {{ __('Atsiliepimai') }}
                </a>
                <a class="p-1 w-full text-center hover:bg-gray-700" href="{{route('articles')}}" :active="request()->routeIs('articles')">
                    {{ __('Straipsniai') }}
                </a>
                <a class="p-1 w-full text-center hover:bg-gray-700" href="{{route('cars.index')}}" :active="request()->routeIs('cars.index')">
                    {{ __('Automobiliai') }}
                </a>
            </div>

            <!-- Responsive Settings Options -->

            <div class="pt-4 pb-4 border-t border-gray-200 bg-slate-700">
                <div class="px-4">
                    @if (auth()->check())
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-100">{{ Auth::user()->email }}</div>
                    @else
                        <a href="{{ route('login') }}" class=" text-white dark:text-gray-500">Log in</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-white dark:text-gray-500">Register</a>
                        @endif
                </div>
                    @endif
            </div>

            @if (auth()->check())
                <div class="mt-3 mb-2 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="p-4" href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                    </a>
                    </form>
                </div>
            </div>
            @endif
        </div>

</nav>
