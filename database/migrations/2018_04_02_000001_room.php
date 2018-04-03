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
        $table->enum('roomType', ['deluxe', 'superior', 'premier', 'executive']);
        $table->enum('bedType', ['single', 'twin', 'double']);
        $table->integer('roomPrice');
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
