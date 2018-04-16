<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('room', function (Blueprint $table)
      {
        $table->increments('id');
        $table->enum('roomType', ['Deluxe', 'Superior', 'Premier', 'Executive']);
        $table->enum('bedType', ['Single', 'Twin', 'Double']);
        $table->integer('roomPrice');
        $table->integer('qty');
        $table->unsignedinteger('hotelID')->default(1);

        $table->foreign('hotelID')
                  ->references('id')->on('hotel')
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
      Schema::dropIfExists('room');
    }
}
