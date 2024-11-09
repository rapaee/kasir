<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>
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
    @extends('navbar-admin.dashboard')

    @section('navbar-admin')
    <div class="nav-content flex justify-between">
        {{-- Navbar section --}}
        <div class="w-1/4">
            {{-- Konten navbar --}}
        </div>
    
        {{-- Main content section (Form berada di kanan) --}}
        <div id="content" class="flex flex-col h-screen w-8/12 fixed ml-96">
            <div class="p-2 ">
                @if (session('fail'))
                    <span class="text-red-500">{{ session('fail') }}</span>
                @endif
                <form action="{{ route('add-detail-data-barang-store') }}" method="POST">
                    @csrf
                    <h1 class="text-xl font-bold mb-8">Tambah Produk</h1>
    
                    <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Produk" value="{{ old('nama_barang') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nama_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang:</label>
                        <input type="number" id="kode_barang" name="kode_barang" placeholder="Masukan Harga" value="{{ old('kode_barang') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('kode_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                        <input type="number" id="harga" name="harga" placeholder="Masukan Harga" value="{{ old('harga') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('harga')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="kategori_barang" class="block text-sm font-medium text-gray-700">Kategori:</label>
                        <select id="kategori_barang" name="kategori_barang" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Kategori Produk</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_barang') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    
                    <div class="mb-6">
                        <label for="stok_barang" class="block text-sm font-medium text-gray-700">Stok:</label>
                        <input type="number" id="stok_barang" name="stok_barang" placeholder="Masukan Stok Produk" value="{{ old('stok_barang') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('stok_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="text-right">
                        <a href="{{ route('detail-f&d-admin') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">Cancel</a>
                        <input type="submit" value="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
