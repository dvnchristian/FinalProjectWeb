<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = ['noOfPeople', 'checkIn', 'checkOut','roomQty','hotelID','userID','roomID'];
    protected $guarded = [];

<<<<<<< HEAD
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
=======
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
>>>>>>> master
}
