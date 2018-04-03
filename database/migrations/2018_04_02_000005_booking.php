<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('booking', function (Blueprint $table)
      {
        $table->increments('id');
        $table->integer('noOfPeople');
        $table->dateTime('checkIn');
        $table->dateTime('checkOut');
        $table->integer('roomQty');
        $table->integer('hotelID')->unsigned();
        $table->integer('userID')->unsigned();
        $table->integer('roomID')->unsigned();

        $table->foreign('hotelID')
                  ->references('id')->on('hotel')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        $table->foreign('userID')
                  ->references('id')->on('useraccount')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        $table->foreign('roomID')
                  ->references('id')->on('room')
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
      Schema::dropIfExists('booking');
    }
}
