<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('nomor_hp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('address');
    }
};
