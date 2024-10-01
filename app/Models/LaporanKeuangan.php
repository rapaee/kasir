<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = "laporan_keuangan";

    // Kolom-kolom yang dapat diisi secara mass assignment
    protected $fillable = ["tanggal_laporan", "total_pendapatan"];
}
