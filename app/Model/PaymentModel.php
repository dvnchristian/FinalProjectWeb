<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    public $timestamps = false;
    protected $table = "payment";
    protected $fillable = ['userID', 'bookingID'];
    protected $guarded = [];

    public function UserAccountModel()
    {
      return $this->belongsTo('App\Models\UserAccountModel');
    }

    public function BookingModel()
    {
      return $this->belongsTo('App\Models\BookingModel');
    }
}
