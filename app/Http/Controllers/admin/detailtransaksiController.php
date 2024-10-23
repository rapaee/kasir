<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use Illuminate\Http\Request;

class detailtransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           // Mengambil data transaksi detail beserta relasi user, transaksi, dan produk dengan pagination
        $report = detail_transaksi::with(['transaksi.users', 'product']) // Menggunakan eager loading
                                ->paginate(10); // 10 transaksi per halaman
        
        // Mengirim data ke view
        return view('admin.detail-transaksi-dashboard', compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
