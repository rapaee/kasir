<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        }
    </style>
</head>
<body>

    @extends('navbar.transaksi')

    @section('navbar')
    <div class="nav-content flex flex-col md:flex-row">
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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex justify-end">
                    <!-- Tombol untuk menambah input -->
                    <button type="button" onclick="addInput()" class="bg-blue-500 text-white w-48 px-8 py-2 rounded hover:bg-blue-600 transition-colors mb-2">
                        Tambah Barang
                    </button>
                </div>
                
                <!-- Input Barang Section -->
                <div class="grid grid-cols-5 gap-4 mb-4 relative">
                    <!-- Input Kode Barang -->
                    <div class="input-group">
                        <label for="kode_barang" class="block text-gray-700 font-semibold">Kode Barang:</label>
                        <input type="text" id="kode_barang" name="kode_barang[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="getNamaBarangByKode(this)">
                    </div>
                    
                    <!-- Input Nama Barang -->
                    <div class="input-group">
                        <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Barang:</label>
                        <input type="text" id="nama_barang" name="nama_barang[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
                    </div>
                    
                
                    <!-- Input Harga -->
                    <div class="input-group">
                        <label for="harga" class="block text-gray-700 font-semibold">Harga:</label>
                        <input type="number" id="harga" name="harga[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
                    </div>
                
                   <!-- Input Jumlah Barang -->
                    <div class="input-group">
                        <label for="jumlah" class="block text-gray-700 font-semibold">Jumlah:</label>
                        <input type="number" id="jumlah" name="jumlah_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
                    </div>

                    <!-- Input Sub Total -->
                    <div class="input-group">
                        <label for="sub_total" class="block text-gray-700 font-semibold">Sub Total:</label>
                        <input type="number" id="sub_total" name="sub_total[]" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                    </div>
                                    
                    <!-- Tombol Hapus Data -->
                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-2 rounded-full hover:bg-red-600" onclick="clearInputData(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <script>
                                    // Fungsi untuk menghapus data yang telah diisi, termasuk total keseluruhan
                    function clearInputData(button) {
                        const inputGroups = button.closest('.grid').querySelectorAll('input'); // Mengambil semua input dalam satu set
                        inputGroups.forEach(input => {
                            input.value = ''; // Mengosongkan nilai input
                        });

                        // Juga menghapus data di input total_keseluruhan
                        const totalKeseluruhan = document.getElementById('total_keseluruhan');
                        if (totalKeseluruhan) {
                            totalKeseluruhan.value = ''; // Mengosongkan total keseluruhan
                        }
                    }

    
                </script>                
                <div id="newInputs"></div>
                  <!-- Total Keseluruhan -->
            <div class="mt-6 flex justify-end w-full">
                    <div>
                        <label for="total_keseluruhan" class="block text-gray-700 font-semibold">Total Keseluruhan:</label>
                        <input type="number" id="total_keseluruhan" name="total_keseluruhan" readonly class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100">
                    </div>                   
            </div>
            <div class="mt-6 flex justify-end w-full">
                <div>
                    <label for="nominal" class="block text-gray-700 font-semibold">Nominal:</label>
                    <input type="number" id="nominal" name="nominal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>                   
            </div>
            
                <div class="mt-6 flex justify-end ">
                    <div class="">
                     
                        <!-- Submit -->
                        <input type="submit" value="Submit" class="bg-green-500 text-white w-56 py-2 rounded hover:bg-green-600 transition-colors mt-4">
                    
                </div>
                </div>
               
            </form>
            
          

            <script>
                
                function getNamaBarangByKode(input) {
                    const kodeBarang = input.value;

                    if (kodeBarang.length > 0) {
                        fetch(`/get-nama-barang/${kodeBarang}`)
                            .then(response => response.json())
                            .then(data => {
                                // Jika kode barang ditemukan
                                if (data.nama_barang) {
                                    document.getElementById('nama_barang').value = data.nama_barang;
                                } else {
                                    document.getElementById('nama_barang').value = ''; // Kosongkan jika tidak ditemukan
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        document.getElementById('nama_barang').value = ''; // Kosongkan jika input kosong
                    }
                }

                function getNamaBarangByKode(input) {
                    const kodeBarang = input.value;

                    if (kodeBarang.length > 0) {
                        fetch(`/get-barang-details/${kodeBarang}`)
                            .then(response => response.json())
                            .then(data => {
                                // Jika kode barang ditemukan
                                if (data.nama_barang && data.harga) {
                                    document.getElementById('nama_barang').value = data.nama_barang;
                                    document.getElementById('harga').value = data.harga;
                                } else {
                                    document.getElementById('nama_barang').value = ''; // Kosongkan jika tidak ditemukan
                                    document.getElementById('harga').value = ''; // Kosongkan jika tidak ditemukan
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        document.getElementById('nama_barang').value = ''; // Kosongkan jika input kosong
                        document.getElementById('harga').value = ''; // Kosongkan jika input kosong
                    }
                }
                // Fungsi untuk menghitung Sub Total
                    function calculateSubTotal(input) {
                        const harga = parseFloat(document.getElementById('harga').value) || 0;
                        const jumlah = parseFloat(input.value) || 0;

                        // Menghitung sub total
                        const subTotal = harga * jumlah;
                        input.closest('.input-group').nextElementSibling.querySelector('#sub_total').value = subTotal.toFixed(2);

                        // Menghitung total keseluruhan
                        calculateTotalKeseluruhan();
                    }

                    // Fungsi untuk menghitung Total Keseluruhan
                    function calculateTotalKeseluruhan() {
                        let totalKeseluruhan = 0;

                        // Loop untuk menghitung jumlah sub total
                        document.querySelectorAll('input[name="sub_total[]"]').forEach(function(subTotalInput) {
                            totalKeseluruhan += parseFloat(subTotalInput.value) || 0;
                        });

                        // Menampilkan total keseluruhan
                        document.getElementById('total_keseluruhan').value = totalKeseluruhan.toFixed(2);
                    }




              // Fungsi untuk menambah input barang baru
function addInput() {
    const container = document.getElementById('newInputs');
    const newInput = document.createElement('div');
    newInput.classList.add('grid', 'grid-cols-5', 'gap-4', 'mb-4', 'relative');

    // HTML untuk input barang baru (Kode Barang, Nama Barang, Harga, Jumlah, Subtotal)
    newInput.innerHTML = `
        <div class="input-group">
            <label for="kode_barang" class="block text-gray-700 font-semibold">Kode Barang:</label>
            <input type="text" name="kode_barang[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="getHargaByKode(this)">
        </div>
        <div class="input-group">
            <label for="nama_barang" class="block text-gray-700 font-semibold">Nama Barang:</label>
            <input type="text" name="nama_barang[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
        </div>
        <div class="input-group">
            <label for="harga" class="block text-gray-700 font-semibold">Harga:</label>
            <input type="number" name="harga[]" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
        </div>
        <div class="input-group">
            <label for="jumlah" class="block text-gray-700 font-semibold">Jumlah:</label>
            <input type="number" name="jumlah_barang[]" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" oninput="calculateSubTotal(this)">
        </div>
        <div class="input-group">
            <label for="sub_total" class="block text-gray-700 font-semibold">Sub Total:</label>
            <input type="number" name="sub_total[]" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
        </div>

        <!-- Icon Hapus -->
        <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-2 rounded-full hover:bg-red-600" onclick="removeInput(this)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    `;

    // Masukkan input baru ke dalam container
    container.appendChild(newInput);
}

// Fungsi untuk menghapus inputan
function removeInput(button) {
    const inputGroup = button.closest('div');
    inputGroup.remove();
}

// Fungsi untuk mendapatkan harga dan nama barang berdasarkan kode barang
function getHargaByKode(input) {
    const kodeBarang = input.value;

    if (kodeBarang.length > 0) {
        fetch(`/get-barang-details/${kodeBarang}`)
            .then(response => response.json())
            .then(data => {
                const parentDiv = input.closest('.grid');
                const namaBarangInput = parentDiv.querySelector('[name="nama_barang[]"]');
                const hargaInput = parentDiv.querySelector('[name="harga[]"]');

                if (data.nama_barang && data.harga) {
                    namaBarangInput.value = data.nama_barang;
                    hargaInput.value = data.harga;
                } else {
                    namaBarangInput.value = ''; // Kosongkan jika tidak ditemukan
                    hargaInput.value = ''; // Kosongkan jika tidak ditemukan
                }

                // Setelah harga diupdate, hitung sub total
                const jumlahInput = parentDiv.querySelector('[name="jumlah_barang[]"]');
                calculateSubTotal(jumlahInput);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        // Kosongkan nilai nama barang dan harga jika kode barang kosong
        const parentDiv = input.closest('.grid');
        parentDiv.querySelector('[name="nama_barang[]"]').value = '';
        parentDiv.querySelector('[name="harga[]"]').value = '';
    }
}

// Fungsi untuk menghitung Sub Total
function calculateSubTotal(input) {
    const parentDiv = input.closest('.grid');
    const harga = parseFloat(parentDiv.querySelector('[name="harga[]"]').value) || 0;
    const jumlah = parseFloat(input.value) || 0;

    // Menghitung sub total
    const subTotal = harga * jumlah;
    parentDiv.querySelector('[name="sub_total[]"]').value = subTotal.toFixed(2);

    // Menghitung total keseluruhan
    calculateTotalKeseluruhan();
}

// Fungsi untuk menghitung Total Keseluruhan
function calculateTotalKeseluruhan() {
    let totalKeseluruhan = 0;

    // Loop untuk menghitung jumlah sub total
    document.querySelectorAll('input[name="sub_total[]"]').forEach(function(subTotalInput) {
        totalKeseluruhan += parseFloat(subTotalInput.value) || 0;
    });

    // Menampilkan total keseluruhan
    document.getElementById('total_keseluruhan').value = totalKeseluruhan.toFixed(2);
}


            </script>
        </div>
    </div>
    @endsection
</body>
</html>
