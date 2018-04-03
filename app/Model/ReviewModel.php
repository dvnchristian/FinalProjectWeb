<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    public $timestamps = false;
    protected $table = "review";
    protected $fillable = ['rating','comment', 'bookingID'];
    protected $guarded = [];
<<<<<<< HEAD
=======


>>>>>>> master
}
