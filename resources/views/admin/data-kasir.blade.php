<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Kasir</title>
    <style>
          #icon{
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body>
    @extends('layouts.navbar-admin.kasir')

    @section('navbar-admin')
    <div class="nav-content flex">

        <div id="content" class="w-full ml-96">
            <h1>Data Kasir</h1>
            <button class="bg-blue-500 p-2 rounded ml-auto mt-[20px] text-white hover:bg-blue-600 block">
                <a href="{{ route('add-kasir') }}">Add Data</a>
            </button>
            @if (Session::has('Success'))
                    <span class="text-red-500">{{ Session::get('success') }}</span>
                @endif
            <div class="overflow-x-auto">
                <table class=" w-full bg-white mt-[20px] border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nisn</th>
                            <th colspan="2" class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nisn }}</td>
                            <td colspan="2" class="text-center py-3 border border-gray-300">
                                <div class="flex justify-center space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="/edit/{{ $item->id }}" class="text-blue-600 hover:underline">
                                        <div class="bg-yellow-400 p-2 w-16 flex items-center justify-center rounded">
                                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828911.png" alt="Edit Icon" id="icon" class="w-6 h-6">
                                        </div>
                                    </a>
                                    
                                    <!-- Tombol Delete -->
                                    <a href="/delete/{$id}" class="text-red-600 hover:underline">
                                        <div class="bg-red-500 p-2 w-16 flex items-center justify-center rounded">
                                            <img src="https://cdn-icons-png.flaticon.com/128/542/542724.png" alt="Delete Icon" id="icon" class="w-6 h-6">
                                        </div>
                                    </a>
                                </div>
                                
                                
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9" class="text-center py-3 border border-gray-300">Data Kasir Tidak Ditemukan!</td>
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
