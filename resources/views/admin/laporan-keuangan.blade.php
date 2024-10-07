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
