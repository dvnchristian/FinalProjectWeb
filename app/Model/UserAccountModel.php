<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAccountModel extends Model
{
    public $timestamps = false;
    protected $table = "useraccount";
    protected $fillable = ['email', 'username', 'password', 'phone', 'fName', 'lName'];
    protected $guarded = [];



}
