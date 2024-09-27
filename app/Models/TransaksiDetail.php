<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $table = "transaksi_detail";

    // Kolom-kolom yang dapat diisi secara mass assignment
    protected $fillable = ["nama_barang", "harga", "kategori_barang", "stok_barang"];
}
