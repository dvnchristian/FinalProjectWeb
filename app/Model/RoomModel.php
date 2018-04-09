<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    public $timestamps = false;
    protected $table = "room";
    protected $fillable = ['roomType', 'bedType', 'roomPrice', 'hotelID'];
    protected $guarded = [];
}
