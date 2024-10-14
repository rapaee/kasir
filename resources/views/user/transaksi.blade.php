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
        @media (max-width: 768px) {
            #content {
                margin-left: 0;
                padding: 1rem;
            }
            .grid {
                grid-template-columns: 1fr;
            }
            .ml-[1160px] {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    @extends('navbar.transaksi')

    @section('navbar')
    <div class="nav-content flex flex-col md:flex-row">
        {{-- Sidebar Navbar --}}

        {{-- Main content section --}}
        <div id="content" class="md:ml-96 flex-1 flex flex-col items-start justify-start min-h-screen text-left p-4 md:p-8">
            <h2 class="text-2xl font-bold mb-4">Form Transaksi</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="dynamicForm" action="{{ route('transaksi-store') }}" method="POST" class="w-full">
                @csrf

                <!-- Input Barang Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <!-- Input Nama Barang -->
                    <div class="input-group">
                        <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Product:</label>
                        <select name="nama_barang[]" id="nama_barang_select" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" onchange="setHargaAndCalculateSubTotal(this)">
                            <option value="">Select</option>
                            @foreach ($nama_barang as $item)
                                @if ($item->stok_barang > 0)
                                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_barang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Input Harga -->
                    <div class="input-group">
                        <label for="harga" class="block text-gray-700 font-semibold">Harga:</label>
                        <input type="number" id="harga" name="harga[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
                    </div>
                    
                    <!-- Input Jumlah Barang -->
                    <div class="input-group">
                        <label for="jumlah" class="block text-gray-700 font-semibold">Jumlah:</label>
                        <input type="number" id="jumlah" name="jumlah_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
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
                <input type="submit" value="Submit" class="bg-green-500 text-white w-full py-2 rounded hover:bg-green-600 transition-colors mt-4">
            </form>
            
            <!-- Total Keseluruhan -->
            <div class="mt-6 flex justify-end w-full">
                <div>
                    <label for="total_keseluruhan" class="block text-gray-700 font-semibold">Total Keseluruhan:</label>
                    <input type="number" id="total_keseluruhan" name="total_keseluruhan" readonly
                        class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100">
                </div>
            </div>
            
            <script>
                // ... (JavaScript functions remain the same)
            </script>
        </div>
    </div>
    <script>
        // ... (SweetAlert script remains the same)
    </script>

    @endsection
</body>
</html>