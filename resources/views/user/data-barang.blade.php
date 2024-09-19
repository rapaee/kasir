<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .filter-white {
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>
    @extends('layouts.navbar.product')

    @section('navbar')
    <div class="nav-content flex">

        <div id="content" class="w-full ml-96">
            <h1>Product</h1>
            <button class="bg-sky-400 p-2 rounded ml-auto mt-[20px] text-white hover:bg-sky-500 block">
                <a href="{{ route('add-data-barang') }}">Tambah Produk</a>
            </button>
            @if (session::has('Success'))
                    <span class="text-red-500">{{ session::get('success') }}</span>
                @endif
            <div class="overflow-x-auto">
                <table class=" w-full bg-white mt-[20px]">
                    <thead>
                        <tr>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">Nama barang</th>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">Harga</th>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">Stok</th>
                            <th class="px-2 py-2 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows go here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
