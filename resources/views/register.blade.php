@extends('layouts.app')

@section('title', 'escort signup or register || Sheishere')

@section('content')

    <div class="text-center bg-gray-700 text-white py-3">
        <p class="text-sm md:text-base font-medium">
            Register as a user
        </p>
    </div>


    <section class="bg-gray-900 dark:bg-gray-900 min-h-screen flex flex-col md:flex-row">

        <!-- Left Side: Form -->
        <div class="w-full md:w-1/2 flex flex-col items-center justify-center px-6 py-8">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Register now, it's free!
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('user.store') }}" method="POST">
                        <div>
                            <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">User
                                Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required>
                            <p class="text-sm text-gray-400">Used on the forums</p>
                        </div>

                        <div>
                            <label for="email"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required>
                            <p class="text-sm text-gray-400">Never displayed, never shared </p>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <p class="text-sm text-gray-400">Do not use the same password as on the other sites! </p>
                        </div>
                        <div>
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>



                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                    I accept the
                                    <a class="text-sm font-medium text-yellow-600 hover:underline dark:text-yellow-500"
                                        href="#">Terms and Conditions</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Create an account
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="{{ route('login') }}"
                                class="text-sm font-medium text-yellow-600 hover:underline dark:text-yellow-500">Login
                                here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Side: Banner -->
        <div class="hidden md:block md:w-1/2">
            <p class="text-center text-white text-3xl pt-4">We know you want to! </p>
            <img src="{{ asset('storage/gallety/advertiseter-banner.png') }}" alt="banner"
                class="w-full h-screen object-cover">
        </div>
    </section>
@endsection
