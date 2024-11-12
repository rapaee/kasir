<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\DetailTransaksi; // Pastikan penulisan nama model benar
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class DetailUserController extends Controller
{
    // Fungsi untuk menampilkan detail transaksi berdasarkan ID transaksi
    public function show($id)
    {
        // Mengambil semua detail transaksi dengan ID transaksi yang sama
        $transaksiDetails = detail_transaksi::with('transaksi.users', 'product')
            ->where('id', $id)
            ->get();

        return view('user.detail-laporan', compact('transaksiDetails')); // Pastikan menggunakan 'transaksiDetails'
    }

    // Fungsi untuk membuat transaksi baru dan mengambil detailnya
    public function notaa()
    {
        $transaksi = Transaksi::create([
            'id_users' => Auth::id(),
            'tanggal' => now(), // Tanggal transaksi
        ]);

        // Memuat detail transaksi yang baru saja dibuat
        $transaksi->load('detail_transaksi'); // Menggunakan load untuk memuat relasi

        return view('user-notaa', compact('transaksi')); // Di sini menggunakan 'transaksi'
    }
}
