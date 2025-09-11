@extends('layouts.app')

@section('title', 'Login || Sheishere')

@section('content')

    <div class="flex flex-col md:flex-row items-center justify-center min-h-screen">

        <!-- Left: Login -->
        <div class="md:w-1/2 flex flex-col items-center justify-center p-6">
            <div
                class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-yellow-500 dark:bg-gray-700 dark:border-gray-600">
                                <label for="remember" class="ml-2 text-sm text-gray-500 dark:text-gray-300">Remember
                                    me</label>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-yellow-600 hover:underline dark:text-yellow-500">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Sign in
                        </button>

                        <!-- Sign up link -->
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Don’t have an account yet?
                            <a href="javascript:void(0);" id="openRegisterModal"
                                class="font-medium text-yellow-600 hover:underline dark:text-yellow-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Register Info -->
        <div class="md:w-1/2 flex flex-col items-center justify-center p-6">
            <div
                class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Not a member? <br> Register — it’s free 🎉
                    </h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-300 text-sm">
                        Create your free account today and explore everything Sheishere has to offer.
                    </p>

                    <div class="flex items-start justify-center text-center gap-6 mt-6">
                        <!-- User -->
                        <div class="w-1/2 flex flex-col items-center border-r border-gray-500 pr-6">
                            <h2 class="text-2xl font-semibold mb-6">User</h2>
                            <img src="{{ asset('storage/gallery/icon/male.png') }}" class="w-28 h-28 object-contain"
                                alt="User" />
                            <a href="{{ route('register') }}?type=user"
                                class="mt-4 inline-block w-full text-center text-white bg-yellow-600 hover:bg-yellow-700 font-medium rounded-lg text-sm px-5 py-2.5">
                                Register
                            </a>
                        </div>

                        <!-- Advertiser -->
                        <div class="w-1/2 flex flex-col items-center">
                            <h2 class="text-2xl font-semibold mb-6">Advertiser</h2>
                            <img src="{{ asset('storage/gallery/icon/influencer.png') }}" class="w-28 h-28 object-contain"
                                alt="Advertiser" />
                            <a href="{{ route('register') }}?type=advertiser"
                                class="mt-4 inline-block w-full text-center text-white bg-yellow-600 hover:bg-yellow-700 font-medium rounded-lg text-sm px-5 py-2.5">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Modal -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50">
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 rounded-lg shadow-lg relative p-6">
            <!-- Close -->
            <button id="closeRegisterModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
                ✕
            </button>

            <h1 class="text-xl font-bold text-gray-900 md:text-2xl dark:text-white">
                Not a member? <br> Register — it’s free 🎉
            </h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300 text-sm">
                Create your free account today and explore everything Sheishere has to offer.
            </p>

            <div class="flex items-start justify-center text-center gap-6 mt-6">
                <!-- User -->
                <div class="w-1/2 flex flex-col items-center border-r border-gray-500 pr-6">
                    <h2 class="text-2xl font-semibold mb-6">User</h2>
                    <img src="{{ asset('storage/gallery/icon/male.png') }}" class="w-28 h-28 object-contain"
                        alt="User" />
                    <a href="{{ route('register') }}?type=user"
                        class="mt-4 inline-block w-full text-center text-white bg-yellow-600 hover:bg-yellow-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Register
                    </a>
                </div>

                <!-- Advertiser -->
                <div class="w-1/2 flex flex-col items-center">
                    <h2 class="text-2xl font-semibold mb-6">Advertiser</h2>
                    <img src="{{ asset('storage/gallery/icon/influencer.png') }}" class="w-28 h-28 object-contain"
                        alt="Advertiser" />
                    <a href="{{ route('register') }}?type=advertiser"
                        class="mt-4 inline-block w-full text-center text-white bg-yellow-600 hover:bg-yellow-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#openRegisterModal").click(function() {
                $("#registerModal").removeClass("hidden");
            });

            $("#closeRegisterModal, #registerModal").click(function(e) {
                if (e.target.id === "registerModal" || e.target.id === "closeRegisterModal") {
                    $("#registerModal").addClass("hidden");
                }
            });
        });
    </script>
@endpush
