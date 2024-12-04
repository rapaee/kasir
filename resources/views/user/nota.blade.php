<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
    <a href="{{ route('transaksi-user') }}"><i class="fa-solid fa-xmark"></i></a>
    <h1 class="text-center text-2xl font-bold mb-4">Nota Transaksi</h1>
    <div class="text-gray-600 text-sm mb-4">
        <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
        <p><strong>Nama Kasir:</strong>{{ auth()->user()->name }}</p>
    </div>

    <table class="w-full text-left text-sm mb-4">
        <thead>
            <tr>
                <td class="text-center py-3 font-semibold">No</td>
                <td class="text-center py-3 font-semibold">Product</td>
                <td class="text-center py-3 font-semibold">Jumlah</td>
                <td class="text-center py-3 font-semibold">Sub Total</td>
            </tr>
        </thead>
        <tbody>
            @if($transaksi->details && $transaksi->details->count())
                @foreach ($transaksi->details as $item)
                    <tr>
                        <td class="text-center py-3">{{ $loop->iteration }}</td>
                        <td class="text-center py-3">{{ $item->product->nama_barang }}</td>
                        <td class="text-center py-3">{{ $item->jumlah_barang }}</td> 
                        <td class="text-center py-3">{{ number_format($item->sub_total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="py-2 text-center">Tidak ada detail transaksi.</td>
                </tr>
            @endif
        </tbody>        
    </table>

    <div class="text-right font-bold text-lg">
        <p>Total: Rp. {{ number_format($transaksi->details->sum('sub_total'), 0, ',', '.') }}</p>
    </div>
    <div class="text-right font-bold text-lg">
        <p>Kembalian: {{ number_format($kembalian, 0, ',', '.') }}</p>
    </div>    
    <button onclick="window.print()" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg">Print Nota</button>
</div>

</body>
</html>
