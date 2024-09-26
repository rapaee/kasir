<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>
    @extends('layouts.navbar-admin.edit-data-kasir')

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
                <form action="{{ route('update-data-kasir-admin', $kasir->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="text-xl font-bold mb-8">Edit Data Kasir</h1>
                    <input type="hidden" name="user_id" value="{{ $kasir->id }}">
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukan Nama Anda" value="{{ $kasir->nama }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nama')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label for="nisn" class="block text-sm font-medium text-gray-700">Nisn:</label>
                        <input type="number" id="nisn" name="nisn" placeholder="Masukan Nisn Anda" value="{{ $kasir->nisn }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('nisn')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="text-right">
                        <a href="{{ route('kasir-admin') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">Cancel</a>
                        <input type="submit" value="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
    
   
</body>
</html>


