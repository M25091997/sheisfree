@extends('layouts.app')

@section('title', 'User Profile || Sheishere')

@section('content')

    @php $user = Auth::user(); @endphp



    {{-- <body class="bg-gray-900 text-gray-100 min-h-screen"> --}}
    <div class="max-w-6xl mx-auto p-6">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-400 mb-6">
            <span class="hover:text-gray-200 cursor-pointer">Home</span> /
            <span class="hover:text-gray-200 cursor-pointer">User</span> /
            <span class="text-indigo-400">Settings</span>
        </div>

        <!-- Header -->
        <h2 class="text-2xl font-bold mb-6">Settings</h2>

        <!-- Tabs -->
        <div class="flex border-b border-gray-700 mb-6 overflow-x-auto">
            <button class="tab-btn px-4 py-2 text-indigo-400 border-b-2 border-indigo-400"
                data-tab="overview">Overview</button>
            <button class="tab-btn px-4 py-2 text-gray-400 hover:text-indigo-300"
                data-tab="totification">Notification</button>
            <button class="tab-btn px-4 py-2 text-gray-400 hover:text-indigo-300" data-tab="account">Account</button>
            <button class="tab-btn px-4 py-2 text-gray-400 hover:text-indigo-300" data-tab="invoice">Invoice</button>
            <button class="tab-btn px-4 py-2 text-gray-400 hover:text-indigo-300" data-tab="services">Services</button>
            <button class="tab-btn px-4 py-2 text-gray-400 hover:text-indigo-300" data-tab="escorts">Escorts</button>
        </div>

        <!-- Overview Tab Content -->

        <div id="overview" class="tab-content space-y-6">

            <!-- Profile Card -->
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-800 rounded-xl p-6 flex flex-col items-center justify-center">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture"
                        class="w-24 h-24 rounded-full border-4 border-gray-700 mb-4">
                    <h3 class="text-lg font-semibold uppercase">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-400 mb-2">Web Developer</p>
                    <span class="bg-green-600 text-xs px-2 py-1 rounded-md mb-4">Verified</span>
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-sm px-4 py-2 rounded-lg"><i
                            class="fas fa-edit    "></i> Edit</button>
                </div>

                <!-- Right Column (Timezone, Language, etc.) -->
                <div class="md:col-span-2 bg-gray-800 rounded-xl p-6">
                    <form class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Timezone</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2">
                                <option>UTC-08:00 - Pacific Standard Time (PST)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Language</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2">
                                <option>Choose your account type</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Date of Birth</label>
                            <input type="date" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Gender</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2">
                                <option>Choose your gender</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <button type="button"
                                class="mt-3 bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Personal Info -->
            <div class="bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Personal Information</h3>
                    <button class="bg-gray-700 hover:bg-gray-600 text-sm px-3 py-1 rounded-lg">Edit</button>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-400">Full name</p>
                        <p class="font-medium mb-4">{{ $user->name }}</p>

                        <p class="text-sm text-gray-400">About</p>
                        <p class="text-sm mb-4">
                            I am Joseph McFall, a fervent explorer navigating the intricate landscapes of web design,
                            driven by an unyielding passion for Web 3 and Artificial Intelligence.
                        </p>

                        <p class="text-sm text-gray-400 mb-2">Social</p>
                        <div class="flex space-x-3 text-xl text-gray-400">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-github"></i>
                        </div>

                        <p class="mt-4 text-sm text-gray-400">Location</p>
                        <p class="font-medium">California, USA</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-400">Email Address</p>
                        <p class="font-medium mb-4">{{ $user->email }}</p>

                        <p class="text-sm text-gray-400">Home Address</p>
                        <p class="font-medium mb-4">92 Miles Drive, Newark, NJ 07103, California</p>

                        <p class="text-sm text-gray-400">Phone</p>
                        <p class="font-medium mb-4">+1 234 567 890</p>

                        <p class="text-sm text-gray-400">Software Skills</p>
                        <div class="flex gap-2 mt-2 text-lg">
                            💻 🎨 🧠
                        </div>

                        <p class="mt-4 text-sm text-gray-400">Languages</p>
                        <p class="font-medium">English, French, Spanish</p>
                    </div>
                </div>
            </div>

        </div>

        <div id="projects" class="tab-content hidden">
            <h2 class="text-xl font-semibold mb-2">Projects</h2>
            <p class="text-gray-400">Your project details go here.</p>
        </div>

        <div id="account" class="tab-content hidden">
            <h2 class="text-xl font-semibold mb-2">Account</h2>
            <p class="text-gray-400">Account settings and preferences.</p>
        </div>
        <div id="service" class="tab-content hidden">
            <h2 class="text-xl font-semibold mb-2">Service</h2>
            <p class="text-gray-400"> + Add </p>
        </div>


        @push('script')
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/a2d9a64d56.js" crossorigin="anonymous"></script>
            <script>
                // Simple JS logic
                const tabs = document.querySelectorAll(".tab-btn");
                const contents = document.querySelectorAll(".tab-content");

                tabs.forEach((tab) => {
                    tab.addEventListener("click", () => {
                        // Remove active classes
                        tabs.forEach(t => t.classList.remove("text-indigo-400", "border-b-2", "border-indigo-400"));
                        tabs.forEach(t => t.classList.add("text-gray-400"));
                        contents.forEach(c => c.classList.add("hidden"));

                        // Add active state
                        tab.classList.add("text-indigo-400", "border-b-2", "border-indigo-400");
                        tab.classList.remove("text-gray-400");
                        document.getElementById(tab.dataset.tab).classList.remove("hidden");
                    });
                });
            </script>
        @endpush
    @endsection
