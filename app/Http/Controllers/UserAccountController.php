<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccountModel;

class UserAccountController extends Controller
{
  public function __construct(UserAccountModel $user)
  {
    $this -> userAccount = $user;
  }

  public function register(Request $request)
  {

    $user = [
      "userAccountID" => $request->userAccountID,
      "email"  => $request->email,
      "username"  => $request->username,
      "password"  => md5($request->password),
      "phone" => $request->phone,
      ];


    $user = $this->user->create($user);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function all()
  {
  try{111111111111111
    $user=$this->user->with('Items')->get();

    return $user;
  }
  catch(Exception $ex){
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

    $user->email = $request->email;
    $user->username = $request->name;
    $user->password = md5($request->password);
    $user->phone = $request->phone;
    $user = $user->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
