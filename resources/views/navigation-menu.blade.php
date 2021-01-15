<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ action('App\Http\Livewire\Cms') }}" :active="request()->routeIs('dashboard')">
                        CMS
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ action('App\Http\Livewire\Tag') }}" :active="request()->routeIs('dashboard')">
                        TAG
                    </x-jet-nav-link>
                </div>
            </div>

        </div>
    </div>
</nav>
