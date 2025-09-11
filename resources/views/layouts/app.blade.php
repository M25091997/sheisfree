<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @hasSection('title')
                @yield('title') - {{ config('app.name', 'Laravel') }}
            @else
                {{ config('app.name', 'Laravel') }}
            @endif
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Tailwind CSS & JS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- jQuery first -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="{{ asset('magiczoomplus/magiczoomplus.css') }}" />
    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-gray-200 min-h-screen flex flex-col">

        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Main Content -->
        <main class="flex-1 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>


        @include('partials.site-info')
        @include('partials.footer')

        <!-- Magic Zoom JS -->
        <script src="{{ asset('magiczoomplus/magiczoomplus.js') }}"></script>

        <!-- Page specific scripts -->
        @stack('scripts')

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                if (Notification.permission === "granted") {
                    new Notification("👋 Welcome!", {
                        body: "Thanks for visiting our site 🎉",
                        icon: "/icon.png"
                    });
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then(permission => {
                        if (permission === "granted") {
                            new Notification("✅ You enabled notifications!", {
                                body: "We’ll keep you updated with offers.",
                                icon: "/icon.png"
                            });
                        }
                    });
                }
            });
        </script>


    </body>

</html>
