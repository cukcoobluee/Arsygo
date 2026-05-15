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
        Schema::table('hotel_bookings', function (Blueprint $table) {
            $table->enum('payment_status', ['unpaid', 'paid', 'expired'])->default('unpaid');
            $table->string('payment_method')->nullable();        
            $table->integer('payment_amount')->nullable();
            $table->string('payment_proof')->nullable(); // bukti foto
        });
    }

    public function down()
    {
        Schema::table('hotel_bookings', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'payment_method', 'payment_amount', 'payment_proof']);
        });
    }

};
