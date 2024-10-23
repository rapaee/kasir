<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @extends('navbar-admin.dashboard')
    @section('navbar-admin')
    <div class="container mx-auto flex justify-end">
        <div class="bg-white rounded-lg shadow-lg p-5 w-3/4">
            <a href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left-long"> </i></a>
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">Detail Transaksi</h1>
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
                        @foreach ($report as $data)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->transaksi->users->name }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->transaksi->tanggal }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->id_transaksi }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->jumlah_barang }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->product->nama_barang }}</td>
                            <td class="px-4 py-3 border border-gray-300 text-center">{{ $data->sub_total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end mt-4">
                
                </div>
                   <!-- Pagination -->
                   <div class="mt-4">
                    {{ $report->links() }}
                </div>
            </div>
        </div>
    @endsection
</body>
</html>