<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserAccountModel extends Authenticatable
{
    public $timestamps = false;
    protected $table = "user";
    protected $fillable =
    [
      'email', 'username', 'password',
      'phone', 'fName', 'lName'];
    protected $guarded = [];

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
}
