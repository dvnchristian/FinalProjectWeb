<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    public $timestamps = false;
    protected $table = "review";
    protected $fillable = ['rating', 'comment'];
    protected $guarded = [];
    

}
