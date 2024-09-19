<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @extends('layouts.navbar-admin.transaksi')
    @section('navbar-admin')
    <div class="flex">
        <div class="w-1/5 p-5 text-white">
            <!-- Tambahkan elemen navbar Anda di sini jika diperlukan -->
        </div>
    
        <div class="ml-96 w-4/5 p-10 fixed">
            <h1 class="text-5xl font-bold mb-6 mt-0">List Transaksi</h1>

           
           

            <div class="">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Nama Product</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Jumlah Product</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Sub Total</th>
                            
                        </tr>
                        </thead>
        </div>
    </div>
    @endsection
</body>
</html>