<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserAccountModel extends Authenticatable
{
    public $timestamps = false;
    protected $table = "user";
    protected $fillable =
    [
      'email', 'username', 'password',
      'phone'];
    protected $guarded = [];
}
