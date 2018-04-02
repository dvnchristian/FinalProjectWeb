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
        $table->increments('roomID');
        $table->integer('numberOfPeople');
        $table->enum('bedType', ['single', 'twin', 'double']);
        $table->integer('price');
        $table->enum('roomType', ['deluxe', 'superior', 'premier', 'executive']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('users');
    }
}
