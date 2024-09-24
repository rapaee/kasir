<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
     // Menentukan tabel yang digunakan jika tidak mengikuti konvensi default
     protected $table = "kasir";

     // Kolom-kolom yang dapat diisi secara mass assignment
     protected $fillable = ["nama", "nisn"];
}
