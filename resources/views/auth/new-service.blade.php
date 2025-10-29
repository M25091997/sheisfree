@extends('layouts.app')

@section('title', 'New Escort Service Add || Sheishere')

@push('head')
    <!-- FilePond core -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <!-- FilePond Image Preview plugin -->
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- Optional: File validation plugin -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <style>
        /* Full width and style tweaks */
        .filepond--root {
            width: 100% !important;
            max-width: 100% !important;
        }

        .filepond--drop-label {
            background: transparent !important;
            color: #6b7280;
            /* gray-500 */
        }

        .filepond--panel-root {
            background-color: transparent !important;
            border: none !important;
        }
    </style>
@endpush

@section('content')

    <form
        class="max-w-5xl mx-auto bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white rounded-2xl shadow-sm p-8 space-y-12">
        <!-- Profile Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white border-b pb-4">Upload Your Profile</h2>
            <p class="text-sm text-gray-500 dark:text-gray-300 mt-1">
                This information will be displayed publicly, so be careful what you share.
            </p>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter name"
                        class="mt-2 block w-full  rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
                </div>

                <!-- User Type -->
                <div>
                    <label for="userType" class="block text-sm font-medium text-gray-900 dark:text-white">User Type</label>
                    <select id="userType" name="userType"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white  focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40">
                        <option>Escort</option>
                        <option>Masseuse</option>
                        <option>Dominatrix</option>
                        <option>Companion</option>
                        <option>Adult Performer</option>
                        <option>Escort Agency</option>
                    </select>
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <select id="city" name="city"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40">
                        <option>Bangalore</option>
                        <option>Mumbai</option>
                        <option>Delhi</option>
                        <option>Chennai</option>
                        <option>Kolkata</option>
                    </select>
                </div>

                <!-- About -->
                <div class="sm:col-span-3">
                    <label for="about" class="block text-sm font-medium text-gray-900 dark:text-white">About</label>
                    <textarea id="about" name="about" rows="6" placeholder="Write a few sentences about yourself..."
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40"></textarea>
                </div>

                <!-- Cover Photo -->
                <div class="w-full mx-auto sm:col-span-3 border-gray-300">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Upload
                        Photos</label>

                    <div
                        class="mt-2 flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 px-6 py-10 text-center hover:border-indigo-400 transition bg-gray-50 dark:bg-gray-800">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-gray-400 dark:text-white mb-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v-9a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25l7.5 7.5L21 6" />
                        </svg>

                        <!-- FilePond input -->
                        <input type="file" class="filepond" name="images[]" multiple accept="image/*"
                            data-max-file-size="6MB" data-max-files="10" />

                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF — up to 6MB each (400×400px
                            recommended)</p>
                    </div>
                </div>
                {{-- <div class="sm:col-span-3">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-900">Cover Photo</label>
                    <div
                        class="mt-2 flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 px-6 py-10 text-center hover:border-indigo-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v-9a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25l7.5 7.5L21 6" />
                        </svg>
                        <label for="file-upload"
                            class="mt-4 cursor-pointer rounded-md bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-100">
                            Upload File
                            <input id="file-upload" type="file" name="file-upload" class="sr-only" />
                        </label>
                        <p class="mt-2 text-xs text-gray-500">PNG, JPG, GIF, up to 6MB (400×400px recommended)</p>
                    </div>
                </div> --}}
            </div>
        </section>

        <!-- Contact Info Section -->


        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white border-b pb-4">Contact Information</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Provide accurate details to receive notifications.</p>
            <!-- Phone Row 1 -->
            <div class="space-y-3 mb-5 mt-5">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Phone 1</label>
                <div class="flex flex-wrap items-center gap-3">
                    <select
                        class="rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500">
                        <option>+91</option>
                        <option>+1</option>
                        <option>+44</option>
                        <option>+61</option>
                    </select>
                    <input type="tel" placeholder="Enter valid phone no"
                        class="flex-1 min-w-[180px] rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />

                    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-900 dark:text-gray-300">
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-green-500" /> WhatsApp
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-green-400" /> WeChat
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-sky-500" /> Telegram
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-blue-600" /> Signal
                        </label>
                    </div>
                </div>
            </div>

            <!-- Phone Row 2 -->
            <div class="space-y-3 mb-5">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Phone 2</label>
                <div class="flex flex-wrap items-center gap-3">
                    <select
                        class="rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500">
                        <option>+91</option>
                        <option>+1</option>
                        <option>+44</option>
                        <option>+61</option>
                    </select>
                    <input type="tel" placeholder="Enter valid phone no"
                        class="flex-1 min-w-[180px] rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />

                    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-900 dark:text-gray-300">
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-green-500" /> WhatsApp
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-green-400" /> WeChat
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-sky-500" /> Telegram
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="checkbox" class="accent-blue-600" /> Signal
                        </label>
                    </div>
                </div>
            </div>

            <!-- Show Contact Form -->
            <div class="flex items-center gap-2 pt-4 border-t">
                <input id="show-contact" type="checkbox" class="accent-indigo-600">
                <label for="show-contact" class="text-sm text-gray-900 dark:text-gray-300">
                    Show contact form and send messages to:
                </label>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" placeholder="you@example.com"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- Website -->
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Website</label>
                <input type="url" placeholder="https://example.com"
                    class="mt-2 w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- OnlyFans -->
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                    OnlyFans <span class="text-red-500 text-xs font-semibold ml-1">new!</span>
                </label>
                <input type="url" placeholder="https://onlyfans.com/username"
                    class="mt-2 w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
            </div>


            <!-- Services -->
            <div class="mt-5 mb-5">
                <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">Select Services</h3>
                <ul
                    class="flex flex-wrap w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach (['Vue JS', 'React', 'Angular', 'Laravel'] as $service)
                        <li class="w-1/2 sm:w-1/4 border-b sm:border-b-0 border-gray-200 sm:border-r dark:border-gray-600">
                            <label class="flex items-center p-3 cursor-pointer">
                                <input type="checkbox" name="services[]"
                                    value="{{ strtolower(str_replace(' ', '_', $service)) }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-500">
                                <span class="ml-2">{{ $service }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>


            <!-- Pricing -->
            <div class="mt-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pricing</h3>

                <div class="space-y-4">
                    <!-- Incall -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center gap-3">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="pricing[incall][enabled]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-900 dark:text-gray-300">Incalls</span>
                        </label>

                        <div class="sm:col-span-2 grid grid-cols-[1fr_auto] gap-2">
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-500 dark:text-gray-300">$</span>
                                <input type="number" name="pricing[incall][amount]" placeholder="Enter amount"
                                    class="w-full pl-7 pr-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            </div>
                            <select name="pricing[incall][currency]"
                                class="px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                <option value="USD">USD</option>
                                <option value="INR">INR</option>
                            </select>
                        </div>
                    </div>

                    <!-- Outcall -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 items-center gap-3">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="pricing[outcall][enabled]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                            <span class="text-gray-900 dark:text-gray-300">Outcalls</span>
                        </label>

                        <div class="sm:col-span-2 grid grid-cols-[1fr_auto] gap-2">
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-500 dark:text-gray-300">$</span>
                                <input type="number" name="pricing[outcall][amount]" placeholder="Enter amount"
                                    class="w-full pl-7 pr-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            </div>
                            <select name="pricing[outcall][currency]"
                                class="px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                <option value="USD">USD</option>
                                <option value="INR">INR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>



            <div class="space-y-6 mt-5">
                <!-- Gender -->
                <div class="mt-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Your Gender (cannot be changed later)
                    </label>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="gender" value="male"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Male</span>
                        </label>

                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="gender" value="female"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Female</span>
                        </label>

                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="gender" value="transsexual" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Transsexual</span>
                        </label>
                    </div>
                </div>

                <!-- Orientation / Info Grid -->
                <div>
                    <label class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Orientation
                    </label>

                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="orientation" value="Heterosexual"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Heterosexual</span>
                        </label>

                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="orientation" value="Bisexual"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Bisexual</span>
                        </label>

                        <label class="flex items-center space-x-2 text-sm text-gray-900 dark:text-gray-300">
                            <input type="radio" name="orientation" value="Lesbian or Gay" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Lesbian or Gay</span>
                        </label>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Ethnicity -->
                    <div>
                        <label for="ethnicity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ethnicity</label>
                        <select id="ethnicity" name="ethnicity"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Ethnicity</option>
                        </select>
                    </div>

                    <!-- Height -->
                    <div>
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height
                            (cm)</label>
                        <input type="number" id="height" name="height" placeholder="170"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input type="number" id="age" name="age" placeholder="25"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    </div>

                    <!-- Bust -->
                    <div>
                        <label for="bust"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bust</label>
                        <select id="bust" name="bust"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Bust Size</option>
                        </select>
                    </div>

                    <!-- Hair Color -->
                    <div>
                        <label for="hair_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hair
                            Color</label>
                        <select id="hair_color" name="hair_color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Hair Color</option>
                        </select>
                    </div>

                    <!-- Nationality -->
                    <div>
                        <label for="nationality"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality</label>
                        <select id="nationality" name="nationality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Nationality</option>
                        </select>
                    </div>
                </div>
            </div>





            <div class="mb-10 mt-5">

                <!-- Languages Section -->
                <div>
                    <h2 class="text-lg font-semibold mb-4">Languages I speak</h2>

                    <!-- Language Row -->
                    <div class="space-y-4">
                        <div class="flex flex-wrap items-center gap-4">
                            <select
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 p-2.5">
                                <option>Select language...</option>
                                <option>English</option>
                                <option>Hindi</option>
                                <option>Spanish</option>
                            </select>

                            <div class="flex items-center gap-4 text-sm">
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="lang1" class="text-yellow-500 focus:ring-yellow-500" />
                                    Fluent
                                </label>
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="lang1" class="text-yellow-500 focus:ring-yellow-500" />
                                    Good
                                </label>
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="lang1" class="text-yellow-500 focus:ring-yellow-500" />
                                    Basic
                                </label>
                            </div>

                            <button type="button" class="text-gray-400 hover:text-red-400 transition"
                                title="Remove language">
                                🗑️
                            </button>
                        </div>
                    </div>

                    <button type="button"
                        class="mt-4 bg-blue-600 hover:bg-blue-500 text-black px-3 py-1 rounded font-medium">
                        + Add language
                    </button>
                </div>
            </div>

            <!-- Shaved -->
            <div">
                <label class="block mb-2 font-medium">Shaved</label>
                <div class="flex items-center gap-6 text-sm">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="shaved" class="text-yellow-500 focus:ring-yellow-500" />
                        No
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="shaved" class="text-yellow-500 focus:ring-yellow-500" />
                        Partially
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="shaved" class="text-yellow-500 focus:ring-yellow-500" />
                        Yes
                    </label>
                </div>
                </div>

                <!-- Smoke -->
                <div class="flex items-center gap-2 mt-2 mb-5">
                    <input type="checkbox" id="smoke" class="text-yellow-500 focus:ring-yellow-500" />
                    <label for="smoke" class="text-sm font-medium">I smoke</label>
                </div>

                <!-- Add Video -->
                <div class="dark:bg-gray-700 mb-3 p-5 rounded-lg space-y-3">
                    <h3 class="font-semibold text-lg mb-2">Add video (Optional)</h3>

                    <div class="flex flex-wrap gap-3 items-center">
                        <input type="text" placeholder="Video URL"
                            class="flex-grow bg-gray-800 border border-gray-700 text-white rounded-lg p-2.5 text-sm focus:ring-yellow-500 focus:border-yellow-500" />
                        <button type="button"
                            class="bg-yellow-600 hover:bg-yellow-500 text-black font-medium px-4 py-2 rounded">
                            Copy and paste full url here
                        </button>
                    </div>

                    <div class="flex gap-4 text-sm text-gray-400">
                        <span class="hover:text-white cursor-pointer">Vimeo</span>
                        <span class="hover:text-white cursor-pointer">Dailymotion</span>
                    </div>
                </div>

                <!-- X Posts -->
                <div class="dark:bg-gray-700 mb-3 p-5 rounded-lg space-y-3">
                    <h3 class="font-semibold text-lg mb-2">Show your X posts</h3>
                    <input type="text" placeholder="Put your X name here to show your recent posts"
                        class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-2.5 text-sm focus:ring-yellow-500 focus:border-yellow-500" />
                    <div class="flex justify-end">
                        <span class="text-gray-400 text-xl cursor-pointer hover:text-white">𝕏</span>
                    </div>
                </div>
                </div>






                <!-- Submit -->
                <div class="flex justify-end mt-5 gap-3">
                    <button type="submit"
                        class="rounded-lg bg-green-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:ring-4 focus:ring-indigo-400/50 transition">
                        Save Profile
                    </button>
                    <button type="reset"
                        class="rounded-lg bg-red-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-red-700 focus:ring-4 focus:ring-indigo-400/50 transition">
                        Cancel
                    </button>
                </div>
    </form>

    @push('script')
        <script>
            // Register FilePond plugins
            FilePond.registerPlugin(FilePondPluginImagePreview);

            // Initialize FilePond
            FilePond.create(document.querySelector('.filepond'), {
                allowMultiple: true,
                maxFiles: 10,
                maxFileSize: '6MB',
                acceptedFileTypes: ['image/*'],
                credits: false,
                labelIdle: `<span class="text-indigo-600 dark:text-blue-500 font-medium cursor-pointer">Click to upload</span> or drag & drop`,
            });
        </script>
    @endpush

@endsection
