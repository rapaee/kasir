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
    <div class="nav-content flex justify-between items-center h-screen">
        <div class="ml-4">
            <!-- Tambahkan elemen navbar Anda di sini jika diperlukan -->
        </div>

        <div id="content" class="flex flex-col items-center justify-center text-center w-3/4">
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
