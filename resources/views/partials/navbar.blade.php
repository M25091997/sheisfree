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
            <div class="relative">
                <button id="lang-btn"
                    class="flex items-center gap-2 bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600 transition-all">
                    🌐 <span id="selected-lang">English</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="google_translate_element"
                    class="absolute right-0 mt-2 hidden bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-2 z-50">
                </div>
            </div>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
                                class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-700 cursor-pointer">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth


            @guest
                <!-- Login Button -->
                <a href="{{ route('login') }}">
                    <button class="flex items-center gap-1 bg-gray-700 px-3 py-1 rounded text-white hover:bg-gray-600">
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


    @push('scripts')
        <!-- Google Translate -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: '',
                    layout: google.translate.TranslateElement.InlineLayout.VERTICAL,
                    autoDisplay: false
                }, 'google_translate_element');
            }
        </script>

        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const btn = document.getElementById('lang-btn');
                const dropdown = document.getElementById('google_translate_element');
                const selectedLang = document.getElementById('selected-lang');

                // Toggle dropdown
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });

                // Prevent dropdown from closing when clicking inside
                dropdown.addEventListener('click', (e) => e.stopPropagation());

                // Close dropdown when clicking outside
                document.addEventListener('click', () => {
                    if (!dropdown.classList.contains('hidden')) dropdown.classList.add('hidden');
                });

                // Detect when a language is selected
                const observer = new MutationObserver(() => {
                    const select = dropdown.querySelector('.goog-te-combo');
                    if (select) {
                        select.addEventListener('change', () => {
                            const langText = select.options[select.selectedIndex].text;
                            selectedLang.textContent = langText;
                            dropdown.classList.add('hidden'); // auto close after select
                        });
                    }
                });

                // Observe for Google Translate’s combo box creation
                observer.observe(dropdown, {
                    childList: true,
                    subtree: true
                });
            });
        </script>

        <style>
            /* Hide the Google top toolbar (banner) */
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }

            body {
                top: 0px !important;
            }

            /* Hide branding and extra label */
            .goog-logo-link,
            .goog-te-gadget span {
                display: none !important;
            }

            /* Compact dropdown styling */
            .goog-te-gadget {
                font-size: 0 !important;
            }

            .goog-te-gadget .goog-te-combo {
                background-color: #1f2937;
                color: #f9fafb;
                border: 1px solid #374151;
                border-radius: 0.375rem;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
                cursor: pointer;
                width: 160px;
            }

            .goog-te-gadget .goog-te-combo:hover {
                border-color: #6366f1;
            }
        </style>
    @endpush



</nav>
