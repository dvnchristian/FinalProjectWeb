<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomTypeModel extends Model
{
    public $timestamps = false;
    protected $table = "room";
    protected $fillable = ['roomType', 'bedType', 'roomPrice'];
    protected $guarded = [];
<<<<<<< HEAD
=======


>>>>>>> master
}
