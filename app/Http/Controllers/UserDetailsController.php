<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetailsModel;

class UserDetailsController extends Controller
{
  public function __construct(UserDetailsModel $user)
  {
    $this -> userD = $userd;
  }

  public function registerUserDetails(Request $request)
  {

    $userd = [
      "userDetailsID" => $request->id
      "fName"  => $request->fName,
      "lName"  => $request->lName,
      ];


    $userd = $this->userd->create($userd);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allUserDetails()
  {
  try{
    $userd=$this->userd->with('Items')->get();

    return $userd;
  }
  catch(Exception $ex){
    return response('Failed',400);
  }

  }

  public function findUserDetails($userDetailsID)
  {
    $userd = $this->userd->find($userDetailsID);


    return $userd;
  }

  public function destroyUserDetails($userDetailsID)
  {
    $userd = $this->userd->find($userDetailsID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateviewUserDetails(Request $request, $userDetailsID)
  {

    $userd = $this->userd->find($userDetailsID);

    $userd->userDetailsID = $request->userDetailsID;
    $userd->fName = $request->fName;
    $userd->lName = $request->lName;

    $userd = $userd->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
