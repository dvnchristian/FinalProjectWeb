<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    public $timestamps = false;
    protected $table = "room";
    protected $fillable = [
      'roomType', 'bedType', 'roomPrice', 'qty','hotelID'];
    protected $guarded = [];

    public function room()
    {
      return $this->belongsTo('App\Model\BookingModel');
    }
}
