<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan jika tidak mengikuti konvensi default
    protected $table = "barang";

    // Kolom-kolom yang dapat diisi secara mass assignment
    protected $fillable = ["nama_barang", "harga", "kategori_barang", "stok_barang"];
}
