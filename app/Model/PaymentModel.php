<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    public $timestamps = false;
    protected $table = "payment";
    protected $fillable = ['ccNo', 'ccCode', 'userID', 'bookingID'];
    protected $guarded = [];
}
