<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
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
    <div class="nav-content flex justify-between">
        {{-- Navbar section --}}
        <div class="w-1/4">
            {{-- Konten navbar --}}
        </div>
    
        {{-- Main content section (Form berada di kanan) --}}
        <div id="content" class="flex flex-col h-screen w-9/12 fixed ml-96">
            <div class="p-2">
                <form action="{{ route('add-data-barang') }}" method="POST" class="">
                    @csrf
                    <h1 class="text-xl font-bold mb-8">Tambah Product</h1>
    
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Product:</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukan Nama Product" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nama_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                        <input type="number" id="harga" name="harga" placeholder="Masukan Harga" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('harga')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Masukan Jenis Kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('kategori_barang')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                        <input type="number" id="stok" name="stok" placeholder="Masukan Stok" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('stok_barang')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="text-right">
                        <input type="submit" value="Submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    
    
</body>
</html>