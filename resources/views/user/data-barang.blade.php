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

<body class="bg-blue-50">
    @extends('navbar.product')

    @section('navbar')
    <div class="nav-content flex"></div>

    <div class="container mx-auto flex justify-end">
        <div id="content" class="bg-white rounded-lg shadow-lg p-5 w-3/4">
            <h1 class="text-center text-4xl font-bold text-blue-700">Product</h1>
            <div class="flex justify-between items-center space-x-4 mb-4">
                <!-- Search Form -->
                <div class="flex items-center">
                    <input 
                        type="text" 
                        placeholder="Search product..." 
                        class="border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:ring-blue-300"
                        id="search-input"
                    />
                    <script>
                        // Event listener untuk input pencarian
                        document.getElementById('search-input').addEventListener('input', function () {
                            const searchValue = this.value.toLowerCase(); // Ambil nilai input dan ubah ke huruf kecil
                            const rows = document.querySelectorAll('tbody tr'); // Ambil semua baris di tabel
                    
                            rows.forEach(row => {
                                const namaBarang = row.cells[1]?.innerText.toLowerCase(); // Ambil teks dari kolom nama barang
                                if (namaBarang.includes(searchValue)) { 
                                    row.style.display = ''; // Tampilkan baris jika cocok
                                } else {
                                    row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
                                }
                            });
                        });
                    </script>
                    
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white p-2 rounded ml-2 hover:bg-blue-600"
                    >
                        Search
                    </button>
                </div>
            
                <!-- Add Product Button -->
                <button class="bg-blue-500 p-2 rounded text-white hover:bg-blue-600">
                    <a href="{{ route('add-data-barang') }}">Add Product</a>
                </button>
            </div>
            
            @if (Session::has('Success'))
            <span class="text-red-500">{{ Session::get('success') }}</span>
            @endif
            @if (Session::has('Fail'))
            <span class="text-red-500">{{ Session::get('fail') }}</span>
            @endif

            <div class="overflow-x-auto">
                <table class="max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Kode Barang</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama barang</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Harga</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Stok</th>
                            <th colspan="2" class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($new_product->count() > 0)
                        @foreach ($new_product as $item)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="text-center py-3 border border-gray-300">{{ $item->kode_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->nama_barang }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->harga }}</td>
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
                                    <a href="{{ route('edit-data-barang-user', $item->id) }}" class="text-gray-500 hover:text-gray-700 flex items-center edit-button">
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

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $new_product->links() }}
                </div>
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

        "@if(session('success'))"
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            timer: 1000,
            showConfirmButton: false
        });
        "@elseif(session('error'))"
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            timer: 1000,
            showConfirmButton: false
        });
        "@endif"

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

        function filterTable(kategori) {
            let rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                let kategoriCell = row.cells[3].innerText; // Kolom kategori ada di indeks 3
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
    @endsection
</body>

</html>
