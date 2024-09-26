<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .filter-white {
            filter: brightness(0) invert(1);
        }
        .animasi-teks {
            font-size: 30px;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            border-right: 2px solid white; /* Optional: Add a cursor effect */
            animation: animasi-teks 5s steps(70, end);
        }

        @keyframes animasi-teks {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    @extends('layouts.navbar.laporan-keuangan')

    @section('navbar')
    <div class="nav-content flex">

        <div id="content" class="w-full ml-96">
            <h1>Laporan Keuangan</h1>

            <!-- Container for Total Overall Revenue -->
            <div class="flex items-center justify-center mt-8">
                <div class="p-6 border border-gray-300 rounded-lg text-center w-72">
                    <h1 class="text-6xl font-bold"></h1>
                    <small class="block mt-2 text-gray-500">Total Overall Revenue</small>
                </div>
            </div>

            <!-- Button to add data -->
            <button class="bg-blue-500 p-2 rounded ml-auto mt-[20px] text-white hover:bg-blue-600 block">
                <a href="{{ route('add-kasir') }}">Add Data</a>
            </button>

            <!-- Success message -->
            @if (Session::has('Success'))
                <span class="text-red-500">{{ Session::get('success') }}</span>
            @endif

            <!-- Table for financial report -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white mt-[20px] border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Keterangan</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Pendapatan</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Laba Kotor</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Laba Bersih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content goes here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection

</body>
</html>
