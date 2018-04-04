<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    public $timestamps = false;
    protected $table = "payment";
    protected $fillable = ['userID', 'bookingID'];
    protected $guarded = [];
}
