<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->string('kategori_trip')->nullable();
            $table->integer('jumlah_peserta');
            $table->integer('harga_per_orang');
            $table->integer('total_bayar');
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->string('bukti_pembayaran')->nullable(); // tempat upload screenshot
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
