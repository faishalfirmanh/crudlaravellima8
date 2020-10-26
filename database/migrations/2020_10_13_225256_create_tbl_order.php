<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
          $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->float('total_price')->unsigned()->defaults(0);
           $table->string('invoice_number');
           $table->enum('status', ['SUBMIT', 'PROCESS', 'FINISH',
          'CANCEL']);
         $table->timestamps();
         $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('order', function(Blueprint $table){
          $table->dropForeign('order_user_id_foreign');
      });
        Schema::dropIfExists('order');
    }
}
