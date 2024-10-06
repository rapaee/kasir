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
        'id_users',
        'tanggal',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users'); // id_kasir adalah foreign key di tabel transaksi
    }
    
}

