<div class="relative">
    <button id="lang-btn"
        class="flex items-center gap-2 bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600 transition-all">
        🌐 <span id="selected-lang">English</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="lang-dropdown"
        class="absolute right-0 mt-2 hidden bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-3 z-50 w-56">
        <input type="text" id="lang-search"
            class="w-full mb-2 px-2 py-1 text-sm text-gray-100 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-500"
            placeholder="🔍 Search language..." />
        <div id="lang-list" class="max-h-64 overflow-auto"></div>
        <div id="google_translate_element" class="hidden"></div>
    </div>
</div>
