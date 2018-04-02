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
      "id" => $request->id,
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
  try{
    $user=$this->user->with('Items')->get();

    return $user;
  }
  catch(Exception $ex){
    return response('Failed',400);
  }

  }

  public function find($id)
  {
    $user = $this->user->find($id);


    return $user;
  }

  public function destroy($id)
  {
    $user = $this->user->find($id)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateview(Request $request, $id)
  {

    $user = $this->user->find($id);

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
