<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Review extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('review', function (Blueprint $table)
      {
        $table->increments('id');
        $table->integer('rating');
        $table->string('comment');
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
      Schema::dropIfExists('review');
    }
}
