<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = [
      'checkInDate', 'checkOutDate', 'comment',
      'rating','userID', 'roomID'];
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo('app\Model\UserAccountModel');
    }
    public function room()
    {
      return $this->hasMany('app\Model\RoomModel');
    }
}
