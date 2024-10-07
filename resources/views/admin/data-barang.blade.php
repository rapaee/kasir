<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Product</title>
</head>
<body>
    @extends('layouts.navbar-admin.data-barang')

    @section('navbar-admin')
    <div class="flex nav-content">
        </div>
    
        <div class="ml-96 w-3/4 p-10 fixed">
            <h1 class="text-center text-xl font-bold mb-6 mt-0">List Product</h1>
            <div  class="overflow-x-auto">
                <table class="w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600 ">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600 ">Nama Product</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600 ">Harga</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600 ">Kategori</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600 ">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->kategori->nama_kategori }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->stok_barang }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9" class="text-center py-3 border border-gray-300">Tidak ada produk ditemukan!</td>
                        </tr>
                        @endif
                    </tbody>
        </div>
    </div>
    @endsection
    
   
</body>
</html>


