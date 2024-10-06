<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
         .filter-black {
            filter: grayscale(100%); /* Mengubah gambar menjadi grayscale */
        }   
    </style>
</head>
<body>

    @extends('layouts.navbar.laporan-keuangan')

    @section('navbar')
    <div class="nav-content flex flex-col min-h-screen">
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
    
        <div id="content" class="w-full flex-1 ml-0 ">
            <!-- Container for Total Overall Revenue -->
            <div class="flex items-center justify-center mt-20 ml-72">
                <div class="p-6 border border-gray-300 rounded-lg text-center w-72">
                    <p class="text-4xl font-bold">
                        {{ $report->sum('sub_total') ? number_format($report->sum('sub_total'), 0, ',', '.') : '0' }}
                    </p>
                    <small class="block mt-2 text-gray-500">Total Pendapatan</small>
                </div>
            </div>
    
            <!-- Date Picker with Auto Submit -->
            <div class="flex justify-center mt-8">
                <form id="filterForm" action="{{ route('laporan-keuangan') }}" method="GET" class="flex w-full">
                    <input type="date" name="tanggal" 
                        class="border border-gray-300 p-2 rounded-md ml-96 w-full bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out" 
                        onchange="this.form.submit()">
                </form>
            </div>
    
            <!-- Success message -->
            @if (Session::has('Success'))
                <span class="text-red-500">{{ Session::get('success') }}</span>
            @endif
           
            <!-- Table for financial report -->
            <div class="overflow-x-auto mt-8">
              
                <table class="w-[1430px] bg-white mt-10 ml-96">
                    <tbody>
                        <h2 class="text-center ml-72 mt-9 font-semibold text-lg">Transaksi</h2>
                        @foreach ($report as $data)
                        
                        <tr>
                            <td class="text-center py-3">{{ $loop->iteration }}</td>
                            <td class="text-center py-3">{{ $data->transaksi->users->name }}</td>
                            <td class="text-center py-3">{{ $data->transaksi->tanggal }}</td>
                            <td class="text-center py-3">{{ $data->id_transaksi }}</td>
                            <td class="text-center py-3">{{ $data->jumlah_barang }}</td>
                            <td class="text-center py-3">{{ $data->product->nama_barang }}</td>
                            <td class="text-center py-3">{{ $data->sub_total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @endsection

</body>
</html>
