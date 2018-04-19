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
      "ccNumber" => $request->ccNumber,
      "cvv" => $request->cvv,
      "expDate" => $request->expDate,
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

  // Validate CC Number
  public function validateCCNumber(ccNumber)
  {
    // 16 digits checked
    if(ccNumber < 3374000000000000 || ccNumber > 4374999999999999)
    {
      return "false";
    }
    else
    {
      return "true";
    }
  }

  //validate cvv
  public function validateCVV(cvv)
  {
    if(cvv < 000 || cvv > 999)
    {
      return "false";
    }
    else
    {
      return "true";
    }
  }

  public function validateExpireDate(dateExp)
  {
    // validation
    // bulan nya di cek
    // manipulasi ambil 2 angka pertama buat bulan
    // expire date format MM/YY

    $yearNow = date("Y");
    $minYear = substr($yearNow, -2);

    var str = dateExp;
    var month = str.charAt(0) + str.charAt(1);
    var year = str.charAt(3) + str.charAt(4);

    if(month < 13 && month > 0)
    {
      if(year < $minYear || year > $minYear + 5)
      {
        return "false";
      }
      else
      {
        return "true";
      }
    }
    else
    {
      return "false";
    }
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
      return response([
               'msg'=>'fail',
           ],400);
    }
    if(!expiredate($request->expdate))
    {
      //return json error
      return response([
               'msg'=>'fail',
           ],400);
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = md5($request->password);
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->city = $request->city;
    $user->is_verified = $request->is_verified;
    //edit lg
    $user->ccNumber = $request->ccNumber;
    $user->CVV = $request->cvv;
    $user->expDate = $request->expDate;

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
