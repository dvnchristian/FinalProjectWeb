<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('useraccount', function (Blueprint $table)
      {
        $table->increments('id');
        $table->string('email');
        $table->string('username');
        $table->string('password');
        $table->string('phone');
        // $table->string('fName');
        // $table->string('lName');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('useraccount');
    }
}
