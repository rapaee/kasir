<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>

    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    @extends('layouts.navbar-admin.dashboard')

    @section('navbar-admin')
    <div class="nav-content flex">
        <div class="absolute list-none" style="right: 0; margin-right: 20px;">
            <li>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-lg text-black">
                    <img src="https://cdn-icons-png.flaticon.com/128/4400/4400629.png" alt="" class="w-8 h-8 mr-4 filter-black flex">
                    </x-responsive-nav-link>
                </form>
            </li>
        </div>

        <div id="content" class="flex items-center justify-center text-center ml-[600px] mt-80">
            <h1 class="text-5xl font-bold"></h1>
            <div class="animasi-teks">
                SMK NEGERI 1 BANTUL <span class="text-sky-400">CAFETARIA</span>
                <h1 class="text-5xl font-bold">HELLO ADMIN WELCOME TO CAFETARIA</h1>
            </div>
        </div>
    </div>

    <!-- SweetAlert Notifications -->
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif
    
    @endsection
</body>
</html>
