<?php

namespace App\Http\Controllers;
 


class BarangController extends Controller
{
   // Menampilkan form untuk tambah data
   public function create()
   {
      return view('user.in-ed.add-data-barang');
   }

   public function store()
   {
      
   }

   }