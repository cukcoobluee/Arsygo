<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('telepon')->after('nama');
            $table->integer('jumlah_peserta')->after('email');
            $table->text('catatan')->nullable()->after('jumlah_peserta');
            $table->string('status')->default('pending')->after('catatan');

            // opsional: hapus kolom jumlah_orang biar tidak bingung
            $table->dropColumn('jumlah_orang');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'jumlah_peserta', 'catatan', 'status']);
            $table->integer('jumlah_orang'); // restore kalau rollback
        });
    }

};
