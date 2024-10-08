<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .filter-white {
            filter: brightness(0) invert(1);
        }

        #icon {
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>
    @extends('navbar.product')

    @section('navbar')
    <div class="nav-content flex">

        <div id="content" class="w-full ml-96 mt-20">
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
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">S/N
                            </th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Nama
                                barang</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Harga
                            </th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">
                                Kategori</th>
                            <th class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">Stok
                            </th>
                            <th colspan="2"
                                class="px-2 py-3 border border-gray-300 text-center text-sm font-semibold text-gray-600">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr>
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->kategori->nama_kategori }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->stok_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">
                                <div class="flex justify-center space-x-2">
                                    <form action="{{ route('delete-data-barang', $item->id) }}" method="post" class="inline-flex items-center delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center delete-button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('edit-data-barang-user', $item->id) }}" class="text-green-500 hover:text-blue-700 flex items-center edit-button">
                                        <i class="fas fa-pencil-alt"></i>
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
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('.delete-form').submit();
                    }
                });
            });
        });

        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Ingin mengedit data ini?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.href;
                    }
                });
            });
        });

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            timer: 1000,
            showConfirmButton: false
        });
        @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            timer: 1000,
            showConfirmButton: false
        });
        @endif
    </script>
    @endsection
</body>

</html>
