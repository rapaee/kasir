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
    @extends('navbar-admin.laporan-keuangan')

    @section('navbar-admin')
    <div class="nav-content flex">
        <div id="content" class="w-full ml-96">
            <h1 class="text-center mb-4 mt-10 font-semibold text-xl">Laporan Keuangan</h1>

            <div class="mt-8">
                <form id="filterForm" action="{{ route('laporan-keuangan-admin') }}" method="GET" class="flex items-center space-x-4">
                    <input type="date" name="tanggal" 
                        class="border border-gray-300 p-2 rounded-md w-full bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                        onchange="this.form.submit()">
                    
                    <!-- Tombol Ekspor dengan ikon -->
                    <button type="button" onclick="window.location.href='{{ route('export-laporan-keuangan') }}'" 
                        class="flex flex-col items-center bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mb-1">
                            <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                        <span>Eksport</span>
                    </button>




                </form>
            </div>
            
            <!-- Table for financial report -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white mt-[20px] border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if (!empty($report) && $report->count() > 0)
                                @foreach ($report as $item)
                                    <tr>
                                        <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                                        <td class="text-center py-3 border border-gray-300">{{ $item->tanggal_laporan }}</td>
                                        <td class="text-center py-3 border border-gray-300">{{ $item->total_pendapatan }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center py-3 border border-gray-300">Tidak ada data ditemukan!</td>
                                </tr>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
</body>
</html>
