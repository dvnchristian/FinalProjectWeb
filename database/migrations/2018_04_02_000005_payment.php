<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('payment', function (Blueprint $table)
      {
        $table->increments('id');
        $table->integer('ccNo');
        $table->integer('ccCode');
        $table->integer('userID')->unsigned();
        $table->integer('bookingID')->unsigned();

        $table->foreign('userID')
                  ->references('id')->on('useraccount')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

        $table->foreign('bookingID')
                  ->references('id')->on('booking')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('payment');
    }
}
