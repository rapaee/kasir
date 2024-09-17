<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ ('style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="h-screen bg-sky-500">
    <div class="flex h-full">
        <!-- Left Container -->
        <div class="flex-1 bg-sky-500 text-white flex flex-col justify-center items-center p-8">
            <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="">
            <h1 class="text-4xl font-bold">SMK NEGERI</h1>
            <h1 class="text-4xl font-bold">1 BANTUL</h1>
            <h1 class="text-4xl font-bold">CAFETARIA APP</h1>
        </div>

        <!-- Right Container -->
        <div class="flex-1 bg-gray-100 flex justify-center items-center p-8">
           <div class="regis">
            <a href="{{ route('login') }}" class="border border-slate-900 rounded-lg p-4 hover:border-slate-400">Login</a>
           </div>
           <x-guest-layout>
            <h1 class="ml-28 mt-4 text-xl font-bold">REGISTER</h1>
            <form method="POST" action="{{ route('register') }}" class="p-7">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout>
        
        </div>
    </div>
</body>
</html>
