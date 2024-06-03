
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

       <!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:flex">
    <!-- List of Musics -->
    <x-nav-link :href="route('musics.index')" :active="request()->routeIs('musics.index')">
        {{ __('Hymns') }}
    </x-nav-link>

<!-- List of Settings -->
<div class="relative">

    <x-nav-link href="#"  id="settingsToggle"> 
        {{ __('Settings') }}
    </x-nav-link>

    <!-- Dropdown for Settings -->
    <div id="settingsDropdown" class="absolute z-20 mt-2 w-40 bg-white rounded-lg shadow-lg transform scale-0 origin-top-right transition-all duration-300" style="display: none;">

        <ul class="py-2">
            <!-- List of Categories -->
            <li class="opacity-10 transform scale-0 transition-all duration-300 delay-100">
                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" style="color:black;">
                    {{ __('Categories') }}
                </x-nav-link>
            </li>
            <!-- List of Instrumentations -->
            <li class="opacity-10 transform scale-0 transition-all duration-300 delay-200">
                <x-nav-link :href="route('instrumentations.index')" :active="request()->routeIs('instrumentations.index')">
                    {{ __('Instrumentations') }}
                </x-nav-link>
            </li>
            <!-- List of Ensemble Types -->
            <li class="opacity-10 transform scale-0 transition-all duration-300 delay-300">
                <x-nav-link :href="route('ensemble_types.index')" :active="request()->routeIs('ensemble_types.index')">
                    {{ __('Ensemble Types') }}
                </x-nav-link>
            </li>
            <!-- List of Ensemble Types -->
            <li class="opacity-10 transform scale-0 transition-all duration-300 delay-300">
                <x-nav-link :href="route('credits.index')" :active="request()->routeIs('credits.index')">
                    {{ __('Credits') }}
                </x-nav-link>
            </li>
                        <!-- List of Ensemble Types -->
                        <li class="opacity-10 transform scale-0 transition-all duration-300 delay-300">
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('Users') }}
                </x-nav-link>
            </li>
        </ul>
    </div>
</div>

<script>
    const settingsToggle = document.getElementById('settingsToggle');
    const settingsDropdown = document.getElementById('settingsDropdown');

    let isOpen = false;


    // Toggle the dropdown when settingsToggle is clicked
    settingsToggle.addEventListener('click', () => {
        isOpen = !isOpen;
        if (isOpen) {
            settingsDropdown.style.display = 'block';
        } else {
            settingsDropdown.style.display = 'none';
        }
    });

    // Hide the dropdown when the user hovers outside of it
    document.addEventListener('click', (event) => {
        const isClickInsideDropdown = settingsDropdown.contains(event.target);
        const isClickOnToggle = settingsToggle.contains(event.target);
        if (!isClickInsideDropdown && !isClickOnToggle) {
            settingsDropdown.style.display = 'none';
            isOpen = false;
        }
    });
</script>




</div>

            </div>

            <!-- User Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Profile -->
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:text-gray-500 dark:focus:text-gray-400 focus:bg-gray-100 dark:focus:bg-gray-900 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu for Mobile -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Dashboard Link -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- List of Musics Link -->
            <x-responsive-nav-link :href="route('musics.index')" :active="request()->routeIs('musics.index')">
                {{ __('Musics') }}
            </x-responsive-nav-link>

            <!-- List of Users Link -->
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('Users') }}
            </x-responsive-nav-link>
        </div>

        <!-- User Profile and Logout -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- User Profile Link -->
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Logout Link -->
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
