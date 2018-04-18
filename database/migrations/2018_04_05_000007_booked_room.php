<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookedRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bookedRoom', function (Blueprint $table)
      {
        $table->increments('id');
        $table->unsignedinteger('roomID')->default(1);
        $table->dateTime('date');

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
      Schema::dropIfExists('bookedRoom');
    }
}
