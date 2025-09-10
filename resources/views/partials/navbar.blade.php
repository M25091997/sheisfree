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
                <span>Language</span>
            </button>

            <!-- Sign in -->
            <a href="{{ route('login') }}"> <button
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
                </button> </a>
        </div>
    </div>
</nav>

<!-- Filters Navbar -->
<nav class="bg-gray-900 border-t border-gray-700">
    <div class="max-w-screen-xl mx-auto px-4 py-3">
        <div class="flex flex-wrap gap-3 items-center justify-between">

            <!-- Filters -->
            <div class="flex flex-wrap gap-3">
                <select class="bg-gray-700 text-white px-3 py-2 rounded-md">
                    <option>Female escorts</option>
                </select>
                <select class="bg-gray-700 text-white px-3 py-2 rounded-md">
                    <option>Select city</option>
                </select>
                <select class="bg-gray-700 text-white px-3 py-2 rounded-md">
                    <option>AED</option>
                </select>
                <select class="bg-gray-700 text-white px-3 py-2 rounded-md">
                    <option>All Services</option>
                </select>
                <!-- Search Button -->
                <button
                    class="bg-yellow-500 text-black px-6 py-2 rounded-md hover:bg-yellow-400 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#191515" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg> Search
                </button>
            </div>


        </div>
    </div>
</nav>
