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
            <div class="flex items-center gap-4">
                <!-- Language dropdown -->
                @include('partials.language-dropdown')
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

    @push('script')
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                    autoDisplay: false
                }, 'google_translate_element');
            }

            document.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('lang-btn');
                const dropdown = document.getElementById('lang-dropdown');
                const searchBox = document.getElementById('lang-search');
                const langList = document.getElementById('lang-list');
                const selectedLang = document.getElementById('selected-lang');

                const languages = [{
                        value: 'en',
                        text: 'English'
                    },
                    {
                        value: 'hi',
                        text: 'Hindi'
                    },
                    {
                        value: 'fr',
                        text: 'French'
                    },
                    {
                        value: 'es',
                        text: 'Spanish'
                    },
                    {
                        value: 'de',
                        text: 'German'
                    },
                    {
                        value: 'bn',
                        text: 'Bengali'
                    },
                    {
                        value: 'ta',
                        text: 'Tamil'
                    },
                    {
                        value: 'te',
                        text: 'Telugu'
                    },
                    {
                        value: 'ar',
                        text: 'Arabic'
                    },
                    {
                        value: 'zh-CN',
                        text: 'Chinese'
                    },
                ];

                btn.addEventListener('click', e => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                    if (!dropdown.classList.contains('hidden')) searchBox.focus();
                });

                dropdown.addEventListener('click', e => e.stopPropagation());
                document.addEventListener('click', () => dropdown.classList.add('hidden'));

                // Render the language list
                const renderList = (filter = '') => {
                    langList.innerHTML = '';
                    languages.filter(l => l.text.toLowerCase().includes(filter.toLowerCase()))
                        .forEach(l => {
                            const div = document.createElement('div');
                            div.textContent = l.text;
                            div.dataset.value = l.value;
                            div.className =
                                'px-2 py-1 cursor-pointer hover:bg-gray-700 rounded text-gray-100 text-sm';
                            div.addEventListener('click', () => {
                                selectedLang.textContent = l.text;
                                dropdown.classList.add('hidden');

                                // Actually change Google Translate language
                                const frame = document.querySelector('iframe.goog-te-menu-frame');
                                if (frame) {
                                    const frameDoc = frame.contentDocument || frame.contentWindow
                                        .document;
                                    const langAnchors = frameDoc.querySelectorAll(
                                        'a.goog-te-menu2-item span.text');
                                    langAnchors.forEach(a => {
                                        if (a.textContent === l.text) {
                                            a.click(); // trigger translation
                                        }
                                    });
                                }

                                // Hide Google top bar
                                const banner = document.querySelector(
                                    '.goog-te-banner-frame.skiptranslate');
                                const gadget = document.querySelector('.goog-te-gadget');
                                const logo = document.querySelector('.goog-logo-link');
                                const spans = document.querySelectorAll('.goog-te-gadget span');
                                if (banner) banner.style.display = 'none';
                                if (gadget) gadget.style.display = 'none';
                                if (logo) logo.style.display = 'none';
                                spans.forEach(span => span.style.display = 'none');
                            });
                            langList.appendChild(div);
                        });
                };

                renderList();
                searchBox.addEventListener('input', () => renderList(searchBox.value));
            });
        </script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
                const selectedLang = document.getElementById('selected-lang');
                const langDropdown = document.getElementById('lang-dropdown');
                const langList = document.getElementById('lang-list');

                // Wait until Google Translate select is ready
                const waitForSelect = setInterval(() => {
                    const select = document.querySelector('#google_translate_element select');
                    if (!select) return;
                    clearInterval(waitForSelect);

                    select.style.display = 'none'; // hide default select

                    // Attach click event to each language div
                    langList.querySelectorAll('div[data-value]').forEach(div => {
                        div.addEventListener('click', () => {
                            const langCode = div.dataset.value;
                            const langName = div.textContent;

                            // Set Google Translate <select> value
                            select.value = langCode;
                            select.dispatchEvent(new Event('change')); // trigger translation

                            // Update button text
                            selectedLang.textContent = langName;

                            // Close dropdown
                            langDropdown.classList.add('hidden');

                            // Hide Google banner/top bar
                            const banner = document.querySelector(
                                '.goog-te-banner-frame.skiptranslate');
                            const gadget = document.querySelector('.goog-te-gadget');
                            const logo = document.querySelector('.goog-logo-link');
                            const spans = document.querySelectorAll('.goog-te-gadget span');
                            if (banner) banner.style.display = 'none';
                            if (gadget) gadget.style.display = 'none';
                            if (logo) logo.style.display = 'none';
                            spans.forEach(span => span.style.display = 'none');
                        });
                    });
                }, 300);
            });
        </script>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: 'en,hi,fr,es,de,bn,ta,te,ar,zh-CN',
                    layout: google.translate.TranslateElement.InlineLayout.VERTICAL,
                    autoDisplay: false
                }, 'google_translate_element');
            }
        </script>

        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <style>
            /* Hide Google branding */
            .goog-logo-link,
            .goog-te-gadget span,
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }

            body {
                top: 0 !important;
            }

            #lang-dropdown {
                z-index: 99999 !important;
            }

            iframe.goog-te-menu-frame {
                z-index: 2147483647 !important;
                position: fixed !important;
                top: 70px !important;
                right: 20px !important;
            }
        </style>
    @endpush

    {{-- 
    @push('script')
        <script>
            const languages = [{
                    value: 'en',
                    text: 'English'
                },
                {
                    value: 'hi',
                    text: 'Hindi'
                },
                {
                    value: 'fr',
                    text: 'French'
                },
                {
                    value: 'es',
                    text: 'Spanish'
                },
                {
                    value: 'de',
                    text: 'German'
                },
                {
                    value: 'bn',
                    text: 'Bengali'
                },
                {
                    value: 'ta',
                    text: 'Tamil'
                },
                {
                    value: 'te',
                    text: 'Telugu'
                },
                {
                    value: 'ar',
                    text: 'Arabic'
                },
                {
                    value: 'zh-CN',
                    text: 'Chinese'
                },
                // Add more languages if you want
            ];

            const langList = document.getElementById('lang-list');
            const searchBox = document.getElementById('lang-search');
            const selectedLang = document.getElementById('selected-lang');

            function renderList(filter = '') {
                langList.innerHTML = '';
                languages.filter(l => l.text.toLowerCase().includes(filter.toLowerCase()))
                    .forEach(l => {
                        const div = document.createElement('div');
                        div.textContent = l.text;
                        div.setAttribute('data-value', l.value);
                        div.className = 'px-2 py-1 cursor-pointer hover:bg-gray-700 rounded text-gray-100 text-sm';
                        div.addEventListener('click', () => {
                            // Trigger Google Translate programmatically
                            const select = document.querySelector('#google_translate_element select');
                            if (select) {
                                select.value = l.value;
                                select.dispatchEvent(new Event('change'));
                            }
                            selectedLang.textContent = l.text;
                            document.getElementById('lang-dropdown').classList.add('hidden');

                            // Hide Google banner
                            const banner = document.querySelector('.goog-te-banner-frame.skiptranslate');
                            const gadget = document.querySelector('.goog-te-gadget');
                            const logo = document.querySelector('.goog-logo-link');
                            const spans = document.querySelectorAll('.goog-te-gadget span');
                            if (banner) banner.style.display = 'none';
                            if (gadget) gadget.style.display = 'none';
                            if (logo) logo.style.display = 'none';
                            spans.forEach(span => span.style.display = 'none');
                        });
                        langList.appendChild(div);
                    });
            }

            // Initial render
            renderList();
            searchBox.addEventListener('input', () => renderList(searchBox.value));

            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                    autoDisplay: false
                }, 'google_translate_element');
            }

            // function googleTranslateElementInit() {
            //     new google.translate.TranslateElement({
            //         pageLanguage: 'en',
            //         includedLanguages: '', // all languages
            //         layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            //         autoDisplay: false
            //     }, 'google_translate_element');
            // }

            document.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('lang-btn');
                const dropdown = document.getElementById('lang-dropdown');
                const searchBox = document.getElementById('lang-search');
                const langList = document.getElementById('lang-list');
                const selectedLang = document.getElementById('selected-lang');

                btn.addEventListener('click', e => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                    if (!dropdown.classList.contains('hidden')) searchBox.focus();
                });

                dropdown.addEventListener('click', e => e.stopPropagation());
                document.addEventListener('click', () => dropdown.classList.add('hidden'));

                // Wait until Google Translate select exists
                const waitForSelect = setInterval(() => {
                    const select = document.querySelector('#google_translate_element select');
                    if (select) {
                        clearInterval(waitForSelect);
                        select.style.display = 'none';

                        const languages = Array.from(select.options).map(opt => ({
                            value: opt.value,
                            text: opt.text
                        }));

                        // Render language list
                        const renderList = (filter = '') => {
                            langList.innerHTML = '';
                            languages.filter(l => l.text.toLowerCase().includes(filter.toLowerCase()))
                                .forEach(l => {
                                    const div = document.createElement('div');
                                    div.textContent = l.text;
                                    div.setAttribute('data-value', l.value);
                                    div.className =
                                        'px-2 py-1 cursor-pointer hover:bg-gray-700 rounded text-gray-100 text-sm';
                                    div.addEventListener('click', () => {
                                        select.value = l.value;
                                        select.dispatchEvent(new Event('change'));
                                        selectedLang.textContent = l.text;
                                        dropdown.classList.add('hidden');
                                        // Hide Google banner after selection
                                        const banner = document.querySelector(
                                            '.goog-te-banner-frame.skiptranslate');
                                        const gadget = document.querySelector(
                                            '.goog-te-gadget');
                                        const logo = document.querySelector('.goog-logo-link');
                                        const spans = document.querySelectorAll(
                                            '.goog-te-gadget span');
                                        if (banner) banner.style.display = 'none';
                                        if (gadget) gadget.style.display = 'none';
                                        if (logo) logo.style.display = 'none';
                                        spans.forEach(span => span.style.display = 'none');
                                    });
                                    langList.appendChild(div);
                                });
                        };

                        renderList(); // initial render

                        // Filter as user types
                        searchBox.addEventListener('input', () => renderList(searchBox.value));
                    }
                }, 300);
            });
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <style>
            /* Hide Google branding */
            .goog-logo-link,
            .goog-te-gadget span,
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }

            body {
                top: 0 !important;
            }

            /* Dropdown styling */
            #lang-dropdown {
                z-index: 99999 !important;
            }

            iframe.goog-te-menu-frame {
                z-index: 2147483647 !important;
                position: fixed !important;
                top: 70px !important;
                right: 20px !important;
            }
        </style>
    @endpush --}}


    {{-- @push('scripts')
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: '', // all languages
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                    autoDisplay: false
                }, 'google_translate_element');
            }

            document.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('lang-btn');
                const dropdown = document.getElementById('lang-dropdown');
                const searchBox = document.getElementById('lang-search');
                const langList = document.getElementById('lang-list');
                const selectedLang = document.getElementById('selected-lang');

                btn.addEventListener('click', e => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                    if (!dropdown.classList.contains('hidden')) searchBox.focus();
                });

                dropdown.addEventListener('click', e => e.stopPropagation());
                document.addEventListener('click', () => dropdown.classList.add('hidden'));

                // Wait for Google Translate select
                const waitForSelect = setInterval(() => {
                    const select = document.querySelector('#google_translate_element select');
                    if (select) {
                        clearInterval(waitForSelect);
                        select.style.display = 'none'; // hide default select

                        const languages = Array.from(select.options).map(opt => ({
                            value: opt.value,
                            text: opt.text
                        }));

                        const renderList = (filter = '') => {
                            langList.innerHTML = '';
                            languages.filter(l => l.text.toLowerCase().includes(filter.toLowerCase()))
                                .forEach(l => {
                                    const div = document.createElement('div');
                                    div.textContent = l.text;
                                    div.setAttribute('data-value', l.value);
                                    div.className =
                                        'px-2 py-1 cursor-pointer hover:bg-gray-700 rounded text-gray-100 text-sm';
                                    div.addEventListener('click', () => {
                                        select.value = l.value;
                                        select.dispatchEvent(new Event('change'));
                                        selectedLang.textContent = l.text;
                                        dropdown.classList.add('hidden');
                                        // Hide Google Translate top bar after selection
                                        const banner = document.querySelector(
                                            '.goog-te-banner-frame.skiptranslate');
                                        const gadget = document.querySelector(
                                            '.goog-te-gadget');
                                        const logo = document.querySelector('.goog-logo-link');
                                        const spans = document.querySelectorAll(
                                            '.goog-te-gadget span');
                                        if (banner) banner.style.display = 'none';
                                        if (gadget) gadget.style.display = 'none';
                                        if (logo) logo.style.display = 'none';
                                        spans.forEach(span => span.style.display = 'none');
                                    });
                                    langList.appendChild(div);
                                });
                        };

                        renderList(); // initial render
                        searchBox.addEventListener('input', () => renderList(searchBox.value));
                    }
                }, 300);
            });
        </script>

        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <style>
            /* Hide Google branding and banner */
            .goog-logo-link,
            .goog-te-gadget span,
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }

            body {
                top: 0 !important;
            }

            /* Dropdown styling */
            #lang-dropdown {
                z-index: 99999 !important;
            }

            iframe.goog-te-menu-frame {
                z-index: 2147483647 !important;
                position: fixed !important;
                top: 70px !important;
                right: 20px !important;
            }
        </style>
    @endpush --}}

    {{-- @push('scripts')
        <!-- Google Translate -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: 'en,hi,fr,es,de,bn,ta,te,ar,zh-CN',
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

                // Toggle dropdown
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });

                // Prevent dropdown from closing when clicking inside
                dropdown.addEventListener('click', (e) => {
                    e.stopPropagation();
                });

                // Close dropdown only when clicking outside
                document.addEventListener('click', (e) => {
                    if (!dropdown.classList.contains('hidden')) {
                        dropdown.classList.add('hidden');
                    }
                });
            });
        </script>


        <style>
            /* Hide Google branding and label */
            .goog-logo-link,
            .goog-te-gadget span {
                display: none !important;
            }

            /* Compact dropdown */
            .goog-te-gadget {
                font-size: 0 !important;
            }

            .goog-te-gadget .goog-te-combo {
                background-color: #1f2937;
                /* gray-800 */
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
                /* indigo-500 */
            }

            body {
                top: 0 !important;
            }
        </style>
    @endpush --}}
</nav>
