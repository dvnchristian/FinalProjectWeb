<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = [
      'noOfPeople', 'checkIn', 'checkOut',
      'comment', 'rating', 'has_Paid', 'hotelID', 'userID', 'roomID'];
    protected $guarded = [];

    public function booking()
    {
      return $this->belongsTo('App\Model\HotelModel');
    }
}
