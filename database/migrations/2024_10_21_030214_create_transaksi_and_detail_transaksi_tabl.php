<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiv2AndDetailTransaksiv2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabel Transaksi
        Schema::create('transaksiv2', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi'); // Tanggal transaksi
            $table->foreignId('id_kasir')->constrained('users'); // Relasi ke tabel users untuk kasir
            $table->decimal('total', 15, 2); // Total harga dari transaksi
            $table->timestamps();
        });

        // Tabel Detail Transaksi
        Schema::create('detail_transaksiv2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksiv2')->constrained('transaksiv2')->onDelete('cascade'); // Relasi ke tabel transaksi
            $table->foreignId('id_product')->constrained('product'); // Relasi ke tabel product
            $table->integer('jumlah_barang'); // Jumlah barang yang dibeli
            $table->decimal('sub_total', 15, 2); // Subtotal = harga * jumlah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel detail_transaksiv2 terlebih dahulu karena ada foreign key
        Schema::dropIfExists('detail_transaksiv2');
        Schema::dropIfExists('transaksiv2');
    }
};
