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

        <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-gray-200 min-h-screen flex flex-col">

        <!-- Navbar -->
        @include('partials.navbar')

           @stack('explore')

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

        {{-- <script>
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
        </script> --}}

        
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const mobileBtn = document.getElementById("mobileMenuBtn");
        const navMenu = document.getElementById("navbarMenu");
        const profileBtn = document.getElementById("profileMenuBtn");
        const profileMenu = document.getElementById("profileMenu");

        // Mobile menu toggle
        if (mobileBtn) {
            mobileBtn.addEventListener("click", () => {
                navMenu.classList.toggle("hidden");
            });
        }

        // Profile dropdown toggle
        if (profileBtn) {
            profileBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                profileMenu.classList.toggle("hidden");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", (e) => {
                if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add("hidden");
                }
            });
        }
    });
</script>



<script>
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",         // 5 seconds
  "extendedTimeOut": "1000", // Extra time if hovered
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

       @if(session('success'))
            <script>
                toastr.success("{{ session('success') }}");
            </script>
            @endif

            @if(session('error'))
            <script>
                toastr.error("{{ session('error') }}");
            </script>
            @endif
    </body>

</html>
