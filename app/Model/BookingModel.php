<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = [
      'checkInDate', 'lengthOfStay', 'comment',
      'rating','userID', 'roomID'];
    protected $guarded = [];

    public function booking()
    {
      return $this->belongsTo('app\Model\UserAccountModel');

      return $this->hasMany('app\Model\RoomModel');
    }
}
