<?php

namespace App\Http\Controllers;
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
         'stok_barang' => 'required|integer',
     ]);
     
   }

   }