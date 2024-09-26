<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new_product = Kasir::all();
        return view('user.data-kasir', [
            'new_product' => $new_product,
        ]);
    }
    public function viewAdminkasir()
    {
        $new_product = Kasir::all();
        return view('admin.data-kasir', [
            'new_product' => $new_product,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.in-ed.add-kasir');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input dari form
      $request->validate([
        'nama' => 'required|string',
        'nisn' => 'required|numeric',
     ]);

     try {
        // Membuat instance produk baru dan menyimpan data
        $new_product = new Kasir();
        $new_product->nama = $request->nama;
        $new_product->nisn = $request->nisn; 
        $new_product->save();

        // Redirect ke halaman data-barang dengan pesan sukses
        return redirect()->route('data-kasir.post')->with('success', 'Berhasil menambahkan produk');
     } catch (\Exception $e) {
        // Redirect kembali ke form tambah data dengan pesan error
        return redirect()->route('add-kasir')->with('fail', 'Gagal menambahkan produk: ' . $e->getMessage());
     }
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
    public function edit($id)
    {
        $dataKasir = Kasir::findOrFail($id);
        return view('admin.edit-data-kasir', compact('dataKasir'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required'
        ]);

        $data = [
            'nama' => $request ->input('nama'),
            'nisn' => $request -> input('nisn')
        ];

        Kasir::where('id',$id)->update($data);
        return redirect()->route('kasir-admin') ->with('success','Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id) {
    $dataKasir = Kasir::find($id);
    
    if ($dataKasir) {
        $dataKasir->delete();
        return redirect()->route('kasir-admin')->with('success', 'Data kasir berhasil dihapus.');
    } else {
        return redirect()->route('kasir-admin')->with('error', 'Data kasir tidak ditemukan.');
    }
}

}
