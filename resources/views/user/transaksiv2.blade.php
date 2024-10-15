<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    @extends('navbar.transaksi')
    @section('navbar')
    <div class="nav-content flex ">
        <div class="ml-96 items-center justify-center min-h-screen bg-white">

            <!-- Tombol Filter -->
            <div class="flex space-x-2 mb-8">
                <button id="filter-semua" class="bg-gray-300 text-black py-2 px-4 rounded">
                    SEMUA
                </button>
                <button id="filter-makanan" class="bg-gray-300 text-black py-2 px-4 rounded">
                    MAKANAN
                </button>
                <button id="filter-minuman" class="bg-gray-300 text-black py-2 px-4 rounded">
                    MINUMAN
                </button>
            </div>

          <!-- Barang -->
            <div id="product-container" class="flex flex-wrap space-x-4 p-3">
                @if (!empty($nama_barang) && $nama_barang->count() > 0)
                @foreach ($nama_barang as $item)
                <div class="flex space-x-4 p-3" data-kategori="{{ $item->kategori->nama_kategori }}">
                    <div class="border p-4">
                        <img alt="{{ $item->nama_barang }}" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                        <div class="text-center">
                            <button class="tambah-btn bg-blue-500 text-white py-1 px-2 rounded" data-harga="{{ $item->harga }}" data-nama="{{ $item->nama_barang }}">
                                Tambah
                            </button>
                            <div class="font-bold">{{ $item->nama_barang }}</div>
                            <div>{{ $item->harga }}</div>
                            <div>{{ $item->kategori->nama_kategori }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>Tidak ada barang yang tersedia.</p>
                @endif
            </div>


            <!-- Total -->
            <div class="mt-8">
                <label for="total">Nama</label>
                <input type="text" id="total" class="bg-gray-400 w-full" value="0" readonly>
            </div>
            <div class="mt-8">
                <label for="total">Total</label>
                <input type="text" id="total" class="bg-gray-400 w-full" value="0" readonly>
            </div>
        </div>
    </div>

    <script>
        // Ambil semua tombol dengan class 'tambah-btn'
        const buttons = document.querySelectorAll('.tambah-btn');
        const totalInput = document.getElementById('total');

        // Inisialisasi total harga dan daftar nama barang
        let total = 0;
        let daftarBarang = [];

        // Tambahkan event listener ke setiap tombol
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                // Ambil harga dan nama barang dari atribut data
                const harga = parseInt(this.getAttribute('data-harga'));
                const namaBarang = this.getAttribute('data-nama');

                // Tambahkan harga ke total
                total += harga;

                // Tambahkan nama barang ke daftar
                daftarBarang.push(namaBarang);

                // Gabungkan nama barang dan total harga
                totalInput.value = daftarBarang.join(', ') + " | Total: " + total;
            });
        });
    </script>

    @endsection
</body>
</html>
