<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;


class BarangController extends Controller
{
   // Menampilkan form untuk tambah data
   public function create()
   {
      return view('user.in-ed.add-data-barang');
   }

   public function store(request $request)
   {
      $request->validate([
         'nama_barang' => 'required|string',
         'harga' => 'required|integer',
         'kategori_barang' => 'required|string',
     ]);
   //  try {
   //    $new_product = new product;
   //    $new_product -> nama_barang = $request -> nama_barang; 
   //    $new_product -> harga = $request -> harga; 
   //    $new_product -> kategori_barang = $request -> kategori_barang; 
   //    $new_product -> nama_barang = $request -> nama_barang; 
   //    $new_product -> save(); 
   //    return redirect()->with('Succes','Berhasil menambhkan product')
   //  } catch (\Exception $e) {
   //    //throw $th;
   //  }
   }

   }