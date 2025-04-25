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
        Schema::table('products', function (Blueprint $table) {
            // Add the 'weight' column (assuming it's a decimal value)
            $table->decimal('weight', 8, 2)->default(0);  // 8 digits in total, 2 decimal places
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the 'weight' column if the migration is rolled back
            $table->dropColumn('weight');
        });
    }
};
