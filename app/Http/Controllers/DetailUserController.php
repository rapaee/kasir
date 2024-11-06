<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailUserController extends Controller
{
    
    public function show($id)
{
    $transaksi = detail_transaksi::with('transaksi', 'product')->findOrFail($id);
    return view('user.detail-laporan', compact('transaksi'));
}
// public function notaa(){
//     $transaksi = Transaksi::with('detail_transaksi')->create([
//         'id_users' => Auth::id(),
//         'tanggal' => now(), // Tanggal transaksi
//     ]);

//     return view('user-notaa', compact('transaksi'));
// }
}
