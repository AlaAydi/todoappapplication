<nav x-data="{ open: false }" class="glass-nav">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-tr from-primary to-secondary rounded-2xl flex items-center justify-center shadow-lg transform rotate-6 hover:rotate-0 transition-transform duration-500">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-white tracking-tighter hidden sm:block">
                            Todo<span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">App</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-slate-300 hover:text-white transition-colors border-none py-7">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Route::has('tasks.index'))
                        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')"
                            class="text-slate-300 hover:text-white transition-colors border-none py-7">
                            {{ __('Tasks') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-white/10 text-sm leading-4 font-medium rounded-xl text-slate-300 bg-white/5 hover:text-white hover:bg-white/10 focus:outline-none transition ease-in-out duration-150 backdrop-blur-sm">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <!-- Profile -->
                        <x-dropdown-link
                            :href="route('profile.edit')"
                            class="hover:bg-indigo-500/20"
                            onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); window.location.href=this.href; }"
                        >
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                class="hover:bg-red-500/20 text-red-400"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); this.closest('form').submit(); }"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }"
        class="hidden sm:hidden bg-slate-900/50 backdrop-blur-xl border-t border-white/5">

        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="rounded-xl border-none text-slate-300 hover:bg-white/5">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if (Route::has('tasks.index'))
                <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')"
                    class="rounded-xl border-none text-slate-300 hover:bg-white/5">
                    {{ __('Tasks') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Settings -->
        <div class="pt-4 pb-1 border-t border-white/5">
            <div class="px-8">
                <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 px-4">

                <x-responsive-nav-link :href="route('profile.edit')"
                    class="rounded-xl border-none text-slate-300 hover:bg-white/5">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="rounded-xl border-none text-red-400 hover:bg-red-500/10">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>
</nav>
