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
        #icon{
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
            <button class="bg-blue-500 p-2 rounded ml-auto mt-[20px] text-white hover:bg-blue-600 block">
                <a href="{{ route('add-data-barang') }}">Add Product</a>
            </button>
            @if (Session::has('Success'))
                    <span class="text-red-500">{{ Session::get('success') }}</span>
                @endif
            @if (Session::has('Fail'))
                <span class="text-red-500">{{ Session::get('fail') }}</span>
            @endif
            <div class="overflow-x-auto">
                <table class=" w-full bg-white mt-[20px] border">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama barang</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Harga</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Stok</th>
                            <th colspan="2" class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>    
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->kategori_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->stok_barang }}</td>
                            <td colspan="2" class="text-center py-3 border border-gray-300">
                                   <form action="{{ route('delete-data-barang',$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Delete
                                    </button>
                                   </form>
                                   <a href="{{ route('edit-data-barang-user', $item->id) }}" class="action-btn">
                                    Edit
                                    </a>
                                
                                 
                                </div>
                                
                                
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9" class="text-center py-3 border border-gray-300">Tidak ada produk ditemukan!</td>
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
