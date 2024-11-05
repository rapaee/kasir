<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .filter-black {
            filter: grayscale(100%); /* Mengubah gambar menjadi grayscale */
        }   
    </style>
</head>
<body>

    @extends('navbar.laporan-keuangan')

    @section('navbar')
    <div class="ml-96">
        <div id="fixed" class=" top-0 w-full p-5 bg-white shadow-md  justify-center items-center ">
            <h2 class="text-2xl font-bold justify-center items-center flex text-gray-800">Detail Laporan Transaksi</h2>
            <table class=" border-collapse mt-10 w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-3 px-4 border-b">ID Transaksi</th>
                        <th class="py-3 px-4 border-b">Nama Produk</th>
                        <th class="py-3 px-4 border-b">Jumlah</th>
                        <th class="py-3 px-4 border-b">Harga</th>
                        <th class="py-3 px-4 border-b">Total</th>
                        <th class="py-3 px-4 border-b">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 text-center">
                        <td class="py-3 px-4 border-b">{{ $transaksi->transaksi->id }}</td>
                        <td class="py-3 px-4 border-b">{{ $transaksi->product->nama_barang }}</td>
                        <td class="py-3 px-4 border-b">{{ $transaksi->jumlah_barang }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($transaksi->product->harga, 2) }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($transaksi->sub_total, 2) }}</td>
                        <td class="py-3 px-4 border-b">{{ $transaksi->transaksi->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
            {{-- Tabel transaksi --}}

            <a href="{{ route('laporan-keuangan-user') }}" class="mt-5 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-200">Kembali</a>
        </div>
    </div>
    @endsection

</body>
</html>
