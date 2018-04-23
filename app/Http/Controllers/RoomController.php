<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomModel;
use App\Model\BookingModel;
use App\Model\BookedRoomModel;

use Exception;

class RoomController extends Controller
{
  protected $room;

  public function __construct(RoomModel $room)
  {
    $this ->room = $room;
  }

  public function registerRoom(Request $request)
  {
    $room =
    [
      "numberOfBed"  => $request->numberOfBed,
      "numberOfBath"  => $request->numberOfBath,
      "roomPrice" => $request->roomPrice,
      "roomImage" => $request->roomImage
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

  public function updateviewRoom(Request $request, $roomID)
  {

    $room= $this->room->find($roomID);

    $room->numberOfBed = $request->numberOfBed;
    $room->numberOfBath = $request->numberOfBath;
    $room->roomPrice = $request->roomPrice;
    $room->roomImage = $request->roomImage;

    $room = $room->save();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function getPrice($id)
  {
    $room = $this->room->where('id',$id)->first();
  }

}
