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
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Product</h1>
            <div class="flex justify-end space-x-4 mb-4">
                <!-- Filter Buttons -->
                <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                    <a href="{{ route('add-kategori') }}">Kategori</a>
                </button>
                <button class="bg-blue-500 p-2 rounded ml-auto text-white hover:bg-blue-600">
                    <a href="{{ route('add-data-barang-admin') }}">Add Product</a>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">S/N</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama Product</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Harga</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Stok</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($new_product) && $new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->stok_barang }}</td>
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

    <script>
       document.addEventListener("DOMContentLoaded", function () {
    // Event listener untuk tombol hapus
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

    // Event listener untuk tombol edit
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

    // Notifikasi sukses atau error dari session
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: "{{ session('success') }}",
        timer: 1000,
        showConfirmButton: false
    });
    @elseif(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        timer: 1000,
        showConfirmButton: false
    });
    @endif

    // Filtering logic
    document.getElementById('filter-makanan').addEventListener('click', function () {
        filterTable('Makanan');
    });

    document.getElementById('filter-minuman').addEventListener('click', function () {
        filterTable('Minuman');
    });

    document.getElementById('reset-filter').addEventListener('click', function () {
        resetFilter();
    });
});

function filterTable(kategori) {
    let rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        let kategoriCell = row.cells[3].innerText;
        if (kategoriCell === kategori) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function resetFilter() {
    let rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
}

    </script>

</body>
</html>
