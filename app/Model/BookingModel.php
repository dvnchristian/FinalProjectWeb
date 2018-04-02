<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    public $timestamps = false;
    protected $table = "booking";
    protected $fillable = ['noOfPeople', 'checkInDate', 'checkOutDate','roomQty'];
    protected $guarded = [];


}
