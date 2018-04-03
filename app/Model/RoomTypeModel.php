<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTypeModel extends Model
{
    public $timestamps = false;
    protected $table = "roomtype";
    protected $fillable = ['roomType', 'bedType', 'roomPrice'];
    protected $guarded = [];

    
}
