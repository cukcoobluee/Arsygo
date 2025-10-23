<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->boolean('has_driver')->default(false)->change();
        });
    }

    public function down(): void {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('has_driver')->nullable()->change(); // fallback
        });
    }
};

