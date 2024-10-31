<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>
<body class="h-screen bg-sky-500">
    <div class="flex h-full">
        <!-- Left Container -->
        <div class="flex-1 bg-sky-500 text-white flex flex-col justify-center items-center p-8">
            <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="">
            <h1 class="text-4xl font-bold">SMK NEGERI</h1>
            <h1 class="text-4xl font-bold">1 BANTUL</h1>
            <h1 class="text-4xl font-bold">KASIR APP</h1>
        </div>

        <!-- Right Container -->
        <div class="flex-1 bg-gray-100 flex justify-center items-center p-8">
            <div class="absolute top-0 right-0 mt-8 mr-4">
                <a href="{{ route('register') }}" class="border border-slate-900 rounded-lg p-4  hover:border-slate-400">Sign Up</a>
            </div>

            <!-- SweetAlert Notifications -->
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ session('success') }}',
                        timer: 3000,
                        showConfirmButton: false
                    })
                </script>
            @endif

            @if(session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: '{{ session('error') }}',
                        timer: 3000,
                        showConfirmButton: false
                    })
                </script>
            @endif

            @if(session('registerSuccess'))
    <script>
        Swal.fire({
            title: 'Registrasi Berhasil!',
            text: "{{ session('registerSuccess') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif


            <!-- Login Form -->
            <x-guest-layout>
                <h1 class="ml-32 mt-4 text-xl font-bold">LOGIN</h1>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('login') }}" class="p-8">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-start mt-4">
                        @if (Route::has('password.request'))
                        <a class="ml-2 underline text-sm text-sky-900 hover:text-sky-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
</body>
</html>
