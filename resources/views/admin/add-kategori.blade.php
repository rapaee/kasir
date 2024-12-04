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
    @extends('navbar-admin.data-barang')

    @section('navbar-admin')
    <div class="nav-content flex justify-between">
        {{-- Navbar section --}}
        <div class="w-1/4">
            {{-- Konten navbar --}}
        </div>
    
        {{-- Main content section (Form berada di kanan) --}}
        <div id="content" class="flex flex-col h-screen w-9/12 fixed ml-96">
            <div class="p-2 ">
                @if (session('fail'))
                    <span class="text-red-500">{{ session('fail') }}</span>
                @endif
                <form action="{{ route('add-kategori-store') }}" method="POST" class="ml-5 mt-10">
                    @csrf
                    <h1 class="text-xl font-bold mb-8">Tambah Kategori</h1>
    
                    <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Kategori:</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukan Nama Kategori" value="{{ old('nama_kategori') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nama_kategori')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

    
                    <div class="text-right">
                        <a href="{{ route('add-kategori') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">Cancel</a>
                        <input type="submit" value="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
