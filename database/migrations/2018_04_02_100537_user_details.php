<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('userdetails', function (Blueprint $table)
      {
        $table->increments('id');
        $table->string('fName');
        $table->string('lName');
        $table->integer('userID');

        $table->foreign('userID')
                  ->references('id')->on('useraccount')
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
      Schema::dropIfExists('userdetails');
    }
}
