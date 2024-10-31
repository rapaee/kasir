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
            <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="Logo Sekolah" class="">
            <h1 class="text-4xl font-bold">SMK NEGERI 1 BANTUL</h1>
            <h2 class="text-3xl font-semibold mt-2">KASIR APP</h2>
        </div>

        <!-- Right Container -->
        <div class="flex-1 bg-gray-100 flex justify-center items-center p-8">
            <div class="w-full max-w-md">
                <!-- Link ke Halaman Login -->
                <div class="flex-1 bg-gray-100 flex justify-center items-center p-8">
                    <div class="absolute top-0 right-0 mt-8 mr-4">
                        <a href="{{ route('login') }}" class="border border-slate-900 rounded-lg p-4 hover:border-slate-400">Login</a>
                    </div>

                <!-- Form Register -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold mb-4 text-center">REGISTER</h1>

                    <form method="POST" action="{{ route('register') }}" class="p-12">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full border p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full border p-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full border p-2" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full border p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert Success Notification -->
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

    <!-- SweetAlert Error Notification -->
    @if($errors->any())
    <script>
        Swal.fire({
            title: 'Registrasi Gagal!',
            text: 'Periksa kembali data yang diinputkan!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
</body>
</html>
