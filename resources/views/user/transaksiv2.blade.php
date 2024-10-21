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
             
            <form action="" method="POST">
                @csrf
                 <!-- Total -->
               <div class="">
                <div class="mt-8">
                    <label for="total_nama">Nama</label><br>
                    <input type="text" id="total_nama" class="mt-3 bg-gray-400 p-2 rounded-lg w-full" name="total_nama" value="Belum memilih menu" readonly>
                </div>
               <div class="mt-8">
                    {{-- <label for="total">Total</label> --}}
                    <input type="hidden" id="total" class="bg-gray-400 w-full" name="total" value="0" readonly>
                </div>
            
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded mt-4">Next</button>
               </div>
                <!-- Barang -->
                <div id="product-container" class="flex flex-wrap space-x-4 p-3">
                    @if (!empty($nama_barang) && $nama_barang->count() > 0)
                    @foreach ($nama_barang as $item)
                    <div class="flex space-x-4 p-3" data-kategori="{{ $item->kategori->nama_kategori }}">
                        <div class="border p-6">
                        
                            <div class="text-center">
                                <div class="font-bold">{{ $item->nama_barang }}</div>
                                <div>Rp. {{ $item->harga }}</div>
                                <div>Stok {{ $item->stok_barang }}</div>
                                <div>{{ $item->kategori->nama_kategori }}</div>
                                <button type="button" class="tambah-btn bg-blue-500 text-white py-1 px-2 rounded" data-harga="{{ $item->harga }}" data-nama="{{ $item->nama_barang }}">
                                    Tambah
                                </button> 
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada barang yang tersedia.</p>
                    @endif
                </div>
            
               
            </form>
            
        </div>
    </div>

    <script>
         document.addEventListener('DOMContentLoaded', function() {
        const selectedItemsInput = document.getElementById('selected_items');
        const totalInput = document.getElementById('total');
        const totalNamaInput = document.getElementById('total_nama');
        let selectedItems = [];
        let totalHarga = 0;

        document.querySelectorAll('.tambah-btn').forEach(button => {
            button.addEventListener('click', function() {
                const namaBarang = this.getAttribute('data-nama');
                const hargaBarang = parseInt(this.getAttribute('data-harga'));

                // Update barang yang dipilih
                selectedItems.push({ nama: namaBarang, harga: hargaBarang });

                // Update total harga
                totalHarga += hargaBarang;

                // Update input hidden dan total
                selectedItemsInput.value = JSON.stringify(selectedItems);
                totalInput.value = totalHarga;
                totalNamaInput.value = selectedItems.map(item => item.nama).join(', ');
            });
        });
    });

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

        document.addEventListener('DOMContentLoaded', function() {
        const selectedItemsInput = document.getElementById('selected_items');
        const totalInput = document.getElementById('total');
        const totalNamaInput = document.getElementById('total_nama');
        let selectedItems = [];
        let totalHarga = 0;

        document.querySelectorAll('.tambah-btn').forEach(button => {
            button.addEventListener('click', function() {
                const namaBarang = this.getAttribute('data-nama');
                const hargaBarang = parseInt(this.getAttribute('data-harga'));

                // Update barang yang dipilih
                selectedItems.push({ nama: namaBarang, harga: hargaBarang });

                // Update total harga
                totalHarga += hargaBarang;

                // Update input hidden dan total
                selectedItemsInput.value = JSON.stringify(selectedItems);
                totalInput.value = totalHarga;
                totalNamaInput.value = selectedItems.map(item => item.nama).join(', ');
            });
        });

        // Filter produk berdasarkan kategori
        const productContainer = document.getElementById('product-container');
        const buttons = document.querySelectorAll('.tambah-btn');

        document.getElementById('filter-semua').addEventListener('click', function() {
            filterProduct('SEMUA');
        });

        document.getElementById('filter-makanan').addEventListener('click', function() {
            filterProduct('MAKANAN');
        });

        document.getElementById('filter-minuman').addEventListener('click', function() {
            filterProduct('MINUMAN');
        });

        function filterProduct(kategori) {
            const products = productContainer.querySelectorAll('div[data-kategori]');
            products.forEach(product => {
                const productKategori = product.getAttribute('data-kategori').toUpperCase();
                if (kategori === 'SEMUA' || productKategori === kategori) {
                    product.style.display = 'flex'; // Tampilkan produk yang sesuai
                } else {
                    product.style.display = 'none'; // Sembunyikan produk yang tidak sesuai
                }
            });
        }
    });
    </script>

    @endsection
</body>
</html>
