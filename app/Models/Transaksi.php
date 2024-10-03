<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'transaksi';

    protected $fillable = [
        'id_kasir',
        'id_barang', // Foreign key to Product (barang) table
        'harga',
        'jumlah_barang',
        'sub_total',
        'total_keseluruhan',
        'tanggal' // Assuming you have a 'tanggal' field for the transaction date
    ];

    // Define relationship to Kasir model
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }

    // Define relationship to Product (Barang) model
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }
}
