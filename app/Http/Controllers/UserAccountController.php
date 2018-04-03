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
    $this ->user = $user;
  }

  public function register(Request $request)
  {

    $user = [
      "email"  => $request->email,
      "username"  => $request->username,
      "password"  => md5($request->password),
      "phone" => $request->phone,
      "fName" => $request->fName,
      "lName" => $request->lName
      ];


    $user = $this->user->create($user);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function all()
  {
  try{
    $user=$this->user->get();

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
    $user->fName = $request->fName;
    $user->lName = $request->lName;
    $user = $user->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
