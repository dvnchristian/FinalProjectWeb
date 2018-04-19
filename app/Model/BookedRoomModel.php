<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookedRoomModel extends Model
{
  public $timestamps = false;
  protected $table = "bookedroom";
  protected $fillable = ['roomID', 'date'];
  protected $guarded = [];

  public function bookedRoom()
  {
    return $this->belongsTo('app\Model\RoomModel');
  }
}
