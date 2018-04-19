<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAccountModel extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = "useraccount";
    protected $fillable =
    [
      'name', 'email', 'password','phone', 'gender',
      'city', 'is_verified', 'ccNumber', 'cvv',
      'expDate'
    ];
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function useraccount()
    {
      return $this->hasMany('app\Model\BookingModel');
    }
}
