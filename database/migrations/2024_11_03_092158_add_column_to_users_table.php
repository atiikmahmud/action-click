<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('zip_code')->nullable()->after('password');
            $table->string('state')->nullable()->after('password');
            $table->string('address')->nullable()->after('password');
            $table->enum('status', ['active', 'disabled', 'inactive'])->default('inactive')->after('password');
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
            $table->string('phone')->nullable()->after('password');
            $table->string('image')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('phone');
            $table->dropColumn('role');
            $table->dropColumn('status');
            $table->dropColumn('address');
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
        });
    }
}
