<nav x-data="{ open: false }" class="bg-[#4a773b] text-white shadow-md sticky top-0 z-50">
    <div class="px-20">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-3xl font-bold">
                    SiKesMa
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex space-x-6">
                    <a href="{{ route('admin.antrian.index') }}" class="hover:text-gray-300 text-lg">Kelola Antrian</a>
                    <a href="{{ route('admin.ambulans.index') }}" class="hover:text-gray-300 text-lg">Kelola Ambulans</a>
                    <a href="{{ route('admin.users.index') }}" class="hover:text-gray-300 text-lg">Kelola Pengguna</a>
                </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center py-2 px-3 border border-transparent text-lg leading-4 font-medium rounded-lg text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-green-700 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link href="#" class="text-white hover:bg-green-700">Kelola Antrian</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="text-white hover:bg-green-700">Kelola Ambulans</x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="text-white hover:bg-green-700">Kelola Pengguna</x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-green-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-green-700">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white hover:bg-green-700">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>