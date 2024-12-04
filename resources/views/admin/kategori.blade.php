<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Data Product</title>
</head>
<body class="bg-blue-50">
    @extends('navbar-admin.data-barang')

    @section('navbar-admin')
    <div class="flex nav-content"></div>

    <div class="container mx-auto flex justify-end">
        <div class="bg-white rounded-lg shadow-lg p-8 w-3/4">
            <a href="{{ route('data-barang-admin') }}"><i class="fa-solid fa-arrow-left-long"> </i></a>
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Kategori</h1>
            <div class="flex justify-end space-x-4 mb-4">
                <!-- Filter Buttons -->
                <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                    <a href="{{ route('add-kategori-admin') }}">Add Kategori</a>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">S/N</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama Kategori</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_kategori) && $new_kategori->count() > 0)
                        @foreach ($new_kategori as $item)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_kategori}}</td>
                            <td class="text-center py-3 border border-gray-300">
                                <div class="flex justify-center space-x-2">
                                    <form action="{{ route('delete-product-admin', $item->id) }}" method="post" class="inline-flex items-center delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 flex items-center delete-button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('edit-data-barang-admin', $item->id) }}" class="text-gray-500 hover:text-gray-700 flex items-center edit-button">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center py-3 border border-gray-300">Tidak ada produk ditemukan!</td>
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
