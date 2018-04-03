<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    public $timestamps = false;
    protected $table = 'hotel';
    protected $fillable = [
      'hotelName', 'hotelLocation', 'hotelAddress',
      'hotelPhone', 'hotelStar', 'roomID'];
    protected $guarded = [];

    public function room()
    {
      return $this->belongsTo('App\Models\RoomTypeModel');
    }

}
