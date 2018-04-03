<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = ['noOfPeople', 'checkIn', 'checkOut','roomQty','hotelID','userID','roomID'];
    protected $guarded = [];

    public function HotelModel()
    {
      return $this->belongsTo('App\Model\HotelModel');
    }

    public function UserAccountModelModel()
    {
      return $this->belongsTo('App\Model\UserAccountModel');
    }

    public function RoomTypeModel()
    {
      return $this->belongsTo('App\Model\RoomTypeModel');
    }
}
