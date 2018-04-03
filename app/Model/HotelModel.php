<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    public $timestamps = false;
    protected $table = 'hotel';
    protected $fillable = [
      'hotelName', 'hotelLocation', 'hotelAddress',
      'hotelPhone', 'hotelStar'];
    protected $guarded = [];

<<<<<<< HEAD
    // public function room()
    // {
    //   return $this->belongsTo('App\Models\RoomTypeModel');
    // }

=======
>>>>>>> master
}
