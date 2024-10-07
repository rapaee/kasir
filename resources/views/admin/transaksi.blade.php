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
        <div class="w-1/5 p-5 text-white">
            <!-- Tambahkan elemen navbar Anda di sini jika diperlukan -->
        </div>
    
        <div class="ml-80 w-4/5 p-10 fixed">
            <h1 class="text-center text-xl font-bold mb-6 mt-0">List Transaksi</h1>
            <div class="overflow-x-auto ml-7">
                <table class="w-full bg-white border">
                    <thead>

                        <tr>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">No</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Tanggal</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Id transaksi</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Jumalah Barang</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama Barang</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Sub Total</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($report as $data)
                        
                        <tr>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $loop->iteration }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->transaksi->users->name }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->transaksi->tanggal }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->id_transaksi }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->jumlah_barang }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->product->nama_barang }}</td>
                            <td class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">{{ $data->sub_total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    @endsection
</body>
</html>