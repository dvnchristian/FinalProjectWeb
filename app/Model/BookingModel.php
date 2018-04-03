<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = [
      'noOfPeople', 'checkInDate', 'checkOutDate','roomQty',
      'hotelID', 'userID', 'roomID'];
    protected $guarded = [];

    // public function HotelModel()
    // {
    //   return $this->belongsTo('App\Models\HotelModel');
    // }
    //
    // public function UserAccountModelModel()
    // {
    //   return $this->belongsTo('App\Models\UserAccountModel');
    // }
    //
    // public function RoomTypeModel()
    // {
    //   return $this->belongsTo('App\Models\RoomTypeModel');
    // }
}
