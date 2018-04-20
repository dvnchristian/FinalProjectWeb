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
        $table->string('roomType');
        $table->string('bedType');
        $table->integer('roomPrice');
        $table->string('roomImage');
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
