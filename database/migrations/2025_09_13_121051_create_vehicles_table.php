<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('transmission', ['manual','matic'])->default('matic');
            $table->string('capacity'); // e.g. "2-4", "4-7"
            $table->decimal('price', 12, 2); 
            $table->boolean('has_driver')->default(false); // true => ada sopir
            $table->string('image')->nullable(); // path: storage/app/public/vehicles/...
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vehicles');
    }

};
