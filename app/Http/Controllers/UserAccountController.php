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
      "city" => $request->city
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

  public function updateview(Request $request, $userAccountID)
  {
    $user = $this->user->find($userAccountID);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = md5($request->password);
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->city = $request->city;
    $user->is_verified = $request->is_verified;

    $user = $user->save();

    return response([
         'msg'=>'success',
     ],200);
  }
}
