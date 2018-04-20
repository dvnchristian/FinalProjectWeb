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
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->string('phone');
        $table->enum('gender', ['Male', 'Female']);
        $table->string('city');
        $table->rememberToken();
        $table->integer('ccNumber')->nullable(); //int gk bisa di kasih max length
        $table->integer('cvv')->nullable();
        $table->string('expDate', 5)->nullable();
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
