<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        return view('admin.laporan-keuangan');
    }
    public function index1()
    {
        return view('user.laporan-keuangan');
    }
}
