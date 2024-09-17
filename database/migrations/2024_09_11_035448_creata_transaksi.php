<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi'); // Kolom dengan auto_increment
            $table->bigInteger('id_kasir')->unsigned(); // Kolom tanpa auto_increment
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->decimal('harga', 8, 2);
            $table->timestamps();

            $table->foreign('id_kasir')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
