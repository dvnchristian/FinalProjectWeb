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
        $table->dateTime('checkInDate');
        $table->integer('lengthOfStay');
        $table->string('comment');
        $table->integer('rating');

        $table->unsignedinteger('userID')->default(1);
        $table->unsignedinteger('roomID')->default(1);

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
