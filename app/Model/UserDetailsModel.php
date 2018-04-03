<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public $timestamps = false;
    protected $table = "userDetails";
    protected $fillable = ['fName', 'lName', 'user_id'];
    protected $guarded = [];

    
}
