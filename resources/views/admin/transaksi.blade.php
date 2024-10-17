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
    <div class="flex nav-content"></div>

    <div class="container mx-auto mt-10 flex justify-end">
        <div class="bg-white rounded-lg shadow-lg p-8 w-3/4">
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Transaksi</h1>
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
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Action</th>
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
                            <td class="px-4 py-3 border border-gray-300 text-center">
                                <div class="flex justify-center space-x-2">
                                    <form action="" method="post" class="inline-flex items-center delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center delete-button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                              
                            </td>
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
