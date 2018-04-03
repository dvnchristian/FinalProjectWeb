<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomTypeModel;
use Exception;

class RoomTypeController extends Controller
{

  protected $hotel;

  public function __construct(RoomTypeModel $room)
  {
    $this ->room = $room;
  }

  public function registerRoom(Request $request)
  {

    $room =
    [

      "roomType"  => $request->roomType,
      "bedType"  => $request->bedType,
      "roomPrice"  => $request->roomPrice
    ];


    $room = $this->room->create($room);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allRoom()
  {
    $room = $this->room->all();

    return $room;

  }

  public function findRoom($roomID)
  {
    $room = $this->room->find($roomID);


    return $room;
  }

  public function destroyRoom($roomID)
  {
    $room = $this->room->find($roomID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateviewRoom(Request $request, $room)
  {

    $room= $this->room->find($roomID);

    $room->roomType = $request->roomType;
    $room->bedType = $request->bedType;
    $room->roomPrice = $request->roomPrice;


    $room = $room->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
