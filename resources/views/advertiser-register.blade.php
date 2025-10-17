@extends('layouts.app')

@section('title', 'escort signup or register || Sheishere')

@section('content')

<div class="text-center bg-gray-700 text-white py-3">
    <p class="text-sm md:text-base font-medium">
        Escort Advertising for Independents and Agencies
    </p>
</div>


<section class="bg-gray-900 dark:bg-gray-900 min-h-screen flex flex-col md:flex-row">
    
    <!-- Left Side: Form -->
    <div class="w-full md:w-1/2 flex flex-col items-center justify-center px-6 py-8">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                   Register now, it's free!
                </h1>
                 <form class="space-y-4 md:space-y-6" action="{{ route('advertiser.store') }}" method="POST">
                   @csrf                    
                    <div class="mb-3">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" value="{{old('email')}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="name@gmail.com" required>
                               <p class="text-sm text-gray-400">Never displayed, never shared </p>
                                 @error('email')<span class="text-red-400 text-sm">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password"
                               placeholder="••••••••"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required>
                               <p class="text-sm text-gray-400">Do not use the same password as on the other sites! </p>
                                 @error('password')<span class="text-red-400 text-sm">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="••••••••"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required>
                    </div>
                     <div class="mb-3">
                        <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Display or view name on site</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="" required>
                               <p class="text-sm text-gray-400">Used on the forums</p>
                                 @error('name')<span class="text-red-400 text-sm">{{$message}}</span>@enderror
                    </div>
                    <div>
                       <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <!-- Individual -->
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input 
                id="horizontal-list-radio-license" 
                type="radio" 
                value="individual" 
                name="type" 
                {{ old('type') == 'individual' ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 
                       dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 
                       focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-license" 
                   class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Individual
            </label>
        </div>
    </li>

    <!-- Agency -->
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input 
                id="horizontal-list-radio-id" 
                type="radio" 
                value="agency" 
                name="type" 
                {{ old('type') == 'agency' ? 'checked' : '' }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 
                       dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 
                       focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-id" 
                   class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
               Escort Agency
            </label>
        </div>
    </li>
</ul>

  @error('type')<span class="text-red-400 text-sm">{{$message}}</span>@enderror
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" name="accept_condition"
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                   required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                I accept the 
                                <a class="text-sm font-medium text-yellow-600 hover:underline dark:text-yellow-500" href="#">Terms and Conditions</a>
                            </label>
                        </div>
                         
                    </div>
                     @error('accept_condition')<span class="text-red-400 text-sm">{{$message}}</span>@enderror
                    <button type="submit"
                            class="w-full text-white bg-yellow-600 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Create an account
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account?
                        <a href="{{route('login')}}" class="text-sm font-medium text-yellow-600 hover:underline dark:text-yellow-500">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Side: Banner -->
    <div class="md:w-1/2">
        <img src="{{ asset('storage/gallety/advertiseter-banner.png') }}" 
             alt="banner" 
             class="w-full h-screen object-cover">
    </div>
</section>
@endsection
