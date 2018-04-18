<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedRoomModel extends Model
{
  public $timestamps = false;
  protected $table = "bookedroom";
  protected $fillable = ['roomID', 'date', 'qty'];
  protected $guarded = [];

  public function bookedRoom()
  {
    return $this->belongsTo('app\Model\RoomModel');
  }
}
