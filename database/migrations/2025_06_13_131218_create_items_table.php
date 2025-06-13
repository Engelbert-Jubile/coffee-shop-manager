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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // Nama item
            $table->text('description')->nullable();         // Deskripsi item (opsional)
            $table->decimal('price', 12, 2);                 // Harga dengan 2 digit desimal
            $table->string('image')->nullable();             // Path gambar (jika ada)                         
            $table->timestamps();
            $table->softDeletes();                   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
