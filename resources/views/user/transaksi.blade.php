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
                // Fungsi untuk mengatur harga sesuai pilihan produk dan menghitung subtotal
                function setHargaAndCalculateSubTotal(selectElement) {
                    const inputGroup = selectElement.closest('.grid'); // Mendapatkan div group input
                    const hargaInput = inputGroup.querySelector('input[name="harga[]"]'); 
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    const harga = selectedOption.getAttribute('data-harga');
            
                    // Mengatur nilai harga pada input harga
                    hargaInput.value = harga ? harga : '';
            
                    // Panggil fungsi untuk menghitung subtotal jika jumlah sudah diisi
                    const jumlahInput = inputGroup.querySelector('input[name="jumlah_barang[]"]');
                    if (jumlahInput.value) {
                        calculateSubTotal(jumlahInput);
                    }
                }
            
                // Fungsi untuk menghitung subtotal (harga * jumlah) dan total keseluruhan
                function calculateSubTotal(jumlahInput) {
                    const inputGroup = jumlahInput.closest('.grid'); // Mendapatkan div group input
                    const hargaInput = inputGroup.querySelector('input[name="harga[]"]');
                    const subTotalInput = inputGroup.querySelector('input[name="sub_total[]"]');
            
                    const harga = parseFloat(hargaInput.value);
                    const jumlah = parseFloat(jumlahInput.value);
            
                    // Pastikan harga dan jumlah memiliki nilai sebelum menghitung subtotal
                    if (!isNaN(harga) && !isNaN(jumlah)) {
                        const subTotal = harga * jumlah;
                        subTotalInput.value = subTotal;
                    } else {
                        subTotalInput.value = ''; // Kosongkan jika tidak ada harga atau jumlah
                    }
            
                    // Setelah menghitung subtotal, hitung total keseluruhan
                    calculateTotalKeseluruhan();
                }
            
                // Fungsi untuk menghitung total keseluruhan
                function calculateTotalKeseluruhan() {
                    const subTotalInputs = document.querySelectorAll('input[name="sub_total[]"]');
                    let total = 0;
            
                    subTotalInputs.forEach(input => {
                        const nilai = parseFloat(input.value);
                        if (!isNaN(nilai)) {
                            total += nilai;
                        }
                    });
            
                    document.getElementById('total_keseluruhan').value = total;
                }
            
                let inputCount = 1;
            
                // Fungsi untuk menambah group input baru
                function addInput() {
                    const newInputGroup = `
                        <div class="grid grid-cols-4 gap-4 mb-4">
                            <!-- Input Nama Barang -->
                            <div class="input-group">
                                <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Product:</label>
                                <select name="nama_barang[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" onchange="setHargaAndCalculateSubTotal(this)">
                                    <option value="">Select</option>
                                    @foreach ($nama_barang as $item)
                                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <!-- Input Harga -->
                            <div class="input-group">
                                <label for="harga" class="block text-gray-700 font-semibold">Harga:</label>
                                <input type="number" name="harga[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
                            </div>
            
                            <!-- Input Jumlah Barang -->
                            <div class="input-group">
                                <label for="jumlah" class="block text-gray-700 font-semibold">Jumlah:</label>
                                <input type="number" name="jumlah_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                            </div>
            
                            <!-- Input Sub Total (readonly) -->
                            <div class="input-group">
                                <label for="sub_total" class="block text-gray-700 font-semibold">Sub Total:</label>
                                <input type="number" name="sub_total[]" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                            </div>
                        </div>`;
                    
                    // Tambahkan group input baru ke dalam form
                    document.getElementById('newInputs').insertAdjacentHTML('beforeend', newInputGroup);
                }
            </script>
        </div>
    </div>
    <scriptpt>
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
    </scriptpt>
        </div>
    </div>

    @endsection
</body>
</html>