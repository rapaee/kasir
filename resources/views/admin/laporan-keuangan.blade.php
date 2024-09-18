<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Report</title>
</head>
<body>
    @extends('layouts.navbar-admin.laporan-keuangan')

    @section('nav-admin')
    <div class="nav-content flex justify-between items-center h-screen">
        <div class="ml-4">
            <!-- Tambahkan elemen navbar Anda di sini jika diperlukan -->
        </div>
    
        <div id="content" class="flex flex-col items-center justify-center text-center w-3/4">
            <h1 class="text-5xl font-bold">WELCOME TO ADMIN</h1>
            <div class="animasi-teks">
                SMK NEGERI 1 BANTUL <span class="text-sky-400">CAFETARIA</span>
                <h1 class="text-5xl font-bold">WELCOME TO ADMIN CANQU</h1>
            </div>
        </div>
    </div>
    @endsection
    
   
</body>
</html>
