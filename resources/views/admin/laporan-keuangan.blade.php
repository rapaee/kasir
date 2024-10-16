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
                        class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-black" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                            <path d="M12 2l6 6h-4v8h-4V8H6z" />
                            <rect x="4" y="16" width="16" height="4" />
                        </svg>
                        Ekspor
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
