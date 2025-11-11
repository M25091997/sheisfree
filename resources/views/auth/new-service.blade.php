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
                    <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Name
                    </label>
                    <input id="name" name="name" type="text" value="{{ old('name', $profile->name ?? '') }}"
                        placeholder="Enter name"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Type -->
                <div>
                    <label for="userType" class="block text-sm font-medium text-gray-900 dark:text-white">User Type</label>
                    <select id="userType" name="user_type"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white  focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40">
                        <option value="">Select...</option>
                        <option value="Escort">Escort</option>
                        <option value="Masseuse">Masseuse</option>
                        <option value="Dominatrix">Dominatrix</option>
                        <option value="Companion">Companion</option>
                        <option value="Adult Performer">Adult Performer</option>
                        <option value="Escort Agency">Escort Agency</option>
                    </select>
                    @error('user_type')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <select id="city" name="city"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40">
                        <option value="">Select...</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Kolkata">Kolkata</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('city')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- About -->
                <div class="sm:col-span-3">
                    <label for="about" class="block text-sm font-medium text-gray-900 dark:text-white">
                        About
                    </label>

                    <!-- Hidden textarea (for form submission) -->
                    <textarea id="about" name="about" class="hidden" rows="6">
        {{ old('about', $profile->about ?? '') }}
    </textarea>

                    <!-- Quill Editor Container -->
                    <div id="about-editor"
                        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700
               bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white"
                        style="min-height:150px;">
                    </div>

                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        Write a few sentences about yourself...
                    </p>

                    @error('about')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>


                <!-- Cover Photo -->
                <div class="w-full mx-auto sm:col-span-3 border-gray-300 mt-18">
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

                    @error('images')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
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
            <div id="phones-wrapper" class="space-y-5">

                <!-- Initial Phone Row -->
                <div class="phone-row space-y-3">
                    <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Phone</label>

                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Country Code -->
                        <select name="phone_code[]"
                            class="rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="+91">+91</option>
                            <option value="+1">+1</option>
                            <option value="+44">+44</option>
                            <option value="+61">+61</option>
                        </select>

                        <!-- Phone Number -->
                        <input type="tel" name="phone_number[]" placeholder="Enter valid phone no"
                            class="flex-1 min-w-[180px] rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />

                        <!-- Messaging App Checkboxes -->
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-900 dark:text-gray-300">
                            <label class="flex items-center gap-1">
                                <input type="checkbox" name="is_whatsapp[]" class="accent-green-500" /> WhatsApp
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="checkbox" name="is_wechat[]" class="accent-green-400" /> WeChat
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="checkbox" name="is_telegram[]" class="accent-sky-500" /> Telegram
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="checkbox" name="is_signal[]" class="accent-blue-600" /> Signal
                            </label>
                        </div>

                        <button type="button" class="remove-phone text-red-500 text-sm ml-2">🗑️</button>
                    </div>

                    @error('phone_number.0')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Add Phone Button -->
            <button type="button" id="add-phone-btn"
                class="mt-3 bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-sm">
                + Add Phone
            </button>
        </section>


        <section>
            <!-- Show Contact Form -->
            <div class="flex items-center gap-2 pt-4 border-t">
                <input id="show-contact" type="checkbox" class="accent-indigo-600">
                <label for="show-contact" class="text-sm text-gray-900 dark:text-gray-300">
                    Show contact form and send messages to:
                </label>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                    placeholder="you@gmail.com"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Website -->
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Website</label>
                <input type="url" name="website" value="{{ old('website', $profile->website ?? '') }}"
                    placeholder="https://example.com"
                    class="mt-2 w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
                @error('website')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- OnlyFans -->
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                    OnlyFans <span class="text-red-500 text-xs font-semibold ml-1">new!</span>
                </label>
                <input type="url" name="online_url" value="{{ old('online_url', $profile->online_url ?? '') }}"
                    placeholder="https://onlyfans.com/username"
                    class="mt-2 w-full rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-800 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500" />
                @error('online_url')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <!-- Services -->
            <div class="mt-5 mb-5">
                <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">Select Services</h3>
                <ul
                    class="flex flex-wrap w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach (\App\Models\ServiceType::where('is_active', true)->get() as $service)
                        <li class="w-1/2 sm:w-1/4 border-b sm:border-b-0 border-gray-200 sm:border-r dark:border-gray-600">
                            <label class="flex items-center p-3 cursor-pointer">
                                <input type="checkbox" name="services[]"
                                    value="{{ strtolower(str_replace(' ', '_', $service->name)) }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-500">
                                <span class="ml-2">{{ $service->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>


            <!-- Pricing -->
            <!-- Pricing -->
            <div class="mt-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Pricing</h3>

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
                                <option value="USD" {{ old('pricing.incall.currency') == 'USD' ? 'selected' : '' }}>USD
                                </option>
                                <option value="INR" {{ old('pricing.incall.currency') == 'INR' ? 'selected' : '' }}>INR
                                </option>
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
                                <option value="USD" {{ old('pricing.outcall.currency') == 'USD' ? 'selected' : '' }}>
                                    USD</option>
                                <option value="INR" {{ old('pricing.outcall.currency') == 'INR' ? 'selected' : '' }}>
                                    INR</option>
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
                            <input type="radio" name="gender" value="transsexual"
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                            <span>Transsexual</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
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
                    @error('orientation')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
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
                        @error('ethnicity')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Height -->
                    <div>
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height
                            (cm)</label>
                        <input type="number" name="height" id="height" name="height" placeholder="170"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                        @error('height')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input type="number" name="age" id="age" name="age" placeholder="25"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                        @error('age')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bust -->
                    <div>
                        <label for="bust"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bust</label>
                        <select id="bust" name="bust"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Bust Size</option>
                        </select>
                        @error('bust')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hair Color -->
                    <div>
                        <label for="hair_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hair
                            Color</label>
                        <select id="hair_color" name="hair_color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Hair Color</option>
                        </select>
                        @error('hair_color')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nationality -->
                    <div>
                        <label for="nationality"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality</label>
                        <select id="nationality" name="nationality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Select Nationality</option>
                        </select>
                        @error('nationality')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>




            <div class="mb-10 mt-5">

                <!-- Languages Section -->
                <div id="languages-section">
                    <h2 class="text-lg font-semibold mb-4">Languages I speak</h2>

                    <!-- Language Rows Container -->
                    <div id="language-rows" class="space-y-4">
                        <div class="flex flex-wrap items-center gap-4 language-row">
                            <select name="languages[0][language]"
                                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 p-2.5">
                                <option value="">Select language...</option>
                                <option value="English">English</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Spanish">Spanish</option>
                                <option value="French">French</option>
                                <option value="German">German</option>
                                <!-- Add more languages as needed -->
                            </select>

                            <div class="flex items-center gap-4 text-sm">
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="languages[0][fluency]" value="Fluent"
                                        class="text-yellow-500 focus:ring-yellow-500" />
                                    Fluent
                                </label>
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="languages[0][fluency]" value="Good"
                                        class="text-yellow-500 focus:ring-yellow-500" />
                                    Good
                                </label>
                                <label class="flex items-center gap-1">
                                    <input type="radio" name="languages[0][fluency]" value="Basic"
                                        class="text-yellow-500 focus:ring-yellow-500" />
                                    Basic
                                </label>
                            </div>

                            <button type="button" class="remove-language text-gray-400 hover:text-red-400 transition"
                                title="Remove language">
                                🗑️
                            </button>
                        </div>
                    </div>

                    <button type="button" id="add-language"
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


    @push('scripts')
        <!-- Quill CDN -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const aboutTextarea = document.querySelector('#about');
                const editorContainer = document.querySelector('#about-editor');

                // Initialize Quill
                const quill = new Quill(editorContainer, {
                    theme: 'snow',
                    placeholder: 'Write about yourself...',
                });

                // Set initial content
                quill.root.innerHTML = aboutTextarea.value;

                // Sync content to hidden textarea on change
                quill.on('text-change', function() {
                    aboutTextarea.value = quill.root.innerHTML;
                });

                // 🔄 Watch for theme changes (light <-> dark)
                const observer = new MutationObserver(() => {
                    const isDark = document.documentElement.classList.contains('dark');
                    editorContainer.style.backgroundColor = isDark ? '#1f2937' : '#ffffff';
                    editorContainer.style.color = isDark ? '#f9fafb' : '#111827';
                });
                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            });
        </script>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const addBtn = document.getElementById('add-language');
                const rowsContainer = document.getElementById('language-rows');
                let languageIndex = rowsContainer.querySelectorAll('.language-row').length;

                // Function to create a new language row
                function createLanguageRow(index) {
                    const div = document.createElement('div');
                    div.className = 'flex flex-wrap items-center gap-4 language-row';
                    div.innerHTML = `
            <select name="languages[${index}][language]"
                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 p-2.5">
                <option value="">Select language...</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
                <option value="German">German</option>
            </select>

            <div class="flex items-center gap-4 text-sm">
                <label class="flex items-center gap-1">
                    <input type="radio" name="languages[${index}][fluency]" value="Fluent" class="text-yellow-500 focus:ring-yellow-500" />
                    Fluent
                </label>
                <label class="flex items-center gap-1">
                    <input type="radio" name="languages[${index}][fluency]" value="Good" class="text-yellow-500 focus:ring-yellow-500" />
                    Good
                </label>
                <label class="flex items-center gap-1">
                    <input type="radio" name="languages[${index}][fluency]" value="Basic" class="text-yellow-500 focus:ring-yellow-500" />
                    Basic
                </label>
            </div>

            <button type="button" class="remove-language text-gray-400 hover:text-red-400 transition" title="Remove language">
                🗑️
            </button>
        `;
                    return div;
                }

                // Add new language row
                addBtn.addEventListener('click', () => {
                    languageIndex++;
                    const newRow = createLanguageRow(languageIndex);
                    rowsContainer.appendChild(newRow);
                });

                // Remove language row
                rowsContainer.addEventListener('click', (e) => {
                    if (e.target.classList.contains('remove-language')) {
                        const row = e.target.closest('.language-row');
                        if (row) row.remove();
                    }
                });
            });
        </script>



        <script>
            const phonesWrapper = document.getElementById('phones-wrapper');
            const addPhoneBtn = document.getElementById('add-phone-btn');

            addPhoneBtn.addEventListener('click', () => {
                const firstRow = phonesWrapper.querySelector('.phone-row');
                const newRow = firstRow.cloneNode(true);

                // Clear input values
                newRow.querySelectorAll('input').forEach(input => {
                    if (input.type === 'tel') input.value = '';
                    else input.checked = false;
                });

                // Update error message if needed
                newRow.querySelectorAll('p').forEach(p => p.remove());

                phonesWrapper.appendChild(newRow);
            });

            // Delegate remove button click
            phonesWrapper.addEventListener('click', e => {
                if (e.target.classList.contains('remove-phone')) {
                    const row = e.target.closest('.phone-row');
                    if (phonesWrapper.querySelectorAll('.phone-row').length > 1) {
                        row.remove();
                    }
                }
            });
        </script>
    @endpush



@endsection
