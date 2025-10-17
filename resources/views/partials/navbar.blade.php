<!-- Top Navbar -->
<nav class="bg-gray-800 shadow-md">
    <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4">

        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <span class="text-yellow-500 text-xl font-bold">Sheisfree</span>
            <span class="text-white text-xl font-bold">Republic</span>
        </a>

        <!-- Right Section -->
        <div class="flex items-center gap-4">
            <a href="tel:5541251234" class="text-sm text-gray-300 hover:text-yellow-400">
                (555) 412-1234
            </a>

            <!-- Language -->
            <button class="flex items-center gap-1 bg-gray-700 px-3 py-1 rounded text-white hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="m5 8 6 6m-7 0 6-6 2-3M2 5h12M7 2h1m14 20-5-10-5 10m4-4h6" />
                </svg>
                <span> Eng</span>
            </button>

@auth
    <!-- Profile Dropdown -->
    <div class="relative inline-block text-left">
        <!-- Button -->
        <button id="profileMenuBtn"
            class="flex items-center gap-1 bg-blue-700 px-3 py-1 rounded text-white hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <circle cx="12" cy="7" r="4"></circle>
                <path d="M5.5 21a7.5 7.5 0 0 1 13 0"></path>
            </svg>
            <span>{{ Auth::user()->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="profileMenu"
            class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-600 z-50">
            
            <a href="{{ route('profile') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endauth


@guest
    <!-- Login Button -->
    <a href="{{ route('login') }}">
        <button
            class="flex items-center gap-1 bg-gray-700 px-3 py-1 rounded text-white hover:bg-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <circle cx="18" cy="15" r="3"></circle>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M10 15H6a4 4 0 0 0-4 4v2"></path>
                <path d="m21.7 16.4-.9-.3"></path>
                <path d="m15.2 13.9-.9-.3"></path>
            </svg>
            <span>Sign in</span>
        </button>
    </a>
@endguest

        </div>
    </div>
</nav>

