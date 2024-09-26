<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Data Kasir</title>
</head>
<body>
    @extends('layouts.navbar-admin.kasir')

    @section('navbar-admin')
    <div class="nav-content flex">
        <div id="content" class="w-full ml-96">
            <h1>Data Kasir</h1>
            @if (Session::has('Success'))
                <span class="text-red-500">{{ Session::get('success') }}</span>
            @endif
            <div class="overflow-x-auto">
                <table class="w-full bg-white mt-14 border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nisn</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nisn }}</td>
                            <td class="text-center py-2 border border-gray-300">
                                <form action="{{ route('delete-kasir-admin', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('edit-data-kasir-admin', $item->id) }}" class="action-btn">
                                       Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center py-3 border border-gray-300">Data Kasir Tidak Ditemukan!</td>
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
