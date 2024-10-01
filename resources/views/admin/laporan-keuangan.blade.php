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

    @section('navbar-admin')
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
