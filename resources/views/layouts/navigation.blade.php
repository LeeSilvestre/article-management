<nav x-data="{ open: false }" class="bg-[#0D1321] border-b border-white/5 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Brand Logo Component Integration -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <img 
                            src="{{ asset('PMTI.png') }}" 
                            alt="PMTI Logo" 
                            class="h-8 w-auto object-contain filter drop-shadow(0 2px 6px rgba(0,0,0,0.3)) transition-transform duration-200 group-hover:scale-105"
                        >
                        <span class="text-white font-bold text-sm tracking-wide hidden md:block uppercase font-sans">
                            PMTI <span class="text-[#38BDF8]">AMS</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links Area -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link 
                        :href="route('dashboard')" 
                        :active="request()->routeIs('dashboard')"
                        class="text-gray-400 hover:text-white border-b-2 data-[active=true]:border-[#38BDF8] data-[active=true]:text-white text-sm font-medium tracking-wide transition duration-150 ease-in-out"
                    >
                        {{ __('PMTI Article Management System') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown Panel -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-white/10 text-sm leading-4 font-medium rounded-md text-gray-300 bg-[#131A2C] hover:text-white hover:bg-[#1b253f] hover:border-white/20 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                            <div class="font-semibold tracking-wide">{{ Auth::user()->name }}</div>

                            <div class="ms-2 text-gray-400">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Custom styled interactive background layer inside breeze components -->
                        <div class="bg-[#0D1321] border border-white/10 rounded-md py-1 shadow-2xl">
                            <x-dropdown-link 
                                :href="route('profile.edit')"
                                class="block w-full px-4 py-2 text-left text-sm text-gray-300 hover:bg-[#131A2C] hover:text-[#38BDF8] transition duration-150"
                            >
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link 
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block w-full px-4 py-2 text-left text-sm text-gray-300 hover:bg-rose-950/30 hover:text-rose-400 transition duration-150"
                                >
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger Trigger Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button 
                    @click="open = ! open" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-[#131A2C] focus:outline-none transition duration-150 ease-in-out"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Navigation Menu Drawer -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#090D16] border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link 
                :href="route('dashboard')" 
                :active="request()->routeIs('dashboard')"
                class="block w-full ps-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-400 hover:text-white hover:bg-[#131A2C] data-[active=true]:border-[#38BDF8] data-[active=true]:bg-[#131A2C] data-[active=true]:text-white transition duration-150"
            >
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Mobile Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/5">
            <div class="px-4">
                <div class="font-semibold text-base text-white tracking-wide">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link 
                    :href="route('profile.edit')"
                    class="block w-full ps-3 pr-4 py-2 text-left text-base font-medium text-gray-400 hover:text-white hover:bg-[#131A2C] transition duration-150"
                >
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link 
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block w-full ps-3 pr-4 py-2 text-left text-base font-medium text-gray-400 hover:text-rose-400 hover:bg-rose-950/20 transition duration-150"
                    >
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>