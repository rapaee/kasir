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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail');
            $table->bigInteger('id_transaksi')->unsigned(); // Kolom untuk foreign key
            $table->bigInteger('id_barang')->unsigned();
            $table->integer('jumlah_barang');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        
            // Menghubungkan id_transaksi ke id_transaksi di tabel transaksi
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
    }
};
