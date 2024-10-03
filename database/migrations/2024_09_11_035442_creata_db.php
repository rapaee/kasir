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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->integer('nisn');
            $table->timestamps();
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_kategori');
            $table->timestamps();
        });

        Schema::create('barang', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_barang');
            $table->decimal('harga');
            // $table->string('kategori_barang');
            $table->bigInteger('id_kategori')->unsigned(); // Kolom tanpa auto_increment
            $table->integer('stok_barang');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id'); // Kolom dengan auto_increment
            $table->bigInteger('id_kasir')->unsigned(); // Kolom tanpa auto_increment
            $table->date('tanggal'); // Kolom untuk tanggal transaksi
            
            $table->timestamps();
        
            // Relasi ke tabel kasir
            $table->foreign('id_kasir')->references('id')->on('kasir')->onDelete('cascade');
            
            // Relasi ke tabel barang
        });
        
        Schema::create('detail_transaksi', function (Blueprint $table){
            $table->bigIncrements('id_transaksi')->unsigned(); // Kolom dengan auto_increment
            $table->bigInteger('id_barang')->unsigned(); // Kolom tanpa auto_increment
            $table->integer('jumlah_barang');
            $table->decimal('sub_total', 10, 2); // Kolom untuk subtotal
            
            $table->timestamps();
            $table->foreign('id_transaksi')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi'); 
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('kasir');
    }
};
