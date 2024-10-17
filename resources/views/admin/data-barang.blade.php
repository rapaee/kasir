<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Product</title>
</head>
<body class="bg-blue-50">
    @extends('navbar-admin.data-barang')

    @section('navbar-admin')
    <div class="flex nav-content"></div>

    <div class="container mx-auto mt-10 flex justify-end">
        <div class="bg-white rounded-lg shadow-lg p-8 w-3/4">
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Product</h1>
            <div class="overflow-x-auto">
                <table class=" max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">S/N</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama Product</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Harga</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Kategori</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->kategori->nama_kategori }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->stok_barang }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center py-3 border border-gray-300">Tidak ada produk ditemukan!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
