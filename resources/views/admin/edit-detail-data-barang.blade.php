<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Product</title>
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
            <div class="p-2">
                @if (session('fail'))
                    <span class="text-red-500">{{ session('fail') }}</span>
                @endif
                <form action="{{ route('update-data-barang', $barang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="text-xl font-bold mb-8">Edit Data Product Admin</h1>
                    
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Product</label>
                        <input type="text" id="nama" name="nama_barang" placeholder="Masukkan nama produk" value="{{ old('nama_barang', $barang->nama_barang) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nama_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
                        <input type="number" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('kode_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" id="harga" name="harga" placeholder="Masukkan harga" value="{{ old('harga', $barang->harga) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('harga')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                     
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Kategori </label>
                        <select id="kategori" name="id_kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('id_kategori', $barang->id_kategori) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                     
                    <div class="mb-4">
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" id="stok" name="stok_barang" placeholder="Masukkan stok" value="{{ old('stok_barang', $barang->stok_barang) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('stok_barang')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-right">
                        <a href="{{ route('detail-f&d-admin') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">Cancel</a>
                        <input type="submit" value="Update" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
