<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    @extends('layouts.navbar.transaksi')

    @section('navbar')
    <div class="nav-content flex">
        {{-- Sidebar Navbar --}}

        {{-- Main content section --}}
        <div id="content" class="ml-96 flex-1 flex flex-col items-start justify-start h-screen text-left p-8">
            <h2 class="text-2xl font-bold mb-4">Form Transaksi</h2>

            <form id="dynamicForm" action="/submit" method="POST" class="bg-white p-6 shadow-md rounded w-full">
                
                <!-- Input Nama Kasir -->
                <div class="input-group mb-4">
                    <label for="nama_kasir" class="block text-gray-700 font-semibold">Nama Kasir:</label>
                    <input type="text" id="nama_kasir" name="nama_kasir" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Input Barang Section -->
                <div class="grid grid-cols-4 gap-4 mb-4">
                    <!-- Input Nama Barang -->
                    <div class="input-group">
                        <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Product:</label>
                        <input type="text" id="nama_barang" name="nama_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <!-- Input Harga -->
                    <div class="input-group">
                        <label for="harga" class="block text-gray-700 font-semibold">Harga:</label>
                        <input type="number" id="harga" name="harga[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                    </div>
                    
                    <!-- Input Jumlah Barang -->
                    <div class="input-group">
                        <label for="jumlah" class="block text-gray-700 font-semibold">Jumlah:</label>
                        <input type="number" id="jumlah" name="jumlah[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                    </div>

                    <!-- Input Sub Total (readonly) -->
                    <div class="input-group">
                        <label for="sub_total" class="block text-gray-700 font-semibold">Sub Total:</label>
                        <input type="number" id="sub_total" name="sub_total[]" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                    </div>
                </div>
        
                <div id="newInputs"></div>
        
                <!-- Tombol untuk menambah input -->
                <button type="button" onclick="addInput()" class="bg-blue-500 text-white w-full py-2 rounded hover:bg-blue-600 transition-colors mb-4">Tambah Barang</button>
        
                <!-- Submit -->
                <input type="submit" value="Submit" class="bg-green-500 text-white w-full py-2 rounded hover:bg-green-600 transition-colors">
            </form>
        
            <script>
                let inputCount = 1;

                // Fungsi untuk menghitung Sub Total
                function calculateSubTotal(element) {
                    const inputGroup = element.closest('.grid'); // Mendapatkan div group input
                    const harga = inputGroup.querySelector('input[name="harga[]"]').value;
                    const jumlah = inputGroup.querySelector('input[name="jumlah_barang[]"]').value;
                    const subTotalInput = inputGroup.querySelector('input[name="sub_total[]"]');

                    if (harga && jumlah) {
                        subTotalInput.value = harga * jumlah;
                    } else {
                        subTotalInput.value = 0;
                    }
                }

                // Fungsi untuk menambah input baru
                function addInput() {
                    inputCount++; // Menambah counter untuk id input baru
        
                    const newInputDiv = document.createElement('div');
                    newInputDiv.classList.add('grid', 'grid-cols-4', 'gap-4', 'mb-4');

                    // Tambahkan input untuk Nama Barang, Harga, Jumlah Barang, dan Sub Total
                    newInputDiv.innerHTML = `
                        <div class="input-group">
                            <label for="nama_barang${inputCount}" class="block text-gray-700 font-semibold">Nama Product:</label>
                            <input type="text" id="nama_barang${inputCount}" name="nama_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="input-group">
                            <label for="harga${inputCount}" class="block text-gray-700 font-semibold">Harga:</label>
                            <input type="number" id="harga${inputCount}" name="harga[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                        </div>
                        <div class="input-group">
                            <label for="jumlah${inputCount}" class="block text-gray-700 font-semibold">Jumlah:</label>
                            <input type="number" id="jumlah_barang${inputCount}" name="jumlah[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                        </div>
                        <div class="input-group">
                            <label for="sub_total${inputCount}" class="block text-gray-700 font-semibold">Sub Total:</label>
                            <input type="number" id="sub_total${inputCount}" name="sub_total[]" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                        </div>
                    `;
        
                    document.getElementById('newInputs').appendChild(newInputDiv);
                }
            </script>
          
        </div>
    </div>
    
    @endsection
</body>
</html>
