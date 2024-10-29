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
            filter: grayscale(100%);
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

@extends('navbar-admin.dashboard')

@section('navbar-admin')

<div class="nav-content flex flex-col min-h-screen p-4">
    <a href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left-long ml-96"> </i></a>
    <div class="flex justify-end mb-4">
        
        <!-- Tombol Pilih Bulan -->
        <!-- Tombol Pilih Bulan -->
        <button id="filterBulanButton" class="px-4 py-2 bg-green-800 text-white rounded hover:bg-green-800 mr-4">
            {{ session('selected_bulan') ? DateTime::createFromFormat('!m', session('selected_bulan'))->format('F') : 'Pilih Bulan' }}
        </button>        
        <!-- Dropdown bulan -->
        <div id="dropdownBulan" class="absolute mt-2 hidden bg-white border border-gray-300 rounded shadow-lg">
            <ul>
                @for ($i = 1; $i <= 12; $i++)
                    <li>
                        <form action="{{ route('laporan-keuangan-bulan-admin') }}" method="GET" class="bulanForm">
                            <input type="hidden" name="bulan" value="{{ $i }}">
                            <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 w-full text-left"
                                    data-bulan="{{ DateTime::createFromFormat('!m', $i)->format('F') }}">
                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                            </button>
                        </form>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    
    <!-- Pesan Sukses -->
    @if (Session::has('success'))
        <span class="text-green-500">{{ Session::get('success') }}</span>
    @endif

    <!-- Tabel untuk laporan keuangan -->
    <div class="overflow-x-auto mt-8">
        <table class="w-[1050px] mt-10 ml-96 max-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-300 text-blue-900">
                <tr>
                    <td class="text-center py-3 font-semibold">No</td>
                    <td class="text-center py-3 font-semibold">Id Detail Transaksi</td>
                    <td class="text-center py-3 font-semibold">Tanggal</td>
                    <td class="text-center py-3 font-semibold">Total Pendapatan</td>
                </tr>
            </thead>
            <tbody id="reportBody">
                <h2 class="text-center ml-96 mt-9 font-bold text-lg">Transaksi</h2>
                @if($report->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-3">Tidak ada data yang ditemukan.</td>
                    </tr>
                @else
                    @foreach ($report as $data)
                    <tr>
                        <td class="text-center py-3">{{ $loop->iteration }}</td>
                        <td class="text-center py-3">{{ $data->id_detail }}</td>
                        <td class="text-center py-3">{{ $data->tanggal_laporan }}</td>
                        <td class="text-center py-3">{{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>                
        </table>
    </div>        

<!-- Script untuk Memunculkan Dropdown Bulan dan Ganti Teks Tombol -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var filterBulanButton = document.getElementById('filterBulanButton');
        var dropdownBulan = document.getElementById('dropdownBulan');

        // Toggle visibility of the month dropdown when the button is clicked
        filterBulanButton.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownBulan.classList.toggle('hidden');
        });

        // Update the button text when a month is selected
        document.querySelectorAll('.bulanForm button').forEach(function(button) {
            button.addEventListener('click', function(event) {
                var selectedBulan = event.target.dataset.bulan;
                filterBulanButton.textContent = selectedBulan; // Update button text
                dropdownBulan.classList.add('hidden'); // Hide dropdown
                button.closest('form').submit(); // Submit the form
            });
        });

        // Hide the dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!filterBulanButton.contains(event.target) && !dropdownBulan.contains(event.target)) {
                dropdownBulan.classList.add('hidden');
            }
        });
    });
</script>


<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            timer: 1000,
            showConfirmButton: false
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            timer: 1000,
            showConfirmButton: false
        });
    @endif
</script>
@endsection

</body>
</html>
