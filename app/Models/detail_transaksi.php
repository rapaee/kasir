<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_transaksi',
        'id_barang', // Foreign key to Product (barang) table
        'jumlah_barang',
        'sub_total'
        
    ];

    // Define relationship to Product (Barang) model
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang', 'id');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }
}
