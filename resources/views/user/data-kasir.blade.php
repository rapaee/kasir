<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .filter-white {
            filter: brightness(0) invert(1);
        }
        #icon{
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>
    @extends('layouts.navbar.data-kasir')

    @section('navbar')
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
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nisn }}</td>
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
