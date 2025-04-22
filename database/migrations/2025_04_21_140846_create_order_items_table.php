<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap item
            $table->foreignId('order_id') // Foreign key ke tabel orders
                  ->constrained() // Menautkan ke tabel orders
                  ->onDelete('cascade'); // Hapus semua order items saat order dihapus
            $table->string('product_name'); // Nama produk
            $table->integer('quantity'); // Jumlah produk
            $table->decimal('price', 10, 2); // Harga produk dengan format 2 desimal
            $table->decimal('total', 10, 2); // Total harga untuk item (harga * quantity)
            $table->timestamps(); // Waktu pembuatan dan pembaruan
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items'); // Menghapus tabel order_items jika rollback
    }
}
