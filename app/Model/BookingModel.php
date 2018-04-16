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
      return $this->belongsTo('app\Model\UserAccountModel');

      return $this->hasMany('app\Model\RoomModel');
    }
}
