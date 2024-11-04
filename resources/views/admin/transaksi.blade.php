<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-blue-50">
    @extends('navbar-admin.transaksi')

    @section('navbar-admin')
    <div class="container mx-auto flex justify-end mt-10">
        <div class="bg-white rounded-lg shadow-lg p-5 w-3/4">
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Transaksi</h1>

            <!-- Form Filter Tanggal -->
            <div class="flex justify-end mb-4">
                <form action="{{ route('transaksi-filter-admin') }}" method="GET" class="flex items-center space-x-2">
                    <input type="date" name="tanggal" 
                    class="border border-gray-300 p-2 rounded-md w-full bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                    onchange="this.form.submit()">
                </form>
                <!-- Tombol untuk Menampilkan Semua Transaksi -->
             <form action="{{  route('transaksi-filter-all') }}" method="GET">
            <input type="hidden" name="tanggal" value="all">
                <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Tampilkan Semua Transaksi
                </button>
            </form>
            </div>

            <!-- Table Transaksi -->
            <div class="overflow-x-auto">
                <table class="max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">No</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Tanggal</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">ID Transaksi</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Jumlah Barang</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama Barang</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($report as $data)
                            <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->transaksi->users->name }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->transaksi->tanggal }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->id_transaksi }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->jumlah_barang }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->product->nama_barang }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->sub_total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Tidak ada data transaksi ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $report->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
