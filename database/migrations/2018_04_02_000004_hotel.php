<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('hotel', function (Blueprint $table)
      {
        $table->increments('id');
        $table->string('hotelName');
        $table->string('hotelLocation');
        $table->string('hotelAddress');
        $table->integer('hotelPhone');
        $table->integer('hotelStar');
        $table->unsignedinteger('roomID');

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
      Schema::dropIfExists('hotel');
    }
}
