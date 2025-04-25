<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleAndStatusToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add a role column with a default value of 'user'
            $table->string('role')->default('user');

            // Add a status column with possible values of 'active' or 'inactive'
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the role and status columns if rolled back
            $table->dropColumn('role');
            $table->dropColumn('status');
        });
    }
}
