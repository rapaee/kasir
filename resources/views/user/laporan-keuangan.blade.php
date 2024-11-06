<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .filter-black {
            filter: grayscale(100%); /* Mengubah gambar menjadi grayscale */
        }   
    </style>
</head>
<body>

    @extends('navbar.laporan-keuangan')

    @section('navbar')
    <div class="nav-content flex flex-col min-h-screen">
    
    <div id="fixed" class="fixed top-0 ml-72 w-10/12 p-5 bg-white shadow-md flex justify-center items-center">

        <div id="content" class="w-full flex-1 ">
            <!-- Container untuk Total Pendapatan -->
            <div class="flex items-center justify-center mt-10 ">
                <div class="p-10 border border-gray-300 rounded-lg text-center">
                    <p class="text-4xl font-bold">
                        @if(request('tanggal') == 'all')
                            {{ $report->sum('sub_total') ? number_format($report->sum('sub_total'), 0, ',', '.') : '0' }}
                        @elseif(request('tanggal'))
                            {{ $report->sum('sub_total') ? number_format($report->sum('sub_total'), 0, ',', '.') : '0' }}
                        @else
                            0
                        @endif
                    </p>
                    <small class="block mt-2 text-gray-500">Total Pendapatan</small>
            
                  <!-- Form untuk menyimpan total pendapatan sesuai dengan tanggal yang dipilih -->
                 <!-- Button for Saving Total Pendapatan -->
                @if(request('tanggal') != 'all')
                <form action="{{ route('simpan-total-pendapatan') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                    <input type="hidden" name="total_pendapatan" value="
                        @if(request('tanggal') == 'all')
                            {{ $report->sum('sub_total') ? $report->sum('sub_total') : 0 }}
                        @elseif(request('tanggal'))
                            {{ $report->sum('sub_total') ? $report->sum('sub_total') : 0 }}
                        @else
                            0
                        @endif
                    ">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Simpan Total Pendapatan
                    </button>
                </form>
                @endif

            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var tanggalInput = document.getElementById('tanggalInput');
                // Cek apakah input sudah memiliki nilai
                if (!tanggalInput.value || tanggalInput.value === 'all') {
                    tanggalInput.value = '';
                }
            });
        </script>
        

        <!-- Date Picker dengan Auto Submit dan Tombol "Tampilkan Semua Transaksi" -->
        <div class="flex mt-8 p-2 ml-10 w-11/12">
            <form id="filterForm" action="{{ route('laporan-keuangan-filter') }}" method="GET" class="w-full">
                <input type="date" name="tanggal" 
                    class="border border-gray-300 p-2 rounded-md bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out w-full" 
                    onchange="this.form.submit()" 
                    id="tanggalInput"
                    value="{{ request('tanggal') && request('tanggal') != 'all' ? request('tanggal') : '' }}">
            </form>
            <!-- Tombol untuk Menampilkan Semua Transaksi -->
            <form action="{{ route('laporan-keuangan-user') }}" method="GET" class="ml-5">
                <input type="hidden" name="tanggal" value="all">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 ">
                    Semua
                </button>
            </form>
        </div>

    </div>
        </div>
        <!-- Pesan Sukses -->
        @if (Session::has('success'))
            <span class="text-green-500">{{ Session::get('success') }}</span>
        @endif
       
        <!-- Tabel untuk laporan keuangan -->
        <div class="overflow-x-hidden-auto mt-8">
            @if(request('tanggal') || request('tanggal') == 'all')
            <table class="w-9/12 bg-white mt-64  ml-96">
                <thead>
                    <tr>
                        <td class="text-center py-3 font-semibold">No</td>
                        <td class="text-center py-3 font-semibold">Kasir</td>
                        <td class="text-center py-3 font-semibold">Tanggal</td>
                        <td class="text-center py-3 font-semibold">ID Transaksi</td>
                        <td class="text-center py-3 font-semibold">Jumlah</td>
                        <td class="text-center py-3 font-semibold">Product</td>
                        <td class="text-center py-3 font-semibold">Sub Total</td>
                        <td class="text-center py-3 font-semibold">Detail</td>
                    </tr>
                </thead>
                <tbody>
                    <h2 class="text-center ml-96 mt-9 font-bold text-lg">Transaksi</h2>
                    @foreach ($report as $data)
                    <tr>
                        <td class="text-center py-3">{{ $loop->iteration }}</td>
                        <td class="text-center py-3">{{ $data->transaksi->users->name }}</td>
                        <td class="text-center py-3">{{ $data->transaksi->created_at }}</td>
                        <td class="text-center py-3">{{ $data->id_transaksi }}</td>
                        <td class="text-center py-3">{{ $data->jumlah_barang }}</td>
                        <td class="text-center py-3">{{ $data->product->nama_barang }}</td>
                        <td class="text-center py-3">{{ number_format($data->sub_total, 0, ',', '.') }}</td>
                        <td class="text-center py-3">
                                <a href=""><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>                
            </table>
            @endif
        </div>
    
</div>
<script>
    "@if(session('success'))"
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            timer: 1000,
            showConfirmButton: false
        });
    "@elseif(session('error'))"
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            timer: 1000,
            showConfirmButton: false
        });
    "@endif"
</script>
@endsection

</body>
</html>
