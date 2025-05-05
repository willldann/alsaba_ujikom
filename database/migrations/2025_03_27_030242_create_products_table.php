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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama produk
            $table->string('category')->nullable(); // Kategori produk
            $table->decimal('price', 12, 0); // Harga produk (tanpa desimal, cocok untuk Rupiah)
            $table->string('image')->nullable(); // Gambar produk
            $table->decimal('weight', 8, 2)->default(0);  // 8 digits in total, 2 decimal places
            $table->timestamps(); // Waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
