<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class UserAccountModel extends Authenticatable
{
    public $timestamps = false;
<<<<<<< HEAD
    protected $table = "user";
    protected $fillable =
    [
      'email', 'username', 'password',
      'phone'];
    protected $guarded = [];
=======
    protected $table = "useraccount";
    protected $fillable = ['email', 'username', 'password', 'phone', 'fName', 'lName'];
    protected $guarded = [];



>>>>>>> master
}
