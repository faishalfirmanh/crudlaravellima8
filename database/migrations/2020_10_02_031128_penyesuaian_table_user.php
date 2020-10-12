<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('roles');
            $table->string('address');
            $table->string('phone');
            $table->string('avatar');
            $table->enum("status",["ACTIVE","INACTIVE"]);
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
     $table->dropColumn("username");
     $table->dropColumn("roles");
     $table->dropColumn("address");
     $table->dropColumn("phone");
     $table->dropColumn("avatar");
     $table->dropColumn("status");
     });

        //
    }
}
