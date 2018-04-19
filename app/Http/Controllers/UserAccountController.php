<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Model\UserAccountModel;
use Exception;

class UserAccountController extends Controller
{
  protected $user;

  public function __construct(UserAccountModel $user)
  {
    $this->user = $user;
  }

  public function register(Request $request)
  {
    $user = [
      "name"  => $request->name,
      "email"  => $request->email,
      "password"  => md5($request->password),
      "phone" => $request->phone,
      "gender" => $request->gender,
      "city" => $request->city,
      // "ccNumber" => 0000000000000000,
      // "CVV" => 000,
      // "Name" => "",
      // "expDate" => "00/00"
      ];

    $user = $this->user->create($user);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function all()
  {
    try
    {
      $user=$this->user->get();

      return $user;
    }
    catch(Exception $ex)
    {
      return response('Failed',400);
    }
  }

  // manipulate initial value biar return nya gak kaya yang di tembak pas register
  public function find($userAccountID)
  {
    $user = $this->user->find($userAccountID);

    return $user;
  }

  public function destroy($userAccountID)
  {
    $user = $this->user->find($userAccountID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  //buat validate kartu kredit
  public function validateCCNumber(ccNumber)
  {
    // benerin lagi angka nya belom beres = checked
    if(ccNumber < 3374000000000000 || ccNumber > 4374999999999999)
    {
      return false;
    }
    else
    {
      return true;
    }

  }

  public function validateCVV(cvv)
  {
    if(cvv < 000 || cvv > 999)
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  public function expiredate(dateExp)
  {
    //validation
    // bulan nya di cek
    // manipulasi ambil 2 angka pertama buat bulan
    // expire date format MM/YY

    var str1 = dateExp;
    var month = str1.charAt(0) + str1.charAt(1);

    if(month < 13 && month > 0)
    {
      return true;
    }
    else
    {
      return false;
    }

    $yearNow = date("Y");
    $minYear = substr($yearNow, -2);

    var str2 = 
  }


  public function updateview(Request $request, $userAccountID)
  {
    $user = $this->user->find($userAccountID);
    if(!validateCCNumber($request->ccNumber))
    {
      return response([
               'msg'=>'success',
           ],200);
    }
    if(!validateCVVNumber($request->CVV))
    {
      // return json error
    }
    if(!expiredate($request->expdate))
    {
      //return json error
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = md5($request->password);
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->city = $request->city;
    $user->is_verified = $request->is_verified;
    //edit lg
    // $user->ccNumber = $request->ccNumber;
    // $user->CVV = $request->CVV;
    // $user->expdate = $request->expdate;

    // buat nya di BookedRoomController /  BookingController*
    // kalo buat di BookingController jgn lupa use BookedRoomController di top of the page
    // vice versa
    // lu pass roomID di booking ke BookedRoom
    // register bookedroom baru ke database

    $user = $user->save();

    return response([
         'msg'=>'success',
     ],200);
  }
}
