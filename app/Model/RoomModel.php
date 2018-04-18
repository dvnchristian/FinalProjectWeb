<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    public $timestamps = false;
    protected $table = "room";
    protected $fillable = [
      'numberOfBed', 'numberOfBath', 'Location', 'Address', 'contactNo', 'roomPrice','roomImage'];
    protected $guarded = [];

    public function room()
    {
      return $this->belongsTo('App\Model\BookingModel');

      return $this->hasMany('App\Model\BookedRoomModel');
    }
}
